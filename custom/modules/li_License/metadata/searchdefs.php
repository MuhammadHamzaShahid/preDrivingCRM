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
    ),
    'advanced_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'availability' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_AVAILABILITY',
        'width' => '10%',
        'default' => true,
        'name' => 'availability',
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
