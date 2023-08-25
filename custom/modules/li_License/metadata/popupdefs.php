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
  'theory' => 'li_license.theory',
  'availability' => 'li_license.availability',
  'date_entered' => 'li_license.date_entered',
  'date_modified' => 'li_license.date_modified',
  'created_by_name' => 'li_license.created_by_name',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'li_license_accounts_name',
  5 => 'k_select_centre_c',
  6 => 'k_requested_centre_c',
  7 => 'theory',
  8 => 'availability',
  9 => 'date_entered',
  10 => 'date_modified',
  11 => 'created_by_name',
),
    'searchdefs' => array (
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  'theory' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_THEORY',
    'width' => '10%',
    'name' => 'theory',
  ),
  'availability' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_AVAILABILITY',
    'width' => '10%',
    'name' => 'availability',
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
  'date_entered' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'name' => 'date_entered',
  ),
  'date_modified' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_MODIFIED',
    'width' => '10%',
    'name' => 'date_modified',
  ),
  'created_by_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_CREATED',
    'id' => 'CREATED_BY',
    'width' => '10%',
    'name' => 'created_by_name',
  ),
),
    'listviewdefs' => array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
    'name' => 'name',
  ),
  'THEORY' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_THEORY',
    'width' => '10%',
    'default' => true,
    'name' => 'theory',
  ),
  'LI_LICENSE_ACCOUNTS_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_LI_LICENSE_ACCOUNTS_FROM_ACCOUNTS_TITLE',
    'id' => 'LI_LICENSE_ACCOUNTSACCOUNTS_IDA',
    'width' => '10%',
    'default' => true,
    'name' => 'li_license_accounts_name',
  ),
  'AVAILABILITY' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_AVAILABILITY',
    'width' => '10%',
    'default' => true,
    'name' => 'availability',
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
    'type' => 'enum',
    'label' => 'LBL_K_REQUESTED_CENTRE_C',
    'width' => '10%',
    'default' => true,
    'name' => 'k_requested_centre_c',
  ),
  'DATE_ENTERED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'default' => true,
    'name' => 'date_entered',
  ),
  'DATE_MODIFIED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_MODIFIED',
    'width' => '10%',
    'default' => true,
    'name' => 'date_modified',
  ),
  'CREATED_BY_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_CREATED',
    'id' => 'CREATED_BY',
    'width' => '10%',
    'default' => true,
    'name' => 'created_by_name',
  ),
),
);
