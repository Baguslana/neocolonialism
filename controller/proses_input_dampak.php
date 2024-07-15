<?php
include "../connect.php";

$negaraid = (isset($_POST['negaraid'])) ? htmlentities($_POST['negaraid']) : "";
$pendapatan_negara = (isset($_POST['pendapatan_negara'])) ? htmlentities($_POST['pendapatan_negara']) : "";
$persentase_gdp = (isset($_POST['persentase_gdp'])) ? htmlentities($_POST['persentase_gdp']) : "";
$investasi_asing = (isset($_POST['investasi_asing'])) ? htmlentities($_POST['investasi_asing']) : "";
$ketergantungan_ekonomi = (isset($_POST['ketergantungan_ekonomi'])) ? htmlentities($_POST['ketergantungan_ekonomi']) : "";
$negara = ""; // Inisialisasi variabel negara

if (!empty(isset($_POST['input_dampak_validate']))) {
    // Ambil nama negara berdasarkan negara_id
    $queryNegara = mysqli_query($con, "SELECT negara FROM sumberdaya WHERE id = '$negaraid'");
    if ($queryNegara) {
        $resultNegara = mysqli_fetch_assoc($queryNegara);
        $negara = $resultNegara['negara'];
    }

    $select = mysqli_query($con, "SELECT * FROM ekonomi WHERE negara_id = '$negaraid' AND pendapatan_negara = '$pendapatan_negara' AND persentase_gdp = '$persentase_gdp' AND investasi_asing = '$investasi_asing'");
    if (mysqli_num_rows($select) > 0) {
        $message = '
        <script>
        window.location = "../Ekonomi";
        alert("Data Ekonomi Negara ' . $negara . ' dengan GDP %' . $persentase_gdp . ' sudah terdaftar");
        </script>
        ';
    } else {
        $query = mysqli_query($con, "INSERT INTO ekonomi (negara_id, pendapatan_negara, persentase_gdp, investasi_asing, ketergantungan_ekonomi) VALUES ('$negaraid', '$pendapatan_negara', '$persentase_gdp', '$investasi_asing', '$ketergantungan_ekonomi')");
        if ($query) {
            $message = '
        <script>
        window.location = "../Ekonomi";
        alert("Berhasil Menambahkan Data Ekonomi Negara ' . $negara . ' dengan GDP %' . $persentase_gdp . '");
        </script>
        ';
        } else {
            $message = '
        <script>
        window.location = "../Ekonomi";
        alert("Gagal insert data");
        </script>
        ';
        }
    }
}
echo $message;
