<?php include 'format.php'; ?>
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
		<div class="row row-pb-md">
			<div class="col-md-10 col-md-offset-1">
				<?php echo form_open_multipart('Pembayaran/cari'); ?>
				<?php echo validation_errors(); ?>
				<div class="row form-group">
					<div class="col-md-8">
						<input type="text" name="kode" class="form-control input-number" placeholder="Kode Penjualan Anda...">
					</div>
					<div class="col-md-4">
						<input type="submit" value="Cari Status Pembayaran" class="btn btn-primary">
						<a href="<?php echo site_url('Pembayaran/index/') ?>">
                    	<button type="button" class="btn btn-info">Reset</button>
                    	</a>
					</div>
				</div>
				<?php echo form_close(); ?>
				<div class="product-name">
					<div class="one-eight text-center">
						<span>Kode Penjualan</span>
					</div>
					<div class="one-forth text-center">
						<span>Detail Pembayaran</span>
					</div>
					<div class="one-eight text-center">
						<span>Sub Total</span>
					</div>
					<div class="one-eight text-center">
						<span>Status</span>
					</div>
					<div class="one-eight text-center">
						<span>Konfirmasi</span>
					</div>
				</div>
				<?php if ($pembayaran==null) 
				{?>
					<div class="one-forth text-center">
						<div class="display-tc">
							<h3> </h3>
						</div>
						<div class="display-tc">
							<h3>Tidak Ada Hasil Yang Ditampilkan</h3>
						</div>
						<div class="display-tc">
							<h3>Silahkan Bertransaksi, Terima Kasih</h3>
						</div>
					</div>	
				<?php } ?>
				<?php foreach ($pembayaran as $key) { ?>
				<div class="product-cart">
					<div class="one-eight">
						<div class="display-tc">
							<h3><?php echo $key->kode_penjualan ?>
						</div>
					</div>
					<div class="one-forth">
						<div class="display-tc text-center">
							<h3>Nama : <?php echo $key->nama_mitra ?>&emsp;Bank : <?php echo $key->bank ?> &emsp;Nomor Rekening : <?php echo $key->rekening ?></h3>
						</div>
					</div>
					
					<div class="one-eight">
						<div class="display-tc">
							<h3><?php echo $key->sub_total ?></h3>
						</div>
					</div>
					<div class="one-eight text-center">
						<div class="display-tc">
							<?php
                            if($key->status_pembayaran==0)
                            {
                                ?>
                                <button type="button" class="btn-danger">Belum</button>
                                <?php
                            }
                            else if($key->status_pembayaran==1)
                            {
                                ?>
                                <button type="button" class="btn-primary">Verifikasi</button><?php
                            }
                            else
                            {
                            	?>
                                <button type="button" class="btn-success">Lunas</button><?php	
                            }
                            ?>
						</div>
					</div>
					<div class="one-eight text-center">
						<div class="display-tc">
							<a href="<?php echo site_url('Pembayaran/konfirmasi/'.$key->id_pembayaran.'') ?>">
                        	<button type="button" class="btn-success">Konfirmasi</button>
                        	</a>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>

	<?php $this->load->view('footer.php'); ?>

	</body>
</html>