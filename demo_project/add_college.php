<?php
    $active = "college";
    require_once ("connection.php");
    if (isset($_POST['submit'])) {
        // print_r($_POST);
        // echo $_FILES['photo']['name'];
        // die();
        $clg_name = $_POST['clg_name'];
        $clg_adderess = $_POST['clg_adderess'];
        $clg_number = $_POST['clg_number'];
        $clg_email = $_POST['clg_email'];
        $clg_cource = $_POST['clg_cource'];
        $photo_name =$_FILES['photo']['name'];
        $photo_temp_name =$_FILES["photo"]["tmp_name"];
        $photo_folder = "assets/doc/photo/".$photo_name;
        $clg_code = $_POST['clg_code'];
        if(move_uploaded_file($photo_temp_name, $photo_folder)){
            $msg = "File upload successfully";
        }else{
            $msg="Failed";
        }

        $insert_clg_result = "INSERT INTO add_clg_master (clg_name, clg_adderess, clg_number, clg_email, clg_cource, photo, clg_code) VALUES
                            ('$clg_name', '$clg_adderess', '$clg_number', '$clg_email', '$clg_cource', '$photo_name', '$clg_code')";
        if(mysqli_query($con, $insert_clg_result)>0){
            echo "Data inserted successfully";
            header("Location: college_list.php");
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
    <title>College</title>
    <link rel="stylesheet" href="Assets/style.css ">
    <link rel="stylesheet" href="Assets/css/bootstrap.min.css">
</head>
<body>
         <!-- ------header-------- -->
       <?php  require_once("header.php"); ?>
       <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="college_list.php">College list</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add college</li>
            </ol>
        </nav>
          <!-- ----------header close----------- -->
          <section>
              <!-- <?php
                $con = mysqli_connect("localhost","root","");
                $database = mysqli_select_db( $con,"demo_project");
                if($database)
                {
                    echo "Database connected";
                    // header("Location: add_college.php");
                }
                else{
                    echo "not connected";
                }
                
              
                $result = mysqli_query($con,"SELECT * FROM demo_project");
                if(mysqli_num_rows($result) > 0){
                    echo "<table>";
                    echo "<tr><th>clg_id</th</tr><tr><th>clg_name</th</tr><tr><th>clg_adderess</th</tr>";
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<tr>";
                        echo "<td>".$row['clg_id'] . "</td>";
                        echo "<td>".$row['clg_name'] . "</td>";
                        echo "<td>".$row['clg_adderess'] . "</td>";
                    }
                    echo "</table>";
                }
                else{
                    echo "0 result";
                }
              
                
              ?> -->
        <div class="container" style="margin-top: 30px;">
        <div class="row padding-20" style="margin-top: 30px;">
                <h1 class=" col-lg-6 text-left">Fill the form</h1>
                <div class=" col-lg-6 text-right">
                    <a href="college_list.php" ><button class="btn btn-primary">College List</button></a>
                </div>
            </div>
            
            <form action="" method="post" enctype="multipart/form-data"> 
                <div class="row padding-20 student_form_setting2">
                    <div class="col-lg-6">
                    <div class="form-group">
                        <label for="inputcollegename" style="padding-bottom: 10px; padding-top: 30px; font-weight: bold;">College</label>
                        <input type="text" class="form-control" id="clg_name" name="clg_name" placeholder="Enter your college name" >

                        <label for="collegenumber" style="padding-bottom: 10px; padding-top: 30px; font-weight: bold;">Number</label>
                        <input type="number" class="form-control" id="clg_number" name="clg_number" placeholder="Enter your college number" >

                        <label for="clg_cource" style="padding-bottom: 10px; padding-top: 30px; font-weight: bold;">Course</label>
                        <input type="text" class="form-control" id="clg_cource" name="clg_cource" placeholder="Enter course" >
 
                        <label for="photo" style="font-weight: bold; margin-bottom: 20px">Passport photo</label>
                        <input type="file" class="form-control-file" id="photo" name="photo">
                        
                    </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="collegeaddress" class="label-padding" style="padding-bottom: 10px; padding-top: 30px; font-weight: bold;">Address</label>
                            <input type="text" class="form-control" id="clg_adderess" name="clg_adderess" placeholder="Enter your college address">

                            <label for="coolegeemail" class="label-padding" style="padding-bottom: 10px; padding-top: 30px; font-weight: bold;">Email</label>
                            <input type="email" class="form-control" id="clg_email" name="clg_email" placeholder="Enter your college email">

                            <label for="coollegecode" class="label-padding" style="padding-bottom: 10px; padding-top: 30px; font-weight: bold;">Code</label>
                            <input type="number" class="form-control" id="clg_code" name="clg_code" placeholder="Enter your college code">


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
</html>