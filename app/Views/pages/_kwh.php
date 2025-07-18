<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>UP3 Gorontalo Page</h1>
    </div>

    <div class="section-body">
      <h3>Data Penjualan Listrik</h3>

      <!-- <h4>Invoices</h4> -->
      <div class="card">
        <div class="card-header">
          <div class="card-header-action">
            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Data</button>
            <!-- <button class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></button> -->
          </div>
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
                <th>Tarif I</th>
                <th>Tarif P</th>
              </tr>
              <?php
              $i = 1;
              foreach ($kwhUP3 as $p) :
              ?>
                <tr>
                  <td><a href="#"><?= $i++; ?></a></td>
                  <td class="font-weight-600"><?= date('Y-m', strtotime($p['bulan'])); ?></td>
                  <td>
                    <div class="badge badge-warning"><?= $p['jenis_klasifikasi']; ?></div>
                  </td>
                  <td><?= $p['tarif_s']; ?></td>
                  <td><?= $p['tarif_r']; ?></td>
                  <td><?= $p['tarif_b']; ?></td>
                  <td><?= $p['tarif_i']; ?></td>
                  <td><?= $p['tarif_p']; ?></td>
                </tr>
              <?php endforeach; ?>
            </table>
          </div>
        </div>
      </div>
      <!-- /.card -->

      <!-- Modal  -->
      <!-- /.cardModal -->

      <!-- /.cardModal -->

    </div>
  </section>
</div>
<!-- Modal  -->
<div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Form Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="/up3/saveplg">
          <!-- <div class="section-title mt-0">Text</div> -->
          <div class="form-group">
            <label>Bulan</label>
            <input type="month" class="form-control" name="bulan" id="" autofocus>
          </div>
          <!-- <div class="section-title">Select</div> -->
          <div class="form-group">
            <label>Jenis Klasifikasi</label>
            <!-- <div class="col-sm-6"> -->
            <select class="form-control" name="klasifikasi_id" id="">
              <?php
              $plgUP3_unique = [];
              foreach ($kwhUP3 as $key) {
                $plgUP3_unique[$key['klasifikasi_id']] = $key['jenis_klasifikasi'];
              }

              foreach ($plgUP3_unique as $klasifikasi_id => $jenis_klasifikasi) {
                echo "<option value='$klasifikasi_id'>$jenis_klasifikasi</option>";
              }

              ?>
            </select>
            <!-- </div> -->
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label text-right">Tarif S</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="tarif_s" id="" onkeypress="isInputNumber(event)">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label text-right">Tarif R</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="tarif_r" id="" onkeypress="isInputNumber(event)">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label text-right">Tarif B</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="tarif_b" id="" onkeypress="isInputNumber(event)">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label text-right">Tarif I</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="tarif_i" id="" onkeypress="isInputNumber(event)">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label text-right">Tarif P</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="tarif_p" id="" onkeypress="isInputNumber(event)">
            </div>
          </div>
          
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?= $this->endSection() ?>