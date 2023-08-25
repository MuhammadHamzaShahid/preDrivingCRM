<?php
$module_name = 'li_License';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'theory' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_THEORY',
        'width' => '10%',
        'default' => true,
        'name' => 'theory',
      ),
    ),
    'advanced_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'theory' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_THEORY',
        'width' => '10%',
        'default' => true,
        'name' => 'theory',
      ),
      'li_license_accounts_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'label' => 'LBL_LI_LICENSE_ACCOUNTS_FROM_ACCOUNTS_TITLE',
        'id' => 'LI_LICENSE_ACCOUNTSACCOUNTS_IDA',
        'width' => '10%',
        'default' => true,
        'name' => 'li_license_accounts_name',
      ),
      'availability' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_AVAILABILITY',
        'width' => '10%',
        'default' => true,
        'name' => 'availability',
      ),
      'k_select_centre_c' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_K_SELECT_CENTRE_C',
        'width' => '10%',
        'default' => true,
        'name' => 'k_select_centre_c',
      ),
      'k_requested_centre_c' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_K_REQUESTED_CENTRE_C',
        'width' => '10%',
        'default' => true,
        'name' => 'k_requested_centre_c',
      ),
      'date_entered' => 
      array (
        'type' => 'datetime',
        'label' => 'LBL_DATE_ENTERED',
        'width' => '10%',
        'default' => true,
        'name' => 'date_entered',
      ),
      'date_modified' => 
      array (
        'type' => 'datetime',
        'label' => 'LBL_DATE_MODIFIED',
        'width' => '10%',
        'default' => true,
        'name' => 'date_modified',
      ),
      'created_by' => 
      array (
        'type' => 'assigned_user_name',
        'label' => 'LBL_CREATED',
        'width' => '10%',
        'default' => true,
        'name' => 'created_by',
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
        'default' => true,
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
