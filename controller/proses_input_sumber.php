<?php
include "connect.php";
$sumber_energi = (isset($_POST['sumber_energi'])) ? htmlentities($_POST['sumber_energi']) : "";
$jenis_sumber = (isset($_POST['jenis_sumber'])) ? htmlentities($_POST['jenis_sumber']) : "";
$cadangan = (isset($_POST['cadangan'])) ? htmlentities($_POST['cadangan']) : "";
$konsumsi = (isset($_POST['konsumsi'])) ? htmlentities($_POST['konsumsi']) : "";

if (!empty(isset($_POST['input_warga_validate']))) {
    $select = mysqli_query($con, "SELECT * FROM sumber_energi WHERE nama_sumber_energi = '$sumber_energi' AND jenis_sumber_energi = '$jenis_sumber'");
    if (mysqli_num_rows($select) > 0) {
        $massage = '
        <script>
        window.location = "SumberEnergi";
        alert("Sumber Energi '. $sumber_energi .' sudah terdaftar");
        </script>
        ';
    } else {
        $query = mysqli_query($con, "INSERT INTO sumber_energi (nama_sumber_energi, jenis_sumber_energi,cadangan,konsumsi) VALUES ('$sumber_energi', '$jenis_sumber', '$cadangan', '$konsumsi')");
        if ($query) {
            $massage = '
        <script>
        window.location = "SumberEnergi";
        alert("Berhasil Menambahkan '. $sumber_energi .'");
        </script>
        ';
        } else {
            $massage = '
        <script>
        window.location = "SumberEnergi";
        alert("Gagal insert data");
        </script>
        ';
        }
    }
}
echo $massage;