<?php
    $active = "student";
	require_once("connection.php");
	if(isset($_GET['view_id'])) {
		$view_id = $_GET['view_id'];
		$result = mysqli_query($con,"SELECT * FROM std_admissions_master WHERE std_id= '$view_id'");
		$num = mysqli_num_rows($result);
        if($num > 0){
			$row = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student_list</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="Assets/css/bootstrap.min.css">
</head>
<body>
    <!-- ------header-------- -->
    <?php  require_once("header.php"); ?>
    <!-- ----------header close----------- -->
    <section>
        <div class="container">
            <div class="row padding-20">
                <h1 class=" col-lg-12 text-left">Student details</h1>
            </div>
   		</div>
		<div class="container student_form_setting">
			<div class="row">
				<div class=" col-lg-6 col-md-6 mt-3 right" >
					Student id
				</div>					
				<div class=" col-lg-6 col-md-6 mt-3" >
					<?= $row['std_id']; ?>
				</div>					
				<div class="col-md-6 mt-3 right">
					Student roll no
				</div>					
				<div class="col-md-6 mt-3">
					<?= $row['std_rno']; ?>
				</div>					
				<div class="col-md-6 mt-3 right">
					Student name 
				</div>					
				<div class="col-md-6 mt-3">
					<?= $row['std_name']; ?>
				</div>					
				<div class="col-md-6 mt-3 right">
					Student subject
				</div>					
				<div class="col-md-6 mt-3">
					<?= $row['std_sub']; ?>
				</div>					
				<div class="col-md-6 mt-3 right">
					Student course
				</div>					
				<div class="col-md-6 mt-3">
					<?= $row['std_cource']; ?>
				</div>					
				<div class="col-md-6 mt-3 right">
					Student marks
				</div>					
				<div class="col-md-6 mt-3">
					<?= $row['std_marks']; ?>
				</div>					
				<div class="col-md-6 mt-3 right">
					Student result
				</div>					
				<div class="col-md-6 mt-3">
					<?= $row['std_result']; ?>
				</div>					
				<div class="col-md-6 mt-3 right">
					Student college
				</div>					
				<div class="col-md-6 mt-3">
					<?= $row['std_college']; ?>
				</div>					
				<div class="col-md-6 mt-3 right">
					Student number
				</div>					
				<div class="col-md-6 mt-3">
					<?= $row['std_number']; ?>
				</div>					
				<div class="col-md-6 mt-3 right">
					Student email
				</div>					
				<div class="col-md-6 mt-3">
					<?= $row['std_email']; ?>
				</div>									
			</div>
		</div>
    </section>
<?php
		}
		else {
			header("Location: student_list.php");
			exit();	
		}
	}
	else {
		header("Location: student_list.php");
		exit();
	}
?>
</body>
</html>