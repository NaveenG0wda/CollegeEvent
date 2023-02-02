<?php
session_start();

include "../config/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    if (isset($_POST['addcollege'])) 
    {
        $qstate = true;


        $name = mysqli_real_escape_string($link, trim($_POST['name']));
        $phone = mysqli_real_escape_string($link, trim($_POST['phone']));
        $email = mysqli_real_escape_string($link, trim($_POST['email']));
        $password = mysqli_real_escape_string($link, trim($_POST['password']));
        $uid = "col_" . substr(bin2hex(random_bytes(10)), 0, 10);

        $checkRecord = mysqli_query($link, "SELECT * FROM events_2022_colleges WHERE email='$email'");

        $totalrows = mysqli_num_rows($checkRecord);

        if ($totalrows > 0) 
        {
            $_SESSION["exists"] = 'yes';
            echo "<script> location.replace('addcolleges.php') </script>";
        } 
        else 
        {

            $query = "insert into events_2022_colleges (uid,name,email,password,phone) values ('$uid', '$name', '$email', '$password', '$phone')";

            if (!mysqli_query($link, $query)) 
            {
                $qstate = false;
            }
            

            if ($qstate) 
            {
                $_SESSION["save"] = 'success';
                echo "<script> location.replace('addcolleges.php') </script>";
            } 
            else 
            {
                $_SESSION["fail"] = 'success';
                echo "<script> location.replace('addcolleges.php') </script>";
            }
        }

    } 
    else 
    {
        echo "<script> location.replace('addcolleges.php') </script>";
    }
}

mysqli_close($link);
