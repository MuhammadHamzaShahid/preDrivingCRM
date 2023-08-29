<?php
$layout_defs["k_Bookings"]["subpanel_setup"]['k_transactions_k_bookings_link'] = array(
  'order' => 100,
  'module' => 'k_transactions',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_K_TRANSACTIONS',
  'get_subpanel_data' => 'k_transactions_k_bookings_link',
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
