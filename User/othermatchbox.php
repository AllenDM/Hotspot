<!--
To change this template use Tools | Templates.
-->

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/User/css/bootstrap.min.css">
    <link rel = "stylesheet" href="/User/js/bootstrap.min.js">
        <div id = "headname">
    <h1>MatchBox</h1>
    </div>
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
                    #headname{
                background: black;
                position: fixed;
                height: 70px;
                width: 100vw;
                border-bottom: 2px solid orange;
            }   
            h1 {
                text-shadow: 3px 3px 3px orange,5px 5px 5px red;
                color: white;
            }
        </style>
      <div class="container">
  <h2>Students</h2>         
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Group name</th>
      </tr>
    </thead>
    <tbody>
  <?php
   // connect to mongodb
   $hot = new MongoClient();
   //echo "Connection to database successfully";
        $db = $hot->selectDB('Hotspot');
        $collection = $db->selectCollection('groups');
        $id = $_GET["id"];
        $cursor = $collection->find(array('creator' => $id));
	foreach($cursor as $document){
      echo '<tr><td><a href = "grouplist.php?id='.$document["_id"].'"style = "text-decoration: none;"><font color = "black">'.$document["name"].'</font></td>';
      echo  '</tr>';
        }?>
      
      </tbody>  
          </table>
    </div>
</body>
</html>