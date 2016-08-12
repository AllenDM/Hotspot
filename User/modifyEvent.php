<?php
session_start();
$ename = $_SESSION["CurrentEvent"];
$formtype = $_GET["ftype"];
/*
 * To change this template use Tools | Templates.
 */
   // connect to mongodb
   $hot = new MongoClient();
  // echo "Connection to database successfully";
	
   // select a database
   $db = $hot->selectDB('Hotspot');
   //echo "Database mydb selected";
$collection = $db->selectCollection('events');
$announce = $db->selectCollection('announcements');
$event = $collection->findone(array("_id" => $ename));
if($formtype == 1){
    $invitation = isset($_POST["type"])? $_POST["type"] : ""; 
    $update = array("invitation" => $invitation, "created time" => getdate());
    
}elseif($formtype == 2)  {  
       $hot = new MongoClient();
   $db = $hot->selectDB('Hotspot')->getGridFS();
    storeupload('fileupload', array('_id' => $ename));
   
}elseif($formtype == 3){
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

   $update = array(
      "created time" => getdate(),
      "event organizer" => $_SESSION["username"],
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
   );
}elseif($formtype == 4){
    $notify = array(
    "type" =>  "Activity",
    "about" => "event",
    "recipient" => $event["attending"],
    "message" => "Event has been Removed",
    "pertaining" => $event["_id"],
    "time received" => getdate()
);
$announce->insert($notify);
 $collection->remove(array('_id'=> $ename));
    header('Location: /User/index.php');
}
$collection->update(array( "_id" => $ename ), array( '$set' => $update ));
$notify = array(
    "type" =>  "Activity",
    "about" => "event",
    "recipient" => $event["attending"],
    "message" => "Event has been modified",
    "pertaining" => $event["_id"],
    "time received" => getdate()
);
$ename = $event["_id"];
$announce->insert($notify);
header('Location: /User/eventview.php?name='.$ename.'');
?>
