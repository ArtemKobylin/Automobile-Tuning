<?php
include '../php_classes/db_communication.php';
include '../php_classes/vehicles.php';
include '../php_classes/workshops.php';

$db = new DB('127.0.0.1', 'root', 'OMoh8obu9xJ1r25D', 'automobile_tuning');
$db->connect_to_db();

//fetch data from DB
$workshop_specs = $db->get($_GET['tableTitle1'], $_GET['workshopId']);
if($workshop_specs['error']) {
    echo json_encode($workshop_specs['error']);
    exit();
}

$vehicle_specs = $db->get($_GET['tableTitle2'], $_GET['registrationNum']);
if($vehicle_specs['error']) {
    echo json_encode($vehicle_specs['error']);
    exit();
}

//define Vehicle and Workshops objects
if($_GET['tableTitle1'] === 'car_workshops') {
    $workshop = new CarWorkshop($workshop_specs);
    $vehicle = new Car($vehicle_specs);
} else {
    $workshop = new BikeWorkshop($workshop_specs);
    $vehicle = new Bike($vehicle_specs);
}

//tuning
/*if($_GET['option'] === 'change_tires') {
    $workshop->tire_change($vehicle);
} elseif($_GET['option'] === 'paint') {
    $workshop->paint($vehicle, $_GET['color']);
} elseif($_GET['option'] === 'turbo_charging') {
    $workshop->turbo_charging($vehicle, $_GET['turboCharging']);
} elseif($_GET['option'] === 'braking_sys_installation') {
    $workshop->turbo_charging($vehicle, $_GET['turboCharging']);
}*/
//switch uses not strict comparison (==)
switch($_GET['option']) {
    case 'change_tires':
        $workshop->tire_change($vehicle);
        break;
    case 'paint':
        $workshop->paint($vehicle, $_GET['color']);
        break;
    case 'turbo_charging':
        $workshop->turbo_charging($vehicle, $_GET['turboCharging']);
        break;
    case 'braking_sys_installation':
        $workshop->brake_sys_installation($vehicle, $_GET['brake']);
        break;
}

//output and update
echo json_encode($vehicle->get_specs());
$db->update($vehicle);

$db->disconnect_from_db();