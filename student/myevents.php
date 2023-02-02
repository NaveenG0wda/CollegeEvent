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
        <title>My Events</title>
        
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
                        <button class="btn shadow-none btn-sm text-light" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions"><i class="bi bi-list fs-4"></i></button>
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
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="applyevents.php">Apply Events</a>
                    <a class="list-group-item text-info list-group-item-action list-group-item-light p-3" href="myevents.php">My Events</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="logout.php">Logout</a>
                </div>
            </div>
        </div>

                

        <?php
        if (isset($_SESSION["save"])) {
        ?>

            <div class="position-fixed  top-0 end-0 p-3" style="z-index: 11">
                <div id="liveToast" class="toast bg-success bg-opacity-75 hide" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body ms-auto text-white">
                            Event Deleted Successfully !
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            </div>

        <?php
        }
        unset($_SESSION["save"]);
        ?>


        <?php
        if (isset($_SESSION["fail"])) {
        ?>

            <div class="position-fixed  top-0 end-0 p-3" style="z-index: 11">
                <div id="liveToast" class="toast bg-danger bg-opacity-75 hide" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body ms-auto text-white">
                        Event Deleting Failed !
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            </div>

        <?php
        }
        unset($_SESSION["fail"]);
        ?>


        <?php
        if (isset($_SESSION["exists"])) {
        ?>

            <div class="position-fixed top-0 end-0 toastae p-3" style="z-index: 11">
                <div id="liveToast" class="toast bg-warning hide" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body ms-auto text-white">
                            Event Already Exists !
                        </div>
                        <button type="button" class="btn-close shadow-none btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            </div>

        <?php
        }
        unset($_SESSION["exists"]);
        ?>



                <!-- Page content-->
                <div class="container flex-fill">
                <h4 class="my-5 text-center text-decoration-underline tug-1">My Events</h4>  
                    <div class="container">
                    <form action="deleteevent.php" id="deleteeventform" method="post">
                        </form>
                            
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
                                        CATEGORY
                                     </th>
                                     <th>
                                        STUDENTS
                                     </th>
                                     <th>
                                        STATUS
                                     </th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php
                                  $query = "select * from events_2022_registers where students_email = '".$_SESSION["student"]."'";
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
                                         <?=$row["category"]?>
                                     </td>
                                     <td>
                                         <?=$row["students"]?>
                                     </td>
                                     <td>
                                         <?=$row["status"]?>
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
        $(function() {

            $('.toast').toast('show');

            $("#saveeventform").on("submit", function(e) {
                debugger;

                var name = $("#name").val()
                var start = $("#start").val()
                var end = $("#end").val()

                var state = true;


                if (end != "") {
                    $("#end").removeClass("is-invalid");
                } else {
                    $("#end").addClass("is-invalid");
                    e.preventDefault();
                    state = false;
                }

                if (start != "") {
                    $("#start").removeClass("is-invalid");
                } else {
                    $("#start").addClass("is-invalid");
                    e.preventDefault();
                    state = false;
                }

                if (name != "") {
                    $("#name").removeClass("is-invalid");
                } else {
                    $("#name").addClass("is-invalid");
                    e.preventDefault();
                    state = false;
                }

                if(state !== false)
                {
                    var rlink = "registerevent.php?name="+name+"&start="+start+"&end="+end+"&uid=";
                    $("#link").val(rlink)
                }

            })

        })
    </script>
    </body>
</html>
