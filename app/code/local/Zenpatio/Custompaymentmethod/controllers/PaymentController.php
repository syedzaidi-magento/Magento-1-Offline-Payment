<?php
// app/code/local/Zenpatio/Custompaymentmethod/controllers/PaymentController.php
class Zenpatio_Custompaymentmethod_PaymentController extends Mage_Core_Controller_Front_Action
{
  public function gatewayAction()
  {
    if ($this->getRequest()->get("orderId"))
    {
      $arr_querystring = array(
        'flag' => 1,
        'orderId' => $this->getRequest()->get("orderId")
      );

      Mage_Core_Controller_Varien_Action::_redirect('custompaymentmethod/payment/response', array('_secure' => false, '_query'=> $arr_querystring));
    }
  }

  public function redirectAction()
  {
    $this->loadLayout();
    $block = $this->getLayout()->createBlock('Mage_Core_Block_Template','custompaymentmethod',array('template' => 'custompaymentmethod/redirect.phtml'));
    $this->getLayout()->getBlock('content')->append($block);
    $this->renderLayout();
  }

  public function responseAction()
  {
    if ($this->getRequest()->get("flag") == "1" && $this->getRequest()->get("orderId"))
    {
      $orderId = $this->getRequest()->get("orderId");
      $order = Mage::getModel('sales/order')->loadByIncrementId($orderId);
      $order->sendNewOrderEmail();
      $order->setState(Mage_Sales_Model_Order::STATE_PROCESSING, true, 'Payment Success.');
      $order->save();

      Mage::getSingleton('checkout/session')->unsQuoteId();
      Mage_Core_Controller_Varien_Action::_redirect('checkout/onepage/success', array('_secure'=> false));
    }
    else
    {
      Mage_Core_Controller_Varien_Action::_redirect('checkout/onepage/error', array('_secure'=> false));
    }
  }
}
