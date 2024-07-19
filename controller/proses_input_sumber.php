<?php
include "../connect.php";

$negaraid = (isset($_POST['negaraid'])) ? htmlentities($_POST['negaraid']) : "";
$kerusakan_lingkungan = (isset($_POST['kerusakan_lingkungan'])) ? htmlentities($_POST['kerusakan_lingkungan']) : "";
$penggusuran_penduduk = (isset($_POST['penggusuran_penduduk'])) ? htmlentities($_POST['penggusuran_penduduk']) : "";
$konflik_sosial = (isset($_POST['konflik_sosial'])) ? htmlentities($_POST['konflik_sosial']) : "";
$tingkat_kemiskinan = (isset($_POST['tingkat_kemiskinan'])) ? htmlentities($_POST['tingkat_kemiskinan']) : "";
$negara = ""; // Inisialisasi variabel negara

if (!empty(isset($_POST['input_warga_validate']))) {
    $queryNegara = mysqli_query($con, "SELECT negara FROM sumberdaya WHERE id = '$negaraid'");
    if ($queryNegara) {
        $resultNegara = mysqli_fetch_assoc($queryNegara);
        $negara = $resultNegara['negara'];
    }

    $select = mysqli_query($con, "SELECT * FROM sosiallingkungan WHERE negara_id = '$negaraid' AND tingkat_kemiskinan = '$tingkat_kemiskinan' AND penggusuran_penduduk = '$penggusuran_penduduk'");
    if (mysqli_num_rows($select) > 0) {
        $massage = '
        <script>
        window.location = "../SosialLingkungan";
        alert("Data Sosial Lingkungan Negara ' . $negara . ' dengan Penggusuran penduduk ' . $penggusuran_penduduk . ' dan Tingkat kemiskinan ' . $tingkat_kemiskinan . ' sudah terdaftar");
        </script>
        ';
    } else {
        $query = mysqli_query($con, "INSERT INTO sosiallingkungan (negara_id, kerusakan_lingkungan,penggusuran_penduduk, konflik_sosial,tingkat_kemiskinan) VALUES ('$negaraid', '$kerusakan_lingkungan', '$penggusuran_penduduk', '$konflik_sosial', '$tingkat_kemiskinan')");
        if ($query) {
            $massage = '
        <script>
        window.location = "../SosialLingkungan";
        alert("Berhasil Menambahkan Data Sosial Lingkungan Negara ' . $negara . ' dengan Penggusuran penduduk ' . $penggusuran_penduduk . ' dan Tingkat kemiskinan ' . $tingkat_kemiskinan . '");
        </script>
        ';
        } else {
            $massage = '
        <script>
        window.location = "../SosialLingkungan";
        alert("Gagal menambah data");
        </script>
        ';
        }
    }
}
echo $massage;
