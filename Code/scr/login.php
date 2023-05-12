<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../CSS/login_style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
<?php
    include_once './connectDB.php';
    $c = new Connect();
    $dblink = $c->connectToPDO();
    if(isset($_POST['btnLogin']))
    {
        $uName = $_POST['txtUName']??"";
        $pwd = $_POST['txtPassword']??"";
        $sql = "SELECT * FROM user";
        $re = $dblink->query($sql);
        $row = $re->fetchAll(PDO::FETCH_BOTH);
        foreach ($row as $r)
        {
            if($r['uName'] == $uName and $r['password'] == $pwd)
            {
                setcookie("userName", $r['uName'],time()+3600);
                setcookie("uID", $r['uID'],time()+3600);
                header('Location: home.php?');
            }
        }
        
    }

?>
    <div class="welcome">
        <h1>Welcome to DRN Shop</h1>
    </div>
    <div class="line"></div>
    <div class="container">
        <form action="" name="login-form" method="POST" class="form-horizontal needs-validation" role="form">
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
            <div class="row py-3">
                <div class="col-sm-4 offset-5">
                    <input type="submit" class="btn btn-primary col-sm-5" name="btnLogin" id="btnLogin" value="Login">
                </div>
            </div>
        </form>
    </div>
</body>
</html>