<?php
include ('../koneksi/koneksi.php');

?>

<h3>TAMBAH DATA DOSEN</h3>
<br /><hr /><br />
<p>
<?php 
if (!isset($_POST['submit']))
 {
?>
    <form enctype="multipart/form-data" method="post">
    <table width="100%" border="0">
    <tr>
     <td width="27%">NIP</td>
     <td width="4%">:</td>
     <td width="69%"><input type="text" name="nip" size="30" placeholder="NIP"/></td>
    </tr>
    <tr>
    <td>NAMA DOSEN</td>
    <td>:</td>
    <td><input type="text" name="nama" size="30" placeholder="NAMA DOSEN"/></td>
    </tr>
    <tr>
    <td>KODE MATAKULIAH</td>
    <td>:</td>
    <td>
    <label>
    <label>
            <select name="kode_mtkul" class='form-control'>
            <option value="">-=PILIH=-</option>
            <?php
            $queryMhs   = "SELECT kode_mtkul FROM matakuliah";
            $resultmhs  = mysqli_query ($koneksi, $queryMhs);
            while ($datamhs = mysqli_fetch_array($resultmhs, MYSQLI_NUM)){
                echo  "<option value = '$datamhs[0]'> $datamhs[1]</option>";
            }
            ?>
            </select>
        </label>
    </td>
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
    $nip        =$_POST["nip"];
    $nama       =$_POST["nama"];
    $kode       =$_POST["kode_mtkul"];
    $password   = md5 ($_POST["password"]);

    //input data mahsiswa
    $insertdos ="INSERT INTO dosen VALUE ( '$nip', '$nama', '$kode','$password')";
    $querydos = mysqli_query($koneksi, $insertdos);

    if ($querydos){
     echo"<script> alert('Data Berhasil Ditambah !') </script>";
     echo"<script type='text/javascript'>window.location ='./?adm=dosen'</script>";
    }
    else {
        echo"<script>alert('Data gagal Ditambah !')</script>";
        echo"<script type='text/javascript'>window.location ='./?adm=dosen'</script>";
    }
}
?>
<a href="./?adm=dosen">&raquo:KEMBALI </a>