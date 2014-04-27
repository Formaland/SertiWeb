<?php

namespace Pfe\Bundle\ToolBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Pfe\Bundle\ToolBundle\Entity\Tool;
use Pfe\Bundle\ToolBundle\Form\ToolType;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Ob\HighchartsBundle\Highcharts\Highchart;

class ToolController extends Controller
{

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PfeToolBundle:Tool')->findAll();

        return $this->render('PfeToolBundle:Tool:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    public function createAction()
    {
        $entity = new Tool();
        $request = $this->getRequest();
         $form = $this->createForm(new ToolType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();


            return $this->redirect($this->generateUrl('pfe_tool_show', array('id' => $entity->getId())));
        }

        return $this->render('PfeToolBundle:Tool:new.html.twig' ,array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }


    public function showAction(Tool $tools, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PfeToolBundle:Tool')->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tool entity.');
        }
        
        $reclams = $em->getRepository('PfeToolBundle:Reclam')
                          ->findByTools($tools->getId());

        $homologations = $em->getRepository('PfeToolBundle:Homologation')
            ->findByTools($tools->getId());

        $checklists = $em->getRepository('PfeToolBundle:CheckList')
            ->findByTools($tools->getId());
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('PfeToolBundle:Tool:show.html.twig', array(
            'entity'      => $entity,
            'reclams'     => $reclams,
            'homologations'  => $homologations,
            'checklists'  =>  $checklists,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PfeToolBundle:Tool')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tool entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('PfeToolBundle:Tool:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    private function createEditForm(Tool $entity)
    {
        $form = $this->createForm(new ToolType(), $entity, array(
            'action' => $this->generateUrl('pfe_tool_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PfeToolBundle:Tool')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tool entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('pfe_tool_edit', array('id' => $id)));
        }

        return $this->render('PfeToolBundle:Tool:edit.html.twig' ,array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PfeToolBundle:Tool')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tool entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('pfe_tool_index'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('pfe_tool_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }

    public function listeAction($page)
    {
        $em = $this ->getDoctrine()->getEntityManager();
        $total  = $this->getDoctrine()->getRepository('PfeToolBundle:Tool')->createQueryBuilder('p')->getQuery()->getResult();
        /* total of résultat */
        $total_articles    = count($total);
        $articles_per_page = $this->container->getParameter('max_articles_on_listepage');
        $last_page         = ceil($total_articles / $articles_per_page);
        $previous_page     = $page > 1 ? $page - 1 : 1;
        $next_page         = $page < $last_page ? $page + 1 : $last_page;
         /* résultat  à afficher*/
         $entities          = $this->getDoctrine()->getRepository('PfeToolBundle:Tool')->createQueryBuilder('p')->setFirstResult(($page * $articles_per_page) - $articles_per_page)->setMaxResults($this->container->getParameter('max_articles_on_listepage'))->getQuery()->getResult();
        return $this->render('PfeToolBundle:Tool:liste.html.twig', array(
            'entities' => $entities,
            'last_page' => $last_page,
            'previous_page' => $previous_page,
            'current_page' => $page,
            'next_page' => $next_page,
            'total_articles' => $total_articles,
        ));
        return $this->render('PfeToolBundle:Tool:liste.html.twig');
    }

    public function overviewChartAction()
    {
        $series = array(
            array(
                "name" => "Réclamations",
                "data" => array(9.1, 10.3, 6.5, 12.2, 5.2, 9.1, 11.1),
                "type" => "column"
            ),
            array(
                "name" => "Fréquence d'utilisation",
                "data" => array(6.6, 8.2, 0.76, 4.6, 2.1, 4.1, 3.9),
                "type" => "column"
            ),
            array(
                "name" => "Temps d'arrêt",
                "data" => array(683, 756, 543, 1208, 617, 990, 1001),
                "type" => "spline",
                "yAxis" => 1,
            ),
            array(
                "name" => "Suivi",
                "data" => array(467, 321, 56, 698, 134, 344, 452),
                "type" => "spline",
                "yAxis" => 1,
            )
        );

        $yData = array(
            array(
                'title' => array(
                    'text'  => "Réclamtions (Rec/Jours)",
                    'style' => array('color' => '#AA4643')
                ),
                'opposite' => true,
            ),
            array(
                'title' => array(
                    'text'  => "Temps d'arrêt (Min)",
                    'style' => array('color' => '#4572A7')
                ),
            ),
        );

        $dates = array(
            "21/06", "22/06", "23/06", "24/06", "25/06", "26/06", "27/06"
        );

        $ob = new Highchart();
        // ID de l'élement de DOM que vous utilisez comme conteneur
        $ob->chart->renderTo('linechart'); // The #id of the div where to render the chart
        $ob->title->text('Suivi de consommation des outils ');

        $ob->yAxis->title(array('text'  => "Réclamation"));
        $ob->yAxis($yData);

        $ob->xAxis->title(array('text'  => "Date du jours"));
        $ob->xAxis->categories($dates);

        $ob->series($series);


        return $this->render('PfeToolBundle:Tool:template.html.twig',
            array(
                'overviewchart' => $ob
            ));
    }
}
