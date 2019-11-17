<?php include 'format.php'; ?>
<?php
	$rand = rand(10,100);
	$sub = substr($subtotalan+10000,0,-2);
	//$rand = rand(1,100);
	//$rup=$subtotal+$rand;
	$rup= $sub.$rand;
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
				<?php echo form_open('penjualan/tambahpenjualan/'.$rand.'/'.$rup); ?>
				<?php echo validation_errors(); ?>
					<div class="col-md-7">
						
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
									<label for="stateprovince">Provinsi</label>
									<!-- <input type="text" id="fname" class="form-control" placeholder="State Province"> -->
									 <select class="form-control" id="sel11" name="prov" required>
									    <option value="">Pilih Provinsi</option>            
									  </select>
									  <?php echo form_error('prov') ?>
								</div>
								<div class="col-md-6">
									<label for="lname">Kota/Kabupaten</label>
									<!-- <input type="text" id="zippostalcode" class="form-control" placeholder="Zip / Postal"> -->
									 <select class="form-control" id="sel22" name="kota" disabled required>
									    <option value=""> Pilih Kota</option>            
									  </select>
									  <?php echo form_error('kota') ?>
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
									<div class="radio">
									  <label><input type="radio" name="optradio">Create an Account? </label>
									  <label><input type="radio" name="optradio"> Ship to different address</label>
									</div>
								</div>
							</div>
		              </div>
		            
					</div>
					<div class="col-md-5">
						<div class="cart-detail">
							<h2>Cart Total</h2>
							<ul>
								<li>
									<ul>
									<?php $subtotal=0; $total=0; foreach ($keranjang as $key) { ?>
										<li>
											<span><?php echo $key->nama_barang ?>  &emsp; X <?php echo $key->jumlah ?></span>
											<?php $total=$key->jumlah*($key->harga_jual);
											$subtotal=$subtotal+$total; ?>
											<span><?php echo rupiah($total) ?></span>
										</li>
									<?php } ?>
									</ul>
								</li>
								<li><span>-</span> <span>-</span></li>
								<li><span>Subtotal</span> <span><?php echo rupiah($subtotal); ?></span></li>
								<li><span>Shipping</span> <span><?php echo rupiah(10000); ?></span></li>
								<li><span>-</span> <span>-</span></li>
								<?php 
								// $sub = substr($subtotal+10000,0,-2);
								// $rand = rand(1,100);
								// $rup=$subtotal+$rand;
								// $rup= $sub.$rand;
								 ?>
								<li><span>Kode Transfer</span> <span><?php echo $rand ?></span></li>
								<li><span>Nominal Transfer</span> <span><?php echo rupiah($rup); ?></span></li>
							</ul>
						</div>
						<div class="cart-detail">
							<h2>Payment Method</h2>
							<div class="form-group">
								<div class="col-md-12">
									<div class="radio">
									   <label><input type="radio" name="optradio">Direct Bank Tranfer</label>
									</div>
								</div>
							</div>
							<!-- <div class="form-group">
								<div class="col-md-12">
									<div class="radio">
									   <label><input type="radio" name="optradio">Check Payment</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12">
									<div class="radio">
									   <label><input type="radio" name="optradio">Paypal</label>
									</div>
								</div>
							</div> -->
							<div class="form-group">
								<div class="col-md-12">
									<div class="checkbox">
									   <label><input type="checkbox" value="">I have read and accept the terms and conditions</label>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<center>
								<p>
									<a href="<?php echo site_url('Keranjang/index') ?>" class="btn btn-info">Batalkan dan Kembali</a>
									<button class="btn btn-primary" type="submit">Ok, Pesan Sekarang Juga</button>
								</p>
								</center>
							</div>
						</div>
					</div>
				<?php echo form_close(); ?>
				</div>
			</div>
		</div>


	<?php $this->load->view('footer.php'); ?>
	
	<script type="text/javascript">
  
function getLokasi() {
  var $op = $("#sel1"), $op1 = $("#sel11");
  
  $.getJSON("provinsi", function(data){  
    $.each(data, function(i,field){  
    
       $op.append('<option value="'+field.province_id+'">'+field.province+'</option>'); 
       $op1.append('<option value="'+field.province_id+'">'+field.province+'</option>'); 

    });
    
  });
 
}

getLokasi();

$("#sel11").on("change", function(e){
  e.preventDefault();
  var option = $('option:selected', this).val();    
  $('#sel22 option:gt(0)').remove();
  $('#kurir').val('');

  if(option==='')
  {
    alert('null');    
    $("#sel22").prop("disabled", true);
    $("#kurir").prop("disabled", true);
  }
  else
  {        
    $("#sel22").prop("disabled", false);
    getKota1(option);
  }
});


$("#sel1").on("change", function(e){
  e.preventDefault();
  var option = $('option:selected', this).val();    
  $('#sel2 option:gt(0)').remove();
  $('#kurir').val('');

  if(option==='')
  {
    alert('null');    
    $("#sel2").prop("disabled", true);
    $("#kurir").prop("disabled", true);
  }
  else
  {        
    $("#sel2").prop("disabled", false);
    getKota(option);
  }
});




$("#sel22").on("change", function(e){
  e.preventDefault();
  var option = $('option:selected', this).val();    
  $('#kurir').val('');

  if(option==='')
  {
    alert('null');    
    $("#kurir").prop("disabled", true);
  }
  else
  {        
    $("#kurir").prop("disabled", false);    
  }
});


$("#kurir").on("change", function(e){
  e.preventDefault();
  var option = $('option:selected', this).val();    
  var origin = $("#sel2").val();
  var des = $("#sel22").val();
  var qty = $("#berat").val();

  if(qty==='0' || qty==='')
  {
    alert('null');
  }
  else if(option==='')
  {
    alert('null');        
  }
  else
  {                
    getOrigin(origin,des,qty,option);
  }
});


function getOrigin(origin,des,qty,cour) {
  var $op = $("#hasil"); 
  var i, j, x = "";
  
  $.getJSON("tarif/"+origin+"/"+des+"/"+qty+"/"+cour, function(data){     
    $.each(data, function(i,field){  

      for(i in field.costs)
      {
          x += "<p class='mb-0'><b>" + field.costs[i].service + "</b> : "+field.costs[i].description+"</p>";

           for (j in field.costs[i].cost) {
                x += field.costs[i].cost[j].value +"<br>"+field.costs[i].cost[j].etd+"<br>"+field.costs[i].cost[j].note;
            }
         
      }

      $op.html(x);

    });
  });
 
}


function getKota1(idpro) {
  var $op = $("#sel22"); 
  
  $.getJSON("kota/"+idpro, function(data){      
    $.each(data, function(i,field){  
    

       $op.append('<option value="'+field.city_name+'">'+field.type+' '+field.city_name+'</option>'); 

    });
    
  });
 
}
  
function getKota(idpro) {
  var $op = $("#sel2"); 
  
  $.getJSON("kota/"+idpro, function(data){      
    $.each(data, function(i,field){  
    

       $op.append('<option value="'+field.city_id+'">'+field.type+' '+field.city_name+'</option>'); 

    });
    
  });
 
}

</script>

	</body>
</html>