<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 15/12/2016
 * Time: 09:44
 */

namespace Model;
use W\Model\UsersModel;

class UserModel extends UsersModel
{
    /*----------------Properties------------------*/
    /**
     * @var int
     */
    private $usr_id;
    /**
     * @var string
     */
    private $usr_firstname;
    /**
     * @var string
     */
    private $usr_lastname;
    /**
     * @var string
     */
    private $usr_address;
    /**
     * @var int
     */
    private $usr_tel_mobile_1;

    /**
     * @var int
     */
    private $usr_tel_mobile_2;
    /**
     * @var int
     */
    private $usr_tel_domicile;
    /**
     * @var int
     */
    private $usr_tel_bureau;

    /**
     * @var string
     */
    private $usr_email;
    /**
     * @var string
     */
    private $usr_img_path;
    /**
     * @var string
     */

    private $usr_password;
    /**
     * @var string
     */
    private $usr_role;
    /**
     * @var string
     */
    private $usr_token;
    /**
     * @var string
     */
    private $usr_insert;
    /**
     * @var int
     */
    private $usr_updated;

    /**
     * @var int
     */
    private $city_cit_id;
    /**
     * @var int
     */
    private $nursery_nur_id;
    /**
     * @var int
     */
    private $class_cls_id;

    /*----------------Constructor------------------*/

    /**
     * UsreModel constructor.
     * @param int $usr_id
     * @param string $usr_firstname
     * @param string $usr_lastname
     * @param string $usr_address
     * @param int $usr_tel_mobile_1
     * @param int $usr_tel_mobile_2
     * @param int $usr_tel_domicile
     * @param int $usr_tel_bureau
     * @param string $usr_email
     * @param string $usr_img_path
     * @param string $usr_password
     * @param string $usr_role
     * @param string $usr_token
     * @param string $usr_insert
     * @param int $usr_updated
     * @param int $city_cit_id
     * @param int $nursery_nur_id
     * @param int $class_cls_id
     */
    public function __construct($usr_id= 0, $usr_firstname = '', $usr_lastname= '', $usr_address= '', $usr_tel_mobile_1 = NULL, $usr_tel_mobile_2= NULL, $usr_tel_domicile= NULL, $usr_tel_bureau= NULL, $usr_email= NULL, $usr_img_path= NULL, $usr_password= NULL, $usr_role= NULL, $usr_token= NULL, $usr_insert= NULL, $usr_updated= NULL, $city_cit_id= NULL, $nursery_nur_id= NULL, $class_cls_id = NULL)
    {
        parent::__construct();
        $this->setPrimaryKey('usr_id');
        $this->usr_id = $usr_id;
        $this->usr_firstname = $usr_firstname;
        $this->usr_lastname = $usr_lastname;
        $this->usr_address = $usr_address;
        $this->usr_tel_mobile_1 = $usr_tel_mobile_1;
        $this->usr_tel_mobile_2 = $usr_tel_mobile_2;
        $this->usr_tel_domicile = $usr_tel_domicile;
        $this->usr_tel_bureau = $usr_tel_bureau;
        $this->usr_email = $usr_email;
        $this->usr_img_path = $usr_img_path;
        $this->usr_password = $usr_password;
        $this->usr_role = $usr_role;
        $this->usr_token = $usr_token;
        $this->usr_insert = $usr_insert;
        $this->usr_updated = $usr_updated;
        $this->city_cit_id = $city_cit_id;
        $this->nursery_nur_id = $nursery_nur_id;
        $this->class_cls_id = $class_cls_id;
    }
    /*----------------Setters------------------*/

    /**
     * @param string $table
     */
    public function setTable($table)
    {
        $this->table = $table;
    }

    /**
     * @param int $primaryKey
     */
    public function setPrimaryKey($primaryKey)
    {
        $this->primaryKey = $primaryKey;
    }

    /**
     * @param \PDO $dbh
     */
    public function setDbh($dbh)
    {
        $this->dbh = $dbh;
    }

    /**
     * @param int $usr_id
     */
    public function setUsrId($usr_id)
    {
        $this->usr_id = $usr_id;
    }

    /**
     * @param string $usr_firstname
     */
    public function setUsrFirstname($usr_firstname)
    {
        $this->usr_firstname = $usr_firstname;
    }

    /**
     * @param string $usr_lastname
     */
    public function setUsrLastname($usr_lastname)
    {
        $this->usr_lastname = $usr_lastname;
    }

    /**
     * @param string $usr_address
     */
    public function setUsrAddress($usr_address)
    {
        $this->usr_address = $usr_address;
    }

    /**
     * @param int $usr_tel_mobile_1
     */
    public function setUsrTelMobile1($usr_tel_mobile_1)
    {
        $this->usr_tel_mobile_1 = $usr_tel_mobile_1;
    }

    /**
     * @param int $usr_tel_mobile_2
     */
    public function setUsrTelMobile2($usr_tel_mobile_2)
    {
        $this->usr_tel_mobile_2 = $usr_tel_mobile_2;
    }

    /**
     * @param int $usr_tel_domicile
     */
    public function setUsrTelDomicile($usr_tel_domicile)
    {
        $this->usr_tel_domicile = $usr_tel_domicile;
    }

    /**
     * @param int $usr_tel_bureau
     */
    public function setUsrTelBureau($usr_tel_bureau)
    {
        $this->usr_tel_bureau = $usr_tel_bureau;
    }

    /**
     * @param string $usr_email
     */
    public function setUsrEmail($usr_email)
    {
        $this->usr_email = $usr_email;
    }

    /**
     * @param string $usr_img_path
     */
    public function setUsrImgPath($usr_img_path)
    {
        $this->usr_img_path = $usr_img_path;
    }

    /**
     * @param string $usr_password
     */
    public function setUsrPassword($usr_password)
    {
        $this->usr_password = $usr_password;
    }

    /**
     * @param string $usr_role
     */
    public function setUsrRole($usr_role)
    {
        $this->usr_role = $usr_role;
    }

    /**
     * @param string $usr_token
     */
    public function setUsrToken($usr_token)
    {
        $this->usr_token = $usr_token;
    }

    /**
     * @param string $usr_insert
     */
    public function setUsrInsert($usr_insert)
    {
        $this->usr_insert = $usr_insert;
    }

    /**
     * @param int $usr_updated
     */
    public function setUsrUpdated($usr_updated)
    {
        $this->usr_updated = $usr_updated;
    }

    /**
     * @param int $city_cit_id
     */
    public function setCityCitId($city_cit_id)
    {
        $this->city_cit_id = $city_cit_id;
    }

    /**
     * @param int $nursery_nur_id
     */
    public function setNurseryNurId($nursery_nur_id)
    {
        $this->nursery_nur_id = $nursery_nur_id;
    }

    /**
     * @param int $class_cls_id
     */
    public function setClassClsId($class_cls_id)
    {
        $this->class_cls_id = $class_cls_id;
    }

    /*----------------Getters------------------*/
    /**
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->primaryKey;
    }

    /**
     * @return \PDO
     */
    public function getDbh()
    {
        return $this->dbh;
    }

    /**
     * @return int
     */
    public function getUsrId()
    {
        return $this->usr_id;
    }

    /**
     * @return string
     */
    public function getUsrFirstname()
    {
        return $this->usr_firstname;
    }

    /**
     * @return string
     */
    public function getUsrLastname()
    {
        return $this->usr_lastname;
    }

    /**
     * @return string
     */
    public function getUsrAddress()
    {
        return $this->usr_address;
    }

    /**
     * @return int
     */
    public function getUsrTelMobile1()
    {
        return $this->usr_tel_mobile_1;
    }

    /**
     * @return int
     */
    public function getUsrTelMobile2()
    {
        return $this->usr_tel_mobile_2;
    }

    /**
     * @return int
     */
    public function getUsrTelDomicile()
    {
        return $this->usr_tel_domicile;
    }

    /**
     * @return int
     */
    public function getUsrTelBureau()
    {
        return $this->usr_tel_bureau;
    }

    /**
     * @return string
     */
    public function getUsrEmail()
    {
        return $this->usr_email;
    }

    /**
     * @return string
     */
    public function getUsrImgPath()
    {
        return $this->usr_img_path;
    }

    /**
     * @return string
     */
    public function getUsrPassword()
    {
        return $this->usr_password;
    }

    /**
     * @return string
     */
    public function getUsrRole()
    {
        return $this->usr_role;
    }

    /**
     * @return string
     */
    public function getUsrToken()
    {
        return $this->usr_token;
    }

    /**
     * @return string
     */
    public function getUsrInsert()
    {
        return $this->usr_insert;
    }

    /**
     * @return int
     */
    public function getUsrUpdated()
    {
        return $this->usr_updated;
    }

    /**
     * @return int
     */
    public function getCityCitId()
    {
        return $this->city_cit_id;
    }

    /**
     * @return int
     */
    public function getNurseryNurId()
    {
        return $this->nursery_nur_id;
    }

    /**
     * @return int
     */
    public function getClassClsId()
    {
        return $this->class_cls_id;
    }
    /**
     * special method
     */
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
        //debug($sql);die();
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

    public function addToken($email, $token){
        $sql = '
            UPDATE '.$this->table.'
            SET usr_token = :usrToken
            WHERE usr_email = :usrEmail
        ';
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindValue(':usrToken', $token);
        $stmt->bindValue(':usrEmail', $email);
        if ($stmt->execute() === false) {
            debug($stmt->errorInfo());
            return false;
        }
        else {
            return true;
        }
    }
    public function findByToken($token){
        $sql = '
            SELECT * FROM  '.$this->table.'
            WHERE usr_token = :usrToken
        ';
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindValue(':usrToken', $token);
        if ($stmt->execute() === false) {
            debug($stmt->errorInfo());
        }
        else {
             return $stmt->fetch();
        }
    }

}