<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
  <h2>INI HOME WORLD</h2>
  <!-- <div class="card-group"> -->
  <div class="row row-cols-1 row-cols-md-3 g-4">

    <!-- CARD GROUP -->
    <?php foreach ($komik as $k) : ?>
      <div class="col">
        <div class="card text-bg-dark">
          <img src="/img/<?= $k['komik_sampul']; ?>" class="card-img" alt="...">
          <div class="card-img-overlay text-center text-uppercase" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6); ">
            <h5 class="card-title fs-6"><?= $k['komik_judul']; ?></h5>
            <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
            <p class="card-"><small><?= $k['komik_tahun']; ?></small></p>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <!-- ini akhir /div-container -->
</div>
<?= $this->endSection(); ?>