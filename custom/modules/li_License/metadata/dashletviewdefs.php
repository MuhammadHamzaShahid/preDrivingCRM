<?php
$dashletData['li_LicenseDashlet']['searchFields'] = array (
  'name' => 
  array (
    'default' => '',
  ),
  'theory' => 
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
  'theory' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_THEORY',
    'width' => '10%',
    'default' => true,
    'name' => 'theory',
  ),
  'availability' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_AVAILABILITY',
    'width' => '10%',
    'default' => true,
    'name' => 'availability',
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
  'date_entered' => 
  array (
    'type' => 'datetime',
    'width' => '15%',
    'label' => 'LBL_DATE_ENTERED',
    'default' => false,
  ),
  'date_modified' => 
  array (
    'type' => 'datetime',
    'width' => '15%',
    'label' => 'LBL_DATE_MODIFIED',
    'default' => false,
  ),
  'assigned_user_name' => 
  array (
    'link' => true,
    'type' => 'relate',
    'width' => '8%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'id' => 'ASSIGNED_USER_ID',
    'default' => false,
  ),
  'created_by_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_CREATED',
    'id' => 'CREATED_BY',
    'width' => '10%',
    'default' => false,
  ),
);
