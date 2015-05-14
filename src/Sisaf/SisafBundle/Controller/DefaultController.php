<?php

namespace Sisaf\SisafBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SisafBundle:Default:index.html.twig', array('name' => $name));
    }
}
