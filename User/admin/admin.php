<?php

/*
 * To change this template use Tools | Templates.
 */
$mongoConn = new MongoClient();
$database = $mongoConn->selectDB('Hotspot');
$collection = $database->selectCollection('socialyte');
$id = $_GET["id"];
$usernameused = $collection->findOne(array('_id' => new MongoID($id))); 

$type = $_GET["type"];
if($type == "mod"){
$first = isset($_POST["first"])? $_POST["first"] : "";
$last = isset($_POST["last"])? $_POST["last"] : "";
$email = isset($_POST["email"])? $_POST["email"] : "";
$username = isset($_POST["username"])? $_POST["username"] : "";
$city = isset($_POST["city"])? $_POST["city"] : "";
$state = isset($_POST["state"])? $_POST["state"] : "";
$zipcode = isset($_POST["zipcode"])? $_POST["zipcode"] : "";
$password = isset($_POST["password"])? $_POST["password"] : "";

   if(!empty($usernameused) && $usernameused["User ID"] != $username)
   {
    echo 'Username '.$username. 'already exist!<br>'; 
  header("Location: /User/admin/Users.php");    
   } else{	
     
   $socialyte = array('$set'=>array( 
       "User ID" => $username,
       "first name" => $first, 
       "last name" => $last, 
       "location" =>array( 
       "city" => $city,
       "state" => $state,
       "zip code" => $zipcode
   )));
  $invite = $database->selectCollection('announcements');
if($password != $usernameused["login"]["password"]){
    $alert = array(
    "type" =>  "Activity",
    "about" => "account",
    "recipient" => $usernameused["User ID"],
    "message" => "Your password has been reset: ".$password,
    "pertaining" => $usernameused["_id"],
    "time received" => getdate()
);
    $invite->insert($alert);
}
     $alerts = array(
    "type" =>  "Activity",
    "about" => "account",
    "recipient" => $usernameused["User ID"],
    "message" => "Your account has been modified ",
    "pertaining" => $usernameused["_id"],
    "time received" => getdate()
);
     
     $invite->insert($alerts);
$collection->update(array('_id'=> $usernameused["_id"]),array('$set'=> array('login.password'=> $password)));
$collection->update(array('_id'=> $usernameused["_id"]),$socialyte);
   }
header('Location: /User/admin/Users.php');
}
?>

