<?php
global $db, $current_user;
$customerArr = array();
$query='SELECT id,last_name AS name FROM contacts where deleted=0';
$results=$db->query($query);
while ($rows = $db->fetchByAssoc($results)) {
    array_push($customerArr, $rows);
}
echo json_encode($customerArr);
