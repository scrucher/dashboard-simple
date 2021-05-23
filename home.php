<?php 

include('src/func.php');
session_start();


$user = new User;
if (!$user->isLoggedIn())
{
    header("location: index.php");
}
if (isset($_GET['logout'])) 
{
    session_destroy();
    unset($_SESSION['user']);
    header("location: index.php");
} 

?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Table - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
</head>

<body id="page-top" >
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" style="background: black;">
        <div class="container-fluid d-flex flex-column p-0"><a href="https://saley.ma/" class="logo me-auto"><img src="assets/img/paradisse-inn.png"  class="img-fluid" style="padding: 20px 20px 0px; "></a>
        
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link active" href="home.php"><i class="fas fa-table"></i><span>Table</span></a></li>
                    <!--<li class="nav-item"><a class="nav-link" href=""><i class="far fa-user-circle"></i><span>Features</span></a></li>
                    <li class="nav-item"><a class="nav-link" href=""><i class="fas fa-user-circle"></i><span>Features</span></a></li>
                    <li class="nav-item"><a class="nav-link" href=""><i class="fas fa-user-circle"></i><span>Features</span></a></li>
                    <li class="nav-item"><a class="nav-link" href=""><i class="fas fa-user-circle"></i><span>Features</span></a></li>-->


                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top" style="background-color:#d4a141" >
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                    <h2 style="padding-left: 0px ;"> Welcome To Admin Dashboard</h2>
                        <ul class="navbar-nav flex-nowrap ml-auto">
                            
                            
                            
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-toggle="dropdown" href="#"><span class="d-none d-lg-inline mr-2 text-gray-600 small"><?php echo $_SESSION['username']; ?></span><img class="border rounded-circle img-profile" src="assets/img/avatars/avatar.png"></a>
                                    <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in">
                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="home.php?logout='1'"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">ORDERS</h3>
                    <div class="card shadow"  >
                        <div class="card-header py-3" style="background: black; color:#d4a141 !important;">
                            <h5 class=" font-weight-bold" >Orders Info</h5>
                        </div>
                        <div class="card-body">
                            
                            <div class="table-responsive table mt-2" id="dataTable" style="color: blanchedalmond;" role="grid" aria-describedby="dataTable_info" >
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Res Date</th>
                                            <th>Res Time</th>
                                            <th>People</th>
                                            <th>Ordered At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        
                                            $data = new Orders();
                                            $data->displayOrders();
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="container-fluid" style="padding-top: 25px;">
                    <h3 class="text-dark mb-4">MESSAGES</h3>
                    <div class="card shadow">
                        <div class="card-header py-3" style="background: black; color:#d4a141 !important;">
                            <h5 class="font-weight-bold">Contact Info</h5>
                        </div>
                        <div class="card-body">
                            
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Subject</th>
                                            <th>Message</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        
                                            $data = new Contact();
                                            $data->displayMessages();
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                </div>
                
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Subscriber</h3>
                    <div class="card shadow">
                        <div class="card-header py-3" style="background: black; color:#d4a141 !important;">
                            <h5 class=" font-weight-bold">Subscriber's Info</h5>
                        </div>
                        <div class="card-body">
                            
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Email</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        
                                            $sub = new Subscribers();
                                            $sub->displaySubscribers();
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © <a href="https://saley.ma">Saley.Inc</a> 2021</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>