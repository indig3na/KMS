<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 20/12/2016
 * Time: 12:02
 */

namespace Model;

/**
 * Modèle pour la table DailyReport
 * one foreign key
 */
class DailyReportModel extends ModelTemplate
{
    /**
     * @var int
     */
    protected $drp_id;
    /**
     * @var string
     */
    protected $drp_repas_matin;
    /**
     * @var string
     */
    protected $drp_repas_midi;
    /**
     * @var string
     */
    protected $drp_repas_apresmidi;
    /**
     * @var int
     */
    protected $drp_fisio_wet;
    /**
     * @var int
     */
    protected $drp_fisio_poo;
    /**
     * @var int
     */
    protected $drp_sieste;
    /**
     * @var string
     */
    protected $drp_comments;
    /**
     * @var date
     */
    protected $drp_date;

    public function __construct($drp_id = 0, $drp_repas_matin = NULL, $drp_repas_midi = NULL, $drp_repas_apresmidi = NULL, $drp_fisio_wet = 0, $drp_fisio_poo = 0, $drp_sieste = 0, $drp_comments = NULL, $drp_date = '0000-00-00')
    {
    parent::__construct();
    $this->setPrimaryKey('drp_id');

    $this->drp_id = $drp_id;
    $this->drp_repas_matin = $drp_repas_matin;
    $this->drp_repas_midi = $drp_repas_midi;
    $this->drp_repas_apresmidi = $drp_repas_apresmidi;
    $this->drp_fisio_wet = $drp_fisio_wet;
    $this->drp_fisio_poo = $drp_fisio_poo;
    $this->drp_sieste = $drp_sieste;
    $this->drp_comments = $drp_comments;
    $this->drp_date = $drp_date;
    }

     //-----------------GETTERS & SETTERS--------------

    /**
     * @return int
     */
    public function getDrpId()
    {
        return $this->drp_id;
    }

    /**
     * @param int $drp_id
     */
    public function setDrpId($drp_id)
    {
        $this->drp_id = $drp_id;
    }

    /**
     * @return string
     */
    public function getDrpRepasMatin()
    {
        return $this->drp_repas_matin;
    }

    /**
     * @param string $drp_repas_matin
     */
    public function setDrpRepasMatin($drp_repas_matin)
    {
        $this->drp_repas_matin = $drp_repas_matin;
    }

    /**
     * @return string
     */
    public function getDrpRepasMidi()
    {
        return $this->drp_repas_midi;
    }

    /**
     * @param string $drp_repas_midi
     */
    public function setDrpRepasMidi($drp_repas_midi)
    {
        $this->drp_repas_midi = $drp_repas_midi;
    }

    /**
     * @return string
     */
    public function getDrpRepasApresmidi()
    {
        return $this->drp_repas_apresmidi;
    }

    /**
     * @param string $drp_repas_apresmidi
     */
    public function setDrpRepasApresmidi($drp_repas_apresmidi)
    {
        $this->drp_repas_apresmidi = $drp_repas_apresmidi;
    }

    /**
     * @return int
     */
    public function getDrpFisioWet()
    {
        return $this->drp_fisio_wet;
    }

    /**
     * @param int $drp_fisio_wet
     */
    public function setDrpFisioWet($drp_fisio_wet)
    {
        $this->drp_fisio_wet = $drp_fisio_wet;
    }

    /**
     * @return int
     */
    public function getDrpFisioPoo()
    {
        return $this->drp_fisio_poo;
    }

    /**
     * @param int $drp_fisio_poo
     */
    public function setDrpFisioPoo($drp_fisio_poo)
    {
        $this->drp_fisio_poo = $drp_fisio_poo;
    }

    /**
     * @return int
     */
    public function getDrpSieste()
    {
        return $this->drp_sieste;
    }

    /**
     * @param int $drp_sieste
     */
    public function setDrpSieste($drp_sieste)
    {
        $this->drp_sieste = $drp_sieste;
    }

    /**
     * @return string
     */
    public function getDrpComments()
    {
        return $this->drp_comments;
    }

    /**
     * @param string $drp_comments
     */
    public function setDrpComments($drp_comments)
    {
        $this->drp_comments = $drp_comments;
    }

    /**
     * @return date
     */
    public function getDrpDate()
    {
        return $this->drp_date;
    }

    /**
     * @param date $drp_date
     */
    public function setDrpDate($drp_date)
    {
        $this->drp_date = $drp_date;
    }

    /**
     * @return \PDO
     */
    public function getDbh()
    {
        return $this->dbh;
    }

    /**
     * @param \PDO $dbh
     */
    public function setDbh($dbh)
    {
        $this->dbh = $dbh;
    }

}