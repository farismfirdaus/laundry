<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paket extends CI_Controller{
  function index(){
    if ($this->session->has_userdata('logged_in')) {
      $data["link"] = "P";
      $data["title"] = "Paket";
  
      $this->load->view('section\header', $data);
      $this->load->view('v_paket');
    } else {
      redirect('auth/login');
    }
  }

  function getPaket() {
    echo json_encode($this->paket->getPaket());
  }

  function createPaket() {
    $data = array(
      "id_outlet"     => $this->input->post("id_outlet"),
      "jenis"          => $this->input->post("jenis"),
      "nama_paket"   => $this->input->post("nama"),
      "harga"            => $this->input->post("harga"),
    );

    $result = $this->paket->createPaket($data);
    echo json_encode($result);
  }

  function updatePaket() {
    $id = array(
      "id_paket"       => $this->input->post("id"),
    );

    $data = array(
      "id_outlet"     => $this->input->post("id_outlet"),
      "jenis"          => $this->input->post("jenis"),
      "nama_paket"   => $this->input->post("nama"),
      "harga"            => $this->input->post("harga"),
    );

    $result = $this->paket->updatePaket($id, $data);
    echo json_encode($result);
  }

  function deletePaket() {
    $id = array(
      "id_paket"       => $this->input->post("id"),
    );

    $result = $this->paket->deletePaket($id);
    echo json_encode($result);
  }
} 