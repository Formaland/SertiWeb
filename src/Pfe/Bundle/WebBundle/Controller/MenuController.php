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
                'routes' => array('article_liste', 'pfe_tool_create', 'pfe_tool_edit'),
                'icon' => 'wrench',
                'title' => 'tool.name',
                'submenu' => array(
                    array(
                        'route' => 'article_liste',
                        'title' => 'tool.index',
                    ),
                    array(
                        'route' => 'pfe_tool_create',
                        'title' => 'tool.new',
                    )
                )
            ),
            array(
                'routes' => array('pfe_user_index', 'pfe_user_new', 'pfe_user_edit'),
                'icon' => 'users',
                'title' => 'user.name',
                'submenu' => array(
                    array(
                        'route' => 'pfe_user_index',
                        'title' => 'user.index',
                    ),
                    array(
                        'route' => 'pfe_user_new',
                        'title' => 'user.new',
                    )
                )
            ),
            array(
                'routes' => array('homologation', 'homologation_new', 'homologation_edit'),
                'icon' => 'edit',
                'title' => 'homologation.name',
                'submenu' => array(
                    array(
                        'route' => 'homologation',
                        'title' => 'homologation.index',
                    ),
                    array(
                        'route' => 'homologation_new',
                        'title' => 'homologation.new',
                    )
                )
            ),
            array(
                'routes' => array('checklist', 'checklist_new', 'checklist_edit'),
                'icon' => 'tasks',
                'title' => 'checklist.name',
                'submenu' => array(
                    array(
                        'route' => 'checklist',
                        'title' => 'checklist.index',
                    ),
                    array(
                        'route' => 'checklist_new',
                        'title' => 'checklist.new',
                    )
                )
            ),
            array(
                'routes' => array('pfe_reclam_index', 'pfe_reclam_create', 'pfe_reclam_edit'),
                'icon' => 'tasks',
                'title' => 'reclamation.name',
                'submenu' => array(
                    array(
                        'route' => 'pfe_reclam_index',
                        'title' => 'reclamation.index',
                    ),
                    array(
                        'route' => 'pfe_reclam_create',
                        'title' => 'reclamation.new',
                    )
                )
            ),
            array(
                'routes' => array('overviewchart', '', ''),
                'icon' => 'tasks',
                'title' => 'consommation.name',
                'submenu' => array(
                    array(
                        'route' => 'overviewchart',
                        'title' => 'consommation.index',
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
