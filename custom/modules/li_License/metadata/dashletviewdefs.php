<?php
$dashletData['li_LicenseDashlet']['searchFields'] = array (
  'name' => 
  array (
    'default' => '',
  ),
  'availability' => 
  array (
    'default' => '',
  ),
  'li_license_accounts_name' => 
  array (
    'default' => '',
  ),
  'k_select_centre_c' => 
  array (
    'default' => '',
  ),
  'k_requested_centre_c' => 
  array (
    'default' => '',
  ),
);
$dashletData['li_LicenseDashlet']['columns'] = array (
  'name' => 
  array (
    'width' => '40%',
    'label' => 'LBL_LIST_NAME',
    'link' => true,
    'default' => true,
    'name' => 'name',
  ),
  'availability' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_AVAILABILITY',
    'width' => '10%',
    'default' => true,
  ),
  'li_license_accounts_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_LI_LICENSE_ACCOUNTS_FROM_ACCOUNTS_TITLE',
    'id' => 'LI_LICENSE_ACCOUNTSACCOUNTS_IDA',
    'width' => '10%',
    'default' => true,
    'name' => 'li_license_accounts_name',
  ),
  'k_select_centre_c' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_K_SELECT_CENTRE_C',
    'width' => '10%',
    'default' => true,
    'name' => 'k_select_centre_c',
  ),
  'k_requested_centre_c' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_K_REQUESTED_CENTRE_C',
    'width' => '10%',
    'default' => true,
    'name' => 'k_requested_centre_c',
  ),
);
