<?php

namespace Sisaf\SisafBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sisaf\SisafBundle\Entity\AdminAreasComunes;
use Sisaf\SisafBundle\Form\AdminAreasComunesType;

/**
 * AdminAreasComunes controller.
 *
 */
class AdminAreasComunesController extends Controller
{
    /**
     * Lists all AdminAreasComunes entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SisafBundle:AdminAreasComunes')->findAll();

        return $this->render('SisafBundle:AdminAreasComunes:index.html.twig', array(
            'entities' => $entities,
            'new' => $this->generateUrl('adminareascomunes_new'),
        ));
    }

    /**
     * Finds and displays a AdminAreasComunes entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SisafBundle:AdminAreasComunes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AdminAreasComunes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SisafBundle:AdminAreasComunes:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new AdminAreasComunes entity.
     *
     */
    public function newAction()
    {
        $entity = new AdminAreasComunes();
        $form   = $this->createForm(new AdminAreasComunesType(), $entity);

        return $this->render('SisafBundle:AdminAreasComunes:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new AdminAreasComunes entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new AdminAreasComunes();
        $form = $this->createForm(new AdminAreasComunesType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('adminareascomunes_show', array('id' => $entity->getId())));
        }

        return $this->render('SisafBundle:AdminAreasComunes:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing AdminAreasComunes entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SisafBundle:AdminAreasComunes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AdminAreasComunes entity.');
        }

        $editForm = $this->createForm(new AdminAreasComunesType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SisafBundle:AdminAreasComunes:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing AdminAreasComunes entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SisafBundle:AdminAreasComunes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AdminAreasComunes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new AdminAreasComunesType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('adminareascomunes_edit', array('id' => $id)));
        }

        return $this->render('SisafBundle:AdminAreasComunes:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a AdminAreasComunes entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SisafBundle:AdminAreasComunes')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find AdminAreasComunes entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('adminareascomunes'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
