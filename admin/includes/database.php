<?php

require_once("new_config.php");

class Database {

    public $connection;

    /**
     * Database constructor.
     * @param $connection
     */
    function __construct()
    {
        $this->open_database();
    }

    public function open_database(){
        $this->connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME );

        if(mysqli_connect_errno()){
            die("hmm" . mysqli_error());
        }
    }

}


$database = new Database();








