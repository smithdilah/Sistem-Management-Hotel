<?php


//panggil koneksi database
include "koneksi.php";

//Uji jika tombol simpan di klik
if (isset($_POST['csimpan'])) {


    //persiapan tambah data baru
    $simpan = mysqli_query($koneksi, "INSERT INTO tbreservasi (nama_reservasi, tlp_reservasi, alamat, tgl_masuk, tgl_keluar, id_kamar, status_reservasi)
                    VALUES ('$_POST[tnama_reservasi]',
                            '$_POST[ttlp_reservasi]',
                            '$_POST[talamat]',
                            '$_POST[tdate]',
                            '$_POST[ttimestap]',
                            '$_POST[tid_kamar]',
                            '$_POST[tstatus_reservasi]' ");
//jika simpan sukses
if($simpan) {
    echo "<script>
    alert('Simpan data Sukses!');
    document.location='reservasi.php';
    </script>";
} else {
    echo "<script>
    alert('Simpan data Gagal!');
    document.location='reservasi.php';
    </script>";
}



}
//Uji jika tombol ubah di klik
if (isset($_POST['bubah'])) {


    //persiapan ubah data 
    $ubah = mysqli_query($koneksi, "UPDATE tbreservasi SET
                                                        nama_reservasi = '$_POST[tnama_reservsi]',
                                                        tlp_reservasi = '$_POST[ttlp_reservasi]',
                                                        alamat = '$_POST[talamat]',
                                                        tgl_masuk = '$_POST[tdate]',
                                                        tgl_keluar = '$_POST[ttimestap]',
                                                        id_kamar = '$_POST[tid_kamar]',
                                                        status_kamar = '$_POST[tstatus_reservasi]'
                                                        WHERE id_reservasi = '$_POST[id_reservasi]'
                                                            ");
//jika ubah sukses
if($ubah) {
    echo "<script>
    alert('Ubah data Sukses!');
    document.location='reservasi.php';
    </script>";
} else {
    echo "<script>
    alert('Simpan data Gagal!');
    document.location='reservasi.php';
    </script>";
}

}

//Uji jika tombol hapus di klik
if (isset($_POST['bhapus'])) {


    //persiapan hapus data 
    $hapus = mysqli_query($koneksi, "DELETE FROM tbreservasi WHERE id_reservasi = '$_POST[id_reservasi]' ");

//jika hapus sukses
if($hapus) {
    echo "<script>
    alert('Hapus data Sukses!');
    document.location='reservasi.php';
    </script>";
} else {
    echo "<script>
    alert('Hapus data Gagal!');
    document.location='reservasi.php';
    </script>";
}

}



