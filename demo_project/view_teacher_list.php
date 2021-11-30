<?php
    $active = "teacher";
	require_once("connection.php");
	if(isset($_GET['view_id'])) {
		$view_id = $_GET['view_id'];
		$result = mysqli_query($con,"SELECT * FROM teacher_master WHERE teacher_id= '$view_id'");
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
                <h1 class=" col-lg-12 text-left">Teacher details</h1>
            </div>
   		</div>
		<div class="container student_form_setting">
			<div class="row">
				<div class=" col-lg-6 col-md-6 mt-3 right" >
					Teacher id
				</div>					
				<div class=" col-lg-6 col-md-6 mt-3" >
					<?= $row['teacher_id']; ?>
				</div>					
				<div class="col-md-6 mt-3 right">
					Teacher name
				</div>					
				<div class="col-md-6 mt-3">
					<?= $row['teacher_name']; ?>
				</div>					
				<div class="col-md-6 mt-3 right">
					Teacher college 
				</div>					
				<div class="col-md-6 mt-3">
					<?= $row['teacher_college']; ?>
				</div>					
				<div class="col-md-6 mt-3 right">
					Teacher course
				</div>					
				<div class="col-md-6 mt-3">
					<?= $row['teacher_course']; ?>
				</div>					
				<div class="col-md-6 mt-3 right">
					Teacher subject
				</div>					
				<div class="col-md-6 mt-3">
					<?= $row['teacher_subject']; ?>
				</div>					
				<div class="col-md-6 mt-3 right">
					Teacher phone
				</div>					
				<div class="col-md-6 mt-3">
					<?= $row['teacher_phone']; ?>
				</div>					
				<div class="col-md-6 mt-3 right">
					Teacher email
				</div>					
				<div class="col-md-6 mt-3">
					<?= $row['teacher_email']; ?>
				</div>					
				<div class="col-md-6 mt-3 right">
					Teacher address
				</div>					
				<div class="col-md-6 mt-3">
					<?= $row['teacher_address']; ?>
				</div>					
			</div>
		</div>
    </section>
<?php
		}
		else {
			header("Location: teacher_list.php");
			exit();	
		}
	}
	else {
		header("Location: teacher_list.php");
		exit();
	}
?>
</body>
</html>