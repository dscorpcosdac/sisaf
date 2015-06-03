<?php

namespace Sisaf\SisafBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sisaf\SisafBundle\Entity\QuejasSugerencias;
use Sisaf\SisafBundle\Form\QuejasSugerenciasType;

/**
 * QuejasSugerencias controller.
 *
 */
class QuejasSugerenciasController extends Controller
{
    /**
     * Lists all QuejasSugerencias entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SisafBundle:QuejasSugerencias')->findAll();

        return $this->render('SisafBundle:QuejasSugerencias:index.html.twig', array(
            'entities' => $entities,
            'new' => $this->generateUrl('quejassugerencias_new'),
        ));
    }

    /**
     * Finds and displays a QuejasSugerencias entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SisafBundle:QuejasSugerencias')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find QuejasSugerencias entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SisafBundle:QuejasSugerencias:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new QuejasSugerencias entity.
     *
     */
    public function newAction()
    {
        $entity = new QuejasSugerencias();
        $form   = $this->createForm(new QuejasSugerenciasType(), $entity);

        return $this->render('SisafBundle:QuejasSugerencias:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new QuejasSugerencias entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new QuejasSugerencias();
        $form = $this->createForm(new QuejasSugerenciasType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('quejassugerencias_show', array('id' => $entity->getId())));
        }

        return $this->render('SisafBundle:QuejasSugerencias:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing QuejasSugerencias entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SisafBundle:QuejasSugerencias')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find QuejasSugerencias entity.');
        }

        $editForm = $this->createForm(new QuejasSugerenciasType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SisafBundle:QuejasSugerencias:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing QuejasSugerencias entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SisafBundle:QuejasSugerencias')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find QuejasSugerencias entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new QuejasSugerenciasType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('quejassugerencias_edit', array('id' => $id)));
        }

        return $this->render('SisafBundle:QuejasSugerencias:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a QuejasSugerencias entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SisafBundle:QuejasSugerencias')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find QuejasSugerencias entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('quejassugerencias'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
