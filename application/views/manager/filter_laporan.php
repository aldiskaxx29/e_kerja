      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?= $title ?></h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?= base_url('Admin/Dashboard') ?>">Dashboard</a></div>
              <!-- <div class="breadcrumb-item"><a href="#">Bootstrap Components</a></div> -->
              <div class="breadcrumb-item"><?= $title ?></div>
            </div>
          </div>

          <div class="section-body">
            <diiv class="card">
              <diiv class="card-body">
                <div class="row">
                  <div class="col-md-4 offset-4">
                    <form action="" method="post">
                      <div class="form-group">
                        <label>Dari Tanggal</label>
                        <input type="date" name="dari" class="form-control">
                      </div>
                      <div class="form-group">
                         <label>Sampai Tanggal</label>
                        <input type="date" name="sampai" class="form-control">
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                  </div>
                </div>
              </diiv>
            </diiv>

            <div class="card">
              <diiv class="card-body">
                <?php if (!empty($filter)): ?>
                  <a href="<?= base_url('Manager/Laporan/print/?dari=' .set_value('dari'). '&sampai=' .set_value('sampai')) ?>" class="btn btn-primary" target="_blank"><i class="fas fa-print"></i> Print</a>      
                  
                  <hr>
                <?php endif ?>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Pekerjaan Id</th>
                      <th>Team Id</th>
                      <th>Progres</th>
                      <th>Tanggal</th>
                      <th>Keterangan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (empty($filter)): ?>
                      <div class="alert alert-danger">Tidak Ada</div>                      
                    <?php endif ?>
                    <?php foreach ($filter as $no => $f): ?>
                      <tr>
                        <td><?= $f->pekerjaan_id ?></td>
                        <td><?= $f->team_id ?></td>
                        <td><?= $f->progres ?></td>
                        <td><?= $f->tanggal ?></td>
                        <td><?= $f->keterangan ?></td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </diiv>
            </div>
          </div>
        </section>
      </div>