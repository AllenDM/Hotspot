<?php
session_start();
if(isset($_SESSION["loggedInUser"]))
{
 
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
                width: 100%;
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

        li {
        float: left;
        }
            #mymessage{
                background: red;
                left: 0;
                margin-left: 20px;
            }
               #message{
                background: silver;
                right:0;
                margin-right: 20px;
            }
            #mymessage, #message{
                border-radius: 25px;
                position: absolute;
                width: 40%;
                padding: 15px;
                border: 1px solid transparent;
                font-size: 16px;
            }
            #textbox{
                padding: 8px;
                position: fixed;
                bottom: 60px;
                background: white;
                border: 2px solid grey;
                height: 60px;
                width: 100%;
            }
            #textbox input{
                display: inline-block;
                float: left;
            }
            #textbox input[type = text]{
                width: 80%;
                height: 100%;
                border-radius: 25px;
                padding-left: 5px;
                background: transparent;
            }
             #textbox input[type = submit]{
                width: 20%;
                height:100%;
                right: 1cm;
                border-radius: 25px;
                background: grey;
                border: 1px solid grey;
                opacity: 1.6;
                color: white;
            }
     body {
        background-image: url("/User/misc/app.gif");
        background-repeat: repeat;
        background-size: 300vh; 100%;
        overflow: auto;
        }
            #messagebody{
                height: 80%;
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
    <li id = "hot"><a id= "navl2" href = "/User/activity.php"><img src ="/User/misc/hot.png"></a></li>
    <li id = "home"><a id= "navl3"href = "/User/index.php">
        <img src ="/User/misc/HotspotLogo.png" height ="32" width = "60"></a></li>
    <li id = "hot"><a class ="active" id= "navl4"href = "/User/inbox.php"><img src ="/User/misc/message.png"></a></li>
    <li id = "user"><a id= "navl5"href = "/User/Socialyte.php"><img src ="/User/misc/Socialyte.png"></a></li>
        </nav>             
          </ul><br/><br><br>
    </div>
<div id = "messagebody">
    <?php
        $messtread = $_GET["id"];
        $hot = new MongoClient();
        $db = $hot->selectDB('Hotspot');
        $collection = $db->selectCollection('message');
        $inbox = $collection->findone(array("_id" => new MongoID($messtread)));
        foreach($inbox["content"] as $message)
            if($message["from"] == $_SESSION["username"]){
    echo '<div id = "mymessage">';
    echo '<font size = "1"><b>'.$message["from"].'</b></font><br>';
    echo  '<p>' .$message["message"]. '</p>';
    echo  '<font size = "1" style = "position: absolute; right:6px;"><b>'.$message["time sent"].'</b></font><br>';
    echo '</div><br><br><br>';
    echo '<br><br><br>';
            }else{
    echo '<div id = "message">';
    echo '<font size = "1"><b>'.$message["from"].'</b></font><br>';
    echo  '<p>' .$message["message"]. '</p>';
    
    echo  '<font size = "1" style = "position: absolute; right:6px;"><b>'.$message["time sent"].'</b></font><br>';
    echo '</div><br><br><br>';
    echo '<br><br><br>';
            } 
    ?></div><br><br><br><br><br>
        <form id ="textbox" action = "/User/Messagesending.php?type=1&id=<?php echo $messtread ?>" method = "POST">
            <input type = "text" name = "message" placeholder = "  Enter message...">
            <input type = "submit" value = "Send">
    </form>
                <div id = "footer">
                    <nav>
                        <img src = "/User/misc/HotspotLogo.png"height = "42" width = "82">
                                </nav></div>    
    
    </body>
</html>

