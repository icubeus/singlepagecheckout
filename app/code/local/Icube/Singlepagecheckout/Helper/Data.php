<?php

class Icube_Singlepagecheckout_Helper_Data extends Mage_Core_Helper_Abstract
{
    /**
     * Check is the one step checkout is enabled
     *
     * @return bool
     */
    public function singlePageCheckoutEnabled()
    {
        return (bool)Mage::getStoreConfig('checkout/options/singlepagecheckout_enabled');
    }
}
