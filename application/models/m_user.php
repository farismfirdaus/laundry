<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model{
  
  function getUser() {
    $this->db->join("tb_outlet o", "o.id_outlet=u.id_outlet");
    $this->db->select("u.id_user, u.nama, u.username, u.role, o.id_outlet, o.nama_outlet");
    return $this->db->get("tb_user u")->result_array();
  }

  function createUser($data) {
    return $this->db->insert("tb_user", $data);
  }

  function updateUser($id, $data) {
    $this->db->where($id);
    return $this->db->update("tb_user", $data);
  }

  function deleteUser($id) {
    return $this->db->delete("tb_user", $id);
  }
}
