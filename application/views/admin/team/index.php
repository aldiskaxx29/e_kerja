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
                <?= $this->session->flashdata('team') ?>
                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Tambah Data</a>
                <hr>
                <table class="table table-striped" id="myTable">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode Team</th>
                      <th>Nama Nama</th>
                      <th>No Telepon</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($team as $no => $t): ?>
                      <tr>
                        <td><?= $no+1 ?></td>
                        <td><?= $t->kode_team ?></td>
                        <td><?= $t->nama_team ?></td>
                        <td><?= $t->no_telpon ?></td>
                        <td>
                          <a href="<?= base_url('Admin/Team/delete/' . $t->id_team) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Mau Di Hapus')"><i class="fas fa-trash"></i></a>
                          <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModalEdit<?= $t->id_team  ?>"><i class="fas fa-edit"></i></a>
                          <!-- <a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModalDetail<?= $t->id_team  ?>"><i class="fas fa-eye"></i></a> -->
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
        <form action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label>Kode Team</label>
            <input type="text" name="kode_team" class="form-control" value="<?= $kode ?>" readonly>
            <?= form_error('kode_team','<small class="text-danger text-form">','</small>') ?>
          </div>
          <div class="form-group">
            <label>Nama Team</label>
            <input type="text" name="nama_team" class="form-control">
            <?= form_error('nama_team','<small class="text-danger text-form">','</small>') ?>
          </div>
          <div class="form-group">
            <label>No Telepon</label>
            <input type="number" name="no_telpon" class="form-control">
            <?= form_error('no_telpon','<small class="text-danger text-form">','</small>') ?>
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

<?php foreach ($team as $no => $t): ?>
<div class="modal fade" id="exampleModalEdit<?= $t->id_team ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('Admin/Team/edit') ?>" method="post" >
          <div class="form-group">
            <label>Kode Team</label>
            <input type="hidden" name="id" value="<?= $t->id_team ?>">
            <input type="text" name="kode_team" class="form-control" value="<?= $t->kode_team ?>" readonly>
          </div>
          <div class="form-group">
            <label>Nama Team</label>
            <input type="text" name="nama_team" class="form-control" value="<?= $t->nama_team ?>" >
          </div>
          <div class="form-group">
            <label>No Telepon</label>
            <input type="text" name="no_telpon" class="form-control" value="<?= $t->no_telpon ?>" >
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

<?php foreach ($team as $no => $t): ?>
<div class="modal fade" id="exampleModalDetail<?= $t->id_team ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <th>Kode Team</th>
            <td><?= $t->kode_team ?></td>
          </tr>
          <tr>
            <th>Nama Team</th>
            <td><?= $t->nama_team ?></td>
          </tr>
          <tr>
            <th>No Telpon</th>
            <td><?= $t->no_telpon ?></td>
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

