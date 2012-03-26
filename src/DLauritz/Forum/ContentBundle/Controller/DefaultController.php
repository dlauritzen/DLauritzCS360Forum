<?php

namespace DLauritz\Forum\ContentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('DLauritzForumContentBundle:Default:index.html.twig', array('name' => $name));
    }
}
