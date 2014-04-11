<?php

namespace Pfe\Bundle\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MenuController extends Controller {

    public function sidebarAction($route) {
        $menu = array(
            array(
                'route' => 'pfe_web_homepage',
                'icon' => 'dashboard',
                'class' => 'start',
                'title' => 'dashboard.name',
            ),
            array(
                'routes' => array('pfe_tool_index', 'pfe_tool_new', 'pfe_tool_edit'),
                'icon' => 'wrench',
                'title' => 'tool.name',
                'submenu' => array(
                    array(
                        'route' => 'pfe_tool_index',
                        'title' => 'tool.index',
                    ),
                    array(
                        'route' => 'pfe_tool_new',
                        'title' => 'tool.new',
                    )
                )
            ),
        );

        return $this->render('PfeWebBundle:Menu:sidebar.html.twig', array(
                    'menu' => $menu,
                    'route' => $route
        ));
    }

}
