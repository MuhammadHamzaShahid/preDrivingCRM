<?php
//id
$dictionary['Contact']['fields']['li_license_id'] = array(
    'name' => 'li_license_id',
    'rname' => 'id',
    'vname' => 'LBL_LI_LICENSE_ID',
    'type' => 'id',
    'table' => 'li_license',
    'isnull' => 'true',
    'module' => 'li_License',
    'dbType' => 'id',
    'reportable' => true,
    'audited' => true,
    'duplicate_merge' => 'disabled',
    'required' => false,
);
//name
$dictionary['Contact']['fields']['li_license_name'] = array(
    'name' => 'li_license_name',
    'rname' => 'name',
    'id_name' => 'li_license_id',
    'vname' => 'LBL_LI_LICENSE_NAME',
    'type' => 'relate',
    'link' => 'contacts_li_license_link',
    'table' => 'li_license',
    'isnull' => 'true',
    'module' => 'li_License',
    'source' => 'non-db',
    'required' => false,
);
//link
$dictionary['Contact']['fields']['contacts_li_license_link'] = array(
    'name' => 'contacts_li_license_link',
    'type' => 'link',
    'relationship' => 'contacts_li_license_rel',
    'module' => 'li_License',
    'bean_name' => 'li_License',
    'source' => 'non-db',
    'vname' => 'LBL_CONTACTS_LI_LICENSE_REL',
);
//relationship
$dictionary['Contact']['relationships']['contacts_li_license_rel'] = array(
    'lhs_module' => 'li_License',
    'lhs_table' => 'li_license',
    'lhs_key' => 'id',
    'rhs_module' => 'Contacts',
    'rhs_table' => 'contacts',
    'rhs_key' => 'li_license_id',
    'relationship_type' => 'one-to-many'
);
