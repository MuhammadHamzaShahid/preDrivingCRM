<?php
$dashletData['k_transactionsDashlet']['searchFields'] = array (
  'name' => 
  array (
    'default' => '',
  ),
  'k_bookings_name' => 
  array (
    'default' => '',
  ),
  'contacts_name' => 
  array (
    'default' => '',
  ),
  'k_transaction_amount' => 
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
  'name' => 
  array (
    'type' => 'name',
    'link' => true,
    'width' => '40%',
    'label' => 'LBL_NAME',
    'default' => true,
  ),
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
    'default' => true,
    'name' => 'date_entered',
  ),
  'date_modified' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_MODIFIED',
    'name' => 'date_modified',
    'default' => true,
  ),
);
