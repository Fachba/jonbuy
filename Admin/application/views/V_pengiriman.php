<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard 3</title>

    <?php include 'header.php'; ?>

</head>

<body class="animsition">
    <div class="page-wrapper">
        <?php include 'V_navbar.php'; ?>
        <!-- PAGE CONTENT-->
        <div class="section__content section__content--p30">
            <!-- BREADCRUMB-->
            <section class="au-breadcrumb2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="au-breadcrumb-content">
                                <div class="au-breadcrumb-left">
                                    <span class="au-breadcrumb-span">You are here:</span>
                                    <ul class="list-unstyled list-inline au-breadcrumb__list">
                                        <li class="list-inline-item active">
                                            <a href="#">Home</a>
                                        </li>
                                        <li class="list-inline-item seprate">
                                            <span>/</span>
                                        </li>
                                        <li class="list-inline-item">Pengiriman</li>
                                    </ul>
                                </div>     
                            </div>
                        </div>
                        <br><br><br>
                         <div class="col-lg-4">
                            <img src="<?php echo base_url() ?>/assets/images/resi/<?php echo $pengiriman['resi']; ?>" id="preview-image" alt="Preview Gambar Kosong"/>
                        </div>
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Pengiriman</strong>
                                    <small> Form</small>
                                </div>
                                <?php
                                echo form_open_multipart('Pengiriman/edit/'.$this->uri->segment(3).'');
                                ?>
                                <?php echo validation_errors(); ?>
                                <div class="card-body card-block">
                                    <div class="form-group">
                                        <label class=" form-control-label">Bukti Resi</label>
                                        <input type="file" name="image" class="form-control" value="<?php echo $pengiriman['resi'];?>" required>
                                    </div>
                                    <button type="button" class="btn btn-info mb-1" data-toggle="modal" data-target="#staticModal">Ketentuan Gambar</button>

                                    <div class="form-group">
                                        <label class=" form-control-label">Kode Penjualan</label>
                                        <input type="text" name="kode" placeholder="Kode Barang" class="form-control" required value="<?php echo $pengiriman['kode_penjualan'];?>" disabled >
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class=" form-control-label">Nama</label>
                                                <input type="text" placeholder="Nama" name="nama" class="form-control" value="<?php echo $pengiriman['nama'];?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class=" form-control-label">Telepon</label>
                                                <input type="text" name="telp" placeholder="No Telepon" class="form-control" required value="<?php echo $pengiriman['telp'];?>" disabled>
                                            </div>
                                        </div>
                                    </div>

                                     <div class="row form-group">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class=" form-control-label">Jasa Pengiriman</label>
                                                <input type="text" name="kurir" placeholder="Kurir" class="form-control" required value="<?php echo $pengiriman['jasa'];?>" >
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class=" form-control-label">Biaya</label>
                                                <input type="text" name="biaya" placeholder="biaya" class="form-control" required value="<?php echo $pengiriman['biaya'];?>">
                                            </div>
                                        </div>
                                    </div>
                                     <div class="row form-group">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class=" form-control-label">Provinsi</label>
                                                <input type="text" name="provinsi" placeholder="Provinsi" class="form-control" required value="<?php echo $pengiriman['prov'];?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class=" form-control-label">Kabupaten / Kota</label>
                                                <input type="text" placeholder="Kabupaten" name="kabupaten" class="form-control" value="<?php echo $pengiriman['kota'];?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                     
                                    <div class="form-group">
                                        <label for="street" class=" form-control-label">Keterangan</label>
                                       <textarea name="ket" rows="5" placeholder="Keterangan..." class="form-control"><?php echo $pengiriman['keterangan'];?></textarea>
                                    </div>

                                    <div class="card-footer">
                                    <center>
                                        <button type="submit" class="btn btn-success btn-lg " >
                                            <i class="fa fa-dot-circle-o"></i> Tambahkan
                                        </button>
                                        <a href="<?php echo site_url('Penjualan') ?>">
                                        <button type="reset" class="btn btn-danger btn-lg ">
                                            <i class="fa fa-ban"></i> Batal / Kembali
                                        </button>
                                        </a>
                                    </center>
                                    </div>
                                  <?php echo form_close(); ?>  
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </section>
            <!-- END BREADCRUMB-->

            <!-- COPYRIGHT-->
            <section class="p-t-60 p-b-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END COPYRIGHT-->
        </div>

        <!-- modal static -->
            <div class="modal fade" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
             data-backdrop="static">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticModalLabel">Ketentuan Gambar</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>
                                1. Format jpg, jpeg, png<br>
                                2. max_width 10240 px<br>
                                3. max_height 7680 px<br>
                                4. Size 1000000000 KB
                            </p>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- end modal static -->

    </div>

   <?php include 'footer.php'; ?>

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
<!-- end document-->