<?php
include "../connect.php";

$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";
$id_sosial = (isset($_POST['id_sosial'])) ? htmlentities($_POST['id_sosial']) : "";
$kerusakan_lingkungan = (isset($_POST['kerusakan_lingkungan'])) ? htmlentities($_POST['kerusakan_lingkungan']) : "";
$penggusuran_penduduk = (isset($_POST['penggusuran_penduduk'])) ? htmlentities($_POST['penggusuran_penduduk']) : "";
$konflik_sosial = (isset($_POST['konflik_sosial'])) ? htmlentities($_POST['konflik_sosial']) : "";
$tingkat_kemiskinan = (isset($_POST['tingkat_kemiskinan'])) ? htmlentities($_POST['tingkat_kemiskinan']) : "";
$nmnegara = (isset($_POST['nmnegara'])) ? htmlentities($_POST['nmnegara']) : "";

if (!empty(isset($_POST['input_sumber_validate']))) {
    $query = mysqli_query($con, "UPDATE sosiallingkungan SET negara_id = '$id', kerusakan_lingkungan = '$kerusakan_lingkungan', penggusuran_penduduk = '$penggusuran_penduduk', konflik_sosial = '$konflik_sosial', tingkat_kemiskinan = '$tingkat_kemiskinan' WHERE id_sosial = '$id_sosial'");
    if ($query) {
        $massage = '
        <script>
        window.location = "../SosialLingkungan"; 
        alert("Data Dampak Sosial Lingkungan ' . $nmnegara . ' dengan Penggusuran penduduk ' . $penggusuran_penduduk . ' dan Tingkat kemiskinan ' . $tingkat_kemiskinan . ' Berhasil Diedit");
        </script>
        ';
    } else {
        $massage = '
        <script>
        window.location = "../SosialLingkungan";
        alert("Data Gagal Diedit");
        </scrip>
        ';
    }
}
echo $massage;
