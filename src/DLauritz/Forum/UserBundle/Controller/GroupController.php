<?php

namespace DLauritz\Forum\UserBundle\Controller;

use DLauritz\Forum\UserBundle\Entity\User;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GroupController extends Controller {
	
	private function getRepo($name) {
		return $this->getDoctrine()->getRepository('DLauritzForumUserBundle:'.$name);
	}
	
	public function viewAction($id, $_format) {
		$group = $this->getRepo('Group')->find($id);
		
		if (!$group) {
			$this->get('session')->setFlash('error', "Group id ".$id." not found.");
			return $this->redirect($this->generateUrl('_index'));
		}
		
		return $this->render('DLauritzForumUserBundle:Group:view.'.$_format.'.twig', array(
			'group' => $group,
			'include_members' => true
		));
	}
	
}
