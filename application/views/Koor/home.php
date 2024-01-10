<div class="container-fluid py-4">
    <div class="row mt-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Data Dokumen PA</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Judul PA</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Nama Mahasiswa</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        File PA</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Status</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($koor as $k) : ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div> &ensp; </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"><?= $k['judul_pa'] ?></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold"><?= $k['mahasiswa'] ?></span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <a href="./upload/pa/<?= $k['file_pa'] ?>" class="btn btn-sm btn-outline-primary" target="_blank" rel="noopener noreferrer">Lihat File</a>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="badge badge-sm bg-gradient-warning"><?= $k['status'] ?></span>
                                        </td>
                                        <td class="align-middle">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?= $k['nip'] ?>">
                                                EDIT
                                            </button>
                                            <!-- Modal -->
                                            <form action="<?= base_url('Koor/') ?>editStatus" method="POST">
                                                <div class="modal fade" id="exampleModal<?= $k['nip'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Status PA</h5>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label class="col-lg-2 col-sm-2 control-label">Nama Mahasiswa</label>
                                                                    <div class="col-lg-10">
                                                                        <input type="hidden" id="id_pa" name="id_pa" value="<?= $k['id_pa'] ?>">
                                                                        <input type="text" class="form-control" value="<?= $k['mahasiswa'] ?>" disabled>
                                                                        <input type="hidden" name="nim" value=<?= $k['mahasiswa'] ?>>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-lg-2 col-sm-2 control-label">Judul PA</label>
                                                                    <div class="col-lg-10">
                                                                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $k['judul_pa'] ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-lg-2 col-sm-2 control-label">Status</label>
                                                                    <div class="col-lg-10">
                                                                        <select class="form-select" name="status" id="status">
                                                                            <option selected>Pilih Status</option>
                                                                            <option value="terima">Terima</option>
                                                                            <option value="proses">Proses</option>
                                                                            <option value="tolak">Tolak</option>
                                                                        </select>
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
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>