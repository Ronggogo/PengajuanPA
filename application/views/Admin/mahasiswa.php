<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <?php echo form_open('Admin/cariMahasiswa') ?>
            <input class="form-control" name="keyword" type="text" placeholder="Cari Mahasiswa">
            <?php echo form_close() ?>
            <p style="margin:20px;"></p>
        </div>
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Tabel Data Mahasiswa</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        NIM</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Nama</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Email</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Kelas</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Angkatan</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Prodi</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($mahasiswa as $m):
                                    ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div> &ensp; </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">
                                                        <?= $m['nim'] ?>
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">
                                                <?= $m['nama'] ?>
                                            </p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">
                                                <?= $m['email'] ?>
                                            </p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">
                                                <?= $m['kelas'] ?>
                                            </p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">
                                                <?= $m['angkatan'] ?>
                                            </p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">
                                                <?= $m['jurusan'] ?>
                                            </p>
                                        </td>
                                        <td class="align-middle">
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#exampleModal<?= $m['nim'] ?>">
                                                EDIT
                                            </button>
                                            <!-- Modal -->
                                            <form action="<?= base_url('Admin/') ?>editMhs" method="POST">
                                                <div class="modal fade" id="exampleModal<?= $m['nim'] ?>" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data
                                                                    Mahasiswa</h5>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="col-lg-2 col-sm-2 control-label">NIM</label>
                                                                    <div class="col-lg-10">
                                                                        <input type="hidden" id="id" name="id">
                                                                        <input type="text" class="form-control"
                                                                            value="<?= $m['nim'] ?>" disabled>
                                                                        <input type="hidden" name="nim" value=<?= $m['nim'] ?>>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label
                                                                        class="col-lg-2 col-sm-2 control-label">Nama</label>
                                                                    <div class="col-lg-10">
                                                                        <input type="text" class="form-control" id="nama"
                                                                            name="nama" value="<?= $m['nama'] ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label
                                                                        class="col-lg-2 col-sm-2 control-label">Email</label>
                                                                    <div class="col-lg-10">
                                                                        <input type="text" class="form-control" id="email"
                                                                            name="email" value="<?= $m['email'] ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label
                                                                        class="col-lg-2 col-sm-2 control-label">Kelas</label>
                                                                    <div class="col-lg-10">
                                                                        <input type="text" class="form-control" id="kelas"
                                                                            name="kelas" value="<?= $m['kelas'] ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label
                                                                        class="col-lg-2 col-sm-2 control-label">Angkatan</label>
                                                                    <div class="col-lg-10">
                                                                        <input type="text" class="form-control"
                                                                            id="angkatan" name="angkatan"
                                                                            value="<?= $m['angkatan'] ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label
                                                                        class="col-lg-2 col-sm-2 control-label">Prodi</label>
                                                                    <div class="col-lg-10">
                                                                        <input type="text" class="form-control" id="jurusan"
                                                                            name="jurusan" value="<?= $m['jurusan'] ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save
                                                                    changes</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>