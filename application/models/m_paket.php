<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_paket extends CI_Model{

  function getPaket(){
    $this->db->join("tb_outlet o", "o.id_outlet=p.id_outlet");
    $this->db->select("p.id_paket, o.id_outlet, o.nama_outlet, p.jenis, p.nama_paket, p.harga");
    return $this->db->get("tb_paket p")->result_array();
  }

  function createPaket($data) {
    return $this->db->insert("tb_paket", $data);
  }

  function updatePaket($id, $data) {
    $this->db->where($id);
    return $this->db->update("tb_paket", $data);
  }

  function deletePaket($id) {
    return $this->db->delete("tb_paket", $id);
  }

}
