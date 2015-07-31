<?php

namespace Sisaf\SisafBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sisaf\SisafBundle\Entity\Cuotas;
use Sisaf\SisafBundle\Form\CuotasType;

/**
 * Cuotas controller.
 *
 */
class CuotasController extends Controller
{
    /**
     * Lists all Cuotas entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SisafBundle:Cuotas')->findAll();

        return $this->render('SisafBundle:Cuotas:index.html.twig', array(
            'entities' => $entities,
            'new' => $this->generateUrl('cuotas_new'),
        ));
    }

    /**
     * Finds and displays a Cuotas entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SisafBundle:Cuotas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cuotas entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SisafBundle:Cuotas:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Cuotas entity.
     *
     */
    public function newAction()
    {
        $conn = $this->get('database_connection');
        $residentes = $conn->fetchAll('SELECT * FROM Usuario');

        $entity = new Cuotas();
        $entity->setFecha(new \DateTime("now"));
        $form   = $this->createForm(new CuotasType(), $entity);

        return $this->render('SisafBundle:Cuotas:new.html.twig', array(
            'residentes' => $residentes,
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Cuotas entity.
     *
     */
    public function createAction(Request $request)
    {
        $conn = $this->get('database_connection');
        $residentes = $conn->fetchAll('SELECT * FROM Usuario');

        $entity  = new Cuotas();
        $form = $this->createForm(new CuotasType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('cuotas_show', array('id' => $entity->getId())));
        }

        return $this->render('SisafBundle:Cuotas:new.html.twig', array(
            'residentes' => $residentes,
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Cuotas entity.
     *
     */
    public function editAction($id)
    {
        $conn = $this->get('database_connection');
        $residentes = $conn->fetchAll('SELECT * FROM Usuario');
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SisafBundle:Cuotas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cuotas entity.');
        }

        $editForm = $this->createForm(new CuotasType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SisafBundle:Cuotas:edit.html.twig', array(
            'residentes' => $residentes,
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Cuotas entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SisafBundle:Cuotas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cuotas entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new CuotasType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('cuotas_edit', array('id' => $id)));
        }

        return $this->render('SisafBundle:Cuotas:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Cuotas entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SisafBundle:Cuotas')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Cuotas entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('cuotas'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
