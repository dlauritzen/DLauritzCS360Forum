<?php
namespace DLauritz\Forum\UserBundle\Entity;
use Symfony\Component\Security\Core\User\UserInterface;

class User implements UserInterface, \Serializable {

	private $username;
	private $password;

	public function getSalt() {
		return "7d185e23d3f71db59795ebea39c5fca6";
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
		$roles = array();
		foreach ($this->groups as $group) {
			$roles[] = $group->getRole();
		}
		return $roles;
	}
	
	public function hasRole($role) {
		$roles = $this->getRoles();
		foreach ($roles as $r) {
			if ($role == $r) {
				return true;
			}
		}
		return false;
	}

    /**
	 * @Id
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
    /**
     * @var DLauritz\Forum\UserBundle\Entity\Group
     */
    private $groups;


    /**
     * Add groups
     *
     * @param DLauritz\Forum\UserBundle\Entity\Group $groups
     */
    public function addGroup(\DLauritz\Forum\UserBundle\Entity\Group $groups)
    {
        $this->groups[] = $groups;
    }

    /**
     * Get groups
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getGroups()
    {
        return $this->groups;
    }
    /**
     * @var datetime $joined
     */
    private $joined;


    /**
     * Set joined
     *
     * @param datetime $joined
     */
    public function setJoined($joined)
    {
        $this->joined = $joined;
    }

    /**
     * Get joined
     *
     * @return datetime 
     */
    public function getJoined()
    {
        return $this->joined;
    }
	
	public function serialize() {
		return serialize(array(
			"id" => $this->id,
			"username" => $this->username,
			"password" => $this->password,
			"display_name" => $this->display_name,
			"email" => $this->email,
			"joined" => $this->joined,
			"groups" => $this->groups,
			"posts" => $this->posts
		));
	}
	
	public function unserialize($serialized) {
		$data = unserialize($serialized);
		$this->id = $data['id'];
		$this->username = $data['username'];
		$this->display_name = $data['display_name'];
		$this->email = $data['email'];
		$this->joined = $data['joined'];
		$this->groups = $data['groups'];
		$this->posts = $data['posts'];
	}
	
}