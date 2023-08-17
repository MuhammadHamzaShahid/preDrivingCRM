<?php
$popupMeta = array (
    'moduleMain' => 'li_License',
    'varName' => 'li_License',
    'orderBy' => 'li_license.name',
    'whereClauses' => array (
  'name' => 'li_license.name',
  'li_license_accounts_name' => 'li_license.li_license_accounts_name',
  'k_select_centre_c' => 'li_license.k_select_centre_c',
  'k_requested_centre_c' => 'li_license.k_requested_centre_c',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'li_license_accounts_name',
  5 => 'k_select_centre_c',
  6 => 'k_requested_centre_c',
),
    'searchdefs' => array (
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  'li_license_accounts_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_LI_LICENSE_ACCOUNTS_FROM_ACCOUNTS_TITLE',
    'id' => 'LI_LICENSE_ACCOUNTSACCOUNTS_IDA',
    'width' => '10%',
    'name' => 'li_license_accounts_name',
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
    'type' => 'enum',
    'label' => 'LBL_K_REQUESTED_CENTRE_C',
    'width' => '10%',
    'name' => 'k_requested_centre_c',
  ),
),
);
