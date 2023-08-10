<?php
$popupMeta = array (
    'moduleMain' => 'Account',
    'varName' => 'ACCOUNT',
    'orderBy' => 'name',
    'whereClauses' => array (
  'name' => 'accounts.name',
  'email' => 'accounts.email',
  'k_gateway_id_c' => 'accounts.k_gateway_id_c',
  'k_password_c' => 'accounts.k_password_c',
  'phone_office' => 'accounts.phone_office',
  'k_license_c' => 'accounts.k_license_c',
  'k_select_centre_c' => 'accounts.k_select_centre_c',
  'k_requested_centre_c' => 'accounts.k_requested_centre_c',
),
    'searchInputs' => array (
  0 => 'name',
  7 => 'email',
  9 => 'k_gateway_id_c',
  10 => 'k_password_c',
  11 => 'phone_office',
  12 => 'k_license_c',
  13 => 'k_select_centre_c',
  14 => 'k_requested_centre_c',
),
    'create' => array (
  'formBase' => 'AccountFormBase.php',
  'formBaseClass' => 'AccountFormBase',
  'getFormBodyParams' => 
  array (
    0 => '',
    1 => '',
    2 => 'AccountSave',
  ),
  'createButton' => 'LNK_NEW_ACCOUNT',
),
    'searchdefs' => array (
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  'k_gateway_id_c' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_K_GATEWAY_ID_C',
    'width' => '10%',
    'name' => 'k_gateway_id_c',
  ),
  'k_password_c' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_K_PASSWORD_C',
    'width' => '10%',
    'name' => 'k_password_c',
  ),
  'email' => 
  array (
    'name' => 'email',
    'width' => '10%',
  ),
  'phone_office' => 
  array (
    'type' => 'phone',
    'label' => 'LBL_PHONE_OFFICE',
    'width' => '10%',
    'name' => 'phone_office',
  ),
  'k_license_c' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_K_LICENSE_C',
    'width' => '10%',
    'name' => 'k_license_c',
  ),
  'k_select_centre_c' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_K_SELECT_CENTRE_C',
    'width' => '10%',
    'name' => 'k_select_centre_c',
  ),
  'k_requested_centre_c' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_K_REQUESTED_CENTRE_C',
    'width' => '10%',
    'name' => 'k_requested_centre_c',
  ),
),
    'listviewdefs' => array (
  'NAME' => 
  array (
    'width' => '40%',
    'label' => 'LBL_LIST_ACCOUNT_NAME',
    'link' => true,
    'default' => true,
    'name' => 'name',
  ),
  'K_GATEWAY_ID_C' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_K_GATEWAY_ID_C',
    'width' => '10%',
    'default' => true,
    'name' => 'k_gateway_id_c',
  ),
  'K_PASSWORD_C' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_K_PASSWORD_C',
    'width' => '10%',
    'default' => true,
    'name' => 'k_password_c',
  ),
  'EMAIL1' => 
  array (
    'type' => 'varchar',
    'studio' => 
    array (
      'editField' => true,
      'searchview' => false,
    ),
    'label' => 'LBL_EMAIL',
    'width' => '10%',
    'default' => true,
    'name' => 'email1',
  ),
  'PHONE_OFFICE' => 
  array (
    'type' => 'phone',
    'label' => 'LBL_PHONE_OFFICE',
    'width' => '10%',
    'default' => true,
    'name' => 'phone_office',
  ),
  'K_LICENSE_C' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_K_LICENSE_C',
    'width' => '10%',
    'default' => true,
    'name' => 'k_license_c',
  ),
  'K_SELECT_CENTRE_C' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_K_SELECT_CENTRE_C',
    'width' => '10%',
    'default' => true,
    'name' => 'k_select_centre_c',
  ),
  'K_REQUESTED_CENTRE_C' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_K_REQUESTED_CENTRE_C',
    'width' => '10%',
    'default' => true,
  ),
),
);
