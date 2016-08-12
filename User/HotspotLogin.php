<?php

/*
 * To change this template use Tools | Templates.
 */
session_start();

global $usernameonfile;
global $useremailonfile;
global $userpasswordonfile;
$email = isset($_POST["email"])? $_POST["email"] : "";
$password = isset($_POST["password"])?$_POST["password"] : "";

$mongoConn = new MongoClient();
$database = $mongoConn->selectDB('Hotspot');
$collection = $database->selectCollection('socialyte');
$admin = $database->selectCollection('admin');
$user = $collection->findone(array('login.email' => $email));
$welcome = $admin->findone(array("login.username"=> $email));
 
if (empty($email) === true || empty($password) === true) {
    $errors[] = 'You need to enter a email and password';
} else {
if($user["login"]["email"] == $email && $password == $user["login"]["password"]){
    $_SESSION["loggedInUser"] = $user["_id"];  
    $_SESSION["username"] = $user["User ID"];
    $_SESSION["city"] = $user["location"]["city"];
    $_SESSION["state"] = $user["location"]["state"];
    echo 'successful';
header('Location: /User/index.php');
 }elseif($welcome["login"]["username"] == $email && $welcome["login"]["password"]==$password){
    $_SESSION["admin"] = $welcome["_id"];
    header('Location: /User/admin/adminHome.php');
}else{
    echo "User Not found<br>"; 
     header('Location: /User/HotspotLogin.html');
}}

?>