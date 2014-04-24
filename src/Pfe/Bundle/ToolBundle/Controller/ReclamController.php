<?php

namespace Pfe\Bundle\ToolBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Pfe\Bundle\ToolBundle\Entity\Reclam;
use Pfe\Bundle\UserBundle\Entity\User;
use Pfe\Bundle\UserBundle\Entity\UserInterface;
use Pfe\Bundle\UserBundle\Entity\Repository\UserRepository;
use Pfe\Bundle\ToolBundle\Entity\Repository\ReclamRepository;
use Pfe\Bundle\ToolBundle\Form\ReclamType;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class ReclamController extends Controller
{
    public function ReclamindexAction()
    {
        $id = $this->getUser()->getId();
        $em = $this->getDoctrine()->getManager();
        
        $entities = $em->getRepository('PfeToolBundle:Reclam')->findAll();

        $user = $em->getRepository('PfeUserBundle:User')
            ->find($id);
        $tool = $em->getRepository('PfeToolBundle:Tool')->find($id);
        return $this->render('PfeToolBundle:Reclam:index.html.twig',array(
            'entities' => $entities,
            'user'=>$user,
            'tool'=>$tool,
            ));
    }
    public function ReclamcreateAction(Request $request)
    {
        $entity = new Reclam();
        $request = $this->getRequest();
        $form = $this->createForm(new ReclamType(), $entity);
        $form->handleRequest($request);


     if ($this->getUser()) {
      // On définit le User par défaut dans le formulaire (utilisateur courant)
        $entity->setUser($this->getUser());
     
     }
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'Salle bien ajouté');
            return $this->redirect($this->generateUrl('pfe_reclam_show', array('id'=>$entity->getId()
            )));

        }
        return $this->render('PfeToolBundle:Reclam:new.html.twig',array('id'=>$entity->getId(),
                'entity' => $entity,
                'form' => $form->createView())
        );
    }
    public function ReclamshowAction(User $user,$id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PfeToolBundle:Reclam')->find($id);
        //$user = $em->getRepository('PfeUserBundle:User')->getUser($user->getId());
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Salle entity.');
        }



        return $this->render('PfeToolBundle:Reclam:show.html.twig', array(
            'entity' => $entity,
           // 'user' => $user,


        ));
    }
    public function ReclameditAction($id)
    {
        $em = $this->getDoctrine()
            ->getManager();
        $entity = $em->getRepository('PfeToolBundle:Reclam')
            ->find($id);
        if (!$entity)
        {
            throw $this->createNotFoundException('Unable to find Salle entity.');
        }
        $editForm = $this->createForm(new ReclamType(), $entity);
        return $this->render('PfeToolBundle:Reclam:edit.html.twig', array( 'entity' => $entity,
            'edit_form' => $editForm->createView(), ));
    }

    public function ReclamdeleteAction(Request $request, $id)
   {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PfeToolBundle:Reclam')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tool entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('pfe_reclam_index'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('pfe_reclam_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
            ;
    }

    public function ReclamupdateAction($id)
    {
        $em = $this->getDoctrine()
            ->getManager();

        $entity = $em->getRepository('PfeToolBundle:Reclam')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Salle entity.');
        }

        $editForm = $this->createForm(new ReclamType(), $entity);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('pfe_reclam_show', array('id' => $id)));
        }

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),

        );

    }
}