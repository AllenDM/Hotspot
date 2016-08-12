<?php
session_start();
$type = $_GET["type"];
$ename = $_GET["pid"];
   // connect to mongodb
   $hot = new MongoClient();
  // echo "Connection to database successfully";
   // select a database
   $db = $hot->selectDB('Hotspot');
   //echo "Database mydb selected";
   $eventcollection = $db->selectCollection('events');
   $notify = $db->selectCollection('announcements');
   $events = $eventcollection->findone(array("_id" => new MongoId($ename))); 

  global $onlist;
if($type == "attend"){
      foreach($events["attending"] as $look){
      if($look == $_SESSION["username"]){
          $onlist++;
      }}
    if(empty($onlist)){
    $attend = array('$inc' =>array("attendence" => 1));
    $addattend = array('$push' =>array("attending" => $_SESSION["username"]));
    $eventcollection->update(array("_id"=> new MongoId($ename)), $attend);
    $eventcollection->update(array("_id"=> new MongoId($ename)), $addattend);
    $respond= array(
    "type" =>  "MyEvents",
    "about" => "event",
    "recipient" => [$events["event organizer"]],
    "message" => $_SESSION["username"]." is now attending your event",
    "pertaining" => $theevent,
    "time received" => getdate()
);    
     $notify->insert($respond);
}else{
    $attend = array('$inc' =>array("attendence" => -1));
    $addattend = array('$pull' =>array("attending" => $_SESSION["username"]));
    $eventcollection->update(array("_id"=> new MongoId($ename)), $attend);
    $eventcollection->update(array("_id"=> new MongoId($ename)), $addattend);  
     $respond= array(
    "type" =>  "MyEvents",
    "about" => "event",
    "recipient" => [$events["event organizer"]],
    "message" => $_SESSION["username"]." will not be attending your event",
    "pertaining" => $theevent,
    "time received" => getdate()
);    
     $notify->insert($respond);
    }
      header('Location: /User/vieweventattendance.php?name='.$events["_id"].'&user='.$events["event organizer"].''); 
    
} else if($type == "comments"){
    $mes = $_GET["comments"];
    $comment = array(
        "commenter" => $_SESSION["username"],
        "comments" => $mes
    );
    $comments = array('$push' => array('comments' => $comment));
    $eventcollection->update(array("_id"=> new MongoId($ename)), $comments);
    $respond= array(
    "type" =>  "MyEvents",
    "about" => "event",
    "recipient" => [$events["event organizer"]],
    "message" => $_SESSION["username"]." has commented on your event: ".$mes,
    "pertaining" => $theevent,
    "time received" => getdate()
);    
     $notify->insert($respond);
    header('Location: /User/viewevent.php?name='.$events["_id"].'&user='.$events["event organizer"].'');
}else if($type == "removecomments"){
    $mes = $_GET["comments"];
    $which = $_GET["which"];
    $comments = array('$pull' => array('comments' => $events["comments"][$which]));
    $eventcollection->update(array("_id"=> new MongoId($ename)), $comments);
    header('Location: /User/viewevent.php?name='.$events["_id"].'&user='.$events["event organizer"].'');
}

?>
