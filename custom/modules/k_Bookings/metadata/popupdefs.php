<?php
$popupMeta = array (
    'moduleMain' => 'k_Bookings',
    'varName' => 'k_Bookings',
    'orderBy' => 'k_bookings.name',
    'whereClauses' => array (
  'contacts_name' => 'k_bookings.contacts_name',
  'k_candidate_name' => 'k_bookings.k_candidate_name',
  'k_license_no' => 'k_bookings.k_license_no',
  'k_driving_test_ref_no' => 'k_bookings.k_driving_test_ref_no',
  'k_buyer_name' => 'k_bookings.k_buyer_name',
  'assigned_user_name' => 'k_bookings.assigned_user_name',
),
    'searchInputs' => array (
  5 => 'contacts_name',
  8 => 'k_candidate_name',
  9 => 'k_license_no',
  10 => 'k_driving_test_ref_no',
  11 => 'k_buyer_name',
  12 => 'assigned_user_name',
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
  'k_driving_test_ref_no' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_K_DRIVING_TEST_REF_NO',
    'width' => '10%',
    'name' => 'k_driving_test_ref_no',
  ),
  'k_buyer_name' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_K_BUYER_NAME',
    'width' => '10%',
    'name' => 'k_buyer_name',
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
  'assigned_user_name' => 
  array (
    'link' => true,
    'type' => 'relate',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'id' => 'ASSIGNED_USER_ID',
    'width' => '10%',
    'name' => 'assigned_user_name',
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
  'K_LICENSE_NO' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_K_LICENSE_NO',
    'width' => '10%',
    'default' => true,
    'name' => 'k_license_no',
  ),
  'K_DRIVING_TEST_REF_NO' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_K_DRIVING_TEST_REF_NO',
    'width' => '10%',
    'default' => true,
    'name' => 'k_driving_test_ref_no',
  ),
  'K_BUYER_NAME' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_K_BUYER_NAME',
    'width' => '10%',
    'default' => true,
    'name' => 'k_buyer_name',
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
