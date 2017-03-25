<?php

class M2E_Test_IndexController extends Mage_Core_Controller_Front_Action
{

    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }


    public function viewAction()
    {
        $testId = Mage::app()->getRequest()->getParam('id', 0);
        $note = Mage::getModel('m2etest/test')->load($testId);

        if ($note->getId() > 0) {
            $this->loadLayout();
            $this->getLayout()->getBlock('test.content')->assign(array(
                "testItem" => $note,
            ));
            $this->renderLayout();
        } else {
            $this->_forward('noRoute');
        }
    }

}