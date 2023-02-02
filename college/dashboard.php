<?php
session_start();
require "../config/database.php";

if (!isset($_SESSION["college"])) {
  echo "<script> location.replace('login.php') </script>";
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard</title>
        
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/bootstrap.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    </head>
    <body>
      
            
            <!-- Page content wrapper-->
            <div class="d-flex flex-column min-vh-100">

                <!-- Top navigation-->

                <nav class="navbar navbar-expand-lg py-3 navbar-dark bg-info border-bottom border-info">
                    <div class="container-fluid">
                        <button class="btn shadow-none btn-sm text-light"  data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions"><i class="bi bi-list fs-4"></i></button>
                        <!-- <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="bi bi-list fs-4"></i></button> -->
                    </div>
                </nav>

                
        <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
            <div class="offcanvas-header bg-info py-4">
                <h5 class="offcanvas-title w-100 text-center text-light" id="offcanvasWithBothOptionsLabel">MENU</h5>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div class="list-group text-break list-group-flush fs-4 text-center">
                    <a class="list-group-item text-info list-group-item-action list-group-item-light p-3" href="dashboard.php">Dashboard</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="addevents.php">Add Events</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="viewevents.php">View Events</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="registrations.php">Registrations</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="logout.php">Logout</a>
                </div>
            </div>
        </div>

                <!-- Page content-->
                <div class="container flex-fill">
                    <h1 class="m-5 display-6 text-center">DASHBOARD</h1>       
					<img src="a.png" style="width:300px;height:100%;" />
                </div>

            </div>


       

        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="../js/scripts.js"></script>
    </body>
</html>
