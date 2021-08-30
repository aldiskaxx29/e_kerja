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
          <!-- <a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Tambah Data</a> -->
          <hr>
          <table class="table table-striped" id="myTable">
            <thead>
              <tr>
                <th>No</th>
                <th>Kode Team</th>
                <th>Nama Nama</th>
                <th>No Telepon</th>
                <th>Status</th>
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
                    <?php if ($t->status == 0): ?>
                      <small class="badge badge-warning" style="cursor:pointer;" data-toggle="modal" data-target="#exampleModal<?= $t->id_team  ?>">Verfikasi</small>
                    <?php elseif($t->status == 1): ?>
                      <small class="badge badge-success">Acc</small>
                    <?php else: ?>
                      <small class="badge badge-danger">Gagal</small>
                    <?php endif ?>
                  </td>
                  <td>
                    <a href="<?= base_url('Admin/Team/delete/' . $t->id_team) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Mau Di Hapus')"><i class="fas fa-trash"></i></a>
                    <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModalEdit<?= $t->id_team  ?>"><i class="fas fa-edit"></i></a>
                    <a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModalDetail<?= $t->id_team  ?>"><i class="fas fa-eye"></i></a>
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


<!-- Modal -->
<?php foreach ($team as $no => $t): ?>
<div class="modal fade" id="exampleModal<?= $t->id_team  ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Verifikas Team</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('Ketua/Team/verifikasi') ?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label>Verifikas</label>
            <input type="hidden" name="id" value="<?= $t->id_team ?>">
            <select name="verifikasi" class="form-control">
              <option value="">-- Pilhan --</option>
              <option value="1">Acc</option>
              <option value="2">Gagal</option>
            </select>
            <?= form_error('verifikasi','<small class="text-danger text-form">','</small>') ?>
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
<?php endforeach ?>

