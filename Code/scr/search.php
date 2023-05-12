<?php
include_once './header.php';
?>
<style>
    .result{
        width: fit-content;
        display: flex;
        margin: 10px 20px;
        background: #5EE1B8;
        border-radius: 18px;
        padding: 20px 10px;
    }
    .search-product{
        width: fit-content;
        margin: 0 10px;
        padding: 10px 20px;
        background-color: #fff;
        border-radius: 16px;
    }
    .search-product:hover{
        transform:scale(1.1);
    }
    .search-product img{
        width: 200px;
        height: 200px;
        margin: 0 auto;
    }
    .searchcard-body{
        display: flex;
        flex-direction: column;
    }
    a{
        text-decoration: none;
        color: #000;
        font-weight: 500;
    }
</style>
<div class="result">
<?php
include_once './connectDB.php';
$c = new Connect();
$dblink = $c->connectToPDO();
$nameP = $_GET['txtSearch']??"";
$sql = "SELECT * FROM product where pName LIKE ?";
$re = $dblink->prepare($sql);
$re->execute(array("%$nameP%"));
$rows = $re->fetchAll(PDO::FETCH_BOTH);
foreach ( $rows as $r):
?>
<!-- <h1>Result for <?= $nameP?></h1> -->
<div class="search-product">
    <img src="<?=$r['Img']?>" alt="">
    <div class="searchcard-body">
        <a href="detail.php?id=<?=$r['pID']?>&update=0"><?=$r['pName']?></a>
        <span>&#8363 <?=$r['pPrice']?></span>
        <a href="detail.php?id=<?=$r['pID']?>&update=0">Add to cart</a>
    </div>
</div>

<?php
endforeach;
?>
</div>
