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
	<link href='http://fonts.useso.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.useso.com/css?family=PT+Sans:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.useso.com/css?family=Righteous' rel='stylesheet' type='text/css'>
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
		<p>Copyright &copy; 2016.Company name All rights reserved.<a target="_blank" href="http://sc.chinaz.com/moban/">
				&#x7F51;&#x9875;&#x6A21;&#x677F;</a></p>
	</div>
</div>
<!--copy-->
<!-- login -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content modal-info">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
							aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body real-spa">
				<div class="login-grids">
					<div class="login">

						<div class="login-right">
							<form>
								<h3>Login</h3>
								<input type="text" value="Enter your Email" onfocus="this.value = '';"
									   onblur="if (this.value == '') {this.value = 'Enter your Email';}" required="">
								<input type="password" value="Password" onfocus="this.value = '';"
									   onblur="if (this.value == '') {this.value = 'Password';}" required="">
								<h4><a href="#">Forgot password</a> / <a href="#">Create new password</a></h4>

								<div class="single-bottom">
									<input type="checkbox" id="brand" value="">
									<label for="brand"><span></span>Remember Me.</label>
								</div>
								<input type="submit" value="Login Now">
							</form>
						</div>

					</div>
					<p>By logging in you agree to our <a href="#">Terms</a> and <a href="#">Conditions</a> and <a
								href="#">Privacy Policy</a></p>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- //login -->
<!-- Register -->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content modal-info">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
							aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body real-spa">
				<div class="login-grids">
					<div class="login">
						<div class="login-right">
							<form>
								<h3>Register </h3>
								<input type="text" value="Name" onfocus="this.value = '';"
									   onblur="if (this.value == '') {this.value = 'Name';}" required="">
								<input type="text" value="Mobile number" onfocus="this.value = '';"
									   onblur="if (this.value == '') {this.value = 'Mobile number';}" required="">
								<input type="text" value="Email id" onfocus="this.value = '';"
									   onblur="if (this.value == '') {this.value = 'Email id';}" required="">
								<input type="password" value="Password" onfocus="this.value = '';"
									   onblur="if (this.value == '') {this.value = 'Password';}" required="">

								<input type="submit" value="Register Now">
							</form>
						</div>
						<div class="clearfix"></div>
					</div>
					<p>By logging in you agree to our <a href="#">Terms</a> and <a href="#">Conditions</a> and <a
								href="#">Privacy Policy</a></p>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- //Register -->
</body>
</html>