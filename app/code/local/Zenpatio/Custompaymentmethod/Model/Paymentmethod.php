<?php
// app/code/local/Zenpatio/Custompaymentmethod/Model/Paymentmethod.php
class Zenpatio_Custompaymentmethod_Model_Paymentmethod extends Mage_Payment_Model_Method_Abstract {
  protected $_code  = 'custompaymentmethod';
  protected $_formBlockType = 'custompaymentmethod/form_custompaymentmethod';
  protected $_infoBlockType = 'custompaymentmethod/info_custompaymentmethod';

  public function assignData($data)
  {
    $info = $this->getInfoInstance();

    if ($data->getCustomFieldOne())
    {
      $info->setCustomFieldOne($data->getCustomFieldOne());
    }

    if ($data->getCustomFieldTwo())
    {
      $info->setCustomFieldTwo($data->getCustomFieldTwo());
    }

    if ($data->getCustomFieldThree())
    {
      $info->setCustomFieldThree($data->getCustomFieldThree());
    }

    if ($data->getCustomFieldFour())
    {
      $info->setCustomFieldFour($data->getCustomFieldFour());
    }

    if ($data->getCustomFieldFive())
    {
      $info->setCustomFieldFive($data->getCustomFieldFive());
    }

    return $this;
  }

  public function validate()
  {
    parent::validate();
    $info = $this->getInfoInstance();

    if (!$info->getCustomFieldOne())
    {
      $errorCode = 'invalid_data';
      $errorMsg = $this->_getHelper()->__("Credit Card Type is a required field.\n");
    }

    if (!$info->getCustomFieldTwo())
    {
      $errorCode = 'invalid_data';
      $errorMsg .= $this->_getHelper()->__("Credit Card Number is a required field.\n");
    }

    if (!$info->getCustomFieldThree())
    {
      $errorCode = 'invalid_data';
      $errorMsg .= $this->_getHelper()->__("Credit Card Name is a required field.\n");
    }

    if (!$info->getCustomFieldFour())
    {
      $errorCode = 'invalid_data';
      $errorMsg .= $this->_getHelper()->__("Expiration is a required field.\n");
    }

    if (!$info->getCustomFieldFive())
    {
      $errorCode = 'invalid_data';
      $errorMsg .= $this->_getHelper()->__("Credit Card CVV is a required field.\n");
    }

    if ($errorMsg)
    {
      Mage::throwException($errorMsg);
    }

    return $this;
  }

  public function getOrderPlaceRedirectUrl()
  {
    return Mage::getUrl('custompaymentmethod/payment/redirect', array('_secure' => false));
  }
}
