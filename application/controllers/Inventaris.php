<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventaris extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('InventarisModel');
		if (!$this->session->userdata('email')) {
			redirect('auth');
		}
	}

	public function index()
	{
		$header['title'] = 'Inventaris';
		$header['subtitle'] = 'List Data Inventaris';
        
        $content['title'] = 'Data Inventaris';
		$content['subtitle'] = 'List Data Inventaris';
		$content['list_inventaris'] = $this->InventarisModel->get_all_inventaris();	
		
		$this->load->view('_template/header', $header);
		$this->load->view('inventaris/index', $content);
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
			$header['title'] = 'Inventaris';
			$header['subtitle'] = 'Tambah Data Inventaris';
			
			$content['title'] = 'Data Inventaris';
			$content['subtitle'] = 'Tambah Data Inventaris';
	
			$this->load->view('_template/header', $header);
			$this->load->view('inventaris/add', $content);
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
			
			$this->db->insert('inventaris', $data);
			$this->session->set_flashdata('message', 'Ditambahkan');
			redirect('inventaris');
		}
	}	

	public function edit() {
		$id_inventaris = $this->uri->segment('3');
		
		$this->form_validation->set_rules('kode_barang', 'Kode Barang', 'trim|required', ['required' => 'Kode Barang Harus Diisi']);
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'trim|required', ['required' => 'Nama Barang Harus Diisi']);
		$this->form_validation->set_rules('merk_barang', 'Merk Barang', 'trim|required', ['required' => 'Merk Barang Harus Diisi']);
		$this->form_validation->set_rules('jumlah_barang', 'Jumlah Barang', 'trim|required', ['required' => 'Jumlah Barang Harus Dipilih']);
		$this->form_validation->set_rules('status', 'Status', 'trim|required', ['required' => 'Status Harus Dipilih']);
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required', ['required' => 'keterangan Harus Dipilih']);
		$this->form_validation->set_rules('tanggal', 'Tanggal Masuk', 'trim|required', ['required' => 'Tanggal Masuk Harus Dipilih']);

		if ($this->form_validation->run() == false) {
			$header['title'] = 'Inventaris';
			$header['subtitle'] = 'Edit Data Inventaris';
			
			$content['title'] = 'Data Inventaris';
			$content['subtitle'] = 'Edit Data Inventaris';
			$content['inventaris'] = $this->InventarisModel->get_inventaris($id_inventaris);
	
			$this->load->view('_template/header', $header);
			$this->load->view('inventaris/edit', $content);
			$this->load->view('_template/footer');
		} else {
			$data = $this->InventarisModel->get_inventaris($this->input->post('id_inventaris'));
			
			$tanggal = date_create($this->input->post('tanggal'));
			$tanggal = date_format($tanggal, 'Y-m-d');

			$this->db->set('kode_barang', htmlspecialchars($this->input->post('kode_barang'), true));
			$this->db->set('nama_barang', htmlspecialchars($this->input->post('nama_barang'), true));
			$this->db->set('merk_barang', htmlspecialchars($this->input->post('merk_barang'), true));
			$this->db->set('jumlah_barang', htmlspecialchars($this->input->post('jumlah_barang'), true));
			$this->db->set('status', htmlspecialchars($this->input->post('status'), true));
			$this->db->set('keterangan', htmlspecialchars($this->input->post('keterangan'), true));
			$this->db->set('tanggal', $tanggal);
			$this->db->where('id_inventaris', $data['id_inventaris']);
			$this->db->update('inventaris');

			$this->session->set_flashdata('message', 'Diubah');
			redirect('inventaris');
			
			}
		}

	public function delete($id) {
		$this->db->delete('inventaris', ['id_inventaris' => $id]);
		$this->session->set_flashdata('message', 'Dihapus');
		redirect('inventaris');
	}


}