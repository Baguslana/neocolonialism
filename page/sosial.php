<?php
include 'connect.php';
$query = mysqli_query($con, "SELECT * FROM sosiallingkungan LEFT JOIN sumberdaya ON sumberdaya.id = sosiallingkungan.negara_id");
while ($data = mysqli_fetch_array($query)) {
    $krisis[] = $data;
}

$queryNegara = mysqli_query($con, "SELECT id, negara FROM sumberdaya");
?>

<!-- Modal Add Sumber-->
<div class="modal fade" id="addSumber" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered modal-fullscreen-sm-down">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Dampak Sosial Lingkungan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate action="controller/proses_input_sumber.php" method="POST">
                    <div class="form-floating mb-3">
                        <select class="form-select" name="negaraid" aria-label="Default select example" required>
                            <option value="" hidden selected>Pilih Negara</option>
                            <?php
                            foreach ($queryNegara as $value) {
                                echo '<option value="' . $value['id'] . '">' . $value['negara'] . '</option>';
                            }
                            ?>
                        </select>
                        <label for="floatingInput">Dampak Sosial Lingkungan</label>
                        <div class="invalid-feedback">
                            Pilih Negara.
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <div class="form-floating mb-3">
                                <select class="form-select" name="kerusakan_lingkungan" aria-label="Default select example" required>
                                    <option value="" selected disabled hidden>Kerusakan Lingkungan</option>
                                    <option value="Sangat Tinggi">Sangat Tinggi</option>
                                    <option value="Tinggi">Tinggi</option>
                                    <option value="Sedang">Sedang</option>
                                    <option value="Rendah">Rendah</option>
                                    <option value="Sangat Rendah">Sangat Rendah</option>
                                </select>
                                <label for="floatingInput">Kerusakan Lingkungan</label>
                                <div class="invalid-feedback">
                                    Pilih Kerusakan Lingkungan.
                                </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-floating mb-3">
                                <input type="number" name="penggusuran_penduduk" class="form-control" id="floatingInput" placeholder="Your Name" required>
                                <label for="floatingInput">Penggusuran Penduduk</label>
                                <div class="invalid-feedback">
                                    Masukan Penggusuran Penduduk.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <div class="form-floating mb-3">
                                <select class="form-select" name="konflik_sosial" aria-label="Default select example" required>
                                    <option value="" selected disabled hidden>Konflik Sosial</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                                <label for="floatingInput">Konflik Sosial</label>
                                <div class="invalid-feedback">
                                    Pilih Konflik Sosial.
                                </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-floating mb-3">
                                <input type="number" name="tingkat_kemiskinan" class="form-control" id="floatingInput" placeholder="Your Name" required>
                                <label for="floatingInput">Tingkat Kemiskinan</label>
                                <div class="invalid-feedback">
                                    Masukan Tingkat Kemiskinan.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="input_warga_validate" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Add Sumber -->

<?php
if (empty($krisis)) {
    echo "Tidak ada data";
} else {
    foreach ($krisis as $row) {
?>

        <!-- Modal Edit Sumber-->
        <div class="modal fade" id="EditSumber<?= $row['id_sosial']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered modal-fullscreen-sm-down">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Dampak Sosial Lingkungan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="needs-validation" novalidate action="controller/proses_edit_sumber.php" method="POST">
                            <input type="hidden" name="id_sosial" value="<?= $row['id_sosial']; ?>">
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
                                        <select class="form-select" name="kerusakan_lingkungan" aria-label="Default select example" required>
                                            <option selected disabled hidden>Pilih Kerusakan Lingkungan</option>
                                            <option value="Sangat Tinggi" <?= ($row['kerusakan_lingkungan'] == 'Sangat Tinggi') ? 'selected' : ''; ?>>Sangat Tinggi</option>
                                            <option value="Tinggi" <?= ($row['kerusakan_lingkungan'] == 'Tinggi') ? 'selected' : ''; ?>>Tinggi</option>
                                            <option value="Sedang" <?= ($row['kerusakan_lingkungan'] == 'Sedang') ? 'selected' : ''; ?>>Sedang</option>
                                            <option value="Rendah" <?= ($row['kerusakan_lingkungan'] == 'Rendah') ? 'selected' : ''; ?>>Rendah</option>
                                            <option value="Sangat Rendah" <?= ($row['kerusakan_lingkungan'] == 'Sangat Rendah') ? 'selected' : ''; ?>>Sangat Rendah</option>
                                        </select>
                                        <label for="floatingInput">Kerusakan Lingkungan</label>
                                        <div class="invalid-feedback">
                                            Pilih Kerusakan Lingkungan.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="form-floating mb-3">
                                        <input type="number" name="penggusuran_penduduk" class="form-control" id="floatingInput" placeholder="Your Name" value="<?= $row['penggusuran_penduduk']; ?>" required>
                                        <label for="floatingInput">Penggusuran Penduduk</label>
                                        <div class="invalid-feedback">
                                            Masukan Penggusuran Penduduk.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" name="konflik_sosial" aria-label="Default select example" required>
                                            <option selected disabled hidden>Konflik Sosial</option>
                                            <option value="Ya" <?= ($row['konflik_sosial'] == 'Ya') ? 'selected' : ''; ?>>Ya</option>
                                            <option value="Tidak" <?= ($row['konflik_sosial'] == 'Tidak') ? 'selected' : ''; ?>>Tidak</option>
                                        </select>
                                        <label for="floatingInput">Konflik Sosial</label>
                                        <div class="invalid-feedback">
                                            Pilih Konflik Sosial.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="form-floating mb-3">
                                        <input type="number" name="tingkat_kemiskinan" class="form-control" id="floatingInput" placeholder="Your Name" value="<?= $row['tingkat_kemiskinan']; ?>" required>
                                        <label for="floatingInput">Tingkat Kemiskinan</label>
                                        <div class="invalid-feedback">
                                            Masukan Tingkat Kemiskinan.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="input_sumber_validate" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Edit sumber -->

        <!-- Modal Delete Warga-->
        <div class="modal fade" id="DeleteSumber<?= $row['id_sosial']; ?>" tabindex=" -1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Sumber Daya</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="needs-validation" novalidate action="controller/proses_delete_sumber.php" method="POST">
                            <input type="hidden" name="id_sosial" value="<?= $row['id_sosial']; ?>">
                            <input type="hidden" name="nmnegara" value="<?= $row['negara']; ?>">
                            <input type="hidden" name="kerusakan_lingkungan" value="<?= $row['kerusakan_lingkungan']; ?>">
                            <input type="hidden" name="tingkat_kemiskinan" value="<?= $row['tingkat_kemiskinan']; ?>">
                            <div class="col-lg-12 mb-3">
                                <div class="alert alert-light" role="alert">Apakah anda yakin ingin menghapus Data Sumber Energi <b><?= $row['negara']; ?></b> ?</div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" name="input_sumber_validate" class="btn btn-danger">Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Delete Warga -->

    <?php
    }
    ?>
    <div class="table-responsive">
        <table id="example" class="table table-striped table-hover table-sm mt-2 align-middle">
            <thead class="align-middle">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col" class="text-nowrap">Negara</th>
                    <th scope="col" class="text-nowrap"> Kerusakan Lingkungan</th>
                    <th scope="col" class="text-nowrap"> Penggusuran Penduduk</th>
                    <th scope="col" class="text-nowrap"> Konflik Sosial</th>
                    <th scope="col" class="text-nowrap"> Tingkat Kemiskinan</th>
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
                        <td><?= $row['kerusakan_lingkungan'] ?></td>
                        <td><?= number_format($row['penggusuran_penduduk'], 0, ',', '.') ?></td>
                        <td><?= $row['konflik_sosial'] ?></td>
                        <td><?= number_format($row['tingkat_kemiskinan'], 0, ',', '.') ?></td>
                        <td>
                            <div class="btn-group">
                                <a href"#" class="btn btn-primary btn-sm rounded" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#EditSumber<?php echo $row['id_sosial']; ?>"><i class="bi bi-pencil-square text-warning"></i> Edit</a></li>
                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#DeleteSumber<?php echo $row['id_sosial']; ?>"><i class="bi bi-trash3 text-danger"></i> Delete</a></li>
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
        <a data-bs-toggle="modal" data-bs-target="#addSumber" class="btn btn-primary btn-sm me-1"><i class="bi bi-plus-circle"></i> Sumber Energi</a>
    </div>
</div>