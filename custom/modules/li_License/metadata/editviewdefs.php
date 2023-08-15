<?php
$module_name = 'li_License';
$viewdefs [$module_name] = 
array (
  'EditView' => 
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
      'syncDetailEditViews' => false,
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
          0 => 'description',
          1 => 
          array (
            'name' => 'li_license_accounts_name',
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
      ),
    ),
  ),
);
;
?>
