<?php

namespace Sisaf\SisafBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sisaf\SisafBundle\Entity\Ingresos;
use Sisaf\SisafBundle\Entity\ingresosCuotas;
use Sisaf\SisafBundle\Form\IngresosType;

/**
 * Ingresos controller.
 *
 */
class IngresosController extends Controller
{
    /**
     * Lists all Ingresos entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SisafBundle:Ingresos')->findAll();

        return $this->render('SisafBundle:Ingresos:index.html.twig', array(
            'entities' => $entities,
            'new' => $this->generateUrl('ingresos_new'),
        ));
    }

    /**
     * Finds and displays a Ingresos entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SisafBundle:Ingresos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ingresos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SisafBundle:Ingresos:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Ingresos entity.
     *
     */
    public function newAction()
    {        
        $em = $this->getDoctrine()->getManager();
        $persona = $em->getRepository('SisafBundle:Usuario')->findAll();

        $entity = new Ingresos();
        $entity->setFecha(new \DateTime("now"));
        $form   = $this->createForm(new IngresosType(), $entity);

        return $this->render('SisafBundle:Ingresos:new.html.twig', array(
            'persona' => $persona,
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Ingresos entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Ingresos();
        $form = $this->createForm(new IngresosType(), $entity);
        $form->bind($request);
        if ($form->isValid()) {            
            $em = $this->getDoctrine()->getManager();
            $cuota=$request->request->get('slcConcepto',0);
            $vecino=$request->request->get('hdnPersona',0);
            $monto=$request->request->get('txtMonto',0);
            $cuotas = $em->getRepository('SisafBundle:EstadoFinanciero')->setCuotaUser($vecino,$cuota,$monto,$entity->getMontoPagado());
            $vecinoO=$em->getRepository('SisafBundle:Usuario')->find($vecino);
            $entity->setDescripcion('hola');
            $entity->setVecino($vecinoO);
            $entity->setEstado($cuotas);
            $em->persist($entity);
            $em->flush();

            $ingresosCuotas= new ingresosCuotas();
            $ingresosCuotas->setIngreso($entity->getId());
            $ingresosCuotas->setCuota($cuota);
            $em->persist($ingresosCuotas);
            $em->flush();
            return $this->redirect($this->generateUrl('ingresos_show', array('id' => $entity->getId())));
        
        }

        return $this->render('SisafBundle:Ingresos:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Ingresos entity.
     *
     */
    public function editAction($id)
    {
        $conn = $this->get('database_connection');

        $persona = $conn->fetchAll('SELECT * FROM usuario');

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SisafBundle:Ingresos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ingresos entity.');
        }

        $editForm = $this->createForm(new IngresosType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SisafBundle:Ingresos:edit.html.twig', array(
            'persona'      => $persona,
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Ingresos entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SisafBundle:Ingresos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ingresos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new IngresosType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('ingresos_edit', array('id' => $id)));
        }

        return $this->render('SisafBundle:Ingresos:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Ingresos entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SisafBundle:Ingresos')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Ingresos entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('ingresos'));
    }

    /**
     * Edits an existing Ingresos entity.
     *
     */
    public function getCuotaAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $result = $em->getRepository('SisafBundle:EstadoFinanciero')->getCuotasUser($request->request->get('vecino',0));

        if (count($result)==0) {
            throw $this->createNotFoundException('Unable to find Ingresos entity.');
        }    

        $response = new Response(json_encode($result));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
