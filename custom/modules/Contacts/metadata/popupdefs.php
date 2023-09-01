<?php
$popupMeta = array (
    'moduleMain' => 'Contact',
    'varName' => 'CONTACT',
    'orderBy' => 'contacts.first_name, contacts.last_name',
    'whereClauses' => array (
  'phone_mobile' => 'contacts.phone_mobile',
  'email' => 'contacts.email',
  'assigned_user_id' => 'contacts.assigned_user_id',
  'buyer_type' => 'contacts.buyer_type',
  'priority' => 'contacts.priority',
  'amount' => 'contacts.amount',
  'payment_type' => 'contacts.payment_type',
  'account_name' => 'contacts.account_name',
  'name' => 'contacts.name',
  'date_entered' => 'contacts.date_entered',
  'date_modified' => 'contacts.date_modified',
  'created_by_name' => 'contacts.created_by_name',
  'assigned_user_name' => 'contacts.assigned_user_name',
  'li_license_name' => 'contacts.li_license_name',
  'k_unpaid_amount' => 'contacts.k_unpaid_amount',
  'k_paid_amount' => 'contacts.k_paid_amount',
  'k_credit_amount' => 'contacts.k_credit_amount',
  'k_refund_amount' => 'contacts.k_refund_amount',
),
    'searchInputs' => array (
  3 => 'email',
  4 => 'phone_mobile',
  5 => 'assigned_user_id',
  7 => 'buyer_type',
  8 => 'priority',
  9 => 'amount',
  10 => 'payment_type',
  11 => 'account_name',
  12 => 'name',
  13 => 'date_entered',
  14 => 'date_modified',
  15 => 'created_by_name',
  16 => 'assigned_user_name',
  17 => 'li_license_name',
  18 => 'k_unpaid_amount',
  19 => 'k_paid_amount',
  20 => 'k_credit_amount',
  21 => 'k_refund_amount',
),
    'create' => array (
  'formBase' => 'ContactFormBase.php',
  'formBaseClass' => 'ContactFormBase',
  'getFormBodyParams' => 
  array (
    0 => '',
    1 => '',
    2 => 'ContactSave',
  ),
  'createButton' => 'LNK_NEW_CONTACT',
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
  'phone_mobile' => 
  array (
    'type' => 'phone',
    'label' => 'LBL_MOBILE_PHONE',
    'width' => '10%',
    'name' => 'phone_mobile',
  ),
  'email' => 
  array (
    'name' => 'email',
    'width' => '10%',
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
    'width' => '10%',
  ),
  'account_name' => 
  array (
    'name' => 'account_name',
    'type' => 'varchar',
    'width' => '10%',
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
  'buyer_type' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_BUYER_TYPE',
    'width' => '10%',
    'name' => 'buyer_type',
  ),
  'priority' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_PRIORITY',
    'width' => '10%',
    'name' => 'priority',
  ),
  'k_unpaid_amount' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_K_UNPAID_AMOUNT',
    'width' => '10%',
    'name' => 'k_unpaid_amount',
  ),
  'k_paid_amount' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_K_PAID_AMOUNT',
    'width' => '10%',
    'name' => 'k_paid_amount',
  ),
  'k_credit_amount' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_K_CREDIT_AMOUNT',
    'width' => '10%',
    'name' => 'k_credit_amount',
  ),
  'k_refund_amount' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_K_REFUND_AMOUNT',
    'width' => '10%',
    'name' => 'k_refund_amount',
  ),
  'amount' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_AMOUNT',
    'width' => '10%',
    'name' => 'amount',
  ),
  'payment_type' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_PAYMENT_TYPE',
    'width' => '10%',
    'name' => 'payment_type',
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
    'width' => '20%',
    'label' => 'LBL_LIST_NAME',
    'link' => true,
    'default' => true,
    'related_fields' => 
    array (
      0 => 'first_name',
      1 => 'last_name',
      2 => 'salutation',
      3 => 'account_name',
      4 => 'account_id',
    ),
    'name' => 'name',
  ),
  'PHONE_MOBILE' => 
  array (
    'type' => 'phone',
    'label' => 'LBL_MOBILE_PHONE',
    'width' => '10%',
    'default' => true,
    'name' => 'phone_mobile',
  ),
  'EMAIL1' => 
  array (
    'type' => 'varchar',
    'studio' => 
    array (
      'editview' => true,
      'editField' => true,
      'searchview' => false,
      'popupsearch' => false,
    ),
    'label' => 'LBL_EMAIL_ADDRESS',
    'width' => '10%',
    'default' => true,
    'name' => 'email1',
  ),
  'ACCOUNT_NAME' => 
  array (
    'width' => '25%',
    'label' => 'LBL_LIST_ACCOUNT_NAME',
    'module' => 'Accounts',
    'id' => 'ACCOUNT_ID',
    'default' => true,
    'sortable' => true,
    'ACLTag' => 'ACCOUNT',
    'related_fields' => 
    array (
      0 => 'account_id',
    ),
    'name' => 'account_name',
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
  'BUYER_TYPE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'label' => 'LBL_BUYER_TYPE',
    'width' => '10%',
    'name' => 'buyer_type',
  ),
  'PRIORITY' => 
  array (
    'type' => 'enum',
    'default' => true,
    'label' => 'LBL_PRIORITY',
    'width' => '10%',
    'name' => 'priority',
  ),
  'K_UNPAID_AMOUNT' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_K_UNPAID_AMOUNT',
    'width' => '10%',
    'default' => true,
  ),
  'K_PAID_AMOUNT' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_K_PAID_AMOUNT',
    'width' => '10%',
    'default' => true,
  ),
  'K_CREDIT_AMOUNT' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_K_CREDIT_AMOUNT',
    'width' => '10%',
    'default' => true,
  ),
  'K_REFUND_AMOUNT' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_K_REFUND_AMOUNT',
    'width' => '10%',
    'default' => true,
  ),
  'AMOUNT' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_AMOUNT',
    'width' => '10%',
    'default' => true,
    'name' => 'amount',
  ),
  'PAYMENT_TYPE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'label' => 'LBL_PAYMENT_TYPE',
    'width' => '10%',
    'name' => 'payment_type',
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'link' => true,
    'type' => 'relate',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'id' => 'ASSIGNED_USER_ID',
    'width' => '10%',
    'default' => true,
    'name' => 'assigned_user_name',
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
),
);
