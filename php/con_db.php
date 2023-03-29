<?php
function get_connection()
{
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "assignment_guvi";
    $port = "3306";
    $conn =  mysqli_connect($hostname, $username, $password, $database, $port);

    if (!$conn) {
        die("DB Error");
    } else {
        return $conn;
    }
}


