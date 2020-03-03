<?php
class User  
{
    public $username;
    public $password;

    public function Login($username, $pass)
    {
        $conn=new mysqli(System::_DBHOST, System::_DBUSER, System::_DBPASS,System::_DBNAME);
        $result=$conn->query("SELECT * FROM users WHERE User='$username' AND Password='$pass'");
        $user=$result->fetch_assoc();
        return $user;
    }

    public function check($username)    
    {
        $conn=new mysqli(System::_DBHOST, System::_DBUSER, System::_DBPASS,System::_DBNAME);
        $result=$conn->query("SELECT * FROM users WHERE User='$username'");
        if($user=$result->fetch_assoc())
        {
            return -1;
        }
    
    }

    public function Registration($user, $pass)
    {
        $conn=new mysqli(System::_DBHOST, System::_DBUSER, System::_DBPASS,System::_DBNAME);
        $conn->query("INSERT INTO users values (null,'{$user}','{$pass}')");

    }

}
