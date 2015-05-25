<?php

namespace Sisaf\SisafBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sisaf\SisafBundle\Entity\Avisos;
use Sisaf\SisafBundle\Form\AvisosType;

/**
 * Avisos controller.
 *
 */
class AvisosController extends Controller
{
    /**
     * Lists all Avisos entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SisafBundle:Avisos')->findAll();

        return $this->render('SisafBundle:Avisos:index.html.twig', array(
            'entities' => $entities,
            'new' => $this->generateUrl('Avisos_new'),
        ));
    }

    /**
     * Finds and displays a Avisos entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SisafBundle:Avisos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Avisos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SisafBundle:Avisos:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to create a new Avisos entity.
     *
     */
    public function newAction()
    {
        $entity = new Avisos();
        $form   = $this->createForm(new AvisosType(), $entity);

        return $this->render('SisafBundle:Avisos:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Avisos entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Avisos();
        $form = $this->createForm(new AvisosType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('Avisos_show', array('id' => $entity->getId())));
        }

        return $this->render('SisafBundle:Avisos:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Avisos entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SisafBundle:Avisos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Avisos entity.');
        }

        $editForm = $this->createForm(new AvisosType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SisafBundle:Avisos:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Avisos entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SisafBundle:Avisos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Avisos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new AvisosType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('Avisos_edit', array('id' => $id)));
        }

        return $this->render('SisafBundle:Avisos:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Avisos entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SisafBundle:Avisos')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Avisos entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('Avisos'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
