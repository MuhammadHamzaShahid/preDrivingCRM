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
  'K_LICENSE_NO' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_K_LICENSE_NO',
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
  'K_BUYER_NAME' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_K_BUYER_NAME',
    'width' => '10%',
    'default' => true,
  ),
  'K_MANAGEMENT_FEE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_K_MANAGEMENT_FEE',
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
