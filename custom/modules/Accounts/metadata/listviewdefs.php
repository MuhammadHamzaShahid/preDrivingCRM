<?php
$listViewDefs ['Accounts'] = 
array (
  'NAME' => 
  array (
    'width' => '20%',
    'label' => 'LBL_LIST_ACCOUNT_NAME',
    'link' => true,
    'default' => true,
  ),
  'K_GATEWAY_ID_C' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_K_GATEWAY_ID_C',
    'width' => '10%',
    'default' => true,
  ),
  'K_PASSWORD_C' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_K_PASSWORD_C',
    'width' => '10%',
    'default' => true,
  ),
  'EMAIL1' => 
  array (
    'width' => '15%',
    'label' => 'LBL_EMAIL_ADDRESS',
    'sortable' => false,
    'link' => true,
    'customCode' => '{$EMAIL1_LINK}',
    'default' => true,
  ),
  'PHONE_OFFICE' => 
  array (
    'width' => '10%',
    'label' => 'LBL_LIST_PHONE',
    'default' => true,
  ),
  'K_LICENSE_C' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_K_LICENSE_C',
    'width' => '10%',
    'default' => true,
  ),
  'K_SELECT_CENTRE_C' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_K_SELECT_CENTRE_C',
    'width' => '10%',
    'default' => true,
  ),
  'K_REQUESTED_CENTRE_C' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_K_REQUESTED_CENTRE_C',
    'width' => '10%',
    'default' => true,
  ),
  'DATE_ENTERED' => 
  array (
    'width' => '5%',
    'label' => 'LBL_DATE_ENTERED',
    'default' => true,
  ),
  'DATE_MODIFIED' => 
  array (
    'width' => '5%',
    'label' => 'LBL_DATE_MODIFIED',
    'default' => false,
  ),
  'CREATED_BY_NAME' => 
  array (
    'width' => '10%',
    'label' => 'LBL_CREATED',
    'default' => false,
  ),
  'MODIFIED_BY_NAME' => 
  array (
    'width' => '10%',
    'label' => 'LBL_MODIFIED',
    'default' => false,
  ),
);
;
?>
