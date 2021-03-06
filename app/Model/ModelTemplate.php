<?php

namespace Model;

use W\Model\Model;

/**
 * Notre modèle de base modifiable à hériter depuis
 */
abstract class ModelTemplate extends Model
{
    /**
     * Récupère les lignes sélectionnées de la table
     * fonction copiée/collée de \W\Model::findAll
     * @param $cols array Les colonnes à retourner
     * @param $wherecol string colonne sur laquelle porte le tri
     * @param $whereval int valeur recherchée dans $wherecol
     * @param $orderBy La colonne en fonction de laquelle trier
     * @param $orderDir La direction du tri, ASC ou DESC
     * @param $limit Le nombre maximum de résultat à récupérer
     * @param $offset La position à partir de laquelle récupérer les résultats
     * @return array Les données sous forme de tableau multidimensionnel
     */
    public function findAllColumns($cols = ['*'], $wherecol = '', $whereval = '', $orderBy = '', $orderDir = 'ASC', $limit = null, $offset = null)
    {
        $sql = 'SELECT ' . implode(', ', $cols) . ' FROM ' . $this->table;
        if(!empty($wherecol)){
            $sql .= ' WHERE '. htmlspecialchars($wherecol, ENT_QUOTES | ENT_HTML5).' = "'.htmlspecialchars($whereval, ENT_QUOTES | ENT_HTML5).'"';
        }
        if (!empty($orderBy)) {

            //sécurisation des paramètres, pour éviter les injections SQL
            if (!preg_match('#^[a-zA-Z0-9_$]+$#', $orderBy)) {
                die('Error: invalid orderBy param');
            }
            $orderDir = strtoupper($orderDir);
            if ($orderDir != 'ASC' && $orderDir != 'DESC') {
                die('Error: invalid orderDir param');
            }
            if ($limit && !is_int($limit)) {
                die('Error: invalid limit param');
            }
            if ($offset && !is_int($offset)) {
                die('Error: invalid offset param');
            }

            $sql .= ' ORDER BY ' . $orderBy . ' ' . $orderDir;
            if ($limit) {
                $sql .= ' LIMIT ' . $limit;
                if ($offset) {
                    $sql .= ' OFFSET ' . $offset;
                }
            }
        }
        $sth = $this->dbh->prepare($sql);
        $sth->execute();

        return $sth->fetchAll();
    }

    /**
     * Récupère une colonne et l'associe à la primary key de la table
     * @param $column Le nom de la colonne
     * @returns array associatif primaryKey => colonne
     */
    public function findIndexedColumn($column)
    {
        //Sélectionner l'id et a colonne $column
        $sql = 'SELECT ' . $this->primaryKey . ', ' . $column . ' FROM ' . $this->table;
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        $data = $sth->fetchAll(\PDO::FETCH_ASSOC);
        //si erreur, renvoyer false
        if ($data === false) {
            return false;
        }
        //si réussite, créer un array associatif id => valeur de la colonne spécifiée
        $result = array();
        foreach ($data as $row) {
            $result[$row[$this->primaryKey]] = $row[$column];
        }
        return $result;
    }
    
    /*
     * Récupère les colonnes spécifiées et les associe à la primary key de la table
     * @var $columns string/array la/les colonnes à récupérer
     * @var $separator string Optionnel: retourner les colonnes dans une chaîne de caractères, séparées par $separator, au lieu d'un array
     * @var $where string Optionnel: permet d'ajouter un statement Where à la requête. Sans aucune sécurisation!
     */
    
    public function findIndexedColumns($columns,$separator = NULL, $where = ''){
        $colArr = (is_array($columns)) ? $columns : [$columns];
        //Sélectionner l'id et a colonne $column
        $sql = 'SELECT ' . $this->primaryKey . ', ' . implode(', ',$colArr) . ' FROM ' . $this->table . ' ' . $where;
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        $data = $sth->fetchAll(\PDO::FETCH_ASSOC);
        //si erreur, renvoyer false
        if ($data === false) {
            return false;
        }
        //si réussite, créer un array associatif id => valeur de la colonne spécifiée
        $pk = $this->primaryKey;
        $result = array();
        foreach ($data as $row) {
            $id = $row[$pk];
            unset($row[$pk]);
            if (isset($separator)){
                $result[$id] = empty($row) ? '' : implode($separator, $row);
            } else {
                $result[$id] = $row;
            }
        }
        return $result;
    }

    public function getChildInfos($id)
    {
        if (!is_numeric($id)){
            return false;
        }

        $sql = 'SELECT `chd_id` , `chd_firstname` , `chd_lastname` , `chd_birthday` , `chd_gender` , `chd_hobbies` , `chd_comments` , `chd_img_path` , `chd_inserted` , `chd_updated` , `child`.`class_cls_id` , `user_usr_id` , `parent`.`usr_lastname` AS par_lastname, `parent`.`usr_firstname` AS par_firstname, `parent`.`usr_address` AS par_address, `parent`.`usr_tel_mobile_1` AS par_mobile, `educator`.`usr_lastname` , `educator`.`usr_firstname` , `prg_name` , `nur_name` , `cls_name` , `cit_name` , `scy_year`
                FROM `child`
                INNER JOIN user AS parent ON child.user_usr_id = parent.usr_id
                INNER JOIN class ON child.class_cls_id = class.cls_id
                INNER JOIN user AS educator ON class.cls_id = educator.class_cls_id
                INNER JOIN city ON parent.city_cit_id = city.cit_id
                INNER JOIN nursery ON parent.nursery_nur_id = nursery.nur_id
                INNER JOIN school_year ON class.school_year_scy_id = school_year.scy_id
                INNER JOIN program ON class.program_prg_id = program.prg_id WHERE ' . $this->primaryKey .'  = :id LIMIT 1';
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(':id', $id);
        $sth->execute();

        return $sth->fetch();
    }

     /**
     * Compte les occurences de valeurs dans une colonne et associe ce nombre à la valeur
     * @param $column Le nom de la colonne
     * @returns array associatif colonneVal => nombre d'éléments
     */
    public function countByCol($column)
    {
        //Sélectionner l'id et a colonne $column
        $sql = ''
            . 'SELECT count(*) AS Count, `' . $column . '` FROM ' . $this->table.'
            GROUP BY `' .$column. '`';
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        $data = $sth->fetchAll(\PDO::FETCH_ASSOC);
        //si erreur, renvoyer false
        if ($data === false) {
            return false;
        }
        //si réussite, créer un array associatif id => valeur de la colonne spécifiée
        $result = array();
        foreach ($data as $row) {
            $result[$row[$column]] = $row['Count'];
        }
        return $result;
    }
    
    
    /**
     * requete depuis un tableau de correspondance
     * 
     * @param $tableInfo array [table_correspondance, clé_base, clé_destination]
     * 
     * table_correspondance = nom de la table de correspondance
     * 
     * clé_base = dans table_correspondance, nom de la clé du tableau qui fait la liaison
     * 
     * clé_destination = dans table_correspondance, nom de la clé du tableau lié
     * 
     * 
     * 
     * @param $id int Optionnel retourner seulement les données pour un id spécifique 
     */
    public function getCorrTableData($tableInfo, $id=0){
        $table = $this ->getTable();
        $pk = $this->getPrimaryKey();
        $this->setTable($tableInfo[0]);
        $this->setPrimaryKey($tableInfo[1]);

        $sql = '
            SELECT *
            FROM '.$tableInfo[0].'
        ';
        if (isset($col)){
            $sql+= 'WHERE '.$tableInfo[1].' = :id';
        }
        $sth = $this->dbh->prepare($sql);
        if (isset($col)){
            $sth ->bindValue(':id', $id);
        }
        $sth->execute();
        $query = $sth->fetchAll(\PDO::FETCH_ASSOC);
        $result = array();
        foreach ($query as $row){
            $result[$row[$tableInfo[1]]][] = $row[$tableInfo[2]];
        }
        $this->setTable($table);
        $this->setPrimaryKey($pk); 

        return $result;
    }

    /**
     * Insère dans un tableau de correspondance
     * 
     * @param $data array les données à passer la fonction insert() de W 
     * 
     * @param $tableInfo array [table_correspondance, clé_base, clé_destination]
     * 
     * table_correspondance = nom de la table de correspondance
     * 
     * clé_base = dans table_correspondance, nom de la clé du tableau qui fait la liaison
     * 
     * clé_destination = dans table_correspondance, nom de la clé du tableau lié
     * 
     */
    public function insertIntoCorrTable($data,$tableInfo){
        $table = $this ->getTable();
        $pk = $this->getPrimaryKey();
        $this->setTable($tableInfo[0]);
        $this->setPrimaryKey($tableInfo[1]);

        $result = $this->insert($data);

        $this->setTable($table);
        $this->setPrimaryKey($pk);
        return $result;
    }

    /**
     * Supprime dans un tableau de correspondance
     * 
     * @param $data array les données à passer la fonction insert() de W 
     * 
     * @param $tableInfo array [table_correspondance, clé_base, clé_destination]
     * 
     * table_correspondance = nom de la table de correspondance
     * 
     * clé_base = dans table_correspondance, nom de la clé du tableau qui fait la liaison
     * 
     * clé_destination = dans table_correspondance, nom de la clé du tableau lié
     * 
     * @param $id int L'id de base pour lequel les entrées dopivent être supprimées
     */
    public function deleteFromCorrTable($tableInfo,$id){
        $table = $this ->getTable();
        $pk = $this->getPrimaryKey();
        $this->setTable($tableInfo[0]);
        $this->setPrimaryKey($tableInfo[1]);

        $sql = '
            DELETE
            FROM '.$tableInfo[0].'
            WHERE '.$tableInfo[1].' = :id
        ';
        $sth = $this->dbh->prepare($sql);
        $sth ->bindValue(':id', $id);

        $this->setTable($table);
        $this->setPrimaryKey($pk);

        return $sth->execute();
    }
    
        

}