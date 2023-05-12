<?php
    include_once './connectDB.php';
    $c = new Connect();
    $dblink = $c->connectToMySQL();
    $c2 = new Connect();
    $dblink2 = $c2->connectToPDO();

    $update = $_GET['update']??"";
    $pID = $_GET['id']??"";
    $quantity = intval($_GET['quantity']);
    $date = date("Y-m-d", $time = time());
    $total = null;
    $sum = null;        

    $sql = "SELECT * FROM product WHERE pID = '$pID'";
    $re = $dblink->query($sql);
    $row = $re->fetch_assoc();
    $pName = $row['pName']??"";


    $sqlCheck = "SELECT * FROM cart";
    $reCheck = $dblink2->query($sqlCheck);
    $rowCheck = $reCheck->fetchAll(PDO::FETCH_BOTH);

    if($quantity == null)
    {
        $quantity = 0;
    }   
    else
    {
        $total = intval($quantity) * $row['pPrice'];
    }

    if($update == 0)
    {
        if(count($rowCheck) == 0)
        {
            $sqlAdd = "INSERT INTO `cart`(`uID`, `pID`, `pName`, `pCount`, `date`, `totalPrice`) VALUES (?,?,?,?,?,?)";
            $reAdd = $dblink2->prepare($sqlAdd);
            $reAdd->execute(array($_COOKIE["uID"],$pID,"$pName",$quantity,"$date",$total));
            header('Location: cart.php');
        }
        else
        {

            foreach($rowCheck as $r)
            {
                if($r['pID'] == $pID)
                {
                    $temp = intval($r['pCount']) + $quantity;
                    echo $temp;
                    $sqlSubAdd = "UPDATE cart SET pCount=$temp WHERE pID = '$pID'";
                    $reSub = $dblink->query($sqlSubAdd);
                    header('Location: cart.php');
                }
                else
                {
                    $sqlAdd = "INSERT INTO `cart`(`uID`, `pID`, `pName`, `pCount`, `date`, `totalPrice`) VALUES (?,?,?,?,?,?)";
                    $reAdd = $dblink2->prepare($sqlAdd);
                    $reAdd->execute(array($_COOKIE["uID"],$pID,"$pName",$quantity,"$date",$total));
                    header('Location: cart.php');
                }
            }
        }
    }

    if($update == 1)
    {
        $sqlUpdate = "UPDATE cart SET pCount = $quantity WHERE pID = '$pID'";
        $reUp = $dblink->query($sqlUpdate);
        header('Location: cart.php');

    }
 
?>