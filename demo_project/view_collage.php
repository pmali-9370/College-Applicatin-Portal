<?php
    $active = "college";
	require_once("connection.php");
	if(isset($_GET['view_id'])) {
		$id = $_GET['view_id'];
		$result = mysqli_query($con,"SELECT * FROM add_clg_master WHERE clg_id= '$id'");
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
                <h1 class=" col-lg-12 text-center">College details</h1>
            </div>
   		</div>
		<div class="container student_form_setting">
			<div class="row">
				<div class="col-md-6 mt-3">
					College id
				</div>					
				<div class="col-md-6 mt-3">
					<?= $row['clg_id']; ?>
				</div>					
				<div class="col-md-6 mt-3">
					Collage Name
				</div>					
				<div class="col-md-6 mt-3">
					<?= $row['clg_name']; ?>
				</div>					
				<div class="col-md-6 mt-3">
					Collage address
				</div>					
				<div class="col-md-6 mt-3">
					<?= $row['clg_adderess']; ?>
				</div>					
				<div class="col-md-6 mt-3">
					Collage Number
				</div>					
				<div class="col-md-6 mt-3">
					<?= $row['clg_number']; ?>
				</div>					
				<div class="col-md-6 mt-3">
					Collage Email
				</div>					
				<div class="col-md-6 mt-3">
					<?= $row['clg_email']; ?>
				</div>					
				<div class="col-md-6 mt-3">
					Collage Course
				</div>					
				<div class="col-md-6 mt-3">
					<?= $row['clg_cource']; ?>
				</div>					
				<div class="col-md-6 mt-3">
					Collage Code
				</div>					
				<div class="col-md-6 mt-3">
					<?= $row['clg_code']; ?>
				</div>					
			</div>
		</div>
    </section>
<?php
		}
		else {
			header("Location: college.php");
			exit();	
		}
	}
	else {
		header("Location: college.php");
		exit();
	}
?>
</body>
</html>