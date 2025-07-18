<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
  <div class="row">

    <div class="col">
      <h1 class="card-title">
        Ubah Data
      </h1>

      <!-- // cek validasinya (ini tidak jalan)-->
      <?php if (isset($validation)) : ?>
        <?= $validation->listErrors(); ?>
      <?php endif; ?>

      <!-- form ubah data -->
      <form enctype="multipart/form-data" class="row g-3" action="/komik/update/<?= $komik['komik_id']; ?>" method="post">
        <?php csrf_field(); ?>
        <input type="hidden" id="komik_slug" name="komik_slug" value="<?= $komik['komik_slug']; ?>">
        <input type="hidden" name="sampulLama" value="<?= $komik['komik_sampul']; ?>">
        <div class="col-md-6">
          <!-- <label for="sampul" class="form-label">Sampul</label> -->
          <!-- <img src="/img/default.jpg" alt="preview" class="mt-2 form-control img-thumbnail img-preview img-fluid rounded-start"> -->
          <img src="/img/<?= $komik['komik_sampul']; ?>" alt="preview" class="mt-2 img-thumbnail img-preview">
        </div>
        <div class="mb-2 col-md-6 row">
          <label for="komik_judul" class="mt-2 form-label">Judul</label>
          <input autofocus type="text" class="form-control <?= ($validation->hasError('komik_judul')) ? 'is-invalid' : ''; ?>" id="komik_judul" name="komik_judul" placeholder="" value="<?= (old('komik_judul')) ? old('komik_judul') : $komik['komik_judul']; ?>">
          <label for="komik_penulis" class="form-label">Penulis</label>
          <input type="text" class="form-control" id="komik_penulis" name="komik_penulis" value="<?= (old('komik_penulis')) ? old('komik_penulis') : $komik['komik_penulis']; ?>">
          <label for="komik_penerbit" class="form-label">Penerbit</label>
          <input type="text" class="form-control" id="komik_penerbit" name="komik_penerbit" value="<?= (old('komik_penerbit')) ? old('komik_penerbit') : $komik['komik_penerbit']; ?>">
          <label for="komik_tahun" class="form-label">Tahun</label>
          <input type="text" class="form-control" id="komik_tahun" name="komik_tahun" value="<?= (old('komik_tahun')) ? old('komik_tahun') : $komik['komik_tahun']; ?>">
          <label hidden class="form-label custom-file-label" for="komik_sampul">Cover</label>
          <label class="form-label" for="komik_sampul">Cover</label>
          <input type="file" class="custom-file-input form-control" id="komik_sampul" name="komik_sampul" onchange="previewImg()">
        </div>

        <div class="col-4">
          <a href="/komik" style="text-decoration: none;" class="btn btn-dark">Kembali</a>
        </div>
        <div class="col-8">
          <button type="submit" class="btn btn-primary float-end">Ubah</button>
        </div>
      </form>
    </div>
    <!-- /div.col -->
  </div>
  <!-- /div.row -->
</div>
<?= $this->endSection(); ?>