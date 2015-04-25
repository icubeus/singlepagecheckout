/* Icube Custom - skip shipping method step */
ShippingMethod.prototype.beforeSkipMethod = function(){
		document.getElementById('checkout-step-shipping_method').style.display = 'none';
		document.getElementById('opc-shipping_method').style.display = 'none';
	    jQuery('#shipping_method-progress-opcheckout').hide();
    }
   
/* Icube Custom - skip shipping method step and save */ 
Checkout.prototype.gotoSection = function (section, reloadProgressBlock) {
    // Adds class so that the page can be styled to only show the "Checkout Method" step
    if ((this.currentStep == 'login' || this.currentStep == 'billing') && section == 'billing') {
        $j('body').addClass('opc-has-progressed-from-login');
    }

    if (reloadProgressBlock) {
        this.reloadProgressBlock(this.currentStep);
    }
    this.currentStep = section;
    var sectionElement = $('opc-' + section);
    sectionElement.addClassName('allow');
    this.accordion.openSection('opc-' + section);
    
    /* Icube Custom - shipping method save */
    if(section == 'shipping_method'){
	    shippingMethod.save();
    }
    // Scroll viewport to top of checkout steps for smaller viewports
    if (Modernizr.mq('(max-width: ' + bp.xsmall + 'px)')) {
        $j('html,body').animate({scrollTop: $j('#checkoutSteps').offset().top}, 800);
    }

    if (!reloadProgressBlock) {
        this.resetPreviousSteps();
    }
}