<?php
	include('./assets/inc/header.php');
	include_once('./assets/inc/db_conn.php');
	// add comments!!!!!!
	// if there is NO category id in the url
	if(!isset($_GET['productCategoryId']))
	{
		?>
Select a category first<br />
<?php
	$sql = "SELECT * FROM productcategories ORDER BY productCategoryId ASC";
	$result = $conn->query($sql);
	       foreach($result as $k => $v)
	       {
	       	?>
<a href="<?php echo $_SERVER['PHP_SELF']; ?>?productCategoryId=<?php echo $v['productCategoryId']; ?>"><?php echo $v['productCategoryTitle']; ?></a><br />
<?php
	}
	}
	// there is a category Id, get products from this category
	else
	{
	$selectSQL = "SELECT * FROM productCategories WHERE productCategoryId=" . $_GET['productCategoryId'];
	$result = $conn->query($selectSQL);
	foreach($result as $k => $v)
		{
			?>
<div class="container">
	<div class="row">
		<div class="col">
			<img class="mt-5 ml-4" height="250" width="250;" src="assets/media/<?php echo $v['productCategoryImage'];?>">
		</div>
		<div class="col text-break">
			<h1 class="font-weight-bold">
			<?php echo $v['productCategoryTitle']; ?></h2>
			<h1 class=""> <?php echo $v['productCategoryDescription']; ?></h1>
			<select name="to_user" class="form-control" onChange="window.location.href=this.value">
			<?php
					$sql = mysqli_query($conn, "SELECT * FROM products WHERE productCategoryId=" . $_GET['productCategoryId']);
				$row = mysqli_num_rows($sql);
				while ($row = mysqli_fetch_array($sql)){
				echo "<option value='". $row['productId'] .".php'>" .$row['productTitle'] ."</option>";
				}
				?>
			</select>
			<a type="button" class="btn btn-dark mt-2 btn-lg" href="product-page.php?productCategoryId=<?php echo $v['productCategoryId']; ?>">Buy Now</a>
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