<?php
    $active="addmision";
    require_once("database.php");
    if(isset($_POST['submit'])){
        $student_name = $_POST['student_name'];
        $mobile_number = $_POST['mobile_number'];
        $email =$_POST['email'];
        $student_address = $_POST['student_address'];

        $aadhar_card_name = $_FILES["aadhar_card"]["name"];
        $aadhar_card_tempname = $_FILES["aadhar_card"]["tmp_name"];
        $aadhar_card_folder = "assets/doc/aadhar_card/".$aadhar_card_name;
        $marksheet_name = $_FILES["marksheet"]["name"];
        $marksheet_tempname = $_FILES["marksheet"]["tmp_name"];
        $marksheet_folder = "assets/doc/marksheet/".$marksheet_name;
        $photo_name = $_FILES["photo"]["name"];
        $photo_tempname = $_FILES["photo"]["tmp_name"];
        $photo_folder = "assets/doc/photo/".$photo_name;
        if (move_uploaded_file($aadhar_card_tempname, $aadhar_card_folder) && move_uploaded_file($marksheet_tempname, $marksheet_folder) && move_uploaded_file($photo_tempname, $photo_folder) )  {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
            die();
        }
        $tenth_marks = $_POST['10th_marks'];
        $twelth_marks = $_POST['12th_marks'];
        //$photo= $_POST['photo'];
        $insert_result = "INSERT INTO tbl_addmision_master(student_name,mobile_number,email,student_address,10th_marks,12th_marks,photo,aadhar_card,marksheet) VALUES('$student_name',' $mobile_number',' $email',' $student_address','$tenth_marks','$twelth_marks','$photo_name','$aadhar_card_name','$marksheet_name')";
        if(mysqli_query($con, $insert_result)>0){
            echo "record insertrd";
            //header("Location : addmision.php");
            echo "<script type='text/javascript'> document.location = 'addmision_list.php'; </script>";
        }
        else{
            echo "not inserted";
        }
    
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="assets/css/font-awesome.min.css"> 
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/06a4e453eb.js"></script>
    <script src="https://use.fontawesome.com/06a4e453eb.js"></script>
    <title>Addmision</title>
</head>
<body>
    <?php
        require_once("header.php")
    ?>
    <div class="container">
        <div class="row" colspan="2">
            <div class="col-md-12 heading-student">
                <h1 class="text-center">Addmision Form</h1>
            </div>
        </div>
    </div>
    <form action="addmision.php" method="post" enctype="multipart/form-data" >
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <tr class="">                            
                            <td> <label for="student_name">Student Name</label></td>
                            <td><input type="text" class="form-control" name="student_name" id="student_name" placeholder="Enter Student Name."/></td>
                        </tr> 
                        <tr class="">                            
                            <td > <label for="mobile_number">Mobile Number</label></td>
                            <td><input type="phone" class="form-control" name="mobile_number" id="mobile_number" placeholder="Enter Enter your Mobile Number."/></td>
                        </tr>   
                        <tr class="">                            
                            <td> <label for="email">E Mail</label></td>
                            <td><input type="email" class="form-control" name="email" id="email" placeholder="Enter Enter your Email Address."/></td>
                        </tr> 
                        <tr>                            
                            <td> <label for="student_address">Student Address</label></td>
                            <td><textarea type="textarea" class="form-control" name="student_address" id="student_address" placeholder="Enter your address"></textarea></td>
                        </tr> 
                        <tr>  
                            <td colspan="2" class="text-center">                          
                                 <h3> <label for="">----Education Details----</label></h3>
                            </td>
                        </tr>
                        <tr>   
                            <td><label for="10th_marks">10th marks</label></td>
                            <td><input type="text" class="form-control" name="10th_marks" id="" placeholder="Enter your 10th marks."/></td>                               
                        </tr>
                        <tr>        
                            <td><label for="12th_marks">12th marks</label></td>
                            <td><input type="text" class="form-control" name="12th_marks" id="12th_marks" placeholder="Enter your 12th marks"/></td>        
                        </tr> 
                        <tr>  
                            <td colspan="2" class="text-center">                          
                                 <h3> <label for="">----Documents----</label></h3>
                            </td>
                        </tr>
                        <tr>       
                            <td><label for="aadhar_card"></label>Aadhar Card</td>
                            <td><input type="file"  name="aadhar_card" id="aadhar_card"/></td>
                        </tr>
                        <tr>        
                            <td><label for="marksheet">Recently Pass Marksheet</label></td>
                            <td><input type="file" name="marksheet" id="marksheet"/></td>        
                        </tr> 
                        <tr>        
                            <td><label for="photo">photo</label></td>
                            <td><input type="file"  name="photo" id="photo" /></td>        
                        </tr>
                        <tr class="text center"> 
                            <td></td>                           
                            <td ><button type="button" class="btn btn-danger" href="">Cancel</button>
                            <button type="submit" class="btn btn-primary" name="submit">Submit</button></td>
                        </tr> 
                    </table>
                </div>
            </div>          
        </div>
    </section>
</form>
    <?php
        require_once("footer.php")
    ?>
</body>
</html>