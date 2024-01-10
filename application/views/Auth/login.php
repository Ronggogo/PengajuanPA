<main class="main-content  mt-0">
  <section>
    <div class="page-header min-vh-100">
      <div class="container">
        <div class="row">
          <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-10 mx-auto">
            <div class="card card-plain">
              <div class="card-header pb-0 text-start">
                <h4 class="font-weight-bolder">Login</h4>
                <?php
                if (!isset($login_button)) {
                  $user_data = $this->session->userdata('user_data');
                  $haystack = $user_data['email'];
                  $needle = 'mahasiswa';
                  if (strpos($haystack, $needle) !== false) {
                    redirect('Mahasiswa');
                  } else {
                    redirect('Koor');
                  }
                } else {
                  echo '<div align="center">' . $login_button . '</div>';
                }
                ?>
                <p class="mb-0">Opsi login </p>
                <form action="" method="get" id="opsiLogin">
                  <div class="mb-3">
                    <select name="pilRole" id="pilRole" class="form-select" onchange="document.getElementById('opsiLogin').submit()">
                      <?php $pilRole = $_GET['pilRole'];
                      if (!isset($_GET['pilRole']) && empty($_GET['pilRole'])) { ?>
                        <option value="">Pilih Login Sebagai</option>
                      <?php }
                      $selM = "";
                      $selK = "";
                      $selA = "";
                      switch ($pilRole) {
                        case 'mahasiswa':
                          $selM = 'selected';
                          $uname = 'NIM';
                          $bukanAdmin = true;
                          break;
                        case 'koor':
                          $selK = 'selected';
                          $uname = 'NIP';
                          $bukanAdmin = true;
                          break;
                        case 'admin':
                          $selA = 'selected';
                          $uname = 'id admin';
                          $bukanAdmin = false;
                          break;
                        default:
                          break;
                      } ?>
                      <option <?= $selM ?> value="mahasiswa">Mahasiswa</option>
                      <option <?= $selK ?> value="koor">Koor PA</option>
                      <option <?= $selA ?> value="admin">Admin</option>
                    </select>
                  </div>
                </form>
              </div>
              <?php if (isset($_GET['pilRole']) && !empty($_GET['pilRole'])) { ?>
                <div class="card-body">
                  <?= $this->session->flashdata('message') ?>
                  <p>Masukkan
                    <?= $uname ?> dan password
                  </p>
                  <form role="form" method="POST" action="" id="formLogin">
                    <input type="hidden" name="role" value="<?php echo $pilRole; ?>">
                    <div class="mb-3">
                      <input type="text" class="form-control form-control-lg" placeholder=" <?= $uname ?>" aria-label="Email" name="username" id="username">
                      <?= form_error('username', '<small class="text-danger pl3">', '</small>'); ?>
                    </div>
                    <div class="mb-3">
                      <input type="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" name="password" id="password">
                      <?= form_error('password', '<small class="text-danger pl3">', '</small>'); ?>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Login</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <?php if ($bukanAdmin) { ?>
                    <p class="mb-4 text-sm mx-auto">
                      Tidak bisa login?
                      <a href="javascript:;" class="text-primary text-gradient font-weight-bold">Hubungi Admin</a>
                    </p>
                  <?php } ?>
                </div>
              <?php } ?>
            </div>
          </div>
          <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-10 text-center justify-content-center flex-column">
            <img class="position-relative m-0 px-7 border-radius-lg d-flex flex-column" src="<?= base_url("assets/"); ?>gambar/pcr_logo.png" style="width: 100%;">
            <!-- <div class="position-relative bg-gradient-primary h-100 m-8 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signin-ill.jpg');
                  background-size: cover;">
                  </div> -->
          </div>
        </div>
      </div>
    </div>
  </section>
</main>