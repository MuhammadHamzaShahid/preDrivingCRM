<?php
$module_name = 'k_transactions';
$viewdefs [$module_name] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
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
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'k_bookings_name',
            'label' => 'LBL_K_BOOKINGS_NAME',
          ),
          1 => 
          array (
            'name' => 'k_transaction_type',
            'label' => 'LBL_K_TRANSACTION_TYPE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'k_payment_method',
            'label' => 'LBL_K_PAYMENT_METHOD',
          ),
          1 => 
          array (
            'name' => 'k_transaction_refund_date',
            'label' => 'LBL_K_TRANSACTION_REFUND_DATE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'k_transaction_amount',
            'label' => 'LBL_K_TRANSACTION_AMOUNT',
          ),
          1 => 'description',
        ),
        3 => 
        array (
          0 => 'assigned_user_name',
          1 => '',
        ),
      ),
    ),
  ),
);
;
?>