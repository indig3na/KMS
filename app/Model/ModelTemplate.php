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
     * @param $orderBy La colonne en fonction de laquelle trier
     * @param $orderDir La direction du tri, ASC ou DESC
     * @param $limit Le nombre maximum de résultat à récupérer
     * @param $offset La position à partir de laquelle récupérer les résultats
     * @return array Les données sous forme de tableau multidimensionnel
     */
    public function findAllColumns($cols = ['*'], $orderBy = '', $orderDir = 'ASC', $limit = null, $offset = null)
    {

        $sql = 'SELECT ' . implode(', ', $cols) . ' FROM ' . $this->table;
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
    
    
    /**
     * S'occupe de la base de données
     * 
     * @param $postfields array Liste des indexes attendus dans $_POST
     * @param $mult array Optionnel: Liste des indexes attendus pour les  tables de correspondances
     * 
     */
    //todo virer dans le controllerTemplate
    
    public function db_post($postfields,$mult=[]){
        $success = false;
        if (in_array($method = $_POST['method'],['insert','update'])){
            //récupérer les champs nécessaires de $-POST
            $data = array_intersect_key($_POST, array_flip($postfields));
            $corrTableData = array_intersect_key($_POST, array_flip(array_keys($mult)));
            //validation données
            $messages = $this -> validate($data);
            //modifier la BD
            if(empty($messages)){
                //insertion données
                if ($method === 'insert'){
                    $prettyMethod='Insertion';
                    $result = $this ->insert($data);
                } else if ($method === 'update'){
                    $prettyMethod='Modification';
                    $id = intval($_POST['id']);
                    $result = $this ->update($data,$id);
                }
                if($result === false){
                    $messages[] = $prettyMethod.' générale en BD échouée';
                } else {
                    $messages[] = $prettyMethod.' générale en BD réussie';
                    $success = true;
                    $id = $result[$this->getPrimaryKey()];
                    foreach ($mult as $multKey => $ctd){
                        if ($method === 'update'){
                            $this -> deleteFromCorrTable($ctd,$id);
                        }
                        $corrSuccess = true;
                        foreach ($corrTableData[$multKey] as $corrData){
                            $insert = [$ctd[1] => $id, $ctd[2] => $corrData];
                            if($this->insertIntoCorrTable($insert,$ctd) === false){
                                $corrSuccess = false;
                            }
                        }
                        if ($corrSuccess){
                            $messages[] = $prettyMethod.' de certaines données en BD échouée';
                        } else {
                            $messages[] = $prettyMethod.' en BD tout à fait réussie';
                        }
                    }
                }
            }
        } elseif ($method === 'delete'){
            // suppression données
            $id = intval($_POST['id']);
            if($this -> delete($id) === false) {
                $messages[] = 'Suppression générale en BD échouée';
            } else {
                $messages[] = 'Suppression générale en BD réussie';
                $success = true;
                foreach ($mult as $ctd){
                    $this -> deleteFromCorrTable($ctd,$id);
                }
            }    
        } else {
            $messages[] = 'méthode inconnue';
        }
        return [$success,$messages];
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