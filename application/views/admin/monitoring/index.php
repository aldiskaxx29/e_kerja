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
            <div class="card">
              <div class="card-body">
                <?= $this->session->flashdata('monitor') ?>
                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Tambah Data</a>
                <hr>
                <table class="table table-striped" id="myTable">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode Pekerjaan</th>
                      <th>Kode Team</th>
                      <th>Progres</th>
                      <th>Tanggal</th>
                      <th>Kegiatan</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($monitor as $no => $mo): ?>
                      <tr>
                        <td><?= $no+1 ?></td>
                        <td><?= $mo->kode_pekerjaan ?></td>
                        <td><?= $mo->kode_team ?></td>
                        <td><?= $mo->progres ?></td>
                        <td><?= $mo->tanggal ?></td>
                        <td><?= $mo->keterangan ?></td>
                        <td>
                          <a href="<?= base_url('Admin/Pekerjaan/delete/' . $mo->id_monitoring) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Mau Di Hapus')"><i class="fas fa-trash"></i></a>
                          <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModalEdit<?= $mo->id_monitoring  ?>"><i class="fas fa-edit"></i></a>
                          <a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModalDetail<?= $mo->id_monitoring  ?>"><i class="fas fa-eye"></i></a>
                        </td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </section>
      </div>


<!-- Modal Tambah -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal Tambah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          <div class="form-group">
            <label>Kode Pekerjaan</label>
            <select class="form-control" name="pekerjaan_id">
              <option value="">-- Pilihan --</option>
              <?php foreach ($pekerjaan as $p): ?>
                <option value="<?= $p->id_pekerjaan ?>"><?= $p->kode_pekerjaan ?></option>
              <?php endforeach ?>
            </select>
            <?= form_error('lokasi_id','<small class="text-danger text-form">','</small>') ?>
          </div>
          <div class="form-group">
            <label>Kode Team</label>
            <select class="form-control" name="team_id">
              <option value="">-- Pilihan --</option>
              <?php foreach ($team as $t): ?>
                <option value="<?= $t->id_team ?>"><?= $t->kode_team ?></option>
              <?php endforeach ?>
            </select>
            <?= form_error('kegiatan_id','<small class="text-danger text-form">','</small>') ?>
          </div>
          <div class="form-group">
            <label>Progres</label>
            <input type="text" name="progres" class="form-control">
            <?= form_error('progres','<small class="text-danger text-form">','</small>') ?>
          </div><div class="form-group">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control">
            <?= form_error('tanggal','<small class="text-danger text-form">','</small>') ?>
          </div>
          <div class="form-group">
            <label>Keterangan</label>
            <textarea class="form-control" name="keterangan" rows="4"></textarea>
            <?= form_error('keterangan','<small class="text-danger text-form">','</small>') ?>
          </div>
          <div class="form-group float-right">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit -->

<?php foreach ($monitor as $no => $mo): ?>
<div class="modal fade" id="exampleModalEdit<?= $mo->id_monitoring ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('Admin/Monitoring/edit') ?>" method="post">
          <div class="form-group">
            <label>Kode Pekerjaan</label>
            <input type="hidden" name="id" value="<?= $mo->id_monitoring ?>">
            <select class="form-control" name="pekerjaan_id">
              <?php foreach ($pekerjaan as $p): ?>
                <?php if ($p->id_pekerjaan == $mo->pekerjaan_id): ?>
                  <option value="<?= $p->id_pekerjaan ?>"selected><?= $p->kode_pekerjaan  ?></option>
                <?php else: ?>
                  <option value="<?= $p->id_pekerjaan ?>"><?= $p->kode_pekerjaan  ?></option>
                <?php endif ?>
              <?php endforeach ?>
            </select>
            <!-- <input type="text" name="nama_mooduk" class="form-control" value="<?= $mo->lokasi_id ?>"> -->
          </div>
          <div class="form-group">
            <label>Kode Team</label>
            <select name="team_id" class="form-control"> 
              <?php foreach ($team as $t): ?>
                <?php if ($t->id_team == $mo->team_id): ?>
                  <option value="<?= $t->id_team ?>" selected><?= $t->kode_team ?></option>
                <?php else: ?>
                  <option value="<?= $t->id_team ?>"><?= $t->kode_team ?></option>
                <?php endif ?>                
              <?php endforeach ?>              
            </select>
          </div>
          <div class="form-group">
            <label>Progres</label>
            <input type="text" name="progres" class="form-control" value="<?= $mo->progres ?>" >
          </div><div class="form-group">
            <label>Taggal</label>
            <input type="date" name="tanggal" class="form-control" value="<?= $mo->tanggal ?>">
          </div>
          <div class="form-group">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control"><?= $mo->keterangan ?></textarea>  
          </div>
          <div class="form-group float-right">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
      </div>
    </div>
  </div>
</div>
<?php endforeach ?>


<!-- Modal Detail -->

<?php foreach ($monitor as $no => $mo): ?>
<div class="modal fade" id="exampleModalDetail<?= $mo->id_monitoring ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table">
          <tr>
            <th>Kode Pekerjaan</th>
            <td><?= $mo->pekerjaan_id ?></td>
          </tr>
          <tr>
            <th>Id Team</th>
            <td><?= $mo->team_id ?></td>
          </tr>
          <tr>
            <th>Progres</th>
            <td><?= $mo->progres ?></td>
          </tr>
          <tr>
            <th>Tanggal</th>
            <td><?= $mo->tanggal ?></td>
          </tr>
          <tr>
            <th>Keterangan</th>
            <td><?= $mo->keterangan ?></td>
          </tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php endforeach ?>

