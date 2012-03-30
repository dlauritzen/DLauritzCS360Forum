<?php
namespace DLauritz\Forum\ContentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ForumController extends Controller {
	
	private function getRepo($name) {
		return $this->getDoctrine()->getRepository('DLauritzForumContentBundle:'.$name);
	}
	
	public function userIsAllowedTo($forum, $action = "view") {
		$security = $this->get('security.context');
		
		$perms = $this->getRepo('Permissions')->findBy(array('forum_id', $forum->getId()));
		
		$allowed = false;
		foreach ($perms as $p) {
			if ($allowed) {
				// allowed, skip checking the rest
				break;
			}
			if ($security->isGranted($p->getGroup()->getRole())) {
				// User is in mentioned group. Check view/edit/mod
				switch($action) {
					case "view":
						$allowed = $p->getView();
						break;
					case "edit":
						$allowed = $p->getEdit();
						break;
					case "mod":
						$allowed = $p->getModerate();
						break;
				}
			}
		}
		
		return $allowed;
	}
	
	public function indexAction($_format) {
		$forums = $this->getRepo('Forum')->findBy(array('parent' => null));
		
//		$forums = array();
//		foreach ($all_forums as $forum) {
//			if ($this->userIsAllowedTo($forum, "view")) {
//				$forums[] = $forum; // add forum to display list
//			}
//		}
		
		return $this->render('DLauritzForumContentBundle:Forum:index.'.$_format.'.twig',
				array('forums' => $forums, 'include_threads' => false));
	}
	
	public function viewAction($id, $_format) {
		$forum = $this->getRepo('Forum')->find($id);
		
		if (!$forum) {
			// not found
			$this->get('session')->setFlash('error', "Couldn't find forum with id ".$id);
			return $this->redirect($this->generateUrl('_index'));
		} else {
			return $this->render('DLauritzForumContentBundle:Forum:view.'.$_format.'.twig', 
					array('forum' => $forum,
						'include_threads' => true));
		}
	}
	
}
