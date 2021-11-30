<?php
    $active = "college";

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
          <!-- ----------header close----------- -->
          <?php 
        $college_list = array(
            array("name"=>"Raisoni college", "address"=>"Jalgaon", "mobile"=>"8647382422", "email"=>"raisoni@gmail.com", "course"=>"MCA", "code"=>"79424"),
            array("name"=>"IMR college", "address"=>"Jalgaon", "mobile"=>"824345322", "email"=>"imr@gmail.com", "course"=>"BSC", "code"=>"9539"),
            array("name"=>"MJ college", "address"=>"Jalgaon", "mobile"=>"9244534433", "email"=>"mj@gmail.com", "course"=>"BCA", "code"=>"5349")
        );
        $college_list_size = count($college_list);
    ?>

          <section>
        <div class="container">
        <div class="row padding-20">
                <h1 class=" col-lg-6 text-left">College List </h1>
                <div class=" col-lg-6 text-right">
                    <a href="college.php" ><button class="btn btn-primary">Add college</button></a>
                </div>
            </div>
            <table class="table table-striped responsive">
                <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Course list</th>
                        <th>Code</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td >Nutan maratha college</td>
                        <td>Jalgaon</td>
                        <td>8647382422</td>
                        <td>nutan@gmail.com</td>
                        <td>MCA</td>
                        <td>36264</td>
                    </tr>
                        <?php
                             for($i=0;$i < $college_list_size; $i++)
                             {
                                 echo "<tr>";
                                 foreach($college_list[$i] as $key=>$values)
                                 {
                                     echo "<td>" . $values . "</td>";
                                 }
                                 echo "</tr>";
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