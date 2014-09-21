<?php
namespace TranslationSample;

use Zend\Mvc\MvcEvent;
use Zend\Validator\AbstractValidator;

class Module
{
    public function onBootstrap(MvcEvent $event)
    {
        $application    = $event->getApplication();
        $serviceManager = $application->getServiceManager();
        $translator     = $serviceManager->get('translator');
        AbstractValidator::setDefaultTranslator($translator, 'formandtitle');
    
        $serviceManager->get('ViewHelperManager')->get('formcollection')->setTranslatorTextDomain('myform');
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
            
        );
    }
}
