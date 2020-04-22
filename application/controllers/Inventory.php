<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('InventoryModel');
		if (!$this->session->userdata('email')) {
			redirect('auth');
		}
	}

	public function index()
	{
		$header['title'] = 'Inventory';
		$header['subtitle'] = 'List Data Inventory';
        
        $content['title'] = 'Data Inventory';
		$content['subtitle'] = 'List Data Inventory';
		$content['list_inventory'] = $this->InventoryModel->get_all_inventory();	
		
		$this->load->view('_template/header', $header);
		$this->load->view('inventory/index', $content);
		$this->load->view('_template/footer');
	}

	public function add() {
		
		$this->form_validation->set_rules('kode_barang', 'Kode Barang', 'trim|required', ['required' => 'Kode Barang Harus Diisi']);
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'trim|required', ['required' => 'Nama Barang Harus Diisi']);
		$this->form_validation->set_rules('merk_barang', 'Merk Barang', 'trim|required', ['required' => 'Merk Barang Harus Diisi']);
		$this->form_validation->set_rules('jumlah_barang', 'Jumlah Barang', 'trim|required', ['required' => 'Jumlah Barang Harus Dipilih']);
		$this->form_validation->set_rules('status', 'Status', 'trim|required', ['required' => 'Status Harus Dipilih']);
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required', ['required' => 'keterangan Harus Dipilih']);
		$this->form_validation->set_rules('tanggal', 'Tanggal Masuk', 'trim|required', ['required' => 'Tanggal Masuk Harus Dipilih']);

		if ($this->form_validation->run() == false) {
			$header['title'] = 'Inventory';
			$header['subtitle'] = 'Tambah Data Inventory';
			
			$content['title'] = 'Data Inventory';
			$content['subtitle'] = 'Tambah Data Inventory';
	
			$this->load->view('_template/header', $header);
			$this->load->view('inventory/add', $content);
			$this->load->view('_template/footer');
		} else {
			$tanggal = date_create($this->input->post('tanggal'));
			$tanggal = date_format($tanggal, 'Y-m-d');

			$data = [
				'kode_barang'				=> htmlspecialchars($this->input->post('kode_barang')),
				'nama_barang'				=> htmlspecialchars($this->input->post('nama_barang')),
				'merk_barang'				=> htmlspecialchars($this->input->post('merk_barang')),
				'jumlah_barang'				=> htmlspecialchars($this->input->post('jumlah_barang')),
				'status'					=> htmlspecialchars($this->input->post('status')),
				'keterangan'				=> htmlspecialchars($this->input->post('keterangan')),
				'tanggal'					=> $tanggal,
			];
			
			$this->db->insert('inventory', $data);
			$this->session->set_flashdata('message', 'Ditambahkan');
			redirect('inventory');
		}
	}	

	public function edit() {
		$id_inventory = $this->uri->segment('3');
		
		$this->form_validation->set_rules('kode_barang', 'Kode Barang', 'trim|required', ['required' => 'Kode Barang Harus Diisi']);
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'trim|required', ['required' => 'Nama Barang Harus Diisi']);
		$this->form_validation->set_rules('merk_barang', 'Merk Barang', 'trim|required', ['required' => 'Merk Barang Harus Diisi']);
		$this->form_validation->set_rules('jumlah_barang', 'Jumlah Barang', 'trim|required', ['required' => 'Jumlah Barang Harus Dipilih']);
		$this->form_validation->set_rules('status', 'Status', 'trim|required', ['required' => 'Status Harus Dipilih']);
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required', ['required' => 'keterangan Harus Dipilih']);
		$this->form_validation->set_rules('tanggal', 'Tanggal Masuk', 'trim|required', ['required' => 'Tanggal Masuk Harus Dipilih']);

		if ($this->form_validation->run() == false) {
			$header['title'] = 'Inventory';
			$header['subtitle'] = 'Edit Data Inventory';
			
			$content['title'] = 'Data Inventory';
			$content['subtitle'] = 'Edit Data Inventory';
			$content['inventory'] = $this->InventoryModel->get_inventory($id_inventory);
	
			$this->load->view('_template/header', $header);
			$this->load->view('inventory/edit', $content);
			$this->load->view('_template/footer');
		} else {
			$data = $this->InventoryModel->get_inventory($this->input->post('id_inventory'));
			
			$tanggal = date_create($this->input->post('tanggal'));
			$tanggal = date_format($tanggal, 'Y-m-d');

			$this->db->set('kode_barang', htmlspecialchars($this->input->post('kode_barang'), true));
			$this->db->set('nama_barang', htmlspecialchars($this->input->post('nama_barang'), true));
			$this->db->set('merk_barang', htmlspecialchars($this->input->post('merk_barang'), true));
			$this->db->set('jumlah_barang', htmlspecialchars($this->input->post('jumlah_barang'), true));
			$this->db->set('status', htmlspecialchars($this->input->post('status'), true));
			$this->db->set('keterangan', htmlspecialchars($this->input->post('keterangan'), true));
			$this->db->set('tanggal', $tanggal);
			$this->db->where('id_inventory', $data['id_inventory']);
			$this->db->update('inventory');

			$this->session->set_flashdata('message', 'Diubah');
			redirect('inventory');
			
			}
		}

	public function delete($id) {
		$this->db->delete('inventory', ['id_inventory' => $id]);
		$this->session->set_flashdata('message', 'Dihapus');
		redirect('inventory');
	}


}