<?php
session_start();
/*
 * To change this template use Tools | Templates.
 */
   // connect to mongodb
   $type = $_GET["type"];
   if($type == "1"){
   $message = isset($_POST["message"])? $_POST["message"] : "";
   $id = $_GET["id"];
   $hot = new MongoClient();
   //echo "Connection to database successfully";
        $db = $hot->selectDB('Hotspot');
        $collection = $db->selectCollection('message');
        $send = $collection->findone(array('_id' => new MongoID($id)));
        global $sentto;
        foreach($send["Recipients"] as $rec){
            if($rec != $_SESSION["username"]){
            $sentto = $rec;}
        }
        $sentmessage = array(
     "from" => $_SESSION["username"],
    "to" => $sentto,
    "date sent" => date("F:d:Y"),
    "time sent" => date("h:i:a"),
    "message" => $message
        );
       $sending = array('$push' => array('content' => $sentmessage));
       $collection->update(array("_id" => new MongoID($id)), $sending);
       header('Location: /User/Message.php?id='.$id.'');
   }elseif($type == "2"){
       $message = isset($_POST["message"])? $_POST["message"] : "";
       $recipent = isset($_POST["recipient"])? $_POST["recipient"] : "";
   $hot = new MongoClient();
   //echo "Connection to database successfully";
        $db = $hot->selectDB('Hotspot');
        $collection = $db->selectCollection('message');
       $find = $db->selectCollection('socialyte');
       $checkexist = $find->findone(array('User ID' => $recipent));
       if(!empty($checkexist)){
       $sending =  array(
    "Recipients" =>  array($_SESSION["username"],$recipent),
    "content" => array(array(
    "from" => $_SESSION["username"],
    "to" => $recipent,
    "date sent" => date("F:d:Y"),
    "time sent" => date("h:i:a"),
    "message" => $message
        )));
       
       $collection->insert($sending);
       }else{
           echo '<script language="javascript">alert("No User Found");</script>';
       }
       header('Location: /User/inbox.php');
   }
        
   
?>