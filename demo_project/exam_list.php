<?php
    $active = "exam";

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
    <!-- <?php 
        $student_list = array(
            array("id"=>"02", "roll_no"=>"45", "name"=>"Atish Koli", "div"=>"A", "course"=>"MCA", "marks"=>"79"),
            array("id"=>"02", "roll_no"=>"45", "name"=>"Nilesh Joshi", "div"=>"B", "course"=>"BSC", "marks"=>"99"),
            array("id"=>"02", "roll_no"=>"45", "name"=>"Milind Mhaskar", "div"=>"C", "course"=>"BCA", "marks"=>"59")
        );
        $student_list_size = count($student_list);
    ?> -->
  
    <!-- ------------Database Connection---------------------- -->

        <?php require_once("connection.php");?>
        <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="exam_form.php">Exam Form</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Exam List</li>
                        </ol>
            </nav>

    <!-- ------------Database Connection---------------------- -->
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
                <h1 class=" col-lg-6 text-left">Student List</h1>
                <div class=" col-lg-6 text-right">
                    <a href="exam_form.php"><button class="btn btn-primary">Exam form</button></a>
                </div>
            </div>
            <table class="table table-striped responsive student_form_setting">
                <thead class="thead-dark">
                    <tr>
                        <th>Exam id</th>
                        <th>Exam Name</th>
                        <th>Exam college Name</th>
                        <th>Exam  Code</th>
                        <th>Exam Date</th>
                        <th>Subject Code</th>
                        <th>Result photo</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                        <!-- <?php
                             for($i=0;$i < $student_list_size; $i++)
                             {
                                 echo "<tr>";
                                 foreach($student_list[$i] as $key=>$values)
                                 {
                                     echo "<td>" . $values . "</td>";
                                 }
                                 echo "</tr>";
                             }
                        ?> -->
                        <?php
                            $result = mysqli_query($con,"SELECT * FROM exam_master");
                            if(mysqli_num_rows($result) > 0){
                                $i=1;
                                while($row = mysqli_fetch_assoc($result))
                                {?>
                                    <tr>
                                        <td><?=$i;?></td>
                                        <td><?=$row['exam_name']; ?></td>
                                        <td><?=$row['exam_clg_name']; ?></td>
                                        <td><?=$row['exam_clg_code']; ?></td>
                                        <td><?=$row['exam_date']; ?></td>
                                        <td><?=$row['exam_sub_code']; ?></td>
                                        <td>
                                            <img src="assets/doc/result_photo/<?=$row['result_photo']; ?>" class="img-fluid" height="100" width="100" alt="">
                                        </td>
                                        <td> <a href="view_exam_students.php?exam_id=<?= $row['exam_id'];?>"><i class='fa fa-eye'></i></a> 
                                            <a href="edit_exam.php?edit_id=<?= $row['exam_id'];?>"><i class='fa fa-pencil'></i></a>
                                            <a href="dlt_exam_student.php?id=<?= $row['exam_id'];?>"><i class='fa fa-trash'></i></a>
                                        </td>
                               <?php $i++;}
                            }
                            else{?>
                                <tr>
                                       <td  colspan='12' style="text-align: center;">No data available</td>
                                   </tr>
                          <?php  }

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