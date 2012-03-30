<?php
namespace DLauritz\Forum\ContentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ForumController extends Controller {
	
	private function getRepo($name) {
		return $this->getDoctrine()->getRepository('DLauritzForumContentBundle:'.$name);
	}
	
	public function indexAction($_format) {
		$forums = $this->getRepo('Forum')->findBy(array('parent' => null));
		
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
