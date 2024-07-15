<?php
include "connect.php";
$id_krisis_energi = (isset($_POST['id_krisis_energi'])) ? htmlentities($_POST['id_krisis_energi']) : "";
$id_dampak_krisis = (isset($_POST['id_dampak_krisis'])) ? htmlentities($_POST['id_dampak_krisis']) : "";
$sektor = (isset($_POST['sektor'])) ? htmlentities($_POST['sektor']) : "";
$tingkat_keparahan = (isset($_POST['tingkat_keparahan'])) ? htmlentities($_POST['tingkat_keparahan']) : "";
$deskripsi = (isset($_POST['deskripsi'])) ? htmlentities($_POST['deskripsi']) : "";

if (!empty(isset($_POST['input_dampak_validate']))) {
    $query = mysqli_query($con, "UPDATE dampak_krisis SET sektor = '$sektor', tingkat_keparahan = '$tingkat_keparahan', deskripsi = '$deskripsi' WHERE id_dampak_krisis = '$id_dampak_krisis'");
    if ($query) {
        $massage = '<script>window.location = "DampakKrisis"; alert("Data Dampak Krisis Energi sektor ' . $sektor . ' Berhasil Diedit");</script>';
    } else {
        $massage = '
        <script>
        window.location = "DampakKrisis";
        alert("Data Dampak Krisis Energi sektor ' . $sektor . ' Gagal Diedit");
        </scrip>
        ';
    }
}
echo $massage;
