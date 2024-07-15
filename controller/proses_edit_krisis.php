<?php
include "../connect.php";
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";
$negara = (isset($_POST['negara'])) ? htmlentities($_POST['negara']) : "";
$sumberdaya_utama = (isset($_POST['sumberdaya_utama'])) ? htmlentities($_POST['sumberdaya_utama']) : "";
$perusahaan_asing = (isset($_POST['perusahaan_asing'])) ? htmlentities($_POST['perusahaan_asing']) : "";
$tahun_eksploitasi = (isset($_POST['tahun_eksploitasi'])) ? htmlentities($_POST['tahun_eksploitasi']) : "";

if (!empty(isset($_POST['input_krisis_validate']))) {
    $query = mysqli_query($con, "UPDATE sumberdaya SET negara = '$negara', sumberdaya_utama = '$sumberdaya_utama', perusahaan_asing = '$perusahaan_asing', tahun_eksploitasi = '$tahun_eksploitasi' WHERE id = '$id'");
    if ($query) {
        $massage = '
        <script>
        window.location = "../SumberDaya";
        alert("Data Sumber Daya ' . $sumberdaya_utama . ' dikelola ' . $perusahaan_asing . ' Berhasil Diedit");
        </script>';
    } else {
        $massage = '
        <script>
        window.location = "../SumberDaya";
        alert("Data Sumber Daya ' . $sumberdaya_utama . ' dikelola ' . $perusahaan_asing . ' Gagal Diedit");
        </scrip>
        ';
    }
}
echo $massage;
