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
    height:85vh;
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
             #etable{
                height: 360px; 
                width:250px;
                float:left;
                text-align: center;
            }
            thead,tbody {
                display: block;
            }
            tbody {
                width: 260px;
                height: 230px;
                overflow-y: auto;
            }
            h1, h2 {
                text-shadow: 3px 3px 3px orange,5px 5px 5px red;
                color: white;
                border-bottom: 4px solid black;
                width: 100%;
            }
            h1{
                margin-left: 15px;
            }
            h2{
                background: silver;   
            }
            input[type=search]{
                width: 90px;
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
    <li id = "user"><a class ="active"id= "navl5"href = "/User/Socialyte.php"><img src ="/User/misc/Socialyte.png"></a></li>
        </nav>           
          </ul><br><br>
    </div> 
         <?php
       echo '<aside>';
       echo '<section id = "info">';
       echo     '<ul id = "infotab">';
       echo     '<li><a  href="/User/eventview.php?name='.$ename.'&user='.$host.'">View</a></li>';
       echo     '<li ><a href="/User/eventedit.php?name='.$ename.'&user='.$host.'">Edit</a></li>';
       echo     '<li><a class="active" href="/User/eventattendance.php?name='.$ename.'&user='.$host.'">attendence</a></li>';
       echo '<br><center><img src = "/User/misc/none.jpg" style = "height:100px;width:70px;border:4px double black;"><br><br></center>';
       echo     '</ul></section></aside>';
            ?>
          <div id ="etable">
              <thead>
                  <h1><font color = "black">Attending</font></h1></thead>
        <div class="container">        
  <table class="table table-hover">
    <tbody>
       <tr><td><form id="searchbar" action = "/User/match.php?type=4&event=<?php echo $ename ?>" method = "post">
           <input type="search" name = "search" placeholder="Search...."></form></td><td>Invite</td></tr>
<?php
        global $count;
        global $y;
$event = $_GET["name"];
   // connect to mongodb
   $hot = new MongoClient();
  // echo "Connection to database successfully";
   // select a database
   $db = $hot->selectDB('Hotspot');
   //echo "Database mydb selected";
   $eventcollection = $db->selectCollection('events');
   $events = $eventcollection->findone(array("_id" => new MongoId($ename))); 
        $count = 0;
        foreach($events["attending"] as $num){
            $count++;
        }
   for($y = 0; $y < $count; $y++) { 
      echo '<tr><td><a href = "/User/otherSocialyte.php?name='.$events["event organizer"].'" style = "text-decoration: none;"><font color = "black" size = "4">'.$events["attending"][$y].'</font></a></td>';
        echo  '<td><a id ="remove" href = "/User/match.php?type=2&name='.$events["attending"][$y].'&event='.$events["_id"].'"> Remove</a></td></tr>';
   }
        
           ?>
              </tbody>
  </table>
</div>    
              
                         
          <div id ="etable">
            <thead>
                  <h1><font color = "black">Groups Attending</font></h1></thead> 
        <div class="container">        
  <table class="table table-hover">
     
   <tbody>
       <tr><td><form id="searchbar" action = "/User/match.php?type=5&event=<?php echo $ename ?>" method = "post">
           <input type="search" name = "search" placeholder="Search...."></form></td><td>Invite</td></tr>
<?php
        global $count2;
        global $y;
   // connect to mongodb
   $hot = new MongoClient();
  // echo "Connection to database successfully";
   // select a database
   $db = $hot->selectDB('Hotspot');
   //echo "Database mydb selected";
   $eventcollection = $db->selectCollection('events');
   $events = $eventcollection->findone(array("_id" => new MongoId($ename))); 
        $count2 = 0;
        foreach($events["groups"] as $num){
            $count2++;
        }
   for($y = 0; $y < $count2; $y++) { 
      echo '<tr><td><a href = "grouplist.php?id='.$events["groups"][$y].'&x='.$y.'" style = "text-decoration: none;"><font color = "black" size = "4">'.$events["groups"][$y].'</font></a></td>';
      echo  '<td><a id ="remove" href = "/User/match.php?type=3&name='.$events["groups"][$y].'&event='.$events["_id"].'"> Remove</a></td></tr>';
   }
       
           ?>
          </tbody>   
  </table>
              </div>    </div> </div>      
              <div id = "footer">
                    <nav>
                        <img src = "/User/misc/HotspotLogo.png"height = "42" width = "82">
                        <font color = "red"size ="4"><b><?php echo $events["name"]; ?></b></font>
              </nav></div></div>
    
              <br/><br/>
</body>   
</html>