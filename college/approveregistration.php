<?php
session_start();

include "../config/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    if (isset($_POST['approvebutton'])) 
    { 
            $qstate = true;

            $id = mysqli_real_escape_string($link, trim($_POST['approvebutton']));
            // $uid = "uid_".substr(bin2hex(random_bytes(10)),0, 10);

                $query = "update events_2022_registers set status = 'approved' where id = '$id'";
                  
                    if(!mysqli_query($link,$query))
                    {
                        $qstate = false;
                    }
            
    
            if ($qstate) 
            {
                $_SESSION["save"] = 'success';
                echo "<script> location.replace('registrations.php') </script>";
            }
            else
            {
                $_SESSION["fail"] = 'success';
                echo "<script> location.replace('registrations.php') </script>";
            }  
        
    } 
    else 
    {
        echo "<script> location.replace('registrations.php') </script>";
    }
}

mysqli_close($link);
