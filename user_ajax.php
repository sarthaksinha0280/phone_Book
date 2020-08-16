<?php 


if($page=='update'){
extract($_POST); 
$Update_query=mysqli_query($conn,"UPDATE contacts set name='$Name',DOB='$dob',mobile='$phone',Email='$gmail' where id='$id' ");
  header("Location:update_phone.php?id=$random");

}




/*
 $random = $_POST['id'];
   //echo $random;
  extract($_POST);
  $phone=implode(",",$mobile);
  $gmail=implode(",",$email);
  $Update_query=mysqli_query($conn,"UPDATE contacts set name='$Name',DOB='$Date',mobile='$phone',Email='$gmail' where id='$random' ");//not work
  //$Update_query=mysqli_query($conn,"UPDATE contacts set name='$Name',DOB='$Date',mobile='$phone',Email='$gmail' where id=75 ");
  echo"update successfull";
  header("Location:update_phone.php?id=$random");*/

?>