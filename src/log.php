<?php

include_once"dbcon.php";

$errors=array();



if (isset($_POST['signup'])) {
	register();
}
////////////////////////////////
///             ///////////////
///  REGISTER USER////////////////
///             ///////////////
///////////////////////////////
function register(){
	// call these variables with the global keyword to make them available in function
	global $con, $errors;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$username    =  e($_POST['username']);
	$email       =  e($_POST['email']);
	$password_1  =  e($_POST['password_1']);
	$password_2  =  e($_POST['password_2']);

	// form validation: ensure that the form is correctly filled
	if (empty($username)) {
		array_push($errors, "Username is required");
	}
	if (empty($email)) {
		array_push($errors, "Email is required");
	}
	if (empty($password_1)) {
		array_push($errors, "Password is required");
	}
	if ($password_1 != $password_2) {
		array_push($errors, "Passwords do not match");
	}

	// register user if there are no errors in the form
	if (!($errors))
    {
		$password = password_hash($password_1, PASSWORD_DEFAULT);
		//encrypt the password before saving in the database
		$query = "INSERT INTO users (username, email, password) VALUES('$username', '$email','$password')";
        mysqli_query($con, $query);
        $logged_in_user_id = mysqli_insert_id($con);

			$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
			$_SESSION['success']  = "You are now logged in";
        header('location: index.php');
    }
}
//////////////////////////////////////
// return user array from their id///
////////////////////////////////////



function getUserById($id){
	global $con;
	$query = "SELECT * FROM users WHERE id=" . $id;
	$result = mysqli_query($con, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

//////////////////
// escape string//
/////////////////



function e($val){
	global $con;
	return mysqli_real_escape_string($con, trim($val));
}
////////////////////////////
//////                /////
////// DISPLAY ERROR /////
//////              /////
////////////////////////

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





/////////////////////////////////////////////////////////////
// call the login() function if register_btn is clicked/////
////////////////////////////////////////////////////////////

if (isset($_POST['login'])) {
	login();
}

// LOGIN USER
function login(){
	global $con, $errors;

	// grap form values
	$username = e($_POST['username']);
	$password = e($_POST['password']);

	// make sure form is filled properly
	if (empty($username)) {
		array_push($errors, "Username is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	// attempt login if no errors on form
	if (!($errors)) {

		$querry = "SELECT password FROM users WHERE username='$username' LIMIT 1";
		$results = mysqli_query($con,$querry);

		if (mysqli_num_rows($results) == 1) { // user found
			//verify password

			$row = mysqli_fetch_array($results);
			$hash = $row['password'];

			if(password_verify($password, $hash)){

				$qry = "SELECT  * FROM users WHERE username='$username' LIMIT 1";
				$sql = mysqli_query($con,$querry);
				// check if user is admin or user
				$logged_in_user = mysqli_fetch_array($sql);

				if ($logged_in_user['user_type'] == 'user') {
					$_SESSION['user'] = $logged_in_user;
					$_SESSION['username']  = $logged_in_user['username'];
					header('location: home.php');
				}else{
				
					$_SESSION['user'] = $logged_in_user;
					$_SESSION['username']  = $username;

					header('location: home.php');
				}
			}else {
			array_push($errors,"Wrong username/password combination" );
			}
		}else {
			array_push($errors, "Wrong username/password combination");

		}
	}
}
// 
////////////////////////
/// Verify The User ///
//////////////////////


function isLoggedIn()
{
	/// if user is logged session.user returns true
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}



?>