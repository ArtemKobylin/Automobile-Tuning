<?php
include '../php_classes/db_communication.php';
include '../php_classes/vehicles.php';
include '../php_classes/workshops.php';

$db = new DB('127.0.0.1', 'root', 'OMoh8obu9xJ1r25D', 'automobile_tuning');
$db->connect_to_db();

$specs = $db->get($_GET['tableTitle'], $_GET['registrationNum']);
$item = '';
if($_GET['tableTitle'] === 'cars') {
    $item = new Car($specs);
} else if($_GET['tableTitle'] === 'bikes') {
    $item = new Bike($specs);
} else if($_GET['tableTitle'] === 'car_workshops') { //test
    $item = new CarWorkshop($specs);
} else if($_GET['tableTitle'] === 'bike_workshops') {
    $item = new BikeWorkshop($specs);
}

echo json_encode($item->get_specs());

$db->disconnect_from_db();

