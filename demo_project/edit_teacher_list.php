<?php
    $active = "teacher";
    require_once("connection.php");
	if(isset($_GET)) {
		$edit_id = $_GET['edit_id'];
	}
    if(isset($_POST['submit'])) {
        $teacher_name=$_POST['teacher_name'];
        $teacher_college =$_POST['teacher_college'];
        $teacher_course	=$_POST['teacher_course'];
        $teacher_subject=$_POST['teacher_subject'];
        $teacher_phone=$_POST['teacher_phone'];
        $teacher_email=$_POST['teacher_email'];
        $teacher_address=$_POST['teacher_address'];
        $update_teacher= "UPDATE  teacher_master SET teacher_name='$teacher_name', teacher_college='$teacher_college', teacher_course='$teacher_course', 
        teacher_subject='$teacher_subject', teacher_phone='$teacher_phone', teacher_email='$teacher_email', teacher_address='$teacher_address'  WHERE teacher_id='$edit_id'";
        if(mysqli_query($con, $update_teacher)>0) {

            echo "Record inserted";
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
                    <h1 class=" col-lg-6 text-center" style="font-size: 28px; font-weight: bold; border-bottom: 1px solid #C50000; padding-bottom: 10px;">---- Edit teacher form ----</h1>
                    <div class=" col-lg-6 text-right">
                        <a href="teacher_list.php"><button class="btn btn-primary">Go back</button></a>
                    </div>
                </div>
        </div>
    </div>
    <div class="container student_form_setting">
        <?php
             $result = mysqli_query($con,"SELECT * FROM teacher_master WHERE teacher_id= '$edit_id'");
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result))
        {?>
                                    
        <form action="" method="post" enctype="multipart/form-data"> 
            <div class="row padding-20 ">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="teacher_name" style="padding-bottom: 10px; padding-top: 30px; font-weight: bold;">Teacher name</label>
                        <input type="text" class="form-control" id="teacher_name" name="teacher_name" 	 >

                        <label for="teacher_course" style="padding-bottom: 10px; padding-top: 30px; font-weight: bold;">Teacher course</label>
                        <input type="text" class="form-control" id="teacher_course" name="teacher_course" value="<?=$row['teacher_course'] ?>" >

                        <label for="teacher_phone" style="padding-bottom: 10px; padding-top: 30px; font-weight: bold;">Teacher phone</label>
                        <input type="number" class="form-control" id="teacher_phone" name="teacher_phone" value="<?=$row['teacher_phone'] ?>">

                        <label for="teacher_address" style="padding-bottom: 10px; padding-top: 30px; font-weight: bold;">Teacher address</label>
                        <input type="text" class="form-control" id="teacher_address" name="teacher_address" value="<?=$row['teacher_address'] ?>">
                    </div>
                </div>
                <div class="col-lg-6">
                    <label for="teacher_college" style="padding-bottom: 10px; padding-top: 30px; font-weight: bold;"> Teacher college </label>
                    <input type="text" class="form-control" id="teacher_college" name="teacher_college" value="<?=$row['teacher_college'] ?>">

                    <label for="teacher_subject" style="padding-bottom: 10px; padding-top: 30px; font-weight: bold;">Teacher subject</label>
                    <input type="text" class="form-control" id="teacher_subject" name="teacher_subject" value="<?=$row['teacher_subject'] ?>" >

                    <label for="teacher_email" style="padding-bottom: 10px; padding-top: 30px; font-weight: bold;">Teacher email</label>
                    <input type="email" class="form-control" id="teacher_email" name="teacher_email" value="<?=$row['teacher_email'] ?>">

                    <div class="col-lg-12" style="margin-left: 350px; margin-top: 20px;">  <button name="submit" type="submit" class="btn btn-primary mt-5">Submit</button></div>
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