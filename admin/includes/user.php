<?php



class User extends DB_object {

    protected static $db_table = "users";
    protected static $db_table_fields = array('username', 'password', 'first_name', 'last_name', 'image');
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;
    public $image;
    public $upload_directory = 'images';
    public $images_placeholder = "http://placehold.it/400x400&text=image";

    public function image_assign(){

        if(empty($this->image)){
            return $this->images_placeholder;
        } else {
           return $this->upload_directory . DS . $this->image;
        }
    }
    public function picture_pathu(){

        return $this->upload_directory . '/' . $this->image;

    }


    public function upload_photo(){


            if(!empty($this->errors)){

                return false;
            }

            if(empty($this->image) || empty($this->tmp_path)){
                $this->errors = "the file is not available";
                return false;
            }

            $target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->image;

            if(file_exists($target_path)){
                $this->errors[] = "The file " . $this->image . " already exists";
                return false;
            }

            if(move_uploaded_file($this->tmp_path, $target_path)){



                    unset($this->tmp_path);
                    return true;

            } else {

                $this->errors[] = "the file directory does not have permission";
                return false;
            }

            $this->create();

    }



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