<?php
/**
 * Created by PhpStorm.
 * User: luxue
 * Date: 2015/8/15
 * Time: 15:45
 */

namespace Luxue\WebBundle\Entity;


use Doctrine\ORM\Mapping as ORM;


/**
 * Class Author
 * @package Luxue\WebBundle\Entity
 * @ORM\Entity(repositoryClass="AuthorRepository")
 * @ORM\Table(name="author")
 */
class Author
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
    protected $name;

    /**
     * @ORM\OneToMany(targetEntity="Book",mappedBy="author")
     */
    private $books;

    /**
     * @ORM\OneToMany(targetEntity="Category",mappedBy="author")
     */
    private $categories;



    /**
     * Constructor
     */
    public function __construct()
    {
        $this->books = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Author
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
     * Add books
     *
     * @param \Luxue\WebBundle\Entity\Book $books
     * @return Author
     */
    public function addBook(\Luxue\WebBundle\Entity\Book $books)
    {
        $this->books[] = $books;

        return $this;
    }

    /**
     * Remove books
     *
     * @param \Luxue\WebBundle\Entity\Book $books
     */
    public function removeBook(\Luxue\WebBundle\Entity\Book $books)
    {
        $this->books->removeElement($books);
    }

    /**
     * Get books
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBooks()
    {
        return $this->books;
    }

    /**
     * Add categories
     *
     * @param \Luxue\WebBundle\Entity\Category $categories
     * @return Author
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
}
