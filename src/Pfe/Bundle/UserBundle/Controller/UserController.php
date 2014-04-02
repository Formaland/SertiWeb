<?php

namespace Pfe\Bundle\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    public function indexAction()
    {
        return $this->render('PfeWebBundle:User:index.html.twig');
    }
}