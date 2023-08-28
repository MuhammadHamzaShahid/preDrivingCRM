    <?php
//id
$dictionary['k_transactions']['fields']['contacts_id'] = array(
    'name' => 'contacts_id',
    'rname' => 'id',
    'vname' => 'LBL_CONTACTS_ID',
    'type' => 'id',
    'table' => 'contacts',
    'isnull' => 'true',
    'module' => 'Contacts',
    'dbType' => 'id',
    'reportable' => true,
    'duplicate_merge' => 'disabled',
    'required' => false,
);
//name
$dictionary['k_transactions']['fields']['contacts_name'] = array(
    'name' => 'contacts_name',
    'rname' => 'name',
    'id_name' => 'contacts_id',
    'vname' => 'LBL_CONTACTS_NAME',
    'type' => 'relate',
    'link' => 'k_transactions_contacts_link',
    'table' => 'contacts',
    'isnull' => 'true',
    'module' => 'Contacts',
    'source' => 'non-db',
    'required' => false,
    'audited'=>true,
);
//link
$dictionary['k_transactions']['fields']['k_transactions_contacts_link'] = array(
    'name' => 'k_transactions_contacts_link',
    'type' => 'link',
    'relationship' => 'k_transactions_contacts_rel',
    'module' => 'Contacts',
    'bean_name' => 'Contact',
    'source' => 'non-db',
    'vname' => 'LBL_K_TRANSACTIONS_CONTACTS_REL',
);
//relationship
$dictionary['k_transactions']['relationships']['k_transactions_contacts_rel'] = array(
    'lhs_module' => 'Contacts',
    'lhs_table' => 'contacts',
    'lhs_key' => 'id',
    'rhs_module' => 'k_transactions',
    'rhs_table' => 'k_transactions',
    'rhs_key' => 'contacts_id',
    'relationship_type' => 'one-to-many'
);
