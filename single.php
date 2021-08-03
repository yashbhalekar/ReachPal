<?php
session_start();
include("includes/header.php");
if(!isset($_SESSION['user_email'])){
header("location: index.php");
}
?>
<html>
    <head>
        <title>View</title>
        <!-- PASTE THE BOOTSTRAP LINKS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style/home_style2.css">
    </head>
    <style>
        #comment{
            background: rgb(237,187,44);
		background: linear-gradient(90deg, rgba(237,187,44,1) 30%, rgba(221,65,115,1) 61%);
        }
        #myimg{
		width: 80%;
		margin:0% 10%;

	}
    #posts{
        background:white;
        margin-bottom:3%;
    }
	#myimg img{
		box-shadow: 5px 5px 5px 5px rgb(129, 118, 118);
		height: 50%;
		overflow-x:visible;
		padding: 3%;
	}
    </style>
    <body id="comment">
        <div class="col-sm-12"  style="margin-bottom:3%;">
            <center><h2 style="color:white;">COMMENTS</h2><br></center>
            <?php  single_post(); ?>
        </div>
    </body>
</html>
 <!-- Functions madhe add kar  video 23 / 11:24-->