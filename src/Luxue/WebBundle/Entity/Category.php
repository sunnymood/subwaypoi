<?php
/**
 * Created by PhpStorm.
 * User: luxue
 * Date: 2015/8/15
 * Time: 16:11
 */

namespace Luxue\WebBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Category
 * @package Luxue\WebBundle\Entity
 * @ORM\Entity(repositoryClass="CategoryRepository")
 * @ORM\Table(name="category")
 */
class Category
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
     * @ORM\ManyToOne(targetEntity="Author",inversedBy="categories")
     * @ORM\JoinColumn(name="author_id",referencedColumnName="id")
     */
    private $author;

    /**
     * @ORM\OneToMany(targetEntity="Category",mappedBy="parent")
     */
    private $children;

    /**
     * @ORM\ManyToOne(targetEntity="Category",inversedBy="children")
     * @ORM\JoinColumn(name="parent_id",referencedColumnName="id")
     */
    private $parent;

    /**
     * @ORM\ManyToMany(targetEntity="Book",mappedBy="categories")
     */
    private $books;





    /**
     * Constructor
     */
    public function __construct()
    {
        $this->children = new \Doctrine\Common\Collections\ArrayCollection();
        $this->books = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Category
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
     * Set author
     *
     * @param \Luxue\WebBundle\Entity\Author $author
     * @return Category
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
     * Add children
     *
     * @param \Luxue\WebBundle\Entity\Category $children
     * @return Category
     */
    public function addChild(\Luxue\WebBundle\Entity\Category $children)
    {
        $this->children[] = $children;

        return $this;
    }

    /**
     * Remove children
     *
     * @param \Luxue\WebBundle\Entity\Category $children
     */
    public function removeChild(\Luxue\WebBundle\Entity\Category $children)
    {
        $this->children->removeElement($children);
    }

    /**
     * Get children
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Set parent
     *
     * @param \Luxue\WebBundle\Entity\Category $parent
     * @return Category
     */
    public function setParent(\Luxue\WebBundle\Entity\Category $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \Luxue\WebBundle\Entity\Category 
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Add books
     *
     * @param \Luxue\WebBundle\Entity\Book $books
     * @return Category
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
}
