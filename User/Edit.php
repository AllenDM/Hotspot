<?php
session_start();
if(isset($_SESSION["loggedInUser"]))
{
$mongoConn = new MongoClient();
$database = $mongoConn->selectDB('Hotspot');
$collection = $database->selectCollection('socialyte');

$user = $collection->findone(array('User ID' => $_SESSION["username"])); 
    
}
else{
    header('Location: /User/HotspotLogin.html');
}?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/User/css/bootstrap.min.css">
<link rel = "stylesheet" href="/User/js/bootstrap.min.js">

</head>
<body>
        <style>
                ::-webkit-scrollbar {
    width: 12px;
}
 
::-webkit-scrollbar-track {
    border-radius: 10px;
}
 
::-webkit-scrollbar-thumb {
    border-radius: 10px;
}
            input[type= text], input[type = email],input[type = password]{
                width: 4cm;
                background: transparent;
                border: 1px solid black;
                border-radius: 25px;
                padding-left: 5px;
            }
            body{
                top:2cm;
                overflow: auto;
            }
            first {
                height: 8cm;
                background: transparent;
                border: 1px solid black;
            }
            nav {
                list-style: none;
                 background: url("/User/misc/giphy.gif");
                background-size: 30% 100%;
            }

            #namelink{
                width: 1px;
                border: none;
                color: black;
                position: static;
                background: transparent; 
                text-decoration: none;
            }
             #home, #hot, #create, #user {
                width: 100%;
                border: 1px solid grey;
                display: inline-block;
                position: relative;
                float: left;    
                padding:12px;
                background: transparent;
            }
            #hot, #user, #create {
                height: 60px;
                width: 18.75%;
            }
            #home{
                height:60px;
                width: 25%;
            }
            #header a img{
                    position: absolute;
                    margin: auto;
                    top: 0;
                    left: 0;
                    right: 0;
                    bottom: 0;
            }
            #home:active,#hot:active, #create:active, #user:active {
                text-decoration: underline;
                background: transparent;
                border-top: 2px solid red;
            }
            #home:hover, #hot:hover, #create:hover,#user:hover {
                text-decoration: underline;
                background: red; 
            }
       
            #hot: visited, #home:visited, #create:visited, #user:visited {
                text-decoration: underline;
                background: red;   
            }
            #host:link {
                text-decoration: none;
            }

            #signout:link {
                text-decoration: none;
                color: white;
            }
            #signout:hover {
                color: white;
            }
            
            inbox{
                position: fixed;
                bottom: 6cm;
                padding-left: 4cm;
            }
            table, td {
                background: transparent;
                border: 1px solid transparent;
                border-collapse: collapse;
                width: device-width;
            }
            
            table td img {
                height: 200px;
                width: 140px;
                border-radius: 200%;
                border: 1px solid trasparent;
            }
            searchbar {
                position:fixed;
            }
            #flamed{
                border: 1px solid transparent;
                border-radius: 50%;
                background-image: url("/User/misc/giphy.gif"); 
                background-size: 150% 100%;
                color: white;
            }
            table{
                border: 3px solid transparent;
            }

            h1, p{
                text-shadow: 3px 3px 3px orange,5px 5px 5px red;
                color: black;
                border-bottom:4px solid black;
                width: 5cm;
            }
            #editbox{
                padding-left: 10px;
                height:40%;
                overflow: auto;
            }
            #editbox input{
                border: 1px solid black;
                box-shadow: 3px 3px 3px orange,5px 5px 5px red;
            }
         input[type = submit]{
         width: 70px; height: 20px;
         background-image: url("/User/misc/giphy.gif");
         background-size: 60%; 100%;
         color: White;
         padding-left: 5px;
     }
                 #footer{
                position: absolute;
                top: 0;
                width: 100%;
                border-bottom: 1px solid black;
            }
    </style>
    
                <div id = "header" data-position = "fixed">
      <ul id = "navi">
        <nav class = "navbar navbar-inverse navbar-fixed-bottom">
    <li id = "create"><a id= "navl1" href ="/User/createEvent.html"><img src ="/User/misc/create.png"></a></li>
    <li id = "hot"><a id= "navl2"href = "/User/activity.php"><img src ="/User/misc/hot.png"></a></li>
    <li id = "home"><a id= "navl3"href = "/User/index.php">
        <img src ="/User/misc/HotspotLogo.png" height ="32" width = "60"></a></li>
    <li id = "hot"><a id= "navl4" href = "/User/inbox.php"><img src ="/User/misc/message.png"></a></li>
    <li id = "user"><a class ="active" id= "navl5"href = "/User/Socialyte.php"><img src ="/User/misc/Socialyte.png"></a></li>
        </nav>         
          </ul><br/>
    </div> <div id = "editbox">
        <center><h1>Edit Profile</h1></center>
     <form role = "form" action = '/User/Register.php?type=2&do=info' method = 'POST' > 
 <input type = "text" id = "username" name= "username" placeholder = "Username" value ="<?php echo $user["User ID"] ?>" required> <br/> <br/>
 <input type = "text" id = "first" name= "first" placeholder = "First name" value ="<?php echo $user["first name"] ?>"required>
 <input type = "text" id = "last" name= "last" placeholder = "Last name"value ="<?php echo $user["last name"] ?>"required><br/><br/>
   <input type = "text" id = "city" name = "city" placeholder = "City" value ="<?php echo $user["location"]["city"] ?>"required>
    <input type = "text" id = "state" name = "state" placeholder = "State" value ="<?php echo $user["location"]["state"] ?>" required><br/><br/>
    <input type = "text" id = "zipcode" name = "zipcode" placeholder = "Zip code" value ="<?php echo $user["location"]["zip code"] ?>" required><br/><br/>
         <input type = "submit"id = "register" value = "Update"> </form>
         <center><p><font size = "4">Password</font></p></center>
         <form role = "form" action = '/User/Register.php?type=2&do=pw' method = 'POST' >
    <input type = "password" id = "password" name = "oldpassword" placeholder = "Old Password"required><br><br>
    <input type = "password" id = "password" name = "password" placeholder = "New Password"required><br><br>
     <input type = "submit" id = "register" value = "Update">     
        </form>
           <center><p><font size = "4">Profile Picture</font></p></center>
    <form action = "/User/Register.php?type=2&do=pic" method = "POST">
    <input type = "file" id = "fileupload" name = "fileupload" accept = "image/x-png, image/gif, image/jpeg"><br>
        <input type = "submit"id = "register" value = "Update">  
        <a href = "/User/Socialyte.php" style = "text-decoration: none; "><font color = "black" style = "text-shadow:3px 3px 3px orange,5px 5px 5px red; ">Cancel</font></a>
    </form></div>

                <div id = "footer">
                    <nav>
                        <img src = "/User/misc/HotspotLogo.png"height = "42" width = "82">
                                </nav></div>
    
        <br/><br/>
</body>
   
</html>