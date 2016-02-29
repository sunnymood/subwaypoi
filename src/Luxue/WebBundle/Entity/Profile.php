<?php
/**
 * Created by PhpStorm.
 * User: luxue
 * Date: 2015/8/14
 * Time: 11:09
 */

namespace Luxue\WebBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToOne;
use Doctrine\ORM\Mapping\JoinColumn;


    /*1.The inverse side has to use the mappedBy attribute of the OneToOne, OneToMany, or ManyToMany mapping declaration.
    The mappedBy attribute contains the name of the association-field on the owning side.

    2.The owning side has to use the inversedBy attribute of the OneToOne, ManyToOne, or ManyToMany mapping declaration.
    The inversedBy attribute contains the name of the association-field on the inverse-side.

    3.ManyToOne is always the owning side of a bidirectional association.
    4.OneToMany is always the inverse side of a bidirectional association.
    5.The owning side of a OneToOne association is the entity with the table containing the foreign key.
    6.You can pick the owning side of a many-to-many association yourself.
    */

/**
 * Class Profile
 * @ORM\Entity(repositoryClass="ProfileRepository")
 * @ORM\Table(name="profile")
 */
class Profile
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $mobile_number;

    /**
     * @OneToOne(targetEntity="User",inversedBy="profile")
     * @JoinColumn(name="user_id",referencedColumnName="id")
     */
    private $user;

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
     * Set mobile_number
     *
     * @param integer $mobileNumber
     * @return Profile
     */
    public function setMobileNumber($mobileNumber)
    {
        $this->mobile_number = $mobileNumber;

        return $this;
    }

    /**
     * Get mobile_number
     *
     * @return integer 
     */
    public function getMobileNumber()
    {
        return $this->mobile_number;
    }

    /**
     * Set user
     *
     * @param \Luxue\WebBundle\Entity\user $user
     * @return Profile
     */
    public function setUser(\Luxue\WebBundle\Entity\user $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Luxue\WebBundle\Entity\user 
     */
    public function getUser()
    {
        return $this->user;
    }
}
