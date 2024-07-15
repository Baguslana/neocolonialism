<?php
include "connect.php";
$id_sumber_energi = (isset($_POST['id_sumber_energi'])) ? htmlentities($_POST['id_sumber_energi']) : "";
$sumber_energi = (isset($_POST['sumber_energi'])) ? htmlentities($_POST['sumber_energi']) : "";
$jenis_sumber = (isset($_POST['jenis_sumber'])) ? htmlentities($_POST['jenis_sumber']) : "";
$cadangan = (isset($_POST['cadangan'])) ? htmlentities($_POST['cadangan']) : "";
$konsumsi = (isset($_POST['konsumsi'])) ? htmlentities($_POST['konsumsi']) : "";

if (!empty(isset($_POST['input_sumber_validate']))) {
    $select = mysqli_query($con, "SELECT * FROM sumber_energi WHERE nama_sumber_energi = '$sumber_energi' AND id_sumber_energi != '$id_sumber_energi'");
    if (mysqli_num_rows($select) > 0) {
        $massage = '
        <script>
        window.location = "SumberEnergi";
        alert("Data Sumber Energi ' . $sumber_energi . ' sudah terdaftar");
        </script>
        ';
    } else {
        $query = mysqli_query($con, "UPDATE sumber_energi SET nama_sumber_energi = '$sumber_energi', jenis_sumber_energi = '$jenis_sumber', cadangan = '$cadangan', konsumsi = '$konsumsi' WHERE id_sumber_energi = '$id_sumber_energi'");
        if ($query) {
            $massage = '<script>window.location = "SumberEnergi"; alert("Data ' . $sumber_energi . ' Berhasil Diedit");</script>';
        } else {
            $massage = '
        <script>
        window.location = "SumberEnergi";
        alert("Data ' . $sumber_energi . ' Gagal Diedit");
        </scrip>
        ';
        }
    }
}
echo $massage;
