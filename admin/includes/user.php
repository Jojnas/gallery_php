<?php



class User extends DB_object {

    protected static $db_table = "users";
    protected static $db_table_fields = array('username', 'password', 'first_name', 'last_name');
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;



    public static function verify_user($username, $password){
        global $database;

        $username = $database->escape_string($username);
        $password = $database->escape_string($password);

        $sql = "SELECT * FROM ". static::$db_table ." WHERE username = '".$username."' AND password = '".$password."' LIMIT 1";

//        var_dump($sql); die;

        $the_result_array = static::find_this_query($sql);

        if(!empty($the_result_array)){
            $first_item = array_shift($the_result_array);
            return $first_item;
        } else {
            return false;
        }

    }










}