<?php


//panggil koneksi database
include "koneksi.php";

//Uji jika tombol simpan di klik
if (isset($_POST['bsimpan'])) {


    //persiapan simpan data baru
    $simpan = mysqli_query($koneksi, "INSERT INTO tbkamar (no_kamar, harga_kamar, fasilitas_kamar, status_kamar, type_kamar)
                    VALUES ('$_POST[tno_kamar]',
                            '$_POST[tharga_kamar]',
                            '$_POST[tfasilitas_kamar]',
                            '$_POST[tstatus_kamar]',
                            '$_POST[ttype_kamar]') ");
//jika simpan sukses
if($simpan) {
    echo "<script>
    alert('Simpan data Sukses!');
    document.location='kamar.php';
    </script>";
} else {
    echo "<script>
    alert('Simpan data Gagal!');
    document.location='kamar.php';
    </script>";
}



}
//Uji jika tombol ubah di klik
if (isset($_POST['bubah'])) {


    //persiapan ubah data 
    $ubah = mysqli_query($koneksi, "UPDATE tbkamar SET
                                                        no_kamar = '$_POST[tno_kamar]',
                                                        harga_kamar = '$_POST[tharga_kamar]',
                                                        fasilitas_kamar = '$_POST[tfasilitas_kamar]',
                                                        status_kamar = '$_POST[tstatus_kamar]',
                                                        type_kamar = '$_POST[ttype_kamar]'
                                                        WHERE id_kamar = '$_POST[id_kamar]'
                                                            ");
//jika ubah sukses
if($ubah) {
    echo "<script>
    alert('Ubah data Sukses!');
    document.location='kamar.php';
    </script>";
} else {
    echo "<script>
    alert('Simpan data Gagal!');
    document.location='kamar.php';
    </script>";
}

}

//Uji jika tombol hapus di klik
if (isset($_POST['bhapus'])) {


    //persiapan hapus data 
    $hapus = mysqli_query($koneksi, "DELETE FROM tbkamar WHERE id_kamar = '$_POST[id_kamar]' ");

//jika haps sukses
if($hapus) {
    echo "<script>
    alert('Hapus data Sukses!');
    document.location='kamar.php';
    </script>";
} else {
    echo "<script>
    alert('Hapus data Gagal!');
    document.location='kamar.php';
    </script>";
}

}



