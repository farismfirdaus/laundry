<!DOCTYPE html>
<html lang="en">
<head>
  <style>
    table {
      border-collapse: collapse;
    }
  </style> 
</head>
<body>
  <h1>Laporan Transaksi</h1>

  <table border="1">
    <thead>
      <tr>
        <th>#</th>
        <th>Kode Invoice</th>
        <th>Nama Member</th>
        <th>Tanggal</th>
        <th>Batas Akhir</th>
        <th>Tanggal Pembayaran</th>
        <th>Status</th>
        <th>Biaya Tambahan</th>
        <th>Diskon</th>
        <th>Pajak</th>
        <th>Total</th>
        <th>Nama Pegawai</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $id = 1;
        $total = 0;

        foreach($transaksi as $t) :
          echo "<tr>";
          echo "<td>". $id++ ."</td>";
          echo "<td>". $t['kode_invoice'] ."</td>";
          echo "<td>". $t['nama_member'] ."</td>";
          echo "<td>". $t['tgl'] ."</td>";
          echo "<td>". $t['batas_waktu'] ."</td>";
          echo "<td>". $t['tgl_bayar'] ."</td>";
          echo "<td>". $t['status'] ."</td>";
          echo "<td>". number_format($t['biaya_tambahan'], 0,",",".") ."</td>";
          echo "<td>". number_format($t['diskon'], 0,",",".") ."</td>";
          echo "<td>". number_format($t['pajak'], 0,",",".") ."</td>";
          echo "<td>". number_format($t['total'], 0,",",".") ."</td>";
          echo "<td>". $t['nama'] ."</td>";
          echo "</tr>";
          
          $total += $t['total'];
        endforeach;

          echo "<tr>";
          echo "<td colspan='10'></td>";
          echo "<td>". number_format($total, 0,",",".") ."</td>";
          echo "<td></td>";
          echo "</tr>";
      ?>
    </tbody>
  </table>

</body>
</html>
