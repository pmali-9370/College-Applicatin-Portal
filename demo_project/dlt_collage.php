<?php
    $active = "college";
  	require_once("connection.php");
      if(isset($_GET['clg_id'])) {
          $clg_id = $_GET['clg_id'];
              if(mysqli_query($con, "DELETE FROM add_clg_master WHERE clg_id='$clg_id'"))
              {
                  echo "record deleted successfully";
                  ob_start();
                  header ("Location: college_list.php");
                  // die();
                  ob_end_flush();
              }
              else
              {
                  echo "record not deleted";
                  ob_start();
                  header("Location: college_list.php");
                  die();
                  ob_end_flush();
              }
              die();
      } 
?>