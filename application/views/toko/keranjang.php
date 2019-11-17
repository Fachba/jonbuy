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
					<div class="col-md-10 col-md-offset-1">
						<div class="process-wrap">
							<div class="process text-center active">
								<p><span>01</span></p>
								<h3>Shopping Cart</h3>
							</div>
							<div class="process text-center">
								<p><span>02</span></p>
								<h3>Checkout</h3>
							</div>
							<div class="process text-center">
								<p><span>03</span></p>
								<h3>Order Complete</h3>
							</div>
						</div>
					</div>
				</div>

				<div class="row row-pb-md">
					<div class="col-md-12 ">
						<div class="product-name">
							<div class="one-eight text-center">
								<span>Foto</span>
							</div>
							<div class="one-eight text-center">
								<span>Product</span>
							</div>
							<div class="one-eight text-center">
								<a href="<?php echo site_url('Keranjang/index/0') ?>">
								<span>Mitra</span>
								</a>
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
							<div class="one-eight text-center">
								<span>Beli</span>
							</div>
							
							<div class="one-eight text-center">
								<span>Remove</span>
							</div>
						</div>
						<?php if ($this->session->userdata('keranjang')==0) 
						{?>
							<div class="one-forth text-center">
								<div class="display-tc">
									<h3> </h3>
								</div>
								<div class="display-tc">
									<h3>Keranjang Anda Masih Kosong</h3>
								</div>
								<div class="display-tc">
									<h3>Silahkan Pilih dan Selamat Berbelanja</h3>
								</div>
							</div>	
						<?php } ?>
						<?php $subtotal=0; $total=0; foreach ($keranjang as $key) { ?>
						<div class="product-cart ">
							<div class="one-eight text-center">
								<div class="product-img" style="background-image: url(<?php echo base_url();?>Admin/assets/images/barang/<?php echo $key->gambar ?>);">
								</div>
								
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<a href="<?php echo site_url('Sangar/detailkaos/'.$key->kode_barang.'') ?>">
									<h3><?php echo $key->nama_barang ?> </h3>
									</a>
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
							<div class="one-eight text-center">
								<div class="display-tc">
									<a href="<?php echo site_url('Ongkir/perbarang/'.$key->no.'') ?>">
									<input type="button" value="Beli" class="btn btn-success">
									</a>
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<a href="<?php echo site_url('Keranjang/hapusitem/'.$key->no.'') ?>" class="closed"></a>
								</div>
							</div>
						</div>
						<?php } ?>
						
					</div>
				</div>
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="total-wrap">
							<div class="row">
								<div class="col-md-8">
									<form action="#">
										<div class="row form-group">
											<div class="col-md-6">
												<a href="<?php echo site_url('Sangar/index') ?>">
												<input type="button" value="Pilih Barang Lagi" class="btn btn-info btn-block">
												</a>
											</div>
											<div class="col-md-6">
												<a href="<?php echo site_url('Keranjang/hapuskeranjang') ?>">
												<input type="button" value="Kosongkan Keranjang" class="btn btn-danger btn-block">
												</a>
											</div>
											<?php if ($uri!=0)
											{?>
											<br><br><br><br>
											<div class="col-md-12">
												<a href="<?php echo site_url('Ongkir/permitra/'.$uri.'') ?>">
												<input type="button" value="Lanjutkan Pembelian" class="btn btn-success btn-block">
												</a>
											</div>
											<?php } ?>
											
										</div>
									</form>
								</div>
								<?php if ($uri!=0)
								{?>
									<div class="col-md-3 col-md-push-1 text-center">
										<div class="total">
											<div class="sub">
												<p><span>Subtotal:</span> <span><?php echo rupiah($subtotal) ?></span></p>
												<!-- <p><span>Delivery:</span> <span>$0.00</span></p> -->
												<p><span>Discount:</span> <span>0</span></p>
											</div>
											<div class="grand-total">
												<p><span><strong>Total:</strong></span> <span><?php echo rupiah($subtotal) ?></span></p>
											</div>
										</div>
									</div>
								<?php } ?>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	<?php $this->load->view('footer.php'); ?>

	</body>
</html>