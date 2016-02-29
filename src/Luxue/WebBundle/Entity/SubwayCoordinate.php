<?php
/**
 * Created by PhpStorm.
 * User: luxue
 * Date: 2015/8/19
 * Time: 11:11
 */

namespace Luxue\WebBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Class Author
 * @package Luxue\WebBundle\Entity
 * @ORM\Entity(repositoryClass="SubwayCoordinateRepository")
 * @ORM\Table(name="subwaycoordinate")
 */
class SubwayCoordinate
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
    protected $name;

    /**
     * @ORM\Column(type="float")
     */
    protected $location_lat;

    /**
     * @ORM\Column(type="float")
     */
    protected $location_lng;

    /**
     * @ORM\ManyToMany(targetEntity="SubwayLine",mappedBy="stations")
     *
     */
    private $lines;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $istransferstation;


    /**
     * @ORM\Column(type="integer")
     */
    protected $influence_radius;


    /**
     * Set id
     *
     * @param string $id
     * @return SubwayCoordinate
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
     * Set name
     *
     * @param string $name
     * @return SubwayCoordinate
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set location_lat
     *
     * @param float $locationLat
     * @return SubwayCoordinate
     */
    public function setLocationLat($locationLat)
    {
        $this->location_lat = $locationLat;

        return $this;
    }

    /**
     * Get location_lat
     *
     * @return float 
     */
    public function getLocationLat()
    {
        return $this->location_lat;
    }

    /**
     * Set location_lng
     *
     * @param float $locationLng
     * @return SubwayCoordinate
     */
    public function setLocationLng($locationLng)
    {
        $this->location_lng = $locationLng;

        return $this;
    }

    /**
     * Get location_lng
     *
     * @return float 
     */
    public function getLocationLng()
    {
        return $this->location_lng;
    }


    /**
     * Set istransferstation
     *
     * @param boolean $istransferstation
     * @return SubwayCoordinate
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

    /**
     * Set influence_radius
     *
     * @param integer $influenceRadius
     * @return SubwayCoordinate
     */
    public function setInfluenceRadius($influenceRadius)
    {
        $this->influence_radius = $influenceRadius;

        return $this;
    }

    /**
     * Get influence_radius
     *
     * @return integer 
     */
    public function getInfluenceRadius()
    {
        return $this->influence_radius;
    }


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->lines = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add lines
     *
     * @param \Luxue\WebBundle\Entity\SubwayLine $lines
     * @return SubwayCoordinate
     */
    public function addLine(\Luxue\WebBundle\Entity\SubwayLine $lines)
    {
        $this->lines[] = $lines;

        return $this;
    }

    /**
     * Remove lines
     *
     * @param \Luxue\WebBundle\Entity\SubwayLine $lines
     */
    public function removeLine(\Luxue\WebBundle\Entity\SubwayLine $lines)
    {
        $this->lines->removeElement($lines);
    }

    /**
     * Get lines
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLines()
    {
        return $this->lines;
    }
}
