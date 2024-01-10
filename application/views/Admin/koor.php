<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <?php echo form_open('Admin/cariKoor') ?>
            <input class="form-control" name="keyword" type="text" placeholder="Cari Koordinator PA">
            <?php echo form_close() ?>
            <p style="margin:20px;"></p>
        </div>
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Tabel Koordinator PA</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        NIP</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Nama</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Email</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Koor Angkatan</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($koor as $k) {
                                    ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div> &ensp; </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">
                                                        <?= $k['nip'] ?>
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">
                                                <?= $k['nama'] ?>
                                            </p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">
                                                <?= $k['email'] ?>
                                            </p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">
                                                <?= $k['angkatan_pa'] ?>
                                            </p>
                                        </td>
                                        <td class="align-middle">
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#exampleModal<?= $k['nip'] ?>">
                                                EDIT
                                            </button>
                                            <!-- Modal -->
                                            <form action="<?= base_url('Admin/') ?>editKoor" method="POST">
                                                <div class="modal fade" id="exampleModal<?= $k['nip'] ?>" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data
                                                                    Koordinator PA</h5>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="col-lg-2 col-sm-2 control-label">NIP</label>
                                                                    <div class="col-lg-10">
                                                                        <input type="hidden" id="id" name="id">
                                                                        <input type="text" class="form-control"
                                                                            value="<?= $k['nip'] ?>" disabled>
                                                                        <input type="hidden" name="nip" value=<?= $k['nip'] ?>>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label
                                                                        class="col-lg-2 col-sm-2 control-label">Nama</label>
                                                                    <div class="col-lg-10">
                                                                        <input type="text" class="form-control" id="nama"
                                                                            name="nama" value="<?= $k['nama'] ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label
                                                                        class="col-lg-2 col-sm-2 control-label">Email</label>
                                                                    <div class="col-lg-10">
                                                                        <input type="text" class="form-control" id="email"
                                                                            name="email" value="<?= $k['email'] ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label
                                                                        class="col-lg-2 col-sm-2 control-label">Koor Angkatan</label>
                                                                    <div class="col-lg-10">
                                                                        <input type="text" class="form-control" id="angkatan_pa"
                                                                            name="angkatan_pa" value="<?= $k['angkatan_pa'] ?>">
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