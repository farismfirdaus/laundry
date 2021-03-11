<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller{
  function index(){
    if ($this->session->has_userdata('logged_in')) {
      $data["link"] = "T";
      $data["title"] = "Transaksi";
  
      $this->load->view('section\header', $data);
      $this->load->view('v_transaksi');
    } else {
      redirect('auth/login');
    }
  }

  function getTransaksi() {
    echo json_encode($this->transaksi->getTransaksi());
  }

  function getDetailTransaksiById($id){
    $id_transaksi = array(
      "td.id_transaksi" => $id
    );

    echo json_encode($this->transaksi->getDetailTransaksiById($id_transaksi));
  }

  function createTransaksi(){
    $date_now = date("Y-m-d H:i:s");

    if($this->input->post("lunas") == "true"){
      $lunas = $date_now;
    }else{
      $lunas = null;
    }

    $count = $this->invoice->getLatest();
    if ($count == null){
      $count = 1;
      $this->invoice->setLatest($count);
    }else{
      $count += 1;
      $this->invoice->setLatest($count);
    }

    $count = sprintf("%04s", $count);

    $invoice = "TR-" . $count . "-" . date("d/m/Y");

    $data = array(
      "id_outlet"       => 1,
      "kode_invoice"    => $invoice,
      "id_member"       => $this->input->post("id_member"),
      "tgl"             => $date_now,
      "batas_waktu"     => date('Y-m-d H:i:s', strtotime($date_now. ' + 2 days')),
      "tgl_bayar"       => $lunas,
      "biaya_tambahan"  => $this->input->post("biaya_tambahan"),
      "pajak"           => $this->input->post("pajak"),
      "status"          => "baru",
      "id_user"         => $this->session->userdata("id_user"),  
    );
    $id_transaksi = $this->transaksi->createTransaksi($data);

    $detailtrx = $this->input->post("detailtrx");
    $detail_transaction = array();
    foreach ($detailtrx as $trx) {
      $single = array(
        "id_transaksi"  => $id_transaksi,
        "id_paket"      => $trx["id"],
        "qty"           => $trx["qty"],
        "keterangan"    => $trx["keterangan"],
      );
      array_push($detail_transaction, $single);
    }
    $result = $this->transaksi->createDetailTransaksi($detail_transaction);
    echo json_encode($result);
  }

  function DeleteTransaksi() {
    $id = array(
      "id_transaksi"  => $this->input->post("id"),
    );

    $this->transaksi->deleteDetailTransaksi($id);
    $result = $this->transaksi->deleteTransaksi($id);
    echo json_encode($result);
  }

  function BayarTransaksi() {
    $id = array(
      "id_transaksi"  => $this->input->post("id"),
    );

    $tanggal_bayar = array(
      "tgl_bayar"     => date("Y-m-d H:i:s"),
    );

    $result = $this->transaksi->BayarTransaksi($id, $tanggal_bayar);
    echo json_encode($result);
  }

  function UbahStatusTransaksi() {
    $id = array(
      "id_transaksi"  => $this->input->post("id"),
    );

    $data = array(
      "status"        => $this->input->post("status"),
    );

    $result = $this->transaksi->UpdateTransaksi($id, $data);
    echo json_encode($result);
  }
}