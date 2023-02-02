<?php
session_start();

include "../config/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    if (isset($_POST['addevent'])) 
    {
        $qstate = true;


        $name = mysqli_real_escape_string($link, trim($_POST['name']));
        $start = mysqli_real_escape_string($link, trim($_POST['start']));
        $end = mysqli_real_escape_string($link, trim($_POST['end']));
        $category = mysqli_real_escape_string($link, trim($_POST['category']));
        $uid = "eve_" . substr(bin2hex(random_bytes(10)), 0, 10);
        $rlink = mysqli_real_escape_string($link, trim($_POST['link'])).$uid;

        $checkRecord = mysqli_query($link, "SELECT * FROM events_2022_events WHERE name='$name'");

        $totalrows = mysqli_num_rows($checkRecord);

        if ($totalrows > 0) 
        {
            $_SESSION["exists"] = 'yes';
            echo "<script> location.replace('addevents.php') </script>";
        } 
        else 
        {

            $query = "insert into events_2022_events (uid,name,start,end,link,status,category) values ('$uid', '$name', '$start', '$end', '$rlink', 'active','$category')";

            if (!mysqli_query($link, $query)) 
            {
                $qstate = false;
            }
            

            if ($qstate) 
            {
                $_SESSION["save"] = 'success';
                echo "<script> location.replace('addevents.php') </script>";
            } 
            else 
            {
                $_SESSION["fail"] = 'success';
                echo "<script> location.replace('addevents.php') </script>";
            }
        }

    } 
    else 
    {
        echo "<script> location.replace('addevents.php') </script>";
    }
}

mysqli_close($link);
