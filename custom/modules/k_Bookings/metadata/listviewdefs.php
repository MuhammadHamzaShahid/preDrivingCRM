<?php
$module_name = 'k_Bookings';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'K_STATUS' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_K_STATUS',
    'width' => '10%',
    'default' => true,
  ),
  'ACCOUNTS_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_ACCOUNTS_NAME',
    'id' => 'ACCOUNTS_ID',
    'width' => '10%',
    'default' => true,
  ),
  'LI_LICENSE_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_LI_LICENSE_NAME',
    'id' => 'LI_LICENSE_ID',
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
  'K_DRIVING_TEST_REF_NO' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_K_DRIVING_TEST_REF_NO',
    'width' => '10%',
    'default' => true,
  ),
  'K_LICENSE_NO' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_K_LICENSE_NO',
    'width' => '10%',
    'default' => true,
  ),
  'K_BUYER_NAME' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_K_BUYER_NAME',
    'width' => '10%',
    'default' => true,
  ),
  'TEST_FEE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_TEST_FEE',
    'width' => '10%',
    'default' => true,
  ),
  'COMMISSION' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_COMMISSION',
    'width' => '10%',
    'default' => true,
  ),
  'K_SWAP_FEE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_K_SWAP_FEE',
    'width' => '10%',
    'default' => true,
  ),
  'TOTAL' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_TOTAL',
    'width' => '10%',
    'default' => true,
  ),
  'K_DATE_AND_TIME' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_K_DATE_AND_TIME',
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
);
;
?>
