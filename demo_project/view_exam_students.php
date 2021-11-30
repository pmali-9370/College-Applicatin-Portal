<?php
    $active = "exam";
	require_once("connection.php");
	if(isset($_GET['exam_id'])) {
		$exam_id = $_GET['exam_id'];
		$result = mysqli_query($con,"SELECT * FROM exam_master WHERE exam_id= '$exam_id'");
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
                <h1 class=" col-lg-12 text-left">College details</h1>
            </div>
   		</div>
		<div class="container student_form_setting">
			<div class="row">
				<div class="col-md-6 mt-3">
					Exam id
				</div>					
				<div class="col-md-6 mt-3">
					<?= $row['exam_id']; ?>
				</div>					
				<div class="col-md-6 mt-3">
					Exam name
				</div>					
				<div class="col-md-6 mt-3">
					<?= $row['exam_name']; ?>
				</div>					
				<div class="col-md-6 mt-3">
					Exam college name
				</div>					
				<div class="col-md-6 mt-3">
					<?= $row['exam_clg_name']; ?>
				</div>					
				<div class="col-md-6 mt-3">
					Exam college code
				</div>					
				<div class="col-md-6 mt-3">
					<?= $row['exam_clg_code']; ?>
				</div>					
				<div class="col-md-6 mt-3">
					Exam date
				</div>					
				<div class="col-md-6 mt-3">
					<?= $row['exam_date']; ?>
				</div>					
				<div class="col-md-6 mt-3">
					Exam sub code
				</div>					
				<div class="col-md-6 mt-3">
					<?= $row['exam_sub_code']; ?>
				</div>					
				<div class="col-md-6 mt-3">
					Exam semester
				</div>					
				<div class="col-md-6 mt-3">
					<?= $row['exam_semester']; ?>
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