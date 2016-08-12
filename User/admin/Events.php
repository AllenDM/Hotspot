<?php
session_start();
if(isset($_SESSION["admin"]))
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
<div id = "jumbo">
    <table>
        <tr><td><img src = "/User/misc/jon.jpg" style = "height:80px;width:80px;padding-left:10px;"></td>
            <td><h1>Welcome Jonathan!</h1><p1>System Administrator</p1></td><tr>
    </table>
    
        <nav id = "navad">
    <ul>
      <li><img style ="height:100%"src = "/User/misc/HotspotLogo.png"height = "42" width = "82"></li>
      <li><a href="/User/admin/adminHome.php">Home</a></li>
      <li><a href="/User/admin/Reports.php">Reports</a></li>
      <li><a class="active" href="/User/admin/Users.php">Users</a></li>
      <li><a href="/User/admin/Events.php">Events</a></li>
      <li><a href="/User/admin/Messages.php">Messages</a></li>
    </ul>
</nav>
    </div>
</head>
    <style>
        #navad{
            width:100%
        }
        #navad ul{
            height: 40px;
            width: 100%;
            background: rgb(66, 51, 66);
            padding-top: 10px;  
        }
        #navad a:link{
            text-decoration:none;
            color: white;
        }
           #navad a:active {
                text-decoration: none;
                background: red;
               color: white;
            }
          #navad a:hover {
              text-decoration: none;
              background: red;
              color: white;
            }
       
           #navad a:visited {
                text-decoration: none;
                background: red;
                color: white;
            }
        #navad a{
            padding:13px;
            color: white;
        }
        #navad li{
            list-style-type: none;
            float left;
            display: inline-block;
            padding-right: 10px; 
            
        }
        #jumbo{
            background: black;
            color: white;
            top: 0;
            height: 120px;
            width: 100%;
        }
        #jumbo h1, #jumbo p1{
            padding-left:20px;
        }
        #jumbo image{
            float: left;
        }
        input[type = text]{
            width: 3cm;
        }
    </style>
<body><br>
    <form role="form" action="/User/admin/Events.php" method="post">
<div class="container">
     <table class="table table-hover">
       <tr>
       <td>name</td>
         <td><input type="text" id="eventsearch" name="eventsearch"></td>
         <td>event organizer</td>
         <td><input type="text" id="hostsearch" name="hostsearch"></td>
         <td>city</td>
         <td><input type="text" id="citysearch" name="citysearch"></td>
         <td>State</td>
         <td><input type="text" id="statesearch" name="statesearch"></td>
          <td> <button type="submit" class="btn btn-default">Search</button></td>
       </tr>
  </table>
    <div class="container">
  <h2>Events</h2>         
  <table class="table table-hover">
    <thead>
      <tr>
         <th>Event name</th>
        <th>Host</th>
        <th>Date</th>
        <th>Location</th>
        <th>Attendance<th>
        <td>
      </tr>
    </thead>
    <tbody> 
<?php
              $searchdocument = array();
  if (!empty($_POST["eventsearch"]))
      $searchdocument["name"] = $_POST["eventsearch"];
      
  if (!empty($_POST["hostsearch"]))
      $searchdocument["event organizer"] = $_POST["hostsearch"];
        
  if (!empty($_POST["citysearch"]))
      $searchdocument["location.city"] = $_POST["citysearch"];
        
  if (!empty($_POST["statesearch"]))
      $searchdocument["location.state"] = $_POST["statesearch"];
        
    $hot = new MongoClient();
    $db = $hot->selectDB('Hotspot');
    $collection = $db->selectCollection('events');
    $socialyte = $collection->find($searchdocument);
    foreach($socialyte as $list){
        echo '<tr><a href = "">';
        echo '<td>'.$list["name"]. '</td>';
        echo '<td>'.$list["event organizer"].  '</td>';
        echo '<td>'.$list["date"].  '</td>';       
        echo '<td>'.$list["location"]["city"];
        echo ', '.$list["location"]["state"]. '</td>';
        echo '<td>'.$list["attendence"].  '</td>';
        echo '</a></tr>';
    }
    ?>
      </tbody>
        </table>
    </div>
        </div>
    </form>
</body>
   
</html>