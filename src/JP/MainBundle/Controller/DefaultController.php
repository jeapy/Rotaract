<?php

namespace JP\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('JPMainBundle:Default:index.html.twig');
    }
}
