<?php
include "connect.php";
$id_krisis_energi = (isset($_POST['id_krisis_energi'])) ? htmlentities($_POST['id_krisis_energi']) : "";
$sektor = (isset($_POST['sektor'])) ? htmlentities($_POST['sektor']) : "";
$tingkat_keparahan = (isset($_POST['tingkat_keparahan'])) ? htmlentities($_POST['tingkat_keparahan']) : "";
$deskripsi = (isset($_POST['deskripsi'])) ? htmlentities($_POST['deskripsi']) : "";

if (!empty(isset($_POST['input_dampak_validate']))) {
    $select = mysqli_query($con, "SELECT * FROM dampak_krisis WHERE id_krisis_energi = '$id_krisis_energi' AND sektor = '$sektor' AND tingkat_keparahan = '$tingkat_keparahan'");
    if (mysqli_num_rows($select) > 0) {
        $massage = '
        <script>
        window.location = "DampakKrisis";
        alert("Dampak Krisis Energi sektor ' . $sektor . ' sudah terdaftar");
        </script>
        ';
    } else {
        $query = mysqli_query($con, "INSERT INTO dampak_krisis (id_krisis_energi,sektor,tingkat_keparahan,deskripsi) VALUES ('$id_krisis_energi', '$sektor', '$tingkat_keparahan', '$deskripsi')");
        if ($query) {
            $massage = '
        <script>
        window.location = "DampakKrisis";
        alert("Berhasil Menambahkan Dampak Krisis Energi sektor ' . $sektor . '");
        </script>
        ';
        } else {
            $massage = '
        <script>
        window.location = "DampakKrisis";
        alert("Gagal insert data");
        </script>
        ';
        }
    }
}
echo $massage;
