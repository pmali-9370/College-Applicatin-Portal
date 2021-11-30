<?php
    $active = "teacher";
    require_once("connection.php");
    if(isset($_POST['submit'])) {
        $teacher_name=$_POST['teacher_name'];
        $teacher_college=$_POST['teacher_college'];
        $teacher_course=$_POST['teacher_course'];
        $teacher_subject=$_POST['teacher_subject'];
        $teacher_phone=$_POST['teacher_phone'];
        $teacher_email=$_POST['teacher_email'];
        $teacher_address=$_POST['teacher_address'];


        $teacher_insert="INSERT INTO teacher_master (teacher_name, teacher_college, teacher_course, teacher_subject, teacher_phone, teacher_email, teacher_address)
         VALUES ('$teacher_name','$teacher_college', '$teacher_course', '$teacher_subject', '$teacher_phone', '$teacher_email', '$teacher_address')";
        if(mysqli_query($con, $teacher_insert)>0) {
            echo "record inserted successfully";
            header("Location: teacher_list.php");
        }
        else{
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
    <title>techer</title>
    <link rel="stylesheet" href="assets/style.css ">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
             <!-- ------header-------- -->
             <?php  require_once("header.php"); ?>
             <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="teacher_list.php">Teacher List</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Teacher</li>
                </ol>
            </nav>
          <!-- ----------header close----------- -->
          <section>
        <div class="container">
        <div class="row padding-20">
                <h1 class=" col-lg-6 ">Teacher form</h1>
                <div class=" col-lg-6 text-right">
                    <a href="teacher_list.php"><button class="btn btn-primary">Teacher list</button></a>
                </div>
            <form action="" method="post" enctype="multipart/form-data"> 
                <div class="row student_form_setting" style="padding-left: 50px;">
                    <div class="col-lg-6">
                    <div class="form-group">
                        <label for="teachername" style="padding-bottom: 10px; padding-top: 30px; font-weight: bold;">Teacher</label>
                        <input type="text" class="form-control" id="teacher_name" name="teacher_name" placeholder="Enter your teacher name" >

                        <label for="teacher_course" style="padding-bottom: 10px; padding-top: 30px; font-weight: bold;">Enter course</label>
                        <input type="text" class="form-control" id="teacher_course" name="teacher_course" placeholder="Enter course" >
                            
                        <label for="teachername" class="label-padding" style="padding-bottom: 10px; padding-top: 30px; font-weight: bold;">Phone</label>
                        <input type="number" class="form-control" id="teacher_phone" name="teacher_phone" placeholder="Enter your teacher number">

                        <label for="teacheraddress" style="padding-bottom: 10px; padding-top: 30px; font-weight: bold;">Address</label>
                        <input type="text" class="form-control" id="teacher_address" name="teacher_address" placeholder="Enter your teacher address" >    
                        
                    </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="teachercollege" class="label-padding" style="padding-bottom: 10px; padding-top: 30px; font-weight: bold;">College</label>
                            <input type="text" class="form-control" id="teacher_college" name="teacher_college" placeholder="Enter your teacher college">

                            <label for="subject" class="label-padding" style="padding-bottom: 10px; padding-top: 30px; font-weight: bold;">Subject</label>
                            <input type="text" class="form-control" id="teacher_subject" name="teacher_subject" placeholder="Enter subject">

                            <label for="teacheremail" class="label-padding" style="padding-bottom: 10px; padding-top: 30px; font-weight: bold;">Email</label>
                            <input type="email" class="form-control" id="teacher_email" name="teacher_email" placeholder="Enter your teacher email">
                    </div>
                    </div>
                        <div class="col-lg-12" style="margin-bottom: 20px; margin-top: 20px; margin-left: 500px;">
                        <div class="text-center">
                        <button name="submit" type="submit" class="btn btn-primary btn-center" style="margin-right: 30px;">Submit</button>
                        </div>
                    </div>
                    
                </div>
            </form>
        </div>
    </section>


         <!-- ------header-------- -->
          <?php
        require_once("footer.php");
        // <!-- ----------header close----------- -->

    ?>
</body>