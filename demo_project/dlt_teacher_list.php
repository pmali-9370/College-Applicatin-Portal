<?php
    $active="teacher";
    require_once("connection.php");
    if(isset($_GET['id'])) {
        $dlt_id=$_GET['id'];
        if(mysqli_query($con, "DELETE FROM teacher_master WHERE teacher_id='$dlt_id'") ) {

            echo "Record deleted";
            header("Location: teacher_list.php");
        }
        else{
            echo "Failed";
        }
    }
?>