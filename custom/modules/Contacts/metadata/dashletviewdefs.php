<?php
$dashletData['ContactsDashlet']['searchFields'] = array (
  'date_entered' => 
  array (
    'default' => '',
  ),
  'title' => 
  array (
    'default' => '',
  ),
  'primary_address_country' => 
  array (
    'default' => '',
  ),
  'assigned_user_id' => 
  array (
    'type' => 'assigned_user_name',
    'default' => 'Administrator',
    'label' => 'LBL_ASSIGNED_TO',
  ),
);
$dashletData['ContactsDashlet']['columns'] = array (
  'name' => 
  array (
    'width' => '30%',
    'label' => 'LBL_NAME',
    'link' => true,
    'default' => true,
    'related_fields' => 
    array (
      0 => 'first_name',
      1 => 'last_name',
      2 => 'salutation',
    ),
    'name' => 'name',
  ),
  'phone_mobile' => 
  array (
    'width' => '10%',
    'label' => 'LBL_MOBILE_PHONE',
    'name' => 'phone_mobile',
    'default' => true,
  ),
  'email1' => 
  array (
    'width' => '10%',
    'label' => 'LBL_EMAIL_ADDRESS',
    'sortable' => false,
    'customCode' => '{$EMAIL1_LINK}',
    'name' => 'email1',
    'default' => true,
  ),
  'buyer_type' => 
  array (
    'type' => 'enum',
    'default' => true,
    'label' => 'LBL_BUYER_TYPE',
    'width' => '10%',
  ),
  'account_holder' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ACCOUNT_HOLDER',
    'width' => '10%',
    'default' => true,
  ),
  'priority' => 
  array (
    'type' => 'enum',
    'default' => false,
    'label' => 'LBL_PRIORITY',
    'width' => '10%',
  ),
  'payment_type' => 
  array (
    'type' => 'enum',
    'default' => false,
    'label' => 'LBL_PAYMENT_TYPE',
    'width' => '10%',
  ),
  'amount' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_AMOUNT',
    'width' => '10%',
    'default' => false,
  ),
);
