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
    <style>
        body{
            /* background-color: #DE7070; */
        }
        .log-in{
            margin-top: 90px;
            margin-left: 350px;
            height: 400px;
            border: 1px solid #f7f7f7;
            border-radius: 20px;
            box-shadow: 7px 10px 12px  #eee;
        }
        .label-setting{
            /* opacity: 0.5; */
            font-weight: 600;
            font-size: 25px;
            border: none;
            margin: 0;
            padding: 0;
        }
        .input-setting{
            border-radius: 45px;
            border: 0.5px solid;
            box-shadow: none;
        }
        .input-setting:focus{
            box-shadow: none;
        }

    </style>
</head>
<body>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 log-in">
                    <form action=""  method="" enctype="multipart/form-data">
                        <label class="form-control mt-5 label-setting" for="log_in" >Log in</label>
                        <input type="text"  name="log_in" id="log_in" class="form-control input-setting">
                        <label class="form-control  mt-3 label-setting" for="pass">Password</label>
                        <input type="password" name="pass" id="pass" class="form-control input-setting">
                        <div class="mb-4 mt-2">    
                        <input type="checkbox" name="checkbox" class="pb-4">   Remember me 
                        </div>
                        <button type="submit" id="button" name="submit" class="btn btn-primary mt-3 btn-block">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>