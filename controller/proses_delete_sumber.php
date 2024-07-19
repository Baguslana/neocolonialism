<?php
include "../connect.php";

$id_sosial = (isset($_POST['id_sosial'])) ? htmlentities($_POST['id_sosial']) : "";
$nmnegara = (isset($_POST['nmnegara'])) ? htmlentities($_POST['nmnegara']) : "";
$kerusakan_lingkungan = (isset($_POST['kerusakan_lingkungan'])) ? htmlentities($_POST['kerusakan_lingkungan']) : "";
$tingkat_kemiskinan = (isset($_POST['tingkat_kemiskinan'])) ? htmlentities($_POST['tingkat_kemiskinan']) : "";

if (!empty(isset($_POST['input_sumber_validate']))) {
    $query = mysqli_query($con, "DELETE FROM sosiallingkungan WHERE id_sosial = '$id_sosial'");
    if ($query) {
        $massage = '
        <script>
        window.location = "../SosialLingkungan"; 
        alert("Data Dampak Sosial Lingkungan Negara ' . $nmnegara . ' dengan Penggusuran penduduk ' . $penggusuran_penduduk . ' dan Tingkat kemiskinan ' . $tingkat_kemiskinan . ' Berhasil Dihapus");
        </script>
        ';
    } else {
        $massage = '
        <script>
        window.location = "../SosialLingkungan"; 
        alert("Data Gagal Dihapus");
        </scrip>
        ';
    }
}
echo $massage;
