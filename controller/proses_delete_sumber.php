<?php
include "connect.php";
$id_sumber_energi = (isset($_POST['id_sumber_energi'])) ? htmlentities($_POST['id_sumber_energi']) : "";
$nama_sumber = (isset($_POST['nama_sumber'])) ? htmlentities($_POST['nama_sumber']) : "";

if (!empty(isset($_POST['input_sumber_validate']))) {
    $query = mysqli_query($con, "DELETE FROM sumber_energi WHERE id_sumber_energi = '$id_sumber_energi'");
    if ($query) {
    $massage = '<script>window.location = "SumberEnergi"; alert("Data ' . $sumber_energi . ' Berhasil Dihapus");</script>';
    } else {
        $massage = '
        <script>
        window.location = "SumberEnergi";
        alert("Data Gagal Dihapus");
        </scrip>
        ';
    }
}
echo $massage;
?>