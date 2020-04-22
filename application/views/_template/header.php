<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title><?= $title ?></title>

    <!-- Jquery UI -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/jquery-ui/jquery-ui.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>dist/css/adminlte.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/select2/css/select2.min.css">
    <!-- Sweet Alert2 -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/sweetalert2/sweetalert2.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="<?= base_url('auth/logout'); ?>" class="nav-link text-primary">Logout <i class="fas fa-power-off"></i></a>
                </li>
        
                <!-- <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i class="fas fa-th-large"></i></a>
                </li> -->
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?= base_url(); ?>" class="brand-link bg-cyan elevation-2">
                <img src="<?= base_url('assets/'); ?>dist/img/lab dasar.png" alt="LABDasar Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light"> LABDasar </span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar bg-cyan elevation-2 ">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex ">
                    <div class="image">
                        <img src="<?= base_url('assets/'); ?>dist/img/user3-128x128.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?= $this->session->userdata('nama'); ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2 ">
                    <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="<?= base_url('home'); ?>" class="nav-link <?= $title == 'Home' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li> 
                        <li class="nav-item has-treeview <?= $title == 'Inventory' ? 'menu-open' : '' ?>">
                            <a href="#" class="nav-link <?= $title == 'Inventory' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Data LabDas1
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('inventory'); ?>" class="nav-link <?= $subtitle == 'List Data Inventory' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List Data Inventory</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('inventory/add'); ?>" class="nav-link <?= $subtitle == 'Tambah Data Inventory' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tambah Data Inventory</p>
                                    </a>
                                </li>
                            </ul>
                        </li>   
                        <li class="nav-item has-treeview <?= $title == 'Inventaris' ? 'menu-open' : '' ?>">
                            <a href="#" class="nav-link <?= $title == 'Inventaris' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Data LabDas2
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('inventaris'); ?>" class="nav-link <?= $subtitle == 'List Data Inventaris' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List Data Inventory</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('inventaris/add'); ?>" class="nav-link <?= $subtitle == 'Tambah Data Inventaris' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tambah Data Inventory</p>
                                    </a>
                                </li>
                            </ul>
                        </li>                   
                       
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>