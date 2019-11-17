
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

		<div class="colorlib-shop">
			<div class="container">
				<div class="row">
					<div class="col-md-7">
						<div class="cart-detail">	
							<h2>Rincian Pengiriman</h2>
			              	<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="nama">Kode Penjualan</label>
				                    	<input type="text" name="kode" class="form-control" required disabled value="<?php echo $pengiriman['kode_penjualan'];?>">
				                    	<?php echo form_error('kode') ?>	
				                  	</div>
				               </div>
				               <div class="form-group">
									<div class="col-md-6">
										<label for="nama">Nama Pengirim</label>
										<input type="text" name="nama" class="form-control" value="<?php echo $pengiriman['nama_mitra'];?>" required>
										<?php echo form_error('nama') ?>
									</div>
									<div class="col-md-6">
										<label for="tanggal">Tanggal Kirim</label>
										<input type="text" name="tanggal" class="form-control"  required disabled value="<?php echo $pengiriman['tanggal_ubah'];?>">
										<?php echo form_error('tanggal') ?>
									</div>
								</div>
								<div class="form-group col-md-12">
									<div class="col-md-6">
										<label for="sub total">Jasa Pengiriman</label><br>
										<input class="form-control" id="jasa" type="text" name="jasa" disabled value="<?php echo $pengiriman['jasa'];?>" />
										<?php echo form_error('jasa') ?>
									</div>
									<div class="col-md-6">
										<label for="sub total">Biaya Pengiriman</label><br>
										<input class="form-control" id="total" type="text" name="total" disabled value="<?php echo $pengiriman['biaya'];?>" />
										<?php echo form_error('total') ?>
									</div>
									
								</div>
								<a href="<?php echo site_url('Pesanan/index') ?>" class="btn btn-danger col-md-12">Batalkan dan Kembali</a>
		              	</div>
		              </div> 
					</div>
					<div class="col-md-5">
						<img style="height: 500px" src="<?php echo base_url() ?>/admin/assets/images/resi/<?php echo $pengiriman['resi'];?>" id="preview-image" alt="Preview Gambar Kosong"/>
					</div>
				<?php echo form_close(); ?>
				</div>
			</div>
		</div>


	<?php $this->load->view('footer.php'); ?>

	</body>
</html>