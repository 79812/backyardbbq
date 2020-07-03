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
	$selectSQL = "SELECT * FROM products WHERE productCategoryId=" . $_GET['productCategoryId'] . " ORDER BY productId ASC";

 	$result = $conn->query($selectSQL);
        foreach($result as $k => $v)
        	{
        		?>
			    <div class="container">
			        <h1 class="font-weight-bold"><?php echo $v['productCategoryTitle']; ?></h2>
			        <img class="" height="150" width="150;" src="assets/media/<?php echo $v['productCategoryImage'];?>">
			        <h1 class=""> <?php echo $v['productCategoryDescription']; ?></h1>
					<a type="button" class="btn btn-dark mt-2 btn-lg" href="order.php?productId=<?php echo $v['productCategoryId']; ?>">Buy Now</a>
			    </div>
			<?php
			}
}
?>
</body>
<?php include('./assets/inc/footer.php') ?>
</html>