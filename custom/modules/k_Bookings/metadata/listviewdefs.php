<?php
$module_name = 'k_Bookings';
$listViewDefs [$module_name] = 
array (
  'K_CANDIDATE_NAME' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_K_CANDIDATE_NAME',
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
  'K_DRIVING_TEST_REF_NO' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_K_DRIVING_TEST_REF_NO',
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
);
;
?>
