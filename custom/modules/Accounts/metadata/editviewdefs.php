<?php
$viewdefs ['Accounts'] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'SAVE',
          1 => 'CANCEL',
        ),
      ),
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
      'includes' => 
      array (
        0 => 
        array (
          'file' => 'modules/Accounts/Account.js',
        ),
      ),
      'useTabs' => false,
      'tabDefs' => 
      array (
        'LBL_ACCOUNT_INFORMATION' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
      'syncDetailEditViews' => false,
    ),
    'panels' => 
    array (
      'lbl_account_information' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'name',
            'label' => 'LBL_NAME',
            'displayParams' => 
            array (
              'required' => true,
            ),
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'k_gateway_id_c',
            'label' => 'LBL_K_GATEWAY_ID_C',
          ),
          1 => 
          array (
            'name' => 'k_password_c',
            'label' => 'LBL_K_PASSWORD_C',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'email1',
            'studio' => 'false',
            'label' => 'LBL_EMAIL',
          ),
          1 => 
          array (
            'name' => 'phone_office',
            'label' => 'LBL_PHONE_OFFICE',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'k_license_c',
            'label' => 'LBL_K_LICENSE_C',
          ),
          1 => '',
        ),
        4 => 
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
