<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Outlet extends CI_Controller {

  function index() {
    if ($this->session->has_userdata('logged_in')) {
      $data["link"] = "O";
      $data["title"] = "Outlet";

      $this->load->view('section\header', $data);
      $this->load->view('v_outlet');
    } else {
      redirect('auth/login');
    }
  }

  function getOutlet() {
    echo json_encode($this->outlet->getOutlet());
  }

  function createOutlet() {
    $data = array(
      "nama_outlet"     => $this->input->post("nama"),
      "alamat"          => $this->input->post("alamat"),
      "telp"            => $this->input->post("telp"),
    );

    $result = $this->outlet->createOutlet($data);
    echo json_encode($result);
  }

  function updateOutlet() {
    $id = array(
      "id_outlet"       => $this->input->post("id"),
    );

    $data = array(
      "nama_outlet"     => $this->input->post("nama"),
      "alamat"          => $this->input->post("alamat"),
      "telp"            => $this->input->post("telp"),
    );

    $result = $this->outlet->updateOutlet($id, $data);
    echo json_encode($result);
  }

  function deleteOutlet() {
    $id = array(
      "id_outlet"       => $this->input->post("id"),
    );

    $result = $this->outlet->deleteOutlet($id);
    echo json_encode($result);
  }
}