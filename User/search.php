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
            p1 {
                text-shadow: 3px 3px 3px orange,5px 5px 5px red;
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
       
            #navl: visited {
                text-decoration: underline;
                background: red;   
            }
            #host:link {
                text-decoration: none;
                text-shadow: 0 0 3px orange, 0 0 3px red;
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
                border-radius: 8%;
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
                height: 40px;
                width: 50px;
                margin-left: -200px;
            }
            table{
                border: 3px solid transparent;
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
        position: relative;
        top: 30px;
        left:3px;
}javascript:void(0)
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
            
            #event {
                background-color: black;
                border: 1px solid grey;
                height: 100%;
                width: 300px;
                z-index: -9999;
                opacity: 0.8;
                border-radius:0%;
            }
            #box {
                background-color: white;
                height: 100%;
                width: 100%;
                overflow: auto;
                
            }
            caption{
                background-image: url("/User/misc/giphy.gif");
                background-size: 20% 100%;
                height: 100%;
                width: 100%;
                border: 1px solid black;
                border-radius:0%;
                color: white;
            }
  
    </style>
                <div id = "header" data-position = "fixed">
      <ul id = "navi">
        <nav class = "navbar navbar-inverse navbar-fixed-bottom">
    <li id = "create"><a id= "navl" href ="/User/createEvent.html"><img src ="/User/misc/create.png"></a></li>
    <li id = "hot"><a id= "navl"href = "/User/activity.php"><img src ="/User/misc/hot.png"></a></li>
    <li id = "home"><a id= "navl"class ="active" href = "/User/index.php">
        <img src ="/User/misc/HotspotLogo.png" height ="32" width = "60"></a></li>
    <li id = "hot"><a id= "navl"href = "/User/inbox.php"><img src ="/User/misc/message.png"></a></li>
    <li id = "user"><a id= "navl"href = "/User/Socialyte.php"><img src ="/User/misc/Socialyte.png"></a></li>
        </nav>         
          </ul><br/>
    </div> 
                            <div id = "footer">   
                    <nav class = "navbar navbar-inverse navbar-fixed-top">                   
                            <img src = "/User/misc/HotspotLogo.png"height = "42" width = "82"> 
                            </nav>
        </div>
          <form id="searchbar" action = "search.php" method = "post">
               <input type="search" name = "search" placeholder="Search...."></form>             
  <br><br><br>
 
<center>

<?php
$search = isset($_POST["search"])? $_POST["search"] : "";
        $hot = new MongoClient();
        $db = $hot->selectDB('Hotspot');
        $collection = $db->selectCollection('events');
       $cursor = $collection->find(array('location.city' => $search));
        $cursor->sort(array('created time' => -1));
        global $attend;
        global $count;
        foreach ($cursor as $doc) {      
            echo '<section>';   
            echo '<section id = "event">';
            echo '<table id = "box"><br>';
          
         echo '<p1><font color= "white"><b><u>' .$doc["name"].'</u></b></font></caption></p1>';
         echo   '<th> <caption><b> Host: </b><a id = "host" href = "/User/otherSocialyte.php?name='.$doc["event organizer"].'"><font color = "silver">'.$doc["event organizer"].'</font></a></th>';
         echo   '<th></th>';
         echo   '<th><font color = "red"><u>Party Info</u></font></th>';
         echo   '<tr colspan = "1"rowspan= "11">';
         echo   '<td><a href = "/User/viewevent.php?name='.$doc["_id"].'&user='.$doc["event organizer"].'";"><img src = "/User/misc/none.jpg"></a></td>';
         echo   '<td><table>';
         echo   '<tr><td><b>music:   </b>'  .$doc["music"].         '</td></tr>';
         echo   '<tr><td><b>cost:    </b>'  .$doc["cost"].          '</td></tr>';
         echo   '<tr><td><b>food:    </b>'  .$doc["food"].          '</td></tr>';
         echo   '<tr><td><b>address: </b>'  .$doc["location"]["address"].'</td></tr>';
                $comma = ", ";
         echo   '<tr><td><b>city:    </b>';
         echo   $doc["location"]["city"]; 
         echo $comma;
         echo   $doc["location"]["state"];  
         echo   '</td></tr>';
         echo   '<tr><td><b>date:    </b>'  .$doc["date"].  '</td></tr>';
         echo   '<tr><td><b>time:    </b>'  .$doc["time"].  '</td></tr>';
         echo   '<tr><td><b>drinks:  </b>'  .$doc["drinks"]. '</td></tr>';
         echo   '<tr><td><b>attire:  </b>'  .$doc["attire"].  '</td></tr>';
         echo   '<tr><td><b>attendence: </b>' .$doc["attendence"].'</td></tr>';            
         echo   '</table></td></tr>';
         echo   '</table>';   
         echo   '<form action = "indexbuttons.php" method = "post">';
         echo    '<input type = "button" id = "flamed" value ="flame"></form>';
         echo   '</section></section>';
         echo   '<br><br><br>';
    }?>
    <?php
$search = isset($_POST["search"])? $_POST["search"] : "";
        $hot = new MongoClient();
        $db = $hot->selectDB('Hotspot');
        $collection = $db->selectCollection('events');
        $cursor = $collection->find(array('music' => $search));
        $cursor->sort(array('created time' => -1));
        global $attend;
        global $count;
        foreach ($cursor as $doc) {      
          echo '<section>';   
            echo '<section id = "event">';
            echo '<table id = "box"><br>';
          
         echo '<p1><font color= "white"><b><u>' .$doc["name"].'</u></b></font></caption></p1>';
         echo   '<th> <caption><b> Host: </b><a id = "host" href = "/User/otherSocialyte.php?name='.$doc["event organizer"].'"><font color = "silver">'.$doc["event organizer"].'</font></a></th>';
         echo   '<th></th>';
         echo   '<th><font color = "red"><u>Party Info</u></font></th>';
         echo   '<tr colspan = "1"rowspan= "11">';
         echo   '<td><a href = "/User/viewevent.php?name='.$doc["_id"].'&user='.$doc["event organizer"].'";"><img src = "/User/misc/none.jpg"></a></td>';
         echo   '<td><table>';
         echo   '<tr><td><b>music:   </b>'  .$doc["music"].         '</td></tr>';
         echo   '<tr><td><b>cost:    </b>'  .$doc["cost"].          '</td></tr>';
         echo   '<tr><td><b>food:    </b>'  .$doc["food"].          '</td></tr>';
         echo   '<tr><td><b>address: </b>'  .$doc["location"]["address"].'</td></tr>';
                $comma = ", ";
         echo   '<tr><td><b>city:    </b>';
         echo   $doc["location"]["city"]; 
         echo $comma;
         echo   $doc["location"]["state"];  
         echo   '</td></tr>';
         echo   '<tr><td><b>date:    </b>'  .$doc["date"].  '</td></tr>';
         echo   '<tr><td><b>time:    </b>'  .$doc["time"].  '</td></tr>';
         echo   '<tr><td><b>drinks:  </b>'  .$doc["drinks"]. '</td></tr>';
         echo   '<tr><td><b>attire:  </b>'  .$doc["attire"].  '</td></tr>';
         echo   '<tr><td><b>attendence: </b>' .$doc["attendence"].'</td></tr>';            
         echo   '</table></td></tr>';
         echo   '</table>';   
         echo   '<form action = "indexbuttons.php" method = "post">';
         echo    '<input type = "button" id = "flamed" value ="flame"></form>';
         echo   '</section></section>';
         echo   '<br><br><br>';
    }?>
    <?php
$search = isset($_POST["search"])? $_POST["search"] : "";
        $hot = new MongoClient();
        $db = $hot->selectDB('Hotspot');
        $collection = $db->selectCollection('events');
        $cursor = $collection->find(array('groups' => $search));
        $cursor->sort(array('created time' => -1));
        global $attend;
        global $count;
        foreach ($cursor as $doc) {      
        echo '<section>';   
            echo '<section id = "event">';
            echo '<table id = "box"><br>';
          
         echo '<p1><font color= "white"><b><u>' .$doc["name"].'</u></b></font></caption></p1>';
         echo   '<th> <caption><b> Host: </b><a id = "host" href = "/User/otherSocialyte.php?name='.$doc["event organizer"].'"><font color = "silver">'.$doc["event organizer"].'</font></a></th>';
         echo   '<th></th>';
         echo   '<th><font color = "red"><u>Party Info</u></font></th>';
         echo   '<tr colspan = "1"rowspan= "11">';
         echo   '<td><a href = "/User/viewevent.php?name='.$doc["_id"].'&user='.$doc["event organizer"].'";"><img src = "/User/misc/none.jpg"></a></td>';
         echo   '<td><table>';
         echo   '<tr><td><b>music:   </b>'  .$doc["music"].         '</td></tr>';
         echo   '<tr><td><b>cost:    </b>'  .$doc["cost"].          '</td></tr>';
         echo   '<tr><td><b>food:    </b>'  .$doc["food"].          '</td></tr>';
         echo   '<tr><td><b>address: </b>'  .$doc["location"]["address"].'</td></tr>';
                $comma = ", ";
         echo   '<tr><td><b>city:    </b>';
         echo   $doc["location"]["city"]; 
         echo $comma;
         echo   $doc["location"]["state"];  
         echo   '</td></tr>';
         echo   '<tr><td><b>date:    </b>'  .$doc["date"].  '</td></tr>';
         echo   '<tr><td><b>time:    </b>'  .$doc["time"].  '</td></tr>';
         echo   '<tr><td><b>drinks:  </b>'  .$doc["drinks"]. '</td></tr>';
         echo   '<tr><td><b>attire:  </b>'  .$doc["attire"].  '</td></tr>';
         echo   '<tr><td><b>attendence: </b>' .$doc["attendence"].'</td></tr>';            
         echo   '</table></td></tr>';
         echo   '</table>';   
         echo   '<form action = "indexbuttons.php" method = "post">';
         echo    '<input type = "button" id = "flamed" value ="flame"></form>';
         echo   '</section></section>';
         echo   '<br><br><br>';
    }?>
    <?php
$search = isset($_POST["search"])? $_POST["search"] : "";
        $hot = new MongoClient();
        $db = $hot->selectDB('Hotspot');
        $collection = $db->selectCollection('events');
        $cursor = $collection->find(array('name' => $search));
        $cursor->sort(array('created time' => -1));
        global $attend;
        global $count;
        foreach ($cursor as $doc) {      
          echo '<section>';   
            echo '<section id = "event">';
            echo '<table id = "box"><br>';
          
         echo '<p1><font color= "white"><b><u>' .$doc["name"].'</u></b></font></caption></p1>';
         echo   '<th> <caption><b> Host: </b><a id = "host" href = "/User/otherSocialyte.php?name='.$doc["event organizer"].'"><font color = "silver">'.$doc["event organizer"].'</font></a></th>';
         echo   '<th></th>';
         echo   '<th><font color = "red"><u>Party Info</u></font></th>';
         echo   '<tr colspan = "1"rowspan= "11">';
         echo   '<td><a href = "/User/viewevent.php?name='.$doc["_id"].'&user='.$doc["event organizer"].'";"><img src = "/User/misc/none.jpg"></a></td>';
         echo   '<td><table>';
         echo   '<tr><td><b>music:   </b>'  .$doc["music"].         '</td></tr>';
         echo   '<tr><td><b>cost:    </b>'  .$doc["cost"].          '</td></tr>';
         echo   '<tr><td><b>food:    </b>'  .$doc["food"].          '</td></tr>';
         echo   '<tr><td><b>address: </b>'  .$doc["location"]["address"].'</td></tr>';
                $comma = ", ";
         echo   '<tr><td><b>city:    </b>';
         echo   $doc["location"]["city"]; 
         echo $comma;
         echo   $doc["location"]["state"];  
         echo   '</td></tr>';
         echo   '<tr><td><b>date:    </b>'  .$doc["date"].  '</td></tr>';
         echo   '<tr><td><b>time:    </b>'  .$doc["time"].  '</td></tr>';
         echo   '<tr><td><b>drinks:  </b>'  .$doc["drinks"]. '</td></tr>';
         echo   '<tr><td><b>attire:  </b>'  .$doc["attire"].  '</td></tr>';
         echo   '<tr><td><b>attendence: </b>' .$doc["attendence"].'</td></tr>';            
         echo   '</table></td></tr>';
         echo   '</table>';   
         echo   '<form action = "indexbuttons.php" method = "post">';
         echo    '<input type = "button" id = "flamed" value ="flame"></form>';
         echo   '</section></section>';
         echo   '<br><br><br>';
    }?>
    <?php
$search = isset($_POST["search"])? $_POST["search"] : "";
        $hot = new MongoClient();
        $db = $hot->selectDB('Hotspot');
        $collection = $db->selectCollection('events');
        $cursor = $collection->find(array('event organizer' => $search));
        $cursor->sort(array('created time' => -1));
        global $attend;
        global $count;
        foreach ($cursor as $doc) {      
         echo '<section>';   
            echo '<section id = "event">';
            echo '<table id = "box"><br>';
          
         echo '<p1><font color= "white"><b><u>' .$doc["name"].'</u></b></font></caption></p1>';
         echo   '<th> <caption><b> Host: </b><a id = "host" href = "/User/otherSocialyte.php?name='.$doc["event organizer"].'"><font color = "silver">'.$doc["event organizer"].'</font></a></th>';
         echo   '<th></th>';
         echo   '<th><font color = "red"><u>Party Info</u></font></th>';
         echo   '<tr colspan = "1"rowspan= "11">';
         echo   '<td><a href = "/User/viewevent.php?name='.$doc["_id"].'&user='.$doc["event organizer"].'";"><img src = "/User/misc/none.jpg"></a></td>';
         echo   '<td><table>';
         echo   '<tr><td><b>music:   </b>'  .$doc["music"].         '</td></tr>';
         echo   '<tr><td><b>cost:    </b>'  .$doc["cost"].          '</td></tr>';
         echo   '<tr><td><b>food:    </b>'  .$doc["food"].          '</td></tr>';
         echo   '<tr><td><b>address: </b>'  .$doc["location"]["address"].'</td></tr>';
                $comma = ", ";
         echo   '<tr><td><b>city:    </b>';
         echo   $doc["location"]["city"]; 
         echo $comma;
         echo   $doc["location"]["state"];  
         echo   '</td></tr>';
         echo   '<tr><td><b>date:    </b>'  .$doc["date"].  '</td></tr>';
         echo   '<tr><td><b>time:    </b>'  .$doc["time"].  '</td></tr>';
         echo   '<tr><td><b>drinks:  </b>'  .$doc["drinks"]. '</td></tr>';
         echo   '<tr><td><b>attire:  </b>'  .$doc["attire"].  '</td></tr>';
         echo   '<tr><td><b>attendence: </b>' .$doc["attendence"].'</td></tr>';            
         echo   '</table></td></tr>';
         echo   '</table>';   
         echo   '<form action = "indexbuttons.php" method = "post">';
         echo    '<input type = "button" id = "flamed" value ="flame"></form>';
         echo   '</section></section>';
         echo   '<br><br><br>';
    }?>
           <br/><br/>   
    <br/><br/> 
    </center>
  
   
</body>
</html>