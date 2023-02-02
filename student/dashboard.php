<?php
session_start();
require "../config/database.php";

if (!isset($_SESSION["student"])) {
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
            <div  class="d-flex flex-column min-vh-100">

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
                    <a class="list-group-item list-group-item-action text-info list-group-item-light p-3" href="dashboard.php">Dashboard</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="applyevents.php">Apply Events</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="myevents.php">My Events</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="logout.php">Logout</a>
                </div>
            </div>
        </div>


                <!-- Page content-->
                <div class="container flex-fill mb-4">
                    <h1 class="m-5 display-6 text-center tug-1 text-decoration-underline">DASHBOARD</h1> 

                    <div class="row justify-content-center gap-3 mb-5">
                     <div class="col-md-12">
                         <h5 class="text-decoration-underline tug-1">Category : CULTURAL</h5>
                     </div>
                     <div class="col-md-12">
                         <div class="row">
                         <?php
                           $queryc = "select * from events_2022_events where category = 'cultural'";
                           $resultc = mysqli_query($link,$queryc);
                           while($rowc = mysqli_fetch_array($resultc))
                           {
                         ?>
                          <div class="col-md-4">
                              <div class="card">
                                  <div class="card-header bg-info text-light fw-bold text-capitalize">
                                    <?=$rowc["name"]?>
                                  </div>
                                  <div class="card-body">
                                      <span class="d-block">Start Date : <?=$rowc["start"]?></span>
                                      <span class="d-block">End Date : <?=$rowc["end"]?></span>
                                  </div>
                              </div>
                          </div>
                         <?php
                           }
                         ?>
                         </div>
                     </div>
                    </div>  

                    <div class="row justify-content-center gap-3">
                     <div class="col-md-12">
                         <h5 class="text-decoration-underline tug-1">Category : SPORTS</h5>
                     </div>
                     <div class="col-md-12">
                         <div class="row">
                         <?php
                           $queryc = "select * from events_2022_events where category = 'sports'";
                           $resultc = mysqli_query($link,$queryc);
                           while($rowc = mysqli_fetch_array($resultc))
                           {
                         ?>
                          <div class="col-md-4">
                              <div class="card">
                                  <div class="card-header bg-info text-light fw-bold text-capitalize">
                                    <?=$rowc["name"]?>
                                  </div>
                                  <div class="card-body">
                                      <span class="d-block">Start Date : <?=$rowc["start"]?></span>
                                      <span class="d-block">End Date : <?=$rowc["end"]?></span>
                                  </div>
                              </div>
                          </div>
                         <?php
                           }
                         ?>
                         </div>
                     </div>
                    </div>            
                </div>

            </div>


       

        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="../js/scripts.js"></script>
    </body>
</html>
