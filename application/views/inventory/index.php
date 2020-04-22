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
			<a href="<?= base_url('export/export_pdf'); ?>" class="btn btn-primary">Export to PDF</a>
            <a href="<?= base_url('export/export_excel'); ?>" class="btn btn-success">Export to Excel</a>
			<div class="row mt-2">
				<div class="col-md-12">
					<div class="message" data-title="Data Inventory"
						data-message="<?= $this->session->flashdata('message'); ?>"></div>
					<div class="card">
						<!-- <div class="card-header">
									<h3 class="card-title">DataTable with default features</h3>
								</div> -->
						<!-- /.card-header -->
						<div class="card-body">
							<table id="data-inventory" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>No</th>
										<th>Kode Barang</th>
										<th>Nama Barang</th>
										<th>Merk Barang</th>
										<th>Jumlah Barang</th>
										<th>Status</th>
										<th>Keterangan</th>
										<th>Tanggal Masuk</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1; ?>
									<?php 
										foreach($list_inventory as $inventory) : 

										$tanggal = date_create($inventory['tanggal']);
										$tanggal = date_format($tanggal, 'd/m/Y');

									?>
									<tr>
										<td class="text-center"><?= $no; ?></td>
										<td><?= $inventory['kode_barang']; ?></td>
										<td><?= $inventory['nama_barang']; ?></td>
										<td><?= $inventory['merk_barang']; ?></td>
										<td><?= $inventory['jumlah_barang']; ?></td>
										<td><?= $inventory['status'];?></td>
										<td><?= $inventory['keterangan'];?></td>
										<td class="text-center"><?= $tanggal; ?></td>
										<td>
											<div class="btn-group btn-group-sm">
												<!-- <a href="#" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="View"><i class="fas fa-eye"></i></a> -->
												<a href="<?= base_url('inventory/edit/'.$inventory['id_inventory']); ?>"
													class="btn btn-success" data-toggle="tooltip" data-placement="top"
													title="Edit"><i class="fas fa-edit"></i></a>
												<a href="<?= base_url('inventory/delete/') . $inventory['id_inventory']; ?>"
													class="btn btn-danger delete-inventory" data-toggle="tooltip"
													data-placement="top" title="Delete"><i class="fas fa-trash"></i></a>
											</div>
										</td>
									</tr>
									<?php $no++; ?>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
						<!-- /.card-body -->
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
