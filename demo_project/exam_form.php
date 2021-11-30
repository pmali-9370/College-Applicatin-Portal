
<?php
    $active = "exam";
    require_once ("connection.php");
    if(isset ($_POST['submit'])) {
        $exam_name = $_POST['exam_name'];
        $exam_clg_name = $_POST['exam_clg_name'];
        $exam_clg_code = $_POST['exam_clg_code'];
        $exam_date = $_POST['exam_date'];
        $exam_sub_code = $_POST['exam_sub_code'];
        $result_photo_name =$_FILES['result_photo']['name'];
        $result_photo_tempname =$_FILES['result_photo']['tmp_name'];
        $result_photo_folder ="assets/doc/result_photo/".$result_photo_name;
        $exam_semester = $_POST['exam_semester'];
        if(move_uploaded_file($result_photo_tempname, $result_photo_folder)){
            $msg="File  uploaded successfully";
        }else{
            $msg= "Failed";
        }
        $insert_exam_result = "INSERT INTO exam_master (exam_name, exam_clg_name, exam_clg_code, exam_date, exam_sub_code, result_photo, exam_semester) VALUES 
        ('$exam_name', '$exam_clg_name', '$exam_clg_code', '$exam_date', '$exam_sub_code', '$result_photo_name', '$exam_semester') ";
        if(mysqli_query($con, $insert_exam_result) >0){
            echo "Data inserted successfully";
            header("Location: exam_list.php");
        }
        else{
            echo "Data insertion failed";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam</title>
    <link rel="stylesheet" href="assets/style.css ">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
             <!-- ------header-------- -->
            <?php  require_once("header.php"); ?>
            <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="exam_list.php">Exam List</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Exam form</li>
                        </ol>
            </nav>
          <!-- ----------header close----------- -->
         
          <section>
        <div class="container">
        <div class="row padding-20">
                <h1 class=" col-lg-6 text-left"> Fill exam form</h1>
                <div class=" col-lg-6 text-right">
                    <a href="exam_list.php"><button class="btn btn-primary">Exam list</button></a>
                </div>
            <form action="" method="post" enctype="multipart/form-data"> 
                <div class="row padding-20 student_form_setting">
                    <div class="col-lg-6">
                    <div class="form-group">
                        <label for="examname" style="padding-bottom: 10px; padding-top: 30px; font-weight: bold;">Name of exam</label>
                        <input type="text" class="form-control" id="exam_name" name="exam_name" placeholder="Enter your exam name" >

                        <label for="collegecode" style="padding-bottom: 10px; padding-top: 30px; font-weight: bold;">Code</label>
                        <input type="number" class="form-control" id="exam_clg_code" name="exam_clg_code" placeholder="Enter your college code" >

                        <label for="subjectcode" style="padding-bottom: 10px; padding-top: 30px; font-weight: bold;">Subject Code</label>
                        <input type="number" class="form-control" id="exam_sub_code" name="exam_sub_code" placeholder="Enter your subject code" >

                        <label for="result_photo" style="font-weight: bold; margin-bottom: 20px">Result photo</label>
                        <input type="file" class="form-control-file" id="result_photo" name="result_photo">
                    </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="collegename" class="label-padding" style="padding-bottom: 10px; padding-top: 30px; font-weight: bold;">College Name</label>
                            <input type="text" class="form-control" id="exam_clg_name" name="exam_clg_name" placeholder="Enter your college name">

                            <label for="examdate" class="label-padding" style="padding-bottom: 10px; padding-top: 30px; font-weight: bold;">Enter date</label>
                            <input type="date" class="form-control" id="exam_date" name="exam_date" placeholder="Enter your exam date">

                            <label for="semester" class="label-padding" style="padding-bottom: 10px; padding-top: 30px; font-weight: bold;">Semester</label>
                            <input type="number" class="form-control" id="exam_semester" name="exam_semester" placeholder="Enter your semester">

                          </div>
                        </div>
                        <div class="col-lg-12" style="margin-bottom: 20px; margin-top: 20px; margin-left: 500px;">
                        <div class="text-center">
                        <button name="submit" type="submit" class="btn btn-primary btn-center ">Submit</button>
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