 <?php
	$active = "student";
	require_once("connection.php");
	if(isset($_GET['dlt_id'])) {
		$dlt_id = $_GET['dlt_id'];
			if(mysqli_query($con, "DELETE FROM std_admissions_master WHERE std_id='$dlt_id'"))
			{
				echo "record deleted successfully";
				ob_start();
				header ("Location: student_list.php");
				// die();
				ob_end_flush();
			}
			else
			{
				echo "record not deleted";
				ob_start();
				header("Location: student_list.php");
				die();
				ob_end_flush();
			}
			die();
	} 
?> 

