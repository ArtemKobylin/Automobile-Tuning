<?php
interface VehicleIF {
    public function get_specs();
}
abstract class Vehicle {
    protected $registration_num;
    protected $oem;
    protected $model;
    protected $type;
    public $color;
    protected $age;
    protected $mileage;
    public $power;
    public $mass;
    public $tire_type;
    public function get_properties_str($query_type) {
        /*This function iterates through all variables
        in an instance of the class (even protected and privat).
        They can be joined in one string and returned.
        This approach allows to use protected variables
        and get their values for saving in db in an
        appropriate form.*/
        $properties_str = '';
        if($query_type === 'insert') {
            $keys_str = '';
            $values_str = '';
            foreach($this as $key => $value) {
                $keys_str .= "`$key`,";
                $values_str .= "'$value',";
            }
            $keys_str = rtrim($keys_str, ","); //removing the last coma
            $values_str = rtrim($values_str, ","); //removing the last coma
            $properties_str = array('keys_str'=>$keys_str, 'values_str'=>$values_str);
        } elseif($query_type === 'update') {
            $keys_values_str = '';
            foreach($this as $key => $value) {
                if(is_numeric($value)) {
                    $keys_values_str .= "`$key`=".$value.',';
                } elseif (is_string($value)) {
                    $keys_values_str .= "`$key`="."'$value',";
                }
            }
            $properties_str = rtrim($keys_values_str, ","); //removing the last coma
        }
        return $properties_str;
    }
    public function generate_random_string($length) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    public function get_registration_num() {
        return $this->registration_num;
    }
}

class Car extends Vehicle implements VehicleIF {
    const DEFINITION = 'car';
    protected $seats_num;
    public function __construct($specs) {
        if(!$specs['registration_num']) {
            $this->registration_num = $this->generate_random_string(6);
        } else {
            $this->registration_num = $specs['registration_num'];
        }
        $this->oem = $specs['oem'];
        $this->model = $specs['model'];
        $this->type = $specs['type'];
        $this->color = $specs['color'];
        if($specs['type'] == 'sedan' or $specs['type'] == 'avant' or $specs['type'] == 'sport back'
            or $specs['type'] == 'SUV' or $specs['type'] == 'hatch back') {
            $this->seats_num = 4;
        } elseif(strpos($specs['type'], 'coupe') !== false) {
            $this->seats_num = 2;
        }
        $this->age = $specs['age'];
        $this->mileage = $specs['mileage'];
        $this->power = $specs['power'];
        $this->mass = $specs['mass'];
        $this->tire_type = $specs['tire_type'];
    }
    public function get_specs() {
        /* Although the content of this function does not differs a lot from the content of the car`s function
         * they are doubled, because they were intended to be different for testing the interface (VehicleIF) */
        return '<ul>'.
            '<li id="registration_num_val">Registration Number: <span>'.$this->registration_num.'</span></li>'.
            '<li id="oem_val">OEM: <span>'.$this->oem.'</span></li>'.
            '<li id="model_val">Model: <span>'.$this->model.'</span></li>'.
            '<li id="type_val">Type: <span>'.$this->type.'</span></li>'.
            '<li id="color_val">Color: <span>'.$this->color.'</span></li>'.
            '<li id="age_val">Age: <span>'.$this->age.'</span> years</li>'.
            '<li id="mileage_val">Mileage: <span>'.$this->mileage.'</span> km</li>'.
            '<li id="power_val">Power: <span>'.$this->power.'</span> hp</li>'.
            '<li id="mass_val">Mass: <span>'.$this->mass.'</span> kg</li>'.
            '<li id="tire_type_val">Tire Type: <span>'.$this->tire_type.'</span></li>'.
            '<li id="seats_num_val">Seats Number: <span>'.$this->seats_num.'</span></li>'.
            '</ul>';
    }
}

class Bike extends Vehicle implements VehicleIF{
    const DEFINITION = 'bike';
    public $braking_distance;
    public function __construct($specs) {
        if(!$specs['registration_num']) {
            $this->registration_num = $this->generate_random_string(4);
        } else {
            $this->registration_num = $specs['registration_num'];
        }
        $this->oem = $specs['oem'];
        $this->model = $specs['model'];
        $this->type = $specs['type'];
        $this->color = $specs['color'];
        $this->age = $specs['age'];
        $this->mileage = $specs['mileage'];
        $this->power = $specs['power'];
        $this->mass = $specs['mass'];
        $this->tire_type = $specs['tire_type'];
        $this->braking_distance = $specs['braking_distance'];
    }
    public function get_specs() {
        return '<ul>'.
        '<li id="registration_num_val">Registration Number: <span>'.$this->registration_num.'</span></li>'.
        '<li id="oem_val">OEM: <span>'.$this->oem.'</span></li>'.
        '<li id="model_val">Model: <span>'.$this->model.'</span></li>'.
        '<li id="type_val">Type: <span>'.$this->type.'</span></li>'.
        '<li id="color_val">Color: <span>'.$this->color.'</span></li>'.
        '<li id="age_val">Age: <span>'.$this->age.'</span> years</li>'.
        '<li id="mileage_val">Mileage: <span>'.$this->mileage.'</span> km</li>'.
        '<li id="power_val">Power: <span>'.$this->power.'</span> hp</li>'.
        '<li id="mass_val">Mass: <span>'.$this->mass.'</span> kg</li>'.
        '<li id="tire_type_val">Tire Type: <span>'.$this->tire_type.'</span></li>'.
        '<li id="seats_num_val">Breaking Distance: <span>'.$this->braking_distance.'</span> m</li>'.
            '</ul>';
    }
}