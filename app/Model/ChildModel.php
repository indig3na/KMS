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
    private $chd_date;
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
    private $parent_par_id;


    /*----------------------------constructor---------------------*/

    /**
     * ChildModel constructor.
     * @param int $chd_id
     * @param string $chd_firstname
     * @param string $chd_lastname
     * @param string $chd_date
     * @param string $chd_gender
     * @param string $chd_hobbies
     * @param string $chd_comments
     * @param string $chd_img_path
     * @param int $chd_insert
     * @param int $chd_updated
     * @param int $class_cls_id
     * @param int $parent_par_id
     */
    public function __construct($chd_id, $chd_firstname, $chd_lastname, $chd_date, $chd_gender, $chd_hobbies, $chd_comments, $chd_img_path, $chd_insert, $chd_updated, $class_cls_id, $parent_par_id)
    {
        parent::__construct();
        $this->setPrimaryKey('chd_id');
        $this->chd_id = $chd_id;
        $this->chd_firstname = $chd_firstname;
        $this->chd_lastname = $chd_lastname;
        $this->chd_date = $chd_date;
        $this->chd_gender = $chd_gender;
        $this->chd_hobbies = $chd_hobbies;
        $this->chd_comments = $chd_comments;
        $this->chd_img_path = $chd_img_path;
        $this->chd_insert = $chd_insert;
        $this->chd_updated = $chd_updated;
        $this->class_cls_id = $class_cls_id;
        $this->parent_par_id = $parent_par_id;
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
     * @param string $chd_date
     */
    public function setChdDate($chd_date)
    {
        $this->chd_date = $chd_date;
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
    public function setClassClsId($class_cls_id)
    {
        $this->class_cls_id = $class_cls_id;
    }

    /**
     * @param int $parent_par_id
     */
    public function setParentParId($parent_par_id)
    {
        $this->parent_par_id = $parent_par_id;
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
    public function getChdDate()
    {
        return $this->chd_date;
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
    public function getClassClsId()
    {
        return $this->class_cls_id;
    }

    /**
     * @return int
     */
    public function getParentParId()
    {
        return $this->parent_par_id;
    }

















}