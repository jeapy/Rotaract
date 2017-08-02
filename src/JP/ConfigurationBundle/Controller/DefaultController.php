<?php

namespace JP\ConfigurationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('JPConfigurationBundle:Default:index.html.twig');
    }
}
