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
                <?= $this->session->flashdata('pekerjaan') ?>
                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Tambah Data</a>
                <hr>
                <table class="table table-striped" id="myTable">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode Pekerjaan</th>
                      <th>Lokasi </th>
                      <th>Kegiatan</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($pekerjaan as $no => $pr): ?>
                      <tr>
                        <td><?= $no+1 ?></td>
                        <td><?= $pr->kode_pekerjaan ?></td>
                        <td><?= $pr->lokasi_id ?></td>
                        <td><?= $pr->kegiatan_id ?></td>
<!--                         <td><?= $pr->harga_produk ?></td>
                        <td><?= $pr->deskripsi ?></td> -->
                        <!-- <td><?= $pr->stok ?></td> -->
                        <td>
                          <a href="<?= base_url('Admin/Pekerjaan/delete/' . $pr->id_pekerjaan) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Mau Di Hapus')"><i class="fas fa-trash"></i></a>
                          <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModalEdit<?= $pr->id_pekerjaan  ?>"><i class="fas fa-edit"></i></a>
                          <a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModalDetail<?= $pr->id_pekerjaan  ?>"><i class="fas fa-eye"></i></a>
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
            <label>Kode Pekerjaan</label>
            <input type="text" name="kode_pekerjaan" class="form-control" value="<?= $kode ?>" readonly>
            <?= form_error('kode_pekerjaan','<small class="text-danger text-form">','</small>') ?>
          </div>
          <div class="form-group">
            <label>Id Lokas</label>
            <select class="form-control" name="lokasi_id">
              <option value="">-- Pilihan --</option>
              <?php foreach ($lokasi as $l): ?>
                <option value="<?= $l->id_lokasi ?>"><?= $l->id_lokasi ?></option>
              <?php endforeach ?>
            </select>
            <?= form_error('lokasi_id','<small class="text-danger text-form">','</small>') ?>
          </div>
          <div class="form-group">
            <label>Id Kategori</label>
            <select class="form-control" name="kegiatan_id">
              <option value="">-- Pilihan --</option>
              <?php foreach ($kegiatan as $k): ?>
                <option value="<?= $k->id_kegiatan ?>"><?= $k->id_kegiatan ?></option>
              <?php endforeach ?>
            </select>
            <?= form_error('kegiatan_id','<small class="text-danger text-form">','</small>') ?>
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

<?php foreach ($pekerjaan as $no => $pr): ?>
<div class="modal fade" id="exampleModalEdit<?= $pr->id_pekerjaan ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('Admin/Pekerjaan/edit') ?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label>Kode Pekerjaan</label>
            <input type="hidden" name="id" value="<?= $pr->id_pekerjaan ?>">
            <input type="text" name="kode_pekerjaan" class="form-control" value="<?= $pr->kode_pekerjaan ?>" readonly>
          </div>
          <div class="form-group">
            <label>Id Lokasi</label>
            <select class="form-control" name="lokasi_id">
              <?php foreach ($lokasi as $l): ?>
                <?php if ($l->id_lokasi == $pr->lokasi_id): ?>
                  <option value="<?= $l->id_lokasi ?>"selected><?= $l->id_lokasi  ?></option>
                <?php else: ?>
                  <option value="<?= $l->id_lokasi ?>"><?= $l->id_lokasi  ?></option>
                <?php endif ?>
              <?php endforeach ?>
            </select>
            <!-- <input type="text" name="nama_produk" class="form-control" value="<?= $pr->lokasi_id ?>"> -->
          </div>
          <div class="form-group">
            <label>Id Kegiatan</label>
            <select name="kegiatan_id" class="form-control"> 
              <?php foreach ($kegiatan as $k): ?>
                <?php if ($k->id_kegiatan == $pr->kegiatan_id): ?>
                  <option value="<?= $k->id_kegiatan ?>" selected><?= $k->id_kegiatan ?></option>
                <?php else: ?>
                  <option value="<?= $k->id_kegiatan ?>"><?= $k->id_kegiatan ?></option>
                <?php endif ?>                
              <?php endforeach ?>              
            </select>
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

<?php foreach ($pekerjaan as $no => $pr): ?>
<div class="modal fade" id="exampleModalDetail<?= $pr->id_pekerjaan ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <td><?= $pr->kode_pekerjaan ?></td>
          </tr>
          <tr>
            <th>Nama produk</th>
            <td><?= $pr->lokasi_id ?></td>
          </tr>
          <tr>
            <th>Harga produk</th>
            <td><?= $pr->kegiatan_id ?></td>
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

