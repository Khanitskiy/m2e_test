<?php

class M2E_Test_Block_Adminhtml_Test_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

    protected function _prepareCollection()
    {   
        //$collection = Mage::getModel('m2etest/test')->getCollection();
        $collection = Mage::getModel('catalog/product')
                        ->getCollection()
                        //->addAttributeToSort('entity_id', 'ASC')
                        ->addAttributeToSelect(array('entity_id', 'image', 'name', 'type_id'));
                        //->load();
        
         //return  $_productCollection;
        //echo $collection->getSelect();
        $m2etest = Mage::getSingleton('core/resource')->getTableName('m2etest/table_test'); 
       //echo $msa_eventType;

        //catalog_product_entity
        $collection->getSelect()->joinLeft(array('m2etest'=>$m2etest),'`m2etest`.`note_id` = `e`.`entity_id`',array('note'));

        $collection->getSelect()->joinLeft(array('m2epro_listing'=>'m2epro_listing_product'),'`m2epro_listing`.`product_id` = `e`.`entity_id`',array('product_id'));


        #echo '<pre>';
        #var_dump((string)$collection->getSelect());
        #echo '</pre>';
        //echo $collection->getSelect();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {

        $helper = Mage::helper('m2etest');
        
        $this->addColumn('entity_id', array(
            'header' => $helper->__('Id'),
            'index' => 'entity_id',
        ));

        $this->addColumn('image', array(
            'header' => $helper->__('Main Image'),
            'index' => 'image',
            'type' => 'text',
        ));

        $this->addColumn('name', array(
            'header' => $helper->__('Title'),
            'index' => 'name',
            'type' => 'text',
        ));

        $this->addColumn('type_id', array(
            'header' => $helper->__('Type'),
            'index' => 'type_id',
            'type' => 'text',
        ));

        $this->addColumn('product_id', array(
            'header' => $helper->__('M2E'),
            'index' => 'product_id',
            'type' => 'options',
            'options' => array( "1" => 'Yes', NULL => 'No'),
        ));

        $this->addColumn('note', array(
            'header' => $helper->__('Note'),
            'index' => 'note',
            'type' => 'text',
        ));
        

        return parent::_prepareColumns();
    }

    public function getRowUrl($model)
    {
        return $this->getUrl('*/*/edit', array(
                    'id' => $model->getId(),
                ));
    }

 

}
