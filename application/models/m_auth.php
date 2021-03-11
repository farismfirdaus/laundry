<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model{

  public function verifyLogin($username){
    $this->db->where($username);
    return $this->db->get("tb_user")->result_array();
  }

}