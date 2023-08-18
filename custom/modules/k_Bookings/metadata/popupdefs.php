<?php
$popupMeta = array (
    'moduleMain' => 'k_Bookings',
    'varName' => 'k_Bookings',
    'orderBy' => 'k_bookings.name',
    'whereClauses' => array (
  'accounts_name' => 'k_bookings.accounts_name',
  'contacts_name' => 'k_bookings.contacts_name',
  'li_license_name' => 'k_bookings.li_license_name',
  'assigned_user_id' => 'k_bookings.assigned_user_id',
  'k_candidate_name' => 'k_bookings.k_candidate_name',
  'k_license_no' => 'k_bookings.k_license_no',
),
    'searchInputs' => array (
  4 => 'accounts_name',
  5 => 'contacts_name',
  6 => 'li_license_name',
  7 => 'assigned_user_id',
  8 => 'k_candidate_name',
  9 => 'k_license_no',
),
    'searchdefs' => array (
  'k_candidate_name' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_K_CANDIDATE_NAME',
    'width' => '10%',
    'name' => 'k_candidate_name',
  ),
  'k_license_no' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_K_LICENSE_NO',
    'width' => '10%',
    'name' => 'k_license_no',
  ),
  'accounts_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_ACCOUNTS_NAME',
    'id' => 'ACCOUNTS_ID',
    'width' => '10%',
    'name' => 'accounts_name',
  ),
  'contacts_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_CONTACTS_NAME',
    'id' => 'CONTACTS_ID',
    'width' => '10%',
    'name' => 'contacts_name',
  ),
  'li_license_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_LI_LICENSE_NAME',
    'id' => 'LI_LICENSE_ID',
    'width' => '10%',
    'name' => 'li_license_name',
  ),
  'assigned_user_id' => 
  array (
    'name' => 'assigned_user_id',
    'label' => 'LBL_ASSIGNED_TO',
    'type' => 'enum',
    'function' => 
    array (
      'name' => 'get_user_array',
      'params' => 
      array (
        0 => false,
      ),
    ),
    'width' => '10%',
  ),
),
    'listviewdefs' => array (
  'K_CANDIDATE_NAME' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_K_CANDIDATE_NAME',
    'width' => '10%',
    'default' => true,
    'name' => 'k_candidate_name',
  ),
  'LI_LICENSE_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_LI_LICENSE_NAME',
    'id' => 'LI_LICENSE_ID',
    'width' => '10%',
    'default' => true,
    'name' => 'li_license_name',
  ),
  'K_LICENSE_NO' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_K_LICENSE_NO',
    'width' => '10%',
    'default' => true,
    'name' => 'k_license_no',
  ),
  'ACCOUNTS_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_ACCOUNTS_NAME',
    'id' => 'ACCOUNTS_ID',
    'width' => '10%',
    'default' => true,
    'name' => 'accounts_name',
  ),
  'STATUS' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_STATUS',
    'width' => '10%',
    'default' => true,
    'name' => 'status',
  ),
  'CONTACTS_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_CONTACTS_NAME',
    'id' => 'CONTACTS_ID',
    'width' => '10%',
    'default' => true,
    'name' => 'contacts_name',
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
    'name' => 'assigned_user_name',
  ),
),
);
