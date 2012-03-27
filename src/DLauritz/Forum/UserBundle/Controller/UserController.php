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
	
	public function profileAction($username, $_format) {
		if ($username == 'self') {
			$security = $this->get('security.context');
			$user = $security->getToken()->getUser();
			
			if ($security->isGranted('ROLE_USER')) {
				$username = $user->getUsername();
			} else {
				$this->get('session')->setFlash('notice', "You are not logged in.");
				return $this->redirect($this->generateUrl('login'));
			}
		}
		
		$repo = $this->getDoctrine()->getRepository('DLauritzForumUserBundle:User');
		$user = $repo->findOneByUsername($username);
		
		if (!$user) {
			// User not found
			$this->get('session')->setFlash('notice', "User ".$username." not found.");
			return $this->redirect($this->generateUrl('_index'));
		}
		
		// Render user profile
		return $this->render('DLauritzForumUserBundle:User:profile.'.$_format.'.twig', 
				array('user' => $user));
	}
	
}