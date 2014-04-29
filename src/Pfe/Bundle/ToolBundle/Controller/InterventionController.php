<?php

namespace Pfe\Bundle\ToolBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Pfe\Bundle\ToolBundle\Entity\Intervention;
use Pfe\Bundle\ToolBundle\Form\InterventionType;

/**
 * Intervention controller.
 *
 */
class InterventionController extends Controller
{

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PfeToolBundle:Intervention')->findAll();

        return $this->render('PfeToolBundle:Intervention:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Intervention entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Intervention();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('pfe_intervention_show', array('id' => $entity->getId())));
        }

        return $this->render('PfeToolBundle:Intervention:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Intervention entity.
    *
    * @param Intervention $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Intervention $entity)
    {
        $form = $this->createForm(new InterventionType(), $entity, array(
            'action' => $this->generateUrl('pfe_intervention_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Intervention entity.
     *
     */
    public function newAction()
    {
        $entity = new Intervention();
        $form   = $this->createCreateForm($entity);

        return $this->render('PfeToolBundle:Intervention:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Intervention entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PfeToolBundle:Intervention')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Intervention entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('PfeToolBundle:Intervention:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Intervention entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PfeToolBundle:Intervention')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Intervention entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('PfeToolBundle:Intervention:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Intervention entity.
    *
    * @param Intervention $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Intervention $entity)
    {
        $form = $this->createForm(new InterventionType(), $entity, array(
            'action' => $this->generateUrl('pfe_intervention_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Intervention entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PfeToolBundle:Intervention')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Intervention entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('pfe_intervention_edit', array('id' => $id)));
        }

        return $this->render('PfeToolBundle:Intervention:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Intervention entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PfeToolBundle:Intervention')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Intervention entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('pfe_intervention_index'));
    }

    /**
     * Creates a form to delete a Intervention entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('pfe_intervention_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
