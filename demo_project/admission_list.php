<?php
    $active = "admission";

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
    <!-- <?php 
        $student_list = array(
            array("id"=>"4", "roll_no"=>"53", "name"=>"Kundan sonawane", "div"=>"A", "course"=>"MCA"),
            array("id"=>"8", "roll_no"=>"52", "name"=>"Sahil Pinjari", "div"=>"B", "course"=>"BSC"),
            array("id"=>"9", "roll_no"=>"76", "name"=>"Vaibhav Patil", "div"=>"C", "course"=>"BCA")
        );
        $student_list_size = count($student_list);
    ?> -->
      <!-- -----------Database connection---------- -->

      <?php require_once("connection.php");?>
      <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="admission_form.php">Admission Form</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Admission List</li>
                        </ol>
            </nav>
    <!-- ------------------------------------- -->
    <section>
        <div class="container">

        <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                    <form action="" class="form" style="margin-top: 20px;">
                        <div class="row ">
                            <div class="col-lg-6 text-right">
                                <label for="search"  style="text-align: right; font-weight: bold; font-size: 24px;">Search here</label>
                            </div>
                            <div class="col-lg-6 ">
                                <input type="text" placeholder="Search" name="search" class="w-100" style="margin-top: 7px;">
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>

            <div class="row padding-20">
                <h1 class=" col-lg-6 text-left">Admissions</h1>
                <div class=" col-lg-6 text-right">
                    <a href="admission_form.php"><button class="btn btn-primary">Admission form</button></a>
                </div>
            </div>
            <table class="table  responsive">
                <thead class="thead-dark">
                    <tr>
                        <th>College id</th>
                        <th>StudentName</th>
                        <th>College Name</th>
                        <th>College Code</th>
                        <th>Admission Date</th>
                        <th>Subject Code</th>
                        <th>Photo</th>
                        <th>Semester</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                        <!-- <<?php
                             for($i=0;$i < $student_list_size; $i++)
                             {
                                 echo "<tr>";
                                 foreach($student_list[$i] as $key=>$values)
                                 {
                                     echo "<td>" . $values . "</td>";
                                 }
                                 echo "</tr>";
                             }
                        ?>  -->
                             <?php
                            $result = mysqli_query($con, "SELECT * FROM admissions");
                            if(mysqli_num_rows($result) > 0){
                                $i=1;
                                while($row = mysqli_fetch_assoc($result))
                                {?>
                                    <tr>
                                        <td><?=$i;?></td>
                                        <td><?=$row['student_name'] ?></td>
                                        <td><?=$row['college_name'] ?></td>
                                        <td><?=$row['college_code'] ?></td>
                                        <td><?=$row['admission_date'] ?></td>
                                        <td><?=$row['subject_code'] ?></td>
                                        <td>
                                            <img src="assets/doc/marksheet/<?=$row['marksheet']; ?>" class="img-fluid" height="100" width="100" alt="">
                                        </td>
                                        <td><?=$row['semester'] ?></td> 
                                        <td> <a href="view_admission_student.php?id=<?= $row['college_id'];?>"><i class='fa fa-eye'></i></a> 
                                            <a href="edit_admission_students.php?edit_id=<?= $row['college_id'];?>"><i class='fa fa-pencil'></i></a>
                                            <a href="dlt_admission_student.php?id=<?= $row['college_id'];?>"><i class='fa fa-trash'></i></a>
                                        </td>
                                 </tr>
                                <?php $i++; }
                            }
                           
                            else{?>
                                <tr>
                                       <td  colspan='13' style="text-align: center;">No data available</td>
                                   </tr>
                            <?php }
                        ?>
                </tbody>
            </table>
        </div>
    </section>


    <?php
        require_once("footer.php");
    ?>
</body>

</html>