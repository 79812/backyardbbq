function setvalue(){
	var totalprice;
	var priceperday = $('#price-per-day').html();
	var daysamount = $('#days').html();;
	var daysamountint = parseInt(daysamount, 10);
	priceperday = Number(priceperday.replace(/[^0-9\.]+/g, ""));
	totalprice = priceperday * daysamountint;
	totalprice = totalprice.toFixed(2);
	$('#sum').val(totalprice);
}
$('#dropdown-test').on("input", function (){
	$('#days').html(this.value);
	$('#sum').val(this.value);
});