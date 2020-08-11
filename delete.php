<?php
require 'database.php';
$id=$_POST['id'];
$qry=mysqli_query($conn,"DELETE FROM contacts where name='".$id."' ");
//echo "sarthak sinha";
//header('Location:search_phone.php ' . $_SERVER['HTTP_REFERER']);
?>