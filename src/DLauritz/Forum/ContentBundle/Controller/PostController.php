<?php
namespace DLauritz\Forum\ContentBundle;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PostController extends Controller {
	
	public function viewAction($id, $_format) {
		// Retrieve the post
		$post = $this->getDoctrine()->getRepository("DLauritzForumContentBundle:Post")->find($id);
		
		if (!$post) {
			// bad ID
			$this->getSession()->setFlash('error', "Couldn't find post with id ".$id);
			$this->redirect($this->generateUrl('index'));
		} else {
			// found it
			return $this->render('DLauritzForumContentBundle:Post:view.'.$_format.'.twig', 
					array( 'post' => $post ));
		}
	}
	
}
