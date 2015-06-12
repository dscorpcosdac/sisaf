<?php

namespace Sisaf\SisafBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use File\FileBundle\Models\Document;

class UploadController extends Controller {

    public function uploadAction(Request $request) {
        if ($request->getMethod() == 'POST') {
            $file = $request->files->get('img');
            $status = 'success';
            $uploadedURL='';
            $message='';
            if (($file instanceof UploadedFile) && ($file->getError() == '0')) {
                if (($file->getSize() < 2000000000)) {
                    $originalName = $file->getClientOriginalName();
                    $name_array = explode('.', $originalName);
                    $file_type = $name_array[sizeof($name_array) - 1];
                    $valid_filetypes = array('jpg', 'jpeg', 'bmp', 'png', 	'pdf');
                    if (in_array(strtolower($file_type), $valid_filetypes)) {
                        //Start Uploading File
                        
                      $document = new Document();
                      $document->setFile($file);
                      $document->setSubDirectory('uploads');
                      $document->processFile();
                      $uploadedURL=$uploadedURL = $document->getUploadDirectory() . DIRECTORY_SEPARATOR . $document->getSubDirectory() . DIRECTORY_SEPARATOR . $file->getBasename();
                    } else {
                        $status = 'failed';
                        $message = 'Invalid File Type';
                    }
                } else {
                    $status = 'failed';
                    $message = 'Size exceeds limit';
                }
            } else {
                $status = 'failed';
                $message = 'File Error';
            }
            return $this->render('SisafBundle:Upload:index.html.twig',array('status'=>$status,'message'=>$message,'uploadedURL'=>$uploadedURL));
        } else {
            return $this->render('SisafBundle:Upload:index.html.twig');
        }
    }

}

?>