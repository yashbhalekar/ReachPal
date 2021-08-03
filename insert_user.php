<?php
include("includes/connection.php");

    if(isset($_POST['sign_up'])){

        $first_name = htmlentities(mysqli_real_escape_string($con,$_POST['first_name']));

        $last_name = htmlentities(mysqli_real_escape_string($con,$_POST['last_name']));

        $pass = htmlentities(mysqli_real_escape_string($con,$_POST['u_pass']));

        $email = htmlentities(mysqli_real_escape_string($con,$_POST['u_email']));

        $country = htmlentities(mysqli_real_escape_string($con,$_POST['u_country']));

        $gender = htmlentities(mysqli_real_escape_string($con,$_POST['u_gender']));

        $birthday = htmlentities(mysqli_real_escape_string($con,$_POST['u_birthday']));

        $recover = htmlentities(mysqli_real_escape_string($con,$_POST['recover_name']));

        $status = "verified";

        $posts = "no";
        $newgid = sprintf('%05d' , rand(0,99999));  

        $username = strtolower($first_name . "_" . $last_name ."_" . $newgid);
    
        
        $check_username_query = "SELECT user_name FROM users WHERE user_email='$email'";
        $run_username = mysqli_query($con,$check_username_query);

        if(strlen($pass)<9){
            echo "<script>alert('Password should be minimum 9 characters!')</script>";
            exit();
        }

        $check_email = "SELECT * FROM users WHERE user_email='$email'";

        $run_email = mysqli_query($con,$check_email);

        $check = mysqli_num_rows($run_email);

        if($check == 1){
            echo "<script>alert('Email already Exist')</script>";
            echo "<script>window.open('signup.php', '_self')</script>";
            exit();
        }

        $rand = rand(1,3); //Random number between 1 and 3

        if($rand == 1)
            $profile_pic ="head_red.png"; //add image
            else if($rand == 2)
            $profile_pic ="head_red.png"; //add image2
            else if($rand == 3)
            $profile_pic ="head_turqoise.png"; //add image

        $insert= "INSERT INTO users(f_name,l_name,user_name,describe_user,relationship,user_pass,user_email,user_country,user_gender,user_birthday,user_image,user_cover,user_reg_date,status,posts,recovery_account)
        VALUES('$first_name','$last_name','$username','hii i am using reach pal','NA','$pass','$email','$country','$gender','$birthday','default_pic.jpg','bg.jpg',NOW(),'$status','$posts','$recover')"; 
		// Add a profile picture // hi im creator is status // ... is relationship
        $query =mysqli_query($con,$insert);

        if($query){
            echo "<script>alert('Well Done $first_name, Good to go')</script>";
            echo "<script>window.open('signin.php','_self')</script>";
        }
        else{
            // echo "error" .$insert;
            // echo "" .mysqli_error($con);
            echo "<script>alert('Registeration Failed! try again')</script>";
            echo "<script>window.open('signup.php','_self')</script>";
        }
    }
    ?>