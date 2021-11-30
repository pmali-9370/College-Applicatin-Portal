<?php
    require_once("connection.php");
    $active = "admission";
    if(isset($_POST['submit'])) {
        $college_id=$_POST['college_id'];
        $student_name = $_POST['student_name'];
        $college_name = $_POST['college_name'];
        $college_code = $_POST['college_code'];
        $admission_date = $_POST['admission_date'];
        $subject_code =$_POST['subject_code'];
        $marksheet_name =$_FILES['marksheet']['name'];
        $marksheet_tempname =$_FILES['marksheet']['tmp_name'];
        $marksheet_folder ="assets/doc/marksheet/".$marksheet_name;
        $semester = $_POST['semester'];
        if(move_uploaded_file($marksheet_tempname, $marksheet_folder)){
            $msg="File has been uploaded successfully";
        }else{
            $msg="File Failed";
        }
        $insert_result="INSERT INTO admissions (college_id, student_name, college_name, college_code, admission_date, subject_code, marksheet, semester) VALUES 
        ( '$college_id', '$student_name', '$college_name', '$college_code', '$admission_date', '$subject_code', '$marksheet_name', '$semester')";
        if(mysqli_query($con, $insert_result)){
            echo "Data successfully inserted";
            header("Location: admission_list.php");
        }else{
            echo "Data insertion Failed";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission</title>
    <link rel="stylesheet" href="Assets/style.css ">
    <link rel="stylesheet" href="Assets/css/bootstrap.min.css">
</head>
<body>
             <!-- ------header-------- -->
             <?php  require_once("header.php"); ?>
             <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="admission_list.php">Admission List</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Admission Form</li>
                        </ol>
            </nav>
          <!-- ----------header close----------- -->
          <section>
        <div class="container">
        <div class="row padding-20">
                <h1 class=" col-lg-6 text-left">Enter admission details</h1>
                <div class=" col-lg-6 text-right">
                    <a href="admission_list.php"><button class="btn btn-primary">Admissions</button></a>
                </div>
            <form action="" method="post" enctype="multipart/form-data"> 
                <div class="row padding-20 student_form_setting">
                    <div class="col-lg-6">
                    <div class="form-group">
                         
                         <label for="college_id" style="padding-bottom: 10px; padding-top: 30px; font-weight: bold;" >College id</label>
                        <input type="number" class="form-control" id="college_id" name="college_id" placeholder="Enter your college id" >

                        <label for="college_code" style="padding-bottom: 10px; padding-top: 30px; font-weight: bold;" >College code</label>
                        <input type="number" class="form-control" id="college_code" name="college_code" placeholder="Enter your college code" >

                        <label for="college_name" style="padding-bottom: 10px; padding-top: 30px; font-weight: bold;"> College name</label>
                        <input type="text" class="form-control" id="college_name" name="college_name" placeholder="Enter your college name" >

                        <label for="subject_code" style="padding-bottom: 10px; padding-top: 30px; font-weight: bold;">Subject Code</label>
                        <input type="number" class="form-control" id="subject_code" name="subject_code" placeholder="Enter your subject code" >

                        <label for="marksheet" style="font-weight: bold; margin-bottom: 20px">Marksheet photo</label>
                        <input type="file" class="form-control-file" id="marksheet" name="marksheet">
                    </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="student_name" class="label-padding" style="padding-bottom: 10px; padding-top: 30px; font-weight: bold;">Student Name</label>
                            <input type="text" class="form-control" id="student_name" name="student_name" placeholder="Enter your name">

                            <label for="admission_date" class="label-padding" style="padding-bottom: 10px; padding-top: 30px; font-weight: bold;">Enter admission date</label>
                            <input type="date" class="form-control" id="admission_date" name="admission_date"  placeholder="Enter your exam date">

                            <label for="semester" class="label-padding" style="padding-bottom: 10px; padding-top: 30px; font-weight: bold;">Semester</label>
                            <input type="number" class="form-control" id="semester" name="semester" placeholder="Enter your semester">

                          </div>
                        </div>
                        <div class="col-lg-12" style="margin-bottom: 20px; margin-top: 20px; margin-left: 500px;">
                        <div class="text-center">
                        <button  name="submit" type="submit" class="btn btn-primary btn-center mr-5">Submit</button>
                        </div>
                    </div>
                    </div>
                    
                </div>
            </form>
        </div>
    </section>



          <?php
        require_once("footer.php");
    ?>
</body>