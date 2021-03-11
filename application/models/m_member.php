<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_member extends CI_Model{
  
  function getMember() {
    return $this->db->get("tb_member")->result_array();
  }

  function createMember($data) {
    return $this->db->insert("tb_member", $data);
  }

  function updateMember($id, $data) {
    $this->db->where($id);
    return $this->db->update("tb_member", $data);
  }

  function deleteMember($id) {
    return $this->db->delete("tb_member", $id);
  }
}
