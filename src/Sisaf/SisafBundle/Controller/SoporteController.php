<?php

namespace Sisaf\SisafBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sisaf\SisafBundle\Entity\Soporte;
use Sisaf\SisafBundle\Form\SoporteType;

/**
 * Soporte controller.
 *
 */
class SoporteController extends Controller
{
    /**
     * Lists all Soporte entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SisafBundle:Soporte')->findAll();

        return $this->render('SisafBundle:Soporte:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Soporte entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SisafBundle:Soporte')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Soporte entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SisafBundle:Soporte:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Soporte entity.
     *
     */
    public function newAction()
    {
        $entity = new Soporte();
        $form   = $this->createForm(new SoporteType(), $entity);

        return $this->render('SisafBundle:Soporte:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Soporte entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Soporte();
        $form = $this->createForm(new SoporteType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('soporte_show', array('id' => $entity->getId())));
        }

        return $this->render('SisafBundle:Soporte:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Soporte entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SisafBundle:Soporte')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Soporte entity.');
        }

        $editForm = $this->createForm(new SoporteType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SisafBundle:Soporte:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Soporte entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SisafBundle:Soporte')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Soporte entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new SoporteType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('soporte_edit', array('id' => $id)));
        }

        return $this->render('SisafBundle:Soporte:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Soporte entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SisafBundle:Soporte')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Soporte entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('soporte'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
