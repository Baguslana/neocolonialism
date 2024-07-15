<?php
include "connect.php";
$id_krisis_energi = (isset($_POST['id_krisis_energi'])) ? htmlentities($_POST['id_krisis_energi']) : "";
$penyebab = (isset($_POST['penyebab'])) ? htmlentities($_POST['penyebab']) : "";

if (!empty(isset($_POST['input_krisis_validate']))) {
    $query = mysqli_query($con, "DELETE FROM krisis_energi WHERE id_krisis_energi = '$id_krisis_energi'");
    if ($query) {
    $massage = '<script>window.location = "KrisisEnergi"; alert("Data Krisis Energi penyebab ' . $penyebab . ' Berhasil Dihapus");</script>';
    } else {
        $massage = '
        <script>
        window.location = "KrisisEnergi";
        alert("Data Gagal Dihapus");
        </scrip>
        ';
    }
}
echo $massage;
?>