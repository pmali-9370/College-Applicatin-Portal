<?php
    $active="addmision";
    require_once("database.php");
    $result = mysqli_query($con,"SELECT * FROM tbl_addmision_master ORDER BY id DESC");    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        if(mysqli_query($con,"DELETE FROM tbl_addmision_master WHERE id='$id'"))
        {
            echo "deta is deleted";
            header('Location: addmision_list.php');
        }
        else{
            echo "data not deleted";
            header('Location: addmision_list.php');
        }
    }
    if(isset($_POST['search'])){
        $query = $_POST['query'];
        $result = mysqli_query($con, "SELECT * FROM tbl_addmision_master WHERE student_name LIKE '%$query%' OR mobile_number LIKE '%$query%' OR email LIKE '%$query%' ");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="assets/css/font-awesome.min.css"> 
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/06a4e453eb.js"></script>
    <script src="https://use.fontawesome.com/06a4e453eb.js"></script>
     <title>Addmision List</title>
</head>
<body>
    <?php
        require_once("header.php")
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 heading-student">
                <h1>Addmision List</h1>
            </div>
            <div class="col-md-6 text-center " style="padding-top: 30px;">
                <a type="button" class="btn btn-primary" href="addmision.php">Add Addmision</a>
            </div>
        </div>
        <form action="addmision_list.php" method="post" >
          <div class="row">
            <div class="col-md-3 heading-student">
                <h3>Search</h3>
            </div>
            <div class="col-md-6 heading-student">
            <input type="text" class="form-control" name="query" id="query" value="<?php if(isset($_POST['query'])){  echo $_POST['query'];  }?>" placeholder="Student name, mobile no, email id"/>
            </div>
            <div class="col-md-3 text-center " style="padding-top: 30px;">
                <input type="submit" class="btn btn-primary" name="search" value="Search Now">
            </div>
          </div>
        </form> 
    </div>
    <section>
        <div class="container">        
          <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Sr No</th>
                        <th scope="col">Student Name</th>
                        <th scope="col">Mobile Number</th>
                        <th scope="col">E Mail</th>
                        <th scope="col">Student Address</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
               
                <tbody>
                <?php
                if(mysqli_num_rows($result) > 0){
                    $i=1;
                    while($row = mysqli_fetch_assoc($result)){
                    echo "<tr>";
                             echo "<td>".$i."</td>";
                            echo "<td>".$row['student_name']."</td>";
                            echo "<td>".$row['mobile_number']."</td>";
                            echo "<td>".$row['email']."</td>";
                            echo "<td>".$row['student_address']."</td>";
                            echo "<td>";
                            ?>
                            <img src="assets/doc/photo/<?= $row['photo'];  ?>" class="img-fluid" height="100px" width="100px">
                            <?php 
                            echo "</td><td>";
                            ?>
                            <a href="view_addmision.php?id=<?= $row['id'];?>"><i class='fa fa-eye'></i></a>
                            <a href="edit_addmision.php?id=<?= $row['id'];?>"><i class='fa fa-pencil text-success'></i></a>
                            <a href="addmision_list.php?id=<?= $row['id'];?>"><i class='fa fa-trash text-danger'></i></a>

                        
                <?php
                     echo "</td>";
                    echo "</tr>";
                    $i++;
                    } 
                }
                else{
                    echo  "<tr align='center'><td colspan='9'>Data Not Found!!</td></tr>";
                  }
                ?>         
                </tbody>
                
            </table>
        </div>
    </section>
    <?php
        require_once("footer.php")
    ?>
</body>
</html>