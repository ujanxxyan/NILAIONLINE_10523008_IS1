<?php
include ('../koneksi/koneksi.php');

?>

<h3>TAMBAH DATA MAHASISWA</h3>
<br /><hr /><br />
<p>
<?php 
if (!isset($_POST['submit']))
 {
?>
    <form enctype="multipart/form-data" method="post">
    <table width="100%" border="0" id="boxtable">
    <tr class="odd">
     <td width="27%">NIM</td>
     <td width="4%">:</td>
     <td width="69%"><input type="text" name="nim" size="30" placeholder="NIM"/></td>
    </tr>
    <tr>
    <td>NAMA</td>
    <td>:</td>
    <td><input type="text" name="nama" size="30" placeholder="NAMA"/></td>
    </tr>
    <tr>
    <td>JENIS KELAMIN</td>
    <td>:</td>
    <td>
    <label>
     <input type="radio" name="jk" value="laki-laki" id="RadioGroup1_0"/>
     laki-laki
    </label>
    <label>
     <input type="radio" name="jk" value="perempuan" id="RadioGroup1_1"/>
     perempuan 
    </label>
    </td>
    </tr>
    <tr>
    <td height="50">JURUSAN</td>
    <td>:</td>
    <td><label>
    <select name="jurusan">
    <option value="">-=PILIH=-</option>
    <option value="Sistem Informasi">SISTEM INFORMASI</option>
    <option value="Teknik Informatika">TEKNIK INFORMATIKA</option>
    <option value="Teknik Komputer">TEKNIK KOMPUTER</option>
    </select>
    </label><br /></td>
    </tr>
    <tr>
    <td>PASSWORD</td>
    <td>:</td>
    <td><input type="text" name="password" size="30" placeholder="PASSWORD"/></td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td></td>
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
    $nim        =$_POST["nim"];
    $nama       =$_POST["nama"];
    $jk         =$_POST["jk"];
    $jurusan    =$_POST["jurusan"];
    $password   = md5 ($_POST["password"]);

    //input data mahsiswa
    $insertMhs ="INSERT INTO mahasiswa VALUE ( '$nim', '$nama', '$jk', '$jurusan','$password' )";

    $queryMhs = mysqli_query($koneksi, $insertMhs);

    if ($queryMhs){
     echo"<script> alert('Data Berhasil Diubah !') </script>";
     echo"<script type='text/javascript'>window.location ='./?adm=mahasiswa'</script>";
    }
    else {
        echo"<script>alert('Data gagal Diubah !')</script>";
        echo"<script type='text/javascript'>window.location ='./?adm=mahasiswa'</script>";
    }
}
?>
<a href="./?adm=mahasiswa">&raquo:KEMBALI </a>