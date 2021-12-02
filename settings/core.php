<?php

//header redirection
ob_start();


//start session
session_start();

//get the name of the current page
$current_file = $_SERVER['SCRIPT_NAME'];

//function to check for login

function isNormalUser(){
    //check if login session user id  exist
    if (isset($_SESSION['user_id']))
    {
        //redirect to login page
        // header('Location: ../register/login.php');
        return true;
    }
    return false;
}

//function to get customer id
function get_customer_id(){
    //check if login session userid exit
    if (isset($_SESSION['user_id']))
    {
        //return customer id
        return $_SESSION['user_id'];
    }
}

//function to check for permission
//to know if user is allowed to see that page or execute a command

function check_permission(){
    //get session role
    if (isset($_SESSION['user_role'])) {

        //return user role
        return $_SESSION['user_role'];
    }
}

function isAdmin(){
    if (!isset($_SESSION['admin_id'])){
        header('Location: ../Login/login_admin.php');
        exit;
    }









}

//get user ip
function getIp()
{
    $ip = $_SERVER['REMOTE_ADDR'];

    if(!empty($_SERVER['HTTP_CLIENT_IP']))
    {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
    {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }

    return $ip;
}

?>
