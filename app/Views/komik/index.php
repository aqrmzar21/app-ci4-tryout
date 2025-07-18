<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<h2>Daftar Webton</h2>
<a class="btn btn-primary my-2" href="/komik/create">Tambah Data</a> <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>
<?php if (session()->getFlashdata('pesan')) : ?>
  <div class="alert alert-success" role="alert">
    <?= session()->getFlashdata('pesan'); ?>
  </div>
<?php endif; ?>
<div class="row row-cols-1 row-cols-md-5 g-2">
  <!-- CARD GROUP -->
  <?php foreach ($komik as $k) : ?>
    <div class="col">
      <div class="card text-bg-dark">
        <img src="/img/<?= $k['komik_sampul']; ?>" class="card-img" alt="...">
        <div class="card-img-overlay text-center" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6); ">
          <h6 class="card-title fs-6 text-uppercase">
            <a class="text-light link-underline link-underline-opacity-0" href="<?= site_url('/komik/' . $k['komik_slug']); ?>">
              <?= $k['komik_judul']; ?>
            </a>
          </h6>
          <p class="card-text"><small>[ <?= $k['komik_tahun']; ?> ]</small></p>
          <!-- <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>

<!-- </div> -->
<!-- </div.row  -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Tambah</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="<?= site_url('komik/save'); ?>" method="post" autocomplete="off" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group row mb-3">
            <label for="komik_judul" class="col-sm-2 col-form-label">Judul</label>
            <div class="col-sm-10">
              <input autofocus type="text" class="form-control" id="komik_judul" name="komik_judul" placeholder="" value="<?= old('komik_judul'); ?>">
            </div>
          </div>
          <div class="form-group row mb-3">
            <label for="komik_penulis" class="col-sm-2 col-form-label">Penulis</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="komik_penulis" name="komik_penulis" value="<?= old('komik_penulis'); ?>">
            </div>
          </div>
          <div class="form-group row mb-3">
            <label for="komik_penerbit" class="col-sm-2 col-form-label">Penerbit</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="komik_penerbit" name="komik_penerbit" value="<?= old('komik_penerbit'); ?>">
            </div>
          </div>
          <div class="form-group row mb-3">
            <label for="komik_tahun" class="col-sm-2 col-form-label">Tahun</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="komik_tahun" name="komik_tahun" value="<?= old('komik_tahun'); ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="komik_sampul" class="col-sm-2 col-form-label">Cover</label>
            <div class="col-sm-10">
              <input type="file" class="form-control" id="komik_sampul" name="komik_sampul" value="<?= old('komik_sampul'); ?>">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </form>

    </div>
  </div>
</div>
<!-- ini MODAL  -->
<?= $this->endSection(); ?>