<?php
 // created: 2023-08-14 16:26:49
$layout_defs["Accounts"]["subpanel_setup"]['li_license_accounts'] = array (
  'order' => 100,
  'module' => 'li_License',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_LI_LICENSE_ACCOUNTS_FROM_LI_LICENSE_TITLE',
  'get_subpanel_data' => 'li_license_accounts',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);
