<?php
$module_name = 'k_transactions';
$listViewDefs [$module_name] = 
array (
  'K_BOOKINGS_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_K_BOOKINGS_NAME',
    'id' => 'K_BOOKINGS_ID',
    'width' => '10%',
    'default' => true,
  ),
  'CONTACTS_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_CONTACTS_NAME',
    'id' => 'CONTACTS_ID',
    'width' => '10%',
    'default' => true,
  ),
  'K_TRANSACTION_TYPE' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_K_TRANSACTION_TYPE',
    'width' => '10%',
    'default' => true,
  ),
  'K_TRANSACTION_REFUND_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_K_TRANSACTION_REFUND_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'K_PAYMENT_METHOD' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_K_PAYMENT_METHOD',
    'width' => '10%',
    'default' => true,
  ),
  'K_TRANSACTION_AMOUNT' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_K_TRANSACTION_AMOUNT',
    'width' => '10%',
    'default' => true,
  ),
  'DATE_ENTERED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'default' => true,
  ),
  'DATE_MODIFIED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_MODIFIED',
    'width' => '10%',
    'default' => true,
  ),
  'CREATED_BY_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_CREATED',
    'id' => 'CREATED_BY',
    'width' => '10%',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
);
;
?>
