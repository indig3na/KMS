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
}