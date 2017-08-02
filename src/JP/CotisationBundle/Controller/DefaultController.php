<?php

namespace JP\CotisationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('JPCotisationBundle:Default:index.html.twig');
    }
}
