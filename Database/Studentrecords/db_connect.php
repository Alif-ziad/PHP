<?php

$host="localhost";
$user="root";
$pass="";
$dbName="students";
$port=3306;

function dbconnect()
{
    global $host;
    global $user;
    global $pass;
    global $dbName;
    global $port;
    $conn=mysqli_connect($host, $user, $pass, $dbName, $port);

    if(!$conn)
        {
            echo mysqli_error($conn);
            echo "not connected";
        }

        else
        {
             echo "connection established successfully";
        
             return $conn;
        }
}
?>