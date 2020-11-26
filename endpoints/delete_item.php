<?php

include '../php_classes/db_communication.php';
include '../php_classes/vehicles.php';

$db = new DB('127.0.0.1', 'root', 'OMoh8obu9xJ1r25D', 'automobile_tuning');
$db->connect_to_db();
$is_deleted = $db->delete($_GET['tableTitle'], $_GET['registrationNum']);
echo json_encode($is_deleted);

$db->disconnect_from_db();