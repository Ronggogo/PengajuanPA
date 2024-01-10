<div class="container-fluid py-4">
    <div class="row mt-4">
        <div class="col-12">
            <?= $this->session->flashdata('message'); ?>
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
                                        Koordinator PA</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        File PA</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pa as $p) : ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div> &ensp; </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"><?= $p['judul_pa'] ?></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold"><?= $p['koor'] ?></span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <!-- <span class="text-secondary text-xs font-weight-bold">pdf</span> -->
                                            <a href="./upload/pa/<?= $p['file_pa'] ?>" class="btn btn-sm btn-outline-primary" target="_blank" rel="noopener noreferrer">Lihat File</a>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <?php if ($p['status'] == "Terima") { ?>
                                                <span class="badge badge-sm bg-gradient-success">Accepted</span>
                                            <?php } elseif ($p['status'] == "proses") { ?>
                                                <span class="badge badge-sm bg-gradient-warning">Prosses</span>
                                            <?php } elseif ($p['status'] == "tolak") { ?>
                                                <span class="badge badge-sm bg-gradient-danger">Rejected</span>
                                            <?php } ?>
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