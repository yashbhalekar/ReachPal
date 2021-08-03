<?php include("./includes/main_head.php"); ?>
<?php
session_start();
include("includes/connection.php");

if(!isset($_SESSION['user_email'])){
header("location: index.php");
}
?>
<html>
<style>
	.main-content{
		width: 30%;
		height: 60%;
		margin: 10px auto;
		background-color: #fff;
		border: 2px solid #e6e6e6;
		padding: 40px 50px;
	}
	.header{
		border: 0px solid #000;
		margin-bottom: 10px;
	}
    .l-part ::placeholder{
        color:red;
        font-weight:bold;
    }
    hr{
		border:1px solid white;
	}
</style>
</body>
<div class="row">
	<div class="col-sm-12">
		<div class="main-content">
			<div class="header">
				<h3 style="text-align: center;"><strong>Change  password</strong></h3>
			</div>
            <hr>
			<br>
		<div class="l-part">
            <form action="" method="post"> 
	        <input type="password" name="f_pass" placeholder="New password" required="required" class="form-control input-md"><br>
	        <input type="password" name="s_pass" placeholder="Re-enter New password" required="required" class="form-control input-md"><br>
            <center><button id="signin" class="btn btn-info btn-lg" name="reset">Set_Password</button></center>

        </div>
    </div>
</div>
</body>
</html>
<?php 
if(isset($_POST['reset'])){
    $user = $_SESSION['user_email'];
	$get_user = "select * from users where user_email='$user'"; 
	$run_user = mysqli_query($con,$get_user);
	$row = mysqli_fetch_array($run_user);		
	$user_id = $row['user_id']; 
    $pass = htmlentities(mysqli_real_escape_string($con,$_POST['f_pass']));
    $pass1 = htmlentities(mysqli_real_escape_string($con,$_POST['s_pass']));
    if($pass==$pass1)   
    {
        if(strlen($pass)>=8)
        {
            
             $update= "Update users set user_pass='$pass' where user_id='$user_id'";
             $run= mysqli_query($con,$update);
             echo "<script>alert('password set successfully!')</script>";
             echo "<script>window.open('home.php', '_self')</script>";
        }
        else
        {
            echo "<script>alert('password should greater than 8 character')</script>";
            echo "<script>window.open('change_pass.php', '_self')</script>";  
                exit();
        }
    }
    else
        {
            echo "<script>alert('password not match')</script>";
            echo "<script>window.open('change_pass.php', '_self')</script>";
            exit();
                
        }
    } 
?>