<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>UP3 Gorontalo Page</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">UP3</a></div>
        <div class="breadcrumb-item"><a href="#">Data Daya Terpasang</a></div>
        <div class="breadcrumb-item">Perbarui Data</div>
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
          <a href="/up3/datava" class="mr-4"><i class="fa fa-arrow-left"></i></a>
          <h4>Form Edit Data</h4>
        </div>
        <div class="card-body">
          <?php
          foreach ($vaUP3 as $p) :
          ?>
            <form method="post" action="/up3/updateva/<?= $p['kategori_id']; ?>">
              <!-- <div class="section-title mt-0">Text</div> -->
              <input type="hidden" value="<?= $p['kategori_id']; ?>" name="kategori_id">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label text-right">Bulan</label>
                <div class="col-sm-6">
                  <input type="month" class="form-control" value="<?php echo date('Y-m', strtotime($p['bulan'])); ?>" name="bulan" id="" autofocus>
                </div>
              </div>
              <!-- <div class="section-title">Select</div> -->
              <div class="form-group row">
                <label class="col-sm-3 col-form-label text-right">Jenis Klasifikasi</label>
                <div class="col-sm-6">
                  <select class="form-control" name="klasifikasi_id" id="">
                    <option value="3" <?= $p['jenis_klasifikasi'] == 'Pra Bayar' ? 'selected' : ''; ?>>Pra Bayar</option>
                    <option value="4" <?= $p['jenis_klasifikasi'] == 'Pasca Bayar' ? 'selected' : ''; ?>>Pasca Bayar</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label text-right">Tarif S</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" value="<?= $p['tarif_s']; ?>" name="tarif_s" id="" onkeypress="isInputNumber(event)">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label text-right">Tarif R</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" value="<?= $p['tarif_r']; ?>" name="tarif_r" id="" onkeypress="isInputNumber(event)">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label text-right">Tarif B</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" value="<?= $p['tarif_b']; ?>" name="tarif_b" id="" onkeypress="isInputNumber(event)">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label text-right">Tarif I</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" value="<?= $p['tarif_i']; ?>" name="tarif_i" id="" onkeypress="isInputNumber(event)">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label text-right">Tarif P</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" value="<?= $p['tarif_p']; ?>" name="tarif_p" id="" onkeypress="isInputNumber(event)">
                </div>
              </div>
              <div class="d-flex">
                <button type="submit" class="btn btn-lg btn-primary w-100">Update</button>
              </div>

            </form>
          <?php endforeach; ?>
        </div>
        <!-- ./div form -->
      </div>
    </div>
    <!-- End Form -->

  </section>
</div>
<?= $this->endSection() ?>