<?php 
/**
 * @category    Done
 * @package     Done_Bonus
 * @copyright   Copyright (c) 2017 durga@acegento.com
 * @date Feb 8, 2017
 * @author dsgupta
 */

class Done_Bonus_Model_SalesRule_Rule  extends Mage_SalesRule_Model_Rule {
    
    
    /**
     * {@inheritDoc}
     * @see Mage_Rule_Model_Abstract::_beforeSave()
     * set store value in comma seperated
     */
    protected function _beforeSave(){
    
        $this->setStoreViews(",".implode(",", $this->getStoreViews()).",");
        return Mage_Rule_Model_Abstract::_beforeSave();
    }
    
}
?>