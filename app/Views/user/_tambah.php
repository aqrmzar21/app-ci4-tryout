<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>User Page</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Akun</a></div>
        <div class="breadcrumb-item"><a href="#">Pengaturan Akun </a></div>
        <div class="breadcrumb-item">Tambah Pengguna</div>
      </div>
    </div>

    <div class="section-body">
      <!-- <h3>Data Jumlah Pelanggan</h3> -->
      <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-info alert-dismissible show fade">
          <div class="alert-body">
            <button class="close" data-dismiss="alert">
              <span>&times;</span>
            </button>
            <?= session()->getFlashdata('pesan'); ?>
          </div>
        </div>
      <?php endif; ?>
      <div class="card">
        <div class="card-header text-center">
          <a href="/pengguna" class="mr-4"><i class="fa fa-arrow-left"></i></a>
          <h4>Form Tambah Pengguna</h4>
        </div>
        <div class="card-body">
          <form method="post" action="/pengguna/add">
            <!-- <div class="section-title mt-0">Text</div> -->
            <div class="form-group row">
              <label class="col-sm-3 col-form-label text-right">Nama Lengkap</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" name="nama_pengguna" id="">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label text-right">Level</label>
              <div class="col-sm-6">
                <select class="form-control" name="level" id="">
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label text-right">Unit</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" name="unit" id="">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label text-right">NIP</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" name="nip" id="">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label text-right">Username</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" name="username" id="">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label text-right">Password</label>
              <div class="col-sm-6">
                <input type="password" class="form-control" name="password" id="">
              </div>
            </div>
            <div class="d-flex">
              <button type="submit" class="btn btn-lg btn-primary w-100">Tambah</button>
            </div>

          </form>
        </div>
        <!-- ./div form -->
      </div>
    </div>
    <!-- End Form -->

  </section>
</div>
<?= $this->endSection() ?>