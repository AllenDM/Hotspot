<?php
session_start();
$type = $_GET["type"];
if($type == 1){
    $do = $_GET["do"];
if($do == "create"){
$creator = $_SESSION["username"];
$gname = $_POST["groups"];
   $hot = new MongoClient();
   //echo "Connection to database successfully";
    $db = $hot->selectDB('Hotspot');
    $collection = $db->selectCollection('groups');
$make = array(
        "name" => $gname,
        "creator" => $creator,
        "members" => []
);
    $collection->insert($make);
header('Location:/User/SocialyteMatch.php');
}else{
    //create groups
    $id = $_GET["id"];
       $hot = new MongoClient();
   //echo "Connection to database successfully";
    $db = $hot->selectDB('Hotspot');
    $collection = $db->selectCollection('groups');
    $group = $collection->findone(array('_id' => new MongoID($id)));
    $creator = $group["creator"];
    $collection->remove(array("_id" => new MongoID($id)));
    header('Location: /User/matchbox.php?id='.$creator.'');
}
    
}elseif($type == 2){
    //remove attending members
    $remove = $_GET["name"];
    $theevent = $_GET["event"];
     $hot = new MongoClient();
   //echo "Connection to database successfully";
    $db = $hot->selectDB('Hotspot');
    $collection = $db->selectCollection('events'); 
    $removed = array('$pull' => array("attending" => $remove));
    $collection->update(array("_id" => new MongoID($theevent)),$removed);
    $collection->update(array("_id" => new MongoID($theevent)),array('$inc'=> array("attendence"=> -1 )));
    header('Location: /User/eventattendance.php?name='.$theevent.'');
}elseif($type == 3){
    //remove group
    $remove = $_GET["name"];
    $theevent = $_GET["event"];
    $hot = new MongoClient();
   //echo "Connection to database successfully";
    $db = $hot->selectDB('Hotspot');
    $collection = $db->selectCollection('events'); 
    $removed = array('$pull' => array("groups" => $remove));
    $collection->update(array("_id" => new MongoID($theevent)),$removed);
    header('Location: /User/eventattendance.php?name='.$theevent.'');  
}elseif($type == 4){
    //send invite
    $theevent = $_GET["event"];
   $search = isset($_POST["search"])? $_POST["search"] : "";
    $hot = new MongoClient();
   //echo "Connection to database successfully";
    $db = $hot->selectDB('Hotspot');
    $collection = $db->selectCollection('events'); 
    $checkcol = $db->selectCollection('socialyte');
    $invite = $db->selectCollection('announcements');
    $userexist = $checkcol->findone(array('User ID' => $search));
    if(!empty($userexist)){
    $sendinvite = array(
    "type" =>  "Activity",
    "about" => "invite",
    "recipient" => $search,
    "message" => array(
    "message" => "You have an invitation",
    "status" => "pending"
    ),
    "pertaining" => $theevent,
    "time received" => getdate()
    );
    $invite->insert($sendinvite);
    header('Location: /User/eventattendance.php?name='.$theevent.'');     
    }
    else{
    header('Location: /User/eventattendance.php?name='.$theevent.'');    
    }
}elseif($type == 5){
    //send group invite
        $theevent = $_GET["event"];
   $search = isset($_POST["search"])? $_POST["search"] : "";
    $hot = new MongoClient();
   //echo "Connection to database successfully";
    $db = $hot->selectDB('Hotspot');
    $collection = $db->selectCollection('events'); 
    $checkcol = $db->selectCollection('socialyte');
    $userexist = $checkcol->findone(array('groups.name' => $search));
    if(!empty($userexist)){
         $add = array('$push' => array("groups" => $search));
    $collection->update(array("_id" => new MongoID($theevent)),$add);
    header('Location: /User/eventattendance.php?name='.$theevent.'');     
    }
    else{
    header('Location: /User/eventattendance.php?name='.$theevent.'');    
}
}
?>