<?php
$module_name = 'k_Bookings';
$viewdefs [$module_name] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'EDIT',
          1 => 'DUPLICATE',
          2 => 'DELETE',
          3 => 'FIND_DUPLICATES',
        ),
      ),
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'useTabs' => false,
      'tabDefs' => 
      array (
        'LBL_EDITVIEW_PANEL1' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
    ),
    'panels' => 
    array (
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'k_test_detail',
            'label' => 'LBL_K_TEST_DETAIL',
          ),
          1 => 
          array (
            'name' => 'k_candidate_name',
            'label' => 'LBL_K_CANDIDATE_NAME',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'k_license_no',
            'label' => 'LBL_K_LICENSE_NO',
          ),
          1 => 
          array (
            'name' => 'k_test_center',
            'label' => 'LBL_K_TEST_CENTER',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'k_date_and_time',
            'label' => 'LBL_K_DATE_AND_TIME',
          ),
          1 => 
          array (
            'name' => 'k_driving_test_ref_no',
            'label' => 'LBL_K_DRIVING_TEST_REF_NO',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'k_last_date',
            'label' => 'LBL_K_LAST_DATE',
          ),
          1 => 
          array (
            'name' => 'k_buyer_name',
            'label' => 'LBL_K_BUYER_NAME',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'total',
            'label' => 'LBL_TOTAL',
          ),
        ),
      ),
      'default' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'status',
            'label' => 'LBL_STATUS',
          ),
          1 => 
          array (
            'name' => 'cancelled_by',
            'label' => 'LBL_CANCELLED_BY',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'refund',
            'label' => 'LBL_REFUND',
          ),
          1 => 
          array (
            'name' => 'cancelled_dvsa',
            'label' => 'LBL_CANCELLED_DVSA',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'contacts_name',
            'label' => 'LBL_CONTACTS_NAME',
          ),
          1 => 
          array (
            'name' => 'confirmation_reminder',
            'label' => 'LBL_CONFIRMATION_REMINDER',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'test_days',
            'label' => 'LBL_TEST_DAYS',
          ),
          1 => 
          array (
            'name' => 'test_fee',
            'label' => 'LBL_TEST_FEE',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'commission',
            'label' => 'LBL_COMMISSION',
          ),
          1 => 
          array (
            'name' => 'discount',
            'label' => 'LBL_DISCOUNT',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'vat',
            'label' => 'LBL_VAT',
          ),
          1 => 
          array (
            'name' => 'days_to_pay',
            'label' => 'LBL_DAYS_TO_PAY',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'reminder',
            'label' => 'LBL_REMINDER',
          ),
          1 => 
          array (
            'name' => 'li_license_name',
            'label' => 'LBL_LI_LICENSE_NAME',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'accounts_name',
            'label' => 'LBL_ACCOUNTS_NAME',
          ),
          1 => 'assigned_user_name',
        ),
        8 => 
        array (
          0 => 'description',
          1 => '',
        ),
      ),
    ),
  ),
);
;
?>
