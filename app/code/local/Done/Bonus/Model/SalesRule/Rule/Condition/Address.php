<?php

/**
 * @category    Done
 * @package     Done_Bonus
 * @copyright   Copyright (c) 2017 durga@acegento.com
 * @date Feb 3, 2017
 * @author dsgupta
 */
class Done_Bonus_Model_SalesRule_Rule_Condition_Address extends Mage_SalesRule_Model_Rule_Condition_Address
{

    /**
     *
     * {@inheritDoc}
     *
     * @see Mage_SalesRule_Model_Rule_Condition_Address::loadAttributeOptions()
     */
    public function loadAttributeOptions ()
    {
        $attributes = array(
                'purchase_amount' => Mage::helper('salesrule')->__('Total Purchase Amount'),
                'base_subtotal' => Mage::helper('salesrule')->__('Subtotal'),
                'total_qty' => Mage::helper('salesrule')->__('Total Items Quantity'),
                'weight' => Mage::helper('salesrule')->__('Total Weight'),
                'payment_method' => Mage::helper('salesrule')->__('Payment Method'),
                'shipping_method' => Mage::helper('salesrule')->__('Shipping Method'),
                'postcode' => Mage::helper('salesrule')->__('Shipping Postcode'),
                'region' => Mage::helper('salesrule')->__('Shipping Region'),
                'region_id' => Mage::helper('salesrule')->__('Shipping State/Province'),
                'country_id' => Mage::helper('salesrule')->__('Shipping Country')
        );
        
        $this->setAttributeOption($attributes);
        
        return $this;
    }

    
    
    /**
     * {@inheritDoc}
     * @see Mage_SalesRule_Model_Rule_Condition_Address::validate()
     */
    public function validate (Varien_Object $object)
    {
        $address = $object;
        if (! $address instanceof Mage_Sales_Model_Quote_Address) {
            if ($object->getQuote()->isVirtual()) {
                $address = $object->getQuote()->getBillingAddress();
            } else {
                $address = $object->getQuote()->getShippingAddress();
            }
        }
        
        if ('payment_method' == $this->getAttribute() &&
                 ! $address->hasPaymentMethod()) {
            $address->setPaymentMethod(
                    $object->getQuote()
                        ->getPayment()
                        ->getMethod());
        }
        
       // Mage::log($object);
        $address->setPurchaseAmount(Mage::helper("bonus")->getCustomerPurchaseAmount());
        
        return Mage_Rule_Model_Condition_Abstract::validate($address);
    }
    
}