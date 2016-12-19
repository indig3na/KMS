<?php

namespace Model;

/**
 * Modèle pour la table country
 * pas de foreign key
 */
class UserFunctionsModel extends ModelTemplate
{
    public function __construct() {
        $this ->setTable('user');
        $this ->setPrimaryKey('usr_id');
    }
}