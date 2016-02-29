<?php
/**
 * Created by PhpStorm.
 * User: luxue
 * Date: 2015/8/19
 * Time: 15:55
 */

namespace Luxue\WebBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Book
 * @package Luxue\WebBundle\Entity
 * @ORM\Entity(repositoryClass="SubwayLineRepository")
 * @ORM\Table(name="subwayline")
 */
class SubwayLine
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $linename;

    /**
     * @ORM\ManyToMany(targetEntity="SubwayCoordinate",inversedBy="lines")
     * @ORM\JoinTable(name="stations_lines")
     */
    private $stations;

    /**
     * Set id
     *
     * @param string $id
     * @return SubwayLine
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set linename
     *
     * @param string $linename
     * @return SubwayLine
     */
    public function setLinename($linename)
    {
        $this->linename = $linename;

        return $this;
    }

    /**
     * Get linename
     *
     * @return string 
     */
    public function getLinename()
    {
        return $this->linename;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->stations = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add stations
     *
     * @param \Luxue\WebBundle\Entity\SubwayCoordinate $stations
     * @return SubwayLine
     */
    public function addStation(\Luxue\WebBundle\Entity\SubwayCoordinate $stations)
    {
        $this->stations[] = $stations;

        return $this;
    }

    /**
     * Remove stations
     *
     * @param \Luxue\WebBundle\Entity\SubwayCoordinate $stations
     */
    public function removeStation(\Luxue\WebBundle\Entity\SubwayCoordinate $stations)
    {
        $this->stations->removeElement($stations);
    }

    /**
     * Get stations
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getStations()
    {
        return $this->stations;
    }


}
