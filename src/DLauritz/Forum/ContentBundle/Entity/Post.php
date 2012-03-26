<?php
namespace DLauritz\Forum\ContentBundle\Entity;

class Post {
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var \DateTime $created
     */
    private $created;

    /**
     * @var \DateTime $modified
     */
    private $modified;


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
     * Set created
     *
     * @param \DateTime $created
     */
    public function setCreated(DateTime $created)
    {
        $this->created = $created;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set modified
     *
     * @param \DateTime $modified
     */
    public function setModified(DateTime $modified)
    {
        $this->modified = $modified;
    }

    /**
     * Get modified
     *
     * @return \DateTime 
     */
    public function getModified()
    {
        return $this->modified;
    }
    /**
     * @var DLauritz\Forum\UserBundle\Entity\User
     */
    private $creator;


    /**
     * Set creator
     *
     * @param DLauritz\Forum\UserBundle\Entity\User $creator
     */
    public function setCreator(\DLauritz\Forum\UserBundle\Entity\User $creator)
    {
        $this->creator = $creator;
    }

    /**
     * Get creator
     *
     * @return DLauritz\Forum\UserBundle\Entity\User 
     */
    public function getCreator()
    {
        return $this->creator;
    }
    /**
     * @var DLauritz\Forum\ContentBundle\Entity\Forum
     */
    private $forum;


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
     * @var text $content
     */
    private $content;


    /**
     * Set content
     *
     * @param text $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * Get content
     *
     * @return text 
     */
    public function getContent()
    {
        return $this->content;
    }
}