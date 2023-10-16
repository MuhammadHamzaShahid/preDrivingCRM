<?php
//id
$dictionary['k_Bookings']['fields']['accounts_id'] = array(
    'name' => 'accounts_id',
    'rname' => 'id',
    'vname' => 'LBL_ACCOUNTS_ID',
    'type' => 'id',
    'table' => 'accounts',
    'isnull' => 'true',
    'module' => 'Accounts',
    'dbType' => 'id',
    'reportable' => true,
    'duplicate_merge' => 'disabled',
    'required' => true,
);
//name
$dictionary['k_Bookings']['fields']['accounts_name'] = array(
    'name' => 'accounts_name',
    'rname' => 'name',
    'id_name' => 'accounts_id',
    'vname' => 'LBL_ACCOUNTS_NAME',
    'type' => 'relate',
    'link' => 'k_bookings_accounts_link',
    'table' => 'accounts',
    'isnull' => 'true',
    'module' => 'Accounts',
    'source' => 'non-db',
    'required' => false,
    'audited' => true,
);
//link
$dictionary['k_Bookings']['fields']['k_bookings_accounts_link'] = array(
    'name' => 'k_bookings_accounts_link',
    'type' => 'link',
    'relationship' => 'k_bookings_accounts_rel',
    'module' => 'Accounts',
    'bean_name' => 'Account',
    'source' => 'non-db',
    'vname' => 'LBL_K_BOOKINGS_ACCOUNTS_REL',
);
//relationship
$dictionary['k_Bookings']['relationships']['k_bookings_accounts_rel'] = array(
    'lhs_module' => 'Accounts',
    'lhs_table' => 'accounts',
    'lhs_key' => 'id',
    'rhs_module' => 'k_Bookings',
    'rhs_table' => 'k_bookings',
    'rhs_key' => 'accounts_id',
    'relationship_type' => 'one-to-many'
);
