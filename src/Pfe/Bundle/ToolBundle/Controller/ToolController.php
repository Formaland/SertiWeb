<?php

namespace Pfe\Bundle\ToolBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Pfe\Bundle\ToolBundle\Entity\Tool;
use Pfe\Bundle\ToolBundle\Form\ToolType;

/**
 * Tool controller.
 *
 * @Route("/tool")
 */
class ToolController extends Controller
{

    /**
     * Lists all Tool entities.
     *
     * @Route("/", name="tool")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PfeToolBundle:Tool')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Tool entity.
     *
     * @Route("/", name="tool_create")
     * @Method("POST")
     * @Template("PfeToolBundle:Tool:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Tool();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tool_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Tool entity.
    *
    * @param Tool $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Tool $entity)
    {
        $form = $this->createForm(new ToolType(), $entity, array(
            'action' => $this->generateUrl('tool_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Tool entity.
     *
     * @Route("/new", name="tool_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Tool();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Tool entity.
     *
     * @Route("/{id}", name="tool_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PfeToolBundle:Tool')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tool entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Tool entity.
     *
     * @Route("/{id}/edit", name="tool_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PfeToolBundle:Tool')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tool entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Tool entity.
    *
    * @param Tool $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Tool $entity)
    {
        $form = $this->createForm(new ToolType(), $entity, array(
            'action' => $this->generateUrl('tool_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Tool entity.
     *
     * @Route("/{id}", name="tool_update")
     * @Method("PUT")
     * @Template("PfeToolBundle:Tool:edit.html.twig")
     */
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

            return $this->redirect($this->generateUrl('tool_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Tool entity.
     *
     * @Route("/{id}", name="tool_delete")
     * @Method("DELETE")
     */
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

        return $this->redirect($this->generateUrl('tool'));
    }

    /**
     * Creates a form to delete a Tool entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tool_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
