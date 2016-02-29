<?php
/**
 * Created by PhpStorm.
 * User: luxue
 * Date: 2015/8/15
 * Time: 15:55
 */

namespace Luxue\WebBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Book
 * @package Luxue\WebBundle\Entity
 * @ORM\Entity(repositoryClass="BookRepository")
 * @ORM\Table(name="book")
 */
class Book
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $title;

    /**
     * @ORM\Column(type="float")
     */
    protected $price;

    /**
     * @ORM\Column(name="Press",type="string")
     */
    protected $Press;

    /**
     * @ORM\ManyToMany(targetEntity="User",inversedBy="books")
     * @ORM\JoinTable(name="users_books")
     */
    private $users;

    /**
     * @ORM\ManyToOne(targetEntity="Author",inversedBy="books")
     * @ORM\JoinColumn(name="author_id",referencedColumnName="id")
     */
    private $author;

    /**
     * @ORM\ManyToMany(targetEntity="Category",inversedBy="books")
     * @ORM\JoinTable(name="categories_books")
     */
    private $categories;









    /**
     * Constructor
     */
    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
        $this->categories = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add users
     *
     * @param \Luxue\WebBundle\Entity\User $users
     * @return Book
     */
    public function addUser(\Luxue\WebBundle\Entity\User $users)
    {
        $this->users[] = $users;

        return $this;
    }

    /**
     * Remove users
     *
     * @param \Luxue\WebBundle\Entity\User $users
     */
    public function removeUser(\Luxue\WebBundle\Entity\User $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Set author
     *
     * @param \Luxue\WebBundle\Entity\Author $author
     * @return Book
     */
    public function setAuthor(\Luxue\WebBundle\Entity\Author $author = null)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return \Luxue\WebBundle\Entity\Author 
     */
    public function getAuthor()
    {
        return $this->author;
    }



    /**
     * Add categories
     *
     * @param \Luxue\WebBundle\Entity\Category $categories
     * @return Book
     */
    public function addCategory(\Luxue\WebBundle\Entity\Category $categories)
    {
        $this->categories[] = $categories;

        return $this;
    }

    /**
     * Remove categories
     *
     * @param \Luxue\WebBundle\Entity\Category $categories
     */
    public function removeCategory(\Luxue\WebBundle\Entity\Category $categories)
    {
        $this->categories->removeElement($categories);
    }

    /**
     * Get categories
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Book
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set price
     *
     * @param float $price
     * @return Book
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set Press
     *
     * @param string $press
     * @return Book
     */
    public function setPress($press)
    {
        $this->Press = $press;

        return $this;
    }

    /**
     * Get Press
     *
     * @return string 
     */
    public function getPress()
    {
        return $this->Press;
    }
}
