<?php

namespace TranslationSample\Form;

use Zend\Form\Form;
use Zend\InputFilter\InputFilterProviderInterface;

class SampleForm extends Form implements InputFilterProviderInterface
{
    public function __construct()
    {
        parent::__construct('sampleform');
    }
    
    public function init()
    {
        $this->add(array(
            'name' => 'address',
            'type' => 'Textarea',
            'options' => array(
                'label' => 'Address',
            ),
        ));
        
        $this->add(array(
            'type' => 'Submit',
            'name' => 'create',
            'attributes' => array(
                'value'    => 'Create',
                'class'    => 'btn btn-success',
            ),
        ));
    }
    
    public function getInputFilterSpecification()
    {
        return array(
            array(
                'name' => 'address',
                'required' => true,
                'validators' => array(

                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'min'      => 6,
                            'max'      => 200,
                        ),
                    ),
                    
                ),
            ),
        );
    }
}