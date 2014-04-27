<?php

namespace Pfe\Bundle\ToolBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Pfe\Bundle\ToolBundle\Entity\Tool;
use Pfe\Bundle\ToolBundle\Form\ToolType;

class ValidationController extends Controller
{
    public function validateAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PfeToolBundle:Tool')->find($id);

        $entity->setEnabled("True");
        $em->persist($entity);
        $em->flush();


        return $this->render('PfeToolBundle:Tool:show.html.twig', array(
            'entity' => $entity,
        ));
    }

    public function bloquerAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PfeToolBundle:Tool')->find($id);

        $entity->setEnabled("false");
        $em->persist($entity);
        $em->flush();


        return $this->render('PfeToolBundle:Tool:show.html.twig', array(
            'entity' => $entity,
        ));
    }
}