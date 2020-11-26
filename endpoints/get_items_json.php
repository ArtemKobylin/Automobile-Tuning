<?php
include '../php_classes/db_communication.php';

/*what does the code below stand for?*/
//$json = file_get_contents('php://input');
//$data = json_decode($json);

$db = new DB('127.0.0.1', 'root', 'OMoh8obu9xJ1r25D', 'automobile_tuning');
$db->connect_to_db();

$result = $db->get_items_list($_GET['tableTitle']);

if(is_array($result)) {
    echo json_encode($result);
} else {
    echo json_encode(array('error' => $result));
}

$db->disconnect_from_db();

