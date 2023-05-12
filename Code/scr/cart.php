<?php
require_once './header.php';
?>
<div class="error" 
style="display: <?php 
            if(isset($_COOKIE["userName"]))
            {
                echo "none;";
            }
            {
                echo "block";
            }
        ?>">
    <h3>Login to buy!</h3>
</div>
<style>
    .error{
        background-color: red;
        width: fit-content;
        padding: 5px 10px;
        margin: 0 auto;
        
    }
    .cart{
        background: #5EE1B8;
        width: 1480px;
        margin: 0 auto;
        padding: 20px 20px;
        margin-top: 50px;
        border-radius: 16px;
        min-height: 650px;
    }
    .table{
        font-size: 18px;
        
    }
    .table tr{
        border-bottom: 2px solid #889C9F;
    }
    td a{
        text-decoration: none;
        font-weight: 400;
    }
    td a:nth-child(1){
        background-color: red;
        padding: 3px 6px;
        border-radius: 18px;
        color: #000;
    }
    td a:nth-child(2){
        background-color: #0F6AFF;
        padding: 3px 6px;
        border-radius: 18px;
        color: #fff;
    }
</style>

<div class="cart">
    <table class="table">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>User ID</th>
                <th>Quantity</th>
                <th>Date</th>
                <th>Total</th>
                <th>Management</th>
            </tr>
        </thead>
<?php
include_once'./connectDB.php';
$c = new Connect();
$dblink = $c->connectToMySQL();
$c2 = new Connect();
$dblink2 = $c2->connectToPDO();

$sum = null;

$sqlCart = "SELECT * FROM cart";
$reCart = $dblink2->prepare($sqlCart);
$reCart->execute();
$rowCart = $reCart->fetchAll(PDO::FETCH_BOTH);
foreach($rowCart as $r):
?>
        <tbody>
            <tr>
                <td><?=$r['pName']?></td>
                <td><?=$r['uID']?></td>
                <td><?=$r['pCount']?></td>
                <td><?=$r['date']?></td>
                <td><?=$r['totalPrice']?></td>
                <td>
                    <a href="./deleteCart.php?id=<?=$r['pID']?>">Delete</a>
                    <a href="./detail.php?id=<?=$r['pID']?>&quantity=<?=$r['pCount']?>&update=1">Update</a>
                </td>
            <?php

            ?>
        </tbody>
        <?php
        $sum += $r['totalPrice'];
        endforeach;
        ?>
        <tfoot>
            <tr>
                <td class="result" colspan="4">SUM: </td>
                <td><?=$sum?></td>
                <td><a href="./order.php?" class="order">Order</a></td>
            </tr>
        </tfoot>
    </table>
</div>
<div class="line"></div>
<?php

require_once './footer.php';
?>
