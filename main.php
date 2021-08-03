<?php include("./includes/main_head.php"); ?>
<!DOCTYPE html>
<html>
<body>
	<div class="row" style="background: rgb(75,212,247);
    background: linear-gradient(90deg, rgba(75,212,247,1) 5%, rgba(108,134,213,1) 21%, rgba(28,86,150,1) 44%, rgba(85,31,213,1) 63%, rgba(85,33,162,1) 63%);">
		<div class="col-sm-6" style="left:0.5%;">
			<img src="./images/show.jpg" class="img-rounded" title="REACH PAL" width="650px" height="565px" style="opacity:0.9;">
			<div id="centered1" class="centered"><h3 style="color:black;background:white;"><span class="glyphicon glyphicon-search"></span>&nbsp&nbsp<strong>Follow Your Interests.</strong></h3></div>
			<div id="centered2" class="centered"><h3 style="color:black;background:white";><span class="glyphicon glyphicon-search"></span>&nbsp&nbsp<strong>Share your ideas!</strong></h3></div>
			<div id="centered3" class="centered"><h3 style="color:black;background:white;"><span class="glyphicon glyphicon-search"></span>&nbsp&nbsp<strong>Connect to the world.</strong></h3></div>
		</div>
		<div class="col-sm-6" style="left:8%:">
			<!-- <img src="./images/show.jpg" class="img-rounded" title="Reach Pal" width="80px" height="80px"> -->
			<h2 style="color:white; text-transform:uppercase"><strong>Just See<br>whats happen In The World!</strong></h2><br><br>
			<h4 style="color:white; font-size:30px;"><strong>join Reach Pal Today!</strong></h4>
			<form method="post" action="">
				<button id="signup" class="btn btn-info btn-lg" name="signup" style="margin-top:8%;width:65%">Sign up</button><br><br>
				<?php
					if(isset($_POST['signup'])){
						echo "<script>window.open('signup.php','_self')</script>";
					}
				?>
				<button id="login" class="btn btn-info btn-lg" name="login" style="margin-top:2%;width:65%;">Login</button><br><br>
				<div><p style="color:white;font-weight:bold;text-transform:capitalize;float:right;margin-top:20%;font-size:20px;margin-right:3%;">rahul badhai production</p></div>
				<?php
					if(isset($_POST['login'])){
						echo "<script>window.open('signin.php','_self')</script>";
					}
				?>
			</form>
		</div>
	</div>
</body>
</html>