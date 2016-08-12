<?php
session_start();
if(isset($_SESSION["admin"]))
{
$mongoConn = new MongoClient();
$database = $mongoConn->selectDB('Hotspot');
$collection = $database->selectCollection('socialyte');
$id = $_GET["id"];
$user = $collection->findone(array('_id' => new MongoID($id))); 
    
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
      <li><a class="active" href="/User/admin/adminHome.php">Home</a></li>
      <li><a href="/User/admin/Reports.php">Reports</a></li>
      <li><a href="/User/admin/Users.php">Users</a></li>
      <li><a href="/User/admin/Events.php">Events</a></li>
      <li><a href="/User/admin/Messages.php">Messages</a></li>
            </ul></nav></div>
</head>
<body>
        <style>
            input[type= text], input[type = email],input[type = password]{
                width: 4cm;
                background: transparent;
                border: 1px solid black;
                border-radius: 25px;
                padding-left: 5px;
            }
            body{
                top:2cm;
                overflow: auto;
            }
         #navad{
            position: fixed;
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
            position: fixed;
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

           #l h1, #l p{
                text-shadow: 3px 3px 3px orange,5px 5px 5px red;
                color: black;
                border-bottom:4px solid black;
                width: 5cm;
            }
            #editbox{
                padding-left: 10px;
            }
            #editbox input{
                border: 1px solid black;
                box-shadow: 3px 3px 3px orange,5px 5px 5px red;
            }
         input[type = submit]{
         width: 70px; height: 20px;
         background-image: url("/User/misc/giphy.gif");
         background-size: 60%; 100%;
         color: White;
         padding-left: 5px;
     }
    </style>
    <br><br><br><br><br><br>
 <div id = "l">
        <center><h1>Edit Profile</h1></center>
     <form role = "form" action = "/User/admin/admin.php?type=mod&id=<?php echo $user["_id"] ?>" method = 'POST' > 
 <input type = "text" id = "username" name= "username" placeholder = "Username" value ="<?php echo $user["User ID"] ?>" required> <br/> <br/>
 <input type = "text" id = "first" name= "first" placeholder = "First name" value ="<?php echo $user["first name"] ?>"required>
 <input type = "text" id = "last" name= "last" placeholder = "Last name"value ="<?php echo $user["last name"] ?>"required><br/><br/>
 <input type = "email" id = "email" name = "email" placeholder = "Email Address"value ="<?php echo $user["login"]["email"] ?>"required><br/><br/>
    <input type = "text" id = "city" name = "city" placeholder = "City" value ="<?php echo $user["location"]["city"] ?>"required>
    <input type = "text" id = "state" name = "state" placeholder = "State" value ="<?php echo $user["location"]["state"] ?>" required><br/><br/>
    <input type = "text" id = "zipcode" name = "zipcode" placeholder = "Zip code" value ="<?php echo $user["location"]["zip code"] ?>" required><br/><br/>
    <input type = "password" id = "password" name = "password" placeholder = "New Password" value = "<?php echo $user["login"]["password"] ?>"required><br><br>
         <input type = "submit"id = "register" value = "Update"> </form>
           <center><p><font size = "4">Profile Picture</font></p></center>
    <form action = "media.php" method = "POST">
    <input type = "file" id = "fileupload" name = "fileupload" accept = "image/x-png, image/gif, image/jpeg"><br>
        <input type = "submit" id = "register" value = "Update">  
        <a href = "/User/Socialyte.php" style = "text-decoration: none; "><font color = "black" style = "text-shadow:3px 3px 3px orange,5px 5px 5px red; ">Cancel</font></a>
     </form></div>

          
    
        
</body>
   
</html>