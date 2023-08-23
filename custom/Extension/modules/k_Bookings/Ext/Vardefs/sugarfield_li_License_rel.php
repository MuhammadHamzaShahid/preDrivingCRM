<?php
//id
$dictionary['k_Bookings']['fields']['li_license_id'] = array(
    'name' => 'li_license_id',
    'rname' => 'id',
    'vname' => 'LBL_LI_LICENSE_ID',
    'type' => 'id',
    'table' => 'li_license',
    'isnull' => 'true',
    'module' => 'li_License',
    'dbType' => 'id',
    'reportable' => true,
    'duplicate_merge' => 'disabled',
    'required' => false,
);
//name
$dictionary['k_Bookings']['fields']['li_license_name'] = array(
    'name' => 'li_license_name',
    'rname' => 'name',
    'id_name' => 'li_license_id',
    'vname' => 'LBL_LI_LICENSE_NAME',
    'type' => 'relate',
    'link' => 'k_bookings_li_license_link',
    'table' => 'li_license',
    'isnull' => 'true',
    'module' => 'li_License',
    'source' => 'non-db',
    'required' => false,
    'audited' => true,
);
//link
$dictionary['k_Bookings']['fields']['k_bookings_li_license_link'] = array(
    'name' => 'k_bookings_li_license_link',
    'type' => 'link',
    'relationship' => 'k_bookings_li_license_rel',
    'module' => 'li_License',
    'bean_name' => 'li_License',
    'source' => 'non-db',
    'vname' => 'LBL_K_BOOKINGS_LI_LICENSE_REL',
);
//relationship
$dictionary['k_Bookings']['relationships']['k_bookings_li_license_rel'] = array(
    'lhs_module' => 'li_License',
    'lhs_table' => 'li_license',
    'lhs_key' => 'id',
    'rhs_module' => 'k_Bookings',
    'rhs_table' => 'k_bookings',
    'rhs_key' => 'li_license_id',
    'relationship_type' => 'one-to-many'
);
