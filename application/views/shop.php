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
				   					<h1>Products</h1>
				   					<h2 class="bread"><span><a href="index.html">Home</a></span> <span>Shop</span></h2>
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
					<div class="col-md-10 col-md-push-2">
						<div class="row row-pb-lg">

						 <?php if ($kaos!=null)
						 {
						 	foreach ($kaos as $key) { ?> 
                                             
							<div class="col-md-4 text-center">
								<div class="product-entry">
									<div class="product-img" style="background-image: url(<?php echo base_url();?>Admin/assets/images/barang/<?php echo $key->gambar ?>);">
										<p class="tag"><span class="new">New</span></p>
										<div class="cart">
											<p>
												<!-- <span class="" data-toggle="modal" data-target="#myModal"><a><i class="icon-shopping-cart"></i></a></span>  -->
												<!-- <span><a href="<?php echo site_url('Keranjang/tambahkeranjang/'.$key->kode_barang.'') ?>"><i class="icon-shopping-cart"></i></a></span> -->
												<span><a href="<?php echo site_url('Sangar/detailkaos/'.$key->kode_barang.'') ?>"><i class="icon-eye"></i></a></span> 
												<!-- <span><a href="#"><i class="icon-heart3"></i></a></span>
												<span><a href=""><i class="icon-bar-chart"></i></a></span> -->
											</p>
										</div>
									</div>
									<div class="desc">
										<h3><a href=""><?php echo $key->nama_barang ?></a></h3>
										<p class="price"><span>Rp <?php echo $key->harga_jual ?></span></p>
									</div>
								</div>
							</div>
						<?php } } else { echo ("Data Kosong"); } ?>
						</div>
						<div class="row">
							<div class="col-md-12">
							<?php echo $this->pagination->create_links(); ?>
							</div>
						</div>
					</div>
					<div class="col-md-2 col-md-pull-10">
						<div class="sidebar">
							<div class="side">
								<h2>Categories</h2>
								<div class="fancy-collapse-panel">
			                  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			                     <div class="panel panel-default">
			                         <div class="panel-heading" role="tab" id="headingOne">
			                             <h4 class="panel-title">
			                                 <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Men
			                                 </a>
			                             </h4>
			                         </div>
			                         <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
			                             <div class="panel-body">
			                                 <ul>
			                                 	<li><a href="#">Jeans</a></li>
			                                 	<li><a href="#">T-Shirt</a></li>
			                                 	<li><a href="#">Jacket</a></li>
			                                 	<li><a href="#">Shoes</a></li>
			                                 </ul>
			                             </div>
			                         </div>
			                     </div>
			                     <div class="panel panel-default">
			                         <div class="panel-heading" role="tab" id="headingTwo">
			                             <h4 class="panel-title">
			                                 <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Women
			                                 </a>
			                             </h4>
			                         </div>
			                         <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
			                             <div class="panel-body">
			                                <ul>
			                                 	<li><a href="#">Jeans</a></li>
			                                 	<li><a href="#">T-Shirt</a></li>
			                                 	<li><a href="#">Jacket</a></li>
			                                 	<li><a href="#">Shoes</a></li>
			                                 </ul>
			                             </div>
			                         </div>
			                     </div>
			                  </div>
			               	</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Anda Yakin Menambahkan ke Keranjang</h4>
				</div>
				<!-- body modal -->
				<div class="modal-body">
					<p>Tambahkan Jumlah Item</p>
				</div>
				<!-- footer modal -->
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Tambahkan</button>
				</div>
			</div>
		</div>
		</div>

		<?php $this->load->view('footer.php'); ?>
	</body>
</html>

