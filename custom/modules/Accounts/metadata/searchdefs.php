<?php
$searchdefs ['Accounts'] = 
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
      'current_user_only' => 
      array (
        'name' => 'current_user_only',
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
        'default' => true,
        'width' => '10%',
      ),
      'favorites_only' => 
      array (
        'name' => 'favorites_only',
        'label' => 'LBL_FAVORITES_FILTER',
        'type' => 'bool',
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
      'k_gateway_id_c' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_K_GATEWAY_ID_C',
        'width' => '10%',
        'default' => true,
        'name' => 'k_gateway_id_c',
      ),
      'k_password_c' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_K_PASSWORD_C',
        'width' => '10%',
        'default' => true,
        'name' => 'k_password_c',
      ),
      'phone' => 
      array (
        'name' => 'phone',
        'label' => 'LBL_ANY_PHONE',
        'type' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'email' => 
      array (
        'name' => 'email',
        'label' => 'LBL_ANY_EMAIL',
        'type' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'k_license_c' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_K_LICENSE_C',
        'width' => '10%',
        'default' => true,
        'name' => 'k_license_c',
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
        'type' => 'varchar',
        'label' => 'LBL_K_REQUESTED_CENTRE_C',
        'width' => '10%',
        'default' => true,
        'name' => 'k_requested_centre_c',
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
