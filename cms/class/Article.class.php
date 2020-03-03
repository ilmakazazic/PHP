<?php
class Article  
{
    public $id;
    public $date;
    public $title;
    public $description;
    public $content;

    public static function getAll(){
        $conn=new mysqli(System::_DBHOST, System::_DBUSER, System::_DBPASS,System::_DBNAME);
        $res=$conn->query("select * from articles");
        $all_articles=array();
        
        while($row=$res->fetch_assoc())
        {
            $all_articles[]=$row;
           
         }   
         
        return $all_articles;        
    }

    public function Add($title, $description, $content, $category)
    {
        $date = date('Y-m-d H:i:s');
        $conn=new mysqli(System::_DBHOST, System::_DBUSER, System::_DBPASS,System::_DBNAME);
        $conn->query("INSERT INTO articles values (null,'{$date}' , '{$title}', '{$description}', '{$content}', '{$category}')");
    }

    public static function getOne($id){
        $conn=new mysqli(System::_DBHOST, System::_DBUSER, System::_DBPASS,System::_DBNAME);

        $res=$conn->query("select * from articles where id=".$id);        
        $article=$res->fetch_assoc();     
        return $article;
    }

    public function GetByCategory($id){
        $conn=new mysqli(System::_DBHOST, System::_DBUSER, System::_DBPASS,System::_DBNAME);
        $res=$conn->query("select * from articles where category_id=".$id);        
        $articles = array(); 
        while ($article = $res->fetch_assoc()) {
            $articles[] = $article; 
        }
        return $articles;
    }

    public function Remove($id)
    {
        $conn=new mysqli(System::_DBHOST, System::_DBUSER, System::_DBPASS,System::_DBNAME);
      $conn->query("delete from articles WHERE id =".$id);
      

    }

    
    
  
}
