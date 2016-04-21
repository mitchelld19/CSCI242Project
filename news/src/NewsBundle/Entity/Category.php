<?php

namespace NewsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity(repositoryClass="NewsBundle\Repository\CategoryRepository")
 */
class Category
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=20, unique=true)
     */
    private $category;
    
    /**
     * @ORM\OneToMany(targetEntity="Article", mappedBy="category", cascade={"remove"})
     */
    private $articles;
    
    public function __construct()
    {
        $this->articles = new ArrayCollection();
    }
    
    public function __toString()
    {
        return $this->category;
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
     * Set category
     *
     * @param string $category
     * @return Category
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string 
     */
    public function getCategory()
    {
        return $this->category;
    }
    
    /**
     * Get article
     */
    public function getArticle()
    {
        return $this->articles;
    }
    
    /**
     * Set article
     */
     public function setArticle($article)
     {
         $this->articles[] = $article;
         return $this;
     }
}
