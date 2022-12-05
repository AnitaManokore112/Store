<?php 
	include("function/login.php");
	include("function/customer_signup.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>AnitaWare</title>
	<link rel="icon" href="img/logo.jpg" />
	<link rel = "stylesheet" type = "text/css" href="css/style.css" media="all">
	<link rel="stylesheet" type="text/css" href="css/style1.css">
	<script src="js/trap.js"></script>
	<script src="js/jquery-1.7.2.min.js"></script>
	<script src="js/carousel.js"></script>
	<script src="js/button.js"></script>
	<script src="js/dropdown.js"></script>
	<script src="js/tab.js"></script>
	<script src="js/tooltip.js"></script>
	<script src="js/popover.js"></script>
	<script src="js/collapse.js"></script>
	<script src="js/modal.js"></script>
	<script src="js/scrollspy.js"></script>
	<script src="js/alert.js"></script>
	<script src="js/transition.js"></script>
	<script src="js/trap.min.js"></script>
</head>
<body>
	<div id="header">
		<img src="img/logo.jpg">
		<label>anitaware</label>
			<ul>
				<li><a href="#signup"   data-toggle="modal">Sign Up</a></li>
				<li><a href="#login"   data-toggle="modal">Login</a></li>
			</ul>
	</div>
	
	<div id="login" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:400px;">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
				<h3 id="myModalLabel">Login...</h3>
			</div>
				<div class="modal-body">
					<form method="post">
					<center>
						<input type="email" name="email" placeholder="Email" style="width:250px;">
						<input type="password" name="password" placeholder="Password" style="width:250px;">
					</center>
				</div>
			<div class="modal-footer">
				<input class="btn btn-primary" type="submit" name="login" value="Login">
				<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
					</form>
			</div>
		</div>
	
	<div id="signup" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:700px;">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
					<h3 id="myModalLabel">Sign Up Here...</h3>
				</div>
					<div class="modal-body">
						<center>
					<form method="post">
						<input type="text" name="firstname" placeholder="Firstname" required>
						<input type="text" name="mi" placeholder="Middle Initial" maxlength="1" required>
						<input type="text" name="lastname" placeholder="Lastname" required>
						<input type="text" name="address" placeholder="Address" style="width:430px;"required>
						<input type="text" name="country" placeholder="Province" required>
						<input type="text" name="zipcode" placeholder="ZIP Code" required maxlength="4">
						<input type="text" name="mobile" placeholder="Mobile Number" maxlength="11">
						<input type="text" name="telephone" placeholder="Telephone Number" maxlength="8">
						<input type="email" name="email" placeholder="Email" required>
						<input type="password" name="password" placeholder="Password" required>
						</center>
					</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-primary" name="signup" value="Sign Up">
					<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
				</div>
					</form>
			</div>
	
	<br>
<div id="container">
	<div class="nav">	
			 <ul>
				<li><a href="index.php">   <i class="icon-home"></i>Home</a></li>
				<li><a href="product.php"> 			 <i class="icon-th-list"></i>Product</a></li>
				<li><a href="aboutus.php">   <i class="icon-bookmark"></i>About Us</a></li>
				<li><a href="contactus.php"><i class="icon-inbox"></i>Contact Us</a></li>
			</ul>
	</div>
	
		<img src="img/contactus.jpg" style="width:1150px; height:250px; border:1px solid #000; ">
	<br />
	<br />
	
		<div id="content">
			<form method="post" name="enquiryform">
				<table style="position:relative; left:25%;">
					<tr>
						<td style="font-size:20px;">Name:</td><td><input type="text" name="firstname" placeholder="Name" style="width:400px;" required maxlength="8"></td>
					</tr>
					<tr>
						<td style="font-size:20px;">Number:</td><td><input type="number" id="number" name="number" placeholder="Number" style="width:400px;" required  ></td>
					</tr>
					<tr>
						<td style="font-size:20px;">Email:</td><td><input type="email" id="email" name="email" placeholder="Email" style="width:400px;" required></td>
					</tr>
					<tr>
						<td style="font-size:20px;">Enquiry:</td><td><textarea name="message" style="width:400px; height:300px;" required></textarea></td>
					</tr>
					<tr>
						<td colspan='2'>
							<small style='color:blue'>No duplicate enquiry message from the same user</small>
</td>
</tr>
					<tr>
						<td></td><td><button class="btn btn-info" name="send" style="width:300px;"  onclick="Validate()"><i class="icon icon-ok icon-white"></i>Submit</button>&nbsp;<a href="index.php"><button class="btn btn-danger" style="width:110px;"><i class="icon icon-remove icon-white"></i>Cancel</button></a></td>
					</tr>
				</table> 
			</form> 
		</div>
		<?php
			
			
			if(isset($_POST['send']))
			{   $firstname = $_POST['firstname'];
				$number = $_POST['number'];
				$email = $_POST['email'];
				$message = $_POST['message'];

				$result = mysqli_query($conn, "SELECT * FROM `contact` where firstname = '$firstname' and message = '$message'") or die(mysqli_error());
				if ($result){$row = mysqli_num_rows($result);
				if($row>0){
					 echo"<script>alert('Enquiry has already been sent and is awaiting processing')</script>";
					
				}
				else{ 
					$res = mysqli_query($conn, "INSERT INTO `contact` (firstname, number, email, message) VALUES ('$firstname','$number','$email', '$message')") or die (mysql_error());
					if($res) {echo"<script>alert('successfuly sent')</script>";}
				}
			}	
			}

		?>
		
	<br />
</div>
	<br />
	<div id="footer">
		<div class="foot">
			<label style="font-size:17px;"> Copyrght &copy; </label>
			<p style="font-size:25px;">Anitaware Inc. 2015</p>
		</div>
		
	</div>
<script>
	
	function Validate() 
{
	var overal_res_t= null;
	var overal_res_f  = null;
	//validate email
	var mailaddr = document.getElementById("email").value;
 if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mailaddr))
  {
    overal_res_t=true;
  }
  else{
    alert("You have entered an invalid email address!");
	overal_res_f = true
}

	//validate number
	var ournumber = document.getElementById("number").value;
	var testres= (/^[0-9]{1,10}$/.test(ournumber));
 if(testres){
	overal_res_t = true
  }
  else{
    alert("You have entered an invalid number or len address!");
    overal_res_f = true
  }

  if(overal_res_f){
	return false
  }
  else{
	return true
  }

	
}

</script>
</body>
</html>