<?php

//panggil koneksi database
include "koneksi.php";

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UTS CRUD PHP MYSQL</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> -->
  </head>
  <body>

  <div class="container">

  <div class="mt-3">
    <h3 class="text-center">UTS PWEB 2: TAMPILAN CRUD PHP, MYSQL & MODAL BOOTSTREAP </h3>
    <h3 class="text-center">Nurfadilah_210103070</h3>
</div>
<div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-pills card-header-pills">
    <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="kamar.php">Data Kamar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="reservasi.php">Reservasi</a>
      </li>
    </ul>
  </div>
  <div class="card-body">
   
 

    <div class="card mt-3">
  <div class="card-header bg-primary text-white">
    Data Reservasi Hotel
  </div>
  <div class="card-body">

  <!-- Button trigger modal -->
<button type="button" class="btn btn-success mb-4" data-bs-toggle="modal" data-bs-target="#modalTambah">
 Tambah Data
</button>
    
<table class= "table table-bordered table-striped table-hover">
<tr>
    <th>No</th>
    <th>Nama Reservasi</th>
    <th>Telp Reservasi</th>
    <th>Alamat</th>
    <th>Tanggal Masuk</th>
    <th>Tanggal Keluar</th>
    <th>Id Kamar</th>
    <th>Status Reservasi</th>
    <th>Aksi</th>
</tr>

<?php

//persiapan menampilkan data

$no = 1;
$tampil = mysqli_query($koneksi, "SELECT * FROM tbreservasi ORDER BY id_reservasi DESC");
while($data = mysqli_fetch_array($tampil)) :

    ?>

<tr>
<td><?= $no++ ?></td>
<td><?= $data['nama_reservasi']?></td>
<td><?= $data['tlp_reservasi']?></td>
<td><?= $data['alamat']?></td>
<td><?= $data['tgl_masuk']?></td>
<td><?= $data['tgl_keluar']?></td>
<td><?= $data['id_kamar']?></td>
<td><?= $data['status_reservasi']?></td>
<td>
    <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $no ?>">Ubah</a>
    <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $no ?>">Hapus</a>

</td>

</tr>

<!--Awal Modal Ubah -->
<div class="modal fade" id="modalUbah<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Tabel Kamar</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="aksi_crud2.php">
        <input type="hidden" name="id_reservasi" value="<?= $data['id_reservasi']?>">

      <div class="modal-body">


<div class="mb-3">
  <label  class="form-label">Nama Reservasi</label>
  <input type="text" class="form-control" name="tnama_reservasi" value="<?= $data['nama_reservasi']?>" placeholder="masukan nama reservasi">
</div>
<div class="mb-3">
  <label  class="form-label">Telp Reservasi</label>
  <input type="text" class="form-control" name="ttlp_reservasi" value="<?= $data['tlp_reservasi']?>" placeholder="masukan nomor telepon">
</div>

<div class="mb-3">
  <label class="form-label">alamat</label>
  <textarea class="form-control" name="talamat"  rows="3"><?= $data['alamat']?> </textarea>
</div>

<div class="mb-3">
    <label for="tgl_masuk">Tanggal Masuk</label>
    <input type="text" name="tdate" class="form-control" disabled value="<?= date("Y-m-d h:i:s"); ?>" required />
 </div>

 <div class="mb-3">
     <label for="tgl_keluar">Tanggal Keluar</label>
     <input type="text" name="ttimestap"  class="form-control" plcaceholder="Timestamp" disabled value="Timestamp" required/>
 </div>

<div class="mb-3">
  <label class="form-label">Id Kamar</label>
  <textarea class="form-control" name="tid_kamar"  rows="3"><?= $data['id_kamar']?> </textarea>
</div>

<div class="mb-3">
  <label class="form-label">Status Reservasi</label>
  <textarea class="form-control" name="tstatus_reservasi" rows="3"><?= $data['status_reservasi']?></textarea>
</div>
        
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary" name="bubah">Ubah</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>

      </div>
      </form>
    </div>
  </div>
</div>
<!--Akhir Modal  ubah-->

<!--Awal Modal Hapus -->
<div class="modal fade" id="modalHapus<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Hapus Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="aksi_crud2.php">
        <input type="hidden" name="id_reservasi" value="<?= $data['id_reservasi']?>">

      <div class="modal-body">


      <h5 class="text-center">Apakah anda yakin akan menghapus data ini?<br>
    <span class="text-danger"><?=$data['id_reservasi'] ?> - <?=$data['nama_reservasi'] ?> </span>
    </h5>

      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary" name="bhapus">Ya,Hapus aja</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>

      </div>
      </form>
    </div>
  </div>
</div>
<!--Akhir Modal  Hapus-->

<?php endwhile; ?>
</table>



<!--Awal Modal Tambah -->
<div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Tabel Reservasi</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="aksi_crud2.php">
      <div class="modal-body">


<div class="mb-3">
  <label  class="form-label">Nama Reservasi</label>
  <input type="text" class="form-control" name="tnama_reservasi" placeholder="masukan nama reservasi">
</div>
<div class="mb-3">
  <label  class="form-label">Telp Reservasi</label>
  <input type="text" class="form-control" name="ttlp_reservasi" placeholder="masukan nomor telepon">
</div>

<div class="mb-3">
  <label class="form-label">Alamat</label>
  <textarea class="form-control" name="talamat" rows="3"></textarea>
</div>
<div class="mb-3">
    <label for="tgl_masuk">Tanggal Masuk</label>
    <input type="text" name="tdate" class="form-control" disabled value="<?= date("Y-m-d h:i:s"); ?>" required />
 </div>
 <div class="mb-3">
     <label for="tgl_keluar">Tanggal Keluar</label>
     <input type="text" name="ttimestap"  class="form-control" plcaceholder="Timestamp" disabled value="Timestamp" required/>
 </div>

 <div class="mb-3">
  <label class="form-label">Id Kamar</label>
  <textarea class="form-control" name="tid_kamar" rows="3"></textarea>
</div>
 

<div class="mb-3">
  <label class="form-label">Status Reservasi</label>
  <textarea class="form-control" name="tstatus_reservasi" rows="3"></textarea>
</div>

        
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary" name="csimpan">Simpan</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>

      </div>
      </form>
    </div>
  </div>
</div>
<!--Akhir Modal -->



  </div>
</div>
  </div>

  <footer>
  <p>Posted by: Nurfadilah</p>
  <p>Contact information: <a href="smithdilah@gmail.com">
  </a>smithdilah@gmail.com</p>
</footer>
<script src="js/bootstrap.bundle.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script> -->
  </body>
</html>