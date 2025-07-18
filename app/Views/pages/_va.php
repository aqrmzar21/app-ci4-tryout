<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>UP3 Gorontalo Page</h1>
    </div>

    <div class="section-body">
      <h3>Data Daya Terpasang</h3>
      <div class="card">
        <div class="card-header">
          <!-- <h4>Invoices</h4> -->
          <!-- <div class="card-header-action"><a href="#" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a></div> -->
        </div>
        <div class="card-body p-0">
          <div class="table-responsive table-invoice">
            <table class="table table-striped">
              <tr>
                <th>#</th>
                <th>Periode</th>
                <th>Klasifikasi</th>
                <th>Tarif S</th>
                <th>Tarif R</th>
                <th>Tarif B</th>
                <th>Due Date</th>
                <th>Action</th>
              </tr>
              <?php $i = 1;
              foreach ($vaUP3 as $d) : ?>
                <tr>
                  <td><a href="#"><?= $i++; ?></a></td>
                  <td>
                    <div class="badge badge-warning"><?= date('F', strtotime($d['bulan'])); ?></div>
                  </td>
                  <!-- <td class="font-weight-600"><?= $d['bulan']; ?></td> -->
                  <td><?= $d['jenis_klasifikasi']; ?> </td>
                  <td><?= $d['tarif_s']; ?></td>
                  <td><?= $d['tarif_r']; ?></td>
                  <td><?= $d['tarif_b']; ?></td>
                  <td><?= $d['tarif_i']; ?></td>
                  <td class="justify-content-between">
                    <a href="/up3/editva/<?= $p['kategori_id']; ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                    <form action="/up3/<?= $p['kategori_id']; ?>" method="post" class="d-inline">
                      <input type="hidden" name="_method" value="DELETE">
                      <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                    </form>
                    <!-- <a href="/up3/delete/<?php // echo $p['kategori_id']; 
                                              ?>" class="btn btn-danger"><i class="fa fa-eraser"></i></a> -->
                  <a href="#" class="btn btn-primary">Detail</a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </table>
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-header">
          <!-- <h4>Invoices</h4> -->
          <!-- <div class="card-header-action"><a href="#" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a></div> -->
        </div>
        <div class="card-body p-0">
          <div class="table-responsive table-invoice">
            <table class="table table-striped">
              <tr>
                <th>#</th>
                <th>Periode</th>
                <th>Klasifikasi</th>
                <th>Tarif S</th>
                <th>Tarif R</th>
                <th>Tarif B</th>
                <th>Due Date</th>
                <th>Action</th>
              </tr>
              <tr>
                <td><a href="#">INV-87239</a></td>
                <td class="font-weight-600">Kusnadi</td>
                <td>
                  <div class="badge badge-warning">Unpaid</div>
                </td>
                <td>July 19, 2018</td>
                <td>July 19, 2018</td>
                <td>July 19, 2018</td>
                <td>July 19, 2018</td>
                <td>
                  <a href="#" class="btn btn-primary">Detail</a>
                </td>
              </tr>
              <tr>
                <td><a href="#">INV-87320</a></td>
                <td class="font-weight-600">Ardian Rahardiansyah</td>
                <td>
                  <div class="badge badge-success">Paid</div>
                </td>
                <td>July 28, 2018</td>
                <td>July 28, 2018</td>
                <td>July 28, 2018</td>
                <td>July 28, 2018</td>
                <td>
                  <a href="#" class="btn btn-primary">Detail</a>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
  </section>
</div>
<?= $this->endSection() ?>