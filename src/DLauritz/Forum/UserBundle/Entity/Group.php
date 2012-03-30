<?php

namespace DLauritz\Forum\UserBundle\Entity;

use Symfony\Component\Security\Core\Role\RoleInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * DLauritz\Forum\UserBundle\Entity\Group
 */
class Group implements RoleInterface
{
    private $role;

    /**
     * Set role
     *
     * @param string $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * Get role
     *
     * @return string 
     */
    public function getRole()
    {
        return $this->role;
    }
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $name
     */
    private $name;

    /**
     * @var DLauritz\Forum\ContentBundle\Entity\Permissions
     */
    private $permissions;

    /**
     * @var DLauritz\Forum\UserBundle\Entity\User
     */
    private $members;

    public function __construct()
    {
        $this->permissions = new \Doctrine\Common\Collections\ArrayCollection();
    $this->members = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add permissions
     *
     * @param DLauritz\Forum\ContentBundle\Entity\Permissions $permissions
     */
    public function addPermissions(\DLauritz\Forum\ContentBundle\Entity\Permissions $permissions)
    {
        $this->permissions[] = $permissions;
    }

    /**
     * Get permissions
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getPermissions()
    {
        return $this->permissions;
    }

    /**
     * Add members
     *
     * @param DLauritz\Forum\UserBundle\Entity\User $members
     */
    public function addUser(\DLauritz\Forum\UserBundle\Entity\User $members)
    {
        $this->members[] = $members;
    }

    /**
     * Get members
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getMembers()
    {
        return $this->members;
    }
    /**
     * @var string $description
     */
    private $description;


    /**
     * Set description
     *
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }
	
}