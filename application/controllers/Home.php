<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		if (!$this->session->userdata('email')) {
			redirect('auth');
		}
		
		$header['title'] = 'Home';
		$header['subtitle'] = 'Dashboard';

		$content['jumlah_inventory'] = $this->db->count_all_results('inventory');
		$content['jumlah_inventaris'] = $this->db->count_all_results('inventaris');

		$this->load->view('_template/header', $header);
		$this->load->view('home/index', $content);
		$this->load->view('_template/footer');
	}
}