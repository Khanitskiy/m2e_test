<?php

class M2E_Test_Model_Test extends Mage_Core_Model_Abstract
{

    public function _construct()
    {
        parent::_construct();
        $this->_init('m2etest/test');
    }

}