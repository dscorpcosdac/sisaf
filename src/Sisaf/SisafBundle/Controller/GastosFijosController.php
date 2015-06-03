<?php

namespace Sisaf\SisafBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sisaf\SisafBundle\Entity\GastosFijos;
use Sisaf\SisafBundle\Form\GastosFijosType;

/**
 * GastosFijos controller.
 *
 */
class GastosFijosController extends Controller
{
    /**
     * Lists all GastosFijos entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SisafBundle:GastosFijos')->findAll();

        return $this->render('SisafBundle:GastosFijos:index.html.twig', array(
            'entities' => $entities,
            'new' => $this->generateUrl('ingresos_new'),
        ));
    }

    /**
     * Finds and displays a GastosFijos entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SisafBundle:GastosFijos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find GastosFijos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SisafBundle:GastosFijos:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new GastosFijos entity.
     *
     */
    public function newAction()
    {
        $entity = new GastosFijos();
        $form   = $this->createForm(new GastosFijosType(), $entity);

        return $this->render('SisafBundle:GastosFijos:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new GastosFijos entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new GastosFijos();
        $form = $this->createForm(new GastosFijosType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('gastosfijos_show', array('id' => $entity->getId())));
        }

        return $this->render('SisafBundle:GastosFijos:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing GastosFijos entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SisafBundle:GastosFijos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find GastosFijos entity.');
        }

        $editForm = $this->createForm(new GastosFijosType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SisafBundle:GastosFijos:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing GastosFijos entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SisafBundle:GastosFijos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find GastosFijos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new GastosFijosType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('gastosfijos_edit', array('id' => $id)));
        }

        return $this->render('SisafBundle:GastosFijos:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a GastosFijos entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SisafBundle:GastosFijos')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find GastosFijos entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('gastosfijos'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
