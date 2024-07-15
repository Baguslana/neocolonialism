<?php
include 'connect.php';
$query = mysqli_query($con, "SELECT * FROM ekonomi LEFT JOIN sumberdaya ON sumberdaya.id = ekonomi.negara_id");
while ($data = mysqli_fetch_array($query)) {
    $krisis[] = $data;
}

$queryNegara = mysqli_query($con, "SELECT id, negara FROM sumberdaya");
?>

<!-- Modal Add Dampak-->
<div class="modal fade" id="addDampak" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered modal-fullscreen-sm-down">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Dampak Ekonomi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate action="controller/proses_input_dampak.php" method="POST">
                    <div class="form-floating mb-3">
                        <select class="form-select" name="negaraid" aria-label="Default select example" required>
                            <option value="" hidden selected>Pilih Negara</option>
                            <?php
                            foreach ($queryNegara as $value) {
                                echo '<option value="' . $value['id'] . '">' . $value['negara'] . '</option>';
                            }
                            ?>
                        </select>
                        <label for="floatingInput">Dampak Ekonomi</label>
                        <div class="invalid-feedback">
                            Pilih Sumber Energi.
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <div class="form-floating mb-3">
                                <input type="number" name="pendapatan_negara" class="form-control" id="floatingInput" placeholder="Your Name" required>
                                <label for="floatingInput">Pendapatan Negara</label>
                                <div class="invalid-feedback">
                                    Masukan Pendapatan Negara.
                                </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-floating mb-3">
                                <input type="number" name="persentase_gdp" class="form-control" id="floatingInput" placeholder="Your Name" required>
                                <label for="floatingInput">Persentase GDP</label>
                                <div class="invalid-feedback">
                                    Masukan Persentase GDP.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <div class="form-floating mb-3">
                                <input type="number" name="investasi_asing" class="form-control" id="floatingInput" placeholder="Your Name" required>
                                <label for="floatingInput">Investasi Asing</label>
                                <div class="invalid-feedback">
                                    Masukan Investasi Asing.
                                </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-floating mb-3">
                                <select class="form-select" name="ketergantungan_ekonomi" aria-label="Default select example">
                                    <option selected disabled hidden>Ketergantungan Ekonomi</option>
                                    <option value="Sangat Tinggi">Sangat Tinggi</option>
                                    <option value="Tinggi">Tinggi</option>
                                    <option value="Sedang">Sedang</option>
                                    <option value="Rendah">Rendah</option>
                                    <option value="Sangat Rendah">Sangat Rendah</option>
                                </select>
                                <label for="floatingInput">Ketergantungan Ekonomi</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="input_dampak_validate" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Add Dampak -->

<?php
if (empty($krisis)) {
    echo "Tidak ada data";
} else {
    foreach ($krisis as $row) {
?>
        <!-- Modal Edit Dampak-->
        <div class="modal fade" id="EditDampak<?= $row['id_ekonomi']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered modal-fullscreen-sm-down">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Dampak Ekonomi</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="needs-validation" novalidate action="controller/proses_edit_dampak.php" method="POST">
                            <input type="hidden" name="id_ekonomi" value="<?= $row['id_ekonomi']; ?>">
                            <input type="hidden" name="nmnegara" value="<?= $row['negara']; ?>">
                            <div class="form-floating mb-3">
                                <select class="form-select" name="id" aria-label="Default select example" required>
                                    <option value="" hidden selected>Pilih Negara</option>
                                    <?php
                                    foreach ($queryNegara as $value) {
                                        if ($row['id'] == $value['id']) {
                                            echo '<option value="' . $value['id'] . '" selected>' . $value['negara'] . '</option>';
                                        } else {
                                            echo '<option value="' . $value['id'] . '">' . $value['negara'] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                                <label for="floatingInput">Negara</label>
                                <div class="invalid-feedback">
                                    Pilih Negara.
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="pendapatan_negara" class="form-control" id="floatingInput" placeholder="Your Name" value="<?= $row['pendapatan_negara']; ?>" required">
                                        <label for="floatingInput">Pendapatan Negara</label>
                                        <div class="invalid-feedback">
                                            Masukan Pendapatan Negara.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="persentase_gdp" class="form-control" id="floatingInput" placeholder="Your Name" value="<?= $row['persentase_gdp']; ?>" required">
                                        <label for="floatingInput">Persentase GDP</label>
                                        <div class="invalid-feedback">
                                            Masukan Persentase GDP.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm">
                                    <div class="form-floating mb-3">
                                        <input type="number" name="investasi_asing" class="form-control" id="floatingInput" placeholder="Your Name" value="<?= $row['investasi_asing']; ?>" required>
                                        <label for="floatingInput">Investasi Asing</label>
                                        <div class="invalid-feedback">
                                            Masukan Investasi Asing.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" name="ketergantungan_ekonomi" aria-label="Default select example">
                                            <<option selected disabled hidden>Pilih Ketergantungan Ekonomi</option>
                                                <option value="Sangat Tinggi" <?= ($row['ketergantungan_ekonomi'] == 'Sangat Tinggi') ? 'selected' : ''; ?>>Sangat Tinggi</option>
                                                <option value="Tinggi" <?= ($row['ketergantungan_ekonomi'] == 'Tinggi') ? 'selected' : ''; ?>>Tinggi</option>
                                                <option value="Sedang" <?= ($row['ketergantungan_ekonomi'] == 'Sedang') ? 'selected' : ''; ?>>Sedang</option>
                                                <option value="Rendah" <?= ($row['ketergantungan_ekonomi'] == 'Rendah') ? 'selected' : ''; ?>>Rendah</option>
                                                <option value="Sangat Rendah" <?= ($row['ketergantungan_ekonomi'] == 'Sangat Rendah') ? 'selected' : ''; ?>>Sangat Rendah</option>
                                        </select>
                                        <label for="floatingInput">Ketergantungan Ekonomi</label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="input_dampak_validate" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Edit Dampak -->

        <!-- Modal Delete Dampak-->
        <div class="modal fade" id="DeleteDampak<?= $row['id_ekonomi']; ?>" tabindex=" -1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Dampak Ekonomi</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="needs-validation" novalidate action="controller/proses_delete_dampak.php" method="POST">
                            <input type="hidden" name="id_ekonomi" value="<?= $row['id_ekonomi']; ?>">
                            <input type="hidden" name="nmnegara" value="<?= $row['negara']; ?>">
                            <input type="hidden" name="persentase_gdp" value="<?= $row['persentase_gdp']; ?>">
                            <div class="col-lg-12 mb-3">
                                <div class="alert alert-light" role="alert">Apakah anda yakin ingin menghapus Data Ekonomi Negara <b><?= $row['negara']; ?></b> ?</div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" name="input_dampak_validate" class="btn btn-danger">Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Delete Dampak -->
    <?php
    }

    ?>
    <div class="table-responsive">
        <table id="example" class="table table-striped table-hover table-sm mt-2 align-middle">
            <thead class="align-middle">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col" class="text-nowrap">Negara</th>
                    <th scope="col" class="text-nowrap"> Pendapatan Negara</th>
                    <th scope="col" class="text-nowrap"> Persentase GDP</th>
                    <th scope="col" class="text-nowrap"> Investasi Asing</th>
                    <th scope="col" class="text-nowrap"> Ketergantungan Ekonomi</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($krisis as $row) {
                ?>
                    <tr>
                        <th scope="row"><?= $no++ ?></th>
                        <td><?= $row['negara'] ?></td>
                        <td><?= number_format($row['pendapatan_negara'], 0, ',', '.') ?></td>
                        <td><?= $row['persentase_gdp'] ?></td>
                        <td><?= number_format($row['investasi_asing'], 0, ',', '.') ?></td>
                        <td><?= $row['ketergantungan_ekonomi'] ?></td>
                        <td>
                            <div class="btn-group">
                                <a href"#" class="btn btn-primary btn-sm rounded" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#EditDampak<?php echo $row['id_ekonomi']; ?>"><i class="bi bi-pencil-square text-warning"></i> Edit</a></li>
                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#DeleteDampak<?php echo $row['id_ekonomi']; ?>"><i class="bi bi-trash3 text-danger"></i> Delete</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
<?php
}
?>
<div class="row mt-2">
    <div class="col-lg-12 col-md-12">
        <a data-bs-toggle="modal" data-bs-target="#addDampak" class="btn btn-sm btn-primary"><i class="bi bi-plus-circle"></i> Dampak Krisis</a>
    </div>
</div>