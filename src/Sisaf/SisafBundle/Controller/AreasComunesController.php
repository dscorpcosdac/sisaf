<?php

namespace Sisaf\SisafBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sisaf\SisafBundle\Entity\AreasComunes;
use Sisaf\SisafBundle\Form\AreasComunesType;

/**
 * AreasComunes controller.
 *
 */
class AreasComunesController extends Controller
{
    /**
     * Lists all AreasComunes entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SisafBundle:AreasComunes')->findAll();

        return $this->render('SisafBundle:AreasComunes:index.html.twig', array(
            'entities' => $entities,
            'new' => $this->generateUrl('areascomunes_new'),
        ));
    }

    /**
     * Finds and displays a AreasComunes entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SisafBundle:AreasComunes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AreasComunes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SisafBundle:AreasComunes:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new AreasComunes entity.
     *
     */
    public function newAction()
    {
        $entity = new AreasComunes();
        $form   = $this->createForm(new AreasComunesType(), $entity);

        return $this->render('SisafBundle:AreasComunes:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new AreasComunes entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new AreasComunes();
        $form = $this->createForm(new AreasComunesType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('areascomunes_show', array('id' => $entity->getId())));
        }

        return $this->render('SisafBundle:AreasComunes:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing AreasComunes entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SisafBundle:AreasComunes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AreasComunes entity.');
        }

        $editForm = $this->createForm(new AreasComunesType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SisafBundle:AreasComunes:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing AreasComunes entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SisafBundle:AreasComunes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AreasComunes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new AreasComunesType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('areascomunes_edit', array('id' => $id)));
        }

        return $this->render('SisafBundle:AreasComunes:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a AreasComunes entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SisafBundle:AreasComunes')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find AreasComunes entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('areascomunes'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
