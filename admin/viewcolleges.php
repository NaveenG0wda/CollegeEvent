<?php
session_start();
require "../config/database.php";

if (!isset($_SESSION["admin"])) {
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
        <title>View / Delete Colleges</title>
        
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
                        <button class="btn shadow-none btn-sm text-light"    data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions"><i class="bi bi-list fs-4"></i></button>
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
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="dashboard.php">Dashboard</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="viewstudents.php">View Students</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="addcolleges.php">Add Colleges</a>
                    <a class="list-group-item text-info list-group-item-action list-group-item-light p-3" href="viewcolleges.php">View Colleges</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="viewevents.php">View Events</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="logout.php">Logout</a>
                </div>
            </div>
        </div>


                <?php
        if (isset($_SESSION["dsave"])) {
        ?>

            <div class="position-fixed  top-0 end-0 p-3" style="z-index: 11">
                <div id="liveToast" class="toast bg-success bg-opacity-75 hide" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body ms-auto text-white">
                            College Deletetion Successfull !
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            </div>

        <?php
        }
        unset($_SESSION["dsave"]);
        ?>


        <?php
        if (isset($_SESSION["dfail"])) {
        ?>

            <div class="position-fixed  top-0 end-0 p-3" style="z-index: 11">
                <div id="liveToast" class="toast bg-danger bg-opacity-75 hide" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body ms-auto text-white">
                            College Deletetion Failed !
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            </div>

        <?php
        }
        unset($_SESSION["dfail"]);
        ?>



                <!-- Page content-->
                <div class="container flex-fill">
                    <h4 class="my-5 text-center text-decoration-underline tug-1">View / Delete Colleges</h4>  
                    <div class="container">
                        <form action="deletecollege.php" id="deletecollegeform" method="post"></form>
                     <div class="table-responsive">
                         <table class="table table-bordered table-hover table-sm">
                             <thead class="bg-info text-light">
                                 <tr class="align-middle text-nowrap text-center">
                                     <th>
                                         NAME
                                     </th>
                                     <th>
                                         EMAIL
                                     </th>
                                     <th>
                                         PHONE
                                     </th>
                                     <th>
                                         ACTION
                                     </th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php
                                  $query = "select * from events_2022_colleges";
                                  $result = mysqli_query($link,$query);
                                  while($row = mysqli_fetch_array($result))
                                  {
                                 ?>
                                 <tr class="align-middle text-nowrap text-center">
                                     <td>
                                         <?=$row["name"]?>
                                     </td>
                                     <td>
                                         <?=$row["email"]?>
                                     </td>
                                     <td>
                                         <?=$row["phone"]?>
                                     </td>
                                     <td>
                                         <button type="submit" class="btn btn-sm shadow-none btn-danger" name="deletebutton" form="deletecollegeform" value="<?=$row["id"]?>">
                                         <i class="bi bi-trash"></i>
                                         </button>
                                     </td>
                                 </tr>

                                 <?php
                                  }
                                 ?>
                             </tbody>
                         </table>
                     </div>
                    </div>                 
                </div>

            </div>


        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="../js/scripts.js"></script>
        <script>
            $(function(){
                $('.toast').toast('show');
            })
        </script>
    </body>
</html>
