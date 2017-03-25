<?php

class M2E_Test_Model_Resource_Test_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{

    public function _construct()
    {
        parent::_construct();
        $this->_init('m2etest/test');
    }

}