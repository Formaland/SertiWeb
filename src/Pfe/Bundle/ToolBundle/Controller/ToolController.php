<?php

namespace Pfe\Bundle\ToolBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Pfe\Bundle\ToolBundle\Entity\Tool;
use Pfe\Bundle\ToolBundle\Form\ToolType;

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

    public function createAction(Request $request)
    {
        $entity = new Tool();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

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

    private function createCreateForm(Tool $entity)
    {
        $form = $this->createForm(new ToolType(), $entity, array(
            'action' => $this->generateUrl('pfe_tool_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    public function newAction()
    {
        $entity = new Tool();
        $form   = $this->createCreateForm($entity);

        return $this->render('PfeToolBundle:Tool:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PfeToolBundle:Tool')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tool entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('PfeToolBundle:Tool:show.html.twig', array(
            'entity'      => $entity,
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
}
