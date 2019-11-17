
<nav class="colorlib-nav" role="navigation">
	<div class="top-menu">
		<div class="container">
			<div class="row">
				<div class="col-xs-2">
					<div id="colorlib-logo"><a href="<?php echo site_url('Sangar/index') ?>">Toko Jonline</a></div>
				</div>
				<div class="col-xs-10 text-right menu-1">
					<ul>
						<li>
							<a href="<?php echo site_url('Sangar/index') ?>">Beranda Toko</a>
						</li>
						<li>
							<a href="<?php echo site_url('Pembayaran/index') ?>">Pembayaran</a>
						</li>
						<li>
							<a href="<?php echo site_url('Pesanan/index') ?>">Pesanan</a>
						</li>
						
						<li>
							<a href="<?php echo site_url('Keranjang/index/0') ?>">
								<i class="icon-shopping-cart"></i> Keranjang [<?php echo $this->session->userdata('keranjang'); ?>]
							</a>
						</li>
						<li>
							<a href="<?php echo site_url('Sangar/saran') ?>">Saran</a>
						</li>
						<?php 
						$status=$this->session->userdata('statusjb');
						if ($status!="") 
						{
							?><li><a href="<?php echo site_url('Login/logout') ?>">Logout <?php echo $this->session->userdata('nama_pelanggan'); ?></a></li><?php
						}
						else
						{
							?><li><a href="<?php echo site_url('Login/index') ?>">Login</a></li><?php
						} ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</nav>