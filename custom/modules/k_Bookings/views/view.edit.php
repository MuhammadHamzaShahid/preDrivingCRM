<?php
if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}
class k_BookingsViewEdit extends ViewEdit
{
    public function display()
    {
        global $app_list_strings, $mod_strings, $db, $current_user;
            echo '
            <script>
            $(document).ready(function() {
                document.getElementById("k_swap_fee").readOnly = true;
            });
            </script>
            ';
        parent::display();
    }
}
