<?php

namespace Sisaf\SisafBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sisaf\SisafBundle\Entity\Gastos;
use Sisaf\SisafBundle\Form\GastosType;

/**
 * Gastos controller.
 *
 */
class GastosController extends Controller
{
    /**
     * Lists all Gastos entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SisafBundle:Gastos')->findAll();

        return $this->render('SisafBundle:Gastos:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Gastos entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SisafBundle:Gastos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Gastos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SisafBundle:Gastos:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Gastos entity.
     *
     */
    public function newAction()
    {
        $entity = new Gastos();
        $form   = $this->createForm(new GastosType(), $entity);

        return $this->render('SisafBundle:Gastos:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Gastos entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Gastos();
        $form = $this->createForm(new GastosType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('gastos_show', array('id' => $entity->getId())));
        }

        return $this->render('SisafBundle:Gastos:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Gastos entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SisafBundle:Gastos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Gastos entity.');
        }

        $editForm = $this->createForm(new GastosType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SisafBundle:Gastos:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Gastos entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SisafBundle:Gastos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Gastos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new GastosType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('gastos_edit', array('id' => $id)));
        }

        return $this->render('SisafBundle:Gastos:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Gastos entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SisafBundle:Gastos')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Gastos entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('gastos'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
