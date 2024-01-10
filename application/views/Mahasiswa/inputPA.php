<div class="container-fluid py-4">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <p class="text-uppercase text-sm">Inputkan data dengan benar !!!</p>
                    <form action="<?= base_url('Mahasiswa/uploadpa') ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nim" class="form-control-label">NIM Mahasiswa</label>
                                    <input class="form-control" type="text" value="<?= $mhs['nim'] ?>" disabled>
                                    <input type="hidden" name="nim" value="<?= $mhs['nim'] ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nip" class="form-control-label">NIP Dosen Pembimbing</label>
                                    <input class="form-control" type="text" name="nip">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="judul" class="form-control-label">Judul PA</label>
                                    <input class="form-control" type="text" name="judul">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="file_pa" class="form-control-label">File Projek Akhir</label>
                                    <input class="form-control" accept="application/pdf,application/zip,application/rar" type="file" name="file_pa" id="file_pa">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="periode_pa" class="form-control-label">Periode Projek Akhir</label>
                                    <input class="form-control" type="text" name="periode_pa">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kbk" class="form-control-label">KBK</label>
                                    <select class="form-select" name="kbk" id="kbk">
                                        <option selected>Pilih KBK</option>
                                        <option value="multimedia">Multimedia</option>
                                        <option value="operating system and computer network">Operating system and computer network</option>
                                        <option value="soft computing">Soft computing</option>
                                        <option value="software enginering">Software enginering</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-6">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>