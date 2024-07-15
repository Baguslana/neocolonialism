<?php
include "connect.php";
$id_krisis_energi = (isset($_POST['id_krisis_energi'])) ? htmlentities($_POST['id_krisis_energi']) : "";
$tanggal_mulai = (isset($_POST['tanggal_mulai'])) ? htmlentities($_POST['tanggal_mulai']) : "";
$tanggal_selesai = (isset($_POST['tanggal_selesai'])) ? htmlentities($_POST['tanggal_selesai']) : "";
$penyebab = (isset($_POST['penyebab'])) ? htmlentities($_POST['penyebab']) : "";
$dampak = (isset($_POST['dampak'])) ? htmlentities($_POST['dampak']) : "";
$id_sumber_energi = (isset($_POST['id_sumber_energi'])) ? htmlentities($_POST['id_sumber_energi']) : "";

if (!empty(isset($_POST['input_krisis_validate']))) {
    $query = mysqli_query($con, "UPDATE krisis_energi SET tanggal_mulai = '$tanggal_mulai', tanggal_selesai = '$tanggal_selesai', penyebab = '$penyebab', dampak = '$dampak' WHERE id_krisis_energi = '$id_krisis_energi'");
    if ($query) {
        $massage = '<script>window.location = "KrisisEnergi"; alert("Data Krisis Energi penyebab ' . $penyebab . ' Berhasil Diedit");</script>';
    } else {
        $massage = '
        <script>
        window.location = "KrisisEnergi";
        alert("Data ' . $penyebab . ' Gagal Diedit");
        </scrip>
        ';
    }
}
echo $massage;
