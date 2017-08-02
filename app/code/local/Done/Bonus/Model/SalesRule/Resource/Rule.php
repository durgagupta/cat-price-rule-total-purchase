<?php 
class Done_Bonus_Model_SalesRule_Resource_Rule extends Mage_SalesRule_Model_Resource_Rule {
    
    /**
     * {@inheritDoc}
     * @see Mage_SalesRule_Model_Resource_Rule::_afterLoad()
     */
    protected function _afterLoad(Mage_Core_Model_Abstract $object)
    {
        $object->setData('customer_group_ids', (array)$this->getCustomerGroupIds($object->getId()));
        $object->setData('website_ids', (array)$this->getWebsiteIds($object->getId()));
        // override to add store views
        $object->setData('store_views', (array) explode(",", trim($object->getStoreViews(),",")));
        Mage_Rule_Model_Resource_Abstract::_afterLoad($object);
        return $this;
    }
}
?>