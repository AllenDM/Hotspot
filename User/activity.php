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
            input[type= text]{
                width: 4cm;
                border: 1px solid red;
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

            #flamed{
                border: 1px solid transparent;
                border-radius: 50%;
                background-image: url("/User/misc/giphy.gif"); 
                background-size: 150% 100%;
                color: white;
            }
      #actnav {
    width: 100vh;
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: black;
    color: white;
    position: fixed;
}

li {
    float: left;
}
      #actnav {
    width: 100%;
    list-style-type: none;
    top: 43px;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: black;
    color: white;
    position: absolute;
}

li {
    float: left;
}

#nava {
    display: block;
    color: white;
    text-align: center;
    padding: 4px;
    text-decoration: none;
    border: 1px solid grey;
    display: block;
    color: white;
    text-decoration: none;         
}
            #nav1{
                width:50%;
            }

            #accept, #decline{
                margin-left: 25px;
            }
       #nava.active {
            background-image: url("/User/misc/giphy.gif"); 
            background-size: 150% 100%;
            color: white;
           border-bottom: 2px solid red;
            }
                   #footer{
                position: absolute;
                top: 0;
                width: 100%;
                border-bottom: 1px solid black;
            }
    </style>
    <div id = "timeline">
                <div id = "header" data-position = "fixed">
      <ul id = "navi">
        <nav class = "navbar navbar-inverse navbar-fixed-bottom">
    <li id = "create"><a id= "navl1" href ="/User/createEvent.html"><img src ="/User/misc/create.png"></a></li>
    <li id = "hot"><a id= "navl2"class ="active" href = "/User/activity.php"><img src ="/User/misc/hot.png"></a></li>
    <li id = "home"><a id= "navl3"href = "/User/index.php">
        <img src ="/User/misc/HotspotLogo.png" height ="32" width = "60"></a></li>
    <li id = "hot"><a id= "navl4"href = "/User/inbox.php"><img src ="/User/misc/message.png"></a></li>
    <li id = "user"><a id= "navl5"href = "/User/Socialyte.php"><img src ="/User/misc/Socialyte.png"></a></li>
        </nav>         
          </ul><br/><br>
    </div> 
      <ul id = "actnav">
        <nav id = "anav">
            <li id = "nav1"><a class = "active" id= "nava"href = "/User/activity.php">Activity</a></li>
            <li id = "nav1"><a id= "nava"href = "/User/MEactivity.php">My Events</a></li>
        </nav>         
          </ul><br><br>
    <div class="container"> 
  <table class="table table-hover">
    <thead>
    </thead>
    <tbody>
  <?php
   // connect to mongodb
   $hot = new MongoClient();
   //echo "Connection to database successfully";
        $db = $hot->selectDB('Hotspot');
        $collection = $db->selectCollection('announcements');
        $cursor = $collection->find(array("type" => "Activity","recipient"=> $_SESSION["username"] ));
        foreach($cursor as $announce){
        if($announce["about"] == "event"){
        $event = $collection->findone(array('_id'=> new MongoID($announce["pertaining"])));
      echo '<tr><td><a href = "/User/viewevent.php?name='.$announce["pertaining"].'&user='.$event["event organizer"].'"><font color = "black">'.$announce["message"].'</a></td></tr>';
        }elseif($announce["about"] == "matchbox"){
           echo '<tr><td><a href = "/User/SocialyteMatch.php"><font color = "black">'.$announce["message"].'</a></td></tr>'; 
        }elseif($announce["about"] == "account"){
           echo '<tr><td><a href = "/User/Socialyte.php"><font color = "black">'.$announce["message"].'</a></td></tr>';
        }elseif($announce["about"] == "invite"){
         $event = $collection->findone(array('_id'=> new MongoID($announce["pertaining"])));
         if($announce["message"]["status"] == "pending"){
         echo '<tr><td><a href = "/User/viewevent.php?name='.$announce["pertaining"].'&user='.$event["event organizer"].'"><font color = "black">'.$announce["message"]["message"].'</a>';
         echo '<a id = "accept" href ="/User/attend.php?name='.$announce["_id"].'&invite=accept&invited='.$event["event organizer"].'&about='.$announce["pertaining"].'"><font color = "green">Accept</font></a>';
         echo '<a id = "decline" href = "/User/attend.php?name='.$announce["_id"].'&invite=decline&invited='.$event["event organizer"].'&about='.$announce["pertaining"].'"><font color = "red">Decline</font></a></td></tr>';    
        }elseif($announce["message"]["status"] == "accept"){
                 echo '<tr><td><a href = "/User/viewevent.php?name='.$announce["pertaining"].'&user='.$event["event organizer"].'"><font color = "black">'.$announce["message"]["message"].'</a>';
         echo '<a id = "accept"><font color = "green">Accepted</font></a></td></tr>';        
         }elseif($announce["message"]["status"] == "decline"){
                echo '<tr><td><font color = "black">'.$announce["message"]["message"].'</a>';
         echo '<a id = "decline"><font color = "red">Declined</font></a></td></tr>';    
        }}}
        ?>
      
      </tbody>  
          </table>
    </div>
                <div id = "footer">
                    <nav>
                        <img src = "/User/misc/HotspotLogo.png"height = "42" width = "82">
                                </nav></div>
    
        <br/><br/></div>
</body>
   
</html>