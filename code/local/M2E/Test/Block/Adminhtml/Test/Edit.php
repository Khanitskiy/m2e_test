<?php
class M2E_Test_Block_Adminhtml_Test_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{

    protected function _construct()
    {
        $this->_blockGroup = 'm2etest';
        $this->_controller = 'adminhtml_test';
    }

}