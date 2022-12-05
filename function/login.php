<?php

include('db/dbconn.php');

if (isset($_POST['login']))

	{
		$email=$_POST['email'];
		$password=$_POST['password'];

		if($email== 'admin@admin.com'){
			$theQuery = "SELECT * FROM admin WHERE username='$email' AND password='$password'";
			$redirect_page = "location:admin/message.php";
			$wantedColumn = 'adminid';
		}
		else{
			$theQuery = "SELECT * FROM customer WHERE email='$email' AND password='$password'";
			$redirect_page = "location:home.php";
			$wantedColumn = 'customerid';
		}

		
			$result=mysqli_query($conn, $theQuery)
				or die ('cannot login' . mysql_error());
			$row=mysqli_fetch_array  ($result);
			$run_num_rows = mysqli_num_rows($result);
							
						if ($run_num_rows > 0 )
						{
							session_start ();
							$_SESSION['id'] = $row[$wantedColumn];
							header ($redirect_page);
						}
						
						else
						{
							echo "<script>alert('Invalid Email or Password')</script>";
							header("location:home.php");
						}
	}

?>