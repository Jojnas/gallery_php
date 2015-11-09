<?php



class Comment extends DB_object {

    protected static $db_table = "comments";
    protected static $db_table_fields = array('id', 'photo_id', 'author', 'body');
    public $id;
    public $photo_id;
    public $author;
    public $body;

    public static function create_comment($photo_id, $author="Johnny Boy", $body=""){

        if(!empty($photo_id) && !empty($author) && !empty($body)){

            $comment = new Comment();

            $comment->photo_id = (int)$photo_id;
            $comment->author = $author;
            $comment->body = $body;

            return $comment;

        } else {

            return false;
        }
    }

    public static function find_comments($photo_id=0){

        global $database;

        $sql = "SELECT * FROM " . static::$db_table .
                " WHERE photo_id = " . $database->escape_string($photo_id) .
                " ORDER BY photo_id ASC";

        return static::find_this_query($sql);

    }

}