<?php
namespace DLauritz\Forum\UserBundle\Entity;
use Symfony\Component\Security\Core\User\UserInterface;

class User implements UserInterface {

	private $username;
	private $password;
	private $roles;

	public function getSalt() {
		return "98f0d88e99ha9b309c9d9a4";
	}
	
	public function getUsername() {
		return $this->username;
	}
	
	public function getPassword() {
		return $this->password;
	}
	
	public function eraseCredentials() {
		$this->password = "";
	}
	
	public function equals(UserInterface $user) {
		return $this->username == $user->getUsername();
	}
	
	public function getRoles() {
		return $this->roles;
	}

    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $display_name
     */
    private $display_name;

    /**
     * @var string $email
     */
    private $email;


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
     * Set username
     *
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * Set password
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Set display_name
     *
     * @param string $displayName
     */
    public function setDisplayName($displayName)
    {
        $this->display_name = $displayName;
    }

    /**
     * Get display_name
     *
     * @return string 
     */
    public function getDisplayName()
    {
        return $this->display_name;
    }

    /**
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }
    /**
     * @var DLauritz\Forum\ContentBundle\Entity\Post
     */
    private $posts;

    public function __construct()
    {
        $this->posts = new \Doctrine\Common\Collections\ArrayCollection();
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
}