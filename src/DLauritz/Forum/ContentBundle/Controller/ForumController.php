<?php
namespace DLauritz\Forum\ContentBundle;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ForumController extends Controller {
	
	public function viewAction($id, $_format) {
		$forum = $this->getDoctrine()->getRepository('DLauritzForumContentBundle:Forum')->find($id);
		
		if (!$forum) {
			// not found
			$this->get('session')->setFlash('error', "Couldn't find forum with id ".$id);
			$this->redirect($this->generateUrl('index'));
		} else {
			return $this->render('DLauritzForumContentBundle:Forum:view.'.$_format.'.twig', 
					array('forum' => $forum));
		}
	}
	
}
