<?php
$searchdefs ['Contacts'] = 
array (
  'layout' => 
  array (
    'basic_search' => 
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
      'phone_mobile' => 
      array (
        'type' => 'phone',
        'label' => 'LBL_MOBILE_PHONE',
        'width' => '10%',
        'default' => true,
        'name' => 'phone_mobile',
      ),
      'email' => 
      array (
        'name' => 'email',
        'label' => 'LBL_ANY_EMAIL',
        'type' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'buyer_type' => 
      array (
        'type' => 'enum',
        'default' => true,
        'label' => 'LBL_BUYER_TYPE',
        'width' => '10%',
        'name' => 'buyer_type',
      ),
      'priority' => 
      array (
        'type' => 'enum',
        'default' => true,
        'label' => 'LBL_PRIORITY',
        'width' => '10%',
        'name' => 'priority',
      ),
      'account_name' => 
      array (
        'name' => 'account_name',
        'default' => true,
        'width' => '10%',
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
      'k_unpaid_amount' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_K_UNPAID_AMOUNT',
        'width' => '10%',
        'default' => true,
        'name' => 'k_unpaid_amount',
      ),
      'k_paid_amount' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_K_PAID_AMOUNT',
        'width' => '10%',
        'default' => true,
        'name' => 'k_paid_amount',
      ),
      'k_credit_amount' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_K_CREDIT_AMOUNT',
        'width' => '10%',
        'default' => true,
        'name' => 'k_credit_amount',
      ),
      'k_refund_amount' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_K_REFUND_AMOUNT',
        'width' => '10%',
        'default' => true,
        'name' => 'k_refund_amount',
      ),
      'amount' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_AMOUNT',
        'width' => '10%',
        'default' => true,
        'name' => 'amount',
      ),
      'payment_type' => 
      array (
        'type' => 'enum',
        'default' => true,
        'label' => 'LBL_PAYMENT_TYPE',
        'width' => '10%',
        'name' => 'payment_type',
      ),
      'assigned_user_id' => 
      array (
        'name' => 'assigned_user_id',
        'type' => 'enum',
        'label' => 'LBL_ASSIGNED_TO',
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
