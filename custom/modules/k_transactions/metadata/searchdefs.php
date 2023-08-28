<?php
$module_name = 'k_transactions';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'k_bookings_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'label' => 'LBL_K_BOOKINGS_NAME',
        'id' => 'K_BOOKINGS_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'k_bookings_name',
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
    ),
    'advanced_search' => 
    array (
      'k_bookings_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'label' => 'LBL_K_BOOKINGS_NAME',
        'width' => '10%',
        'default' => true,
        'id' => 'K_BOOKINGS_ID',
        'name' => 'k_bookings_name',
      ),
      'contacts_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'label' => 'LBL_CONTACTS_NAME',
        'width' => '10%',
        'default' => true,
        'id' => 'CONTACTS_ID',
        'name' => 'contacts_name',
      ),
      'k_transaction_type' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_K_TRANSACTION_TYPE',
        'width' => '10%',
        'default' => true,
        'name' => 'k_transaction_type',
      ),
      'k_transaction_refund_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_K_TRANSACTION_REFUND_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'k_transaction_refund_date',
      ),
      'k_payment_method' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_K_PAYMENT_METHOD',
        'width' => '10%',
        'default' => true,
        'name' => 'k_payment_method',
      ),
      'k_transaction_amount' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_K_TRANSACTION_AMOUNT',
        'width' => '10%',
        'default' => true,
        'name' => 'k_transaction_amount',
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
