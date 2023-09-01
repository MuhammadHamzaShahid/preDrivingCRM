<?php
$viewdefs ['Contacts'] = 
array (
  'QuickCreate' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'hidden' => 
        array (
          0 => '<input type="hidden" name="opportunity_id" value="{$smarty.request.opportunity_id}">',
          1 => '<input type="hidden" name="case_id" value="{$smarty.request.case_id}">',
          2 => '<input type="hidden" name="bug_id" value="{$smarty.request.bug_id}">',
          3 => '<input type="hidden" name="email_id" value="{$smarty.request.email_id}">',
          4 => '<input type="hidden" name="inbound_email_id" value="{$smarty.request.inbound_email_id}">',
          5 => '{if !empty($smarty.request.contact_id)}<input type="hidden" name="reports_to_id" value="{$smarty.request.contact_id}">{/if}',
          6 => '{if !empty($smarty.request.contact_name)}<input type="hidden" name="report_to_name" value="{$smarty.request.contact_name}">{/if}',
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
      'useTabs' => false,
      'tabDefs' => 
      array (
        'LBL_CONTACT_INFORMATION' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
    ),
    'panels' => 
    array (
      'lbl_contact_information' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'full_name',
            'studio' => 
            array (
              'listview' => false,
            ),
            'label' => 'LBL_NAME',
          ),
          1 => 
          array (
            'name' => 'phone_mobile',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'email1',
          ),
          1 => 
          array (
            'name' => 'buyer_type',
            'label' => 'LBL_BUYER_TYPE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'account_name',
          ),
          1 => 
          array (
            'name' => 'priority',
            'label' => 'LBL_PRIORITY',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'k_unpaid_amount',
            'label' => 'LBL_K_UNPAID_AMOUNT',
          ),
          1 => 
          array (
            'name' => 'k_paid_amount',
            'label' => 'LBL_K_PAID_AMOUNT',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'k_credit_amount',
            'label' => 'LBL_K_CREDIT_AMOUNT',
          ),
          1 => 
          array (
            'name' => 'k_refund_amount',
            'label' => 'LBL_K_REFUND_AMOUNT',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'amount',
            'label' => 'LBL_AMOUNT',
          ),
          1 => 
          array (
            'name' => 'payment_type',
            'label' => 'LBL_PAYMENT_TYPE',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'li_license_name',
            'label' => 'LBL_LI_LICENSE_NAME',
          ),
          1 => 
          array (
            'name' => 'description',
            'comment' => 'Full text of the note',
            'label' => 'LBL_DESCRIPTION',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'assigned_user_name',
          ),
          1 => 
          array (
            'name' => 'created_by_name',
            'label' => 'LBL_CREATED',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'k_total_payment',
            'label' => 'LBL_K_TOTAL_PAYMENT',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
;
?>
