<?php
    $active = "admission";
	require_once("connection.php");
	if(isset($_GET['id'])) {
		$id = $_GET['id'];
		$result = mysqli_query($con,"SELECT * FROM admissions WHERE college_id= '$id'");
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
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
    <!-- ------header-------- -->
    <?php  require_once("header.php"); ?>
    <!-- ----------header close----------- -->
    <section>
        <div class="container">
            <div class="row padding-20">
                <h1 class=" col-lg-12 text-center">Admission details</h1>
            </div>
   		</div>
		<div class="container student_form_setting">
			<div class="row">
				<div class="col-md-6 mt-3">
					College id
				</div>					
				<div class="col-md-6 mt-3">
					<?= $row['college_id']; ?>
				</div>					
				<div class="col-md-6 mt-3">
					Student name
				</div>					
				<div class="col-md-6 mt-3">
					<?= $row['student_name']; ?>
				</div>					
				<div class="col-md-6 mt-3">
					Collage name
				</div>					
				<div class="col-md-6 mt-3">
					<?= $row['college_name']; ?>
				</div>					
				<div class="col-md-6 mt-3">
					Collage code
				</div>					
				<div class="col-md-6 mt-3">
					<?= $row['college_code']; ?>
				</div>					
				<div class="col-md-6 mt-3">
					Admission date
				</div>					
				<div class="col-md-6 mt-3">
					<?= $row['admission_date']; ?>
				</div>					
				<div class="col-md-6 mt-3">
					Subject code
				</div>					
				<div class="col-md-6 mt-3">
					<?= $row['subject_code']; ?>
				</div>					
				<div class="col-md-6 mt-3" >
					Semester
				</div>					
				<div class="col-md-6 mt-3">
					<?= $row['semester']; ?>
				</div>					
			</div>
		</div>
    </section>
<?php
		}
		else {
			header("Location: admission.php");
			exit();	
		}
	}
	else {
		header("Location: admission.php");
		exit();
	}
?>
</body>
</html>