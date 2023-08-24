<?php
// created: 2023-08-14 16:26:49
$dictionary["li_license_accounts"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'li_license_accounts' => 
    array (
      'lhs_module' => 'Accounts',
      'lhs_table' => 'accounts',
      'lhs_key' => 'id',
      'rhs_module' => 'li_License',
      'rhs_table' => 'li_license',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'li_license_accounts_c',
      'join_key_lhs' => 'li_license_accountsaccounts_ida',
      'join_key_rhs' => 'li_license_accountsli_license_idb',
    ),
  ),
  'table' => 'li_license_accounts_c',
  'fields' => 
  array (
    0 => 
    array (
      'name' => 'id',
      'type' => 'varchar',
      'len' => 36,
    ),
    1 => 
    array (
      'name' => 'date_modified',
      'type' => 'datetime',
    ),
    2 => 
    array (
      'name' => 'deleted',
      'type' => 'bool',
      'len' => '1',
      'default' => '0',
      'required' => true,
    ),
    3 => 
    array (
      'name' => 'li_license_accountsaccounts_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'li_license_accountsli_license_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'li_license_accountsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'li_license_accounts_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'li_license_accountsaccounts_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'li_license_accounts_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'li_license_accountsli_license_idb',
      ),
    ),
  ),
);