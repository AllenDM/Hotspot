<?php
session_start();
$status = $_GET["invite"];
$announceID = $_GET["name"];
$invited = $_GET["invited"];
$theevent = $_GET["about"];
    $hot = new MongoClient();
   //echo "Connection to database successfully";
    $db = $hot->selectDB('Hotspot');
    $collection = $db->selectCollection('events'); 
    $checkcol = $db->selectCollection('socialyte');
    $invite = $db->selectCollection('announcements');
    $party = $collection->findone(array("_id"=> new MongoID($theevent)));
    if($status == "accept"){
    $add = array('$push' => array("attending" => $_SESSION["username"]));
    $collection->update(array("_id" => new MongoID($theevent)), array('$inc'=> array("attendence"=> 1)));
    $collection->update(array("_id" => new MongoID($theevent)),$add);
    $respond= array(
    "type" =>  "MyEvents",
    "about" => "event",
    "recipient" => [$party["event organizer"]],
    "message" => $_SESSION["username"]." has accepted your invitation",
    "pertaining" => $theevent,
    "time received" => getdate()
);
    $invite->update(array("_id"=> new MongoID($announceID)), array('$set' => array("message.status"=> "accept")));
    $invite->insert($respond);
}else{
    $invite->update(array("_id"=> new MongoID($announceID)), array('$set' =>array("message.status"=> "decline")));
    $respond= array(
    "type" =>  "MyEvents",
    "about" => "event",
    "recipient" => [ $party["event organizer"]],
    "message" =>  $_SESSION["username"]." has declined your invitation",
    "pertaining" => $theevent,
    "time received" => getdate()
);
    $invite->insert($respond);
    }
header('Location: /User/activity.php');

?>