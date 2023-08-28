<?php
//id
$dictionary['k_transactions']['fields']['k_bookings_id'] = array(
    'name' => 'k_bookings_id',
    'rname' => 'id',
    'vname' => 'LBL_K_BOOKINGS_ID',
    'type' => 'id',
    'table' => 'k_bookings',
    'isnull' => 'true',
    'module' => 'k_Bookings',
    'dbType' => 'id',
    'reportable' => true,
    'duplicate_merge' => 'disabled',
    'required' => false,
);
//name
$dictionary['k_transactions']['fields']['k_bookings_name'] = array(
    'name' => 'k_bookings_name',
    'rname' => 'name',
    'id_name' => 'k_bookings_id',
    'vname' => 'LBL_K_BOOKINGS_NAME',
    'type' => 'relate',
    'link' => 'k_transactions_k_bookings_link',
    'table' => 'k_bookings',
    'isnull' => 'true',
    'module' => 'k_Bookings',
    'source' => 'non-db',
    'required' => true,
    'audited' => true,
);
//link
$dictionary['k_transactions']['fields']['k_transactions_k_bookings_link'] = array(
    'name' => 'k_transactions_k_bookings_link',
    'type' => 'link',
    'relationship' => 'k_transactions_k_bookings_rel',
    'module' => 'k_Bookings',
    'bean_name' => 'k_Bookings',
    'source' => 'non-db',
    'vname' => 'LBL_K_TRANSACTIONS_K_BOOKINGS_REL',
);
//relationship
$dictionary['k_transactions']['relationships']['k_transactions_k_bookings_rel'] = array(
    'lhs_module' => 'k_Bookings',
    'lhs_table' => 'k_bookings',
    'lhs_key' => 'id',
    'rhs_module' => 'k_transactions',
    'rhs_table' => 'k_transactions',
    'rhs_key' => 'k_bookings_id',
    'relationship_type' => 'one-to-many'
);
