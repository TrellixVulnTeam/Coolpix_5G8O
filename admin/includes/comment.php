    <?php

    class Comment extends DB_Object{

    protected static $db_table = "comments";
    protected static $db_table_fields = array('photo_id', 'author', 'body', 'comment_date');
    
    public $id;
    public $photo_id;
    public $author;
    public $body;
    public $comment_date;
/* ---------------------------------------------------------------------------- */


    public static function create_comment($photo_id, $author="", $body="", $comment_date = ""){


    if(!empty($photo_id) && !empty($author) && !empty($body) ){

    $comment = new Comment();

    $comment->photo_id  = (int)$photo_id;
    $comment->author    = $author;
    $comment->body      = $body;
    $comment->comment_date = date('d-m-y H:i:s');

    return $comment;

    } else {

    return false;

    }
    
    
        
    } // end of create_comment
   /* ---------------------------------------------------------------------------- */


    public static function find_the_comments($photo_id=0){

    global $database;

    $sql = "SELECT * FROM " . self::$db_table;
    $sql .= " WHERE photo_id= " . $database->escape_string($photo_id);
    $sql .= " ORDER BY photo_id ASC";

    return self::find_by_query($sql);

    }// end of find_the_comments
/* ---------------------------------------------------------------------------- */

    } // End of class Comment 






    ?>