<?php
include "../connect.php";

$id_ekonomi = (isset($_POST['id_ekonomi'])) ? htmlentities($_POST['id_ekonomi']) : "";
$nmnegara = (isset($_POST['nmnegara'])) ? htmlentities($_POST['nmnegara']) : "";

if (!empty(isset($_POST['input_dampak_validate']))) {
    $query = mysqli_query($con, "DELETE FROM ekonomi WHERE id_ekonomi = '$id_ekonomi'");
    if ($query) {
        $massage = '
        <script>
        window.location = "../Ekonomi";
        alert("Data Dampak Ekonomi Negara ' . $nmnegara . ' Berhasil Dihapus")
        ;</script>';
    } else {
        $massage = '
        <script>
        window.location = "../Ekonomi";
        alert("Data Gagal Dihapus");
        </scrip>
        ';
    }
}
echo $massage;
