<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>

<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Dashbord Page</h1>
    </div>

    <div class="section-body">
      <!-- <h1>Hello Ganteng</h1> -->
      <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima odio assumenda cupiditate reiciendis laudantium culpa recusandae vel distinctio natus repellat perferendis et, ex voluptatibus quisquam aliquid pariatur dignissimos aperiam dolorum!</p> -->
      <div class="row">
        <div class="col-12 mb-4">
          <div class="hero bg-primary text-white">
            <div class="hero-inner">
              <h2>Welcome Back, Ganteng!</h2>
              <p class="lead">This page is a place to manage posts, categories and more.</p>
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="card">
            <div class="card-header">
              <h4>Bar Chart</h4>
            </div>
            <div class="card-body">
              
              <div id="donut-chart" style="height: 300px;"></div>

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