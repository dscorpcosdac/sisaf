<?php

namespace Sisaf\SisafBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sisaf\SisafBundle\Entity\Inicio;
use Sisaf\SisafBundle\Form\InicioType;

/**
 * Inicio controller.
 *
 */
class InicioController extends Controller
{
    /**
     * Lists all Inicio entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SisafBundle:Inicio')->findAll();

        return $this->render('SisafBundle:Inicio:index.html.twig', array(
            'entities' => $entities,
            'dashboard' => $this->generateUrl('Avisos'),
            'mensajes' => $this->generateUrl('Avisos'),
            'usuarios' => $this->generateUrl('Avisos'),
            'notificaciones' => $this->generateUrl('Avisos'),
            'actividades' => $this->generateUrl('Avisos'),
            'configuracion' => $this->generateUrl('Avisos'),
        ));
    }

    /**
     * Finds and displays a Inicio entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SisafBundle:Inicio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Inicio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SisafBundle:Inicio:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Inicio entity.
     *
     */
    public function newAction()
    {
        $entity = new Inicio();
        $form   = $this->createForm(new InicioType(), $entity);

        return $this->render('SisafBundle:Inicio:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Inicio entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Inicio();
        $form = $this->createForm(new InicioType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('inicio_show', array('id' => $entity->getId())));
        }

        return $this->render('SisafBundle:Inicio:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Inicio entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SisafBundle:Inicio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Inicio entity.');
        }

        $editForm = $this->createForm(new InicioType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SisafBundle:Inicio:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Inicio entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SisafBundle:Inicio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Inicio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new InicioType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('inicio_edit', array('id' => $id)));
        }

        return $this->render('SisafBundle:Inicio:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Inicio entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SisafBundle:Inicio')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Inicio entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('inicio'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
