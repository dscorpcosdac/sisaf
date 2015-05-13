<?php

namespace Sisaf\SisafBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sisaf\SisafBundle\Entity\Clientes;
use Sisaf\SisafBundle\Form\ClientesType;

/**
 * Clientes controller.
 *
 */
class ClientesController extends Controller
{
    /**
     * Lists all Clientes entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SisafBundle:Clientes')->findAll();

        return $this->render('SisafBundle:Clientes:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Clientes entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SisafBundle:Clientes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Clientes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SisafBundle:Clientes:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Clientes entity.
     *
     */
    public function newAction()
    {
        $entity = new Clientes();
        $form   = $this->createForm(new ClientesType(), $entity);

        return $this->render('SisafBundle:Clientes:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Clientes entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Clientes();
        $form = $this->createForm(new ClientesType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('clientes_show', array('id' => $entity->getId())));
        }

        return $this->render('SisafBundle:Clientes:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Clientes entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SisafBundle:Clientes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Clientes entity.');
        }

        $editForm = $this->createForm(new ClientesType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SisafBundle:Clientes:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Clientes entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SisafBundle:Clientes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Clientes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ClientesType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('clientes_edit', array('id' => $id)));
        }

        return $this->render('SisafBundle:Clientes:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Clientes entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SisafBundle:Clientes')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Clientes entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('clientes'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
