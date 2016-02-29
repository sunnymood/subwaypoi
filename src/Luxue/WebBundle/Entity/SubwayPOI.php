<?php
/**
 * Created by PhpStorm.
 * User: luxue
 * Date: 2015/8/19
 * Time: 11:35
 */

namespace Luxue\WebBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Class Author
 * @package Luxue\WebBundle\Entity
 * @ORM\Entity(repositoryClass="SubwayPOIRepository")
 * @ORM\Table(name="subwaypoi")
 */
class SubwayPOI
{

    /**
     * @ORM\Id
     * @ORM\Column(type="string",length=20)
     *
     */
    protected $id;

    /**
     * @ORM\Column(type="string",length=100)
     */
    protected $subwaystationname;

    /**
     * @ORM\Column(type="integer")
     */
    protected $entrance_number;

    /**
     * @ORM\Column(type="integer")
     */
    protected $bustransfer_number;

    /**
     * @ORM\Column(type="integer")
     */
    protected $governmententity_number;

    /**
     * @ORM\Column(type="integer")
     */
    protected $community_number;

    /**
     * @ORM\Column(type="integer")
     */
    protected $viewpoint_number;

    /**
     * @ORM\Column(type="integer")
     */
    protected $officebuilding_number;

    /**
     * @ORM\Column(type="integer")
     */
    protected $shoppingmall_number;

    /**
     * @ORM\Column(type="integer")
     */
    protected $hospital_number;

    /**
     * @ORM\Column(type="integer")
     */
    protected $school_number;

    /**
     * @ORM\Column(type="float")
     */
    protected $betweenness;

    /**
     * @ORM\Column(type="string",length=100)
     */
    protected $line1;

    /**
     * @ORM\Column(type="string",length=100)
     */
    protected $line2;

    /**
     * @ORM\Column(type="string",length=100)
     */
    protected $line3;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $istransferstation;






    /**
     * Set id
     *
     * @param string $id
     * @return SubwayPOI
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return string 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set subwaystationname
     *
     * @param string $subwaystationname
     * @return SubwayPOI
     */
    public function setSubwaystationname($subwaystationname)
    {
        $this->subwaystationname = $subwaystationname;

        return $this;
    }

    /**
     * Get subwaystationname
     *
     * @return string 
     */
    public function getSubwaystationname()
    {
        return $this->subwaystationname;
    }

    /**
     * Set entrance_number
     *
     * @param integer $entranceNumber
     * @return SubwayPOI
     */
    public function setEntranceNumber($entranceNumber)
    {
        $this->entrance_number = $entranceNumber;

        return $this;
    }

    /**
     * Get entrance_number
     *
     * @return integer 
     */
    public function getEntranceNumber()
    {
        return $this->entrance_number;
    }

    /**
     * Set bustransfer_number
     *
     * @param integer $bustransferNumber
     * @return SubwayPOI
     */
    public function setBustransferNumber($bustransferNumber)
    {
        $this->bustransfer_number = $bustransferNumber;

        return $this;
    }

    /**
     * Get bustransfer_number
     *
     * @return integer 
     */
    public function getBustransferNumber()
    {
        return $this->bustransfer_number;
    }

    /**
     * Set governmententity_number
     *
     * @param integer $governmententityNumber
     * @return SubwayPOI
     */
    public function setGovernmententityNumber($governmententityNumber)
    {
        $this->governmententity_number = $governmententityNumber;

        return $this;
    }

    /**
     * Get governmententity_number
     *
     * @return integer 
     */
    public function getGovernmententityNumber()
    {
        return $this->governmententity_number;
    }

    /**
     * Set community_number
     *
     * @param integer $communityNumber
     * @return SubwayPOI
     */
    public function setCommunityNumber($communityNumber)
    {
        $this->community_number = $communityNumber;

        return $this;
    }

    /**
     * Get community_number
     *
     * @return integer 
     */
    public function getCommunityNumber()
    {
        return $this->community_number;
    }

    /**
     * Set viewpoint_number
     *
     * @param integer $viewpointNumber
     * @return SubwayPOI
     */
    public function setViewpointNumber($viewpointNumber)
    {
        $this->viewpoint_number = $viewpointNumber;

        return $this;
    }

    /**
     * Get viewpoint_number
     *
     * @return integer 
     */
    public function getViewpointNumber()
    {
        return $this->viewpoint_number;
    }

    /**
     * Set officebuilding_number
     *
     * @param integer $officebuildingNumber
     * @return SubwayPOI
     */
    public function setOfficebuildingNumber($officebuildingNumber)
    {
        $this->officebuilding_number = $officebuildingNumber;

        return $this;
    }

    /**
     * Get officebuilding_number
     *
     * @return integer 
     */
    public function getOfficebuildingNumber()
    {
        return $this->officebuilding_number;
    }

    /**
     * Set shoppingmall_number
     *
     * @param integer $shoppingmallNumber
     * @return SubwayPOI
     */
    public function setShoppingmallNumber($shoppingmallNumber)
    {
        $this->shoppingmall_number = $shoppingmallNumber;

        return $this;
    }

    /**
     * Get shoppingmall_number
     *
     * @return integer 
     */
    public function getShoppingmallNumber()
    {
        return $this->shoppingmall_number;
    }

    /**
     * Set hospital_number
     *
     * @param integer $hospitalNumber
     * @return SubwayPOI
     */
    public function setHospitalNumber($hospitalNumber)
    {
        $this->hospital_number = $hospitalNumber;

        return $this;
    }

    /**
     * Get hospital_number
     *
     * @return integer 
     */
    public function getHospitalNumber()
    {
        return $this->hospital_number;
    }

    /**
     * Set school_number
     *
     * @param integer $schoolNumber
     * @return SubwayPOI
     */
    public function setSchoolNumber($schoolNumber)
    {
        $this->school_number = $schoolNumber;

        return $this;
    }

    /**
     * Get school_number
     *
     * @return integer 
     */
    public function getSchoolNumber()
    {
        return $this->school_number;
    }

    /**
     * Set betweenness
     *
     * @param float $betweenness
     * @return SubwayPOI
     */
    public function setBetweenness($betweenness)
    {
        $this->betweenness = $betweenness;

        return $this;
    }

    /**
     * Get betweenness
     *
     * @return float 
     */
    public function getBetweenness()
    {
        return $this->betweenness;
    }

    /**
     * Set line1
     *
     * @param string $line1
     * @return SubwayPOI
     */
    public function setLine1($line1)
    {
        $this->line1 = $line1;

        return $this;
    }

    /**
     * Get line1
     *
     * @return string 
     */
    public function getLine1()
    {
        return $this->line1;
    }

    /**
     * Set line2
     *
     * @param string $line2
     * @return SubwayPOI
     */
    public function setLine2($line2)
    {
        $this->line2 = $line2;

        return $this;
    }

    /**
     * Get line2
     *
     * @return string 
     */
    public function getLine2()
    {
        return $this->line2;
    }

    /**
     * Set line3
     *
     * @param string $line3
     * @return SubwayPOI
     */
    public function setLine3($line3)
    {
        $this->line3 = $line3;

        return $this;
    }

    /**
     * Get line3
     *
     * @return string 
     */
    public function getLine3()
    {
        return $this->line3;
    }

    /**
     * Set istransferstation
     *
     * @param boolean $istransferstation
     * @return SubwayPOI
     */
    public function setIstransferstation($istransferstation)
    {
        $this->istransferstation = $istransferstation;

        return $this;
    }

    /**
     * Get istransferstation
     *
     * @return boolean 
     */
    public function getIstransferstation()
    {
        return $this->istransferstation;
    }
}
