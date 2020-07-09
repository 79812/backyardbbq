<?php
	include('./assets/inc/header.php');
	include_once('./assets/inc/db_conn.php');
	// add comments!!!!!!
	// if there is NO category id in the url
	if(!isset($_GET['productId']))
	{
		?>
Select a product first<br />
<?php
	$sql = "SELECT * FROM products ORDER BY productCategoryId ASC";
	$result = $conn->query($sql);
	       foreach($result as $k => $v)
	       {
	       	?>
<a href="<?php echo $_SERVER['PHP_SELF']; ?>?productId=<?php echo $v['productId']; ?>"><?php echo $v['productTitle']; ?></a><br />
<?php
	}
	}
	// there is a category Id, get products from this category
	else
	{
	$selectSQL = "SELECT * FROM products WHERE productId=" . $_GET['productId'];
	$result = $conn->query($selectSQL);
	foreach($result as $k => $v)
		{
			?>
<div class="container">
	<div class="row">
		<div class="col">
			<img class="mt-5 ml-4" height="250" width="250" src="assets/media/<?php echo $v['productImage'];?>">
		</div>
		<div class="col text-break">
			<h1 class="font-weight-bold">
			<?php echo $v['productTitle']; ?></h2>
			<h1 class=""> <?php echo $v['productDescription']; ?></h1>
			<h2 class=""> <?php echo $v['productWeight']; ?></h2>
			<h2 class=""> <?php echo $v['productDimensions']; ?></h2>
			<h2 class="">&euro;&nbsp;<?php echo str_replace(".", ",", $v['productPricePerDay']); ?></h2>
			<a type="button" class="btn btn-dark mt-2 btn-lg" href="order.php?productId=<?php echo $v['productId']; ?>">Buy Now</a>
		</div>
	</div>
</div>
<?php
	}
	}
	?>
</body>
<?php include('./assets/inc/footer.php') ?>
</html>