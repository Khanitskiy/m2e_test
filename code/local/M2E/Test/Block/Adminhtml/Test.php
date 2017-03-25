<?php

class M2E_Test_Block_Adminhtml_Test extends Mage_Adminhtml_Block_Widget_Grid_Container
{


    
    protected function _construct()
    {
        parent::_construct();
        $this->_removeButton('add');

        $helper = Mage::helper('m2etest');
        $this->_blockGroup = 'm2etest';
        $this->_controller = 'adminhtml_test';

        $this->_headerText = $helper->__('Products Management');
    }
    

}