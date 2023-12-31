<?php
$popupMeta = array (
    'moduleMain' => 'k_transactions',
    'varName' => 'k_transactions',
    'orderBy' => 'k_transactions.name',
    'whereClauses' => array (
  'k_bookings_name' => 'k_transactions.k_bookings_name',
  'contacts_name' => 'k_transactions.contacts_name',
  'k_transaction_amount' => 'k_transactions.k_transaction_amount',
  'assigned_user_name' => 'k_transactions.assigned_user_name',
  'date_entered' => 'k_transactions.date_entered',
  'date_modified' => 'k_transactions.date_modified',
  'created_by_name' => 'k_transactions.created_by_name',
  'assigned_user_id' => 'k_transactions.assigned_user_id',
  'name' => 'k_transactions.name',
),
    'searchInputs' => array (
  4 => 'k_bookings_name',
  5 => 'contacts_name',
  9 => 'k_transaction_amount',
  10 => 'assigned_user_name',
  11 => 'date_entered',
  12 => 'date_modified',
  13 => 'created_by_name',
  14 => 'assigned_user_id',
  15 => 'name',
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
  'k_bookings_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_K_BOOKINGS_NAME',
    'id' => 'K_BOOKINGS_ID',
    'width' => '10%',
    'name' => 'k_bookings_name',
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
  'k_transaction_amount' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_K_TRANSACTION_AMOUNT',
    'width' => '10%',
    'name' => 'k_transaction_amount',
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
  'assigned_user_name' => 
  array (
    'link' => true,
    'type' => 'relate',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'id' => 'ASSIGNED_USER_ID',
    'width' => '10%',
    'name' => 'assigned_user_name',
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
    'width' => '10%',
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
  'K_BOOKINGS_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_K_BOOKINGS_NAME',
    'id' => 'K_BOOKINGS_ID',
    'width' => '10%',
    'default' => true,
    'name' => 'k_bookings_name',
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
  'K_TRANSACTION_AMOUNT' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_K_TRANSACTION_AMOUNT',
    'width' => '10%',
    'default' => true,
    'name' => 'k_transaction_amount',
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
