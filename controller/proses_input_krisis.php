<?php
include "connect.php";
$negara = (isset($_POST['negara'])) ? htmlentities($_POST['negara']) : "";
$sumberdaya_utama = (isset($_POST['sumberdaya_utama'])) ? htmlentities($_POST['sumberdaya_utama']) : "";
$perusahaan_asing = (isset($_POST['perusahaan_asing'])) ? htmlentities($_POST['perusahaan_asing']) : "";
$tahun_eksploitasi = (isset($_POST['tahun_eksploitasi'])) ? htmlentities($_POST['tahun_eksploitasi']) : "";

if (!empty(isset($_POST['input_krisis_validate']))) {
    $select = mysqli_query($con, "SELECT * FROM krisis_energi WHERE negara = '$negara' AND sumberdaya_utama = '$sumberdaya_utama' AND perusahaan_asing = '$perusahaan_asing' AND tahun_eksploitasi = '$tahun_eksploitasi'");
    if (mysqli_num_rows($select) > 0) {
        $massage = '
        <script>
        window.location = "KrisisEnergi";
        alert("Krisis Energi perusahaan_asing ' . $perusahaan_asing . ' sudah terdaftar");
        </script>
        ';
    } else {
        $query = mysqli_query($con, "INSERT INTO krisis_energi (negara,sumberdaya_utama,perusahaan_asing,tahun_eksploitasi,) VALUES ('$negara', '$sumberdaya_utama', '$perusahaan_asing', '$tahun_eksploitasi')");
        if ($query) {
            $massage = '
        <script>
        window.location = "KrisisEnergi";
        alert("Berhasil Menambahkan krisis energi perusahaan_asing ' . $perusahaan_asing . '");
        </script>
        ';
        } else {
            $massage = '
        <script>
        window.location = "KrisisEnergi";
        alert("Gagal insert data");
        </script>
        ';
        }
    }
}
echo $massage;
