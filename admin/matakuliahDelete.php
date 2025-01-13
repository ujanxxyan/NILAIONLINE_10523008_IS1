<?php include ('../koneksi/koneksi.php');
$kode=$_GET["kode_mtkul"]; 
$delMhs ="DELETE FROM matakuliah WHERE kode_mtkul='$kode'"; 
$resultMhs =mysqli_query($koneksi, $delMhs); 
if($resultMhs) 
{
    echo"<script>alert('Data Mahasiswa Berhasil Dihapus') </script>";
    echo"<script type='text/javascript'>window.location ='./?adm=matakuliah'</script>";
    }
    else 
    {   echo"<sript>alert('Data Mahasiswa gagal Dihapus') </script>"; 
        echo"<script type='text/javascript'>window.location='./?adm=matakuliah'</script>"; } 
?>