<?php

class M2E_Test_Model_Resource_Test extends Mage_Core_Model_Mysql4_Abstract
{

    public function _construct()
    {
        $this->_init('m2etest/table_test', 'note_id');
    }

}