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
            input[type= text],input[type = password], input[type = time],
            input[type = date],input[type = number],input[list]{
                background: transparent;
                border: 1px solid grey;
                border-radius: 25px;
                padding-left: 5px;
            }
            input[type = time],input[type = date],input[list]{
                width: 3cm;
            }
            input[type = number]{
                width: 2cm;
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
    height:180vh;
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
            #city, #state{
                width: 90px;
            }
                input[type = submit]{
                height: 30px;
                width: 50px;
                border: 1px solid transparent;
                border-radius: 50%;
                background-image: url("/User/misc/giphy.gif");
                background-size: 150% 100%;
                color: white;
                font-size: 90%;
                box-shadow: 1px 1px 1px 1px red,2px 2px 2px 2px orange;
            }
            #in input{
                border:2px solid silver;
                padding: 7px;
            }
            #in{
                padding left: 80px;
            }
             h1, p{
                text-shadow: 3px 3px 3px orange,5px 5px 5px red;
                color: black;
                border-bottom:4px solid black;
                width: 100%;
            }
             p1{
                text-shadow: 3px 3px 3px orange,5px 5px 5px red;
                color: black;
            }
            p{
                background: silver;
                width: 100%;
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
    <li id = "user"><a class ="active" id= "navl5"href = "/User/Socialyte.php"><img src ="/User/misc/Socialyte.png"></a></li>
        </nav>             
          </ul>
    </div> <br><br>
        <?php
       echo '<aside>';
       echo '<section id = "info">';
       echo     '<ul id = "infotab">';
       echo     '<li><a  href="/User/eventview.php?name='.$ename.'&user='.$host.'">View</a></li>';
       echo     '<li ><a class="active" href="/User/eventedit.php?name='.$ename.'&user='.$host.'">Edit</a></li>';
       echo     '<li><a href="/User/eventattendance.php?name='.$ename.'&user='.$host.'">attendence</a></li>';
       echo '<br><center><img src = "/User/misc/none.jpg" style = "height:100px;width:70px;border:4px double black;"><br><br></center>';  
       echo     '</ul></section></aside>';    
            ?>
        
<?php
$event = $_GET["name"];
   // connect to mongodb
   $hot = new MongoClient();
  // echo "Connection to database successfully";
   // select a database
   $db = $hot->selectDB('Hotspot');
   //echo "Database mydb selected";
   $eventcollection = $db->selectCollection('events');
   $events = $eventcollection->findone(array("_id" => new MongoId($ename))); 
   $_SESSION["CurrentEvent"] = $events["_id"];     
        ?>
        
        <div id ="in">
         <h1><center>Edit Event</center></h1>
            <button style = "background: black;border-radius:15%;margin-left:5px;" onclick="popup()"><font color = "red">Cancel Event</font></button><br> <p3 id="can"></p3>
            <center><p>Invitation Type </p></center>
            <form role = "form" action = '/User/modifyEvent.php?ftype=1' method = 'POST' >
            <?php echo '<p1><b>Current type: </b></p1>'.$events["invitation"].'<br>';?>
                     <select name = "type">
                      <option value="open-invitation">open invitation</option>
                      <option value="invitation-only">invitation only</option>
                </select><br><input type = "submit" value ="update"></form><br>
            <center><p>Media</p></center>
        <form role = "form" action = '/User/modifyEvent.php?ftype=2' method = 'POST' >
        <input type = "file" id = "fileupload" name = "fileupload" onchange = "uploadpic()" style ="display: none"> 
        <center><br><img src = "/User/misc/none.jpg" onclick = "myFunction()" style = "height:100px;width:100px;border:2px double black;box-shadow:3px 3px 3px orange,5px 5px 5px red"><br><br></center>                     
     
            <input type = "submit" value ="upload"></form><br>
            <center><p>Info</p></center>
                    <form role = "form" action = '/User/modifyEvent.php?ftype=3' method = 'POST' >
                      <input type = "text" id = "address" name = "address" placeholder = "Event Address"value = "<?php  echo $events["location"]["address"] ?>"><br><br>
                    <input type = "text" id ="city" name ="city"placeholder ="City" value = "<?php echo $events["location"]["city"] ?>"> ,
                   <input type= "text" id = "state" name = "state"placeholder = "State" value = "<?php echo $events["location"]["state"] ?>"><br><br>
   
            <b> Cost:</b> <input type = "number" id = "price"name = "price" placeholder = "Price" value ="<?php echo $events["cost"]?>"><br><br>
    <b>Music: </b> 
            <input list = "music" placeholder = "Music"value = "<?php echo $events["music"] ?>"name ="music">
                    <datalist id = "music" name ="music">
                    <option value="Hip hop/Rap">
                    <option value="Rock">
                    <option value="R&B">
                    <option value="Pop">
                    <option value="Carribean"></datalist><br><br>
    <b> Food: </b>
        <input type = "text" id = "food" name = "food"placeholder = "Food" value = "<?php echo $events["food"] ?>"style = "width:2.5cm;"><br><br>
    <b> Date of Event: </b>
        <input type = "date" id = "date" name ="date" placeholder = "Event Date"value = "<?php echo $events["date"] ?>"><br><br>
   <b> Time of event: </b>
        <input type = "time" id = "time" name ="time" placeholder = "Time of Event" value = "<?php echo $events["time"]?>"><br><br>
       <b> Drinks: </b>
        <input list = "drinks" placeholder = "Drinks" value = "<?php echo $events["drinks"] ?>"name ="drinks">
                    <datalist id = "drinks"name ="drinks">
                    <option value="None">    
                    <option value="Any">  
                    <option value="BYOB">
                    <option value="beer">
                    <option value="whiskey">
                    <option value="vodka">
                    <option value="wine">
                    <option value="rum">
                    <option value="beer">
                    <option value="tequilla">
                    <option value="champagne">

                     </datalist><br><br>
   <b> Attire: </b>
        <input list = "attire" placeholder = "Attire" value = "<?php echo $events["attire"]?>"name = "attire">
                    <datalist id = "attire" name = "attire">
                    <option value="no preference">
                    <option value="casual">
                    <option value="formal">
                    <option value="lingerie">
                    <option value="beach">
                     </datalist><br><br>
        <input type = "submit" value ="Save">
            </form></div>
<br><br><br>
                <div id = "footer">
                    <nav>
                        <img src = "/User/misc/HotspotLogo.png"height = "42" width = "82">
                        <font color = "red"size ="4"><b><?php echo $events["name"]; ?></b></font>
                                </nav></div>
    
            <br/><br/></div>
        <script>
function popup() {
    var x;
    if (confirm("Are you sure you want to cancel this event?") == true) {
       window.location.href ="/User/modifyEvent.php?ftype=4";
    } else {
        x = "Don't Cancel!";
    }
    document.getElementById("can").innerHTML = x;
}

        function uploadpic(){
            var x = document.getElementById("fileupload");
            document.getElementById("pic").src = x;
        }
        function myFunction() {
       document.getElementById("fileupload").click();
}
    </script>
</body>   
</html>