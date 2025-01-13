<?php include ('../koneksi/koneksi.php');
$nip=$_GET["nip"]; 
$delMhs ="DELETE FROM dosen WHERE nip='$nip'"; 
$resultMhs =mysqli_query($koneksi, $delMhs); 
if($resultMhs) 
{
    echo"<script>alert('Data Mahasiswa Berhasil Dihapus') </script>";
    echo"<script type='text/javascript'>window.location ='./?adm=dosen'</script>";
    }
    else 
    {   echo"<sript>alert('Data Mahasiswa gagal Dihapus') </script>"; 
        echo"<script type='text/javascript'>window.location='./?adm=dosen'</script>"; } 
?>