<?php
    include ('../koneksi/koneksi.php');

    $getNim = $_GET["nim"];
    $editMhs = "SELECT * FROM mahasiswa WHERE nim = '$getNim'";
    $resultMhs = mysqli_query($koneksi, $editMhs);

    if ($resultMhs && mysqli_num_rows($resultMhs) > 0) {
        $dataMhs = mysqli_fetch_array($resultMhs);
    } else {
        echo "Data tidak ditemukan.";
        exit;
    }
?>

<h3>UBAH DATA MAHASISWA</h3>
<br /> <hr /> <br />
<p>
<?php
if  (!isset($_POST['submit'])) {
?>

<form enctype="multipart/form-data" method="post">
    <table width="100%" border="0" id="boxtable">
    <tr class = "odd">
    <td width="27%">NIM</td>
    <td width="4%">:</td>
    <td width="69%"><input type="text" name="nim" size="30" value="<?php echo $dataMhs['nim']; ?>" readonly="readonly"></td>
</tr>
<tr>
    <td>NAMA</td>
    <td>:</td>
    <td><input name="nama" type="text" id="nama" size="30" value="<?php echo $dataMhs['nama']; ?>" /></td> 
</tr>
<tr>
    <td>JENIS KELAMIN</td>
    <td>:</td>
    <td>
        <label>
        <input type="radio" name="jk" value="Laki-Laki" <?php echo ($dataMhs['jk'] == 'Laki-Laki') ? 'checked' : ''; ?>> Laki-Laki
        </label>
        <label>
        <input type="radio" name="jk" value="Perempuan" <?php echo ($dataMhs['jk'] == 'Perempuan') ? 'checked' : ''; ?>> Perempuan
        </label>
    </td>
</tr>
<tr>
    <td height="50">JURUSAN</td>
    <td>:</td>
    <td>
        <select name="jurusan">
            <option value="<?php echo $dataMhs['jur']; ?>"><?php echo $dataMhs['jur']; ?></option>
            <option value="">--PILIH--</option>
            <option value="Sistem Informasi">SISTEM INFORMASI</option>
            <option value="Teknik Informatika">TEKNIK INFORMATIKA</option>
            <option value="Teknik Komputer">TEKNIK KOMPUTER</option>
        </select>
    </td>
</tr>
<tr>
    <td>PASSWORD</td>
    <td>:</td> 
    <td><input name="password" type="text" id="password" size="30" value=""></td>
</tr>
<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>
    <input id="submit" name="submit" type="submit" value="UBAH">
    </td>
</tr>
</table>
</form>

<?php
} else {
    $nim = $_POST["nim"];
    $nama = $_POST["nama"];
    $jurusan = $_POST["jurusan"];
    $jk = $_POST["jk"];
    $password = md5($_POST["password"]);

    // Update Data Mahasiswa
    $updateMhs = "UPDATE mahasiswa SET nama='$nama', jur='$jurusan', password='$password', jk='$jk' WHERE nim='$nim'";
    $queryMhs = mysqli_query($koneksi, $updateMhs);

    if ($queryMhs) {
        echo "<script>alert('Data Berhasil Diubah!');</script>";
        echo "<script type='text/javascript'>window.location='./?adm=mahasiswa';</script>";
    } else {
        echo "<script>alert('Data Gagal Diubah!');</script>";
        echo "<script type='text/javascript'>window.location='./?adm=mahasiswa';</script>";
    }
}
?>
<a href="./?adm=mahasiswa">&raquo; KEMBALI </a>
