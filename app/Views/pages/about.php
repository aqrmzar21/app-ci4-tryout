<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="row">

  <div class="col-8">
    <h2>INI ABOUT TEAM</h2>
  </div>
  <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Mollitia voluptatibus iste fugit reiciendis assumenda temporibus odit nam atque laborum nulla explicabo eligendi, aspernatur veniam, tempore ducimus accusantium repellat non quibusdam.</p>
  <div class="col-4">
    <form action="<?= base_url('/pages/about'); ?>" method="post">
      <div class="input-group input-group-sm mb-3 justify-content-end">
        <input name="keyword" type="text" class="form-control" placeholder="masukkan keyword pencarian.. " aria-label="search" aria-describedby="search2">
        <button name="submit" class="btn btn-outline-secondary" type="submit" id="search2">Search</button>
      </div>
    </form>
  </div>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
        <th scope="col">Alamat</th>
      </tr>
    </thead>
    <tbody class="table-group-divider">
      <?php
      $i = 1 + (10 * ($currentPage - 1));
      foreach ($orang as $o) : ?>
        <tr>
          <td scope="row"><?= $i++; ?></td>
          <td scope="col"><?= $o['nama']; ?></td>
          <td scope="col"><?= $o['alamat']; ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <?php
  // echo $pager->links() 
  ?>
  <?= $pager->links('orang', 'orang_pagination') ?>
</div>
<?= $this->endSection(); ?>