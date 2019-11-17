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
				<?php echo form_open_multipart('Pesanan/cari'); ?>
				<?php echo validation_errors(); ?>
				<div class="row form-group">
					<div class="col-md-8">
						<input type="text" name="kode" class="form-control input-number" placeholder="Kode Penjualan Anda...">
					</div>
					<div class="col-md-4">
						<input type="submit" value="Cari Kode Penjualan" class="btn btn-primary">
						<a href="<?php echo site_url('Pesanan/index/') ?>">
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
						<span>Status Penjualan</span>
					</div>
					<div class="one-eight text-center">
						<span>Sub Total</span>
					</div>
					<div class="one-eight text-center">
						<span>Detail</span>
					</div>
					<div class="one-eight text-center">
						<span>Konfirmasi</span>
					</div>
				</div>
				<?php if ($pesanan==null) 
				{?>
					<div class="one-forth text-center">
						<div class="display-tc">
							<h3> </h3>
						</div>
						<div class="display-tc">
							<h3>Tidak Ada Hasil Yang Ditampilkan</h3>
						</div>
						<div class="display-tc">
							<h3>Silahkan Bertransaksi Dan Lakukan Pembayaran, Terima Kasih</h3>
						</div>
					</div>	
				<?php } ?>
				<?php foreach ($pesanan as $key) { ?>
				<div class="product-cart">
					<div class="one-eight">
						<div class="display-tc">
							<h3><?php echo $key->kode_penjualan ?>
						</div>
					</div>
					<div class="one-forth">
						<div class="display-tc text-center">
							<?php $status=$key->status_penjualan ?>
                            <?php if ($status==0)
                            {
                                ?>
                                <button type="button" class="btn btn-danger">Mengirim Pesanan</button>
                                <?php
                            }
                            elseif ($status==1)
                            {
                                 ?>
                                <button type="button" class="btn btn-success">Pesanan Diterima</button><?php
                            }
                            elseif ($status==2)
                            {
                                ?>
                                <button type="button" class="btn btn-warning">Pesanan Diproses</button><?php
                             }
                             elseif ($status==3)
                            {
                                ?>
                                <a href="<?php echo site_url('Pesanan/pengiriman/'.$key->kode_penjualan.'') ?>">
                                <button type="button" class="btn btn-info">Pesanan Sedang Dikirim</button></a><?php
                             } ?>
						</div>
					</div>
					
					<div class="one-eight">
						<div class="display-tc">
							<h3><?php echo $key->sub_total ?></h3>
						</div>
					</div>
					<div class="one-eight text-center">
						<div class="display-tc">
							<a href="<?php echo site_url('Pesanan/detail/'.$key->kode_penjualan.'') ?>">
							<button type="button" class="btn-info">Detail</button>
							</a>
						</div>
					</div>
					<div class="one-eight text-center">
						<div class="display-tc">
							<?php if ($status==3)
							{?>
							<a href="<?php echo site_url('') ?>">
                        	<button type="button" class="btn-success">Konfirmasi</button>
                        	</a>
                        <?php }else{ ?>
                        	<button type="button" class="btn-danger">Belum Dikirim</button>
                        <?php }?>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>

	<?php $this->load->view('footer.php'); ?>

	</body>
</html>