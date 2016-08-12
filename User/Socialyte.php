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
<!DOCTYPE HTML5 PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
	background: #ededed url(/User/misc/warm.png) no-repeat 9px center;
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

        #searchbar input[type=search] {
	    width: 60%;
	    padding-left: 20px;
	    color: black;
	    cursor: pointer;
        top: 5px;
        left:3px;
        }javascript:void(0)
            

            
    #searchbar input:-moz-placeholder {
	    color: silver;
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
          #signout, #edit{
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
            h1 {
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
         #footer{
                position: absolute;
                top: 0;
                width: 100%;
                border-bottom: 1px solid black;
            }
            #infotable:nth-child(1){
                background: silver;
            }
            #infotable{
                border: 2px solid black;
                color: black;
                width: 75%;
            }
            #infotable td:nth-child(1){
                background: silver;
            }
            #infotable td:nth-child(2){
                background: white;
                color: black;
            }
          #infotable th{
                background: black;
              color: silver;
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
    <li id = "user"><a class ="active" id= "navl5"href = "/User/Socialyte.php"><img src ="/User/misc/Socialyte.png"></a></li>
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

$user = $collection->findone(array('_id' => $_SESSION["loggedInUser"])); 
        echo '<h1>'.$user["User ID"].  '</h1>';
    ?>
            </div></center>
        <aside>
        <section id = "info">
           <img src = "/User/misc/none.jpg" style = "height:70px;width:60px;border:2px double black;"><br><br>
            <ul id = "infotab">
            <li ><a class="active" href="/User/Socialyte.php">Main</a></li>
            <li><a href="/User/SocialyteEvents.php">Events</a></li>
            <li><a href="SocialyteMatch.php">Matchbox</a></li>
            </ul>
            <br>
          
                <input type = "button"id ="edit" value = "Edit Profile" onclick = "window.location.href = '/User/Edit.php'"><br>
                <input type = "button"id ="signout" value = "Sign out" onclick = "window.location.href = '/User/signout.php'">
            
            </section>
        </aside><br>
    <center>
          <table id = "infotable">
              <thead>
                  <th colspan ="2">  <h4>  About Socialyte</h4></th>
              </thead>
              <tbody>
  <tr><td>Name:  </td><td><?php echo $user["first name"]. ' '.$user["last name"] ?></td></tr>
  <tr><td>Location:  </td><td><?php echo $user["location"]["city"]. ' '.$user["location"]["state"].", " .$user["location"]["zip code"] ?></td></tr>
  <tr><td>Race:  </td><td><?php echo $user["race"] ?></td></tr>
  <tr><td>Gender:  </td><td><?php echo $user["gender"] ?></td></tr>
  <tr><td>Birthday:  </td><td><?php echo $user["birthday"] ?></td></tr>
  
              </tbody>
    </table>
    </center>
    <br/><br/>
    
</body>
    <script>
    </script>
</html>