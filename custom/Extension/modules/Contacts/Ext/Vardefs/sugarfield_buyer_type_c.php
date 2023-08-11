<?php
//Buyer Type Field
$dictionary['Contact']['fields']['buyer_type'] = array(
    'name' => 'buyer_type',
    'vname' => 'LBL_BUYER_TYPE',
    'placeholder'=>'Account Name',
    'type' => 'enum',
    'options' => 'buyer_type_list',
    'default' => '',
    'massupdate' => false,
    'required' => false,
);
