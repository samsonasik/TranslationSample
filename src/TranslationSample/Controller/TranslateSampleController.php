<?php

namespace TranslationSample\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class TranslateSampleController extends AbstractActionController
{
    public function indexAction()
    {
        $form = $this->getServiceLocator()
                     ->get('FormElementManager')
                     ->get('TranslationSample\Form\SampleForm');
                            
        if ($this->getRequest()->isPost()) {
            $form->setData($this->getRequest()->getPost());
            if ($form->isValid()) {
                echo 'success';        
            }
        }
        
        return array(
            'form' =>  $form,
        );
    }
}