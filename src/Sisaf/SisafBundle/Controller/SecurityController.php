<?php
namespace Sisaf\SisafBundle\Controller;
 
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Sisaf\SisafBundle\Entity\usuario;
use Sisaf\SisafBundle\Form\usuarioType;
 
class SecurityController extends Controller
{
    public function loginAction()
    {
        $request = $this->getRequest();
        $session = $request->getSession();
 
        // get the login error if there is one
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }
         $em = $this->getDoctrine()->getManager();
         //$entity = new usuario();
         //$form   = $this->CreateFormUser($entity);



            return $this->render('SisafBundle:Security:login.html.twig',
                array(
                    // last username entered by the user
                    'last_username' => $session->get(SecurityContext::LAST_USERNAME),
                    //'form'   => $form->createView(),'id'=>0,
                    'error'         => $error,
                    //'directorio'  => $template->getRuta(),
                )
            );
    }

}















