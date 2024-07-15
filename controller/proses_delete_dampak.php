<?php
include "connect.php";
$id_dampak_krisis = (isset($_POST['id_dampak_krisis'])) ? htmlentities($_POST['id_dampak_krisis']) : "";
$sektor = (isset($_POST['sektor'])) ? htmlentities($_POST['sektor']) : "";

if (!empty(isset($_POST['input_dampak_validate']))) {
    $query = mysqli_query($con, "DELETE FROM dampak_krisis WHERE id_dampak_krisis = '$id_dampak_krisis'");
    if ($query) {
    $massage = '<script>window.location = "DampakKrisis"; alert("Data Dampak Krisis Energi Sektor ' . $sektor . ' Berhasil Dihapus");</script>';
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