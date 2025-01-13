<?php
include "../koneksi/koneksi.php";

$queryMhs = "
    SELECT dosen.nip, dosen.nama, dosen.kode_mtkul, matakuliah.nama_mtkul, dosen.password
    FROM dosen
    LEFT JOIN matakuliah ON dosen.kode_mtkul = matakuliah.kode_mtkul
";
$resultMhs = mysqli_query($koneksi, $queryMhs);
$countMhs = mysqli_num_rows($resultMhs);

?>

<h3>DATA DOSEN</h3>
<hr/><br />
<a href="./?adm=dosenAdd"><input name="add" type="submit" class="buttonadm" value="TAMBAH DATA DOSEN"/></a>
<br><br>
<table border="1" id="boxtable">
    <tr class="odd">
        <th>NIP</th>
        <th>NAMA</th>
        <th>KODE MATA KULIAH</th>
        <th>NAMA MATA KULIAH</th> 
        <th>PASSWORD</th>
        <th>AKSI</th>
    </tr>
    <?php 
    if ($countMhs > 0) {
        while ($dataMhs = mysqli_fetch_array($resultMhs, MYSQLI_ASSOC)) {
    ?>
        <tr class="add">
            <td class="value"><?php echo $dataMhs['nip']; ?></td>
            <td class="value"><?php echo $dataMhs['nama']; ?></td>
            <td class="value"><?php echo $dataMhs['kode_mtkul']; ?></td>
            <td class="value">
                <?php echo $dataMhs['nama_mtkul'] ? $dataMhs['nama_mtkul'] : '-'; ?> 
            </td>
            <td class="value"><?php echo $dataMhs['password']; ?></td>
            <td class="value">
                <a href="./?adm=dosenEdit&nip=<?php echo $dataMhs['nip']; ?>">Edit</a>
                <a href="./?adm=dosenDelete&nip=<?php echo $dataMhs['nip']; ?>">Hapus</a>
            </td>
        </tr>
    <?php 
        }
    } else {
        echo "<tr>
                <td colspan='6' align='center' height='20'>
                <div> Belum ada Data Dosen </div></td>
              </tr>";
    }
    ?>
</table>
