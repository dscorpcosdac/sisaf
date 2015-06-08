<?php

namespace Sisaf\SisafBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sisaf\SisafBundle\Entity\QuejSug;
use Sisaf\SisafBundle\Form\QuejSugType;

/**
 * QuejSug controller.
 *
 */
class QuejSugController extends Controller
{
    /**
     * Lists all QuejSug entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SisafBundle:QuejSug')->findAll();

        return $this->render('SisafBundle:QuejSug:index.html.twig', array(
            'entities' => $entities,
            'new' => $this->generateUrl('quejsug_new'),
        ));
    }

    /**
     * Finds and displays a QuejSug entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SisafBundle:QuejSug')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find QuejSug entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SisafBundle:QuejSug:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new QuejSug entity.
     *
     */
    public function newAction()
    {
        $entity = new QuejSug();
        $form   = $this->createForm(new QuejSugType(), $entity);

        return $this->render('SisafBundle:QuejSug:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new QuejSug entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new QuejSug();
        $form = $this->createForm(new QuejSugType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('quejsug_show', array('id' => $entity->getId())));
        }

        return $this->render('SisafBundle:QuejSug:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing QuejSug entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SisafBundle:QuejSug')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find QuejSug entity.');
        }

        $editForm = $this->createForm(new QuejSugType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SisafBundle:QuejSug:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing QuejSug entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SisafBundle:QuejSug')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find QuejSug entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new QuejSugType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('quejsug_edit', array('id' => $id)));
        }

        return $this->render('SisafBundle:QuejSug:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a QuejSug entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SisafBundle:QuejSug')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find QuejSug entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('quejsug'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
