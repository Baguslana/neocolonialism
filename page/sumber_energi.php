<?php
include 'connect.php';
$query = mysqli_query($con, "SELECT * FROM sumber_energi");
while ($data = mysqli_fetch_array($query)) {
    $krisis[] = $data;
}
?>

<!-- Modal Add Sumber-->
<div class="modal fade" id="addSumber" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered modal-fullscreen-sm-down">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Sumber Energi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate action="proses_input_sumber.php" method="POST">
                    <div class="form-floating mb-3">
                        <input type="text" name="sumber_energi" class="form-control" id="floatingInput" placeholder="Your Name" required>
                        <label for="floatingInput">Sumber Energi</label>
                        <div class="invalid-feedback">
                            Masukan Sumber Energi.
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" name="jenis_sumber" aria-label="Default select example" required>
                            <option selected hidden value="">Pilih Jenis Sumber Energi</option>
                            <option value="Fosil">Fosil</option>
                            <option value="Terbarukan">Terbarukan</option>
                            <option value="Non-Terbarukan">Non-Terbarukan</option>
                        </select>
                        <label for="floatingInput">Jenis Sumber Energi</label>
                        <div class="invalid-feedback">
                            Masukan Jenis Sumber Energi.
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="Your Name" name="cadangan" required>
                                <label for="floatingInput">Banyak Cadangan</label>
                                <div class="invalid-feedback">
                                    Masukan Banyak Cadangan.
                                </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="Your Name" name="konsumsi" required>
                                <label for="floatingInput">Banyak Konsumsi</label>
                                <div class="invalid-feedback">
                                    Masukan Banyak Konsumsi.
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
        <div class="modal fade" id="EditSumber<?= $row['id_sumber_energi']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered modal-fullscreen-sm-down">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Sumber Energi</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="needs-validation" novalidate action="proses_edit_sumber.php" method="POST">
                            <input type="hidden" name="id_sumber_energi" value="<?= $row['id_sumber_energi']; ?>">
                            <div class="form-floating mb-3">
                                <input type="text" name="sumber_energi" class="form-control" id="floatingInput" value="<?= $row['nama_sumber_energi']; ?>">
                                <label for="floatingInput">Sumber Energi</label>
                                <div class="invalid-feedback">
                                    Masukan Sumber Energi.
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" name="jenis_sumber" aria-label="Default select example">
                                    <option value="" hidden selected>Pilih Jenis Sumber Energi</option>
                                    <?php
                                    if ($row['jenis_sumber_energi'] == 'Fosil') {
                                        echo '<option value="Fosil" selected>Fosil</option>';
                                        echo '<option value="Terbarukan">Terbarukan</option>';
                                        echo '<option value="Non-Terbarukan">Non-Terbarukan</option>';
                                    } else if ($row['jenis_sumber_energi'] == 'Terbarukan') {
                                        echo '<option value="Fosil">Fosil</option>';
                                        echo '<option value="Terbarukan" selected>Terbarukan</option>';
                                        echo '<option value="Non-Terbarukan">Non-Terbarukan</option>';
                                    } else if ($row['jenis_sumber_energi'] == 'Non-Terbarukan') {
                                        echo '<option value="Fosil">Fosil</option>';
                                        echo '<option value="Terbarukan">Terbarukan</option>';
                                        echo '<option value="Non-Terbarukan" selected>Non-Terbarukan</option>';
                                    }
                                    ?>
                                </select>
                                <label for="floatingInput">Jenis Sumber Energi</label>
                                <div class="invalid-feedback">
                                    Masukan Jenis Sumber Energi.
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" value="<?= $row['cadangan']; ?>" name="cadangan">
                                        <label for="floatingInput">Banyak Cadangan</label>
                                        <div class="invalid-feedback">
                                            Masukan Banyak Cadangan.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="col-sm">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" value="<?= $row['konsumsi']; ?>" name="konsumsi">
                                            <label for="floatingInput">Banyak Cadangan</label>
                                            <div class="invalid-feedback">
                                                Masukan Banyak Cadangan.
                                            </div>
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
        <div class="modal fade" id="DeleteSumber<?= $row['id_sumber_energi']; ?>" tabindex=" -1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Sumber Daya</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="needs-validation" novalidate action="proses_delete_sumber.php" method="POST">
                            <input type="hidden" name="id_sumber_energi" value="<?= $row['id_sumber_energi']; ?>">
                            <input type="hidden" name="sumber_energi" value="<?= $row['nama_sumber_energi']; ?>">
                            <div class="col-lg-12 mb-3">
                                <div class="alert alert-light" role="alert">Apakah anda yakin ingin menghapus Data Sumber Energi <b><?= $row['nama_sumber_energi']; ?></b> ?</div>
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
                    <th scope="col" class="text-nowrap">Sumber Energi</th>
                    <th scope="col" class="text-nowrap">Jenis Sumber Energi</th>
                    <th scope="col">Cadangan</th>
                    <th scope="col">Konsumsi</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($krisis as $row) {
                ?>
                    <tr>
                        <th scope="row"><?= $no++ ?></th>
                        <td><?= $row['nama_sumber_energi'] ?></td>
                        <td><?= $row['jenis_sumber_energi'] ?></td>
                        <td>
                            <?php if ($row['cadangan'] == 0) {
                                echo "Tidak Terbatas";
                            } else {
                                echo number_format($row['cadangan'], 0, ',', '.');
                            } ?>
                        </td>
                        <td><?= number_format($row['konsumsi'], 0, ',', '.') ?></td>
                        <td>
                            <div class="btn-group">
                                <a href"#" class="btn btn-primary btn-sm rounded" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#EditSumber<?php echo $row['id_sumber_energi']; ?>"><i class="bi bi-pencil-square text-warning"></i> Edit</a></li>
                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#DeleteSumber<?php echo $row['id_sumber_energi']; ?>"><i class="bi bi-trash3 text-danger"></i> Delete</a></li>
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