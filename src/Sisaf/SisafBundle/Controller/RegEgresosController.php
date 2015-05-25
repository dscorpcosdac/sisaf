<?php

namespace Sisaf\SisafBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sisaf\SisafBundle\Entity\RegEgresos;
use Sisaf\SisafBundle\Form\RegEgresosType;

/**
 * RegEgresos controller.
 *
 */
class RegEgresosController extends Controller
{
    /**
     * Lists all RegEgresos entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SisafBundle:RegEgresos')->findAll();

        return $this->render('SisafBundle:RegEgresos:index.html.twig', array(
            'entities' => $entities,
            'new' => $this->generateUrl('regegresos_new'),
        ));
    }

    /**
     * Finds and displays a RegEgresos entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SisafBundle:RegEgresos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find RegEgresos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SisafBundle:RegEgresos:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new RegEgresos entity.
     *
     */
    public function newAction()
    {
        $entity = new RegEgresos();
        $form   = $this->createForm(new RegEgresosType(), $entity);

        return $this->render('SisafBundle:RegEgresos:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new RegEgresos entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new RegEgresos();
        $form = $this->createForm(new RegEgresosType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('regegresos_show', array('id' => $entity->getId())));
        }

        return $this->render('SisafBundle:RegEgresos:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing RegEgresos entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SisafBundle:RegEgresos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find RegEgresos entity.');
        }

        $editForm = $this->createForm(new RegEgresosType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SisafBundle:RegEgresos:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing RegEgresos entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SisafBundle:RegEgresos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find RegEgresos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new RegEgresosType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('regegresos_edit', array('id' => $id)));
        }

        return $this->render('SisafBundle:RegEgresos:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a RegEgresos entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SisafBundle:RegEgresos')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find RegEgresos entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('regegresos'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
