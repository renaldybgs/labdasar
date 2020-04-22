      <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark"><?= $subtitle; ?></h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#"><?= $title; ?></a></li>
                                <li class="breadcrumb-item active"><?= $subtitle; ?></li>
                            </ol>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-6 col-6">
                            <!-- small box -->
                            <div class="info-box">
                              <span class="info-box-icon bg-danger"><i class="fas fa-chart-bar"></i></span>
                              <div class="info-box-content">
                                <span class="info-box-text">Inventory Lab Dasar 1</span>
                                <span class="info-box-number"><?= $jumlah_inventory; ?></span>
                              </div>
                              <!-- /.info-box-content -->
                            </div>
                        </div>
                        <div class="col-lg-6 col-6">
                            <!-- small box -->
                            <div class="info-box">
                              <span class="info-box-icon bg-info"><i class="fas fa-chart-pie"></i></span>
                              <div class="info-box-content">
                                <span class="info-box-text">Inventory Lab Dasar 2</span>
                                <span class="info-box-number"><?= $jumlah_inventaris; ?></span>
                              </div>
                              <!-- /.info-box-content -->
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!--/. container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

      