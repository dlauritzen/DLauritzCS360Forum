<?php

namespace DLauritz\Forum\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller {
	
	public function dashboardAction() {
		return $this->render('DLauritzForumAdminBundle:Admin:dashboard.html.twig');
	}
	
	public function viewUsersAction() {
		$users = $this->getDoctrine()->getRepository('DLauritzForumUserBundle:User')->findAll();
		return $this->render('DLauritzForumAdminBundle:Admin:viewusers.html.twig',
				array('users' => $users));
	}
	
	public function viewUserDetailAction($username) {
		$user = $this->getDoctrine()->getRepository('DLauritzForumUserBundle:User')->findOneByUsername($username);
		return $this->render('DLauritzForumAdminBundle:Admin:userdetail.html.twig', 
				array('user' => $user));
	}
	
}
