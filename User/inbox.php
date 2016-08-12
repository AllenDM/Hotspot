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
                overflow: hidden;
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
            input[type=search] {
	background: #ededed url(http://static.tumblr.com/ftv85bp/MIXmud4tx/search-icon.png) no-repeat 9px center;
	border: solid 1px #ccc;
	padding: 9px 10px 9px 32px;
	width: 55px;
	-webkit-border-radius: 10em;
	-moz-border-radius: 10em;
	border-radius: 10em;
	-webkit-transition: all .5s;
	-moz-transition: all .5s;
	transition: all .5s;
}
  input[type=search] {
	-webkit-appearance: textfield;
	-webkit-box-sizing: content-box;
	font-family: inherit;
	font-size: 100%;
}
            
            /* Search Bar */
        #searchbar input[type=search] {
	    width: 15px;
	    padding-left: 10px;
	    color: transparent;
	    cursor: pointer;
        position: fixed;
        top: 60px;
        left:3px;
}
        #demo-2 input[type=search]:hover {
	    background-color: silver;
}
        #searchbar input[type=search]:focus {
	    width: 200px;
	    padding-left: 32px;
	    color: black;
	    background-color: transparent;
	    cursor: auto;
}
    #searchbar input:-moz-placeholder {
	    color: silver;
}
    #searchbar input::-webkit-input-placeholder {
	    color: transparent;
}
            #mes:hover{
                text-decoration:none;
            }
            #newmes{
                text-decoration: none;
                position: relative;
                margin: auto;
                left: 150px;
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
    <li id = "hot"><a id= "navl2" href = "/User/activity.php"><img src ="/User/misc/hot.png"></a></li>
    <li id = "home"><a id= "navl3"href = "/User/index.php">
        <img src ="/User/misc/HotspotLogo.png" height ="32" width = "60"></a></li>
    <li id = "hot"><a class ="active" id= "navl4"href = "/User/inbox.php"><img src ="/User/misc/message.png"></a></li>
    <li id = "user"><a id= "navl5"href = "/User/Socialyte.php"><img src ="/User/misc/Socialyte.png"></a></li>
        </nav>             
          </ul><br/>
    </div>
    <br/>
    <div class="container"> 
  <table class="table table-hover">
    <thead>
      <tr>
        <th style = "width:180px;">Inbox
          <a id = "newmes"href ="newMessage.php">+ new</a></th>
      </tr>
    </thead>
    <tbody>
  <?php
   // connect to mongodb
   $hot = new MongoClient();
   //echo "Connection to database successfully";
        $db = $hot->selectDB('Hotspot');
        $collection = $db->selectCollection('message');
        $cursor = $collection->find(array("Recipients"=> $_SESSION["username"] ));
        global $count;
        foreach($cursor as $inbox){
          $count = 0;
      echo '<tr><td><a id = "mes" href = "/User/Message.php?id='.$inbox["_id"].'"><font color = "black"><b>';
            foreach($inbox["content"] as $num){
                $count++;
            }
            $count--;
       foreach($inbox["Recipients"] as $rec){
         if($rec != $_SESSION["username"]){
           echo $rec;
           echo " ";
         }} 
      echo '</b><br>';
      echo '<b>'.$inbox["content"][$count]["from"].': </b>';
      echo  $inbox["content"][$count]["message"];
      echo '</a></td></tr>';
       }
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