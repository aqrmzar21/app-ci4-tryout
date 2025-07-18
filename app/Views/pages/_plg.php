<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>UP3 Gorontalo Page</h1>
    </div>

    <div class="section-body">
      <h3>Data Jumlah Pelanggan</h3>
      <span>
        <?php
        // $koneksi = mysqli_connect("localhost", "root", "", "simpel");
        // $query = "SELECT k.klasifikasi_id, k.jenis_klasifikasi, k.tarif_s, k.tarif_r, k.tarif_b, k.tarif_i, k.tarif_p
        //            FROM kategori k
        //            JOIN klasifikasi kl ON k.klasifikasi_id = kl.klasifikasi_id
        //            JOIN data_utama du ON kl.data_id = du.data_id
        //            JOIN cabang c ON du.cabang_id = c.cabang_id";

        // $result = mysqli_query($koneksi, $query);

        // if ($result) {
        //   $no = 1;
        //   while ($row = mysqli_f etch_assoc($result)) {
        //     echo "<tr>";
        //     echo "<td>{$no}</td>";
        //     echo "<td>{$row['jenis_klasifikasi']}</td>";
        //     echo "<td>{$row['tarif_s']}</td>";
        //     echo "<td>{$row['tarif_r']}</td>";
        //     echo "<td>{$row['tarif_b']}</td>";
        //     echo "<td>{$row['tarif_i']}</td>";
        //     echo "<td>{$row['tarif_p']}</td>";
        //     echo "</tr>";
        //     $no++;
        //   }
        // } else {
        //   echo "<tr><td colspan='7'>Tidak ada data yang ditemukan.</td></tr>";
        // }

        // mysqli_close($koneksi);
        ?>
      </span>
      <div class="card">
        <div class="card-header">
          <!-- <h4>Invoices</h4> -->
          <div class="card-header-action"><a href="../up3/tambahplg" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a></div>
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
              foreach ($plgUP3 as $p) :
              ?>
                <tr>
                  <td><a href="#"><?= $i++; ?></a></td>
                  <td class="font-weight-600"><?= $p['bulan']; ?></td>
                  <td>
                    <div class="badge badge-warning"><?= $p['klasifikasi_id']; ?></div>
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
    </div>
  </section>
</div>
<?= $this->endSection() ?>