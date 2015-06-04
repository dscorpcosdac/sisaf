<?php

namespace Sisaf\SisafBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sisaf\SisafBundle\Entity\EstadoFinanciero;
use Sisaf\SisafBundle\Form\EstadoFinancieroType;

/**
 * EstadoFinanciero controller.
 *
 */
class EstadoFinancieroController extends Controller
{
    /**
     * Lists all EstadoFinanciero entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery
        (
            'SELECT c.id as id,c.Monto as Monto
               FROM SisafBundle:EstadoFinanciero p
               JOIN SisafBundle:Ingresos c WITH p.id =c.id
               '
        );
         
        $datos = $query->getResult();
        print_r($datos);exit;
        return $this->render('SisafBundle:EstadoFinanciero:index.html.twig',compact("datos"));
    }






    /**
     * Finds and displays a EstadoFinanciero entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SisafBundle:EstadoFinanciero')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EstadoFinanciero entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SisafBundle:EstadoFinanciero:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new EstadoFinanciero entity.
     *
     */
    public function newAction()
    {
        $entity = new EstadoFinanciero();
        $form   = $this->createForm(new EstadoFinancieroType(), $entity);

        return $this->render('SisafBundle:EstadoFinanciero:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new EstadoFinanciero entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new EstadoFinanciero();
        $form = $this->createForm(new EstadoFinancieroType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('estadofinanciero_show', array('id' => $entity->getId())));
        }

        return $this->render('SisafBundle:EstadoFinanciero:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing EstadoFinanciero entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SisafBundle:EstadoFinanciero')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EstadoFinanciero entity.');
        }

        $editForm = $this->createForm(new EstadoFinancieroType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SisafBundle:EstadoFinanciero:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing EstadoFinanciero entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SisafBundle:EstadoFinanciero')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EstadoFinanciero entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new EstadoFinancieroType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('estadofinanciero_edit', array('id' => $id)));
        }

        return $this->render('SisafBundle:EstadoFinanciero:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a EstadoFinanciero entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SisafBundle:EstadoFinanciero')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find EstadoFinanciero entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('estadofinanciero'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
