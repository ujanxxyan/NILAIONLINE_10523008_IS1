<?php 
include ('../koneksi/koneksi.php');

if (isset($_GET["nim"])) {
    $nim = $_GET["nim"]; 
    
    $delNilai = "DELETE FROM nilai WHERE nim='$nim'"; 
    $resultNilai = mysqli_query($koneksi, $delNilai);  

    if ($resultNilai) {
        echo "<script>alert('Data Mahasiswa Berhasil Dihapus');</script>";
        echo "<script type='text/javascript'>window.location ='./?adm=nilai';</script>";
    } else {
        echo "<script>alert('Data Mahasiswa gagal Dihapus');</script>";
        echo "<script type='text/javascript'>window.location='./?adm=nilai';</script>";
    }
}
?>
