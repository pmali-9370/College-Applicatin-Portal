<?php
    $active="admission";
    require_once("connection.php");
    if(isset($_GET['id'])) {
        $dlt_id=$_GET['id'];
        if(mysqli_query($con, "DELETE FROM admissions WHERE college_id='$dlt_id'")) {

            echo "Record deleted successfully";
            header("Location: admission_list.php");
        }
        else{
            echo "Failed";
        }
    }
?>