<?php

class Icube_Singlepagecheckout_Block_Singlepage extends Mage_Checkout_Block_Onepage
{
protected function _getStepCodes()
    {
        return array('login', 'shipping', 'shipping_method', 'payment', 'billing', 'review');
    }
}
