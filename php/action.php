<?php
require "con_db.php";


mysqli_query(get_connection(),"CREATE TABLE IF NOT EXISTS `assignment_guvi`.`users` (`id` INT NOT NULL AUTO_INCREMENT , `email` VARCHAR(256) NOT NULL , `password` VARCHAR(256) NOT NULL , `first_name` VARCHAR(256) NOT NULL , `last_name` VARCHAR(256) NOT NULL , `age` INT NOT NULL , `gender` VARCHAR(10) NOT NULL , `mobile` VARCHAR(25) NOT NULL, PRIMARY KEY (`id`), UNIQUE (`email`));");

function create_user($email,$password,$first_name,$last_name,$age,$gender,$mobile){
    $conn = get_connection();
    $stmt =  mysqli_prepare($conn,"INSERT INTO `users` (`id`, `email`, `password`, `first_name`, `last_name`, `age`, `gender`, `mobile`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssiss",$email,$password,$first_name,$last_name,$age,$gender,$mobile);
    try {
        $stmt->execute();
    } catch (\Throwable $th) {
        throw $th;
    }
}

function fetch_user_by_email($email){
    $sql = "SELECT * FROM `users` WHERE `email` = ? ";
    $conn = get_connection();
    $stmt =  mysqli_prepare($conn,$sql);
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result){
        return $result->fetch_assoc();
    }

    return false;

}