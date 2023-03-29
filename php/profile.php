<?php
session_start();

require 'action.php';

header('Content-Type: application/json; charset=utf-8');

$response = ['success'=>true , 'message'=>'User details fetched successfully !'];

if(isset($_SESSION['loggedin'])){
    $user = fetch_user_by_email($_SESSION['email']);
    unset($user['password']);
    $response['user'] = $user;
}else{
    $response['success'] = false;
    $response['message'] = 'Not loggedIN !';
}

echo json_encode($response);
?>    





