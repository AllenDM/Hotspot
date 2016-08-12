<!--
To change this template use Tools | Templates.
-->
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
                width: device-width;
                border: 1px solid red;
            }
            body{
                overflow: auto;
            }
            first {
                height: 8cm;
                background: transparent;
                border: 1px solid black;
            }
           #navi nav {
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
                 
             #footer{
                width: 100%;
                height: 49px;
                background: url("/User/misc/giphy.gif");
                background-size: 20% 100%;
                position: absolute;
                top: 0;
                width: 100%;
                border-bottom: 1px solid black;
            }
            table td img {
                height: 200px;
                width: 140px;
                border-radius: 200%;
                border: 1px solid trasparent;
            }

                                 /*searchbar*/
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
        #searchbar input[type=search] {
	    width: 15px;
	    padding-left: 10px;
	    color: transparent;
	    cursor: pointer;
        top: 5px;
        left:3px;
        }javascript:void(0)
            
        #demo-2 input[type=search]:hover {
	    background-color: silver;
        }
            
        #searchbar input[type=search]:focus {
	    width: 150px;
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
    #info {
    line-height:30px;
    background-color:silver;
    height:90vh;
    width:80px;
    float:left;
    padding:8px;
    text-shadow: 3px 3px 3px orange,5px 5px 5px red;
    color:white;
            }
          #Message{
                color: white;
                width: 60px;
                height: 27px;
                border: 1px solid silver;
                border-radius: 20%;
                background-image: url("/User/misc/giphy.gif"); 
                background-size: 150% 100%;
                text-shadow: 3px 3px 3px orange,5px 5px 5px red;  
                font-size: 70%;
            }
            #headname{
                background: black;
                height: 50px;
                width: device-width;
            }   
            h1, h2 {
                text-shadow: 3px 3px 3px orange,5px 5px 5px red;
                color: white;
            }


            #infotab {           
            list-style-type: none;
            overflow: auto;
            padding:0px;
            }
            li a.active {
            background-image: url("/User/misc/giphy.gif"); 
            background-size: 150% 100%;
            color: white;
            }
            li a.visited {
            background-color: black;
            color: white;
            }
            li a:hover:not(.active) {
            background-color: black;
            color: white;
            }
            #infotab li a {
            display: block;
            color: white;
            text-decoration: none;
            border-bottom: 2px solid black;
            }
            iframe{
                border: 1px solid black;
            }
            #etable{
                width:220px;
                float:left;
                padding:10px;
                text-align: center;
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
    <li id = "hot"><a id= "navl4"href = "/User/inbox.php"><img src ="/User/misc/message.png"></a></li>
    <li id = "user"><a id= "navl5"href = "/User/Socialyte.php"><img src ="/User/misc/Socialyte.png"></a></li>
        </nav>             
          </ul><br/>
    </div>      
   
                                <div id = "footer">   
                    <nav>                   
                            <img src = "/User/misc/HotspotLogo.png"height = "42" width = "82"> 
                            </nav>
       </div>
    

        <center> <div id = "headname">
                       <?php
            $mongoConn = new MongoClient();
$database = $mongoConn->selectDB('Hotspot');
$collection = $database->selectCollection('socialyte');
$clicked = $_GET["name"];
$user = $collection->findone(array('User ID' => $clicked)); 
        echo '<h1>'.$user["User ID"].  '</h1>';
    ?>
            </div></center>
          <aside>
            
       <section id = "info">
         <img src = "/User/misc/none.jpg" style = "height:70px;width:60px;border:2px double black;"><br><br>
           <ul id = "infotab">
           <li ><a href="/User/otherSocialyte.php?name=<?php echo $user["User ID"] ?>">Main</a></li>
          <li><a  class="active" href="/User/otherSocialyteEvents.php?name=<?php echo $user["User ID"] ?>">Events</a></li>
           <li><a href="/User/otherSocialyteMatch.php?name=<?php echo $user["User ID"] ?>">Matchbox</a></li>
           </ul>
          <br>
          
          <input type = "button"id ="Message" value = "Message" onclick = "window.location.href = '/User/directMessage.php?to=<?php echo $user["User ID"] ?>'"><br>
            </section>
                    
        </aside>
        
    
    <center>
  <div id ="etable">
        <h2><font color = "black">Events</font></h2>
        <div class="container">        
  <table class="table table-hover">
    <tbody>
  <?php
   // connect to mongodb
   $hot = new MongoClient();
  // echo "Connection to database successfully";
	
   // select a database
   $db = $hot->selectDB('Hotspot');
   //echo "Database mydb selected";
   $collection = $db->selectCollection('events');
   //echo "Collection selected succsessfully";
	$cursor = $collection->find(array('event organizer' => $user["User ID"]));
    $cursor->sort(array('created time' => -1));
   foreach ($cursor as $document) { 
      echo '<tr><td><a href = "/User/viewevent.php?name='.$document["_id"].'&user='.$document["event organizer"].'" style = "text-decoration: none;"><font color = "black" size = "4">'.$document["name"].'</font></a></td></tr>';
   }
?>

      </tbody>
  </table>
      </div></div>
    </center>
</body>
</html>