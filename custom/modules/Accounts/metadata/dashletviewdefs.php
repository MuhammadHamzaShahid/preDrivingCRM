<?php
$dashletData['AccountsDashlet']['searchFields'] = array (
  'name' => 
  array (
    'default' => '',
  ),
  'k_select_centre_c' => 
  array (
    'default' => '',
  ),
  'k_gateway_id_c' => 
  array (
    'default' => '',
  ),
  'k_license_c' => 
  array (
    'default' => '',
  ),
  'k_password_c' => 
  array (
    'default' => '',
  ),
  'date_entered' => 
  array (
    'default' => '',
  ),
);
$dashletData['AccountsDashlet']['columns'] = array (
  'name' => 
  array (
    'width' => '40%',
    'label' => 'LBL_LIST_ACCOUNT_NAME',
    'link' => true,
    'default' => true,
    'name' => 'name',
  ),
  'phone_office' => 
  array (
    'width' => '15%',
    'label' => 'LBL_LIST_PHONE',
    'default' => true,
    'name' => 'phone_office',
  ),
  'k_gateway_id_c' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_K_GATEWAY_ID_C',
    'width' => '10%',
    'default' => false,
  ),
  'email1' => 
  array (
    'width' => '8%',
    'label' => 'LBL_EMAIL_ADDRESS_PRIMARY',
    'name' => 'email1',
    'default' => false,
  ),
  'k_license_c' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_K_LICENSE_C',
    'width' => '10%',
    'default' => false,
  ),
  'k_password_c' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_K_PASSWORD_C',
    'width' => '10%',
    'default' => false,
  ),
  'k_select_centre_c' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_K_SELECT_CENTRE_C',
    'width' => '10%',
    'default' => false,
  ),
  'date_entered' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_ENTERED',
    'name' => 'date_entered',
    'default' => false,
  ),
  'date_modified' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_MODIFIED',
    'name' => 'date_modified',
    'default' => false,
  ),
  'created_by' => 
  array (
    'width' => '8%',
    'label' => 'LBL_CREATED',
    'name' => 'created_by',
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
