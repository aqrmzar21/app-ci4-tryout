<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
  <div class="card mb-3">
    <div class="row g-0">

      <div class="col-md-3">
        <img src="/img/<?= $komik['komik_sampul']; ?>" class=" h-100 img-fluid rounded-start" alt="...">
      </div>
      <div class="col-md-9">
        <div class="card-body">

          <span class="card-title fs-6"><?= $komik['komik_tahun']; ?></span>
          <p class="card-title fs-2"><?= $komik['komik_judul']; ?></p>
          <span class="card-text "><small class="text-body-secondary">Thriller/Action/Youth</small></span>
          <p class="card-text py-0"><b>Penulis : </b><?= $komik['komik_penulis']; ?></p>
          <p class="card-text "><b>Penerbit : </b><?= $komik['komik_penerbit']; ?></p>
          <!-- <span class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</span> -->

        </div>
        <!-- /div card.body -->
        <div class="card-footer">
          <!-- <div class="col"> -->
          <a href="/pages/contact" class="btn btn-sm btn-secondary text-end float-end">Back</a>
          <a href="/komik/edit/<?= $komik['komik_slug']; ?>" class="btn btn-sm btn-warning">Ubah</a>

          <!-- // button hapus data -->
          <!-- <a href="" class="btn btn-sm btn-danger">Hapus</a> -->
          <form class="d-inline" action="/komik/<?= $komik['komik_id']; ?>" method="post">
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('apakah anda yakin?');">Hapus</button>
          </form>
          <!-- </div> -->

        </div>
        <!-- /div card.footer -->
      </div>

    </div>
    <!-- /div row.-->

  </div>
</div>

</div>
</div>
<?= $this->endSection(); ?>