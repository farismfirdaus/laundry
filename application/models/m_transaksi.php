<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model{

  function getTransaksi() {
    $this->db->join('tb_member m','m.id_member=t.id_member');
    $this->db->join('tb_outlet o','o.id_outlet=t.id_outlet');
    $this->db->join('tb_user u','u.id_user=t.id_user');
    $this->db->select("t.id_transaksi, o.nama_outlet, t.kode_invoice, m.nama_member, t.tgl, t.batas_waktu, t.tgl_bayar, t.status, t.biaya_tambahan, diskon, pajak, u.nama");
    $this->db->order_by('id_transaksi', 'ASC');
    return $this->db->get("tb_transaksi t")->result_array();
  }

  function getDetailTransaksiById($id) {
    $this->db->join('tb_detail_transaksi td', 't.id_transaksi=td.id_transaksi');
    $this->db->join('tb_paket p','p.id_paket=td.id_paket');
    $this->db->select('p.nama_paket, p.harga, td.qty, td.keterangan');
    $this->db->where($id);
    return $this->db->get("tb_transaksi t")->result_array();
  }

  function createTransaksi($data) {
    $this->db->insert("tb_transaksi", $data);
    $insert_id = $this->db->insert_id();
    return  $insert_id;
  }

  function createDetailTransaksi($data) {
    return $this->db->insert_batch('tb_detail_transaksi', $data); 
  }

  function UpdateTransaksi($id, $data) {
    $this->db->where($id);
    return $this->db->update("tb_transaksi", $data);
  }

  function deleteDetailTransaksi($id){
    return $this->db->delete("tb_detail_transaksi", $id);
  }

  function deleteTransaksi($id){
    return $this->db->delete("tb_transaksi", $id);
  }

  function BayarTransaksi($id, $data){
    $this->db->where($id);
    return $this->db->update("tb_transaksi", $data);
  }
}
