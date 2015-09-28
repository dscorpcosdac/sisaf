<?php

namespace Sisaf\SisafBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sisaf\SisafBundle\Entity\Morosos;
use Sisaf\SisafBundle\Form\MorososType;

/**
 * Morosos controller.
 *
 */
class MorososController extends Controller
{
    /**
     * Lists all Morosos entities.
     *
     */
    public function indexAction()
    {
<<<<<<< HEAD
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SisafBundle:Morosos')->findAll();
=======
        $conn = $this->get('database_connection');
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SisafBundle:Morosos')->findCuotasUser($conn);
>>>>>>> a8cfb7fd1de2239305c78222c67776e4b269bdb9

        return $this->render('SisafBundle:Morosos:index.html.twig', array(
            'entities' => $entities,
            'new' => $this->generateUrl('morosos_new'),
        ));
    }

    /**
     * Finds and displays a Morosos entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SisafBundle:Morosos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Morosos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SisafBundle:Morosos:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Morosos entity.
     *
     */
    public function newAction()
    {
        $entity = new Morosos();
        $form   = $this->createForm(new MorososType(), $entity);

        return $this->render('SisafBundle:Morosos:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Morosos entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Morosos();
        $form = $this->createForm(new MorososType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('morosos_show', array('id' => $entity->getId())));
        }

        return $this->render('SisafBundle:Morosos:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Morosos entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SisafBundle:Morosos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Morosos entity.');
        }

        $editForm = $this->createForm(new MorososType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SisafBundle:Morosos:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Morosos entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SisafBundle:Morosos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Morosos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new MorososType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('morosos_edit', array('id' => $id)));
        }

        return $this->render('SisafBundle:Morosos:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Morosos entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SisafBundle:Morosos')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Morosos entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('morosos'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
