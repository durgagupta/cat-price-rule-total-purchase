<?php
/**
 * @category    Done
 * @package     Done_Bonus
 * @copyright   Copyright (c) 2017 durga@acegento.com
 * @date Feb 3, 2017
 * @author dsgupta
 */

class Done_Bonus_Helper_Data extends Mage_Core_Helper_Abstract
{
    
   
    /**
     * @return number 
     * @date Feb 3, 2017
     * @author dsgupta
     * @desc return customer total purchased during bonus date range 
     *       
     **/
    public function getCustomerPurchaseAmount() {
    
        if (Mage::getSingleton('customer/session')->isLoggedIn()) {
    
            $customerData = Mage::getSingleton('customer/session')->getCustomer();
    
            $collection = Mage::getModel("sales/order")->getCollection();
            //apply customer filter
            $collection->getSelect()->where("customer_id = ".$customerData->getId());
            $collection->getSelect()->where("status = 'complete'");
            
            $collection->getSelect()->reset(Zend_DB_Select::COLUMNS)->columns(array('sum_base_subtotal'=>'SUM(main_table.base_subtotal)'));
            $collection->getSelect()->group('main_table.customer_id');
    
            if ($collection->getSize()){
                $firstItem = $collection->getFirstItem();
                return $firstItem->sum_base_subtotal;
            }
        }
        return 0;
    }
    
}
	 