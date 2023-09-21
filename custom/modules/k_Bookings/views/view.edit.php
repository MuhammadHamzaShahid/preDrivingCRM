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
            echo '
            <script>
            $(document).ready(function() {
                document.getElementById("k_swap_fee").readOnly = true;
            });
            </script>
            <script>
                var selectElement = document.getElementById("k_transaction_type");

                selectElement.addEventListener("change", function() {
                    var selectedValue = this.value;

                    var options = selectElement.options;
                    for (var i = 0; i < options.length; i++) {
                        var option = options[i];
                        if (selectedValue === "Unpaid" && (option.value === "Paid" || option.value === "Credit")) {
                            option.disabled = false;
                        } else if (selectedValue === "Paid" && (option.value === "Credit" || option.value === "Refund")) {
                            option.disabled = false;
                        } else if (selectedValue === "Credit" && option.value === "Refund") {
                            option.disabled = false;
                        } else {
                            option.disabled = true;
                        }
                    }
                });
            </script>
            ';
      
    }
}
