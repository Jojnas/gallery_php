<?php

class Photo extends DB_object{

    protected static $db_table = "photos";
    protected static $db_table_fields = array('id', 'title', 'caption', 'description', 'filename', 'alternate_text', 'type', 'size');
    public $id;
    public $title;
    public $caption;
    public $description;
    public $filename;
    public $alternate_text;
    public $type;
    public $size;

    public $tmp_path;
    public $upload_directory = "images";



    public function save(){

        if($this->id){

            $this->update();
        } else {

            if(!empty($this->errors)){

                return false;
            }

            if(empty($this->filename) || empty($this->tmp_path)){
                $this->errors = "the file is not available";
                return false;
            }

            $target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->filename;

            if(file_exists($target_path)){
                $this->errors[] = "The file " . $this->filename . " already exists";
                return false;
            }

            if(move_uploaded_file($this->tmp_path, $target_path)){

                if($this->create()){

                    unset($this->tmp_path);
                    return true;
                }
            } else {

                $this->errors[] = "the file directory does not have permission";
                return false;
            }

            $this->create();
        }
    }

    public function delete_photo(){

        if($this->delete()){

            $target_path = SITE_ROOT . DS . 'admin' . $this->picture_path();

            if (unlink($target_path)){
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }

    }




}