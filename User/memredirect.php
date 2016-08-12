<?php
global $name;
$name = $_GET["name"];
header('location:/User/otherSocialyte.php?name='.$name.'');
?>