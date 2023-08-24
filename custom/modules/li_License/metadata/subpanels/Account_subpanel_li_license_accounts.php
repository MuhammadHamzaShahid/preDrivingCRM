<?php
// created: 2023-08-17 15:24:31
$subpanel_layout['list_fields'] = array (
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '45%',
    'default' => true,
  ),
  'theory' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_THEORY',
    'width' => '10%',
    'default' => true,
  ),
  'availability' => 
  array (
    'type' => 'enum',
    'vname' => 'LBL_AVAILABILITY',
    'width' => '10%',
    'default' => true,
  ),
  'k_select_centre_c' => 
  array (
    'type' => 'enum',
    'vname' => 'LBL_K_SELECT_CENTRE_C',
    'width' => '10%',
    'default' => true,
  ),
  'k_requested_centre_c' => 
  array (
    'type' => 'enum',
    'vname' => 'LBL_K_REQUESTED_CENTRE_C',
    'width' => '10%',
    'default' => true,
  ),
  'date_entered' => 
  array (
    'type' => 'datetime',
    'vname' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'default' => true,
  ),
  'date_modified' => 
  array (
    'vname' => 'LBL_DATE_MODIFIED',
    'width' => '45%',
    'default' => true,
  ),
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'li_License',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'li_License',
    'width' => '5%',
    'default' => true,
  ),
);