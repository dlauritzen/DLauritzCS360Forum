<?php
namespace DLauritz\Forum\ContentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ThreadController extends Controller {
	
	private function getRepo($name) {
		return $this->getDoctrine()->getRepository('DLauritzForumContentBundle:'.$name);
	}
	
	public function viewAction($id, $_format) {
		$thread = $this->getRepo('Thread')->find($id);
		
		if (!$thread) {
			// not found
			$this->get('session')->setFlash('error', "Couldn't find thread with id ".$id);
			return $this->redirect($this->generateUrl('_index'));
		} else {
			return $this->render('DLauritzForumContentBundle:Thread:view.'.$_format.'.twig', 
					array('thread' => $thread,
						'include_posts' => true));
		}
	}
	
}