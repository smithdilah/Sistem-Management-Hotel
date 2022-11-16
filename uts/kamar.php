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
        <a class="nav-link active" href="kamar.php">Data Kamar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="reservasi.php">Reservasi</a>
      </li>
    </ul>
  </div>
  <div class="card-body">
   
 

    <div class="card mt-3">
  <div class="card-header bg-primary text-white">
    Data Kamar Hotel
  </div>
  <div class="card-body">

  <!-- Button trigger modal -->
<button type="button" class="btn btn-success mb-4" data-bs-toggle="modal" data-bs-target="#modalTambah">
 Tambah Data
</button>
    
<table class= "table table-bordered table-striped table-hover">
<tr>
    <th>No</th>
    <th>Nomor Kamar</th>
    <th>Harga Kamar</th>
    <th>Fasilitas Kamar</th>
    <th>Status Kamar</th>
    <th>Type Kamar</th>
    <th>Aksi</th>
</tr>

<?php

//persiapan menampilkan data

$no = 1;
$tampil = mysqli_query($koneksi, "SELECT * FROM tbkamar ORDER BY id_kamar DESC");
while($data = mysqli_fetch_array($tampil)) :

    ?>

<tr>
<td><?= $no++ ?></td>
<td><?= $data['no_kamar']?></td>
<td><?= $data['harga_kamar']?></td>
<td><?= $data['fasilitas_kamar']?></td>
<td><?= $data['status_kamar']?></td>
<td><?= $data['type_kamar']?></td>
<td>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalView<?= $no ?>">
View
</button>


<!-- Modal Lihat Data-->
<div class="modal fade" id="modalView<?= $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">View Data Kamar</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
      <div class="col-sm-4">
     Nomor Kamar <br />
     Harga Kamar <br />
     Fasilitas Kamar <br />
     Status Kamar <br />
     Type Kamar <br />
     </div>
<div class="col-sm-8">
  : <?php echo $data['no_kamar'] ?><br />
  : <?php echo $data['harga_kamar'] ?><br />
  : <?php echo $data['fasilitas_kamar'] ?><br />
  : <?php echo $data['status_kamar'] ?><br />
  : <?php echo $data['type_kamar'] ?><br />
</div>
</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Akhir Modal Lihat Data-->

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
      <form method="POST" action="aksi_crud.php">
        <input type="hidden" name="id_kamar" value="<?= $data['id_kamar']?>">

      <div class="modal-body">


<div class="mb-3">
  <label  class="form-label">Nomor Kamar</label>
  <input type="text" class="form-control" name="tno_kamar" value="<?= $data['no_kamar']?>" placeholder="masukan nomor kamar">
</div>
<div class="mb-3">
  <label  class="form-label">Harga Kamar</label>
  <input type="text" class="form-control" name="tharga_kamar" value="<?= $data['harga_kamar']?>" placeholder="masukan harga kamar">
</div>

<div class="mb-3">
  <label class="form-label">Fasilitas Kamar</label>
  <textarea class="form-control" name="tfasilitas_kamar"  rows="3"><?= $data['fasilitas_kamar']?> </textarea>
</div>
<div class="mb-3">
  <label class="form-label">Status Kamar</label>
  <textarea class="form-control" name="tstatus_kamar" rows="3"><?= $data['status_kamar']?></textarea>
</div>
<div class="mb-3">
  <label class="form-label">Type Kamar</label>
  <select class="form-select" name="ttype_kamar">
    <option value="<?= $data['type_kamar']?>"><?= $data['type_kamar']?></option>
    <option value="Double-room">Doubel Room</option>
    <option value="Single-room">Single Room</option>
    <option value="Twin-room">Twin Room</option>
    <option value="Triple-room">Triple Room</option>

</select>
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
      <form method="POST" action="aksi_crud.php">
        <input type="hidden" name="id_kamar" value="<?= $data['id_kamar']?>">

      <div class="modal-body">


      <h5 class="text-center">Apakah anda yakin akan menghapus data ini?<br>
    <span class="text-danger"><?=$data['no_kamar'] ?> - <?=$data['harga_kamar'] ?> </span>
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
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Tabel Kamar</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="aksi_crud.php">
      <div class="modal-body">


<div class="mb-3">
  <label  class="form-label">Nomor Kamar</label>
  <input type="text" class="form-control" name="tno_kamar" placeholder="masukan nomor kamar">
</div>
<div class="mb-3">
  <label  class="form-label">Harga Kamar</label>
  <input type="text" class="form-control" name="tharga_kamar" placeholder="masukan harga kamar">
</div>

<div class="mb-3">
  <label class="form-label">Fasilitas Kamar</label>
  <textarea class="form-control" name="tfasilitas_kamar" rows="3"></textarea>
</div>
<div class="mb-3">
  <label class="form-label">Status Kamar</label>
  <textarea class="form-control" name="tstatus_kamar" rows="3"></textarea>
</div>
<div class="mb-3">
  <label class="form-label">Type Kamar</label>
  <select class="form-select" name="ttype_kamar">
    <option value=""></option>
    <option value="Double-room">Doubel Room</option>
    <option value="Single-room">Single Room</option>
    <option value="Twin-room">Twin Room</option>
    <option value="Triple-room">Triple Room</option>

</select>
</div>


        
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary" name="bsimpan">Simpan</button>
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