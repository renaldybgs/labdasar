<?php

class InventoryModel extends CI_Model {
    public function get_all_inventory() {
        return $this->db->get('inventory')->result_array();
    }

    public function get_inventory($id) {
        return $this->db->get_where('inventory', ['id_inventory' => $id])->row_array();
    }

    public function get_nama_barang($id) {
        $this->db->select('id_inventory, nama_barang');
        return $this->db->get_where('inventory', ['id_inventory' => $id])->row_array();
    }
}