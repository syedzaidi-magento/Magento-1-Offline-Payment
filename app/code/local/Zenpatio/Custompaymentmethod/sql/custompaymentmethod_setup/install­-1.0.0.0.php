<?php
$installer = $this;
$installer->startSetup();
// $installer->run("
// ALTER TABLE `{$installer->getTable('sales/quote_payment')}`
// ADD `custom_field_one` VARCHAR( 255 ) NOT NULL,
// ADD `custom_field_two` VARCHAR( 255 ) NOT NULL;
//
// ALTER TABLE `{$installer->getTable('sales/order_payment')}`
// ADD `custom_field_one` VARCHAR( 255 ) NOT NULL,
// ADD `custom_field_two` VARCHAR( 255 ) NOT NULL;
// ");
// $installer->endSetup();


$table = $installer->getConnection()
    ->newTable($installer->getTable('sales/quote_payment'))
    ->addColumn('custom_field_one', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
        'nullable'  => false,
        ), 'custom_field_one')
    ->addColumn('custom_field_two', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
        'nullable'  => false,
        ), 'custom_field_two');
$installer->getConnection()->createTable($table);


$installer->endSetup();
