<?php
session_start();
/*
 * To change this template use Tools | Templates.
 */

$name = isset($_POST["name"])? $_POST["name"] : "";
$music = isset($_POST["music"])? $_POST["music"] : "";
$price = isset($_POST["price"])? $_POST["price"] : "";
$food = isset($_POST["food"])? $_POST["food"] : "";
$date = isset($_POST["date"])? $_POST["date"] : "";
$time = isset($_POST["time"])? $_POST["time"] : "";
$drink = isset($_POST["drinks"])? $_POST["drinks"] : "";
$city = isset($_POST["city"])? $_POST["city"] : "";
$state = isset($_POST["state"])? $_POST["state"] : "";
$address = isset($_POST["address"])? $_POST["address"] : "";
$attire = isset($_POST["attire"])? $_POST["attire"] : "";
$invitation = isset($_POST["type"])? $_POST["type"] : "";

   // connect to mongodb
   $hot = new MongoClient();
  // echo "Connection to database successfully";
	
   // select a database
   $db = $hot->selectDB('Hotspot');
   //echo "Database mydb selected";


  /*  $grid = $db->getGridFS(); //use GridFS class for handling files */
   //echo "Database mydb selected";
     $collection = $db->selectCollection('events');
   //echo "Collection selected succsessfully";
/*	$id = $grid->storeUpload('fileupload',$flyer) //load file into MongoDB */
   $event = array( 
      "created time" => getdate(),
      "event organizer" => $_SESSION["username"],
      "name" => $name,
      "invitation" => $invitation,
      "location" => array(
        "address" => $address,
        "city" => $city,
        "state" => $state
),
      "music" => $music, 
      "cost" => $price,
        "food" => $food,
        "date" => $date,
        "time" => $time,
        "drinks" => $drink,
        "attire" => $attire,
        "Flames" => 0,
        "Flamers" => [],
        "attendence" => 0,
        "attending" => [],
        "groups" => [],
        "comments" => []
   );

$collection ->insert($event);
header('Location: /User/index.php'); 
?>