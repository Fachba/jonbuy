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
        <div class="page-content--bgf7">
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
                                        <li class="list-inline-item">Dashboard</li>
                                    </ul>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END BREADCRUMB-->

            <!-- DATA TABLE-->
            <section class="p-t-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="title-5 m-b-35">data table</h3>
                            <div class="table-data__tool">
                                <div class="table-data__tool-left">
                                    <div class="rs-select2--light rs-select2--md">
                                        <select class="js-select2" name="property">
                                            <option selected="selected">All Properties</option>
                                            <option value="">Option 1</option>
                                            <option value="">Option 2</option>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                    <div class="rs-select2--light rs-select2--sm">
                                        <select class="js-select2" name="time">
                                            <option selected="selected">Today</option>
                                            <option value="">3 Days</option>
                                            <option value="">1 Week</option>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                    <button class="au-btn-filter">
                                        <i class="zmdi zmdi-filter-list"></i>filters</button>
                                </div>
                                <div class="table-data__tool-right">
                                    
                                    <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                        <select class="js-select2" name="type">
                                            <option selected="selected">Export</option>
                                            <option value="">Option 1</option>
                                            <option value="">Option 2</option>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2">
                                    <thead>
                                        <tr>
                                            <th>Kode Penjualan</th>
                                            <th>Pelanggan</th>
                                            <th>Tanggal</th>
                                            <th>Pembayaran</th>
                                            <th>Status</th>
                                            <th><center>Ubah Status</center></th>
                                            <th>Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($penjualan as $key) { ?> 
                                        <tr class="spacer"></tr>
                                        <tr class="tr-shadow">
                                           
                                            <td><?php echo $key->kode_penjualan ?></td>
                                            <td>
                                                <span class="block-email"><?php echo $key->id_pelanggan ?></span>
                                            </td>
                                            <td><?php echo $key->tanggal ?></td>
                                            <td>
                                                <a href="<?php echo site_url('Penjualan/statusbayar/'.$key->id_pembayaran.'') ?>">
                                                <?php
                                                if($key->status_pembayaran==0)
                                                {
                                                    ?>
                                                    <button type="button" class="btn btn-danger">Belum</button>
                                                    <?php
                                                }
                                                else if($key->status_pembayaran==1)
                                                {
                                                    ?>
                                                    <button type="button" class="btn btn-warning">Verifikasi</button><?php
                                                }
                                                else
                                                {
                                                    ?>
                                                    <button type="button" class="btn btn-success">Lunas</button><?php   
                                                }
                                                ?>
                                                </a>
                                            </td>
                                            <td>

                                                <?php $status=$key->status_penjualan ?>
                                                <?php if ($status==0)
                                                {
                                                    ?>
                                                    <button type="button" class="btn btn-danger">Pesan</button>
                                                    <?php
                                                }
                                                elseif ($status==1)
                                                {
                                                     ?>
                                                    <button type="button" class="btn btn-success">DiTerima</button><?php
                                                }
                                                elseif ($status==2)
                                                {
                                                    ?>
                                                    <button type="button" class="btn btn-warning">DiProses</button><?php
                                                 }
                                                 elseif ($status==3)
                                                {
                                                    ?>
                                                    <button type="button" class="btn btn-primary">DiKirim</button><?php
                                                 } ?>
                                                
                                            </td>
                                            <td>
                                                <a href="<?php echo site_url('Penjualan/status/'.$key->kode_penjualan.'/1') ?>">
                                                <button type="button" class="btn btn-success">Diterima</button>
                                                </a>

                                                <a href="<?php echo site_url('Penjualan/status/'.$key->kode_penjualan.'/2') ?>">
                                                <button type="button" class="btn btn-warning">DiProses</button>
                                                </a>

                                                <a href="<?php echo site_url('Penjualan/status/'.$key->kode_penjualan.'/3') ?>">
                                                 <button type="button" class="btn btn-primary">DiKirim</button>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="<?php echo site_url('Penjualan/detail/'.$key->kode_penjualan.'') ?>">
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                                    <i class="zmdi zmdi-more"></i>
                                                </button>
                                                </a>
                                            </td>
                                            
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END DATA TABLE-->

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

    </div>

   <?php include 'footer.php'; ?>

</body>

</html>
<!-- end document-->