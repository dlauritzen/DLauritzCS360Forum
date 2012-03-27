<?php
namespace DLauritz\Forum\UserBundle\Controller;

use DLauritz\Forum\UserBundle\Entity\User;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller {
	
	public function loginAction($_format) {
		$request = $this->getRequest();
		$session = $request->getSession();
		
		if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
			$error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
		} else {
			$error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
			$session->remove(SecurityContext::AUTHENTICATION_ERROR);
		}
		
		// DEBUG
		$factory = $this->get('security.encoder_factory');
		$user = new User();
		$encoder = $factory->getEncoder($user);
		$password = $encoder->encodePassword('k326h0xc', $user->getSalt());
		// END: DEBUG
		
		return $this->render('DLauritzForumUserBundle:User:login.'.$_format.'.twig', array(
			'last_username' => $session->get(SecurityContext::LAST_USERNAME),
			'error' => $error,
			'hashme' => $password
		));
	}
	
}