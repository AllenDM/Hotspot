<?php
session_start();
if(isset($_SESSION["loggedInUser"]))
{
 
}
else{
    header('Location: /User/HotspotLogin.html');
}
$ename = $_GET["name"];
$host = $_SESSION["username"];
?>

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
    #info {
    line-height:30px;
    background-color:silver;
    height:145vh;
    width:90px;
    float:left;
    padding:8px;
    text-shadow: 3px 3px 3px orange,5px 5px 5px red;
    color:white;
    font-size: 3; 
    overflow: hidden;
            }
             #infotab {           
            list-style-type: none;
            overflow: auto;
            padding:0px;
            }
           #info li a:hover:active {
            background-color: black;
            color: white;
            }
          #info li a.active {
                background: transparent;
                border-right: 6px solid red;
            color: white;
            }
          #info li a:hover:not(.active) {
            background-color: black;
            color: white;
            }
           #infotab li a {
            display: block;
            color: white;
            text-decoration: none;
            border-bottom: 2px solid black;
            }
                        
              p {
                text-shadow: 3px 3px 3px orange,5px 5px 5px red;
                color: black;
                border-bottom:4px solid black;
                width: 100%;
                background: silver;
            }
                         p1{
                text-shadow: 3px 3px 3px orange,5px 5px 5px red;
                color: black;
               width: 100%;              
            }
            h1{
                text-shadow: 3px 3px 3px orange,5px 5px 5px red;
                color: black;
                border-bottom:4px solid red;
               
            }
          p,h1,p1,h2{
                width: 100%;
            }
                    #footer{
                position: absolute;
                top: 0;
                width: 100%;
                border-bottom: 1px solid black;
            }
            #commentbox textarea{
                width: 90%;
                height: 2cm;
                resize: none;
                margin-left: 5%;
            }

            #commtable{
               width: 72%;
               background: silver;
            }
            #commentbox input[type = submit]{
               background: black;
               box-shadow: 3px 3px 3px orange,5px 5px 5px red;
               color: white;
            }
    tbody {
    height: 35px;
    display: block;
    overflow-y: hidden;
    overflow-x: hidden;
    }
    ::-webkit-scrollbar {
    width: 12px;
}
 
::-webkit-scrollbar-track {
    border-radius: 10px;
}
 
::-webkit-scrollbar-thumb {
    border-radius: 10px;
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
    <li id = "hot"><a id= "navl4"href = "/User/inbox.php"><img src ="/User/misc/message.png"></a></li>
    <li id = "user"><a class ="active" id= "navl5"href = "/User/Socialyte.php"><img src ="/User/misc/Socialyte.png"></a></li>
        </nav>             
          </ul><br/><br>
    </div> 
         <?php
       echo '<aside>';
       echo '<section id = "info">';
       echo     '<ul id = "infotab">';
       echo     '<li><a class="active" href="/User/eventview.php?name='.$ename.'&user='.$host.'">View</a></li>';
       echo     '<li ><a href="/User/eventedit.php?name='.$ename.'&event='.$host.'">Edit</a></li>';
       echo     '<li><a href="/User/eventattendance.php?name='.$ename.'&user='.$host.'">attendence</a></li>';
       echo '<br><center><img src = "/User/misc/none.jpg" style = "height:100px;width:70px;border:4px double black;"><br><br></center>';
       echo     '</ul></section></aside>';
            ?>
        <center><h1><b>View Event</b></h1></center>
<?php
   
   // connect to mongodb
   $hot = new MongoClient();
  // echo "Connection to database successfully";
   // select a database
   $db = $hot->selectDB('Hotspot');
   //echo "Database mydb selected";
   $eventcollection = $db->selectCollection('events');
   $events = $eventcollection->findone(array("_id" => new MongoId($ename))); 
        echo '<center><p><b>Invitation type: </b></p><font color = "black">'.$events["invitation"].'</font><br></center>';
        echo '<center><br><img src = "/User/misc/none.jpg" style = "height:200px;width:200px;border:2px double black;box-shadow:3px 3px 3px orange,5px 5px 5px red"><br><br></center>';
        echo '<center><p>Info</p></center>';
        echo '<b><font style = "text-shadow: 3px 3px 3px orange,5px 5px 5px red;"> Location: </font></b>' .$events["location"]["address"]. '<br>';
         echo '<b><font style = "text-shadow: 3px 3px 3px orange,5px 5px 5px red;"> City: </font></b>' .$events["location"]["city"].', '.$events["location"]["state"].'<br>';
        echo '<b><font style = "text-shadow: 3px 3px 3px orange,5px 5px 5px red;"> Cost: </font></b>'.$events["cost"].'<br>';
        echo '<b><font style = "text-shadow: 3px 3px 3px orange,5px 5px 5px red;"> Music: </font></b>'.$events["music"].'<br>';
        echo '<b><font style = "text-shadow: 3px 3px 3px orange,5px 5px 5px red;"> Food: </font></b>'.$events["food"].'<br>';
        echo '<b><font style = "text-shadow: 3px 3px 3px orange,5px 5px 5px red;"> Time: </font></b>'.$events["time"].'<br>';
        echo '<b><font style = "text-shadow: 3px 3px 3px orange,5px 5px 5px red;"> Date: </font></b>'.$events["date"].'<br>';              
        echo '<b><font style = "text-shadow: 3px 3px 3px orange,5px 5px 5px red;"> Attire: </font></b>'.$events["attire"].'<br>';
        echo '<b><font style = "text-shadow: 3px 3px 3px orange,5px 5px 5px red;"> Drinks: </font></b>'.$events["drinks"].'<br>';
        echo '<b><font style = "text-shadow: 3px 3px 3px orange,5px 5px 5px red;"> Attendence: </font></b>'.$events["attendence"].'<br>';
        $event = $events["name"]; 
?> <br>
        <center>
        <div id = "commentbox">
            <table id = "commtable">
                <th><p>Comments </p></th>
              <tbody id = "combody"style = "overflow-y:scroll;">  
   <?php $count= 0;
   foreach($events["comments"] as $com){ $count++;} 
    for($y = 0; $y < $count; $y++){
    echo '<tr><td><a href = "/User/otherSocialyte.php?name='.$events["comments"][$y]["commenter"].'">';
    echo '<font style = "color:black;text-shadow: 3px 3px 3px orange,5px 5px 5px red;">'.$events["comments"][$y]["commenter"].'</font>';
    echo ': </a>'.$events["comments"][$y]["comments"].'</td>';
    echo '<td><a href = "indexbuttons.php?type=removecomments&pid='.$ename.'&which='.$y.'"><font color = "red">x</font></td></tr>';
    }       ?>
                </tbody><br><br><tfoot>
     <tr><td><form id = "comments" action = "indexbuttons.php" action = "post">
         <input type = "hidden"  name = "type" value ="comments"><input type = "hidden" name = "pid" value = "<?php echo $ename ?>">
       <textarea  form = "comments" name = "comments" placeholder = "Comment event here...."></textarea><br><input type ="submit" value = "send">
         </form></td></tr></tfoot></table>
            </div> </center>
                <div id = "footer">
                    <nav>
                        <img src = "/User/misc/HotspotLogo.png"height = "42" width = "82">
                        <font color = "red"size ="4"><b><?php echo $events["name"]; ?></b></font>
                                </nav></div>
    
            <br/><br/></div>
</body>   
</html>