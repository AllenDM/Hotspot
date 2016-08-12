 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <?php 
    session_start();
    $id = $_GET["id"]
    ?>
<head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/User/css/bootstrap.min.css">
    <link rel = "stylesheet" href="/User/js/bootstrap.min.js">
        <div id = "headname">
    <h1></h1>
    </div>
</head>
    <style>
            input[type=search]{
                width: 90px;
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
<body>
   
       
<div class="container">        
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Members</th>
          <tr><td><form id="searchbar" action = "/User/group.php?type=1&do=add&id='<?php echo $id ?>" method = "post">
           <input type="search" name = "search" placeholder="Search...."></form></td><td>Add</td>
      </tr>
    </thead>
    <tbody>
  <?php
   // connect to mongodb
   $hot = new MongoClient();
   //echo "Connection to database successfully";
        $db = $hot->selectDB('Hotspot');
        $collection = $db->selectCollection('groups');
        $cursor = $collection->find(array('_id' => new MongoID($id)));
   foreach ($cursor as $document) { 
           foreach($document["members"] as $num){
   echo '<tr><td><a href = "/User/memredirect.php?name='.$num.'" style = "text-decoration: none;"><font color = "black">'.$num.'</font></td>';
   echo  '<td><a id ="remove" href = "/User/group.php?type=1&do=delete&id='.$document["_id"].'&delete='.$num.'"> Remove </a></td></tr>';            
   }}
?>
 
      </tbody>
  </table>
</div>

</body>
</html>
