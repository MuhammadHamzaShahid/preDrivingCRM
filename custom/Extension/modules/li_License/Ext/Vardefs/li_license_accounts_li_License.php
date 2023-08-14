<?php
// created: 2023-08-14 16:26:49
$dictionary["li_License"]["fields"]["li_license_accounts"] = array (
  'name' => 'li_license_accounts',
  'type' => 'link',
  'relationship' => 'li_license_accounts',
  'source' => 'non-db',
  'module' => 'Accounts',
  'bean_name' => 'Account',
  'vname' => 'LBL_LI_LICENSE_ACCOUNTS_FROM_ACCOUNTS_TITLE',
  'id_name' => 'li_license_accountsaccounts_ida',
);
$dictionary["li_License"]["fields"]["li_license_accounts_name"] = array (
  'name' => 'li_license_accounts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LI_LICENSE_ACCOUNTS_FROM_ACCOUNTS_TITLE',
  'save' => true,
  'id_name' => 'li_license_accountsaccounts_ida',
  'link' => 'li_license_accounts',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'name',
);
$dictionary["li_License"]["fields"]["li_license_accountsaccounts_ida"] = array (
  'name' => 'li_license_accountsaccounts_ida',
  'type' => 'link',
  'relationship' => 'li_license_accounts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_LI_LICENSE_ACCOUNTS_FROM_LI_LICENSE_TITLE',
);
