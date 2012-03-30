<?php

namespace DLauritz\Forum\ContentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DLauritz\Forum\ContentBundle\Entity\Permissions
 */
class Permissions
{
    /**
     * @var boolean $view
     */
    private $view;

    /**
     * @var boolean $edit
     */
    private $edit;

    /**
     * @var boolean $moderate
     */
    private $moderate;

    /**
     * @var DLauritz\Forum\ContentBundle\Entity\Forum
     */
    private $forum;

    /**
     * @var DLauritz\Forum\ContentBundle\Entity\Group
     */
    private $group;


    /**
     * Set view
     *
     * @param boolean $view
     */
    public function setView($view)
    {
        $this->view = $view;
    }

    /**
     * Get view
     *
     * @return boolean 
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * Set edit
     *
     * @param boolean $edit
     */
    public function setEdit($edit)
    {
        $this->edit = $edit;
    }

    /**
     * Get edit
     *
     * @return boolean 
     */
    public function getEdit()
    {
        return $this->edit;
    }

    /**
     * Set moderate
     *
     * @param boolean $moderate
     */
    public function setModerate($moderate)
    {
        $this->moderate = $moderate;
    }

    /**
     * Get moderate
     *
     * @return boolean 
     */
    public function getModerate()
    {
        return $this->moderate;
    }

    /**
     * Set forum
     *
     * @param DLauritz\Forum\ContentBundle\Entity\Forum $forum
     */
    public function setForum(\DLauritz\Forum\ContentBundle\Entity\Forum $forum)
    {
        $this->forum = $forum;
    }

    /**
     * Get forum
     *
     * @return DLauritz\Forum\ContentBundle\Entity\Forum 
     */
    public function getForum()
    {
        return $this->forum;
    }

    /**
     * Set group
     *
     * @param DLauritz\Forum\ContentBundle\Entity\Group $group
     */
    public function setGroup(\DLauritz\Forum\ContentBundle\Entity\Group $group)
    {
        $this->group = $group;
    }

    /**
     * Get group
     *
     * @return DLauritz\Forum\ContentBundle\Entity\Group 
     */
    public function getGroup()
    {
        return $this->group;
    }
    /**
     * @var integer $id
     */
    private $id;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
    public function __construct()
    {
        $this->forum = new \Doctrine\Common\Collections\ArrayCollection();
    $this->group = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add forum
     *
     * @param DLauritz\Forum\ContentBundle\Entity\Forum $forum
     */
    public function addForum(\DLauritz\Forum\ContentBundle\Entity\Forum $forum)
    {
        $this->forum[] = $forum;
    }

    /**
     * Add group
     *
     * @param DLauritz\Forum\UserBundle\Entity\Group $group
     */
    public function addGroup(\DLauritz\Forum\UserBundle\Entity\Group $group)
    {
        $this->group[] = $group;
    }
    /**
     * @var DLauritz\Forum\ContentBundle\Entity\Thread
     */
    private $thread;


    /**
     * Set thread
     *
     * @param DLauritz\Forum\ContentBundle\Entity\Thread $thread
     */
    public function setThread(\DLauritz\Forum\ContentBundle\Entity\Thread $thread)
    {
        $this->thread = $thread;
    }

    /**
     * Get thread
     *
     * @return DLauritz\Forum\ContentBundle\Entity\Thread 
     */
    public function getThread()
    {
        return $this->thread;
    }
}