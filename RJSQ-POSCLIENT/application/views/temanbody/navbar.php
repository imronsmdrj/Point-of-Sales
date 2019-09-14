<div class="container-fluid">
    <?php if ($this->session->userdata('LEVEL') == 'Admin'){ ?>

        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url().'dashboard'?>"><strong><i>RJSQ•Point Of Sales</i></strong></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="nav-item active">
                      <a class="nav-link" href="<?php echo site_url('dashboard')?>">
                        <i class="fa fa-home"></i> Dashboard
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo site_url('penjualan')?>">
                        <i class="tim-icons icon-cart"></i> Transaksi
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo site_url('retur')?>">
                        <i class="tim-icons icon-refresh-02"></i> Retur
                      </a>
                    </li>
                    <!-- <li class="nav-item">
                      <a class="nav-link" href="<?php echo site_url('master')?>">
                        <i class="tim-icons icon-bullet-list-67"></i> Master Data
                      </a>
                    </li> -->

                    <!--dropdown-->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Master Data</a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url().'master/barang'?>"> Barang</a></li> 
                            <li><a href="<?php echo base_url().'master/kategori'?>"> Kategori</a></li> 
                            <li><a href="<?php echo base_url().'master/supplier'?>"> Supplier</a></li> 
                            <li><a href="<?php echo base_url().'master/pegawai'?>"> Pegawai</a></li> 
                        </ul>
                    </li>
                    <!--ending dropdown-->

                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo site_url('laporan')?>">
                        <i class="tim-icons icon-notes"></i> Laporan
                      </a>
                    </li>
                    <!-- <li class="nav-item">
                      <a class="nav-link" href="<?php echo site_url('apriori')?>">
                        <i class="tim-icons icon-atom"></i> Apriori
                      </a>
                    </li> -->
                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo site_url('login/logout')?>">
                        <i class="tim-icons icon-button-power"></i> Logout
                      </a>
                    </li>
                  
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
  
<br>
    <?php } else { ?>

      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url().'dashboard'?>"><strong><i>RJSQ•Point Of Sales</i></strong></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="nav-item active">
                      <a class="nav-link" href="<?php echo site_url('dashboard')?>">
                        <i class="fa fa-home"></i> Dashboard
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo site_url('penjualan')?>">
                        <i class="tim-icons icon-cart"></i> Transaksi
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo site_url('retur')?>">
                        <i class="tim-icons icon-refresh-02"></i> Retur
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo site_url('login/logout')?>">
                        <i class="tim-icons icon-button-power"></i> Logout
                      </a>
                    </li>
                  
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
<br>
<?php } ?>