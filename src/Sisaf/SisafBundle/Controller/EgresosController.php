<?php

namespace Sisaf\SisafBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sisaf\SisafBundle\Entity\Egresos;
use Sisaf\SisafBundle\Form\EgresosType;

/**
 * Egresos controller.
 *
 */
class EgresosController extends Controller
{
    /**
     * Lists all Egresos entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SisafBundle:Egresos')->findAll();

        return $this->render('SisafBundle:Egresos:index.html.twig', array(
            'entities' => $entities,
            'new' => $this->generateUrl('egresos_new'),
        ));
    }

    /**
     * Finds and displays a Egresos entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SisafBundle:Egresos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Egresos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SisafBundle:Egresos:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Egresos entity.
     *
     */
    public function newAction()
    {
        $entity = new Egresos();
        $entity->setFecha(new \DateTime("now"));
        $form   = $this->createForm(new EgresosType(), $entity);

        return $this->render('SisafBundle:Egresos:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Egresos entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Egresos();
        $form = $this->createForm(new EgresosType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('egresos_show', array('id' => $entity->getId())));
        }

        return $this->render('SisafBundle:Egresos:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Egresos entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SisafBundle:Egresos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Egresos entity.');
        }

        $editForm = $this->createForm(new EgresosType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SisafBundle:Egresos:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Egresos entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SisafBundle:Egresos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Egresos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new EgresosType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('egresos_edit', array('id' => $id)));
        }

        return $this->render('SisafBundle:Egresos:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Egresos entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SisafBundle:Egresos')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Egresos entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('egresos'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
