<!DOCTYPE HTML>
<html>
<head>
	<title>Home</title>
	<!---css--->
	<link href="static/css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href="static/css/style.css" rel='stylesheet' type='text/css' />
	<!---css--->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Real Space Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!---js--->
	<script src="static/js/jquery-1.11.1.min.js"></script>
	<script src="static/js/bootstrap.js"></script>
	<!---js--->
	<!---fonts-->
	<!---fonts-->
	<script src="static/js/responsiveslides.min.js"></script>
	<script>
		$(function () {
			$("#slider").responsiveSlides({
				auto:true,
				nav: false,
				speed: 500,
				namespace: "callbacks",
				pager:true,
			});
		});
	</script>
	<link href="static/css/owl.carousel.css" rel="stylesheet">
	<script src="static/js/owl.carousel.js"></script>
	<script>
		$(document).ready(function() {
			$("#owl-demo").owlCarousel({
				items : 1,
				lazyLoad : true,
				autoPlay : true,
				navigation : false,
				navigationText :  false,
				pagination : true,
			});
		});
	</script>

</head>
<body>
<?php echo $this->renderPartial('/layouts/header');?>

<?php echo $content;?>

<!---footer--->
<!--copy-->
<div class="copy-section">
	<div class="container">
		<p>Copyright &copy; 2016. Howiesoft-豪伊科技. All rights reserved.京ICP备15053614号</p>
	</div>
</div>
<!--copy-->
</body>
</html>