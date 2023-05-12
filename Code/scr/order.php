<?php
    include_once './connectDB.php';
    $c = new Connect();
    $dblink = $c->connectToPDO();

    $sqlCart = "SELECT * FROM cart";
    $reCart = $dblink->query($sqlCart);
    $rowCart = $reCart->fetchAll();
    $date = date("Y-m-d", $time = time());

    foreach ($rowCart as $r)
    {
        $uID = $r['uID'];
        $pID = $r['pID'];
        $pQuan = $r['pCount'];
        $sum = $r['totalPrice'];
        $sqlOrder = "INSERT INTO `order2`(`uID`, `pID`, `Quantity`, `sum`, `date`) VALUES (?,?,?,?,?)";
        $reOrder = $dblink->prepare($sqlOrder);
        $reOrder->execute(array($uID,"$pID",$pQuan,$sum,"$date"));
    }
    $sqlDel = "DELETE FROM cart";
    $dblink->query($sqlDel);
    header('Location: cart.php');
?>