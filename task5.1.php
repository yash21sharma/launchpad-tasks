<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

interface connection{
   function connect($s_name, $u_name, $password);
}

class orm implements connection{
    public static $s_name = "localhost";
    public static $u_name="yashsharma";
    public static $password="hestabit@123";
    public static $db="MydB";

    public static function connect($s_name, $u_name, $password,$db){

        // Create connection
        $conn = mysqli_connect($s_name, $u_name, $password);

        // Check connection
        if (!$conn) {
         die("Connection failed: " . mysqli_connect_error());
        }
        echo "Connected successfully";
    }
}


?>