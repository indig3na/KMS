<?php
/**
 * Created by PhpStorm.
 * User: Hicham
 * Date: 21/12/2016
 * Time: 20:59
 */

namespace Model;
use Model\ModelTemplate;


class ContactModel extends ModelTemplate {
    /**
     * @var int
     */
    private $ctc_id;
    /**
     * @var string
     */
    private $ctc_name;
    /**
     * @var string
     */
    private $ctc_email;
    /**
     * @var string
     */
    private $ctc_subject;
    /**
     * @var string
     */
    private $ctc_message;

    function __construct($ctc_id= 0, $ctc_name='', $ctc_email ='', $ctc_subject='', $ctc_message='')
    {
        parent::__construct();
        $this->setPrimaryKey('ctc_id');
        $this->ctc_id = $ctc_id;
        $this->ctc_name = $ctc_name;
        $this->ctc_email = $ctc_email;
        $this->ctc_subject = $ctc_subject;
        $this->ctc_message = $ctc_message;
    }


    /**
     * @return int
     */
    public function getCtcId()
    {
        return $this->ctc_id;
    }

    /**
     * @param int $ctc_id
     */
    public function setCtcId($ctc_id)
    {
        $this->ctc_id = $ctc_id;
    }

    /**
     * @return string
     */
    public function getCtcName()
    {
        return $this->ctc_name;
    }

    /**
     * @param string $ctc_name
     */
    public function setCtcName($ctc_name)
    {
        $this->ctc_name = $ctc_name;
    }

    /**
     * @return string
     */
    public function getCtcEmail()
    {
        return $this->ctc_email;
    }

    /**
     * @param string $ctc_email
     */
    public function setCtcEmail($ctc_email)
    {
        $this->ctc_email = $ctc_email;
    }

    /**
     * @return string
     */
    public function getCtcSubject()
    {
        return $this->ctc_subject;
    }

    /**
     * @param string $ctc_subject
     */
    public function setCtcSubject($ctc_subject)
    {
        $this->ctc_subject = $ctc_subject;
    }

    /**
     * @return string
     */
    public function getCtcMessage()
    {
        return $this->ctc_message;
    }

    /**
     * @param string $ctc_message
     */
    public function setCtcMessage($ctc_message)
    {
        $this->ctc_message = $ctc_message;
    }



}