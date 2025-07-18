<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="row d-flex justify-content-center">
  <h2 class="text-center">INI HOME WORLD</h2>

  <div class="col-6 mb-3 mx-auto">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <?php foreach ($komik as $index => $k) : ?>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?= $index; ?>"
            class="<?= $index === 0 ? 'active' : ''; ?>"
            aria-current="<?= $index === 0 ? 'true' : 'false'; ?>"
            aria-label="Slide <?= $index + 1; ?>"></button>
        <?php endforeach; ?>
      </div>
      <div class="carousel-inner">
        <?php foreach ($komik as $index => $k) : ?>
          <div class="carousel-item <?= $index === 0 ? 'active' : ''; ?>">
            <img src="/img/<?= $k['komik_sampul']; ?>" class="d-block w-100" alt="<?= $k['komik_judul']; ?>">
            <div class="carousel-caption d-none d-md-block">
              <h5 class="c-shadow"><?= $k['komik_judul']; ?></h5>
              <p><?= $k['komik_tahun']; // Deskripsi opsional jika ada 
                  ?></p>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

  </div>

</div>
<!-- ini akhir /div-container -->

<!-- <div class="row row-cols-1 row-cols-md-3 g-4"> -->
<div class="row d-flex justify-content-center">
  <div class="col-md-12 mb-3 mx-auto text-center">
    <?php foreach ($komik as $k) : ?>
      <div class="d-inline-block mb-2">
        <a class="btn btn-primary" data-bs-toggle="collapse" href="#<?= $k['komik_id']; ?>Collapse" role="button" aria-expanded="false" aria-controls=<?= $k['komik_id']; ?>Collapse"><?= $k['komik_judul']; ?></a>
        <!-- <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls=collapseExample">Button with data-bs-target</button> -->
      </div>
      <div class="collapse row mb-3" id="<?= $k['komik_id']; ?>Collapse">
        <div class="col-md-6 mx-auto text-center">

          <div class="card text-dark text-center">

            <!-- CARD GROUP -->
            <div class="card-body text-center c-shadow my-2 mx-4 overflow-auto">
              <p class="card-text text-wrap"><?= $k['komik_genre']; ?></p>
              <p class="card-text text-wrap"><small><?= $k['komik_tahun']; ?></small></p>
              <p class="card-text text-wrap">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <p class="card-text text-wrap"><?= $k['komik_penerbit']; ?></p>
              <p class="card-text text-wrap"><?= $k['komik_penulis']; ?></p>
              <p class="card-text text-wrap"><?= $k['komik_deskripsi']; ?></p>
            </div>

          </div>
          <!-- /div col-6  -->
        </div>
      </div>

    <?php endforeach; ?>
  </div>

  <div class="col">
  </div>
</div>

<?= $this->endSection(); ?>