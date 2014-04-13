<?php

namespace Pfe\Bundle\ToolBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Pfe\Bundle\ToolBundle\Entity\Homologation;
use Pfe\Bundle\ToolBundle\Form\HomologationType;

/**
 * Homologation controller.
 *
 */
class HomologationController extends Controller
{

    /**
     * Lists all Homologation entities.
     *
     */
    public function indexAction()
    {
        //var_dump('ici je suis dans l\'action index<br>');
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PfeToolBundle:Homologation')->findAll();

        //var_dump('Variable Entities<br>'); // je demande un retour de text
        //var_dump($entities); // je demande le retour de la variable entities pour voir ce quelle contient
        //die(); // jarrete le serveur
        return $this->render('PfeToolBundle:Homologation:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new Homologation entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Homologation();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        //var_dump($entity);
        //print('mon formulaire a bien envoyer mon objet a l\'action<br>');

        if ($form->isValid()) { // ici le if verifie si mon from est valide
            // la je suis dans mon if don mon form est surrement valide
            //die('mon formulaire est valide');
            // donc jai demandé a arreté le server et me faire un retour 'mon formulaire est valide'
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('homologation_show', array('id' => $entity->getId())));
        }

        //ici je suis hors de mon if don mon formulaire n'est pas valide
        // alors j'ai arréter le server et je lui demande de me faire un retour 'mon formulaire est invalide!!'
        //die('mon formulaire est invalide !!');
        return $this->render('PfeToolBundle:Homologation:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Homologation entity.
    *
    * @param Homologation $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Homologation $entity)
    {
        $form = $this->createForm(new HomologationType(), $entity, array(
            'action' => $this->generateUrl('homologation_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Homologation entity.
     *
     */
    public function newAction()
    {
        $entity = new Homologation();
        $form   = $this->createCreateForm($entity);

        return $this->render('PfeToolBundle:Homologation:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Homologation entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PfeToolBundle:Homologation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Homologation entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('PfeToolBundle:Homologation:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Homologation entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PfeToolBundle:Homologation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Homologation entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('PfeToolBundle:Homologation:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Homologation entity.
    *
    * @param Homologation $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Homologation $entity)
    {
        $form = $this->createForm(new HomologationType(), $entity, array(
            'action' => $this->generateUrl('homologation_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Homologation entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PfeToolBundle:Homologation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Homologation entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('homologation_edit', array('id' => $id)));
        }

        return $this->render('PfeToolBundle:Homologation:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Homologation entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PfeToolBundle:Homologation')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Homologation entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('homologation'));
    }

    /**
     * Creates a form to delete a Homologation entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('homologation_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
