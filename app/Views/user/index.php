<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>

<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>User Page</h1>
    </div>

    <div class="section-body">
      <h1>Hello La Ode</h1>
      <h5>I SEE YOU</h5>

      <div class="card">
        <div class="card-header">
          <h4>Data Staff Pengguna</h4>
          <div class="card-header-action"><a href="/user/tambahuser" class="btn btn-primary">Tambah Baru <i class="fas fa-chevron-right"></i></a></div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped" id="table-1">
              <thead>
                <tr>
                  <th class="text-center">#</th>
                  <th>Level</th>
                  <th>Nama</th>
                  <th>NIP</th>
                  <th>Username</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 1;
                foreach ($user->getResult('array') as $p) :
                ?>
                  <tr>
                    <td>
                      <p class="text-center"><?= $i++; ?>.</p>
                    </td>
                    <td>
                      <?php if ($p['level'] == 1) {
                        echo "Operator";
                      } elseif ($p['level'] == 2) {
                        echo "Admin";
                      } else
                        echo "Pimpinan"
                      ?>
                    </td>
                    <td><?= $p['nama_pengguna']; ?></td>
                    <td><?= $p['nip']; ?></td>
                    <td><?= $p['username']; ?></td>
                    <!-- <td><?= $p['password']; ?></td> -->
                    <td class="justify-content-between">
                      <a href="/pengguna/edituser/<?= $p['id_pengguna']; ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                      <a href="/pengguna/destroy/<?= $p['id_pengguna']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin?')"><i class="fa fa-eraser"></i></a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
  </section>
</div>
<?= $this->endSection() ?>