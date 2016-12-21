<?php
/**
 * Created by PhpStorm.
 * User: Indig3na
 * Date: 21/12/2016
 * Time: 23:10
 */

namespace Model;

/**
* Modèle pour la table MonthlyReport
* one foreign key
*/
class MonthlyReportModel extends ModelTemplate{
    /**
     * @var int
     */
    protected $mrp_id;
    /**
     * @var string
     */
    protected $mrp_dev_cog;
    /**
     * @var string
     */
    protected $mrp_dev_mot;
    /**
     * @var string
     */
    protected $mrp_mot_fin;
    /**
     * @var string
     */
    protected $mrp_dev_lin;
    /**
     * @var string
     */
    protected $mrp_dev_emo;
    /**
     * @var int
     */
    protected $mrp_month;

    public function __construct($mrp_id = 0, $mrp_dev_cog = NULL, $mrp_dev_mot = NULL, $mrp_mot_fin = NULL, $mrp_dev_lin = NULL, $mrp_dev_emo = NULL, $mrp_month = 0)
    {
        parent::__construct();
        $this->setPrimaryKey('drp_id');

        $this->mrp_id = $mrp_id;
        $this->mrp_dev_cog = $mrp_dev_cog;
        $this->mrp_dev_mot = $mrp_dev_mot;
        $this->mrp_mot_fin = $mrp_mot_fin;
        $this->mrp_dev_lin = $mrp_dev_lin;
        $this->mrp_dev_emo = $mrp_dev_emo;
        $this->mrp_month = $mrp_month;
    }

    //-----------------GETTERS & SETTERS--------------//

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

    /**
     * @return int
     */
    public function getMrpId()
    {
        return $this->mrp_id;
    }

    /**
     * @param int $mrp_id
     */
    public function setMrpId($mrp_id)
    {
        $this->mrp_id = $mrp_id;
    }

    /**
     * @return string
     */
    public function getMrpDevCog()
    {
        return $this->mrp_dev_cog;
    }

    /**
     * @param string $mrp_dev_cog
     */
    public function setMrpDevCog($mrp_dev_cog)
    {
        $this->mrp_dev_cog = $mrp_dev_cog;
    }

    /**
     * @return string
     */
    public function getMrpDevMot()
    {
        return $this->mrp_dev_mot;
    }

    /**
     * @param string $mrp_dev_mot
     */
    public function setMrpDevMot($mrp_dev_mot)
    {
        $this->mrp_dev_mot = $mrp_dev_mot;
    }

    /**
     * @return string
     */
    public function getMrpMotFin()
    {
        return $this->mrp_mot_fin;
    }

    /**
     * @param string $mrp_mot_fin
     */
    public function setMrpMotFin($mrp_mot_fin)
    {
        $this->mrp_mot_fin = $mrp_mot_fin;
    }

    /**
     * @return string
     */
    public function getMrpDevLin()
    {
        return $this->mrp_dev_lin;
    }

    /**
     * @param string $mrp_dev_lin
     */
    public function setMrpDevLin($mrp_dev_lin)
    {
        $this->mrp_dev_lin = $mrp_dev_lin;
    }

    /**
     * @return string
     */
    public function getMrpDevEmo()
    {
        return $this->mrp_dev_emo;
    }

    /**
     * @param string $mrp_dev_emo
     */
    public function setMrpDevEmo($mrp_dev_emo)
    {
        $this->mrp_dev_emo = $mrp_dev_emo;
    }

    /**
     * @return int
     */
    public function getMrpMonth()
    {
        return $this->mrp_month;
    }

    /**
     * @param int $mrp_month
     */
    public function setMrpMonth($mrp_month)
    {
        $this->mrp_month = $mrp_month;
    }

}