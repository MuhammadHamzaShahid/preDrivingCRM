<?php
$layout_defs["Contacts"]["subpanel_setup"]['k_bookings_contacts_link'] = array(
  'order' => 100,
  'module' => 'k_Bookings',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_K_BOOKINGS',
  'get_subpanel_data' => 'k_bookings_contacts_link',
  'top_buttons' =>
  array(
    0 =>
    array(
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 =>
    array(
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);
