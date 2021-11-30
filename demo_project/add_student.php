<?php
    $active = "student";
    require_once ("connection.php");
    if(isset($_POST['submit'])) {
        //extract($_POST);
        $std_rno = $_POST['std_rno'];
        $std_name = $_POST['std_name'];
        $std_sub = $_POST['std_sub'];
        $std_cource = $_POST['std_cource'];
        $std_marks	 = $_POST['std_marks'];
        $std_result = $_POST['std_result'];
        $std_gender = $_POST['std_gender'];
        $std_college = $_POST['std_college'];
        $std_number = $_POST['std_number'];
        $std_email = $_POST['std_email'];
        $tenthmarksheet_name = $_FILES["tenthmarksheet"]["name"];
        $tenthmarksheet_tempname = $_FILES["tenthmarksheet"]["tmp_name"];
        $tenthmarksheet_folder = "assets/doc/10thmarksheet/".$tenthmarksheet_name;
        $twelth_marksheet_name = $_FILES["twelth_marksheet"]["name"];
        $twelth_marksheet_tempname = $_FILES["twelth_marksheet"]["tmp_name"];
        $twelth_marksheet_folder = "assets/doc/12thmarksheet/".$twelth_marksheet_name;
        if(move_uploaded_file($tenthmarksheet_tempname, $tenthmarksheet_folder ) && move_uploaded_file($twelth_marksheet_tempname, $twelth_marksheet_folder)){
            $msg = "File upload successfully";
        }
        else{
            $msg = "Failed";
            die();
        }

        $insert_result = "INSERT INTO std_admissions_master (std_rno, std_name, std_sub, std_cource, std_marks, std_result, std_gender, std_college, std_number, std_email, tenthmarksheet, twelth_marksheet) VALUES 
                        ('$std_rno', '$std_name', '$std_sub', '$std_cource', '$std_marks', '$std_result', '$std_gender', '$std_college', '$std_number', '$std_email', '$tenthmarksheet_name', '$twelth_marksheet_name')";
        if (mysqli_query($con, $insert_result) ) {
            echo "Data inserted successfully";
            header ("Location: student_list.php");
        }
        else{
           echo "Data insertion fail";
                }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add student</title>
    <link rel="stylesheet" href="assets/style.css ">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <style>
        .btn{  
            color: black;
            font-weight: bold;
            margin-top: 30px;  
            font-weight: 300; 
            width: 120px;
            height: 48px;
            border-radius: 50px;
            background-color: yellow;
            border: 1px solid yellow;
            letter-spacing: 3px;
            font-weight: 500;
        }
        .btn:hover{
            color: black;
            box-shadow: 5px 10px #f5f5f5;
            border: 1px solid yellow;
            background-color: #fff;
        }
    </style>
</head>
<body>
      <!-- ------header-------- -->
      <?php  require_once("header.php"); ?>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="student_list.php">Student List</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Student</li>
        </ol>
      </nav>
      <!-- ----------header close----------- -->
    <section>
        <div class="container">
        <div class="row padding-20" style="border-bottom: 1px solid #DFD7D7;">
                <h1 class=" col-lg-6 text-left" style="font-size: 33px;">Personal details</h1>
                <div class=" col-lg-6 text-right">
                    <a href="student_list.php"><button class="btn btn-primary">Students</button></a>
                </div>
         </div>
            <form action="add_student.php" method="post" enctype="multipart/form-data">  
                <div class="row padding-20 student_form_setting">
                    <div class="col-lg-4" style="margin-left: 80px;">
                    <div class="form-group">
                        <label for="roll_no" style="font-weight: bold; margin-bottom: 20px" >Roll No</label>
                        <input type="number" style="border-top: none; border-left: none; box-shadow: none; border-right: none; border-bottom: 1px solid black;" class="form-control" id="roll_no" name="std_rno" placeholder="Enter your roll no" required >

                        <label for="subject" style="font-weight: bold; margin-bottom: 20px" >Subject</label>
                        <input type="text" style="border-top: none; border-left: none; box-shadow: none; border-right: none; border-bottom: 1px solid black;" class="form-control" id="std_sub" name="std_sub" placeholder="Enter your subject" required >

                        <label for="marks" style="font-weight: bold; margin-bottom: 20px" >Marks</label>
                        <input type="number" style="border-top: none; border-left: none; box-shadow: none; border-right: none; border-bottom: 1px solid black;" class="form-control" id="std_marks" name="std_marks" placeholder="Enter your marks" required>

                        <label for="college" style="font-weight: bold; margin-bottom: 20px" >College</label>
                        <input type="text" style="border-top: none; border-left: none; border-right: none; box-shadow: none; border-bottom: 1px solid black;" class="form-control" id="std_college" name="std_college" placeholder="Enter your college" required>

                        <label for="email" style="font-weight: bold; margin-bottom: 20px" >Email</label>
                        <input type="email" style="border-top: none; border-left: none; box-shadow: none; border-right: none; border-bottom: 1px solid black;" class="form-control" id="std_email" name="std_email" placeholder="Enter your email id" required>
                    </div>
                    </div>
                    <div class="col-lg-4" style="margin-left: 200px;">
                        <div class="form-group">
                            <label for="name"  style="font-weight: bold; margin-bottom: 20px" class="label-padding">Name</label>
                            <input type="text" style="border-top: none; box-shadow: none; border-left: none; border-right: none; border-bottom: 1px solid black;" class="form-control" id="std_name" name="std_name" placeholder="Enter your name" required>

                            <label for="std_cource" style="font-weight: bold; margin-bottom: 20px" name="std_cource" id="std_cource" >Select Course</label>
                            <select class="custom-select" style="border-top: none; box-shadow: none; border-left: none; border-right: none; border-bottom: 1px solid black;" name="std_cource" required>
                                <option value="BSC">BSC</option>
                                <option value="BCA">BCA </option>
                                <option value="MCA">MCA </option>
                            </select>

                            <label for="result" style="font-weight: bold; margin-bottom: 20px" >Result</label>
                            <input type="text" style="border-top: none; box-shadow: none; border-left: none; border-right: none; border-bottom: 1px solid black;" class="form-control" id="std_result" name="std_result" placeholder="Enter your result" required>

                            <label for="number" style="font-weight: bold; margin-bottom: 20px" >Number</label>
                            <input type="number" style="border-top: none; box-shadow: none; border-left: none; border-right: none; border-bottom: 1px solid black;" class="form-control" id="std_number" name="std_number" placeholder="Enter mobile number" required>

                            <label for="birthdate" style="font-weight: bold; margin-bottom: 20px" >Birth</label>
                            <input type="date" style="border-top: none; box-shadow: none; border-left: none; border-right: none; border-bottom: 1px solid black;" class="form-control" id="std-birthdate" name="std-birthdate" placeholder="Enter your birth date">

                            <div class="form-check form-check-inline mt-4" >
                                <input class="form-check-input" type="radio" name="std_gender" id="std_gender" value="Male">
                                <label class="form-check-label" for="std_gender"><strong>Male</strong></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="std_gender" id="std_gender" value="Female">
                                <label class="form-check-label" for="std_gender"><strong>Female</strong></label>
                            </div>
                        </div>
                    </div>
                  <!-- <div class="container">  
                            <h2 style="border-bottom: 1px solid #DFD7D7; padding-bottom: 30px;">Education Details</h2>
                            <div class="row">
                                 <div class=" col-lg-4  form-group" style="margin-left: 80px;">
                                    <label for="number" style="font-weight: bold; margin-bottom: 20px" >10th percentage</label>
                                    <input type="number" style="margin-bottom: 20px; box-shadow: none; border-top: none; border-left: none; border-right: none; border-bottom: 1px solid black;" class="form-control" id="std_10th_marks" name="std_10th" placeholder="Enter your 10th marks" >
                                  </div>
                                  <div class=" col-lg-4 form-group" style="margin-left: 200px;">
                                    <label for="number" style="font-weight: bold; margin-bottom: 20px " >12th percentage</label>
                                    <input type="number" style="border-top: none; box-shadow: none; border-left: none; border-right: none; border-bottom: 1px solid black;" style="" class="form-control" id="std_12th_marks" name="std_12th" placeholder="Enter your 12th marks" >
                                   </div>
                            </div>
                    </div> -->
                    <div class="container" style="padding-top: 30px;">  
                            <h2 style="border-bottom: 1px solid #DFD7D7; padding-bottom: 30px;">Documents</h2>
                            <div class="row">
                                <div class=" col-lg-4 form-group"  style="margin-left: 80px;" >
                                    <label for="tenthmarksheet" style="font-weight: bold; margin-bottom: 20px">10th marksheet</label>
                                    <input type="file" class="form-control-file"  id="tenthmarksheet" name="tenthmarksheet">
                                </div>
                                <div class=" col-lg-4  form-group text-dark"  style="margin-left: 200px;">
                                    <label for="twelth_marksheet" style="font-weight: bold; margin-bottom: 20px">12th marksheet</label>
                                    <input type="file" class="form-control-file" id="twelth_marksheet" name="twelth_marksheet">
                                </div>
                            </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="text-center">
                        <button name="submit" type="submit" value="submit" class="btn btn-primary btn-outline-secondary text-dark  btn-center " style=" ">Submit</button>
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
</html>