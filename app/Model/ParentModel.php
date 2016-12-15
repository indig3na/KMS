<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 15/12/2016
 * Time: 09:44
 */

namespace Model;
use Model\ModelTemplate;

class ParentModel extends ModelTemplate
{
    /*----------------Properties------------------*/
    /**
     * @var int
     */
    private $par_id;
    /**
     * @var string
     */
    private $par_firstname;
    /**
     * @var string
     */
    private $par_lastname;
    /**
     * @var int
     */
    private $par_tel_mobile_1;

    /**
     * @var int
     */
    private $par_tel_mobile_2;
    /**
     * @var int
     */
    private $par_tel_domicile;
    /**
     * @var int
     */
    private $par_tel_bureau;

    /**
     * @var string
     */
    private $par_email;
    /**
     * @var string
     */
    private $par_password;
    /**
     * @var string
     */
    private $par_token;
    /**
     * @var string
     */
    private $par_email;
    /**
     * @var int
     */
    private $par_insert;
    /**
     * @var int
     */
    private $par_updated;

    /**
     * @var int
     */
    private $city_cit_id;

    /*----------------Properties------------------*/

    /**
     * ParentController constructor.
     * @param int $par_id
     * @param string $par_firstname
     * @param string $par_lastname
     * @param int $par_tel_mobile_1
     * @param int $par_tel_mobile_2
     * @param int $par_tel_domicile
     * @param int $par_tel_bureau
     * @param string $par_email
     * @param string $par_password
     * @param string $par_token
     * @param int $par_insert
     * @param int $par_updated
     * @param int $city_cit_id
     */
    public function __construct($par_id, $par_firstname, $par_lastname, $par_tel_mobile_1, $par_tel_mobile_2, $par_tel_domicile, $par_tel_bureau, $par_email, $par_password, $par_token, $par_insert, $par_updated, $city_cit_id)
    {
        parent::__constructor();

        $this->par_id = $par_id;
        $this->par_firstname = $par_firstname;
        $this->par_lastname = $par_lastname;
        $this->par_tel_mobile_1 = $par_tel_mobile_1;
        $this->par_tel_mobile_2 = $par_tel_mobile_2;
        $this->par_tel_domicile = $par_tel_domicile;
        $this->par_tel_bureau = $par_tel_bureau;
        $this->par_email = $par_email;
        $this->par_password = $par_password;
        $this->par_token = $par_token;
        $this->par_insert = $par_insert;
        $this->par_updated = $par_updated;
        $this->city_cit_id = $city_cit_id;
    }


}