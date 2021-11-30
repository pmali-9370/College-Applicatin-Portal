<?php
    $active = "teacher";
    require_once("connection.php");
    if(isset($_POST['search'])){
        $query = $_POST['query'];
        $result = mysqli_query($con, "SELECT * FROM teacher_master WHERE teacher_name LIKE '%$query%' OR teacher_phone LIKE '%$query%' OR teacher_email LIKE '%$query%'");

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
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="add_teacher.php">Add Teacher</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Teacher List</li>
                </ol>
            </nav>
    <!-- ----------header close----------- -->
    <!-- <?php 
        $student_list = array(
            array("subject"=>"Java Programming", "name"=>"Harshal Patil", "qualification"=>"MCA", "number"=>"10", "course"=>"MCA"),
            array("subject"=>"Data Structure", "name"=>"Rakesh Rane", "qualification"=>"MSC", "number"=>"11", "course"=>"BSC"),
            array("subject"=>"Operating System", "name"=>"Tejas Sonawane", "qualification"=>"MS", "number"=>"12", "course"=>"BCA")
        );
        $student_list_size = count($student_list);
    ?> -->
    <!-- -----------Database connection---------- -->

    <?php require_once("connection.php");?>
    <!-- ------------------------------------- -->
    <section>
        <div class="container">

        <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                    <form action="" class="form" style="margin-top: 20px;">
                        <div class="row ">
                            <div class="col-lg-6 text-right">
                                <label for="search" name="query"  style="text-align: right; font-weight: bold; font-size: 24px;">Search here</label>
                            </div>
                            <div class="col-lg-6 ">
                                <input type="text" name="query" class="w-100" style="margin-top: 7px;" id="query" value="<?php if(isset($_POST['query'])){  echo $_POST['query'];  }?>" placeholder="Teacher name,  number, email"/>
                                <button type="button" name="search" id="search" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>

            <div class="row padding-20">
                <h1 class=" col-lg-6 text-left">Teacher List</h1>
                <div class=" col-lg-6 text-right">
                    <a href="add_teacher.php"><button class="btn btn-primary">Add teacher</button></a>
                </div>
            </div>
            <table class="table table-striped responsive">
                <thead class="thead-dark">
                    <tr>

                        <th>Id</th>
                        <th>Name</th>
                        <th>College</th>
                        <th>Course</th>
                        <th>Subject</th>
                        <th>Phone</th>
                        <th>Email</th>
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
                            $result = mysqli_query($con, "SELECT * FROM teacher_master");
                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_assoc($result))
                                {?>
                                    <tr>
                                        <td><?=$row['teacher_id'] ?></td>
                                        <td><?=$row['teacher_name'] ?></td>
                                        <td><?=$row['teacher_college'] ?></td>
                                        <td><?=$row['teacher_course'] ?></td>
                                        <td><?=$row['teacher_subject'] ?></td>
                                        <td><?=$row['teacher_phone'] ?></td>
                                        <td><?=$row['teacher_email']?></td> 
                                        <td> <a href="view_teacher_list.php?view_id=<?=$row['teacher_id']; $row['teacher_id'];?>"><i class='fa fa-eye'></i></a> 
                                            <a href="edit_teacher_list.php?edit_id=<?= $row['teacher_id'];?>"><i class='fa fa-pencil'></i></a>
                                            <a href="dlt_teacher_list.php?id=<?= $row['teacher_id'];?>"><i class='fa fa-trash'></i></a>
                                        
                                        </td>
                                 </tr>
                                <?php  }
                            }
                           
                            else{ ?>
                                   <tr>
                                       <td  colspan='8' style="text-align: center;">No data available</td>
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