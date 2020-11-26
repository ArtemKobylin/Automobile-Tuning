<?php

$form_str = '<div id="input_form">
                <input id="oem" class="form-control" placeholder="oem"><br>
                <input id="model" class="form-control" placeholder="model"><br>';
/*if($_GET['objectType'] === 'car') {
    echo json_encode('<div id="car_form">
                        <input id="oem" class="form-control" placeholder="oem"><br>
                        <input id="model" class="form-control" placeholder="model"><br>
                        <select id="type" class="form-control">
                            <option value="sedan">sedan</option>
                            <option value="avant">avant</option>
                            <option value="coupe">coupe</option>
                            <option value="cabriolet">cabriolet</option>
                            <option value="sport_back">sport back</option>
                            <option value="SUV">SUV</option>
                        </select><br>
                        <input id="color" class="form-control" placeholder="color"><br>
                        <input id="age" class="form-control" placeholder="age"><br>
                        <input id="mileage" class="form-control" placeholder="mileage"><br>
                        <input id="power" class="form-control" placeholder="power"><br>
                        <input id="mass" class="form-control" placeholder="mass"><br>
                        <select id="tire_type" class="form-control">
                            <option value="summer_tires">summer tires</option>
                            <option value="winter_tires">winter tires</option>
                        </select><br>
                        <button>Create</button><br>');
} else if($_GET['objectType'] === 'bike') {
    echo json_encode('<div id="bike_form">
                        <input id="oem" class="form-control" placeholder="oem"><br>
                        <input id="model" class="form-control" placeholder="model"><br>
                        <select id="type" class="form-control">
                            <option value="scooter">scooter</option>
                            <option value="sports_bike">sports bike</option>
                            <option value="naked_bike">naked bike</option>
                            <option value="cruiser">cruiser</option>
                            <option value="touring_bike">touring bike</option>
                        </select><br>
                        <input id="color" class="form-control" placeholder="color"><br>
                        <input id="age" class="form-control" placeholder="age"><br>
                        <input id="mileage" class="form-control" placeholder="mileage"><br>
                        <input id="power" class="form-control" placeholder="power"><br>
                        <input id="mass" class="form-control" placeholder="mass"><br>
                        <select id="tire_type" class="form-control">
                            <option value="summer_tires">summer tires</option>
                            <option value="winter_tires">winter tires</option>
                        </select><br>
                        <input id="braking_distance" class="form-control" placeholder="braking distance"><br>
                        <button>Create</button><br>');
} else {
    echo json_encode(array('error' => 'Provided object type is not supported'));
}*/

if($_GET['objectType'] === 'car') {
    $form_str .= '<select id="type" class="form-control">
                    <option value="sedan">sedan</option>
                    <option value="avant">avant</option>
                    <option value="coupe">coupe</option>
                    <option value="cabriolet">cabriolet</option>
                    <option value="sport_back">sport back</option>
                    <option value="SUV">SUV</option>
                  </select><br>';
} else if($_GET['objectType'] === 'bike') {
    $form_str .= '<select id="type" class="form-control">
                    <option value="scooter">scooter</option>
                    <option value="sports_bike">sports bike</option>
                    <option value="naked_bike">naked bike</option>
                    <option value="cruiser">cruiser</option>
                    <option value="touring_bike">touring bike</option>
                  </select><br>
                  <input id="braking_distance" class="form-control" placeholder="braking distance"><br>';
} else {
    echo json_encode(array('error' => 'Provided object type is not supported'));
}

$form_str .= '<input id="color" class="form-control" placeholder="color"><br>
              <input id="age" class="form-control" placeholder="age"><br>
              <input id="mileage" class="form-control" placeholder="mileage"><br>
              <input id="power" class="form-control" placeholder="power"><br>
              <input id="mass" class="form-control" placeholder="mass"><br>
              <select id="tire_type" class="form-control">
                <option value="summer_tires">summer tires</option>
                <option value="winter_tires">winter tires</option>
              </select><br>
              <button>Create</button><br>';

echo json_encode($form_str);