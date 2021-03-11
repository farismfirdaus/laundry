<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_outlet extends CI_Model {

  function getOutlet() {
    return $this->db->get("tb_outlet")->result_array();
  }

  function createOutlet($data) {
    return $this->db->insert("tb_outlet", $data);
  }

  function updateOutlet($id, $data) {
    $this->db->where($id);
    return $this->db->update("tb_outlet", $data);
  }

  function deleteOutlet($id) {
    return $this->db->delete("tb_outlet", $id);
  }
}
