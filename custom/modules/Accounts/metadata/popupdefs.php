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
),
    'searchInputs' => array (
  0 => 'name',
  7 => 'email',
  9 => 'k_gateway_id_c',
  10 => 'k_password_c',
  11 => 'phone_office',
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
),
);
