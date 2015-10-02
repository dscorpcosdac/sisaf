<?php

namespace Sisaf\SisafBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sisaf\SisafBundle\Entity\Usuario;
use Sisaf\SisafBundle\Form\UsuarioType;

use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Usuario controller.
 *
 */
class UsuarioController extends Controller
{
    /**
     * Lists all Usuario entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SisafBundle:Usuario')->findAll();

        return $this->render('SisafBundle:Usuario:index.html.twig', array(
            'entities' => $entities,
            'new' => $this->generateUrl('usuario_new'),
        ));
    }

    /**
     * Finds and displays a Usuario entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SisafBundle:Usuario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Usuario entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SisafBundle:Usuario:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to create a new Usuario entity.
     *
     */
    public function newAction()
    {
        $entity = new Usuario();
        $form   = $this->createForm(new UsuarioType(), $entity);

        $conn = $this->get('database_connection');
        $edificios = $conn->fetchAll('SELECT edificio FROM departamentos GROUP BY edificio;');

        return $this->render('SisafBundle:Usuario:new.html.twig', array(
            'edificios' => $edificios,
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Usuario entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Usuario();
        $form = $this->createForm(new UsuarioType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('usuario_show', array('id' => $entity->getId())));
        }

        return $this->render('SisafBundle:Usuario:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Usuario entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SisafBundle:Usuario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Usuario entity.');
        }

        $editForm = $this->createForm(new UsuarioType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SisafBundle:Usuario:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Usuario entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SisafBundle:Usuario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Usuario entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new UsuarioType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('usuario_edit', array('id' => $id)));
        }

        return $this->render('SisafBundle:Usuario:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Usuario entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SisafBundle:Usuario')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Usuario entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('usuario'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }


    public function pisoAction(Request $request){
        $postData = $request->request->get('edificio');
        $conn = $this->get('database_connection');
        $data = $conn->fetchAll('SELECT piso from departamentos WHERE edificio ="'.$postData.'" GROUP BY piso;');

        return $this->render('SisafBundle:Usuario:piso.html.twig', array(
            'data' => $data,
            ));
    }

    public function departamentoAction(Request $request){
        $edificio = $request->request->get('edificio');
        $piso = $request->request->get('piso');
        $conn = $this->get('database_connection');
        $data = $conn->fetchAll('SELECT departamento from departamentos WHERE edificio ="'.$edificio.'" AND piso ="'.$piso.'";');
        return $this->render('SisafBundle:Usuario:departamento.html.twig', array(
            'data' => $data,
            ));
    }



    // Editar perfil
    public function indexprofileAction(){
        $usr= $this->get('security.context')->getToken()->getUser();
        $username = $usr->getUsername();

        $conn = $this->get('database_connection');
        $entities = $conn->fetchAll('SELECT * from usuario WHERE username = "'.$username.'";');

        return $this->render('SisafBundle:Usuario:indexPerfil.html.twig', array(
            'entities' => $entities,
            'perfil_editar' => $this->generateUrl('perfil_editar'),
        ));
    }
    public function editprofileAction(){
        $usr= $this->get('security.context')->getToken()->getUser();
        $email = $usr->getEmail();

        $em = $this->getDoctrine()->getManager();

        // Para encontrar el usuario
        $entity = $em->getRepository('SisafBundle:Usuario')->findOneByEmail($email);
        if (!$entity) { throw $this->createNotFoundException('Unable to find Usuario entity.'); }

        $editForm = $this->createForm(new UsuarioType(), $entity);

        return $this->render('SisafBundle:Usuario:editarPerfil.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        ));
    }

    public function updateprofileAction(Request $request)
    {
        $usr= $this->get('security.context')->getToken()->getUser();
        $email = $usr->getEmail();

        $em = $this->getDoctrine()->getManager();

        //$entity = $em->getRepository('SisafBundle:Usuario')->find($id);
        $entity = $em->getRepository('SisafBundle:Usuario')->findOneByEmail($email);

        echo $entity;

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Usuario entity.');
        }

        $editForm = $this->createForm(new UsuarioType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('perfil_index'));
        }

        return $this->render('SisafBundle:Usuario:editarPerfil.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        ));

    }

    public function userpicAction(Request $request){
        $userpic = $request->request->get('userpic');
        $uploadDir = $this->get('kernel')->getRootDir().'/../web/uploads/';
        echo $uploadDir;
        echo $request;
        /*
        $sourcePath = $_FILES['file']['tmp_pic'];
        $targetPath = $uploadDir.$_FILES['file']['name'];
        echo "<br>";
        echo $targetPath;
        move_uploaded_file($sourcePath,$targetPath);
        */
        return new Response("hola");
    }
}
