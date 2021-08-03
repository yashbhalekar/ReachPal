<?php
session_start();
include("includes/header.php");

if(!isset($_SESSION['user_email'])){
header("location: index.php");
}
?>
<html>
<head>
	<title>FIND PEOPLE</title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style/home_style2.css">
</head>
<style>
  #scroll_msgh{
    max-height:200px;
    overflow: scroll;
    scroll-margin-right: -10%;
  }
  #scroll_msg{
    height:50%;
    overflow:scroll;
  }
  #scroll_msg::-webkit-scrollbar{
    display: none;
}
  #btn-msg{
    width: 20%;
    height: 28px;
    border-radius: 5px;
    margin: 5px;
    border: none;
    color: #fff;
    float: right;
    background-color: #2ecc71;
  }
  #selct_user{
    max-height: 500px;
    overflow: scroll;
  }
  #green{
    background-color: rgb(49, 47, 47);
    border-color: #fff;
    width: 45%;
    color:white;
    padding: 2.5px;
    font-size: 16px;
    border-radius: 3px;
    float: left;
    margin-bottom: 5px;
  }

  #blue{
    background-color: rgb(85, 113, 235);
    border-color: #fff;
    width: 45%;
    color: white;
    padding: 2.5px;
    font-size: 16px;
    border-radius: 3px;
    float: right;
    margin-bottom: 5px;
  }
  .col-sm-6{
  background-color: #77aa77;
	background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100%25' height='100%25' viewBox='0 0 2 1'%3E%3Cdefs%3E%3ClinearGradient id='a' gradientUnits='userSpaceOnUse' x1='0' x2='0' y1='0' y2='1'%3E%3Cstop offset='0' stop-color='%2377aa77'/%3E%3Cstop offset='1' stop-color='%234fd'/%3E%3C/linearGradient%3E%3ClinearGradient id='b' gradientUnits='userSpaceOnUse' x1='0' y1='0' x2='0' y2='1'%3E%3Cstop offset='0' stop-color='%23cf8' stop-opacity='0'/%3E%3Cstop offset='1' stop-color='%23cf8' stop-opacity='1'/%3E%3C/linearGradient%3E%3ClinearGradient id='c' gradientUnits='userSpaceOnUse' x1='0' y1='0' x2='2' y2='2'%3E%3Cstop offset='0' stop-color='%23cf8' stop-opacity='0'/%3E%3Cstop offset='1' stop-color='%23cf8' stop-opacity='1'/%3E%3C/linearGradient%3E%3C/defs%3E%3Crect x='0' y='0' fill='url(%23a)' width='2' height='1'/%3E%3Cg fill-opacity='0.5'%3E%3Cpolygon fill='url(%23b)' points='0 1 0 0 2 0'/%3E%3Cpolygon fill='url(%23c)' points='2 1 2 0 0 0'/%3E%3C/g%3E%3C/svg%3E");
	background-attachment: fixed;
	background-size: cover;
  }
</style>
<body>

<div class="row">
<?php
  if(isset($_GET['u_id'])){
      global $con;
      $get_id = $_GET['u_id'];
      $get_user = "select * from users where user_id='$get_id'";
      $run_user = mysqli_query($con,$get_user);
      $row_user = mysqli_fetch_array($run_user);
      $user_to_msg = $row_user['user_id'];
      $user_to_name = $row_user['user_name'];
  }
  $user = $_SESSION['user_email'];
  $get_user = "select * from users where user_email='$user'";
  $run_user = mysqli_query($con, $get_user);
  $row = mysqli_fetch_array($run_user);

  $user_from_msg = $row['user_id'];
  $user_from_name = $row['user_name'];
  
?>
<div class="col-sm-3" id="select_user" style="width:25%; height:100vw;background-color:white;">
  <?php
      $user = "select * from users";
      $run_user = mysqli_query($con, $user);
    $us_id = $_SESSION['user_id'];
    if($us_id){
      echo"<div class='container-fluid' style='border:4px solid #000;background-color:rgba(90, 127, 230, 0.863);margin:2%;position:relative;border-radius:0% 20%;height:6.6%'>
        <a style='text-decoration:none; cursor: pointer; color: #3897f0; padding:0.7%' href='messages.php?u_id=$user_id'>
        <img class='img-circle' src='users/$user_image' width='90vw' height='80vh' title='user_name' style='border:3px solid white;margin-top:1% 0%;'>
        <strong style='color:white;background:#000;padding-right:1vw;margin:0.7vw;margin-left:1.5vw;text-align:justify;text-transform:capitalize;font-size:1.3vw;'>
          &nbsp   YOU</strong> <br><br>
        </a>
    </div>";
    }
      while($row_user = mysqli_fetch_array($run_user)){

            $user_id = $row_user['user_id'];
            $user_name= $row_user['user_name'];
            $first_name= $row_user['f_name'];
            $last_name= $row_user['l_name'];
            $user_image = $row_user['user_image'];
            if($user_id == $us_id){
              continue;
            }
            else{
            echo"
            <div class='container-fluid' style='border:4px solid #e6e6e6;margin:2%;background-color:rgba(90, 127, 230, 0.863);border-radius:0% 20%;height:7.2%;'>
                <a style='text-decoration:none; cursor: pointer; color: #3897f0;padding:0.7%;' href='messages.php?u_id=$user_id'>
                <img class='img-circle' src='users/$user_image' width='90vw' height='80vh' title='user_name' style='border:3px solid white;margin-top:2%;'>
                <strong style='color:white;background:#000;padding-right:1vw;margin:0.7vw;margin-left:0.5vw;text-align:justify;text-transform:capitalize;font-size:1.3vw;'>
                  &nbsp $first_name $last_name </strong> <br><br>
                </a>

            </div>
             ";
      }
    }
   ?>
</div>

<div class="col-sm-6">
  <!-- in stage to create a tabel in database check video 30 time 13:15  -->

  <div class="load_msg" id="scroll_msg">

    <?php  
          $sel_msg = "select * from user_messages where (user_to='$user_to_msg' AND user_from = '$user_from_msg')
          OR (user_from = '$user_to_msg' AND user_to = '$user_from_msg') ORDER by 1 ASC";
          $run_msg = mysqli_query($con,$sel_msg);

          while($row_msg = mysqli_fetch_array($run_msg)){

            $user_to = $row_msg['user_to'];
            $user_from = $row_msg['user_from'];
            $msg_body = $row_msg['msg_body'];
            $msg_date = $row_msg['date'];
      ?>
    <div id="loaded_msg">
      <p>
        <?php 
            if(($user_to == $user_to_msg) AND ($user_from == $user_from_msg)){
            echo " <div class='message'id='blue' data-toggle='tooltip' title='$msg_date'>
                  $msg_body </div> <br><br>";

            } 
            else if($user_from == $user_to_msg AND $user_to == $user_from_msg){ 
                echo" <div class='message' id='green'
                data-toggel = 'tooltip' title='$msg_date'>$msg_body
                </div> <br><br><br> ";}

            ?>
      </p>
      
    </div>
    
    <?php
          }

      ?>

  </div>

  <?php
        if(isset($_GET['u_id'])){
          $u_id = $_GET['u_id'];
           if($u_id==$us_id){
            echo'
              <form>
                  <center> <h3>Select your friend to start conversation</h3></center>
                  <textarea disabled class="form-control" placeholder="Enter Your Message"></textarea>
                  <input type="submit" class="btn btn-default" disabled value="Send">
               </form><br><br>
              ';
          }
          else{
            $user = "select * from users where user_id='$u_id'";
            $run_user = mysqli_query($con, $user);
            $row_user = mysqli_fetch_array($run_user);
            $first_name= $row_user['f_name'];
            $last_name= $row_user['l_name'];
          echo"
              <h3 style='color:black;text-transform:capitalize;'>$first_name $last_name</h3>
              <form action='' method='POST'>
              <textarea style='border:2px solid black;margin-top:2%;' class='form-control' placeholder='Enter Your Message' name='msg_box' id='message_textarea'></textarea>
              <button id='signin' class='btn btn-info btn-lg' name='send_msg'>Send</button>
            </form><br><br>
            ";
          }
        }
    ?>

  <?php
        if(isset($_POST['send_msg'])){
          $msg = htmlentities($_POST['msg_box']);

          if($msg == ""){
            echo" <h4 style='color:red; text-align:center;'>Message was unable to send </h4>";
          }else if(strlen($msg) > 37){
            echo" <h4 style='color:red; text-align:center;'>Message is too long! Use Only 37 character </h4>";
          }else{
           
                $insert = "insert into user_messages(user_to,user_from,msg_body,date, msg_seen) 
                values ('$user_to_msg', '$user_from_msg', '$msg', NOW(), 'no')";
                $run_insert = mysqli_query($con,$insert);
			          // echo "<script>alert()</script>";

                
          }
          

          
        }
    ?>
</div>

<div class="col-sm-3">
  <?php
  if(isset($_GET['u_id'])){
    global $con;

    $get_id = $_GET['u_id'];
    $get_user = "select * from users where user_id='$get_id'";
    $run_user = mysqli_query($con,$get_user);
    $row = mysqli_fetch_array($run_user);
    
    $user_id = $row['user_id'];
    $user_name= $row['user_name'];
    $f_name= $row['f_name'];
    $l_name= $row['l_name'];
    $user_image = $row['user_image'];
    $describe_user = $row['describe_user'];
    $user_country = $row['user_country'];
    $register_date = $row['user_reg_date'];
    $gender = $row['user_gender'];
  }
  if($get_id == "new"){

  }else{
  echo"
  <div class='row' style='margin-right:-10%;background-color:rgb(247, 229, 128);margin-left:0.5%;'>
    <div class='col-sm-1'>
    </div>
    <center>
    <div style='background-color:#e6e6e6;' class='col-sm-9'>
    <h2> Information about </h2>
    <img class='img-circle' src='users/$user_image' width='150' height='150'>
    <br><br>
    <ul class='list-group'>
    <li class ='list-group-item' title='username'><strong>$f_name $l_name</strong></li>
    <li class ='list-group-item' title='user status'><strong>$describe_user</strong></li>
    <li class ='list-group-item' title='Gender'><strong>$gender</strong></li>
    <li class ='list-group-item' title='Country'><strong>$user_country</strong></li>
    <li class ='list-group-item' title='Registration'><strong>$register_date</strong></li>
    </ul>
  </div>
  ";
  }
  ?>
</div>
</div>
<script>
  var div = document.getElementById("srcoll_messages");
  div.scrollTop = div.scrollHeight;
</script>
</body>
</html>