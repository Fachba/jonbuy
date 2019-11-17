
<!DOCTYPE HTML>
<html>
	<?php $this->load->view('header.php'); ?>
	<body>
		
	<div class="colorlib-loader"></div>

	<div id="page">
		<?php $this->load->view('topbar.php'); ?>

		<aside id="colorlib-hero" class="breadcrumbs">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url(<?php echo base_url();?>assets/images/cover-img-1.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h1>Checkout</h1>
				   					<h2 class="bread"><span><a href="">Home</a></span> <span><a href="">Shopping Cart</a></span> <span>Checkout</span></h2>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>
	<?php $this->load->view('footer.php'); ?>

	</body>
</html>