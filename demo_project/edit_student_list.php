<?php
    $active="student";
    require_once ("connection.php");
	if(isset($_GET['edit_id'])) {
		$edit_id = $_GET['edit_id'];
	}
    
    if(isset($_POST['submit'])){
        $std_id=$_POST['std_id'];
        $std_rno=$_POST['std_rno'];
        $std_name=$_POST['std_name'];
        $std_sub =$_POST['std_sub'];
        $std_cource =$_POST['std_cource'];
        $std_marks =$_POST['std_marks'];
        $std_result =$_POST['std_result'];
        $std_gender =$_POST['std_gender'];
        $std_college =$_POST['std_college'];   
        $std_number =$_POST['std_number'];
        $std_email =$_POST['std_email'];
        $update_student_list= "UPDATE  std_admissions_master SET std_rno='$std_rno', std_name='$std_name',
         std_sub='$std_sub', std_cource='$std_cource', std_marks='$std_marks', std_result='$std_result', 
         std_gender='$std_gender', std_college='$std_college', std_number='$std_number', std_email='$std_email' 
         WHERE std_id='$std_id'";
         print_r($update_student_list);
        $result = mysqli_query($con, $update_student_list);
        print_r($result);
        if($result > 0){
            echo "Data updated successfully";
            header ("Location: student_list.php");
            die();
        }    
        else{
            echo "Data insertion failed";
            die();
            // header ("Location: student_list.php");
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
    <link rel="stylesheet" href="assets/style.css ">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
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
                    <a href="student_list.php"><button class="btn btn-primary">Go back</button></a>
                </div>
            </div>
    </div>
    <div class="container student_form_setting">
        <div class="row col-lg-12 col-sm-8 col-md-8">
                        <?php
                            $result = mysqli_query($con,"SELECT * FROM std_admissions_master WHERE std_id= '$edit_id'");
                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_assoc($result))
                                {?>
        </div>                     
                <form action="edit_student_list.php" method="post" enctype="multipart/form-data"> 
                <div class="row padding-20 ">
                    <div class="col-lg-6">
                    <div class="form-group">
                        <label for="std_rno" style="padding-bottom: 10px; padding-top: 30px; font-weight: bold;">Student id</label>
                        <input type="number" class="form-control" id="std_id" name="std_id" value="<?=$row['std_id'] ?>" >

                        
                        <label for="std_rno" style="padding-bottom: 10px; padding-top: 30px; font-weight: bold;">Roll No</label>
                        <input type="number" class="form-control" id="std_rno" name="std_rno" value="<?=$row['std_rno'] ?>" >

                        <label for="subject" style="padding-bottom: 10px; padding-top: 30px; font-weight: bold;">Subject</label>
                        <input type="text" class="form-control" id="std_sub" name="std_sub" value="<?=$row['std_sub'] ?>" >

                        <label for="marks" style="padding-bottom: 10px; padding-top: 30px; font-weight: bold;">Marks</label>
                        <input type="number" class="form-control" id="std_marks" name="std_marks" value="<?=$row['std_marks'] ?>">

                        <label for="college" style="padding-bottom: 10px; padding-top: 30px; font-weight: bold;">College</label>
                        <input type="text" class="form-control" id="std_college" name="std_college" value="<?=$row['std_college'] ?> ">

                        <label for="email" style="padding-bottom: 10px; padding-top: 30px; font-weight: bold;">Email</label>
                        <input type="email" class="form-control" id="std_email" name="std_email" value="<?=$row['std_email'] ?> ">
                    </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="std_name" class="label-padding" style="padding-bottom: 10px; padding-top: 30px; font-weight: bold;">Name</label>
                            <input type="text" class="form-control" id="std_name" name="std_name" value="<?=$row['std_name'] ?>">

                            <label for="std_cource" style="padding-bottom: 10px; padding-top: 30px; font-weight: bold;" name="std_cource" id="std_cource" value="<?=$row['std_cource'] ?>">Select Course</label>
                            <select class="custom-select" name="std_cource" value="<?=$row['std_cource'] ?>" >
                                <option <?=$row['std_cource']?>>BSC</option>
                                <option <?=$row['std_cource']?>>BCA </option>
                                <option <?=$row['std_cource']?>>MCA </option>
                            </select>

                            <label for="std_result" style="padding-bottom: 10px; padding-top: 30px; font-weight: bold;">Result</label>
                            <input type="text" class="form-control" id="std_result" name="std_result" value="<?=$row['std_result'] ?>">

                            <label for="number" style="padding-bottom: 10px; padding-top: 30px; font-weight: bold;" >Number</label>
                            <input type="number" class="form-control" id="std_number" name="std_number" value="<?=$row['std_number'] ?>" >
<!-- 
                            <label for="std-birthdate" style="padding-bottom: 10px; padding-top: 30px; font-weight: bold;">Birth</label>
                            <input type="date" class="form-control" id="std-birthdate" name="std-birthdate" value="<?=$row['std_birthdate'] ?>"> -->
                            <div class="form-check form-check-inline mt-4" >
                                <input class="form-check-input" type="radio" name="std_gender" id="std_gender" value="1" <?php if($row [$std_gender]=='1') {echo "Male";}  ?> />
                                <label class="form-check-label" for="std_gender"><strong>Male</strong></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="std_gender" id="std_gender" value="0" <?php if($row [$std_gender]=='0') {echo "Female";}  ?> />
                                <label class="form-check-label" for="std_gender"><strong>Female</strong></label>
                            </div>
                        </div>
                    </div>
                                </div>
                    <div class="col-lg-12">
                        <div class="text-center">
                        <button  name="submit" type="submit" class="btn btn-primary btn-outline-secondary text-dark  btn-center " style="margin-top: 30px;">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
                               <?php }

                            }
                            else

                            {
                                exit();
                                echo "0 result";
                                header("Location: student_list.php");
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