<?php
$popupMeta = array (
    'moduleMain' => 'k_Bookings',
    'varName' => 'k_Bookings',
    'orderBy' => 'k_bookings.name',
    'whereClauses' => array (
  'contacts_name' => 'k_bookings.contacts_name',
  'k_license_no' => 'k_bookings.k_license_no',
  'k_driving_test_ref_no' => 'k_bookings.k_driving_test_ref_no',
  'k_buyer_name' => 'k_bookings.k_buyer_name',
  'assigned_user_name' => 'k_bookings.assigned_user_name',
  'name' => 'k_bookings.name',
  'accounts_name' => 'k_bookings.accounts_name',
  'date_entered' => 'k_bookings.date_entered',
  'date_modified' => 'k_bookings.date_modified',
  'created_by_name' => 'k_bookings.created_by_name',
  'k_status' => 'k_bookings.k_status',
  'k_transaction_type' => 'k_bookings.k_transaction_type',
),
    'searchInputs' => array (
  5 => 'contacts_name',
  9 => 'k_license_no',
  10 => 'k_driving_test_ref_no',
  11 => 'k_buyer_name',
  12 => 'assigned_user_name',
  13 => 'name',
  14 => 'accounts_name',
  15 => 'date_entered',
  16 => 'date_modified',
  17 => 'created_by_name',
  18 => 'k_status',
  19 => 'k_transaction_type',
),
    'searchdefs' => array (
  'name' => 
  array (
    'type' => 'name',
    'link' => true,
    'label' => 'LBL_NAME',
    'width' => '10%',
    'name' => 'name',
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
  'accounts_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_ACCOUNTS_NAME',
    'id' => 'ACCOUNTS_ID',
    'width' => '10%',
    'name' => 'accounts_name',
  ),
  'k_status' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_K_STATUS',
    'width' => '10%',
    'name' => 'k_status',
  ),
  'k_transaction_type' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_K_TRANSACTION_TYPE',
    'width' => '10%',
    'name' => 'k_transaction_type',
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
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
    'name' => 'name',
  ),
  'K_LICENSE_NO' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_K_LICENSE_NO',
    'width' => '10%',
    'default' => true,
    'name' => 'k_license_no',
  ),
  'K_STATUS' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_K_STATUS',
    'width' => '10%',
    'default' => true,
    'name' => 'k_status',
  ),
  'K_TRANSACTION_TYPE' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_K_TRANSACTION_TYPE',
    'width' => '10%',
    'default' => true,
    'name' => 'k_transaction_type',
  ),
  'K_TEST_CENTER' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_K_TEST_CENTER',
    'width' => '10%',
    'default' => true,
    'name' => 'k_test_center',
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
  'K_DATE_AND_TIME' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_K_DATE_AND_TIME',
    'width' => '10%',
    'default' => true,
    'name' => 'k_date_and_time',
  ),
  'K_SWAP' => 
  array (
    'type' => 'enum',
    'default' => true,
    'label' => 'LBL_K_SWAP',
    'width' => '10%',
    'name' => 'k_swap',
  ),
  'TOTAL' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_TOTAL',
    'width' => '10%',
    'default' => true,
    'name' => 'total',
  ),
  'DAYS_TO_PAY' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_DAYS_TO_PAY',
    'width' => '10%',
    'default' => true,
    'name' => 'days_to_pay',
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
