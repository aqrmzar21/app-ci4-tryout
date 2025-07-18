<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<div class="main-content">
  <section class="section">

    <div class="section-header">
      <h1>UP3 Gorontalo Page</h1>
    </div>

    <!-- <div class="card"> -->
    <form action="" method="post">
      <div class="row justify-content-evenly mb-4">
        <div class="col">
          <select class="form-control" name="tahun">
            <?php foreach ($uniqueYears as $tahun) : ?>
              <option value="<?= $tahun ?>" <?= ($tahun == $yearFilter) ? 'selected' : '' ?>>
                <?= $tahun ?>
              </option>
            <?php endforeach; ?>
          </select>
          <button class="btn btn-block btn-primary" type="submit"><i class="fa fa-filter"></i> Filter Tahun</button>
        </div>

        <div class="col">
          <select name="selectedMonth" class="custom-select form-control-border border-width-2">
            <?php foreach ($uniqueMonths as $value => $bulan) : ?>
              <option value="<?= $value ?>" <?= ($value == $selectedMonth) ? 'selected' : '' ?>>
                <?= $bulan ?>
              </option>
            <?php endforeach; ?>
          </select>
          <button type="submit" id="saveButton" name="submit" class="btn btn-primary w-100"><i class="fa fa-filter"></i> Filter Bulan</button>
        </div>

      </div>
    </form>
    <!-- </div> -->
    <!-- /.row -->

    <div class="section-body">
      <!-- <h3>Data Daya Terpasang</h3> -->
      <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-info alert-dismissible show fade">
          <div class="alert-body">
            <button class="close" data-dismiss="alert">
              <span>&times;</span>
            </button>
            <?= session()->getFlashdata('pesan'); ?>
          </div>
        </div>
      <?php endif; ?>

      <div class="card">
        <div class="card-header">
          <h4>Data Daya Terpasang</h4>
          <div class="card-header-action"><a href="/up3/tambahva" class="btn btn-primary">Tambah Baru <i class="fas fa-chevron-right"></i></a></div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped" id="table-1">
              <thead>
                <tr>
                  <th class="text-center">#</th>
                  <th>Periode</th>
                  <th>Klasifikasi</th>
                  <th>Tarif S</th>
                  <th>Tarif R</th>
                  <th>Tarif B</th>
                  <th>Tarif I</th>
                  <th>Tarif P</th>
                  <th>Tarif Total</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 1;
                foreach ($vaUP3 as $p) :
                ?>
                  <tr>
                    <td><a href="#"><?= $i++; ?></a></td>
                    <td class="font-weight-600"><?= date('F Y', strtotime($p['bulan'])); ?></td>
                    <td>
                      <div class="badge badge-warning"><?= $p['jenis_klasifikasi']; ?></div>
                    </td>
                    <td><?= $p['tarif_s']; ?></td>
                    <td><?= $p['tarif_r']; ?></td>
                    <td><?= $p['tarif_b']; ?></td>
                    <td><?= $p['tarif_i']; ?></td>
                    <td><?= $p['tarif_p']; ?></td>
                    <td><?= $p['tarif_total']; ?></td>
                    <td class="justify-content-between">
                      <a href="/up3/editva/<?= $p['kategori_id']; ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                      <a href="/up3/deleteva/<?php echo $p['kategori_id']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin?')"><i class="fa fa-eraser"></i></a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="row">
        <!-- <span class="card-stats-icon"></span> -->
        <!-- <i class="far fa-user"></i> -->
        <!-- <span class="card-stats-icon bg-aqua"></span> -->
        <!-- <i class="far fa-newspaper"></i> -->
        <!-- /.card-stats-content -->
        <!-- /.card-stats -->
        <!-- /.col -->
        <!-- /.card-stats-content -->
        <!-- /.card-stats -->
        <!-- Info Boxes Style 2 -->
        <div class="col-lg-2 col-6">
          <div class="card card-statistic-1">
            <div class="card-icon bg-dark">
              <i class="fas fa-bolt"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Penggunan Daya</h4>
              </div>
              <div class="card-body">
                <!-- Januari -->
                <span><?= $namaBulan; ?></span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-2 col-6">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="fas fa-tag"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Tarif S</h4>
              </div>
              <div class="card-body">
                <?= number_format($total_s, 0, ',', '.'); ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-2 col-6">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="fas fa-tag"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Tarif R</h4>
              </div>
              <div class="card-body">
                <?= number_format($total_r, 0, ',', '.'); ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-2 col-6">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="fas fa-tag"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Tarif B</h4>
              </div>
              <div class="card-body">
                <?= number_format($total_b, 0, ',', '.'); ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-2 col-6">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="fas fa-tag"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Tarif I</h4>
              </div>
              <div class="card-body">
                <?= number_format($total_i, 0, ',', '.'); ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-2 col-6">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="fas fa-tag"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Tarif P</h4>
              </div>
              <div class="card-body">
                <?= number_format($total_p, 0, ',', '.'); ?>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12 col-md-6 col-lg-6">

          <div class="card">
            <div class="card-header">
              <h4>Bar Chart</h4>
            </div>
            <div class="card-body">
              <canvas id="myChart111"></canvas>
              <script>
                var ctx = document.getElementById('myChart111').getContext('2d');
                var myChart = new Chart(ctx, {
                  type: 'bar',
                  data: {
                    labels: ['Tarif S', 'Tarif R', 'Tarif B', 'Tarif I', 'Tarif P'],
                    datasets: [{
                      data: [<?= $total_s; ?>, <?= $total_r; ?>, <?= $total_b; ?>, <?= $total_i; ?>, <?= $total_p; ?>],
                      backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)'
                      ],
                      borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                      ],
                      borderWidth: 1
                    }]
                  },
                  options: {
                    scales: {
                      y: {
                        beginAtZero: true
                      }
                    }
                  }
                });
              </script>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <h4>Donnut Chart</h4>
            </div>
            <div class="card-body">
              <canvas id="mydonutChart"></canvas>
              <script>
                // -------------
                // DONUT CHART -
                // -------------

                var labels = ['Tarif_S', 'Tarif_R', 'Tarif_B', 'Tarif_I', 'Tarif_P'];
                // Hitung total dari semua tarif
                var percentages = [<?= $total_s; ?>, <?= $total_r; ?>, <?= $total_b; ?>, <?= $total_i; ?>, <?= $total_p; ?>];

                var labelsWithPercentage = labels.map(function(label, index) {
                  if (percentages[index] !== undefined) {
                    return label + ' [ ' + ((percentages[index] / percentages.reduce((a, b) => a + b, 0)) * 100).toFixed(2) + '% ]';
                  } else {
                    return label;
                  }
                });

                var ctx = document.getElementById('mydonutChart');
                var myChart = new Chart(ctx, {
                  type: 'pie',
                  data: {
                    // labels: ['VA_S', 'VA_R', 'VA_B', 'VA_I', 'VA_P'],
                    labels: labelsWithPercentage,
                    datasets: [{
                      data: percentages,
                      backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)'
                      ],
                      borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                      ],
                      borderWidth: 1
                    }]
                  },
                  options: {
                    maintainAspectRatio: false,
                    responsive: true,
                    plugins: {
                      legend: {
                        position: 'left', // Atur posisi legenda ke kiri
                      },
                    },
                  }
                });
              </script>
            </div>
          </div>

        </div>
        <!-- /. col-6 -->
        <div class="col-12 col-md-6 col-lg-6">

          <div class="card">
            <div class="card-header">
              <h4>Chart Bar Akumulasi</h4>
            </div>
            <div class="card-body">
              <div id="bar-chart" style="height: 400px;"></div>
              <script type="text/javascript">
                /*
                 * BAR CHART
                 * -----------
                 */

                var barData = [{
                    label: 'Series1',
                    data: [
                      ['Jan', 10],
                      ['Feb', 20],
                      ['Mar', 30],
                      ['Apr', 40],
                      ['May', 50]
                    ],
                    bars: {
                      show: true,
                      barWidth: 0.2,
                      align: 'edge'
                    },
                    color: '#3c8dbc'
                  },
                  {
                    label: 'Series1',
                    data: [
                      ['Jan', 220],
                      ['Feb', 110],
                      ['Mar', 235],
                      ['Apr', 154],
                      ['May', 195]
                    ],
                    bars: {
                      show: true,
                      barWidth: 0.2,
                      align: 'edge'
                    },
                    color: '#ac8555'
                  }
                ];

                // Kemudian, kita membuat grafik
                $.plot('#bar-chart', barData, {
                  xaxis: {
                    tickLength: 0, // ini akan menghapus garis sumbu x
                    mode: 'categories', // ini akan memungkinkan kita menggunakan kategori (dalam hal ini, bulan) sebagai label sumbu x
                    tickLength: 0
                  },
                  grid: {
                    hoverable: true,
                    clickable: true,
                    borderWidth: 1,
                    borderColor: '#f3f3f3',
                    tickColor: '#f3f3f3'
                  },
                  legend: {
                    show: false
                  }
                });

                /*
                 * END BAR CHART
                 */
              </script>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <h4>Chart Presentase Akumulasi</h4>
            </div>
            <div class="card-body">
              <div id="donut-chart" style="height: 400px;"></div>
              <script type="text/javascript">
                /*
                 * DONUT CHART
                 * -----------
                 */

                var donutData = [{
                    label: 'Series2',
                    data: 30,
                    color: '#3c8dbc'
                  },
                  {
                    label: 'Series3',
                    data: 20,
                    color: '#0073b7'
                  },
                  {
                    label: 'Series4',
                    data: 50,
                    color: '#00c0ef'
                  }
                ]
                $.plot('#donut-chart', donutData, {
                  series: {
                    pie: {
                      show: true,
                      radius: 1,
                      innerRadius: 0.5,
                      label: {
                        show: true,
                        radius: 2 / 3,
                        formatter: labelFormatter,
                        threshold: 0.1
                      }

                    }
                  },
                  legend: {
                    show: false
                  }
                })
                /*
                 * END DONUT CHART
                 */

                function labelFormatter(label, series) {
                  return "<div style='font-size:13px; text-align:center; padding:2px; color: white;'>" + label + "<br/>" + Math.round(series.percent) + "%</div>";
                }
              </script>
            </div>
          </div>

        </div>
      </div>

    </div>
  </section>

</div>
<?= $this->endSection() ?>