<?php
$dashletData['k_transactionsDashlet']['searchFields'] = array (
  'k_bookings_name' => 
  array (
    'default' => '',
  ),
  'contacts_name' => 
  array (
    'default' => '',
  ),
  'k_transaction_type' => 
  array (
    'default' => '',
  ),
  'k_transaction_refund_date' => 
  array (
    'default' => '',
  ),
  'k_transaction_amount' => 
  array (
    'default' => '',
  ),
  'k_payment_method' => 
  array (
    'default' => '',
  ),
  'date_entered' => 
  array (
    'default' => '',
  ),
  'date_modified' => 
  array (
    'default' => '',
  ),
  'created_by_name' => 
  array (
    'default' => '',
  ),
  'assigned_user_name' => 
  array (
    'default' => '',
  ),
);
$dashletData['k_transactionsDashlet']['columns'] = array (
  'k_bookings_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_K_BOOKINGS_NAME',
    'id' => 'K_BOOKINGS_ID',
    'width' => '10%',
    'default' => true,
    'name' => 'k_bookings_name',
  ),
  'contacts_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_CONTACTS_NAME',
    'id' => 'CONTACTS_ID',
    'width' => '10%',
    'default' => true,
    'name' => 'contacts_name',
  ),
  'k_transaction_type' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_K_TRANSACTION_TYPE',
    'width' => '10%',
    'default' => true,
    'name' => 'k_transaction_type',
  ),
  'k_transaction_refund_date' => 
  array (
    'type' => 'date',
    'label' => 'LBL_K_TRANSACTION_REFUND_DATE',
    'width' => '10%',
    'default' => true,
    'name' => 'k_transaction_refund_date',
  ),
  'k_payment_method' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_K_PAYMENT_METHOD',
    'width' => '10%',
    'default' => true,
    'name' => 'k_payment_method',
  ),
  'k_transaction_amount' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_K_TRANSACTION_AMOUNT',
    'width' => '10%',
    'default' => true,
    'name' => 'k_transaction_amount',
  ),
  'date_entered' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_ENTERED',
    'default' => false,
    'name' => 'date_entered',
  ),
  'date_modified' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_MODIFIED',
    'name' => 'date_modified',
    'default' => false,
  ),
  'created_by_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_CREATED',
    'id' => 'CREATED_BY',
    'width' => '10%',
    'default' => false,
  ),
  'assigned_user_name' => 
  array (
    'width' => '8%',
    'label' => 'LBL_LIST_ASSIGNED_USER',
    'name' => 'assigned_user_name',
    'default' => false,
  ),
);
