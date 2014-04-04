<?php

namespace Pfe\Bundle\ToolBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function indexAction()
    {
        return $this->render('PfeToolBundle:Dashboard:index.html.twig');
    }
}
