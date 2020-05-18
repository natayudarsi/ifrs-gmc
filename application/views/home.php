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
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="<?php echo base_url()?>assets/css/font-face.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url()?>assets/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url()?>assets/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url()?>assets/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?php echo base_url()?>assets/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="<?php echo base_url()?>assets/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url()?>assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url()?>assets/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url()?>assets/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url()?>assets/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url()?>assets/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url()?>assets/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?php echo base_url()?>assets/css/theme.css" rel="stylesheet" media="all">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/autocomplete/css/jquery-ui.css'?>">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar ">
                <div class="container-fluid ">
                    <div class="header-mobile-inner">
                        <a class="logo" href="#">
                            <img src="<?php echo base_url()?>assets/images/ifrs.png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li>
                            <a href="#">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>      
                        </li>
                        <li>
                            <a href="<?php echo base_url()?>index.php/karyawan/">
                                <i class="fas fa-list"></i>Karyawan</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url()?>index.php/obat/">
                                <i class="fas fa-medkit"></i>Data Obat</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-pencil-square-o"></i>Transaksi</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="<?php echo base_url()?>index.php/penjualan/">Tambah Penjualan</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url()?>index.php/pembelian/">Tambah Pembelian</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="<?php echo base_url()?>index.php/laporan/">
                                <i class="fas fa-copy"></i>Laporan</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block ">
            <div class="logo">
                <a href="#">
                    <img src="<?php echo base_url()?>assets/images/ifrs.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1 ">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a href="<?php echo base_url()?>">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <?php if ($this->session->userdata("user_level") == '1'): ?>
                        <li>
                            <a href="<?php echo base_url()?>index.php/karyawan/">
                                <i class="fas fa-list"></i>Karyawan</a>
                        </li>

                        <?php endif ;?>
                        
                        <li>
                            <a href="<?php echo base_url()?>index.php/obat">
                                <i class="fas fa-medkit"></i>Data Obat</a>
                        </li>
                        
                        <?php if ($this->session->userdata("user_level") == '1' || $this->session->userdata("user_level") == '2'): ?>                       
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-pencil-square-o"></i>Transaksi</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="<?php echo base_url()?>index.php/penjualan/">Tambah Penjualan</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url()?>index.php/pembelian/">Tambah Pembelian</a>
                                </li>
                            </ul>
                        </li>
                        <?php endif ;?>
                        <?php if($this->session->userdata("user_level") == '1' || $this->session->userdata("user_level") == '3'): ?>
                        <li class="has-sub">
                            <a class="js-arrow" href="<?php echo base_url()?>index.php/laporan/">
                                <i class="fas fa-copy"></i>Laporan</a>
                        </li>
                    <?php endif;?>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap"></div>                     
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="<?php echo base_url()?>assets/images/icon/avatar-01.jpg" alt="John Doe" />
                                        </div>
                                        <div class="content">
                                            
                                            <a class="js-acc-btn" href="#"><?php foreach($namalogin->result() as $row) { echo $row->nama_karyawan; }?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">                                        
                                            <div class="account-dropdown__footer">
                                                <a href="<?php echo base_url()?>index.php/dashboard/logout">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            
            <?php $this->load->view($content);?>

            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="<?php echo base_url()?>assets/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="<?php echo base_url()?>assets/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="<?php echo base_url()?>assets/vendor/slick/slick.min.js">
    </script>
    <script src="<?php echo base_url()?>assets/vendor/wow/wow.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendor/animsition/animsition.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="<?php echo base_url()?>assets/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="<?php echo base_url()?>assets/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?php echo base_url()?>assets/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="<?php echo base_url()?>assets/js/main.js"></script>

    <!--auto complete-->
    <script type="text/javascript" src="<?php echo base_url().'asset/autocomplete/js/bootstrap.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/autocomplete/js/jquery-3.3.1.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/autocomplete/js/jquery-ui.js'?>"></script>
    
    <?php $this->load->view($search) ?>

</body>

</html>
<!-- end document-->
