<?php
namespace DLauritz\Forum\ContentBundle\Entity;

class Forum {
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $name
     */
    private $name;

    /**
     * @var DLauritz\Forum\ContentBundle\Entity\Post
     */
    private $posts;

    /**
     * @var DLauritz\Forum\ContentBundle\Entity\Forum
     */
    private $children;

    /**
     * @var DLauritz\Forum\ContentBundle\Entity\Forum
     */
    private $parent;

    public function __construct()
    {
        $this->posts = new \Doctrine\Common\Collections\ArrayCollection();
    $this->children = new \Doctrine\Common\Collections\ArrayCollection();
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
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * Add posts
     *
     * @param DLauritz\Forum\ContentBundle\Entity\Post $posts
     */
    public function addPost(\DLauritz\Forum\ContentBundle\Entity\Post $posts)
    {
        $this->posts[] = $posts;
    }

    /**
     * Get posts
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getPosts()
    {
        return $this->posts;
    }

    /**
     * Add children
     *
     * @param DLauritz\Forum\ContentBundle\Entity\Forum $children
     */
    public function addForum(\DLauritz\Forum\ContentBundle\Entity\Forum $children)
    {
        $this->children[] = $children;
    }

    /**
     * Get children
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Set parent
     *
     * @param DLauritz\Forum\ContentBundle\Entity\Forum $parent
     */
    public function setParent(\DLauritz\Forum\ContentBundle\Entity\Forum $parent)
    {
        $this->parent = $parent;
    }

    /**
     * Get parent
     *
     * @return DLauritz\Forum\ContentBundle\Entity\Forum 
     */
    public function getParent()
    {
        return $this->parent;
    }
    /**
     * @var DLauritz\Forum\ContentBundle\Entity\Thread
     */
    private $threads;


    /**
     * Add threads
     *
     * @param DLauritz\Forum\ContentBundle\Entity\Thread $threads
     */
    public function addThread(\DLauritz\Forum\ContentBundle\Entity\Thread $threads)
    {
        $this->threads[] = $threads;
    }

    /**
     * Get threads
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getThreads()
    {
        return $this->threads;
    }
}