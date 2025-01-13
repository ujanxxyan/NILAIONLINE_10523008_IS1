<?php
include('../koneksi/koneksi.php');

$getNim = $_GET["nim"];
$editNilai = "SELECT * FROM nilai WHERE nim = '$getNim'";
$resultNilai = mysqli_query($koneksi, $editNilai);

if ($resultNilai && mysqli_num_rows($resultNilai) > 0) {
    $dataNilai = mysqli_fetch_array($resultNilai, MYSQLI_NUM);
} else {
    echo "Data nilai tidak ditemukan.";
    exit;
}

$editMhs = "SELECT * FROM mahasiswa WHERE nim = '$getNim'";
$resultMhs = mysqli_query($koneksi, $editMhs);

if ($resultMhs && mysqli_num_rows($resultMhs) > 0) {
    $dataMhs = mysqli_fetch_array($resultMhs, MYSQLI_NUM);
} else {
    echo "Data mahasiswa tidak ditemukan.";
    exit;
}
?>

<h3>EDIT DATA NILAI</h3>
<br /> <hr /> <br />
<p>
<?php
if (!isset($_POST['submit'])) {
?>
<form enctype="multipart/form-data" method="post">
    <table width="100%" border="0">
        <tr>
            <td width="27%">NIM</td>
            <td width="4%">:</td>
            <td width="69%"><input type="text" name="nim" size="30" value="<?php echo $dataNilai[3]; ?>" readonly="readonly"></td>
        </tr>
        <tr>
            <td>NAMA</td>
            <td>:</td>
            <td><input name="nama" type="text" id="nama" size="30" value="<?php echo $dataMhs[1]; ?>" readonly></td>
        </tr>
        <tr>
            <td height="50">Nama Dosen</td>
            <td>:</td>
            <td><input name="nip" type="text" id="nip" size="30" value="<?php echo $dataNilai[4]; ?>"></td>
        </tr>
        <tr>
            <td height="50">Nilai Tugas</td>
            <td>:</td>
            <td><input name="ni_tugas" type="text" id="ni_tugas" size="30" value="<?php echo $dataNilai[0]; ?>"></td>
        </tr>
        <tr>
            <td>Nilai UTS</td>
            <td>:</td>
            <td><input name="ni_uts" type="text" id="ni_uts" size="30" value="<?php echo $dataNilai[1]; ?>"></td>
        </tr>
        <tr>
            <td height="50">Nilai UAS</td>
            <td>:</td>
            <td><input name="ni_uas" type="text" id="ni_uas" size="30" value="<?php echo $dataNilai[2]; ?>"></td>
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
    $ntugas = $_POST["ni_tugas"];
    $nuts = $_POST["ni_uts"];
    $nuas = $_POST["ni_uas"];
    $dosen = $_POST["nip"];

    // Update data nilai
    $updateNilai = "UPDATE nilai SET nip='$dosen', ni_tugas='$ntugas', ni_uts='$nuts', ni_uas='$nuas' WHERE nim='$getNim'";
    $queryNilai = mysqli_query($koneksi, $updateNilai);

    if ($queryNilai) {
        echo "<script>alert('Data Berhasil Diubah!');</script>";
        echo "<script type='text/javascript'>window.location='./?adm=nilai';</script>";
    } else {
        echo "<script>alert('Data gagal diubah!');</script>";
        echo "<script type='text/javascript'>window.location='./?adm=nilai';</script>";
    }
}
?>
<a href="./?adm=nilai">&raquo; KEMBALI </a>
