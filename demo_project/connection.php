<?php
        $con = mysqli_connect("localhost","root","");
        $database = mysqli_select_db($con,"demo_project");
        if($database)
        {
            //echo "Database connected";
        }
        else{
            echo "database not connected";
        }
        
    ?>