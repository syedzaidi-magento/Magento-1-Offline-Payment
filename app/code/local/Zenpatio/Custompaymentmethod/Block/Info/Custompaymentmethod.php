<?php
// app/code/local/Zenpatio/Custompaymentmethod/Block/Info/Custompaymentmethod.php
class Zenpatio_Custompaymentmethod_Block_Info_Custompaymentmethod extends Mage_Payment_Block_Info
{
    protected function _prepareSpecificInformation($transport = null)
    {
      if (null !== $this->_paymentSpecificInformation)
      {
        return $this->_paymentSpecificInformation;
      }

      $data = array();
      if ($this->getInfo()->getCustomFieldOne())
      {
        $data[Mage::helper('payment')->__('Custom Field One')] = $this->getInfo()->getCustomFieldOne();
      }

      if ($this->getInfo()->getCustomFieldTwo())
      {
        $data[Mage::helper('payment')->__('Custom Field Two')] = $this->getInfo()->getCustomFieldTwo();
      }

      if ($this->getInfo()->getCustomFieldThree())
      {
        $data[Mage::helper('payment')->__('Custom Field Three')] = $this->getInfo()->getCustomFieldThree();
      }

      if ($this->getInfo()->getCustomFieldFour())
      {
        $data[Mage::helper('payment')->__('Custom Field Four')] = $this->getInfo()->getCustomFieldFour();
      }

      if ($this->getInfo()->getCustomFieldFive())
      {
        $data[Mage::helper('payment')->__('Custom Field Five')] = $this->getInfo()->getCustomFieldFive();
      }

      $transport = parent::_prepareSpecificInformation($transport);

      return $transport->setData(array_merge($data, $transport->getData()));
    }
    protected function _construct()
      {
      parent::_construct();
      $this->setTemplate('custompaymentmethod/info/custompaymentmethod.phtml');
      }

}
