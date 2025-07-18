<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
  <div class="row">

    <div class="col">
      <h1 class="card-title">
        Tambah Data
      </h1>
      <!-- // cek validasinya (ini tidak jalan)-->
      <?php if (isset($validation)) : ?>
        <?= $validation->listErrors(); ?>
      <?php endif; ?>


      <small class="card-text">This is halaman untuk tambah data baru.</small>

      <form class="row g-3" action="<?= site_url('komik/save'); ?>" method="post" autocomplete="off" enctype="multipart/form-data">
        <?php csrf_field(); ?>
        <div class="col-12">
          <label for="komik_judul" class="form-label">Judul</label>
          <input autofocus type="text" class="form-control <?= ($validation->hasError('komik_judul')) ? 'is-invalid' : ''; ?>" id="komik_judul" name="komik_judul" placeholder="" value="<?= old('komik_judul'); ?>">
          <div class="invalid-feedback"><?= $validation->getError('komik_judul'); ?> </div>
        </div>
        <div class="col-md-6">
          <label for="komik_penulis" class="form-label">Penulis</label>
          <input type="text" class="form-control" id="komik_penulis" name="komik_penulis" value="<?= old('komik_penulis'); ?>">
        </div>
        <div class="col-md-6">
          <label for="komik_penerbit" class="form-label">Penerbit</label>
          <input type="text" class="form-control" id="komik_penerbit" name="komik_penerbit" value="<?= old('komik_penerbit'); ?>">
        </div>
        <div class="col-md-12 fs-6">
          <!-- <label for="komik_genre" class="form-label">Genre</label> -->

          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="genre[]" id="genreRomance" value="Romance">
            <label class="form-check-label" for="genreRomance">Romance</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="genre[]" id="genreComedy" value="Comedy">
            <label class="form-check-label" for="genreComedy">Comedy</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="genre[]" id="genreWar" value="War">
            <label class="form-check-label" for="genreWar">War</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="genre[]" id="genreAdventure" value="Adventure">
            <label class="form-check-label" for="genreAdventure">Adventure</label>
          </div>

          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="genre[]" id="genreMusiccaly" value="Musiccaly">
            <label class="form-check-label" for="genreMusiccaly">Musiccaly</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="genre[]" id="genreBiographic" value="Biographic">
            <label class="form-check-label" for="genreBiographic">Biographic</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="genre[]" id="genreSliceoflife" value="Sliceoflife">
            <label class="form-check-label" for="genreSliceoflife">Slice of Life</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="genre[]" id="genreMystery" value="Mystery">
            <label class="form-check-label" for="genreMystery">Mystery</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="genre[]" id="genreFamily" value="Family">
            <label class="form-check-label" for="genreFamily">Family</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="genre[]" id="genreAnnimation" value="Annimation">
            <label class="form-check-label" for="genreAnnimation">Annimation</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="genre[]" id="genreDocumenter" value="Documenter">
            <label class="form-check-label" for="genreDocumenter">Documenter</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="genre[]" id="genreMilitary" value="Military">
            <label class="form-check-label" for="genreMilitary">Military</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="genre[]" id="genreDrama" value="Drama">
            <label class="form-check-label" for="genreDrama">Drama</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="genre[]" id="genreYouth" value="Youth">
            <label class="form-check-label" for="genreYouth">Youth</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="genre[]" id="genreSci-fy" value="Sci-fy">
            <label class="form-check-label" for="genreSci-fy">Sci-Fy</label>
          </div>

          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="genre[]" id="genreRevenge" value="Revenge">
            <label class="form-check-label" for="genreRevenge">Revenge</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="genre[]" id="genreAction" value="Action">
            <label class="form-check-label" for="genreAction">Action</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="genre[]" id="genreThriller" value="Thriller">
            <label class="form-check-label" for="genreThriller">Thriller</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="genre[]" id="genreMelodrama" value="Melodrama">
            <label class="form-check-label" for="genreMelodrama">Melodrama</label>
          </div>

          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="genre[]" id="genreFantasy" value="Fantasy">
            <label class="form-check-label" for="genreFantasy">Fantasy</label>
          </div>

          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="genre[]" id="genreHorror" value="Horror">
            <label class="form-check-label" for="genreHorror">Horror</label>
          </div>
        </div>

        <div class="col-md-10">
          <label for="komik_sampul" class="form-label">Cover</label>
          <input type="file" class="form-control <?= ($validation->hasError('komik_sampul')) ? 'is-invalid' : ''; ?>" id="komik_sampul" name="komik_sampul">
          <div class="invalid-feedback"><?= $validation->getError('komik_sampul'); ?> </div>
        </div>

        <div class="col-md-2">
          <label for="komik_tahun" class="form-label">Tahun</label>
          <input type="text" class="form-control" id="komik_tahun" name="komik_tahun" value="<?= old('komik_tahun'); ?>">
        </div>
        <div class="col-4">
          <a href="/komik" style="text-decoration: none;" class="btn btn-dark">Kembali</a>
        </div>
        <div class="col-8">
          <button type="submit" class="btn btn-primary float-end">Tambah</button>
        </div>
      </form>
    </div>
    <!-- /div.col -->
  </div>
  <!-- /div.row -->
</div>



<?= $this->endSection(); ?>