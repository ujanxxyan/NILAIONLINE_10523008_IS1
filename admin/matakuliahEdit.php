<?php   
    include ('../koneksi/koneksi.php');

    $getkode = $_GET["kode_mtkul"];
    $editMhs = "SELECT * FROM matakuliah WHERE kode_mtkul = '$getkode'";
    $resultMhs = mysqli_query($koneksi, $editMhs);

    if ($resultMhs && mysqli_num_rows($resultMhs) > 0) {
        $dataMhs = mysqli_fetch_array($resultMhs);
    } else {
        echo "Data tidak ditemukan.";
        exit;
    }
?>

<h3>EDIT DATA MATAKULIAH</h3>
<br /> <hr /> <br />
<p>
<?php
if  (!isset($_POST['submit']))
{
?>

<form enctype="multipart/form-data" method="post">
    <table width="100%" border="0">
    <tr>
    <td width="27%">KODE MATAKULIAH</td>
    <td width="4%">:</td>
    <td width="69%"><input type="text" name="kode_mtkul" size="30" value="<?php echo $dataMhs[0] ?>"
    readonly="readonly"></td>
</tr>
<tr>
    <td>NAMA MATAKULIAH</td>
<td>:</td>
    <td><input name="nama_mtkul" type="text" id="nama_mtkul" size="30" value="<?php echo $dataMhs[1] ?>" /></td> </tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>
<input id="submit" name="submit" type="submit" value="UBAH"></td>
</tr>
</table>
</form>
<?php
}
    else
{
$kode    = $_POST["kode_mtkul"];
$nama    = $_POST["nama_mtkul"];
//Input Data Mahasiswa
$updateMhs ="UPDATE matakuliah SET  kode_mtkul='$kode' , nama_mtkul='$nama' WHERE kode_mtkul='$kode'";
$querymhs = mysqli_query($koneksi, $updateMhs);

if ($queryMhs)
{
    echo "<script> alert('Data Berhasil Diubah !' </script>";
    echo "<script type='text/javascript'>window.location='./?adm=matakuliah'</script>";
}else
{    echo "<script>alert('data gagal diubah !'</script>";
    echo "<script type='text/javascript'>window.location='./?adm=matakuliah'</script>";
}
}
?>
<a href="./?adm=matakuliah">&raquo:KEMBALI </a>