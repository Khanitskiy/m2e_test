<?php

class M2E_Test_Adminhtml_EmailController extends Mage_Adminhtml_Controller_Action
{
    
    public function indexAction()
    {
        $this->loadLayout();
        $this->_setActiveMenu('m2etest');
        $contentBlock = $this->getLayout()->createBlock('m2etest/adminhtml_email');
        $this->_addContent($contentBlock);
        $this->renderLayout();
        
    }

    public function saveAction() {

        $data = $this->getRequest()->getPost();

        $error = '';
        if ($data['first'] == '') {
            $error .= 'First Name required</br>';
        }
        if ($data['last'] == '') {
            $error .= 'Last Name required</br>';
        }
        if ($data['email'] == '') {
            $error .= 'E-mail required</br>';
        } else {
            if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
              $error .= "Invalid email format</br>";
            }
        }
        if ($data['text'] == '') {
            $error .= 'Message required</br>';
        }
        if ($error == '') $error = 'Unable send.';


        $html="put your html content hereblah blah";
        $mail = Mage::getModel('core/email');
        $mail->setToName($data['first'] . $data['last']);
        $mail->setToEmail('khanitskiy@yandex.ru');
        $mail->setBody($data['text']);
        $mail->setSubject('Mail Subject');
        $mail->setFromEmail($data['email']);
        $mail->setFromName("Msg to Show on Subject");
        $mail->setType('html');

        try {
            $mail->send();
            Mage::getSingleton('core/session')->addSuccess('Your request has been sent');
            $this->_redirect('*/*/');
        }
        catch (Exception $e) {
            Mage::getSingleton('core/session')->addError($error);
            $this->_redirect('*/*/');
        }

    }

}