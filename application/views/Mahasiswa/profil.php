<div class="container-fluid py-4">
    <div class="row">
        <?= $this->session->flashdata('message'); ?>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <p class="text-uppercase text-sm">User Information</p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">NIM</label>
                                <input class="form-control" type="text" value="<?= $mhs['nim'] ?>" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Full name</label>
                                <input class="form-control" type="text" value="<?= $mhs['nama'] ?>" disabled>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Email address</label>
                                <input class="form-control" type="email" value="<?= $mhs['email'] ?>" disabled>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Password</label>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary form-control" data-bs-toggle="modal" data-bs-target="#gantipass">
                                    Ganti Password
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="gantipass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Password</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="<?= base_url("Mahasiswa/"); ?>gantiPassword" method="post">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="form-control-label">Password Lama</label>
                                                        <input class="form-control" type="password" name="passlama">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="form-control-label">Masukkan Password Baru</label>
                                                        <input class="form-control" type="password" name="passbaru">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Kelas</label>
                                <input class="form-control" type="text" value="<?= $mhs['kelas'] ?>" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Angkatan</label>
                                <input class="form-control" type="text" value="<?= $mhs['angkatan'] ?>" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Jurusan</label>
                                <input class="form-control" type="text" value="<?= $mhs['jurusan'] ?>" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>