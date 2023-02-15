<?php
 ini_set('display_errors',1);
 ini_set('display_startup_errors',1);
 error_reporting(E_ALL);



 class orm { 

    public $s_name = "localhost";
    public $u_name="yashsharma";
    public $password="hestabit@123";
    public $db="MydB";
    public $conn;

    public function connect($s_name, $u_name, $password,$db){

        // Create connection
        $conn = mysqli_connect($s_name, $u_name, $password);

        // Check connection
        if (!$conn) {
         die("Connection failed: " . mysqli_connect_error());
        }
        echo "Connected successfully";
    }

    

    public function select(){

    $sql = "SELECT id, firstname, lastname FROM MyGuests";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
       // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
        }
    } 
    else {
        echo "0 results";
    }
    }

    public function insert(){

    $sql = "INSERT INTO MyGuests (firstname, lastname, email)
    VALUES ('John', 'Doe', 'john@example.com')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    }

    public function update(){

        $sql = "UPDATE MyGuests SET lastname='Doe' WHERE id=2";

        if (mysqli_query($conn, $sql)) {
           echo "Record updated successfully";
        } else {
        echo "Error updating record: " . mysqli_error($conn);
        }
    }

    public function delete(){
        $sql = "DELETE FROM MyGuests WHERE id=3";

        if (mysqli_query($conn, $sql)) {
           echo "Record deleted successfully";
        } else {
           echo "Error deleting record: " . mysqli_error($conn);
        }
 
    }

    mysqli_close($conn);

}



?>