<?php 
include "../koneksi/koneksi.php";

// Query untuk menampilkan data nilai, termasuk dosen dan matakuliah
$queryNilai = "
    SELECT 
        m.nim, m.nama AS nama_mahasiswa, n.ni_tugas, n.ni_uts, n.ni_uas,
        (0.2 * n.ni_tugas) + (0.4 * n.ni_uts) + (0.4 * n.ni_uas) AS nilai_akhir,
        d.nip, d.nama AS nama_dosen,
        mk.nama_mtkul AS nama_matakuliah
    FROM nilai n
    LEFT JOIN mahasiswa m ON n.nim = m.nim
    LEFT JOIN dosen d ON d.nip = n.nip
    LEFT JOIN matakuliah mk ON d.kode_mtkul = mk.kode_mtkul
";
$resultNilai = mysqli_query($koneksi, $queryNilai);
$countNilai = mysqli_num_rows($resultNilai);
?>

<h3> DATA NILAI</h3>
<hr/> <br />
<a href="./?adm=nilaiAdd"><input name="Add" type="submit" class="buttonadm" value="TAMBAH DATA NILAI"/></a>
<br>
<br>

<table border="1" id="boxtable">
    <tr class="odd">
        <th>NIM</th>
        <th>Nama Mahasiswa</th>
        <th>Tugas</th>
        <th>UTS</th>
        <th>UAS</th>
        <th>Nilai Akhir</th>
        <th>Mata Kuliah</th>
        <th>Dosen</th>
        <th>Aksi</th>
    </tr>
<?php
if ($countNilai > 0) { 
    while ($dataNilai = mysqli_fetch_array($resultNilai, MYSQLI_NUM)) {
?>
<tr class="Add">
    <td class="value"><?php echo $dataNilai[0]; ?></td>
    <td class="value"><?php echo $dataNilai[1]; ?></td>
    <td class="value"><?php echo $dataNilai[2]; ?></td>
    <td class="value"><?php echo $dataNilai[3]; ?></td>
    <td class="value"><?php echo $dataNilai[4]; ?></td>
    <td class="value"><?php echo number_format($dataNilai[5], 2); ?></td>
    <td class="value"><?php echo $dataNilai[8]; ?></td> 
    <td class="value"><?php echo $dataNilai[7]; ?></td> 
    <td class="value">
        <a href="./?adm=nilaiEdit&nim=<?php echo $dataNilai[0]; ?>&nip=<?php echo $dataNilai[6]; ?>">Edit</a>
        <a href="./?adm=nilaiDelete&nim=<?php echo $dataNilai[0]; ?>&nip=<?php echo $dataNilai[6]; ?>">Hapus</a>
    </td>
</tr>
<?php
    }
} else {
    echo "<tr>
            <td colspan='9' align='center' height='20'>
            <div> Belum ada data mahasiswa</div>
          </td>
         </tr>";
}
?>
</table>
