<?php

class InventarisModel extends CI_Model {
    public function get_all_inventaris() {
        return $this->db->get('inventaris')->result_array();
    }

    public function get_inventaris($id) {
        return $this->db->get_where('inventaris', ['id_inventaris' => $id])->row_array();
    }

    public function get_nama_barang($id) {
        $this->db->select('id_inventaris, nama_barang');
        return $this->db->get_where('inventaris', ['id_inventaris' => $id])->row_array();
    }
}