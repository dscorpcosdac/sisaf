<?php

namespace Sisaf\SisafBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sisaf\SisafBundle\Entity\Documentos;
use Sisaf\SisafBundle\Form\DocumentosType;

/**
 * Documentos controller.
 *
 */
class DocumentosController extends Controller
{
    /**
     * Lists all Documentos entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SisafBundle:Documentos')->findAll();

        return $this->render('SisafBundle:Documentos:index.html.twig', array(
            'entities' => $entities,
            'new' => $this->generateUrl('documentos_new'),
        ));
    }

    /**
     * Finds and displays a Documentos entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SisafBundle:Documentos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Documentos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SisafBundle:Documentos:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Documentos entity.
     *
     */
    public function newAction()
    {
        $entity = new Documentos();
        $form   = $this->createForm(new DocumentosType(), $entity);

        return $this->render('SisafBundle:Documentos:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Documentos entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Documentos();
        $form = $this->createForm(new DocumentosType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('documentos_show', array('id' => $entity->getId())));
        }

        return $this->render('SisafBundle:Documentos:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Documentos entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SisafBundle:Documentos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Documentos entity.');
        }

        $editForm = $this->createForm(new DocumentosType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SisafBundle:Documentos:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Documentos entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SisafBundle:Documentos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Documentos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new DocumentosType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('documentos_edit', array('id' => $id)));
        }

        return $this->render('SisafBundle:Documentos:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Documentos entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SisafBundle:Documentos')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Documentos entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('documentos'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
