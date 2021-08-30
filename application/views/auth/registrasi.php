
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              <img src="<?= base_url('assets') ?>/assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4 class="text-primary">Form Pendaftaran</h4></div>
              <div class="card-body">
                <form action="<?= base_url('Auth/registrasi') ?>" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="username">Nama</label>
                    <input id="username" type="text" class="form-control" name="username"  value="<?= set_value('username') ?>" autofocus>
                    <div class="invalid-feedback">
                    </div>
                    <?= form_error('username','<small class="text-danger">','</small>') ?>
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email"  value="<?= set_value('email') ?>" autofocus>
                    <div class="invalid-feedback">
                    </div>
                    <?= form_error('email','<small class="text-danger">','</small>') ?>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="password">Password</label>
                      <input id="password" type="password" class="form-control" name="password" value="<?= set_value('password') ?>" >
                      <?= form_error('password','<small class="text-danger">','</small>') ?>
                    </div>
                    <div class="form-group col-6">
                      <label for="password1">Confirmasi Password</label>
                      <input id="password1" type="password" class="form-control" name="password1" value="<?= set_value('password1') ?>">
                      <?= form_error('password1','<small class="text-danger">','</small>') ?>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-4 offset-4">
                      <label for="role_id" class="d-block">Status</label>
                      <select class="form-control" name="role_id">
                        <option value=" ">-- Pilihan --</option>
                        <option value="1">MANAGER</option>
                        <option value="2">ADMIN</option>
                        <option value="3">KEPALA TEAM</option>
                      </select>
                      <?= form_error('role_id','<small class="text-danger">','</small>') ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Daftar
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="simple-footer">
              Copyright &copy; Stisla 2018
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

