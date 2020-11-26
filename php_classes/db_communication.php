<?php
/*There is a class mysqli which already has the functionality of my DB class*/
class DB {
    protected $connection;
    public $host;
    public $user;
    public $password;
    public $database;
    public function __construct($host,$user,$password,$database)
    {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;
    }
    public function connect_to_db() {
        $this->connection = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        if($this->connection === false) {
            echo 'Failed to connect to database';
            echo mysqli_connect_error();
            exit();
        }
    }
    public function disconnect_from_db() {
        mysqli_close($this->connection);
    }
    public function save($item) {
        if($item::DEFINITION === null) {
            echo 'Item can not be saved. Its definition does not exist.';
            exit(); //die();
        }
        $properties_arr = $item->get_properties_str('insert'); //array of keys and values
        $table_title = $item::DEFINITION;
        $is_saved = mysqli_query($this->connection, "INSERT INTO `".$table_title."s` ({$properties_arr['keys_str']})".
            " VALUES ({$properties_arr['values_str']})"); //sava data in MySQL
        if($is_saved === false) {
            return 'Failed to save the data!';
        } else {
            return 'Saved!';
        }
    }
    public function get_items_list($table_title) {
        $keys = array();
        $values = array();

        if($table_title === 'cars' or $table_title === 'bikes') {
            $items_list = mysqli_query($this->connection, "SELECT `registration_num`,`oem`,`model`,`color` FROM `$table_title`");
            if($items_list === false) return 'Failed to load items list from DB!';
            while(($item = mysqli_fetch_assoc($items_list))) {
                array_push($keys, $item['registration_num']);
                $content = $item['oem'].' '.$item['model'].', '.$item['color'];
                array_push($values, $content);
            }
        } else if($table_title === 'car_workshops' or $table_title === 'bike_workshops') {
            $items_list = mysqli_query($this->connection, "SELECT `id`,`name`,`type` FROM `$table_title`");
            if($items_list === false) return 'Failed to load items list from DB!';
            while(($item = mysqli_fetch_assoc($items_list))) {
                array_push($keys, $item['id']);
                $content = $item['name'].', '.$item['type'];
                array_push($values, $content);
            }
        }
        return array_combine($keys, $values); //key => value
    }
    public function get($table_title, $registration_num) {
        $item_properties = '';
        if($table_title === 'cars' or $table_title === 'bikes') {
            $item_properties = mysqli_query($this->connection, "SELECT * FROM `$table_title`".
                " WHERE `registration_num`="."'$registration_num'");
        } else if($table_title === 'car_workshops' or $table_title === 'bike_workshops') {
            $item_properties = mysqli_query($this->connection, "SELECT * FROM `$table_title`".
                " WHERE `id`="."'$registration_num'"); //workshops have no registration number in this project
            //in terms not to do the code more complicated (but clean) id of a workshop is given through the
            //$registration_num parameter
        }
        if($item_properties === false) {
            return array('error' => 'Failed to fetch item´s specs/data from db!');
        } else {
            return mysqli_fetch_assoc($item_properties);
        }
    }
    public function update($item) {
        if($item::DEFINITION === null) {
            echo 'Item can not be saved. Its definition does not exist.';
            exit();
        }
        /*Probably, the code below can be improved*/
        $properties_str = $item->get_properties_str('update');
        $item_properties = mysqli_query($this->connection, "UPDATE `".$item::DEFINITION."s` ".
            "SET $properties_str ".
            "WHERE `registration_num`="."'{$item->get_registration_num()}'");
        if($item_properties === false) {
            return array('error' => 'Failed to update item in db!');
        } else {
            return 'Updated!';
        }
    }
    public function delete($table_title, $registration_num) {
        $is_deleted = mysqli_query($this->connection, "DELETE FROM `".$table_title."`".
            "WHERE `registration_num`="."'$registration_num'"); //delete item out of DB
        if($is_deleted === false) {
            return 'Failed to delete an item!';
        } else {
            return 'Deleted!';
        }
    }
}
