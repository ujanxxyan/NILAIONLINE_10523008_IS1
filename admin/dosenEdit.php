<?php   
    include ('../koneksi/koneksi.php');

    $getNip = $_GET["nip"];
    $editMhs = "SELECT * FROM dosen WHERE nip = '$getNip'";
    $resultMhs = mysqli_query($koneksi, $editMhs);

    if ($resultMhs && mysqli_num_rows($resultMhs) > 0) {
        $dataMhs = mysqli_fetch_array($resultMhs);
    } else {
        echo "Data tidak ditemukan.";
        exit;
    }
?>

<h3>TAMBAH DATA DOSEN</h3>
<br /> <hr /> <br />
<p>
<?php
if  (!isset($_POST['submit']))
{
?>

<form enctype="multipart/form-data" method="post">
    <table width="100%" border="0">
    <tr>
    <td width="27%">NIP</td>
    <td width="4%">:</td>
    <td width="69%"><input type="text" name="nip" size="30" value="<?php echo $dataMhs[0] ?>"
    readonly="readonly"></td>
</tr>
<tr>
    <td>NAMA</td>
<td>:</td>
    <td><input name="nama" type="text" id="nama" size="30" value="<?php echo $dataMhs[1] ?>" /></td> </tr>
<tr>
    <td>KODE MATA KULIAH</td>
<td>:</td>
    <td><input name="kode_mtkul" type="text" id="kode_mtkul" size="30" value="<?php echo $dataMhs[2] ?>" /></td> </tr>
</td>
</tr>
</tr>
<tr>
<td>PASSWORD</td>
<td>:</td> 
<td><input name="password" type="text" id="password" size="30" value="<?php echo $dataMhs[3] ?>"></td>
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
<input id="submit" name="submit" type="submit" value="UBAH"></td>
</tr>
</table>
</form>
<?php
}
    else
{
$nip    = $_POST["nip"];
$nama   = $_POST["nama"];
$kode   = $_POST["kode_mtkul"];
$password = md5($_POST["password"]);

$updateMhs ="UPDATE dosen SET nama='$nama', kode_mtkul='$kode', password='$password'  WHERE nip='$nip'";
$querymhs = mysqli_query($koneksi, $updateMhs);

if ($queryMhs)
{
    echo "<script> alert('Data Berhasil Diubah !' </script>";
    echo "<script type='text/javascript'>window.location='./?adm=dosen'</script>";
}else
{    echo "<script>alert('data gagal diubah !'</script>";
    echo "<script type='text/javascript'>window.location='./?adm=dosen'</script>";
}
}
?>
<a href="./?adm=dosen">&raquo:KEMBALI </a>