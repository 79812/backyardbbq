<?php
	include('./assets/inc/header.php');
	include_once('./assets/inc/db_conn.php');
	?>
<body>
	<div class="container">
		<div class="row">
			<?php
				$selectSQL = "SELECT * FROM productcategories ORDER BY productCategoryId ASC";
				
				 $result = $conn->query($selectSQL);
				        foreach($result as $k => $v)
				        	{?>			
			<div class="col">
				<h1 class="font-weight-bold">
				<?php echo $v['productCategoryTitle']; ?></h2>
				<img class="" height="150" width="150" src="assets/media/<?php echo $v['productCategoryImage'];?>">
				<h4 class=""><?php echo $v['productCategoryDescription']; ?></h4>
				<a type="button" class="btn btn-dark mt-2 btn-lg" href="category-info.php?productCategoryId=<?php echo $v['productCategoryId']; ?>">Buy Now</a>
			</div>
			<?php
				}?>		
		</div>
	</div>
</body>
<?php include('./assets/inc/footer.php') ?>
</html>