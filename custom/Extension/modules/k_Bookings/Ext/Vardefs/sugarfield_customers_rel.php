<?php
//id
$dictionary['k_Bookings']['fields']['contacts_id'] = array(
    'name' => 'contacts_id',
    'rname' => 'id',
    'vname' => 'LBL_CONTACTS_ID',
    'type' => 'id',
    'table' => 'contacts',
    'isnull' => 'true',
    'module' => 'Contacts',
    'dbType' => 'id',
    'reportable' => true,
    'audited' => true,
    'duplicate_merge' => 'disabled',
    'required' => false,
);
//name
$dictionary['k_Bookings']['fields']['contacts_name'] = array(
    'name' => 'contacts_name',
    'rname' => 'name',
    'id_name' => 'contacts_id',
    'vname' => 'LBL_CONTACTS_NAME',
    'type' => 'relate',
    'link' => 'k_bookings_contacts_link',
    'table' => 'contacts',
    'isnull' => 'true',
    'module' => 'Contacts',
    'source' => 'non-db',
    'required' => false,
);
//link
$dictionary['k_Bookings']['fields']['k_bookings_contacts_link'] = array(
    'name' => 'k_bookings_contacts_link',
    'type' => 'link',
    'relationship' => 'k_bookings_contacts_rel',
    'module' => 'Contacts',
    'bean_name' => 'Contact',
    'source' => 'non-db',
    'vname' => 'LBL_K_BOOKINGS_CONTACTS_REL',
);
//relationship
$dictionary['k_Bookings']['relationships']['k_bookings_contacts_rel'] = array(
    'lhs_module' => 'Contacts',
    'lhs_table' => 'contact',
    'lhs_key' => 'id',
    'rhs_module' => 'k_Bookings',
    'rhs_table' => 'k_bookings',
    'rhs_key' => 'contacts_id',
    'relationship_type' => 'one-to-many'
);
