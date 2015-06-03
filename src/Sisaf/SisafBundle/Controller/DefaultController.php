<?php

// Archivos admitidos-> ('jpg', 'jpeg', 'bmp', 'tiff', 'gif', 'doc', 'docx', 'xls', 'pdf', 'txt' )

namespace Sisaf\SisafBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Sisaf\SisafBundle\Models\Document;
use Sisaf\SisafBundle\Entity\Documentos;

use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SisafBundle:Default:index.html.twig', array('name' => $name));
    }

    public function subirAction(Request $request)
    {
        if ($request->getMethod() == 'POST') 
        {
             $image = $request->files->get('archivo');
             //print_r($image);exit;
             if (($image instanceof UploadedFile) && ($image->getError() == '0')) 
             {
                    $originalName = $image->getClientOriginalName();
                    $name_array = explode('.', $originalName);
                    $file_type = $name_array[sizeof($name_array) - 1];
                    $valid_filetypes = array('jpg', 'jpeg', 'bmp', 'tiff', 'gif', 'doc', 'docx', 'xls', 'pdf', 'txt' );
                    if(in_array(strtolower($file_type), $valid_filetypes))
                    {
                          $document = new Document();
                          $document->setFile($image);
                          $document->setSubDirectory('archivos');
                          $document->processFile();
                          
                          //hago el upload
                        $archivo = new Archivos();
                        $archivo->setArchivos($image->getBasename());
                     
                        $em = $this->getDoctrine()->getManager();
                        $em->persist($archivo);
                        $em->flush();
                        //redireccino
                         $this->get('session')->getFlashBag()->add(
                                'mensaje',
                                'el archivo se ha subido correctamente'
                            );
                    //redirecciono        
                    return $this->redirect($this->generateUrl('Sisaf_subir'));
                    }else
                    {
                         $this->get('session')->getFlashBag()->add(
                                'mensaje',
                                'la extensión del archivo no es la correcta'
                            );
                    //redirecciono        
                    return $this->redirect($this->generateUrl('Sisaf_subir'));
                    }
                
             }else
             {
                $this->get('session')->getFlashBag()->add(
                                'mensaje',
                                'Se produjo un error inesperado'
                            );
                    //redirecciono        
                    return $this->redirect($this->generateUrl('Sisaf_subir'));
             }
             
        }
        return $this->render('SisafBundle:Documentos:subir.html.twig');
    }





/*



    public function subirAction(Request $request)
    {
        if ($request->getMethod() == 'POST') 
        {
             $image = $request->files->get('archivo');
             //print_r($image);exit;
             if (($image instanceof UploadedFile) && ($image->getError() == '0')) 
             {
                    $originalName = $image->getClientOriginalName();
                    $name_array = explode('.', $originalName);
                    $file_type = $name_array[sizeof($name_array) - 1];
                    $valid_filetypes = array('jpg', 'jpeg', 'bmp', 'tiff', 'gif', 'doc', 'docx', 'xls', 'pdf', 'txt' );
                    if(in_array(strtolower($file_type), $valid_filetypes))
                    {
                          $document = new Document();
                          $document->setFile($image);
                          $document->setSubDirectory('archivos');
                          $document->processFile();

                        $archivo = new Archivos();
                        $archivo->setArchivos($image->getBasename());
                     
                        $em = $this->getDoctrine()->getManager();
                        $em->persist($archivo);
                        $em->flush();
                        //redirecciono
                         $this->get('session')->getFlashBag()->add(
                                'mensaje',
                                'El archivo se ha subido correctamente'
                            );
                    //redirecciono        
                    return $this->redirect($this->generateUrl('Sisaf_subir'));
                    }else
                    {
                         $this->get('session')->getFlashBag()->add(
                                'mensaje',
                                'El formato del archivo no es admitido'
                            );
                    //redirecciono        
                    return $this->redirect($this->generateUrl('Sisaf_subir'));
                    }
                
             }else
             {
                $this->get('session')->getFlashBag()->add(
                                'mensaje',
                                'Se produjo un error inesperado'
                            );
                    //redirecciono        
                    return $this->redirect($this->generateUrl('Sisaf_subir'));
             }
             
        }
        return $this->render('SisafBundle:Documentos:subir.html.twig');
    }
    */
}
