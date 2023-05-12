<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../CSS/register.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
<?php
    include_once "./connectDB.php";
    if(isset($_POST['btnRegister']))
    {
        $c = new Connect();
        $dblink = $c->connectToPDO();
        $uName = $_POST['txtUName']??"";
        $email = $_POST['txtEmail']??"";
        $gender = $_POST['grGender']??"";
        $address = $_POST['txtAddress']??"";
        $pwd = $_POST['txtPassword']??"";
        $phone = $_POST['txtPhone']??"";
        $birthday = date("Y-m-d", strtotime($_POST['txtBirth']??""));
        $confPwd = $_POST['txtCPw']??"";
        if($pwd == $confPwd && $pwd != null)
        {
            $sql = "INSERT INTO `user`(`uName`, `email`, `gender`, `address`, `password`, `role`, `phone`, `birthday`) VALUES (?,?,?,?,?,?,?,?)";
            $re = $dblink->prepare($sql);
            $stmt = $re->execute(array("$uName", "$email", "$gender", "$address","$pwd","user","$phone","$birthday"));
            header('Location:login.php?uN='.$uName.'&pa='.$pwd.'&p=1');
        }
        else
        {
            echo "Password is incorrect";
        }
    }

    
?>
    <div class="welcome">
        <h1>Welcome to DRN Shop</h1>
    </div>
    <div class="line"></div>
    <div class="container">
        <h2>Member Registration</h2>
        <form action="" name="register-form" method="POST" class="form-horizontal needs-validation" role="form">
            <div class="row py-3 offset-2">
                <label for="txtUName" class="col-sm-2 control-label">User Name</label>
                <div class="col-sm-6">
                    <input type="text" name="txtUName" id="txtUName" class="form-control" required>
                </div>
            </div>
            <div class="row py-3 offset-2">
                <label for="txtPassword" class="col-sm-2 control-label">Passwork</label>
                <div class="col-sm-6">
                    <input type="password" name="txtPassword" id="txtPassword" class="form-control" required>
                </div>
            </div>
            <div class="row py-3 offset-2">
                <label for="txtCPw" class="col-sm-2 control-label">Confirm Password</label>
                <div class="col-sm-6">
                    <input type="password" name="txtCPw" id="txtCPw" class="form-control" required>
                </div>
            </div>
            <div class="row py-3 offset-2">
                <label for="txtEmail" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-6">
                    <input type="email" name="txtEmail" id="txtEmail" class="form-control" required>
                </div>
            </div>
            <div class="row py-3 offset-2">
                <label for="txtAddress" class="col-sm-2 control-label">Address</label>
                <div class="col-sm-6">
                    <input type="text" name="txtAddress" id="txtAddress" class="form-control" >
                </div>
            </div>
            <div class="row py-3 offset-2">
                <label for="txtAddress" class="col-sm-2 control-label">Phone Number</label>
                <div class="col-sm-6">
                    <input type="text" name="txtPhone" id="txtPhone" class="form-control" >
                </div>
            </div>
            <div class="row py-3 offset-2">
                <label for="" class="col-sm-2 col-form-label">Gender</label>
                <div class="col-sm-10 d-flex">
                    <div class="form-check my-auto">
                        <input type="radio" name="grGender" id="maleRd" value="0" checked>
                        <label for="maleRd" class="form-check-label ">Male</label>
                    </div>
                    <div class="form-check my-auto">
                        <input type="radio" name="grGender" id="femaleRd" value="1" checked>
                        <label for="femaleRd" class="form-check-label">Female</label>
                    </div>
            </div>
            <div class="row py-3"> 
                <label for="txtBirth" class="col-sm-2 control-label">Date of Birth  </label>
                    <div class="col-sm-6">
                        <input type="date" id="txtBirth" name="txtBirth" class="form-control">
                    </div>
            </div>
            <div class="row py-3">
                <div class="col-sm-3 offset-2">
                    <input type="submit" class="btn btn-primary" name="btnRegister" id="btnRegister" value="Register">
                </div>
            </div>
        </form>
    </div>
    
    <div class="login">
        <span>Did you have account? <a href="./login.php">Login</a></span>
    </div>
</body>
</html>