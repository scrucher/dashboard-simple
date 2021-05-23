<?php 
include('src/func.php');

$user = new User();

if (isset($_POST['login']))
{
    $user->login();
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login </title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/OcOrato---Login-form-1.css">
    <link rel="stylesheet" href="assets/css/OcOrato---Login-form.css">
</head>
<body class="" style="background-color: black !important;">
    <form class="text-center" id="form" style="font-family: Quicksand, sans-serif;background-color: rgba(44,40,52,0.73);width: 500px;padding: 40px; margin-top: 80px;" method="post" action="index.php">
        <div class="text-center"><img class="rounded img-fluid" id="image" style="width:auto;height:auto;" src="assets/img/paradisse-inn.png"></div>
        <h1 id="head" style="color:rgb(193,166,83);">Welcome Back !</h1>
        <div class="container" style="font-size:16px !important; color: Red;">
        <?php 
        $user->display_error(); 
        ?>
        </div>
        <div class="form-group mb-3"><input class="form-control" type="text" id="formum" style="text-align: center;" placeholder="Username" name="username"></div>
        <div class="form-group mb-3"><input class="form-control" type="password" id="formum2" style="text-align: center;" placeholder="Password" name="password"></div>
        <button class="btn btn-light text-center shadow-sm" id="butonas" style="width: 60%;height: 100%;margin-bottom: 10px;background-color: rgb(106,176,209);" type="submit" name="login">LogIn</button>
    </form>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>