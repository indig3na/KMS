<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 15/12/2016
 * Time: 09:14
 */

namespace Model;
use Model\ModelTemplate;

class ChildModel extends ModelTemplate
{
    /*----------------Properties------------------*/
    /**
     * @var int
     */
    private $chd_id;
    /**
     * @var string
     */
    private $chd_firstname;
    /**
     * @var string
     */
    private $chd_lastname;

    /**
     * @var string
     */
    private $chd_birthday;
    /**
     * @var string
     */
    private $chd_gender;

    /**
     * @var string
     */
    private $chd_hobbies;
    /**
     * @var string
     */
    private $chd_comments;
    /**
     * @var string
     */
    private $chd_img_path;
    /**
     * @var int
     */
    private $chd_insert;
    /**
     * @var int
     */
    private $chd_updated;

    /**
     * @var int
     */
    private $class_cls_id;
    /**
     * @var int
     */
    private $user_usr_id;


    /*----------------------------constructor---------------------*/

    /**
     * ChildModel constructor.
     * @param int $chd_id
     * @param string $chd_firstname
     * @param string $chd_lastname
     * @param string $chd_birthday
     * @param string $chd_gender
     * @param string $chd_hobbies
     * @param string $chd_comments
     * @param string $chd_img_path
     * @param int $chd_insert
     * @param int $chd_updated
     * @param int $class_cls_id
     * @param int $user_usr_id
     */
    public function __construct($chd_id = 0, $chd_firstname = '', $chd_lastname = '', $chd_birthday= NULL, $chd_gender= NULL, $chd_hobbies= NULL, $chd_comments= NULL, $chd_img_path= NULL, $chd_insert= NULL, $chd_updated= NULL, $class_cls_id= NULL, $user_usr_id= NULL)
    {
        parent::__construct();
        $this->setPrimaryKey('chd_id');
        $this->chd_id = $chd_id;
        $this->chd_firstname = $chd_firstname;
        $this->chd_lastname = $chd_lastname;
        $this->chd_date = $chd_birthday;
        $this->chd_gender = $chd_gender;
        $this->chd_hobbies = $chd_hobbies;
        $this->chd_comments = $chd_comments;
        $this->chd_img_path = $chd_img_path;
        $this->chd_insert = $chd_insert;
        $this->chd_updated = $chd_updated;
        $this->class_cls_id = $class_cls_id;
        $this->user_usr_id = $user_usr_id;
    }

    /*----------------------------Setters---------------------*/
    /**
     * @param int $chd_id
     */
    public function setChdId($chd_id)
    {
        $this->chd_id = $chd_id;
    }

    /**
     * @param string $chd_firstname
     */
    public function setChdFirstname($chd_firstname)
    {
        $this->chd_firstname = $chd_firstname;
    }

    /**
     * @param string $chd_lastname
     */
    public function setChdLastname($chd_lastname)
    {
        $this->chd_lastname = $chd_lastname;
    }


    /**
     * @param string $chd_birthday
     */
    public function setChdBirthday($chd_birthday)
    {
        $this->chd_birthday = $chd_birthday;
    }


    /**
     * @param string $chd_gender
     */
    public function setChdGender($chd_gender)
    {
        $this->chd_gender = $chd_gender;
    }

    /**
     * @param string $chd_hobbies
     */
    public function setChdHobbies($chd_hobbies)
    {
        $this->chd_hobbies = $chd_hobbies;
    }

    /**
     * @param string $chd_comments
     */
    public function setChdComments($chd_comments)
    {
        $this->chd_comments = $chd_comments;
    }

    /**
     * @param string $chd_img_path
     */
    public function setChdImgPath($chd_img_path)
    {
        $this->chd_img_path = $chd_img_path;
    }

    /**
     * @param int $chd_insert
     */
    public function setChdInsert($chd_insert)
    {
        $this->chd_insert = $chd_insert;
    }

    /**
     * @param int $chd_updated
     */
    public function setChdUpdated($chd_updated)
    {
        $this->chd_updated = $chd_updated;
    }

    /**
     * @param int $class_cls_id
     */
    public function setClassclsId($class_cls_id)
    {
        $this->class_cls_id = $class_cls_id;
    }

    /**
     * @param int $user_usr_id
     */
    public function setUserUsrId($user_usr_id)
    {
        $this->user_usr_id = $user_usr_id;
    }

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

    /*----------------------------Getters---------------------*/

    /**
     * @return int
     */
    public function getChdId()
    {
        return $this->chd_id;
    }

    /**
     * @return string
     */
    public function getChdFirstname()
    {
        return $this->chd_firstname;
    }

    /**
     * @return string
     */
    public function getChdLastname()
    {
        return $this->chd_lastname;
    }

    /**
     * @return string
     */
    public function getChdbirthday()
    {
        return $this->chd_birthday;
    }

    /**
     * @return string
     */
    public function getChdGender()
    {
        return $this->chd_gender;
    }

    /**
     * @return string
     */
    public function getChdHobbies()
    {
        return $this->chd_hobbies;
    }

    /**
     * @return string
     */
    public function getChdComments()
    {
        return $this->chd_comments;
    }

    /**
     * @return string
     */
    public function getChdImgPath()
    {
        return $this->chd_img_path;
    }

    /**
     * @return int
     */
    public function getChdInsert()
    {
        return $this->chd_insert;
    }

    /**
     * @return int
     */
    public function getChdUpdated()
    {
        return $this->chd_updated;
    }

    /**
     * @return int
     */
    public function getClassclsId()
    {
        return $this->class_cls_id;
    }

    /**
     * @return int
     */
    public function getUserUsrId()
    {
        return $this->user_usr_id;
    }

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

public function getListClass($userId){
         $sql = '
                SELECT 
                    *
                FROM
                    child
                        INNER JOIN
                    class ON class.cls_id = child.class_cls_id
                        INNER JOIN
                    user ON class.cls_id = user.class_cls_id
                        INNER JOIN
                    user as parent ON parent.usr_id = child.user_usr_id
                    	INNER JOIN
                    daily_report ON daily_report.child_chd_id = child.chd_id
                AND user.usr_id =:userId
                ';
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindValue(':userId', $userId);
        
        if ($stmt->execute() === false) {
            debug($stmt->errorInfo());
        }
        else {
            return $stmt->fetchAll();
        }
        
        return false;
    }

    public function getParentList($userId){
         $sql = '
               SELECT 
                    *
                FROM
                    child
                        INNER JOIN
                    class ON class.cls_id = child.class_cls_id
                        INNER JOIN
                    user ON user.usr_id = child.user_usr_id
                        INNER JOIN 
                    city ON city.cit_id = user.city_cit_id
                AND class.cls_id = :classeId
                ';
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindValue(':classeId', $classeId);
        
        if ($stmt->execute() === false) {
            debug($stmt->errorInfo());
        }
        else {
            return $stmt->fetchAll();
        }
        
        return false;
    }

    
}