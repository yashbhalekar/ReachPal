<?php include("./includes/main_head.php"); ?>
<?php
session_start();
include("includes/connection.php");
?>
<html>
<body>
<style>
	.main-content{
		width: 50%;
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
		border:1px solid black;
	}
</style>
<div class="row">
	<div class="col-sm-12">
		<div class="main-content">
			<div class="header">
				<h3 style="text-align: center;"><strong>Forgot assword</strong></h3>
			</div>
            <hr>
			<br>
		<div class="l-part">
            <form action="" method="post"> 
	        <input type="email" name="u_email" placeholder="Enter your Email" required="required" class="form-control input-md"><br>
	        <input type="text" name="recover_text" placeholder="Enter your Recovery text" required="required" class="form-control input-md"><br>
            <center><button id="signin" class="btn btn-info btn-lg" name="forgot">Submit</button></center>

        </div>
    </div>
</div>
</body>
</html>
<?php 
if(isset($_POST['forgot'])){

    $email = htmlentities(mysqli_real_escape_string($con,$_POST['u_email']));
    $recovery = htmlentities(mysqli_real_escape_string($con,$_POST['recover_text']));
    $select_user = "SELECT * FROM users WHERE user_email='$email' And recovery_account='$recovery'";
    $query = mysqli_query($con,$select_user);
    $check_user = mysqli_num_rows($query);
        if($check_user==1)
        {
            $_SESSION['user_email']=$email;
            echo "<script>alert('Set Your New Password!')</script>";
            echo "<script>window.open('change_pass.php', '_self')</script>";
        }
        else
        {
            echo "<script>alert('ypur email or recover text is incorrect!')</script>";
            echo "<script>window.open('forgot.php', '_self')</script>";
            exit();
                
        }
    } 
?>