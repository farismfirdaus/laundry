<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{
  
  function index() {
    if ($this->session->has_userdata('logged_in')) {
      $data["link"] = "U";
      $data["title"] = "User";
  
      $this->load->view('section\header', $data);
      $this->load->view('v_user');
    } else {
      redirect('auth/login');
    }
  }

  function getUser() {
    echo json_encode($this->user->getUser());
  }

  function createUser() {
    $data = array(
      "nama"      => $this->input->post("nama"),
      "username"  => $this->input->post("username"),
      "password"  => password_hash("laundry123", PASSWORD_DEFAULT),
      "id_outlet" => $this->input->post("id_outlet"),
      "role"      => $this->input->post("role"),
    );

    $result = $this->user->createUser($data);
    echo json_encode($result);
  }

  function updateUser() {
    $id = array(
      "id_user"     => $this->input->post("id"),
    );

    $data = array(
      "nama"      => $this->input->post("nama"),
      "username"  => $this->input->post("username"),
      "id_outlet" => $this->input->post("id_outlet"),
      "role"      => $this->input->post("role"),
    );

    $result = $this->user->updateUser($id, $data);
    echo json_encode($result);
  }

  function deleteUser() {
    $id = array(
      "id_user"       => $this->input->post("id"),
    );

    $result = $this->user->deleteUser($id);
    echo json_encode($result);
  }

}