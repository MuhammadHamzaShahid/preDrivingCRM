<?php
$module_name = 'k_Bookings';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
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
    ),
    'advanced_search' => 
    array (
      'name' => 
      array (
        'type' => 'name',
        'link' => true,
        'label' => 'LBL_NAME',
        'width' => '10%',
        'default' => true,
        'name' => 'name',
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
      'k_buyer_name' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_K_BUYER_NAME',
        'width' => '10%',
        'default' => true,
        'name' => 'k_buyer_name',
      ),
      'test_days' => 
      array (
        'type' => 'enum',
        'default' => true,
        'label' => 'LBL_TEST_DAYS',
        'width' => '10%',
        'name' => 'test_days',
      ),
      'description' => 
      array (
        'type' => 'text',
        'label' => 'LBL_DESCRIPTION',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'description',
      ),
      'status' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_STATUS',
        'width' => '10%',
        'default' => true,
        'name' => 'status',
      ),
      'k_test_center' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_K_TEST_CENTER',
        'width' => '10%',
        'default' => true,
        'name' => 'k_test_center',
      ),
      'test_fee' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_TEST_FEE',
        'width' => '10%',
        'default' => true,
        'name' => 'test_fee',
      ),
      'cancelled_by' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_CANCELLED_BY',
        'width' => '10%',
        'default' => true,
        'name' => 'cancelled_by',
      ),
      'k_last_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_K_LAST_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'k_last_date',
      ),
      'days_to_pay' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_DAYS_TO_PAY',
        'width' => '10%',
        'default' => true,
        'name' => 'days_to_pay',
      ),
      'discount' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_DISCOUNT',
        'width' => '10%',
        'default' => true,
        'name' => 'discount',
      ),
      'refund' => 
      array (
        'type' => 'enum',
        'default' => true,
        'label' => 'LBL_REFUND',
        'width' => '10%',
        'name' => 'refund',
      ),
      'k_swap' => 
      array (
        'type' => 'enum',
        'default' => true,
        'label' => 'LBL_K_SWAP',
        'width' => '10%',
        'name' => 'k_swap',
      ),
      'total' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_TOTAL',
        'width' => '10%',
        'default' => true,
        'name' => 'total',
      ),
      'k_test_detail' => 
      array (
        'type' => 'Text',
        'label' => 'LBL_K_TEST_DETAIL',
        'width' => '10%',
        'default' => true,
        'name' => 'k_test_detail',
      ),
      'commission' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_COMMISSION',
        'width' => '10%',
        'default' => true,
        'name' => 'commission',
      ),
      'reminder' => 
      array (
        'type' => 'enum',
        'default' => true,
        'label' => 'LBL_REMINDER',
        'width' => '10%',
        'name' => 'reminder',
      ),
      'confirmation_reminder' => 
      array (
        'type' => 'enum',
        'default' => true,
        'label' => 'LBL_CONFIRMATION_REMINDER',
        'width' => '10%',
        'name' => 'confirmation_reminder',
      ),
      'cancelled_dvsa' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_CANCELLED_DVSA',
        'width' => '10%',
        'default' => true,
        'name' => 'cancelled_dvsa',
      ),
      'vat' => 
      array (
        'type' => 'enum',
        'default' => true,
        'label' => 'LBL_VAT',
        'width' => '10%',
        'name' => 'vat',
      ),
      'contacts_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'label' => 'LBL_CONTACTS_NAME',
        'id' => 'CONTACTS_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'contacts_name',
      ),
      'accounts_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'label' => 'LBL_ACCOUNTS_NAME',
        'id' => 'ACCOUNTS_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'accounts_name',
      ),
      'li_license_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'label' => 'LBL_LI_LICENSE_NAME',
        'id' => 'LI_LICENSE_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'li_license_name',
      ),
      'k_date_and_time' => 
      array (
        'type' => 'datetime',
        'label' => 'LBL_K_DATE_AND_TIME',
        'width' => '10%',
        'default' => true,
        'name' => 'k_date_and_time',
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
        'default' => true,
        'width' => '10%',
      ),
      'date_entered' => 
      array (
        'type' => 'datetime',
        'label' => 'LBL_DATE_ENTERED',
        'width' => '10%',
        'default' => true,
        'name' => 'date_entered',
      ),
      'date_modified' => 
      array (
        'type' => 'datetime',
        'label' => 'LBL_DATE_MODIFIED',
        'width' => '10%',
        'default' => true,
        'name' => 'date_modified',
      ),
      'created_by' => 
      array (
        'type' => 'assigned_user_name',
        'label' => 'LBL_CREATED',
        'width' => '10%',
        'default' => true,
        'name' => 'created_by',
      ),
    ),
  ),
  'templateMeta' => 
  array (
    'maxColumns' => '3',
    'maxColumnsBasic' => '4',
    'widths' => 
    array (
      'label' => '10',
      'field' => '30',
    ),
  ),
);
;
?>
