<?php
class Category 
{
	
	public function all(){
        $conn=new mysqli(System::_DBHOST, System::_DBUSER, System::_DBPASS,System::_DBNAME);
        $res=$conn->query("select * from categories");
        $categories = array(); 
        
		while ($category = $res->fetch_assoc()) {
			    $categories[] = $category; 
			}
			return $categories;
		}
	
}
?>