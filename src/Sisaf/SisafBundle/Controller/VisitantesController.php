<?php

namespace Sisaf\SisafBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sisaf\SisafBundle\Entity\Visitantes;
use Sisaf\SisafBundle\Form\VisitantesType;

/**
 * Visitantes controller.
 *
 */
class VisitantesController extends Controller
{
    /**
     * Lists all Visitantes entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SisafBundle:Visitantes')->findAll();

        return $this->render('SisafBundle:Visitantes:index.html.twig', array(
            'entities' => $entities,
            'new' => $this->generateUrl('visitantes_new'), 
        ));
    }

    /**
     * Finds and displays a Visitantes entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SisafBundle:Visitantes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Visitantes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SisafBundle:Visitantes:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Visitantes entity.
     *
     */
    public function newAction()
    {
        $entity = new Visitantes();
        $form   = $this->createForm(new VisitantesType(), $entity);

        return $this->render('SisafBundle:Visitantes:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Visitantes entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Visitantes();
        $form = $this->createForm(new VisitantesType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('visitantes_show', array('id' => $entity->getId())));
        }

        return $this->render('SisafBundle:Visitantes:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Visitantes entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SisafBundle:Visitantes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Visitantes entity.');
        }

        $editForm = $this->createForm(new VisitantesType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SisafBundle:Visitantes:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Visitantes entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SisafBundle:Visitantes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Visitantes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new VisitantesType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('visitantes_edit', array('id' => $id)));
        }

        return $this->render('SisafBundle:Visitantes:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Visitantes entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SisafBundle:Visitantes')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Visitantes entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('visitantes'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
