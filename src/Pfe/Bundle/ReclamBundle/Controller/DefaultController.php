<?php

namespace Pfe\Bundle\ReclamBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('PfeReclamBundle:Default:index.html.twig');
    }
}
