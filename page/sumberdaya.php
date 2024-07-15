<?php
include 'connect.php';
$query = mysqli_query($con, "SELECT * FROM sumberdaya");
while ($data = mysqli_fetch_array($query)) {
    $krisis[] = $data;
}

// $querySumber = mysqli_query($con, "SELECT id_sumber_energi, nama_sumber_energi FROM sumber_energi");
?>

<!-- Modal Add SumberDaya-->
<div class="modal fade" id="addKrisis" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered modal-fullscreen-sm-down">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Sumber Daya</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate action="controller/proses_input_krisis.php" method="POST">
                    <div class="row">
                        <div class="col-sm">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="Your Name" name="penyebab" required>
                                <label for="floatingInput">Negara</label>
                                <div class="invalid-feedback">
                                    Masukan Negara.
                                </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="Your Name" name="penyebab" required>
                                <label for="floatingInput">Sumber Daya Utama</label>
                                <div class="invalid-feedback">
                                    Masukan Sumber Daya Utama.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="Your Name" name="penyebab" required>
                                <label for="floatingInput">Perusahaan Asing</label>
                                <div class="invalid-feedback">
                                    Masukan Perusahaan Asing.
                                </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="floatingInput" placeholder="Your Name" name="penyebab" required>
                                <label for="floatingInput">Tahun Eksploitasi</label>
                                <div class="invalid-feedback">
                                    Masukan Tahun Eksploitasi.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="input_krisis_validate" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Add Krisis -->

<?php
if (empty($krisis)) {
    echo "Tidak ada data";
} else {
    foreach ($krisis as $row) {
?>
        <!-- Modal Edit Krisis-->
        <div class="modal fade" id="EditKrisis<?= $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered modal-fullscreen-sm-down">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Sumber Daya</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="needs-validation" novalidate action="proses_edit_krisis.php" method="POST">
                            <input type="hidden" name="id_krisis_energi" value="<?= $row['id_krisis_energi']; ?>">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="negara" class="form-control" id="floatingInput" placeholder="Your Name" value="<?= $row['negara']; ?>">
                                        <label for="floatingInput">Negara</label>
                                        <div class="invalid-feedback">
                                            Masukan Waktu Mulai.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="form-floating mb-3">
                                        <input type="date" name="tanggal_selesai" class="form-control" id="floatingInput" placeholder="Your Name" value="<?= $row['tanggal_selesai']; ?>">
                                        <label for="floatingInput">Waktu Selesai</label>
                                        <div class="invalid-feedback">
                                            Masukan Waktu Selesai.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" placeholder="Your Name" name="penyebab" value="<?= $row['penyebab']; ?>">
                                        <label for="floatingInput">Penyebab</label>
                                        <div class="invalid-feedback">
                                            Masukan Penyebab.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" name="id_sumber_energi" aria-label="Default select example" required>
                                            <option value="" hidden selected>Pilih Sumber Energi</option>
                                            <?php
                                            foreach ($querySumber as $value) {
                                                if ($row['id_sumber_energi'] == $value['id_sumber_energi']) {
                                                    echo '<option value="' . $value['id_sumber_energi'] . '" selected>' . $value['nama_sumber_energi'] . '</option>';
                                                } else {
                                                    echo '<option value="' . $value['id_sumber_energi'] . '">' . $value['nama_sumber_energi'] . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                        <label for="floatingInput">Sumber Energi</label>
                                        <div class="invalid-feedback">
                                            Pilih Sumber Energi.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="input_krisis_validate" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Edit Krisis -->

        <!-- Modal Delete Warga-->
        <div class="modal fade" id="DeleteKrisis<?= $row['id']; ?>" tabindex=" -1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Krisis Energi</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="needs-validation" novalidate action="proses_delete_krisis.php" method="POST">
                            <input type="hidden" name="id_krisis_energi" value="<?= $row['id_krisis_energi']; ?>">
                            <input type="hidden" name="penyebab" value="<?= $row['penyebab']; ?>">
                            <div class="col-lg-12 mb-3">
                                <div class="alert alert-light" role="alert">Apakah anda yakin ingin menghapus Data Krisis Energi penyebab <b><?= $row['penyebab']; ?></b> ?</div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" name="input_krisis_validate" class="btn btn-danger">Delete</button>
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
                    <th scope="col" class="text-nowrap">Sumber Daya Utama</th>
                    <th scope="col">Perusahaan Asing</th>
                    <th scope="col" class="text-nowrap">Tahun Eksploitasi</th>
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
                        <td align="center"><?= $row['negara'] ?></td>
                        <td align="center"><?= $row['sumberdaya_utama'] ?></td>
                        <td><?= $row['perusahaan_asing'] ?></td>
                        <td align="center"><?= $row['tahun_eksploitasi'] ?></td>
                        <td>
                            <div class="btn-group">
                                <a href"#" class="btn btn-primary btn-sm rounded" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#EditKrisis<?php echo $row['id']; ?>"><i class="bi bi-pencil-square text-warning"></i> Edit</a></li>
                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#DeleteKrisis<?php echo $row['id']; ?>"><i class="bi bi-trash3 text-danger"></i> Delete</a></li>
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
        <a data-bs-toggle="modal" data-bs-target="#addKrisis" class="btn btn-sm btn-primary"><i class="bi bi-plus-circle"></i> Krisis Energi</a>
    </div>
</div>