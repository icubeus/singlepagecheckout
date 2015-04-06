<?php

class Icube_Singlepagecheckout_Block_Link extends Mage_Checkout_Block_Onepage_Link
{

    /**
     * Adds a link to the single page checkout
     *
     * @return Icube_Singlepagecheckout_Block_Link
     */
    public function addSinglepageCheckoutLink()
    {
        if (!$this->helper('singlepagecheckout')->singlePageCheckoutEnabled()) {
            return $this;
        }

        $parentBlock = $this->getParentBlock();
        if ($parentBlock && Mage::helper('core')->isModuleOutputEnabled('Icube_Singlepagecheckout')) {
            $text = $this->__('Checkout in Single Page');
            $parentBlock->addLink(
                $text,
                'checkout/singlepage',
                $text,
                true,
                array('_secure' => true),
                60,
                null,
                'class="top-link-checkout"'
            );
        }
        return $this;
    }

    function isPossibleSinglepageCheckout()
    {
        return $this->helper('singlepagecheckout')->singlePageCheckoutEnabled();
    }

    function getCheckoutUrl()
    {
        return $this->getUrl('checkout/singlepage', array('_secure'=>true));
    }
}
