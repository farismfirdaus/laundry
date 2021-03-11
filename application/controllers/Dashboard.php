<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

  function index(){
    if ($this->session->has_userdata('logged_in')) {
      $data["link"] = "D";
      $data["title"] = "Dashboard";

      $this->load->view('section\header', $data);
      $this->load->view('v_dashboard');
    } else {
      redirect('auth/login');
    }
  }
}