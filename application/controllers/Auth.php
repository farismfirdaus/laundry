<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

  function index() {
    redirect('auth/login');
  }

  function logout(){
    $this->session->sess_destroy();
    redirect('auth/login');
  }


  function login() {
    if ($this->session->has_userdata('logged_in')) {
      redirect('dashboard');
    } else {
      $this->load->view('v_login');
    }
  }

  function verifyLogin() {
    $data = array(
      "username"    => $this->input->post("username"),
    );

    $result = $this->auth->verifyLogin($data);

    if (count($result) >= 1) {
      foreach ($result as $user) {
        if (password_verify($this->input->post('password'), $user['password'])) {

          $data = array(
            'id_user'   => $user['id_user'],
            'username'  => $user['username'],
            'nama'      => $user['nama'],
            'logged_in' => true,
          );

          $this->session->set_userdata($data);

          redirect('dashboard');
        } else {
          $this->session->set_userdata('error', 'Username/Password salah!');
          redirect('auth/login');
        }
      }
    } else {
      $this->session->set_userdata('error', 'Username tidak ditemukan');
      redirect('auth/login');
    }
  }

}