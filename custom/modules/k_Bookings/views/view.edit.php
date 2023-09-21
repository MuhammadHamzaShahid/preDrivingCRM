<?php
if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}
class k_BookingsViewEdit extends ViewEdit
{
    public function display()
    {
        global $app_list_strings, $mod_strings, $db, $current_user;
        parent::display();
        echo "
        <script>
        $(document).ready(function() {
            document.getElementById(\"k_swap_fee\").readOnly = true;
        });
        </script>
        ";
        if($this->bean->k_transaction_type=='Unpaid'){
            echo "
            <script>
                $(\"#k_transaction_type option[value='Credit']\"). attr(\"disabled\",\"disabled\");
                $(\"#k_transaction_type option[value='Refund']\"). attr(\"disabled\",\"disabled\");
            </script>
            ";
        }
        elseif($this->bean->k_transaction_type=='Paid'){
            echo "
            <script>
                $(\"#k_transaction_type option[value='Unpaid']\"). attr(\"disabled\",\"disabled\");
                $(\"#k_transaction_type option[value='Refund']\"). attr(\"disabled\",\"disabled\");
            </script>
            ";
        }     
        elseif($this->bean->k_transaction_type=='Credit'){
            echo "
            <script>
                $(\"#k_transaction_type option[value='Unpaid']\"). attr(\"disabled\",\"disabled\");
                $(\"#k_transaction_type option[value='Paid']\"). attr(\"disabled\",\"disabled\");
            </script>
            ";
        }    
        elseif($this->bean->k_transaction_type=='Refund'){
            echo "
            <script>
                $(\"#k_transaction_type option[value='Unpaid']\"). attr(\"disabled\",\"disabled\");
                $(\"#k_transaction_type option[value='Paid']\"). attr(\"disabled\",\"disabled\");
                $(\"#k_transaction_type option[value='Credit']\"). attr(\"disabled\",\"disabled\");
            </script>
            ";
        }   
    }
}
