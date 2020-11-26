<?php

include '../php_classes/db_communication.php';
include '../php_classes/vehicles.php';

$db = new DB('127.0.0.1', 'root', 'OMoh8obu9xJ1r25D', 'automobile_tuning');
$db->connect_to_db();

if($_GET['objectType'] === 'car') {
    $car_specs = array(
        'oem' => $_GET['oem'],
        'model' => $_GET['model'],
        'type' => $_GET['type'],
        'color' => $_GET['color'],
        'age' => $_GET['age'],
        'mileage' => $_GET['mileage'],
        'power' => $_GET['power'],
        'mass' => $_GET['mass'],
        'tire_type' => $_GET['tire_type']
    );
    $car = new Car($car_specs);
    $is_saved = $db->save($car);
    echo json_encode($is_saved);
} else if($_GET['objectType'] === 'bike') {
    $bike_specs = array(
        'oem' => $_GET['oem'],
        'model' => $_GET['model'],
        'type' => $_GET['type'],
        'color' => $_GET['color'],
        'age' => $_GET['age'],
        'mileage' => $_GET['mileage'],
        'power' => $_GET['power'],
        'mass' => $_GET['mass'],
        'tire_type' => $_GET['tire_type'],
        'braking_distance' => $_GET['braking_distance']
    );
    $bike = new Bike($bike_specs);
    $is_saved = $db->save($bike);
    echo json_encode($is_saved);
} else {
    echo json_encode('Not supported object type');
}

$db->disconnect_from_db();