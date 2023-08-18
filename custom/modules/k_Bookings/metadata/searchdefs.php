<?php
$module_name = 'k_Bookings';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'k_candidate_name' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_K_CANDIDATE_NAME',
        'width' => '10%',
        'default' => true,
        'name' => 'k_candidate_name',
      ),
      'k_license_no' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_K_LICENSE_NO',
        'width' => '10%',
        'default' => true,
        'name' => 'k_license_no',
      ),
    ),
    'advanced_search' => 
    array (
      'k_candidate_name' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_K_CANDIDATE_NAME',
        'width' => '10%',
        'default' => true,
        'name' => 'k_candidate_name',
      ),
      'k_license_no' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_K_LICENSE_NO',
        'width' => '10%',
        'default' => true,
        'name' => 'k_license_no',
      ),
      'k_driving_test_ref_no' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_K_DRIVING_TEST_REF_NO',
        'width' => '10%',
        'default' => true,
        'name' => 'k_driving_test_ref_no',
      ),
      'k_buyer_name' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_K_BUYER_NAME',
        'width' => '10%',
        'default' => true,
        'name' => 'k_buyer_name',
      ),
      'contacts_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'label' => 'LBL_CONTACTS_NAME',
        'id' => 'CONTACTS_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'contacts_name',
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
