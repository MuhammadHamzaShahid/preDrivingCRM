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
  'AVAILABILITY' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_AVAILABILITY',
    'width' => '10%',
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
  'CREATED_BY_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_CREATED',
    'id' => 'CREATED_BY',
    'width' => '10%',
    'default' => true,
  ),
  'DATE_MODIFIED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_MODIFIED',
    'width' => '10%',
    'default' => true,
  ),
);
;
?>
