<?php
    require_once("connection.php");
    $active = "admission";
	if(isset($_GET)) {
		$edit_id = $_GET['edit_id'];
	}
    if(isset($_POST['submit'])) {
        $college_id=$_POST['college_id'];
        $student_name = $_POST['student_name'];
        $college_name = $_POST['college_name'];
        $college_code = $_POST['college_code'];
        $admission_date = $_POST['admission_date'];
        $subject_code =$_POST['subject_code'];
        $semester = $_POST['semester'];

        $update_query="UPDATE admissions SET college_id='$college_id', student_name='$student_name', college_name='$college_name',
        college_name='$college_name', college_code='$college_code', admission_date='$admission_date', 
        subject_code='$subject_code', semester='$semester' WHERE college_id='$edit_id'";
        if(mysqli_query($con, $update_query)>0){
            echo "Updated successfully";
            header("Location: admission.php");
        }else{
            echo "Failed";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student_list</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="Assets/style.css ">
    <link rel="stylesheet" href="Assets/css/bootstrap.min.css">
</head>
<body>
<!-- ------header-------- -->
    <?php  require_once("header.php"); ?>
<!-- ----------header close----------- -->

<!-- -----------Database connection---------- -->
    <?php require_once("connection.php");?>
<!-- ------------------------------------- -->
<section>
    <div class="container">
        <div class="row padding-20">
                    <h1 class=" col-lg-6 text-center" style="font-size: 28px; font-weight: bold; border-bottom: 1px solid #C50000; padding-bottom: 10px;">---- Edit your form ----</h1>
                    <div class=" col-lg-6 text-right">
                        <a href="admission.php"><button class="btn btn-primary">Go back</button></a>
                    </div>
                </div>
        </div>
    </div>
    <div class="container student_form_setting">
        <?php
             $result = mysqli_query($con,"SELECT * FROM admissions WHERE college_id= '$edit_id'");
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result))
        {?>
                                    
        <form action="" method="post" enctype="multipart/form-data"> 
            <div class="row padding-20 ">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="college_id" style="padding-bottom: 10px; padding-top: 30px; font-weight: bold;">College id</label>
                        <input type="number" class="form-control" id="college_id" name="college_id" value="<?=$row['college_id'] ?>" >

                        <label for="college_code" style="padding-bottom: 10px; padding-top: 30px; font-weight: bold;">College code</label>
                        <input type="number" class="form-control" id="college_code" name="college_code" value="<?=$row['college_code'] ?>" >

                        <label for="college_name" style="padding-bottom: 10px; padding-top: 30px; font-weight: bold;">College name</label>
                        <input type="text" class="form-control" id="college_name" name="college_name" value="<?=$row['college_name'] ?>" >

                        <label for="subject_code" style="padding-bottom: 10px; padding-top: 30px; font-weight: bold;">subject code </label>
                        <input type="number" class="form-control" id="subject_code" name="subject_code" value="<?=$row['subject_code'] ?>">
                    </div>
                </div>
                <div class="col-lg-6">
                    <label for="student_name" style="padding-bottom: 10px; padding-top: 30px; font-weight: bold;">Student name</label>
                    <input type="text" class="form-control" id="student_name" name="student_name" value="<?=$row['student_name'] ?>">

                    <label for="admission_date" style="padding-bottom: 10px; padding-top: 30px; font-weight: bold;">Admission date</label>
                    <input type="date" class="form-control" id="admission_date" name="admission_date" value="<?=$row['admission_date'] ?>" >

                    <label for="semester" style="padding-bottom: 10px; padding-top: 30px; font-weight: bold;">semester</label>
                    <input type="number" class="form-control" id="semester" name="semester" value="<?=$row['semester'] ?>">
                    <div class="col-lg-12" style="margin-left: 380px;"><button name="submit" type="submit" class="btn btn-primary mt-5">Submit</button></div>
                </div>
            </form>
<?php }
                }
                else
                {
                    exit();
                    echo "0 result";
                }
?>
                
          </div>
        </div>
        
    </section>


    <?php
        require_once("footer.php");
    ?>
</body>
</html>