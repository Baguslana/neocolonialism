<?php
include "../connect.php";
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";
$perusahaan_asing = (isset($_POST['perusahaan_asing'])) ? htmlentities($_POST['perusahaan_asing']) : "";
$sumberdaya_utama = (isset($_POST['sumberdaya_utama'])) ? htmlentities($_POST['sumberdaya_utama']) : "";

if (!empty(isset($_POST['input_krisis_validate']))) {
    $query = mysqli_query($con, "DELETE FROM sumberdaya WHERE id = '$id'");
    if ($query) {
        $massage = '
        <script>window.location = "../SumberDaya"; 
        alert("Data Sumber Daya ' . $sumberdaya_utama . ' dikelola ' . $perusahaan_asing . ' Berhasil Dihapus");
        </script>';
    } else {
        $massage = '
        <script>
        window.location = "../SumberDaya";
        alert("Data Gagal Dihapus");
        </scrip>
        ';
    }
}
echo $massage;
