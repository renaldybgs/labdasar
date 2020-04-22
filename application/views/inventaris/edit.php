aris        <!-- Content Wrapper. Contains page content -->
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
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="message" data-title="Data Inventory" data-message="<?= $this->session->flashdata('message'); ?>"></div>
                            
                            <div class="card card-primary">
                                <!-- /.card-header -->
                                <!-- form start -->
                                <?= form_open_multipart('inventaris/edit'); ?>
                                    <input type="hidden" name="id_inventaris" id="id_inventaris" value="<?= $inventaris['id_inventaris']; ?>">
                                    <div class="card-body">
                                        <div class="row mt-2">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="kode">Kode Barang</label>
                                                    <input type="text" class="form-control" name="kode_barang" id="kode_barang" value="<?= $inventaris['kode_barang']; ?>">
                                                    <?= form_error('kode_barang', '<small class="text-danger">', '</small>'); ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nama">Nama Barang</label>
                                                    <input type="text" class="form-control" name="nama_barang" id="nama_barang" value="<?= $inventaris['nama_barang']; ?>">
                                                    <?= form_error('nama_barang', '<small class="text-danger">', '</small>'); ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="merk_barang">Merk Barang</label>
                                                    <input type="text" class="form-control" name="merk_barang" id="merk_barang" value="<?= $inventaris['merk_barang']; ?>"> 
                                                    <?= form_error('merk_barang', '<small class="text-danger">', '</small>'); ?>
                                                </div>  
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="jumlah">Jumlah Barang</label>
                                                    <input type="text" class="form-control" name="jumlah_barang" id="jumlah_barang" value="<?= $inventaris['jumlah_barang']; ?>">
                                                    <?= form_error('jumlah_barang', '<small class="text-danger">', '</small>'); ?>
                                                </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="tanggal_masuk">Tanggal Masuk</label>
                                                    <input type="text" class="form-control datepicker" name="tanggal" id="tanggal" value="<?= $inventaris['tanggal']; ?>">
                                                    <?= form_error('tanggal', '<small class="text-danger">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="status">Status</label>
                                                    <select name="status" id="edt_status" class="form-control" value="<?= $inventaris['status']; ?>">
                                                        <option selected disabled>Status</option>
                                                        <option value="inventaris">Inventaris</option>
                                                        <option value="habis pakai">Habis Pakai</option>
                                                    </select>
                                                    <?= form_error('status', '<small class="text-danger">', '</small>'); ?>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="keterangan">Keterangan</label>
                                                    <textarea class="form-control" name="keterangan" id="keterangan" rows="3"><?= $inventaris['keterangan']; ?></textarea>
                                                    <?= form_error('keterangan', '<small class="text-danger">', '</small>'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col d-flex justify-content-start">
                                                <button type="submit" class="btn btn-primary pull-right">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </form>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
                <!--/. container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

      