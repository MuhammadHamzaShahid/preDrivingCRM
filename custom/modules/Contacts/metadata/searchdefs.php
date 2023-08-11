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
