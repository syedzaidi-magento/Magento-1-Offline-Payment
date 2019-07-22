<?php
// app/code/local/Zenpatio/Custompaymentmethod/Block/Form/Custompaymentmethod.php
class Zenpatio_Custompaymentmethod_Block_Form_Custompaymentmethod extends Mage_Payment_Block_Form
{
  protected function _construct()
  {
    parent::_construct();
    $this->setTemplate('custompaymentmethod/form/custompaymentmethod.phtml');
  }
}
