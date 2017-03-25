<?php

class M2E_Test_Block_Adminhtml_Email extends Mage_Adminhtml_Block_Widget_Form
{

    protected function _prepareForm()
    {
    	echo '<h2>Report to Support Form</h2>';
        $helper = Mage::helper('m2etest');
        $model = Mage::registry('current_test');

        $form = new Varien_Data_Form(array(
                    'id' => 'edit_form',
                    'action' => $this->getUrl('*/*/save', array(
                        'id' => $this->getRequest()->getParam('id')
                    )),
                    'method' => 'post',
                    'enctype' => 'multipart/form-data'
                ));

        $this->setForm($form);

        $fieldset = $form->addFieldset('test_form', array('legend' => $helper->__('Send your message')));

        $fieldset->addField('first', 'text', array(
            'label' => $helper->__('First Name'),
            'required' => true,
            'name' => 'first',
        ));

        $fieldset->addField('last', 'text', array(
            'label' => $helper->__('Last Name'),
            'required' => true,
            'name' => 'last',
        ));

        $fieldset->addField('email', 'text', array(
            'label' => $helper->__('E-mail'),
            'required' => true,
            'name' => 'email',
        ));


        $fieldset->addField('text', 'editor', array(
            'label' => $helper->__('Text'),
            'required' => true,
            'name' => 'text',
        ));

        $fieldset->addField('submit', 'submit', array('value' => 'Send message'));

        $form->setUseContainer(true);
        
        return parent::_prepareForm();
    }

}