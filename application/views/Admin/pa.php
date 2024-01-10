<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <?php echo form_open('Admin/cariPA') ?>
            <input class="form-control" name="keyword" type="text" placeholder="Cari Dokumen PA">
            <?php echo form_close() ?>
            <p style="margin:20px;"></p>
        </div>
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Tabel Data PA</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ID</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Nama Mahasiswa</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Nama Koordinator</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Judul PA</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        File PA</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Periode PA</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        KBK</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Status</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($pa as $p) {
                                ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div> &ensp; </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">
                                                        <?= $p['id_pa'] ?>
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">
                                                <?= $p['mahasiswa'] ?>
                                            </p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">
                                                <?= $p['koor'] ?>
                                            </p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">
                                                <?= $p['judul_pa'] ?>
                                            </p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">
                                            <a href="../upload/pa/<?= $p['file_pa'] ?>" class="btn btn-sm btn-outline-primary" target="_blank" rel="noopener noreferrer">Lihat File</a>
                                            </p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">
                                                <?= $p['periode_pa'] ?>
                                            </p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">
                                                <?= $p['kbk'] ?>
                                            </p>
                                        </td>
                                        <td>
                                            <?php if ($p['status'] == 'terima') {
                                                $warna = "success";
                                            } elseif ($p['status'] == 'proses') {
                                                $warna = "warning";
                                            } else {
                                                $warna = "danger";
                                            }
                                            ?>
                                            <span class="badge badge-sm bg-gradient-<?= $warna ?>"><?= $p['status'] ?></span>
                                        </td>
                                        <td class="align-middle">
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal<?= $p['id_pa'] ?>">
                                                EDIT
                                            </button>
                                            <!-- Modal -->
                                            <form action="<?= base_url('Admin/') ?>editPA" method="POST">
                                                <div class="modal fade" id="exampleModal<?= $p['id_pa'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data
                                                                    Proyek Akhir</h5>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label class="col-lg-2 col-sm-2 control-label">ID PA</label>
                                                                    <div class="col-lg-10">
                                                                        <input type="hidden" id="id" name="id">
                                                                        <input type="text" class="form-control" value="<?= $p['id_pa'] ?>" disabled>
                                                                        <input type="hidden" name="id_pa" value=<?= $p['id_pa'] ?>>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-lg-2 col-sm-2 control-label">NIM</label>
                                                                    <div class="col-lg-10">
                                                                        <input type="hidden" id="id" name="id">
                                                                        <input type="text" class="form-control" value="<?= $p['nim'] ?>" disabled>
                                                                        <input type="hidden" name="nim" value=<?= $p['nim'] ?>>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-lg-2 col-sm-2 control-label">NIP</label>
                                                                    <div class="col-lg-10">
                                                                        <input type="hidden" id="id" name="id">
                                                                        <input type="text" class="form-control" value="<?= $p['nip'] ?>" disabled>
                                                                        <input type="hidden" name="nip" value=<?= $p['nip'] ?>>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-lg-2 col-sm-2 control-label">Judul PA</label>
                                                                    <div class="col-lg-10">
                                                                        <input type="text" class="form-control" id="judul_pa" name="judul_pa" value="<?= $p['judul_pa'] ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-lg-2 col-sm-2 control-label">Periode PA</label>
                                                                    <div class="col-lg-10">
                                                                        <input type="text" class="form-control" id="periode_pa" name="periode_pa" value="<?= $p['periode_pa'] ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-lg-2 col-sm-2 control-label">KBK</label>
                                                                    <div class="col-lg-10">
                                                                        <input type="text" class="form-control" id="kbk" name="kbk" value="<?= $p['kbk'] ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-lg-2 col-sm-2 control-label">Status</label>
                                                                    <div class="col-lg-10">
                                                                        <input type="text" class="form-control" id="status" name="status" value="<?= $p['status'] ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save
                                                                    changes</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>