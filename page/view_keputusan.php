<?php
include 'connect.php';
$query = mysqli_query($con, "SELECT * FROM  view_keputusan");
while ($data = mysqli_fetch_array($query)) {
    $view[] = $data;
}


if (empty($view)) {
    echo "Tidak ada data";
} else {
?>
    <div class="table-responsive">
        <table id="example" class="table table-striped table-hover table-sm align-middle">
            <thead class="align-middle">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col" class="text-nowrap">Negara</th>
                    <th scope="col" class="text-nowrap">Pendapatan Negara</th>
                    <th scope="col" class="text-nowrap">Ketergantungan Ekonomi</th>
                    <th scope="col" class="text-nowrap">Kerusakan Lingkungan</th>
                    <th scope="col" class="text-nowrap">Penggusuran Penduduk</th>
                    <th scope="col" class="text-nowrap">Konflik Sosial</th>
                    <th scope="col" class="text-nowrap">Tingkat Kemiskinan</th>
                    <th scope="col" class="text-nowrap">Keputusan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($view as $row) {
                ?>
                    <tr>
                        <th scope="row"><?= $no++ ?></th>
                        <td class="text-nowrap"><?= $row['negara'] ?></td>
                        <td><?= $row['pendapatan_negara'] ?></td>
                        <td><?= $row['ketergantungan_ekonomi'] ?></td>
                        <td><?= $row['kerusakan_lingkungan'] ?></td>
                        <td><?= $row['penggusuran_penduduk'] ?></td>
                        <td><?= $row['konflik_sosial'] ?></td>
                        <td><?= $row['tingkat_kemiskinan'] ?></td>
                        <td>
                            <?php if ($row['keputusan'] == "Krisis Besar") {
                            ?>
                                <span class="badge bg-danger">Krisis Besar</span>
                            <?php
                            } else if ($row['keputusan'] == "Krisis Sedang") {
                            ?>
                                <span class="badge bg-warning">Krisis Sedang</span>
                            <?php
                            } else if ($row['keputusan'] == "Krisis Kecil") {
                            ?>
                                <span class="badge bg-info">Krisis Kecil</span>
                            <?php
                            } else if ($row['keputusan'] == "Terkendali") {
                            ?>
                                <span class="badge bg-success">Terkendali</span>
                            <?php
                            }
                            ?>
                        </td>
                        <!-- <td><?= $row['keputusan'] ?></td> -->
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    <?php
}
    ?>
    </div>