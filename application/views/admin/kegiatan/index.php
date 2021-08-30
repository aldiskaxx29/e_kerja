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
                <?= $this->session->flashdata('kegiatan') ?>
                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Tambah Data</a>
                <hr>
                <table class="table table-striped" id="myTable">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode Kegiatan</th>
                      <th>Nama Kegiatan </th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($kegiatan as $no => $k): ?>
                      <tr>
                        <td><?= $no+1 ?></td>
                        <td><?= $k->kode_kegiatan ?></td>
                        <td><?= $k->nama_kegiatan ?></td>
                        <td>
                          <a href="<?= base_url('Admin/kegiatan/delete/' . $k->id_kegiatan) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Mau Di Hapus')"><i class="fas fa-trash"></i></a>
                          <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModalEdit<?= $k->id_kegiatan  ?>"><i class="fas fa-edit"></i></a>
                          <a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModalDetail<?= $k->id_kegiatan  ?>"><i class="fas fa-eye"></i></a>
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
            <label>Kode kegiatan</label>
            <input type="text" name="kode_kegiatan" class="form-control" value="<?= $kode ?>" readonly>
            <?= form_error('kode_kegiatan','<small class="text-danger text-form">','</small>') ?>
          </div>
          <div class="form-group">
            <label>Nama kegiatan</label>
            <input type="text" name="nama_kegiatan" class="form-control">
            <?= form_error('nama_kegiatan','<small class="text-danger text-form">','</small>') ?>
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

<?php foreach ($kegiatan as $no => $k): ?>
<div class="modal fade" id="exampleModalEdit<?= $k->id_kegiatan ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('Admin/kegiatan/edit') ?>" method="post" >
          <div class="form-group">
            <label>Kode kegiatan</label>
            <input type="hidden" name="id" value="<?= $k->id_kegiatan ?>">
            <input type="text" name="kode_kegiatan" class="form-control" value="<?= $k->kode_kegiatan ?>" readonly>
          </div>
          <div class="form-group">
            <label>Nama kegiatan</label>
            <input type="text" name="nama_kegiatan" class="form-control" value="<?= $k->nama_kegiatan ?>" >
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

<?php foreach ($kegiatan as $no => $k): ?>
<div class="modal fade" id="exampleModalDetail<?= $k->id_kegiatan ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <th>Kode produk</th>
            <td><?= $k->kode_kegiatan ?></td>
          </tr>
          <tr>
            <th>Nama kegiatan</th>
            <td><?= $k->nama_kegiatan ?></td>
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

