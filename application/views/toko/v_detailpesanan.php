<?php include 'format.php'; ?>
<!DOCTYPE HTML>
<html>
	<?php $this->load->view('header.php'); $uri=$this->uri->segment(3); ?>
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
				   					<h1>Shopping Cart</h1>
				   					<h2 class="bread"><span><a href="">Home</a></span> <span><a href="">Product</a></span> <span>Shopping Cart </span></h2>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>

		<div class="colorlib-shop">
			<div class="container">

				<div class="row row-pb-md">
					<div class="col-md-12 ">
						<div class="product-name">
							<div class="one-forth text-center">
								<span>Produk</span>
							</div>
							
							<div class="one-eight text-center">
								<span>Mitra</span>
							</div>
							<div class="one-eight text-center">
								<span>Price</span>
							</div>
							<div class="one-eight text-center">
								<span>Quantity</span>
							</div>
							<div class="one-eight text-center">
								<span>Total</span>
							</div>
							
						</div>
						<?php $subtotal=0; $total=0; foreach ($detailpesanan as $key) { ?>
						<div class="product-cart ">
							<div class="one-forth">
								<div class="product-img" style="background-image: url(<?php echo base_url();?>Admin/assets/images/barang/<?php echo $key->gambar ?>);">
								</div>
								<div class="text-center">
									<br><br>
									<h3><?php echo $key->nama_barang ?> </h3>
								</div>
								
							</div>
							
							<div class="one-eight text-center">
								<div class="display-tc">
									<a href="<?php echo site_url('Keranjang/index/'.$key->id_mitra.'') ?>">
									<h3><?php echo $key->nama_mitra ?> </h3>
									</a>
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<span class="price"><?php echo rupiah($key->harga_jual) ?></span>
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<input type="text" id="quantity" name="quantity" class="form-control input-number text-center" value="<?php echo $key->jumlah ?>" min="1" max="100">
								</div>
							</div>
							<?php $total=$key->jumlah*($key->harga_jual);
							$subtotal=$subtotal+$total; ?>
							<div class="one-eight text-center">
								<div class="display-tc">
									<span class="price"><?php echo rupiah($total) ?></span>
								</div>
							</div>
							
						</div>
						<?php } ?>
						
					</div>
				</div>
				
			</div>
		</div>

	<?php $this->load->view('footer.php'); ?>

	</body>
</html>