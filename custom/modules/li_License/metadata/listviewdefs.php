<?php
$module_name = 'li_License';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
  'K_SELECT_CENTRE_C' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_K_SELECT_CENTRE_C',
    'width' => '10%',
    'default' => true,
  ),
  'K_REQUESTED_CENTRE_C' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_K_REQUESTED_CENTRE_C',
    'width' => '10%',
    'default' => true,
  ),
);
;
?>
