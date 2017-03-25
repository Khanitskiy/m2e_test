<?php

class M2E_Test_Adminhtml_TestController extends Mage_Adminhtml_Controller_Action
{
	
	public function indexAction()
    {
        $this->loadLayout();
        $this->_setActiveMenu('m2etest');

        $contentBlock = $this->getLayout()->createBlock('m2etest/adminhtml_test');
        $this->_addContent($contentBlock);
        $this->renderLayout();
    }

    public function editAction()
    {
        $id = (int) $this->getRequest()->getParam('id');
        Mage::register('current_test', Mage::getModel('m2etest/test')->load($id));

        $this->loadLayout()->_setActiveMenu('m2etest');
        $this->_addContent($this->getLayout()->createBlock('m2etest/adminhtml_test_edit'));
        $this->renderLayout();
    }

    public function saveAction()
    {

        if ($data = $this->getRequest()->getPost()) {
            try {
                $id = $this->getRequest()->getParam('id');
                $model = Mage::getModel('m2etest/test');
                $row = Mage::getModel('m2etest/test')->load($id);

                if ($row->getId() == NULL) {
                    $model->setData($data)->save();
                    $model->setId($id);
                    $model->save();
                } else {
                    $model->setData($data)->setId($id);
                    $model->save();
                }

                Mage::getSingleton('adminhtml/session')->addSuccess($this->__('Test was saved successfully'));
                Mage::getSingleton('adminhtml/session')->setFormData(false);
                $this->_redirect('*/*/');
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                Mage::getSingleton('adminhtml/session')->setFormData($data);
                $this->_redirect('*/*/edit', array(
                    'id' => $this->getRequest()->getParam('id')
                ));
            }
            return;
        }
        Mage::getSingleton('adminhtml/session')->addError($this->__('Unable to find item to save'));
        $this->_redirect('*/*/');
    }


}