<?php
    ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DRN Shop</title>
    <link rel="stylesheet" href="../CSS/ASM2_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="icon" href="../Image/Custom-Icon-Design-Pretty-Office-11-Shop.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<?php

?>
<body>
    <nav>
        <div class="logo">
            <img src="../Image/logo.png" alt="" title="Logo">
        </div>
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center p-4">
                <div class="col-sm-7">
                    <div class="search">
                        <form action="./search.php" class="search-form d-flex" method="GET">
                            <input type="text" class="form-control" name="txtSearch" placeholder="Search product">
                            <button class="btn btn-primary " name="btnSearch">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="top-menu">
            <ul>
                <li><a href="./home.php">Home</a></li>
                <li>
                    <a href="">Product</a>
                    <ul class="sub-nav">
                        <li><a href="./search.php?txtSearch=Samsung">Samsung</a></li>
                        <li><a href="./search.php?txtSearch=Iphone">Iphone</a></li>
                        <li><a href="./search.php?txtSearch=Laptop">Laptop</a></li>
                    </ul>
                </li>
                <li><a href="./cart.php">Cart</a></li>
                <li>
                    <a href="">
                        <?php
                            if(isset($_COOKIE["userName"]))
                            {
                                echo $_COOKIE["userName"];
                            }
                            else
                            {
                                echo "Account";
                            }
                        ?>
                    </a>
                    <ul class="sub-nav account">
                        <li style="display:<?php 
                            if($_COOKIE["userName"])
                            {
                                echo "none;";
                            }
                            else
                            {
                                echo "block;";
                            }
                        ?>">
                            <a href="./login.php">Login</a>
                        </li>
                        <li style="display:<?php 
                            if($_COOKIE["userName"])
                            {
                                echo "none;";
                            }
                            else
                            {
                                echo "block;";
                            }
                        ?>">
                            <a href="./register.php">Register</a>
                        </li>
                        <li style="display:<?php 
                            if(isset($_COOKIE["userName"]) )
                            {
                                echo "block;";
                            }
                            else
                            {
                                echo "none;";
                            }
                        ?>">
                            <a href="./logout.php">Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>