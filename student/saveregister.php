<?php

session_start();
require "../config/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    if (isset($_POST['addregister'])) 
    {
        $state = true;

        $name = mysqli_real_escape_string($link, trim($_POST['name']));

        $start = mysqli_real_escape_string($link, trim($_POST['start']));
        $end = mysqli_real_escape_string($link, trim($_POST['end']));

        $category = mysqli_real_escape_string($link, trim($_POST['category']));

        $eveid = mysqli_real_escape_string($link, trim($_POST['eveid']));

        $student = mysqli_real_escape_string($link, trim($_SESSION['student']));

        $studentname = mysqli_real_escape_string($link, trim($_SESSION['studentname']));

        //$students = mysqli_real_escape_string($link, trim(implode(',', array_column(json_decode($_POST['students']), 'value'))));
		$students = mysqli_real_escape_string($link, trim($_POST['students']));
        $uid = "reg_".substr(bin2hex(random_bytes(10)),0, 10);

        

        date_default_timezone_set("Asia/Calcutta");
        $date = date("d/m/Y h:i:s A");

        // $checkRecord = mysqli_query($link, "SELECT * FROM events_2022_registers WHERE email='$email'");

        // $totalrows = mysqli_num_rows($checkRecord);

            $query = "insert into events_2022_registers (uid,events_uid,name,start,end,category,students,students_email,students_name,status) values ('$uid','$eveid','$name','$start','$end','$category','$students','$student','$studentname','pending')";

            if (!mysqli_query($link, $query)) 
            {
                $state = false;
            }

            if ($state) 
            {
                $_SESSION["save"] = "yes";
                echo "<script> history.back() </script>";
            } 
            else 
            {
                $_SESSION["fail"] = "yes";
                echo "<script> history.back() </script>";
            }
    } 
    else 
    {
        echo "<script> history.back() </script>";
    }

    mysqli_close($link);
}
