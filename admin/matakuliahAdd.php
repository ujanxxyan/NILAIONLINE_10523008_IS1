<?php
include ('../koneksi/koneksi.php');

?>

<h3>TAMBAH DATA MATAKULIAH</h3>
<br /><hr /><br />
<p>
<?php 
if (!isset($_POST['submit']))
 {
?>
    <form enctype="multipart/form-data" method="post">
    <table width="100%" border="0">
    <tr>
     <td width="27%">KODE MATA KULIAH</td>
     <td width="4%">:</td>
     <td width="69%"><input type="text" name="kode" size="30" placeholder="KODE"/></td>
    </tr>
    <tr>
    <td>NAMA MATAKULIAH</td>
    <td>:</td>
    <td><input type="text" name="nama" size="30" placeholder="NAMA MATAKULIAH"/></td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>
        <input id="submit" name="submit" type="submit" value="TAMBAH">
    </td>
    </tr>
    </table>
</form>
<?php
} 
else {
    $kode        =$_POST["kode"];
    $nama        =$_POST["nama"];
    
    //input data mahsiswa
    $insertMhs ="INSERT INTO matakuliah VALUE ( '$kode', '$nama') ";

    $queryMhs = mysqli_query($koneksi, $insertMhs);

    if ($queryMhs){
     echo"<script> alert('Data Berhasil Diubah !') </script>";
     echo"<script type='text/javascript'>window.location ='./?adm=matakuliah'</script>";
    }
    else {
        echo"<script>alert('Data gagal Diubah !')</script>";
        echo"<script type='text/javascript'>window.location ='./?adm=matakuliah'</script>";
    }
}
?>
<a href="./?adm=matakuliah">&raquo:KEMBALI </a>