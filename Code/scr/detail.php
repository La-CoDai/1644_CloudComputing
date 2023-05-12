<?php
require_once './header.php';
?>
<?php
    include_once './connectDB.php';
    $c = new Connect();
    $dblink = $c->connectToMySQL();
    $pid = $_GET['id'];
    $quantity = $_GET['quantity']??"";
    $update = $_GET['update']??"";
    
    $sql = "SELECT * FROM product WHERE pID = '$pid'";
    $re = $dblink->query($sql);
    $row = $re->fetch_assoc();
?>
<style>
    .pDetail{
        width: 1600px;
        height: fit-content;
        min-height: 760px;
        background-color:#5EE1B8;
        display: flex;
        margin: 0 auto;
        margin-top: 60px;
        padding: 30px 30px;
        border-radius: 24px;
        
    }
    .pDetail img{
        width: 700px;
        border-radius: 18px;
        
    }
    .Pcontent{
        display: flex;
        flex-direction: column;
        width: fit-content;
        justify-content: space-between;
        margin-left: 20px;
    }
    .detail-content{
        display: flex;
        flex-direction: column;
        padding: 20px 20px;
        background: #D5D58E;
        border-radius: 18px;
        width: fit-content;
        height: fit-content;
     
    }
    .detail-content span:nth-child(1){
        font-size: 50px;
        
    }
    .detail-content span:nth-child(2){
        font-size: 30px;
    }.description{
        background: #fff;
        width: fit-content;
        padding: 20px 20px;
        border-radius: 18px;
     
        
    }
    .description span{
        font-size: 30px;
        font-weight: 500;
        margin-bottom: 10px;
    }
    .add-cart{
        width: fit-content;
   
        
    }
    .add-cart span{
        font-size: 25px;
    }
</style>
<div class="pDetail">
    <img src="<?=$row['Img']?>" alt="">
    <div class="Pcontent">
        <div class="detail-content">
            <span><?=$row['pName']?></span>
            <span>&#8363 <?=$row['pPrice']?></span>
        </div>
        <div class="description">
            <span>Description</span>
            <p><?=$row['pDescription']?></p>
        </div>
        <div class="add-cart">
            <span>Quantity:</span><br>
            <form action="addCart.php?">
                <input type="number" name="quantity" value="<?=$quantity?>">
                <input type="text" value="<?=$pid?>" name="id" style="display:none;">
                <input type="text" value="<?=$update?>" name="update" style="display:none;">
                <button class="btn btn-primary" name="btnQuantity">Add to cart</button>
            </form>
        
        </div>
    </div>
</div>