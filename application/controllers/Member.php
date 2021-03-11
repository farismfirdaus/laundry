<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller{

  function index() {
    if ($this->session->has_userdata('logged_in')) {
      $data["link"] = "M";
      $data["title"] = "Member";

      $this->load->view('section\header', $data);
      $this->load->view('v_member');
    } else {
      redirect('auth/login');
    }
  }

  function getMember() {
    echo json_encode($this->member->getMember());
  }

  function createMember() {
    $data = array(
      "nama_member"     => $this->input->post("nama"),
      "alamat"          => $this->input->post("alamat"),
      "jenis_kelamin"   => $this->input->post("jenis_kelamin"),
      "telp"            => $this->input->post("telp"),
    );

    $result = $this->member->createMember($data);
    echo json_encode($result);
  }

  function updateMember() {
    $id = array(
      "id_member"       => $this->input->post("id"),
    );

    $data = array(
      "nama_member"     => $this->input->post("nama"),
      "alamat"          => $this->input->post("alamat"),
      "jenis_kelamin"   => $this->input->post("jenis_kelamin"),
      "telp"            => $this->input->post("telp"),
    );

    $result = $this->member->updateMember($id, $data);
    echo json_encode($result);
  }

  function deleteMember() {
    $id = array(
      "id_member"       => $this->input->post("id"),
    );

    $result = $this->member->deleteMember($id);
    echo json_encode($result);
  }

}