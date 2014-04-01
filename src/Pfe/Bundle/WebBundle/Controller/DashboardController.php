<?php

namespace Pfe\Bundle\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DashboardController extends Controller {

    public function indexAction(){
        return $this->render('PfeWebBundle:Dashboard:index.html.twig');
    }
}