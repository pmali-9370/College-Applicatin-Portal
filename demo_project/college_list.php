<?php
    $active = "college";
    require_once("connection.php");
    $result = mysqli_query($con,"SELECT * FROM add_clg_master");
    if(isset($_POST['search'])){
        $query = $_POST['query'];
        $result = mysqli_query($con, "SELECT admissions WHERE college_name LIKE '%$query%'");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College</title>
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
         <!-- ------header-------- -->
       <?php  require_once("header.php"); ?>
          <!-- ----------header close----------- -->
          
         <!-- -----------Database connection---------- -->

         <?php require_once("connection.php");?>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="add_college.php">Add College</a></li>
                <li class="breadcrumb-item active" aria-current="page">College List</li>
            </ol>
        </nav>
    <!-- ------------------------------------- -->
        
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                    <form action="college_list.php" method="post" class="form" style="margin-top: 20px;">
                        <div class="row ">
                            <div class="col-lg-6 text-right">
                                <label for="query"  style="text-align: right; font-weight: bold; font-size: 24px;">Search here</label>
                            </div>
                            <div class="col-lg-6 ">
                                <input type="text" placeholder="Search college name here" id="query" name="query" class="w-100" style="margin-top: 7px;"/>
                                <button type="button" name="search" id="search" class="btn btn-light mt-3">Search</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div> 
        
            
        <section>
        <div class="container">
        <div class="row padding-20">
                <h1 class=" col-lg-6 text-left">College List </h1>
                <div class=" col-lg-6 text-right">
                    <a href="add_college.php" ><button class="btn btn-primary">Add college</button></a>
                </div>
            </div>
            <table class="table table-striped ">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Course</th>
                        <th>Photo</th>

                        <th>Code</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                        <?php                           
                        // $college_list = array(
                        //     array("name"=>"Raisoni college", "address"=>"Jalgaon", "mobile"=>"8647382422", "email"=>"raisoni@gmail.com", "course"=>"MCA", "code"=>"79424"),
                        //     array("name"=>"IMR college", "address"=>"Jalgaon", "mobile"=>"824345322", "email"=>"imr@gmail.com", "course"=>"BSC", "code"=>"9539"),
                        //     array("name"=>"MJ college", "address"=>"Jalgaon", "mobile"=>"9244534433", "email"=>"mj@gmail.com", "course"=>"BCA", "code"=>"5349")
                        // );
                        // $college_list_size = count($college_list);
                        // for($i=0;$i < $college_list_size; $i++)
                        // {
                        //     echo "<tr>";
                        //     foreach($college_list[$i] as $key=>$values)
                        //     {
                        //         echo "<td>" . $values . "</td>";
                        //     }
                        //     echo "</tr>";
                        // }

                        
                        if(mysqli_num_rows($result) > 0){ 
                            $i=1; 
                            while($row = mysqli_fetch_assoc($result))
                            {?>
                            <tr>
                                <td> <?=$i;?></td>
                                <td> <?=$row['clg_name']; ?></td>
                                <td> <?=$row['clg_adderess'];?> </td>
                                <td> <?=$row['clg_number']; ?> </td>
                                <td> <?=$row['clg_email']; ?> </td>
                                <td><?=$row['clg_cource']; ?> </td>
                                <td>
                                    <img src="assets/doc/photo/<?= $row['photo'];?>" class="img-fluid" width="100" height="100" />
                                </td>
                                <td><?=$row['clg_code']; ?> </td>
                                 <td><a href="view_collage.php?view_id=<?= $row['clg_id'];?>"><i class='fa fa-eye'></i></a> 
                                     <a href="edit_college.php?edit_id=<?= $row['clg_id'];?>"><i class='fa fa-pencil'></i></a>
                                     <a href="dlt_collage.php?clg_id=<?= $row['clg_id'];?>"><i class='fa fa-trash'></i></a>
                                </td>
                            </tr>
                           <?php $i++; }
                         }
                        else{
                             echo "<tr><td align='center' colspan='9'>0 result</td></tr>";
                        }
                        ?>
                </tbody>
            </table>
                </tbody>
            </table>
        </div>
    </section>
        
          <?php
        require_once("footer.php");
    ?>
</body>
</html>