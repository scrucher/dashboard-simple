<?php 
	
	require_once"db/dbcon.php";
	
	session_start();
	
	
	global $errors, $erro, $errr, $suc, $succss, $success;
	
	$errors  = array();
	$success = array();
	$errr  = array();
	$succ = array();
	$erro  = array();
	$succss = array();
	
	
	class Orders 
	{
		
		
		function bookTable ()
		{
			global $con, $errors, $success;
			
			
			$name    = ($_POST['name']);
			$email   = ($_POST['email']);
			$phone   = ($_POST['phone']);
			$date    = ($_POST['date']);
			$time    = ($_POST['time']);
			$people  = ($_POST['people']);
			$message = ($_POST['message']);
			$toMail = "contact@saley.ma";
			$header = "From: " . $name . "<". $email .">\r\n";
			$subject = "Someone Pre-Ordered A Table Please check Dashboard for More Info ";
			
			// INSERT DATA INTO DATABASE
			
			$qry= "INSERT INTO orders 
			(name, 
			email, 
			phone, 
			res_date, 
			res_time, 
			people, 
			message) 
			VALUES ('$name', 
			'$email', 
			'$phone', 
			'$date', 
			'$time', 
			'$people', 
			'$message')";
			
			$res = $con->prepare($qry);
			$res->execute();
			
			
			
			// IF NOTHING WRONG SEND MESSAGE
			if($res) 
			{
				mail($toMail,$subject, $message, $header);			
				array_push($success, "We Have Received Your Order And We Will Contact You Soon");
				//header("location: #book-a-table");
			}else
			{
				// IF THERE IS SOMETHING WRONG PUSH ERROR MESSAGE 
				array_push($errors, "Something Went Wrong Please Try Again");
			}
		}
		
		
		
		function display_error() {
			global $errors;
			
			if (count($errors) > 0){
				echo '<div style="font:16px red italic ;" class="alert alert-danger error" role="alert">';
				foreach ($errors as $error){
					echo $error .'<br>'. '<br>';
				}
				echo '</div>';
			}
		}
		
		
		function display_success() 
		{
			global $success;
			if (count($success) > 0)
			{
				echo '<div style="font:16px red italic ;" class="alert alert-success error" role="alert">';
				foreach ($success as $suc){
					echo $suc .'<br>'. '<br>';
				}
				echo '</div>';
			}
		}
		
		
		function displayOrders () 
		{
			global $con;
			
			$sql = "SELECT * FROM orders ORDER BY id DESC ";
			
			$results= $con->prepare($sql) ;
			$results->execute();
			
			if ($results->rowCount() > 0) 
			{
				while ($row = $results->fetch(PDO::FETCH_ASSOC)) 
				{
					
					echo ('<tr><td>' 
					. $row['id'].'</td> <td>'  
					. $row['name']. '</td>  <td>' 
					. $row['email'] .'</td> <td>'
					. $row['phone'] .'</td> <td>'
					. $row['res_date'] .'</td> <td>'
					. $row['res_time'] .'</td> <td>'
					. $row['people'] .'</td> <td>' 
					. $row['reg_date'] .'</td> <tr>' );
				}
			}else 
			{
				echo "0 result";
			}
		}
		
		
		
	}
	
	
	
	class Contact 
	{
		
		
		
		function contactUS () 
		{
			global $con, $errr, $succ;
			
			
			$name    = ($_POST["name"]);
			$email   = ($_POST["email"]);
			$subject = ($_POST["subject"]);
			$message = ($_POST["message"]);
			
			// Recipient email
			$toMail = "contact@saley.ma";
			
			// Build email header
			$header = "From: " . $name . "<". $email .">\r\n";
			$send_mail = mail($toMail,$subject, $message, $header);
			// Send email
			if ($send_mail) 
			{
				
				$qry = "INSERT INTO contact 
				(name, 
				email,
				subject, 
				message) 
				VALUES ('$name', 
				'$email', 
				'$subject', 
				'$message')";
				
				$res = $con->prepare($qry);
				
				if($res->execute()) 
				{
					array_push($succ, "We Received Your Message We Will Contact you As Soon As Possible. Thank You !!  ");
					//header('location: #contact');
				}else
				{
					die("Query Faild");
				}
			}else 
			{
				array_push($errr, "Something Went Wrong Please Try Again");
			}
		}
		
		
		function display_error() 
		{
			global $errr;
			
			if (count($errr) > 0)
			{
				echo '<div style="font:16px red italic ;" class="alert alert-danger error" role="alert">';
				foreach ($errr as $error){
					echo $error .'<br>'. '<br>';
				}
				echo '</div>';
			}
		}
		
		function display_success() 
		{
			global $succ;
			if (count($succ) > 0)
			{
				echo '<div style="font:16px red italic ;" class="alert alert-success error" role="alert">';
				foreach ($succ as $suc){
					echo $suc .'<br>'. '<br>';
				}
				echo '</div>';
			}
		}
		
		
		function displayMessages () 
		{
			global $con;
			
			$sql = "SELECT * FROM contact ORDER BY id DESC ";
			
			$results= $con->prepare($sql) ;
			$results->execute();
			
			if ($results->rowCount() > 0) 
			{
				while ($row = $results->fetch(PDO::FETCH_ASSOC)) 
				{
					
					echo ('<tr><td>' 
					.$row['id'].'</td> <td>'  
					.$row['name']. '</td>  <td>' 
					. $row['email'] .'</td> <td>'
					. $row['subject'] .'</td> <td>'
					. $row['message'] .'</td> <tr>' );
				}
			}else 
			{
				echo "0 result";
			}
		}
		
		
		
		
		
	}
	
	class Subscribers
	{
		
		
		function subscribe () 
		{
			global $con, $erro, $succss;
			
			if(isset($_POST['subscribe']))
			{
				$email = $_POST["email"];
				
				
				$query = "INSERT INTO 
				subscribers (email) 
				VALUES ('$email')";
				
				
				$res   = $con->prepare($query);
				$res->execute();
				
				if (!$res)
				{
					array_push($erro, "Something Went Wrong Please try Again ...") ;
					
				}else 
				{
					array_push($succss, "You Have Been Subscribed Successfully,
					Welcome To Paradise Inn News Letter") ;
					//header('location: ')
					
				}
			}
		}
		
		
		
		
		
		function display_error() {
			global $erro;
			
			if (count($erro) > 0){
				echo '<div style="font:16px red italic ;" class="alert alert-danger error" role="alert">';
				foreach ($erro as $error){
					echo $error .'<br>'. '<br>';
				}
				echo '</div>';
			}
		}
		
		
		function display_success() {
			global $succss;
			if (count($succss) > 0){
				echo '<div style="font:16px red italic ;" class="alert alert-success error" role="alert">';
				foreach ($succss as $suc){
					echo $suc .'<br>'. '<br>';
				}
				echo '</div>';
			}
		}
		
		
		function displaySubscribers () 
		{
			global $con;
			
			$sql = "SELECT * FROM subscribers ORDER BY id DESC ";
			
			$results= $con->prepare($sql) ;
			$results->execute();
			
			if ($results->rowCount() > 0) 
			{
				while ($row = $results->fetch(PDO::FETCH_ASSOC)) 
				{
					
					echo ('<tr><td>' 
					.$row['id'].'</td> <td>'
					. $row['email'] .'</td> <tr>' );
				}
			}else 
			{
				echo "0 result";
			}
		}
		
		
		
		
		
		
	}
	
	
	
	class User 
	{
		
		
		///// FUNCTION REGISTER
		
		
		function register () 
		{
			
			// call these variables with the global keyword to make them available in function
			global $con, $errors;
			// receive all input values from the form. Call the e() function
			// defined below to escape form values
			$username    =  ($_POST['username']);
			$email       =  ($_POST['email']);
			$password_1  =  ($_POST['password_1']);
			$password_2  =  ($_POST['password_2']);
			
			// form validation: ensure that the form is correctly filled
			if (empty($username)) 
			{
				array_push($errors, "Username is required");
			}
			if (empty($email)) 
			{
				array_push($errors, "Email is required");
			}
			if (empty($password_1)) 
			{
				array_push($errors, "Password is required");
			}
			if ($password_1 != $password_2) 
			{
				array_push($errors, "Passwords do not match");
			}
			
			// register user if there are no errors in the form
			if (!$errors )
			{
				$password = password_hash($password_1, PASSWORD_DEFAULT);
				//encrypt the password before saving in the database
				$query = "INSERT INTO users (username, email, password) VALUES('$username', '$email','$password')";
				$res = $con->prepare($query);
				$res->bindParam("::username",$username);
				$res->bindParam("::email",$email);
				$res->bindParam("::password", $password);
				$res->execute();
				header('location: index.php');
			}else
			{
				array_push($errors," Please Try Again");
			}
		}
		
		
		// FUNCTION LOGIN 
		
		function login () 
		{
			
			global $con, $errors, $password;
			
			// grap form values
			$username = ($_POST['username']);
			$password = ($_POST['password']);
			
			
			// make sure form is filled properly
			if (empty($username)) 
			{
				array_push($errors, "Username is required");
			}
			if (empty($password)) 
			{
				array_push($errors, "Password is required");
			}
			
			// attempt login if no errors on form
			if (!$errors) 
			{
				
				$querry = " SELECT password FROM users WHERE username='$username' LIMIT 1";
				$results = $con->prepare($querry);
				$results->execute();
				$row  = $results->fetch(PDO::FETCH_ASSOC);
				
				if ($results->rowCount() == 1) 
				{   // user found
					//verify password
					$hash = $row['password'];
					//$pwd  = password_verify($password, $hash);
					//print_r($hash);
					if (password_verify($password, $hash)) 
					{
						$qry = "SELECT * FROM users WHERE username='$username' LIMIT 1";
						$sql = $con->prepare($qry);
						$sql->execute();
						$logged_in_user = $sql->fetch(PDO::FETCH_ASSOC);
						$_SESSION['user'] = $logged_in_user;
						$_SESSION['username']  = $logged_in_user['username'];
						header('location: home.php');
					}else 
					{
						array_push($errors, "Wrong username/password combination");
						
					}
					
					
				}else 
				{
					array_push($errors, "Something Went Wrong Please Try Again  ");
					
				}
			}
			
		}
		
		
		function isLoggedIn()
		{
			/// if user is logged session.user returns true
			if (isset($_SESSION['user'])) {
				return true;
				}else{
				return false;
			}
		}
		
		
		
		
		
		
		function getUserById($id)
		{
			global $con;
			$query = "SELECT * FROM users WHERE id=" . $id;
			$result = $con->prepare($query);
			$result->execute();
			
			$user = $result->fetch(PDO::FETCH_ASSOC);
			return $user;
		}
		
		//////////////////
		// escape string//
		/////////////////
		
		
		
		function e($val)
		{
			global $con;
			return mysqli_real_escape_string($con, trim($val));
		}
		
		
		function display_error() 
		{
			global $errors;
			
			if (count($errors) > 0)
			{
				echo '<div style="font:16px red italic ;" class="error">';
				foreach ($errors as $error)
				{
					echo $error .'<br>'. '<br>';
				}
				echo '</div>';
			}
		}
		
		
		
		
		
		
	}
	
	
?>