<?php

class ExportModel extends CI_Model {
    public function get_all_inventory() {
        $this->db->select('*');
        $this->db->from('inventory');
        return $this->db->get()->result();
    }
    public function get_all_inventaris() {
        $this->db->select('*');
        $this->db->from('inventaris');
        return $this->db->get()->result();
    }
}