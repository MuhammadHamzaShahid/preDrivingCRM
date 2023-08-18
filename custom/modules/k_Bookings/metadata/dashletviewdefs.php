<?php
$dashletData['k_BookingsDashlet']['searchFields'] = array (
  'k_candidate_name' => 
  array (
    'default' => '',
  ),
  'k_license_no' => 
  array (
    'default' => '',
  ),
  'k_driving_test_ref_no' => 
  array (
    'default' => '',
  ),
  'k_buyer_name' => 
  array (
    'default' => '',
  ),
  'assigned_user_name' => 
  array (
    'default' => '',
  ),
);
$dashletData['k_BookingsDashlet']['columns'] = array (
  'k_candidate_name' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_K_CANDIDATE_NAME',
    'width' => '10%',
    'default' => true,
    'name' => 'k_candidate_name',
  ),
  'k_license_no' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_K_LICENSE_NO',
    'width' => '10%',
    'default' => true,
    'name' => 'k_license_no',
  ),
  'k_driving_test_ref_no' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_K_DRIVING_TEST_REF_NO',
    'width' => '10%',
    'default' => true,
    'name' => 'k_driving_test_ref_no',
  ),
  'k_test_center' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_K_TEST_CENTER',
    'width' => '10%',
    'default' => true,
    'name' => 'k_test_center',
  ),
  'k_buyer_name' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_K_BUYER_NAME',
    'width' => '10%',
    'default' => true,
    'name' => 'k_buyer_name',
  ),
  'k_test_detail' => 
  array (
    'type' => 'Text',
    'label' => 'LBL_K_TEST_DETAIL',
    'width' => '10%',
    'default' => false,
    'name' => 'k_test_detail',
  ),
  'k_last_date' => 
  array (
    'type' => 'date',
    'label' => 'LBL_K_LAST_DATE',
    'width' => '10%',
    'default' => false,
    'name' => 'k_last_date',
  ),
  'k_date_and_time' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_K_DATE_AND_TIME',
    'width' => '10%',
    'default' => false,
    'name' => 'k_date_and_time',
  ),
  'total' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_TOTAL',
    'width' => '10%',
    'default' => false,
    'name' => 'total',
  ),
  'commission' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_COMMISSION',
    'width' => '10%',
    'default' => false,
    'name' => 'commission',
  ),
  'confirmation_reminder' => 
  array (
    'type' => 'enum',
    'default' => false,
    'label' => 'LBL_CONFIRMATION_REMINDER',
    'width' => '10%',
    'name' => 'confirmation_reminder',
  ),
  'assigned_user_name' => 
  array (
    'width' => '8%',
    'label' => 'LBL_LIST_ASSIGNED_USER',
    'name' => 'assigned_user_name',
    'default' => false,
  ),
  'days_to_pay' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_DAYS_TO_PAY',
    'width' => '10%',
    'default' => false,
    'name' => 'days_to_pay',
  ),
  'test_fee' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_TEST_FEE',
    'width' => '10%',
    'default' => false,
    'name' => 'test_fee',
  ),
  'contacts_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_CONTACTS_NAME',
    'id' => 'CONTACTS_ID',
    'width' => '10%',
    'default' => false,
    'name' => 'contacts_name',
  ),
  'refund' => 
  array (
    'type' => 'enum',
    'default' => false,
    'label' => 'LBL_REFUND',
    'width' => '10%',
    'name' => 'refund',
  ),
  'cancelled_by' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_CANCELLED_BY',
    'width' => '10%',
    'default' => false,
    'name' => 'cancelled_by',
  ),
  'cancelled_dvsa' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_CANCELLED_DVSA',
    'width' => '10%',
    'default' => false,
    'name' => 'cancelled_dvsa',
  ),
  'status' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_STATUS',
    'width' => '10%',
    'default' => false,
    'name' => 'status',
  ),
  'test_days' => 
  array (
    'type' => 'enum',
    'default' => false,
    'label' => 'LBL_TEST_DAYS',
    'width' => '10%',
    'name' => 'test_days',
  ),
  'vat' => 
  array (
    'type' => 'enum',
    'default' => false,
    'label' => 'LBL_VAT',
    'width' => '10%',
    'name' => 'vat',
  ),
  'reminder' => 
  array (
    'type' => 'enum',
    'default' => false,
    'label' => 'LBL_REMINDER',
    'width' => '10%',
    'name' => 'reminder',
  ),
  'discount' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_DISCOUNT',
    'width' => '10%',
    'default' => false,
    'name' => 'discount',
  ),
);
