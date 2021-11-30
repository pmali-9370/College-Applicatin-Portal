<?php
    require_once("connection.php");
    $active = "exam";
	if(isset($_GET)) {
		$edit_id = $_GET['edit_id'];
	}
    if(isset($_POST['submit'])) {
        $exam_name=$_POST['exam_name'];
        $exam_clg_name=$_POST['exam_clg_name'];
        $exam_clg_code=$_POST['exam_clg_code'];
        $exam_date=$_POST['exam_date'];
        $exam_sub_code=$_POST['exam_sub_code'];
        $exam_semester=$_POST['exam_semester'];


        $update_exam="UPDATE  exam_master SET exam_name='$exam_name',  exam_clg_name='$exam_clg_name', exam_clg_code='$exam_clg_code', exam_date='$exam_date', exam_sub_code='$exam_sub_code', exam_semester='$exam_semester'  WHERE exam_id= '$edit_id'";
        if(mysqli_query($con, $update_exam)>0){
            echo "Data updated";
            header("Location: exam.php");
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
                        <a href="exam.php"><button class="btn btn-primary">Go back</button></a>
                    </div>
                </div>
        </div>
    </div>
    <div class="container student_form_setting">
        <?php
             $result = mysqli_query($con,"SELECT * FROM exam_master WHERE exam_id= '$edit_id'");
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result))
        {?>
                                    
        <form action="" method="post" enctype="multipart/form-data"> 
            <div class="row padding-20 ">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="exam_name" style="padding-bottom: 10px; padding-top: 30px; font-weight: bold;">Exam name</label>
                        <input type="text" class="form-control" id="exam_name" name="exam_name" value="<?=$row['exam_name'] ?>" >

                        <label for="exam_clg_code" style="padding-bottom: 10px; padding-top: 30px; font-weight: bold;">Exam college code</label>
                        <input type="number" class="form-control" id="exam_clg_code" name="exam_clg_code" value="<?=$row['exam_clg_code'] ?>" >

                        <label for="exam_sub_code" style="padding-bottom: 10px; padding-top: 30px; font-weight: bold;">Exam subject code</label>
                        <input type="number" class="form-control" id="exam_sub_code" name="exam_sub_code" value="<?=$row['exam_sub_code'] ?>">
                    </div>
                </div>
                <div class="col-lg-6">
                    <label for="exam_clg_name" style="padding-bottom: 10px; padding-top: 30px; font-weight: bold;">College name</label>
                    <input type="text" class="form-control" id="exam_clg_name" name="exam_clg_name" value="<?=$row['exam_clg_name'] ?>">

                    <label for="exam_date" style="padding-bottom: 10px; padding-top: 30px; font-weight: bold;">Exam date</label>
                    <input type="date" class="form-control" id="exam_date" name="exam_date" value="<?=$row['exam_date'] ?>" >

                    <label for="exam_semester" style="padding-bottom: 10px; padding-top: 30px; font-weight: bold;">Exam semester</label>
                    <input type="number" class="form-control" id="exam_semester" name="exam_semester" value="<?=$row['exam_semester'] ?>">
                    <div class="col-lg-12" style="margin-left: 350px;"><button name="submit" type="submit" class="btn btn-primary mt-5">Submit</button></div>
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