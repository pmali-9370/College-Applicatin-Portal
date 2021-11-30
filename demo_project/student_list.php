<?php
    $active = "student";
    require_once("connection.php");
    $result = mysqli_query($con,"SELECT * FROM std_admissions_master");
    if(isset($_POST['search'])){
        $query = $_POST['query'];
        // echo $query;
        $result = mysqli_query($con, "SELECT * FROM std_admissions_master WHERE std_name LIKE '%$query%' OR std_number LIKE '%$query%' OR std_email LIKE '%$query%'");
        //print_r($result);
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
    <!-- <?php 
        $student_list = array(
            array("id"=>"02", "roll_no"=>"45", "name"=>"Atish Koli", "div"=>"A", "course"=>"MCA", "marks"=>"79"),
            array("id"=>"02", "roll_no"=>"45", "name"=>"Nilesh Joshi", "div"=>"B", "course"=>"BSC", "marks"=>"99"),
            array("id"=>"02", "roll_no"=>"45", "name"=>"Milind Mhaskar", "div"=>"C", "course"=>"BCA", "marks"=>"59")
        );
        $student_list_size = count($student_list);
    ?> -->
    <!-- -----------Database connection---------- -->

        <?php require_once("connection.php");?>
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="add_student.php">Add student</a></li>
            <li class="breadcrumb-item active" aria-current="page">Student List</li>
        </ol>
      </nav>
    <!-- ------------------------------------- -->
    <section>
        <div class="container">

        <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                    <form action="student_list.php" class="form" style="margin-top: 20px;" method="post">
                        <div class="row ">
                            <div class="col-lg-6 text-right">
                                <label for="search"  style="text-align: right; font-weight: bold; font-size: 24px;">Search here</label>
                            </div>
                            <div class="col-lg-6 ">
                                <input type="text" name="query" id="query" value="<?php if(isset($_POST['query'])){  echo $_POST['query'];  }?>" class="w-100" style="margin-top: 7px;" placeholder="Student name, mobile no, email id"/>
                                <button name="search" id="search" class="mt-5" type="submit" value="search now">Search</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        
            <div class="row padding-20">
                <h1 class=" col-lg-6 text-left">Student List</h1>
                <div class=" col-lg-6 text-right">
                    <a href="add_student.php"><button class="btn btn-primary">Add Student</button></a>
                </div>
            </div>
    </div>
    <div class="container student_form_setting">
        <div class="row col-lg-12 col-sm-8 col-md-8">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Id</th>
                        <th>Roll No</th>
                        <th>Name</th>
                        <th>Subject</th>
                        <th>Course</th>
                        <th>Marks</th>
                        <th>Student result</th>
                        <th>Gender</th>
                        <th>college</th>
                        <th>number</th>
                        <th>student email</th>
                        <th>10th marksheet</th>
                        <th>12th marksheet</th>
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
                            if(mysqli_num_rows($result) > 0){
                                $i=1;
                                while($row = mysqli_fetch_assoc($result))
                                {?>
                                    <tr>
                                        <td><?=$i;?></td>
                                        <td><?=$row['std_rno'] ?></td>
                                        <td><?=$row['std_name'] ?></td>
                                        <td><?=$row['std_sub'] ?></td>
                                        <td><?=$row['std_cource'] ?></td>
                                        <td><?=$row['std_marks'] ?></td>
                                        <td><?=$row['std_result'] ?></td>
                                        <td><?phpif($row['std_gender']=='Male'){echo 'Male';}else{echo 'Female';} ?></td>
                                        <td><?=$row['std_college'] ?></td>
                                        <td><?=$row['std_number'] ?></td>
                                        <td><?=$row['std_email'] ?></td>
                                        <td>
                                            <img src="assets/doc/10thmarksheet/<?=$row['tenthmarksheet']; ?>" class="img-fluid" height="100" width="100" alt="">
                                        </td>
                                        <td>
                                            <img src="assets/doc/12thmarksheet/<?=$row['twelth_marksheet']; ?>" class="img-fluid" height="100" width="100" alt="">
                                        </td>
                                        <td> <a href="view_student_list.php?view_id=<?= $row['std_id'];?>"><i class='fa fa-eye'></i></a> 
                                            <a href="edit_student_list.php?edit_id=<?= $row['std_id'];?>"><i class='fa fa-pencil'></i></a>
                                            <a href="dlt_student_list.php?dlt_id=<?= $row['std_id'];?>"><i class='fa fa-trash'></i></a>
                                        </td>
                               <?php $i++;}
                            }
                            else
                            {?>
                                <tr>
                                       <td  colspan='14' style="text-align: center;">No data available</td>
                                   </tr>
                               
                           <?php }
                            ?>
                </tbody>
            </table>
          </div>
        </div>
        
    </section>
    <?php
    

    //     }   
    // }
?>


    <?php
        require_once("footer.php");
    ?>
</body>
</html>