<?php
    $active = "college";
    require_once ("connection.php");
	if(isset($_GET)) {
	$edit_id = $_GET['edit_id'];
}
    if(isset($_POST['submit'])){
        $clg_name = $_POST['clg_name'];
        $clg_adderess = $_POST['clg_adderess'];
        $clg_number = $_POST['clg_number'];
        $clg_email = $_POST['clg_email'];
        $clg_cource = $_POST['clg_cource'];
        
        $clg_code = $_POST['clg_code'];
        $insert_result="UPDATE add_clg_master SET clg_name='$clg_name',  clg_adderess='$clg_adderess', clg_number='$clg_number', clg_email='$clg_email', clg_cource='$clg_cource', clg_code='$clg_code' WHERE clg_id = '$edit_id'";
        if(mysqli_query($con, $insert_result)){
            echo "Data inserted successfully";
            header("college.php");
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
                    <a href="college_list.php"><button class="btn btn-primary">Go back</button></a>
                </div>
            </div>
    </div>
    <div class="container student_form_setting">
        <?php
             $result = mysqli_query($con,"SELECT * FROM add_clg_master WHERE clg_id= '$edit_id'");
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result))
        {?>
                                    
        <form action="" method="post" enctype="multipart/form-data"> 
            <div class="row padding-20 ">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="clg_name" style="padding-bottom: 10px; padding-top: 30px; font-weight: bold;" >College name</label>
                        <input type="text" class="form-control" id="clg_name" name="clg_name" required value="<?=$row['clg_name'] ?>" >

                        <label for="clg_number" style="padding-bottom: 10px; padding-top: 30px; font-weight: bold;">college number</label>
                        <input type="number" class="form-control" id="clg_number" name="clg_number" required value="<?=$row['clg_number'] ?>" >

                        <label for="clg_cource" style="padding-bottom: 10px; padding-top: 30px; font-weight: bold;">Course</label>
                        <input type="text" class="form-control" id="clg_cource" name="clg_cource" required value="<?=$row['clg_number'] ?>" >
                    </div>
                </div>
                <div class="col-lg-6">
                    <label for="clg_adderess" style="padding-bottom: 10px; padding-top: 30px;  font-weight: bold;">College adderess</label>
                    <input type="text" class="form-control" id="clg_adderess" name="clg_adderess" required   value="<?=$row['clg_adderess'] ?>">

                    <label for="clg_email" style="padding-bottom: 10px; padding-top: 30px; font-weight: bold;">College email</label>
                    <input type="email" class="form-control" id="clg_email" name="clg_email" value="<?=$row['clg_email'] ?>" >

                    <label for="clg_code" style="padding-bottom: 10px; padding-top: 30px; font-weight: bold;">College code</label>
                    <input type="number" class="form-control" id="clg_code" name="clg_code" value="<?=$row['clg_code'] ?>">

                  <div class="col-md-12 col-lg-12" style="margin-left: 350px;"> <button name="submit" type="submit" class="btn btn-primary mb-2 mt-5 ml-5">Submit</button>
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