<?php
session_start();
$status = $_GET["type"];
$do = $_GET["do"];
$id = $_GET["id"];

    $hot = new MongoClient();
   //echo "Connection to database successfully";
    $db = $hot->selectDB('Hotspot');
    $collection = $db->selectCollection('group'); 
    $checkcol = $db->selectCollection('socialyte');
    $invite = $db->selectCollection('announcements');
    $party = $collection->findone(array("_id"=> new MongoID($invited)));
    $search = isset($_POST["search"])? $_POST["search"] : "";
     $userexist = $checkcol->findone(array('User ID' => $search));
    if($status == 1){
        if($do == "add"){
      if(!empty($userexist)){
    $add = array('$push' => array("members" => $_SESSION["username"]));
    $collection->update(array("_id" => new MongoID($id)),$add);
     $respond= array(
    "type" =>  "Activity",
    "about" => "matchbox",
    "recipient" => [$search],
    "message" => "You have been added to a matchbox",
    "pertaining" => $id,
    "time received" => getdate()
);
    $add = array('$push' => array("members" => $search));
    $collection->update(array("_id" => new MongoID($id)),$add);
    $invite->insert($respond);
        }
}elseif($do == "delete"){
    $remove = $_GET["delete"];
    $removed = array('$pull' => array("members" => $remove));
    $collection->update(array("_id" => new MongoID($id)),$removed);
    $respond= array(
    "type" =>  "Activity",
    "about" => "matchbox",
    "recipient" => [$remove],
    "message" => "You have been remove from a matchbox",
    "pertaining" => $id,
    "time received" => getdate()
);

    $invite->insert($respond);
    }
header('Location: /User/grouplist.php?id='$id'');
    }
?>