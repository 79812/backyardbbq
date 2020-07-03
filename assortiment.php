<?php
include('./assets/inc/header.php');
include_once('./assets/inc/db_conn.php');

$selectSQL = "SELECT * FROM productcategories ORDER BY productCategoryId ASC";

 $result = $conn->query($selectSQL);
        foreach($result as $k => $v)
        	{?>
			<body>
			    <div class="container">
			        <h1 class="font-weight-bold"><?php echo $v['productCategoryTitle']; ?></h2>
			        <img class="" height="150" width="150;" src="assets/media/<?php echo $v['productCategoryImage'];?>">
			        <h1 class=""> <?php echo $v['productCategoryDescription']; ?></h1>
					<a type="button" class="btn btn-dark mt-2 btn-lg" href="product-page.php?productCategoryId=<?php echo $v['productCategoryId']; ?>">Buy Now</a>
			    </div>
			<?php
			}?>
			</body>
<?php include('./assets/inc/footer.php') ?>
</html>