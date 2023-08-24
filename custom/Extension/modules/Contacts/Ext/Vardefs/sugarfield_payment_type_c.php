<?php
//Buyer Type Field
$dictionary['Contact']['fields']['payment_type'] = array(
    'name' => 'payment_type',
    'vname' => 'LBL_PAYMENT_TYPE',
    'placeholder'=>'Select',
    'type' => 'enum',
    'options' => 'payment_type_list',
    'default' => '',
    'massupdate' => false,
    'required' => false,
    'audited' => true,
);
