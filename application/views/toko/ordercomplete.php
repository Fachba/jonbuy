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
				   					<h1>Order Complete</h1>
				   					<h2 class="bread"><span><a href="index.html">Home</a></span> <span><a href="cart.html">Shopping Cart</a></span> <span>Checkout</span></h2>
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
				<div class="row row-pb-lg">
					<div class="col-md-10 col-md-offset-1">
						<div class="process-wrap">
							<div class="process text-center active">
								<p><span>01</span></p>
								<h3>Shopping Cart</h3>
							</div>
							<div class="process text-center active">
								<p><span>02</span></p>
								<h3>Checkout</h3>
							</div>
							<div class="process text-center active">
								<p><span>03</span></p>
								<h3>Order Complete</h3>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="cart-detail">
						<center>
							<div class="card">
							  <div class="container">
							    <h4><b>Nominal Transfer</b></h4> 
							    <h2><b><font color="red"><?php echo rupiah($nominal); ?></font></b></h2>
							  </div>
							</div>
						</center>>
						<h4><b>Agar Pesenan anda dapat diproses oleh penjual, ikuti langkah berikut : </b></h4>
						<p>
							1. Transfer sejumlah <b><font color="red"><?php echo rupiah($nominal); ?></font></b> dengan lengkap sesuai nominal yang tertera ke nomor rekening kita dibawah ini :<br>
								<div class="card">
								  <!-- <img src="<?php echo base_url(); ?>assets/images/bni.jpg ?>" alt="Avatar" style="width:25%"> -->
								  <div class="container">
								    <h5>
								    	<b>
								    		Bank &nbsp;&nbsp;: &emsp; <?php echo $bank ?><br>
								    		Rek &emsp;: &emsp; <?php echo $rekening ?><br>
								    		A/N &emsp;: &emsp; <?php echo $nama ?>
								    	</b>
								    </h5> 
								  </div>
								</div>
							2. Setelah Melakukan Transfer, Segera lakukan konfirmasi pembayaran dan simpan bukti pembayaran untuk verifikasi lebih lanjut<br>
							3. Pesanan akan dibatalkan jika dalam waktu 3 hari kerja tidak melakukan pembayaran.<br>
						</p>
						<h5><b>Kami akan membatalkan transaksi dan mengembalikan dana, Syarat dan ketentuan berlaku sebagai berikut : </b></h5>
						<p>
							1. Penjual tidak merespon order anda sampai batas waktu respon 3 hari kerja.<br>
							2. Penjual tidak mengkonfirmasi pengiriman order anda sampai batas waktu respon 5 hari kerja.<br>
							3. Menyertakan bukti pembayaran serta checkout pemesanan 
						</p>
					</div>
					<div class="col-md-10 col-md-offset-1 text-center">
						<span class="icon"><i class="icon-shopping-cart"></i></span>
						<h2>Thank you for purchasing, Your order is complete</h2>
						<p>
							<a href=""class="btn btn-primary">Home</a>
							<a href="<?php echo site_url('Sangar/index') ?>"class="btn btn-primary btn-outline">Continue Shopping</a>
						</p>
					</div>
				</div>
			</div>
		</div>


	<?php $this->load->view('footer.php'); ?>

	</body>
</html>