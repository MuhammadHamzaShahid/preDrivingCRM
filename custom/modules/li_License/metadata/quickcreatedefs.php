<?php
$module_name = 'li_License';
$viewdefs [$module_name] = 
array (
  'QuickCreate' => 
  array (
    'templateMeta' => 
    array (
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'useTabs' => false,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 'name',
          1 => 
          array (
            'name' => 'availability',
            'label' => 'LBL_AVAILABILITY',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'theory',
            'label' => 'LBL_THEORY',
          ),
          1 => 
          array (
            'name' => 'li_license_accounts_name',
            'label' => 'LBL_LI_LICENSE_ACCOUNTS_FROM_ACCOUNTS_TITLE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'k_select_centre_c',
            'label' => 'LBL_K_SELECT_CENTRE_C',
          ),
          1 => 
          array (
            'name' => 'k_requested_centre_c',
            'label' => 'LBL_K_REQUESTED_CENTRE_C',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'comment' => 'Full text of the note',
            'label' => 'LBL_DESCRIPTION',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
;
?>
