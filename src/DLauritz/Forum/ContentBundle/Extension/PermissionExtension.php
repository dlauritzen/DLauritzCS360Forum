<?php
namespace DLauritz\Forum\ContentBundle\Extension;

class PermissionExtension extends \Twig_Extension {
	
	public function getFilters() {
		return array(
			'hasGroup' => new \Twig_Filter_Method($this, 'hasGroup'),
			'canView' => new \Twig_Filter_Method($this, 'canView'),
			'canEdit' => new \Twig_Filter_Method($this, 'canEdit'),
			'canMod' => new \Twig_Filter_Method($this, 'canMod'),
			'loggedIn' => new \Twig_Filter_Method($this, 'userIsLoggedIn')
		);
	}
	
	public function getName() {
		return 'permissions_extension';
	}
	
	public function userIsLoggedIn($user) {
		return $user !== null;
	}
	
	public function canView($forum, $user) {
		if ($this->userIsLoggedIn($user) && 
				($user->hasRole("ROLE_SYSOP") || $user->hasRole("ROLE_ADMIN") || $user->hasRole("ROLE_MOD"))) {
			// These roles are allowed everywhere
			return true;
		}
		
		$permissions= $forum->getPermissions();
		
		foreach ($permissions as $p) {
			if ($p->getView()) {
				if ($p->getGroup()->getRole() == "ROLE_GUEST") {
					// Publicly viewable
					return true;
				} else if ($this->userIsLoggedIn($user) && $user->hasRole($p->getGroup()->getRole())) {
					return true;
				}
			}
		}
		
		return false;
	}
	
	
	public function canEdit($forum, $user) {
		if (!$this->userIsLoggedIn($user)) { return false; }
		
		if ($user->hasRole("ROLE_SYSOP") || $user->hasRole("ROLE_ADMIN") || $user->hasRole("ROLE_MOD")) {
			// These roles are allowed everywhere
			return true;
		}
		
		$permissions= $forum->getPermissions();
		
		foreach ($permissions as $p) {
			if ($p->getEdit()) {
				if ($user->hasRole($p->getGroup()->getRole())) {
					return true;
				}
			}
		}
		
		return false;
	}
	
	
	public function canMod($forum, $user) {
		if (!$this->userIsLoggedIn($user)) { return false; }
		
		if ($user->hasRole("ROLE_SYSOP") || $user->hasRole("ROLE_ADMIN") || $user->hasRole("ROLE_MOD")) {
			// These roles are allowed everywhere
			return true;
		}
		
		$permissions= $forum->getPermissions();
		
		foreach ($permissions as $p) {
			if ($p->getModerate()) {
				if ($user->hasRole($p->getGroup()->getRole())) {
					return true;
				}
			}
		}
		
		return false;
	}
	
	public function hasGroup($perms, $role) {
		foreach ($perms as $p) {
			if ($role == $p->getGroup()->getRole()) {
				return true;
			}
		}
		return false;
	}
}