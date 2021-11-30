<?php
    $active="exam";
    require_once("connection.php");
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        if(mysqli_query($con, "DELETE FROM exam_master WHERE exam_id='$id'"))
        {
            echo "record deleted";
            header("Location: exam_list.php");
        }
        else{
            echo "failed";
            
        }
    }

?>