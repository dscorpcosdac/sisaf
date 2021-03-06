<?php

namespace Sisaf\SisafBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sisaf\SisafBundle\Entity\Cuotas;
use Sisaf\SisafBundle\Entity\cuotaVecino;
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

        $fechaexpedicion = date("d/M/Y");

        return $this->render('SisafBundle:Cuotas:show.html.twig', array(
            'fechaexpedicion' => $fechaexpedicion,
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
       // $entity->setFecha(new \DateTime("now"));
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

        $entity  = new Cuotas();
        $form = $this->createForm(new CuotasType(), $entity);
        $form->bind($request);
        if ($form->isValid()) {
            $forms=$request->request->get('vecinos',0);
            $vecinos=explode(',', $forms);
            if(count($vecinos)>0){

                $em = $this->getDoctrine()->getManager();
                $em->persist($entity);
                $em->flush();
                $dias=$request->request->get('txtCantidad',0);
                $tiempo=$request->request->get('slcPeriodo',0);
                $recorrido=$request->request->get('slcDia',0);
                if($dias != 0 && $tiempo != 0 ){
                    $lafecha=$entity->getFechaDeInicio();
                    $arrayFecha = $em->getRepository('SisafBundle:EstadoFinanciero')->setFechaUser($dias,$tiempo,$recorrido,$lafecha);
                    $entity->setDiaproximo($arrayFecha);
                    $entity->setDiasRecurrencia($dias.'|'.$tiempo.'|'.$recorrido);
                }
                $em->persist($entity);
                $em->flush();
                foreach ($vecinos as $key) {
                    if($key>0){
                        $cuotavecino=new cuotaVecino();
                        $cuotavecino->setCuota($entity->getId());
                        $cuotavecino->setVecino($key);
                        $cuotavecino->setEstado(0);
                        $em->persist($cuotavecino);
                        $em->flush();
                       // echo $key.'holA<br>';              return $this->render('SisafBundle:Cuotas:new.html.twig', array());
                       }
                }
                // return $this->render('::error.html.twig', array());
                return $this->redirect($this->generateUrl('cuotas_show', array('id' => $entity->getId())));
            }
            
        }
        $conn = $this->get('database_connection');
        $residentes = $conn->fetchAll('SELECT * FROM Usuario');
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

            //return $this->redirect($this->generateUrl('cuotas_edit', array('id' => $id)));
            return $this->redirect($this->generateUrl('cuotas_show', array('id' => $id)));
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


    /**
     * Deletes a Cuotas entity.
     *
     */
    public function activarAction()
    {
        $em = $this->getDoctrine()->getManager();
        $date=new \DateTime('2016-11-03');
        $cuotaVecinos = $em->getRepository('SisafBundle:Cuotas')->findBy(
            array('diaproximo' => $date)
        );
        foreach ($cuotaVecinos as $cuotaVecino ) {
            $datos=explode('|',$cuotaVecino->getDiasRecurrencia());
            if($datos[0] != 0 && $datos[1] != 0 ){
                    $lafecha=$cuotaVecino->getFechaDeInicio();
                    $arrayFecha = $em->getRepository('SisafBundle:EstadoFinanciero')->setFechaUser($datos[0],$datos[1],$datos[2],$lafecha);
                    $cuotaVecino->setDiaproximo($arrayFecha);
                    $em->persist($cuotaVecino);
                    $em->flush();

                    $nuevaCuota = new Cuotas();
                    $nuevaCuota->setDescripcion($cuotaVecino->getDescripcion());
                    $nuevaCuota->setFechaDeInicio($cuotaVecino->getFechaDeInicio());
                    $nuevaCuota->setMonto($cuotaVecino->getMonto());
                    $nuevaCuota->setPadre($cuotaVecino->getId());
                    $nuevaCuota->setTipo(1);
                    $em->persist($nuevaCuota);
                    $em->flush();

                    $arrayVecinos=$em->getRepository('SisafBundle:EstadoFinanciero')->getUserCuota($cuotaVecino->getId());
                    foreach ($arrayVecinos as $key) {
                        if($key>0){
                            $cuotavecino=new cuotaVecino();
                            $cuotavecino->setCuota($nuevaCuota->getId());
                            $cuotavecino->setVecino($key['vecino']);              
                            $cuotavecino->setEstado(0);
                            $em->persist($cuotavecino);
                            $em->flush();
                           // echo $key.'holA<br>';              return $this->render('SisafBundle:Cuotas:new.html.twig', array());
                           }
                    }

                    //$entity->setDiasRecurrencia($dias.'|'.$tiempo.'|'.$recorrido);
                }
            
        }
return $this->render('::error.html.twig', array());
        //return $this->redirect($this->generateUrl('cuotas'));
    }


    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }


    // Asignar nuevo residente
    public function asignarnuevoAction($id)
    {
        $conn = $this->get('database_connection');
        $residentes = $conn->fetchAll('SELECT * FROM Usuario');
        $vecinos = $conn->fetchAll('SELECT vecino FROM cuotavecino WHERE cuota ='.$id);
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SisafBundle:Cuotas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cuotas entity.');
        }

        $editForm = $this->createForm(new CuotasType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SisafBundle:Cuotas:asignarnuevo.html.twig', array(
            'vecinos' => $vecinos,
            'residentes' => $residentes,
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    public function updateresidenteAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('SisafBundle:Cuotas')->find($id);

        $data = $request->request->get('vecinos');
        $vecinos = explode(',', $data);
        foreach ($vecinos as $key) {
            $cuotavecino = new cuotaVecino();

            $cuotavecino->setCuota($entity->getId());
            $cuotavecino->setVecino($key);
            $cuotavecino->setEstado(0);
            
            $em->persist($cuotavecino);
            $em->flush();
        }
        return $this->redirect($this->generateUrl('cuotas_show', array('id' => $id)));

    }
}
