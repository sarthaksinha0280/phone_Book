<?php
session_start();
error_reporting(0);
include('database.php');
if(isset($_POST['submit'])){
$searchq=$_POST['search'];
$searchq=preg_replace("#[^0-9a-z]#i","",$searchq);
 //extract($_POST);
 $query=mysqli_query($conn,"SELECT * FROM contacts WHERE name LIKE '%$searchq%' ");
$count=mysqli_num_rows($query);
$t=$count;
if($count==0){
  $output ='There was no search results';
}
else{
  while($row=mysqli_fetch_array($query)){
    //echo $t;
   $id[$t]=$row['id'];
   $Name[$t]=$row['name'];
   $DOB[$t]=$row['DOB'];
   $mobile[$t]=$row['mobile'];
   $Email[$t]=$row['Email'];
  
   $mob[$t]=explode(",",$mobile[$t]);
   $Em[$t]=explode(",",$Email[$t]);
  
   $t--;
  }
}
 }
?>

<!DOCTYPE html>
<html>
<head>
  <title>search</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

   <style>
.down {
  transform: rotate(45deg);
  -webkit-transform: rotate(45deg);
}

.arrow {
  border: solid black;
  border-width: 0 3px 3px 0;
  display: inline-block;
  padding: 3px;
}
   </style>
</head>
<body style="background-color: #00e6e6">
<h3 class="center" style="background-color:yellow">Search phone</h3>




<div class="container">
  <div id="accordion">
    
    <div class="card">  
     
     
      <div class="card-header">
        <a class="card-link" data-toggle="collapse" href="#collapseOne">
          search
        </a>
      </div>
      
      <div id="collapseOne" class="collapse show" data-parent="#accordion">
        <div class="card-body">
           <!------search------->
 
           <div class="search-container">
           <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];  ?>">
           <input type="text" placeholder="Search.." name="search" required>
             <button class="btn btn-success" type="submit" name="submit">Submit</button>
           </form>
           </div>

        </div>
      </div>
    </div>

  <div class="card">
    <div class="card-header">
      <a class="card-link" data-toggle="collapse" href="#collapseTwo">
        <td><i class="fa fa-plus" name="add" id="add" style="font-size:28px"></i></td>  
      </a>
    </div>

    <div id="collapseTwo" class="collapse" data-parent="#accordion">
      <div class="card-body">
        <button type="button"  class="btn btn-dark">
          <a href="add_phone.php">
              Add contact
          </a>
        </button>
      </div>
    </div>
  </div>
  
  
  </div>
</div>




<br><br><br>
<?php
if(isset($_POST['submit'])){
if($count==0){
?>
<div class="alert alert-danger">
<span style='font-size:100px;'>&#9785;</span>
<h4> <?php  print("$output"); ?></h4>
</div>
<?php
}
else{
  ?>


<div class="container">
  <div id="accordion">
  <?php
for($i=$count;$i>0;$i--){
?>
<!-----------------------------use pagination for the input-------------------------------->
    <div class="card">
  
      <div class="card-header">
           <a class="card-link" data-toggle="collapse" href="#collapse<?php echo $i; ?>">
         
         <div style="" align="right">
         <i class="arrow down"></i>
         
         </div>
         <?php echo $Name[$i]; ?>
        </a>
      </div>

      <div id="collapse<?php echo $i; ?>" class="collapse show" data-parent="#accordion">
       <div class="card-body">
       
        <?php  echo $DOB[$i]; ?>
        
      
         <div style="" align="right">
         <button type="submit" name="Edit" class="btn btn-primary"  onclick="update_data(<?php echo $id[$i]; ?>)">Edit</button>
           
           <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#myModal<?php echo $i; ?>">
           Delete
          </button>
         </div>
       
         <div class="modal" id="myModal<?php echo $i; ?>">
 
    <div class="modal-dialog">

      <div class="modal-content">

       
        <div class="modal-header">
          <h4 class="modal-title">Delete</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
       
        <div class="modal-body">
       Sure you want to delete
        </div>
        
       
        <div class="modal-footer">
          
         <button type="button" class="btn btn-danger" onclick="delete_data('<?php echo $Name[$i];?>')">confirm</button>
        </div>
        
      </div>
    </div>
  
  </div>
       
        
        
           <!-- button-->
        <div class="jumbotron col-sm-8"><!-- id="data_table" -->
         <?php
          $n1=count($mob[$i]);
         // echo $n1;
          $n2=count($Em[$i]);
          //echo $n2;
          ?>
          <h4>Mobile</h4>
          <?php
          for($j=0;$j<$n1;$j++){
           ?>
         <i class="fa fa-phone" style="font-size:20px"> <?php print_r( $mob[$i][$j]);?>  </i>


           <?php
           echo"<br>";
          }
          echo "<br>";
          ?>
           <h4>Email</h4>
          <?php
          for($j=0;$j<$n2;$j++){
            ?>
            <i class="fa fa-envelope" style="font-size:20px"> <?php print_r($Em[$i][$j]);?></i>
            <?php
            echo"<br>";
          }
         
         ?>
        </div>


        </div>
        </div>
<!-------------------------------------------------------------------------------------------------------------------->  
</div>
<?php
}
?>
 </div>
  </div>
<?php
}
?>

  <?php
}
?>
<br><br><br><br>

<!-------------------------------------------------------------------------------------------------------------------->  
<script type="text/javascript">
function  update_data(d) {
  var id=d; 
  location.replace("update_phone.php?id="+id+"");
}
</script>
<!-------------------------------------------------------------------------------------------------------------------->  
<script type="text/javascript">
  function delete_data(d){
    var name=d;
    //console.log(id);
    $.ajax({
      type: "post",
      url: "delete.php",
      data: {name:name},
      success : function(data) {
        location.reload();
      }
    });
  }
</script>

</body>
</html>
