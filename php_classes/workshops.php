<?php
interface WorkshopIF {
    public function get_specs();
}
class Workshop {
    const DEFINITION = 'workshop';
    protected $name;
    protected $address;
    protected $owner;
    protected $employees_num;
    public function __construct($specs) {
        $this->name = $specs['name'];
        $this->address = $specs['address'];
        $this->employees_num = $specs['employees_num'];
        $this->owner = $specs['owner'];

    }
    public function hire($employees_num) {
        $this->employees_num += $employees_num;
    }
    public function fire($employees_num) {
        $this->employees_num -= $employees_num;
    }
    public function tire_change($vehicle) {
        if($vehicle->tire_type === 'summer tires') {
            $vehicle->tire_type = 'winter tires';
        } else {
            $vehicle->tire_type = 'summer tires';
        }
    }
    public function paint($vehicle, $color) {
        $vehicle->color = $color;
    }
}

class CarWorkshop extends Workshop implements WorkshopIF {
    const DEFINITION = 'car_workshop';
    protected $type;
    protected $car_lift_num;
    public function __construct($specs) {
        $this->type = $specs['type'];
        $this->car_lift_num = $specs['car_lift_num'];
        parent::__construct($specs);
    }
    public function purchase_car_lift($car_lift_num) {
        $this->car_lift_num += $car_lift_num;
    }
    public function turbo_charging($vehicle, $charging_type) {
        if($charging_type === 'small_turbine' or $charging_type === 'compressor') {
            $vehicle->power += 30;
        } elseif($charging_type === 'big_turbine') {
            $vehicle->power += 50;
        }
    }
    public function get_specs() {
        return '<ul>'.
            '<li id="name_val">Name: <span>'.$this->name.'</span></li>'.
            '<li id="type_val">Workshop Type: <span>'.$this->type.'</span></li>'.
            '<li id="address_val">Address: <span>'.$this->address.'</span></li>'.
            '<li id="employees_num_val">Number of Employees: <span>'.$this->employees_num.'</span></li>'.
            '<li id="car_lift_num_val">Number of Car Lifts: <span>'.$this->car_lift_num.'</span></li>'.
            '<li id="owner_val">Owner: <span>'.$this->owner.'</span></li>'.
            '</ul>';
    }
}

class SportCarWorkshop extends Workshop implements WorkshopIF {
    const DEFINITION = 'sport_car_workshop';
    const CERTIFIED = 'Yes';
    protected $type;
    protected $car_lift_num;
    public function __construct($specs) {
        $this->type = $specs['type'];
        $this->car_lift_num = $specs['car_lift_num'];
        parent::__construct($specs);
    }
    public function turbo_charging($vehicle, $charging_type)
    {
        if ($charging_type === 'turbo_compressor') {
            $vehicle->power += 100;
        } elseif ($charging_type === 'twin_turbo') {
            $vehicle->power += 150;
        }
    }
    public function body_carbon_fiber_installation($vehicle) {
        $vehicle->mass -= 120;
    }
    public function get_specs() {
        return '<ul>'.
            '<li id="name_val">Name: <span>'.$this->name.'</span></li>'.
            '<li id="type_val">Workshop Type: <span>'.$this->type.'</span></li>'.
            '<li id="address_val">Address: <span>'.$this->address.'</span></li>'.
            '<li id="employees_num_val">Number of Employees: <span>'.$this->employees_num.'</span></li>'.
            '<li id="car_lift_num_val">Number of Car Lifts: <span>'.$this->car_lift_num.'</span></li>'.
            '<li id="owner_val">Owner: <span>'.$this->owner.'</span></li>'.
            '<li id="certified_val">Certified by SCA: <span>'.$this::CERTIFIED.'</span></li>'.
            '</ul>';
    }
}

class BikeWorkshop extends Workshop implements WorkshopIF {
    const DEFINITION = 'bike_workshop';
    protected $type;
    public function __construct($specs) {
        $this->type = $specs['type'];
        parent::__construct($specs);
    }
    public function tattoo($bike, $color, $tattoo) {
        $bike->color = $bike->color." with $color $tattoo";
    }
    public function brake_sys_installation($bike, $disc_diameter) {
        if ($disc_diameter == 'medium') {
            $bike->braking_distance -= 2;
        } elseif ($disc_diameter == 'big') {
            $bike->braking_distance -= 4;
        }
    }
    public function get_specs() {
        return '<ul>'.
            '<li id="name_val">Name: <span>'.$this->name.'</span></li>'.
            '<li id="type_val">Workshop Type: <span>'.$this->type.'</span></li>'.
            '<li id="address_val">Address: <span>'.$this->address.'</span></li>'.
            '<li id="employees_num_val">Number of Employees: <span>'.$this->employees_num.'</span></li>'.
            '<li id="owner_val">Owner: <span>'.$this->owner.'</span></li>'.
            '</ul>';
    }
}