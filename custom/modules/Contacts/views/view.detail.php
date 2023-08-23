<?php

require_once('include/MVC/View/views/view.detail.php');

class ContactsViewDetail extends ViewDetail{

     //override the display() method and hide the View Change Log for Other Users

     function display(){

               parent::display();

               global $current_user;
                if(!$current_user->is_admin){
                echo "<script> 
                  $('#btn_view_change_log').hide();
                  
                  </script>";
                    

                }

     }

}