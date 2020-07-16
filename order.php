<?php
	include('./assets/inc/header.php');
	include_once('./assets/inc/db_conn.php');
	// add comments!!!!!!
	// if there is NO category id in the url
	if(!isset($_GET['productId']))
	{
		?>
Select a category or a product first<br />
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
	$selectSQL = "SELECT * FROM products WHERE productId=" . $_GET['productId'];
	$result = $conn->query($selectSQL);
	foreach($result as $k => $v)
		{
			?>
<div class="container mt-3">
<div class="row">
<div class="col">
	<img height="125" width="125" src="assets/media/<?php echo $v['productImage'];?>">
	<div class="font-weight-bold">
		<?php echo $v['productTitle']; ?>
	</div>
	<div class="font-weight-bold">
		&euro;&nbsp;<?php echo str_replace(".", ",", $v['productPricePerDay']); ?>
		<select name="to_user" class="form-control" id="dropdown-test"  onchange="setvalue()">
			<option selected="true" disabled="disabled" for="value1">Aantal dagen:</option>
			<option>1</option>
			<option>2</option>
			<option>3</option>
			<option>4</option>
			<option>5</option>
			<option>6</option>
			<option>7</option>
			<option>8</option>
			<option>9</option>
			<option>10</option>
		</select>
	</div>
	<?php include('./assets/inc/form_submit.php'); ?>
</div>
<?php //ORDER SUM: ?>
<div class="col text-break border">
	<div class="row">
		<div class="col">
			<div class="font-weight-bold mt-2">
				Prijs (per dag):
			</div>
			<div class="font-weight-bold mt-2">
				Aantal dagen:
			</div>
			<hr>
			<div class="font-weight-bold mt-2">
				Totaalprijs:
			</div>
		</div>
		<div class="col">
			<div class="col font-weight-bold mt-2">
				<div id="price-per-day">&euro;&nbsp;<?php echo $v['productPricePerDay']; ?></div>
			</div>
			<div class="col font-weight-bold mt-2">
				<span id="days">&nbsp;</span>
				<hr>
				<input type="number" name="sum" id="sum" class="form-control" value="" readonly="x" />
				<a type="button" class="btn btn-dark mt-2 btn-lg" href="order.php?productId=<?php echo $v['productId']; ?>">Bestel nu</a>
			</div>
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