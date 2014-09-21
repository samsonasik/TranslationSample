<?php
return array(
    
    'router' => array(
        'routes' => array(
            'foobar' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/translationsample',
                    'defaults' => array(
                        '__NAMESPACE__' => 'TranslationSample\Controller',
                        'controller'    => 'TranslateSample',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    
    'translator' => array(
        'locale' => 'id',
        'translation_file_patterns' => array(
            array(
                'type' => 'phpArray',
                'base_dir' => 'vendor/zendframework/zendframework/resources/languages',
                'pattern' => '%s/Zend_Captcha.php',
                'text_domain' => 'formandtitle',
            ),
            array(
                'type' => 'phpArray',
                'base_dir' => 'vendor/zendframework/zendframework/resources/languages',
                'pattern' => '%s/Zend_Validate.php',
                'text_domain' => 'formandtitle',
            ),
            
            // for label and value that we define ourself ...
            array(
                'type'     => 'phpArray',
                'base_dir' => __DIR__ . '/../translation',
                'pattern' => '%s/site.php',
                'text_domain' => 'myform',
            ), 
        ),
    ),
    
    'controllers' => array(
        'invokables' => array(
            'TranslationSample\Controller\TranslateSample' => 'TranslationSample\Controller\TranslateSampleController'
        ),
    ),
    
    'view_manager' => array(
        'template_path_stack' => array(
            'translation-sample' => __DIR__ . '/../view',
        ),
    ),
    
);