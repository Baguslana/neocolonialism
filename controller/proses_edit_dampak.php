<?php
include "../connect.php";

$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";
$id_ekonomi = (isset($_POST['id_ekonomi'])) ? htmlentities($_POST['id_ekonomi']) : "";
$pendapatan_negara = (isset($_POST['pendapatan_negara'])) ? htmlentities($_POST['pendapatan_negara']) : "";
$persentase_gdp = (isset($_POST['persentase_gdp'])) ? htmlentities($_POST['persentase_gdp']) : "";
$investasi_asing = (isset($_POST['investasi_asing'])) ? htmlentities($_POST['investasi_asing']) : "";
$ketergantungan_ekonomi = (isset($_POST['ketergantungan_ekonomi'])) ? htmlentities($_POST['ketergantungan_ekonomi']) : "";
$nmnegara = (isset($_POST['nmnegara'])) ? htmlentities($_POST['nmnegara']) : "";

if (!empty(isset($_POST['input_dampak_validate']))) {
    $query = mysqli_query($con, "UPDATE ekonomi SET negara_id = '$id', pendapatan_negara = '$pendapatan_negara', persentase_gdp = '$persentase_gdp', investasi_asing = '$investasi_asing', ketergantungan_ekonomi = '$ketergantungan_ekonomi' WHERE id_ekonomi = '$id_ekonomi'");
    if ($query) {
        $massage = '
        <script>
        window.location = "../Ekonomi"; 
        alert("Data Dampak Ekonomi Negara ' . $nmnegara . '  Berhasil Diedit");
        </script>';
    } else {
        $massage = '
        <script>
        window.location = "../Ekonomi";
        alert("Data Dampak Ekonomi Negara ' . $nmnegara . '  Gagal Diedit");
        </scrip>
        ';
    }
}
echo $massage;
