<?php
include "../koneksi/koneksi.php";

$queryMhs   = "SELECT * FROM matakuliah";
$resultMhs  = mysqli_query ($koneksi, $queryMhs);
$countMhs   = mysqli_num_rows ($resultMhs);
mysqli_connect($host, $username, $password, $nama_db) or die ("koneksi mysql gagal!");
?>

<h3> DATA MATAKULIAH </h3>
<hr/><br />
<a href="./?adm=matakuliahAdd"><input name="add" type="submit" class="buttonadm" value="TAMBAH DATA MATAKULIAH"/></a>
<br>
<br>
<table border="1" id="boxtable">
    <tr class="odd">
        <th>KODE MATAKULIAH</th>
        <th>NAMA MATAKULIAH</th>
        <th>AKSI</th>
    </tr>
    <?php 
    if ($countMhs > 0){
        while ($dataMhs = mysqli_fetch_array($resultMhs, MYSQLI_NUM)) 
        {
        ?>
        <tr class="add">
        <td class="value"><?php echo"$dataMhs[0]"; ?> </td>
        <td class="value"><?php echo"$dataMhs[1]"; ?> </td>
        <td class="value">
            <a href="./?adm=matakuliahEdit&kode_mtkul=<?php echo"$dataMhs[0]"; ?> ">Edit</a>
            <a href="./?adm=matakuliahDelete&kode_mtkul=<?php echo"$dataMhs[0]"; ?> ">Hapus</a>
        </td>
        <tr>
        </tr>

        <?php 
        }
    }
    else {
        echo "<tr>
                <td colspan='9' align='center' height='20'>
                <div> Belum ada Data Mahasiswa</div></td>
                </tr>";
    }
   echo "</table>";
