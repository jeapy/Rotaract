<?php

namespace JP\ReunionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('JPReunionBundle:Default:index.html.twig');
    }
}
