    <?php
    include 'connect.php';
    $query = mysqli_query($con, "SELECT * FROM dampak_krisis LEFT JOIN krisis_energi ON krisis_energi.id_krisis_energi = dampak_krisis.id_krisis_energi");
    while ($data = mysqli_fetch_array($query)) {
        $krisis[] = $data;
    }

    $queryKrisis = mysqli_query($con, "SELECT id_krisis_energi, dampak FROM krisis_energi");
    ?>

    <!-- Modal Add Dampak-->
    <div class="modal fade" id="addDampak" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Dampak Krisis</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" novalidate action="proses_input_dampak.php" method="POST">
                        <div class="form-floating mb-3">
                            <select class="form-select" name="id_krisis_energi" aria-label="Default select example" required>
                                <option value="" hidden selected>Pilih Sumber Energi</option>
                                <?php
                                foreach ($queryKrisis as $value) {
                                    echo '<option value="' . $value['id_krisis_energi'] . '">' . $value['dampak'] . '</option>';
                                }
                                ?>
                            </select>
                            <label for="floatingInput">Dampak Krisis</label>
                            <div class="invalid-feedback">
                                Pilih Sumber Energi.
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <div class="form-floating mb-3">
                                    <input type="text" name="sektor" class="form-control" id="floatingInput" placeholder="Your Name" required>
                                    <label for="floatingInput">Sektor</label>
                                    <div class="invalid-feedback">
                                        Masukan Sektor.
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-floating mb-3">
                                    <select class="form-select" name="tingkat_keparahan" aria-label="Default select example" required>
                                        <option selected hidden value="">Pilih Tingkat</option>
                                        <option value="Tinggi">Tinggi</option>
                                        <option value="Sedang">Sedang</option>
                                    </select>
                                    <label for="floatingInput">Tingkat Keparahan</label>
                                    <div class="invalid-feedback">
                                        Masukan Tingkat Keparahan.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea name="deskripsi" class="form-control" id="" style="height: 100px;"></textarea>
                            <label for="floatingInput">Deskripsi</label>
                            <div class="invalid-feedback">
                                Masukan Deskripsi.
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
            <div class="modal fade" id="EditDampak<?= $row['id_dampak_krisis']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md modal-dialog-centered modal-fullscreen-sm-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Dampak Krisis</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses_edit_dampak.php" method="POST">
                                <input type="hidden" name="id_dampak_krisis" value="<?= $row['id_dampak_krisis']; ?>">
                                <div class="form-floating mb-3">
                                    <select class="form-select" name="id_krisis_energi" aria-label="Default select example" required>
                                        <option value="" hidden selected>Pilih Sumber Energi</option>
                                        <?php
                                        foreach ($queryKrisis as $value) {
                                            if ($row['id_krisis_energi'] == $value['id_krisis_energi']) {
                                                echo '<option value="' . $value['id_krisis_energi'] . '" selected>' . $value['dampak'] . '</option>';
                                            } else {
                                                echo '<option value="' . $value['id_krisis_energi'] . '">' . $value['dampak'] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                    <label for="floatingInput">Dampak Krisis</label>
                                    <div class="invalid-feedback">
                                        Pilih Sumber Energi.
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm">
                                        <div class="form-floating mb-3">
                                            <input type="text" name="sektor" class="form-control" id="floatingInput" placeholder="Your Name" value="<?= $row['sektor']; ?>" required">
                                            <label for="floatingInput">Sektor</label>
                                            <div class="invalid-feedback">
                                                Masukan Sektor.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" name="tingkat_keparahan" aria-label="Default select example" required>
                                                <option selected hidden value="">Pilih Tingkat</option>
                                                <?php
                                                if ($row['tingkat_keparahan'] == 'Tinggi') {
                                                    echo '<option value="Tinggi" selected>Tinggi</option>';
                                                    echo '<option value="Sedang">Sedang</option>';
                                                } else if ($row['tingkat_keparahan'] == 'Sedang') {
                                                    echo '<option value="Tinggi">Tinggi</option>';
                                                    echo '<option value="Sedang" selected>Sedang</option>';
                                                }
                                                ?>
                                            </select>
                                            <label for="floatingInput">Tingkat Keparahan</label>
                                            <div class="invalid-feedback">
                                                Masukan Tingkat Keparahan.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea name="deskripsi" class="form-control" id="" style="height: 100px;"><?= $row['deskripsi']; ?></textarea>
                                    <label for="floatingInput">Deskripsi</label>
                                    <div class="invalid-feedback">
                                        Masukan Deskripsi.
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
            <div class="modal fade" id="DeleteDampak<?= $row['id_dampak_krisis']; ?>" tabindex=" -1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Dampak Krisis</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses_delete_dampak.php" method="POST">
                                <input type="hidden" name="id_dampak_krisis" value="<?= $row['id_dampak_krisis']; ?>">
                                <input type="hidden" name="sektor" value="<?= $row['sektor']; ?>">
                                <div class="col-lg-12 mb-3">
                                    <div class="alert alert-light" role="alert">Apakah anda yakin ingin menghapus Data Dampak Krisis Energi sektor <b><?= $row['sektor']; ?></b> ?</div>
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
                        <th scope="col" class="text-nowrap">Dampak Krisis</th>
                        <th scope="col">Sektor</th>
                        <th scope="col" class="text-nowrap">Tingkat Keparahan</th>
                        <th scope="col" class="text-nowrap">Deskripsi</th>
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
                            <td><?= $row['dampak'] ?></td>
                            <td><?= $row['sektor'] ?></td>
                            <td align="center">
                                <?php if ($row['tingkat_keparahan'] == "Tinggi") {
                                ?>
                                    <span class="badge bg-danger">Tinggi</span>
                                <?php
                                } else if ($row['tingkat_keparahan'] == "Sedang") {
                                ?>
                                    <span class="badge bg-warning">Sedang</span>
                                <?php
                                }
                                ?>
                            </td>
                            <td><?= $row['deskripsi'] ?></td>
                            <td>
                                <div class="btn-group">
                                    <a href"#" class="btn btn-primary btn-sm rounded" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#EditDampak<?php echo $row['id_dampak_krisis']; ?>"><i class="bi bi-pencil-square text-warning"></i> Edit</a></li>
                                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#DeleteDampak<?php echo $row['id_dampak_krisis']; ?>"><i class="bi bi-trash3 text-danger"></i> Delete</a></li>
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