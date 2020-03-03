<?php
class Comment
{
    
    // public function __construct($c, $t, $a)
    // {
    //     $this->content = $c;
    //     $this->dateTime = $t;
    //     $this->author = $a;
    // }

    public function AddComm($content, $author, $articleId)
    {
        $date = date('Y-m-d H:i:s');
        $conn=new mysqli(System::_DBHOST, System::_DBUSER, System::_DBPASS,System::_DBNAME);
        $conn->query("INSERT INTO comments values (null,'{$content}','{$date}' , '{$author}', '{$articleId}')");
  
    }

    public static function getAll($articleID)
    {
    
        $conn = new mysqli(System::_DBHOST, System::_DBUSER, System::_DBPASS, System::_DBNAME);
        $res = $conn->query("select * from comments where article_id=".$articleID);
        $all_com = array();
        

        while ($row = $res->fetch_assoc()) {
            $all_com[] = $row;
        }

        return $all_com;
    }

    public function Remove($id)
    {
        $conn=new mysqli(System::_DBHOST, System::_DBUSER, System::_DBPASS,System::_DBNAME);
      $conn->query("delete from comments WHERE comment_id =".$id);

    }

}
