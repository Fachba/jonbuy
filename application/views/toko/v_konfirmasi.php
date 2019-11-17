
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
				<div class="row row-pb-md">
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
							<div class="process text-center">
								<p><span>03</span></p>
								<h3>Order Complete</h3>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-7">
					<?php echo form_open_multipart('Pembayaran/edit/'.$pembayaran['id_pembayaran'].''); ?>
					<?php echo validation_errors(); ?>
						<div class="cart-detail">	
							<h2>Konfirmasi Pembayaran</h2>
			              	<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class=" form-control-label">Upload Bukti Pembayaran</label>
                                        <input type="file" name="image" class="form-control" required>	
				                  	</div>
				               </div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="nama">Kode Penjualan</label>
				                    	<input type="text" name="kode" class="form-control" required disabled value="<?php echo $pembayaran['kode_penjualan'];?>">
				                    	<?php echo form_error('kode') ?>	
				                  	</div>
				               </div>
				               <div class="form-group">
									<div class="col-md-6">
										<label for="nama">Nama</label>
										<input type="text" name="nama" class="form-control" value="<?php echo $this->session->userdata('nama_pelanggan'); ?>" required>
										<?php echo form_error('nama') ?>
									</div>
									<div class="col-md-6">
										<label for="tanggal">Tanggal Pesan</label>
										<input type="text" name="tanggal" class="form-control"  required disabled value="<?php echo $pembayaran['tanggal_awal'];?>">
										<?php echo form_error('tanggal') ?>
									</div>
								</div>
								<div class="form-group col-md-12">
									<div class="col-md-6">
										<label for="sub total">Sub Total</label><br>
										<input class="form-control" id="total" type="text" name="total" disabled value="<?php echo $pembayaran['sub_total'];?>" />
										<?php echo form_error('total') ?>
									</div>
									<div class="col-md-6">
										<label for="bank">Bank</label><br>
										<select class="form-control" id="bank" name="bank">
											<option value="jne">Sesama BNI</option>
											<option value="tiki">Selain BNI</option>
										</select>
										<?php echo form_error('bank') ?>
									</div>
								</div>
								<button class="btn btn-success" type="submit">Ok, Konfirmasi Bukti Pembayaran</button>
								<a href="<?php echo site_url('Pembayaran/index') ?>" class="btn btn-danger">Batalkan dan Kembali</a>
		              	</div>
		              </div>
		            <?php echo form_close(); ?> 
					</div>
					<div class="col-md-5">
						<img style="height: 500px" src="<?php echo base_url() ?>/admin/assets/images/nota/<?php echo $pembayaran['bukti'];?>" id="preview-image" alt="Preview Gambar Kosong"/>
					</div>
				<?php echo form_close(); ?>
				</div>
			</div>
		</div>


	<?php $this->load->view('footer.php'); ?>

	<script type="text/javascript">
		function previewImage(input) {
         
        if (input.files && input.files[0]) {
            var fileReader = new FileReader();
            var imageFile = input.files[0];
             
            if(imageFile.type == "image/png" || imageFile.type == "image/jpeg") {
                fileReader.readAsDataURL(imageFile);
                 
                fileReader.onload = function (e) {
                    $('#preview-image').attr('src', e.target.result);
                }
            }
            else {
                alert("your file is not image");
            }
        }
    }
 
    $("[name='image']").change(function(){
        previewImage(this);
    });
	</script>

	</body>
</html>