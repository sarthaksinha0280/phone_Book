<!----------------------------------------------------------------------------------------------------------------->
<?php
//session_start();
error_reporting(0);
include("database.php");
  $random = $_GET['id']; //this varible come search_phone using javascript
  //$random = $_POST['id'];
  $query=mysqli_query($conn,"SELECT * FROM contacts where id='$random' ");
  $count=mysqli_num_rows($query);
  //echo $count;
  $n1=mysqli_fetch_assoc($query);
   //print_r($n1);
  $mobile=$n1['mobile'];
  $email=$n1['Email'];
  $phone=explode(",",$mobile);
  $gmail=explode(",",$email);
    //print_r($phone);
  //print_r($gmail);
  $num_email=count($gmail);
  //echo $num_email;
  $num_phone=count($phone);
  //echo $num_phone;

  //echo $num_phone;
  //print_r(explode(" ",$n1[$mobile]));
?>

<!---------------------------------------------------------------------------------------------------------------------------------------------------------------------->

<!-- UPDATE DATABase
<?php
/*
if(isset($_POST['update'])){
  $random = $_POST['id'];
   //echo $random;
  extract($_POST);
  $phone=implode(",",$mobile);
  $gmail=implode(",",$email);
  $Update_query=mysqli_query($conn,"UPDATE contacts set name='$Name',DOB='$Date',mobile='$phone',Email='$gmail' where id='$random' ");//not work
  //$Update_query=mysqli_query($conn,"UPDATE contacts set name='$Name',DOB='$Date',mobile='$phone',Email='$gmail' where id=75 ");
  echo"update successfull";
  header("Location:update_phone.php?id=$random");
  //header("Location:update_phone.php?id=75");
}
else{

}*/
?>
-->

<!---------------------------------------------------------------------------------------------------------------------------------------------------------------------->

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      </head>  
</head>
<body style="background-color: #00e6e6">
<!---------------------------------------------------------------------------------------------------------------------------------------------------------------------->  
<script language="javascript" type="text/javascript" >
//$(document).ready(function(){
var link = window.location.href;
  var params = link.split('?id=');
  var id = (params[1]);//
  //console.log(id);
  $(document).ready(function(){
        $.ajax({
        type:"POST",
        url:"update_phone.php",  
        data:{d:id},
        success:function(d){
        //alert(d);
        }
        });

//Decralring php variable in JS
//var inputs = $(".name_list");
//console.log($(".name_list"));
var mobile = '';
//for(var i = 0; i < 3; i++){
  //  mobile = mobile.concat($(".name_list")[i].value);
//}

//var phone = inputs.toString();
//console.log(mobile);
var Name = '<?php echo $Name; ?>';
var dob = '<?php echo $Date; ?>';
var mobile = '<?php echo $mobile;?>';
var gmail = '<?php echo $email;?>';
var id = '<?php echo $random;?>';         
console.log(Name);
console.log(dob);
console.log(mobile);
console.log(gmail);
console.log(id);

    $('#update').click(function(e){
      e.preventDefault();
      $.ajax({
        type:'POST',
        url:'user_ajax.php',
        data:{Name:Name,dob:dob,phone:phone,email:email,id:id,page:'update'},
        dataType:'JSON',
        success:function(data){
          console.log(data);
        }
      })
    })
     });
</script>
<!---------------------------------------------------------------------------------------------------------------------------------------------------------------------->   
<!--
  <script type="text/javascript">
    //var link=window.location.href;
    var link=window.location.pathname;
    //document.write(link);
    //link=link.replace("update_phone.php?","");//this is use to replace the link
     // document.write(link);
    var id = link.substring(link.lastIndexOf('/') + 1);
    //document.write(id);
    //alert(id);
  </script>
-->

<!---------------------------------------------------------------------------------------------------------------------------------------------------------------------->  
    <?php 
//    $random = $_GET['id'];//
    $random = $_POST["id"];
  //  echo $random;
    ?>
<!---------------------------------------------------------------------------------------------------------------------------------------------------------------------->  
<h3 style="background-color:yellow">UPDATE Number Book</h3>
<div class="jumbotron col-sm-8">
 <?php $id; ?>
<div class="container">
  <div class="row">
  <div class="col-sm-6">

  <div class="card">
    <div class="card-header">
          <h5>Edit contact</h5>
    </div>
    <div class="card-body">
<form >
    <div class="form-group">
      <label for="usr">Name:</label>
      <input type="text" class="form-control" id="name" name="Name" value="<?php echo $n1['name']; ?>" required >
    </div>
    <div class="form-group">
      <label for="usrr">DOB</label>
      <input type="date" class="form-control" id="dob" name="Date"  value="<?php echo $n1['DOB']; ?>" required>
    </div>
    
    <div class="table-responsive">  
       <label>Mobile Number</label>
                 
                 <div class="form-group">  
                  <!--    <form name="add_name" id="add_name"> --> <!--  add_name  id correction --> 
                          <div class="table-responsive">  
                             <!----------------->  
                               <table id="dynamic_field">  
                                    <tr>  
                         <td><input type="text" name="mobile[]" value="<?php echo $phone[0]; ?>" class="name_list" required></td>  
                                      
                                          <td><i class="fa fa-plus" name="add" id="add" style="font-size:28px"></i></td>  
                                    </tr>  
                               </table>  
                              <!----------------->  
                          </div>  
            <!--       </form>  -->
                </div>  
    </div>

    <div class="table-responsive">  
       <label>Email</label>
                 <div class="form-group">  
               <!--      <form name="add_name" id="add_name">--> <!--  add_name id correction --> 
                          <div class="table-responsive">  
                             <!----------------->  
                               <table  id="dynamic_call">  
                                    <tr>  
                         <td><input type="text" name="email[]" value="<?php echo $gmail[0]; ?>" class="name_call"  required></td>
                                          <td><i class="fa fa-plus" name="call" id="call" style="font-size:28px"></i></td>
                                    </tr>  
                               </table>  
                              <!----------------->  
                          </div>  
             <!--        </form> --> 
                </div>  
    </div>
    <button type="submit" id="update" name="update" class="btn btn-success">Update</button>
 </form>
    </div> 
    </div>
    </div>
</div>
</div>
 
 <script>

////////////////////////////////////////////////////////////////////////////////////////////////////////////

 var count_email = '<?php echo $num_email; ?>';//3
 var count_phone = '<?php echo $num_phone; ?>';//2
 //document.write(count_phone);
 //document.write(count_email);
 var _email = '<?php echo $email; ?>';
 //document.write(_email);
 var _phone = '<?php echo $mobile; ?>';
 //document.write(_phone);
 var email_arr = _email.split(",");
 //document.write(email_arr);
 var phone_arr = _phone.split(",");
 //document.write(phone_arr);

 
  $(document).ready(function(){
  for(i=1;i<count_phone;i++){
    $('#dynamic_field').append('<tr id="row'+i+'">   <td><input type="text" name="mobile[]" value="'+phone_arr[i]+'" class="name_list" /></td><td><button type="button" name="remove" id_1="'+i+'" class="btn btn-danger btn_remove">X</button></td>   </tr>'); 
  }  
    for(i=1;i<count_email;i++){
  $('#dynamic_call').append('<tr id="call'+j+'">   <td><input type="text" name="email[]" value="'+email_arr[i]+'" class="name_call" /></td><td><button type="button" name="remove" id_2="'+j+'" class="btn btn-danger btn_delete">X</button></td>  </tr>');  
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////
      var i=1;  
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'">   <td><input type="text" name="mobile[]" placeholder="Enter your  Number" class="name_list" /></td><td><button type="button" name="remove" id_1="'+i+'" class="btn btn-danger btn_remove">X</button></td>   </tr>');  
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id_1");   
           $('#row'+button_id+'').remove();  
      }); 

///////////////////////////////////////////////////////////////////////////////////////////////////////////
      var j=1;  
       $('#call').click(function(){  
           j++;  
           $('#dynamic_call').append('<tr id="call'+j+'">   <td><input type="text" name="email[]" placeholder="Enter your Email" class="name_call" /></td><td><button type="button" name="remove" id_2="'+j+'" class="btn btn-danger btn_delete">X</button></td>  </tr>');  
      });  
      $(document).on('click', '.btn_delete', function(){  
           var button_call = $(this).attr("id_2");   
           $('#call'+button_call+'').remove();  
      });  
 }); 

 </script>
 <a href="search_phone.php">contact search</a>

</body>
</html>
