<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_invoice extends CI_Model{

  public function getLatest(){
    $this->db->where(array("date" => date("Y-m-d")));
    $this->db->select("max(count) as count");
    $data = $this->db->get("tb_invoice")->result_array();
    $data = $data[0];
    return $data["count"];
  }

  public function setLatest($id){
    $this->db->truncate('tb_invoice');

    $data = array(
      "count"     => $id,
      "date"      => date("Y-m-d"),
    );
    $this->db->insert("tb_invoice", $data);
  }

}