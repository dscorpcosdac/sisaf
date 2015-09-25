<?php

namespace Sisaf\SisafBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sisaf\SisafBundle\Entity\RegIngresos;
use Sisaf\SisafBundle\Form\RegIngresosType;

/**
 * RegIngresos controller.
 *
 */
class RegIngresosController extends Controller
{
    /**
     * Lists all RegIngresos entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SisafBundle:RegIngresos')->findAll();

        return $this->render('SisafBundle:RegIngresos:index.html.twig', array(
            'entities' => $entities,
            'new' => $this->generateUrl('regingresos_new'),
        ));
    }

    /**
     * Finds and displays a RegIngresos entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SisafBundle:RegIngresos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find RegIngresos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SisafBundle:RegIngresos:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new RegIngresos entity.
     *
     */
    public function newAction()
    {
        $entity = new RegIngresos();
        $form   = $this->createForm(new RegIngresosType(), $entity);

        return $this->render('SisafBundle:RegIngresos:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new RegIngresos entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new RegIngresos();
        $form = $this->createForm(new RegIngresosType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('regingresos_show', array('id' => $entity->getId())));
        }

        return $this->render('SisafBundle:RegIngresos:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing RegIngresos entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SisafBundle:RegIngresos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find RegIngresos entity.');
        }

        $editForm = $this->createForm(new RegIngresosType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SisafBundle:RegIngresos:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing RegIngresos entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SisafBundle:RegIngresos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find RegIngresos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new RegIngresosType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('regingresos_edit', array('id' => $id)));
        }

        return $this->render('SisafBundle:RegIngresos:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a RegIngresos entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SisafBundle:RegIngresos')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find RegIngresos entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('regingresos'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
