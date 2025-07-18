<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
  <div class="row">
    <div class="col">
      <!-- <h2>Daftar Webton</h2> -->
      <h2>INI SERVICE US</h2>
    </div>
    <div class="col">
      <a class="btn btn-primary float-end" href="/komik/create">+</a>
    </div>
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Mollitia voluptatibus iste fugit reiciendis assumenda temporibus odit nam atque laborum nulla explicabo eligendi, aspernatur veniam, tempore ducimus accusantium repellat non quibusdam. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Mollitia voluptatibus iste fug</p>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Judul</th>
          <th scope="col">Penulis</th>
          <th scope="col">Penerbit</th>
        </tr>
      </thead>
      <tbody class="table-group-divider">
        <?php
        $i = 1;
        foreach ($komik as $k) : ?>
          <tr>
            <td scope="row"><?= $i++; ?></td>
            <td scope="col"><?= $k['komik_judul']; ?></td>
            <td scope="col"><?= $k['komik_penulis']; ?></td>
            <td scope="col"><a href="<?= site_url('/pages/contact/' . $k['komik_slug']); ?>" class="btn btn-sm btn-primary">Lihat Detail</a></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

  </div>
  <!-- </div.row  -->
</div>

<?= $this->endSection(); ?>