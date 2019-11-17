<?php include 'format.php'; ?>
<?php
	$rand = rand(10,100);
	$sub = substr($subtotalan+10000,0,-2);
	//$rand = rand(1,100);
	//$rup=$subtotal+$rand;
	$rup= $sub.$rand;
 ?>
 <?php 
 $url_ongkir='';
 ?>
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
					<div class="col-md-6">	
						<h2>Billing Details</h2>
		              	<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="nama">Nama</label>
			                    	<input type="text" name="nama" value="<?php echo $this->session->userdata('nama_pelanggan'); ?>" class="form-control" placeholder="Nama Anda" required>
			                    	<?php echo form_error('nama') ?>
			                  	</div>
			               </div>
			               <div class="form-group">
								<div class="col-md-6">
									<label for="email">E-mail Address</label>
									<input type="text" name="email" class="form-control" value="<?php echo $this->session->userdata('email'); ?>" placeholder="State Province" required>
									<?php echo form_error('email') ?>
								</div>
								<div class="col-md-6">
									<label for="Phone">Phone Number</label>
									<input type="text" name="telp" class="form-control" value="<?php echo $this->session->userdata('nomor'); ?>" placeholder="" required>
									<?php echo form_error('telp') ?>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-6">
									<!-- <label for="asal">Lokasi Pengirim</label>
									<input type="text" name="asal" id="asal" class="form-control" value="" placeholder="Lokasi Pengirim" required> -->
									<?php 
									//Get Data Kabupaten
									$curl = curl_init();
									curl_setopt_array($curl, array(
										CURLOPT_URL => "http://api.rajaongkir.com/starter/city",
										CURLOPT_RETURNTRANSFER => true,
										CURLOPT_ENCODING => "",
										CURLOPT_MAXREDIRS => 10,
										CURLOPT_TIMEOUT => 30,
										CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
										CURLOPT_CUSTOMREQUEST => "GET",
										CURLOPT_HTTPHEADER => array(
											"key:809fec30df0bd3c0b34fa7b2ca9ec904"
										),
									));

									$response = curl_exec($curl);
									$err = curl_error($curl);

									curl_close($curl);
									echo "
									<div class= \"form-group\">
									<label for=\"asal\">Kota/Kabupaten Asal </label>
									<select class=\"form-control\" name='asal' id='asal'>";
									echo "<option>Pilih Kota Asal</option>";
									$data = json_decode($response, true);
									for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
										echo "<option value='".$data['rajaongkir']['results'][$i]['city_id']."'>".$data['rajaongkir']['results'][$i]['city_name']."</option>";
									}
									echo "</select>
									</div>";
									?>
									<?php echo form_error('asal') ?>
								</div>
								<div class="col-md-6">
									<label for="prov">Provinsi</label>
									<?php 
										//Get Data Provinsi
									$curl = curl_init();

									curl_setopt_array($curl, array(
										CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
										CURLOPT_RETURNTRANSFER => true,
										CURLOPT_ENCODING => "",
										CURLOPT_MAXREDIRS => 10,
										CURLOPT_TIMEOUT => 30,
										CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
										CURLOPT_CUSTOMREQUEST => "GET",
										CURLOPT_HTTPHEADER => array(
										"key:809fec30df0bd3c0b34fa7b2ca9ec904"
										),
										));

										$response = curl_exec($curl);
										$err = curl_error($curl);

										echo "
										<div class= \"form-group\">
											<select class=\"form-control\" name='provinsi' id='provinsi'>";
												echo "<option>Pilih Provinsi Tujuan</option>";
												$data = json_decode($response, true);
												for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
													echo "<option value='".$data['rajaongkir']['results'][$i]['province_id']."'>".$data['rajaongkir']['results'][$i]['province']."</option>";
												}
												echo "</select>
											</div>";
											//Get Data Provinsi
									?>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-4">
									<label for="kabupaten">Kota/Kabupaten Tujuan</label><br>
									<select class="form-control" id="kabupaten" name="kabupaten"></select>
									<?php echo form_error('kabupaten') ?>
								</div>
								<div class="col-md-4">
									<label for="kurir">Kurir</label><br>
									<select class="form-control" id="kurir" name="kurir">
										<option value="jne">JNE</option>
										<option value="tiki">TIKI</option>
										<option value="pos">POS INDONESIA</option>
									</select>
									<?php echo form_error('kurir') ?>
								</div>
								<div class="col-md-4">
									<label for="berat">Berat (gram)</label><br>
									<input class="form-control" id="berat" type="number" name="berat" max="30000" required />
									<?php echo form_error('berat') ?>
									
								</div>
							</div>
			               
							<div class="col-md-12">
								<div class="form-group">
									<label for="nama">Alamat Detail</label><br>
		                    		<textarea name="alamat" rows="4" cols="86" required></textarea>
									<?php echo form_error('alamat') ?>
		                  		</div>
			               </div>
							<div class="form-group">
								<div class="col-md-12">
									<button class="btn btn-success btn-block" id="cek" type="submit" name="button">Cek Ongkir</button>
								</div>
							</div>
		              </div>
		            
					</div>
					<div class="col-md-6">
						<div class="panel panel-success">
						<div class="panel-heading">
							<h3 class="panel-title">Hasil</h3>
						</div>
						<div class="panel-body">
							<ol>
								<div id="ongkir"></div>
							</div>
						</ol>
					</div>
					</div>
				</div>
			</div>
		</div>


	<?php $this->load->view('footer.php'); ?>

	<script type="text/javascript">

	$(document).ready(function(){
		$('#provinsi').change(function(){

			//Mengambil value dari option select provinsi kemudian parameternya dikirim menggunakan ajax
			var prov = $('#provinsi').val();

      		$.ajax({
            	type : 'GET',
           		url : 'http://localhost/Sangar/ongkir/cek_kabupaten.php',
            	data :  'prov_id=' + prov,
					success: function (data) {

					//jika data berhasil didapatkan, tampilkan ke dalam option select kabupaten
					$("#kabupaten").html(data);
				}
          	});
		});

		$("#cek").click(function(){
			//Mengambil value dari option select provinsi asal, kabupaten, kurir, berat kemudian parameternya dikirim menggunakan ajax
			var asal = $('#asal').val();
			var kab = $('#kabupaten').val();
			var kurir = $('#kurir').val();
			var berat = $('#berat').val();

      		$.ajax({
            	type : 'POST',
           		url : 'http://localhost/Sangar/ongkir/cek_ongkir.php',
            	data :  {'kab_id' : kab, 'kurir' : kurir, 'asal' : asal, 'berat' : berat},
					success: function (data) {

					//jika data berhasil didapatkan, tampilkan ke dalam element div ongkir
					$("#ongkir").html(data);
				}
          	});
		});
	});
</script>

	</body>
</html>