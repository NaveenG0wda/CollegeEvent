<?php
session_start();
require "./config/database.php";


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">

    <style>
        .bg-image {
            background: url("images/bg.jpg");
            /* background-blend-mode: screen; */
            background-size: cover;
            /* background-color: darkgray; */
        }
    </style>

</head>

<body>
    <div class="d-flex flex-column min-vh-100 bg-image">

        <nav class="navbar shadow-sm navbar-expand-lg navbar-dark py-3 bg-info">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">EVENTS</a>
                        <button class="btn btn-outline-info py-1 text-light shadow-none btn-sm" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                            <i class="bi bi-list fs-4"></i>
                        </button>
            </div>
        </nav>



        <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
            <div class="offcanvas-header bg-info py-4">
                <h5 class="offcanvas-title w-100 text-center text-light" id="offcanvasWithBothOptionsLabel">MENU</h5>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div class="list-group text-break list-group-flush fs-4 text-center">
                    <a class="list-group-item list-group-item-action text-info list-group-item-light p-3" href="#!">Home</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="admin/login.php">Admin</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="college/login.php">College</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="student/login.php">Student</a>
                </div>
            </div>
        </div>

		<h1 style="text-align:center;padding-top:15px;">Welcome to Event Management</h1>

 <!-- Page content-->
                <div class="container flex-fill">
                    <h4 class="my-5 text-center text-decoration-underline tug-1">Upcoming Events List</h4>  
                    <div class="container">
                        <form action="deletecollege.php" id="deletecollegeform" method="post"></form>   
                     <div class="table-responsive">
                         <table class="table table-bordered table-hover table-sm">
                             <thead class="bg-info text-light">
                                 <tr class="align-middle text-nowrap text-center">
                                     <th>
                                        EVENT NAME
                                     </th>
                                     <th>
                                        START DATE
                                     </th>
                                     <th>
                                        END DATE
                                     </th>
                                     <th>
                                        LINK
                                     </th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php
                                  $query = "select * from events_2022_events";
                                  $result = mysqli_query($link,$query);
                                  while($row = mysqli_fetch_array($result))
                                  {
                                 ?>
                                 <tr class="align-middle text-nowrap text-center">
                                     <td>
                                         <?=$row["name"]?>
                                     </td>
                                     <td>
                                         <?=$row["start"]?>
                                     </td>
                                     <td>
                                         <?=$row["end"]?>
                                     </td>
                                     <td>
                                        <a href="./student/<?=$row["link"]?>" target="_blank" class="tug-1">LINK</a> 
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




    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>