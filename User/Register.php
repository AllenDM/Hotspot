<?php
session_start();
/*
 * To change this template use Tools | Templates.
 */



   // connect to mongodb
   $hot = new MongoClient();
  // echo "Connection to database successfully";
	$type = $_GET["type"];
   // select a database
   $db = $hot->selectDB('Hotspot');
   //echo "Database mydb selected";
   $collection = $db->selectCollection('socialyte');
   //echo "Collection selected succsessfully";
   if($type == "1"){
$first = isset($_POST["first"])? $_POST["first"] : "";
$last = isset($_POST["last"])? $_POST["last"] : "";
$email = isset($_POST["email"])? $_POST["email"] : "";
$username = isset($_POST["username"])? $_POST["username"] : "";
$Gender = isset($_POST["Gender"])? $_POST["Gender"] : "";
$race = isset($_POST["race"])? $_POST["race"] : "";
$city = isset($_POST["city"])? $_POST["city"] : "";
$state = isset($_POST["State"])? $_POST["State"] : "";
$zipcode = isset($_POST["zipcode"])? $_POST["zipcode"] : "";
$password = isset($_POST["password"])? $_POST["password"] : "";
$birthday = isset($_POST["bday"])? $_POST["bday"] : "";
   $usernameused = $collection->findone(array('User ID' => $username ));
   $emailcheck = $collection->findone(array('login.email' => $email));
   if(!empty($usernameused)){
     echo 'Username '.$username. 'already exist!<br>'; 
     header("Location: /User/Register.html");
   }elseif(!empty($emailcheck)){
       echo 'Email '.$email. 'already exist!<br>';
       header("Location: /User/Register.html");
   } else{
	
   $socialyte = array( 
       "User ID" => $username,
       "first name" => $first, 
       "last name" => $last, 
       "login" => array(
       "email" => $email,      
       "password" => $password,
      ),
       "location" =>array( 
       "city" => $city,
       "state" => $state,
       "zip code" => $zipcode,
      ),
       "race" => $race,
       "gender" => $Gender,
       "birthday" => $birthday,
       "groups" => []
   );

$collection ->insert($socialyte);
$new = $collection->findone(array('login.email' => $email));
   //echo "Socialyte inserted successfully";
    $_SESSION["city"] = $new["location"]["city"];
    $_SESSION["state"] = $new["location"]["state"];
    $_SESSION["loggedInUser"] = $new["_id"];  
    $_SESSION["username"] = $new["User ID"];
    echo 'successful';
header('Location: /User/index.php');
       
       
   }}elseif($type == "2"){
       $do = $_GET["do"];
       if($do == "info"){
$first = isset($_POST["first"])? $_POST["first"] : "";
$last = isset($_POST["last"])? $_POST["last"] : "";
$city = isset($_POST["city"])? $_POST["city"] : "";
$state = isset($_POST["state"])? $_POST["state"] : "";
$username = isset($_POST["username"])? $_POST["username"] : "";
$zipcode = isset($_POST["zipcode"])? $_POST["zipcode"] : "";
         $usernameused = $collection->findone(array('User ID' => $username ));
   if(!empty($usernameused) && $usernameused["User ID"] != $_SESSION["username"]){
     echo 'Username '.$username. 'already exist!<br>'; 
    header("Location: /User/Edit.php"); 
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
$collection->update(array('_id'=> $_SESSION["loggedInUser"]),$socialyte);
$user = $collection->findone(array('_id'=>$_SESSION["loggedInUser"]));
   //echo "Socialyte inserted successfully";
    $_SESSION["city"] = $user["location"]["city"];
    $_SESSION["state"] = $user["location"]["state"];  
    $_SESSION["username"] = $user["User ID"];
    echo 'successful';
header('Location: /User/Socialyte.php'); 
       
}}elseif($do == "pw"){
   $user = $collection->findone(array('_id'=>$_SESSION["loggedInUser"]));
    $oldpassword = isset($_POST["oldpassword"])? $_POST["oldpassword"] : "";
    $password = isset($_POST["password"])? $_POST["password"] : "";
  if(!empty($password) && $oldpassword == $user["login"]["password"]){
     $collection->update(array('_id'=> $_SESSION["loggedInUser"]), array('$set'=>array('login.password'=> $password)));
     header('Location: /User/Socialyte.php');
  }else{
        header("Location: /User/Edit.php");}        
}elseif($do == "pic"){}
   }  
?>