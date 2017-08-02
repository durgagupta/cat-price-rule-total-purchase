<?php
class Done_bonus_Model_System_Config_Source_Store
{
    /**
     * @return array
     * @date Feb 1, 2017
     * @author dsgupta
     * 
     */
    public function toOptionArray()
    {
        $storOption = Mage::getModel('adminhtml/system_store')->getStoreGroupOptionHash();
        $returnArray = array();
        foreach ($storOption as $key => $store) {
            $returnArray[] = array('value' => $key,'label' => $store);
        }
        return $returnArray;
    }
}


?>