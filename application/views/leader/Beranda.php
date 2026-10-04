<?php
// ================= AMBIL DATA UNTUK CHART ==================
$koneksi = new mysqli("localhost", "root", "", "db_production");

// Query ambil data chart dari DB
$query_chart = $koneksi->query("
    SELECT p.plan_name, p.qty_target, f.total_finished
    FROM planning p
    LEFT JOIN finished_report f ON p.id_project = f.id_project
    ORDER BY p.id_project ASC
");

$labels = [];
$target = [];
$finished_chart = [];

while ($row = $query_chart->fetch_assoc()) {
    $labels[] = $row['plan_name'];
    $target[] = $row['qty_target'];
    $finished_chart[] = $row['total_finished'];
}
// ================= INFO MAX & MIN ==================
$max_target = !empty($target) ? max($target) : 0;
$min_target = !empty($target) ? min($target) : 0;

$max_finished = !empty($finished_chart) ? max($finished_chart) : 0;
$min_finished = !empty($finished_chart) ? min($finished_chart) : 0;

$label_max_target   = $labels[array_search($max_target, $target)] ?? '-';
$label_min_target   = $labels[array_search($min_target, $target)] ?? '-';

$label_max_finished = $labels[array_search($max_finished, $finished_chart)] ?? '-';
$label_min_finished = $labels[array_search($min_finished, $finished_chart)] ?? '-';


$labels_json = json_encode($labels);
$target_json = json_encode($target);
$finished_json = json_encode($finished_chart);
?>

<!-- ===== NAVBAR (UPDATED & SEJAJAR) ===== -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl align-items-center"
     id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-2 px-3 d-flex justify-content-between align-items-center">

        <!-- LEFT : Breadcrumb + Title -->
        <div class="d-flex flex-column">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0">
                    <li class="breadcrumb-item text-sm">
                        <a class="opacity-5 text-dark" href="javascript:;">Pages</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
                </ol>
            </nav>
            <h6 class="font-weight-bolder mb-0">Dashboard</h6>
        </div>

        <!-- RIGHT : Production System + Logout -->
        <div class="d-flex align-items-center gap-3">
            <h6 class="text-sm font-weight-bolder mb-0 me-3">Production System</h6>

            <a href="<?= site_url('leader/logout'); ?>" class="btn gradient-dark mb-0 d-flex align-items-center">
                Logout
                <i class="material-icons ms-1">arrow_forward</i>
            </a>
        </div>
    </div>
</nav>

<!-- ===== STYLE CUSTOM ===== -->
<style>
.navbar-main { height: 80px !important; display: flex; align-items: center; }

.carousel-fade .carousel-item { opacity: 0; transition: opacity 1.5s ease-in-out; }
.carousel-fade .carousel-item.active { opacity: 1; }

#dashboardCarousel {
  border-radius: 15px;
  overflow: hidden;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
  margin: 0 15px 30px 15px;
}
#dashboardCarousel .carousel-inner img {
  width: 100%; height: 350px; object-fit: cover;
}

.carousel-indicators li {
  width: 12px; height: 12px; border-radius:50%;
  background-color: #aaa;
}
.carousel-indicators .active {
  background-color: #dbd9d9ff;
  transform: scale(1.2);
}

.card.card-stats {
  min-height: 160px; border-radius: 12px;
  box-shadow: 0 3px 10px rgba(0,0,0,0.1);
  transition: transform 0.2s ease-in-out;
}
.card.card-stats:hover { transform: translateY(-5px); }
.card .card-icon { margin: 0 auto; text-align: center; }

/* === STYLE CHART === */
.chart-scroll {
    overflow-x: auto;
    white-space: nowrap;
}
.chart-wrapper {
    width: 1600px;
}
canvas {
    width: 100% !important;
    max-height: 380px;
}
</style>

<!-- ===== CAROUSEL ===== -->
<div id="dashboardCarousel" class="carousel slide carousel-fade mb-4" data-ride="carousel" data-interval="4000">

  <ol class="carousel-indicators custom-indicators">
    <li data-target="#dashboardCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#dashboardCarousel" data-slide-to="1"></li>
    <li data-target="#dashboardCarousel" data-slide-to="2"></li>
  </ol>

  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="https://www.inchcape.com/~/media/images/i/inchcape/corp/templates/news/content/year-2024/singaporeroad_atnight-1440x700.jpg">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://www.inchcape.com/~/media/images/i/inchcape/corp/templates/news/content/year-2024/adam-borkowski-rqngd1wl6lg-unsplash-1440x700.jpg?">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://www.inchcape.com/~/media/images/i/inchcape/corp/templates/news/content/year-2024/background-image-scaled-1-1440x700.jpg">
    </div>
  </div>

  <a class="carousel-control-prev" href="#dashboardCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#dashboardCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>

<br>

<!-- ===== DASHBOARD CONTENT ===== -->
<div class="content">
    <div class="container-fluid">

        <!-- ========================= CARD ROW ========================= -->
    <div class="row pb-3">

    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">

                <i class="material-icons">add_task</i>
                <p class="card-category">Projects</p>
                <h3 class="card-title counter"><?= $project ?></h3>

            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">

                <i class="material-icons">exit_to_app</i>
                <p class="card-category">Planning</p>
                <h3 class="card-title counter"><?= $planning ?></h3>

            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">

                <i class="material-icons">info_outline</i>
                <p class="card-category">Production</p>
                <h3 class="card-title counter"><?= $plan_shift ?></h3>

            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">

                <i class="material-icons">done_all</i>
                <p class="card-category">Project Progress</p>
                <h3 class="card-title counter"><?= $finished_report ?></h3>

            </div>
        </div>
    </div>

</div>


        <!-- ===================================================== -->
<!-- ===============  DIAGRAM CHART (SCROLL) ============= -->
<!-- ===================================================== -->
<div class="row mt-3">
    <div class="col-lg-12">
        <div class="card">

            <!-- HEADER -->
            <div class="card-header card-header-info py-2">
                <h4 class="card-title mb-0">Production Chart</h4>
                <p class="card-category mb-0">Target Achievement Analysis</p>
            </div>

            <!-- ===== INFO MINI (SPASI RAPAT) ===== -->
            <div class="card-body py-2">
                <div class="row">

                    <div class="col-md-4 col-6">
                        <small class="text-muted">Target Terbanyak</small><br>
                        <strong><?= $label_max_target ?></strong>
                        <span class="text-muted">(<?= $max_target ?>)</span>
                    </div>

                    <div class="col-md-4 col-6">
                        <small class="text-muted">Target Tersedikit</small><br>
                        <strong><?= $label_min_target ?></strong>
                        <span class="text-muted">(<?= $min_target ?>)</span>
                    </div>

                </div>
            </div>

            <!-- ===== CHART ===== -->
            <div class="card-body pt-0 pb-2 chart-scroll">
                <div class="chart-wrapper">
                    <canvas id="chartTarget"></canvas>
                </div>
            </div>

        </div>
    </div>
</div>


        <!-- ========================= TABLE ROW ========================= -->
        <div class="row mt-4">

            <!-- TABEL PROGRESS -->
            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-header card-header-rose pb-0">
                        <h4 class="card-title">Production Progress</h4>
                    </div>
                    <div class="card-body table-responsive pt-0">
                        <table class="table table-hover">
                            <thead class="text-rose">
                                <th>ID</th>
                                <th>Customer</th>
                                <th>Component</th>
                                <th>Finished</th>
                            </thead>
                            <tbody>
                                <?php if (!empty($finished)) : $i=1; foreach ($finished as $value) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $value->cust_name ?></td>
                                    <td><?= $value->qty_request ?> Kg</td>
                                    <td><?= $value->total_finished ?> Unit</td>
                                </tr>
                                <?php endforeach; endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- TABEL HISTORY -->
            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-header card-header-warning pb-0">
                        <h4 class="card-title">Production History</h4>
                    </div>
                    <div class="card-body table-responsive pt-0">
                        <table class="table table-hover">
                            <thead class="text-warning">
                                <th>ID</th>
                                <th>Planning</th>
                                <th>Shiftment</th>
                                <th>Finished</th>
                            </thead>
                            <tbody>
                                <?php if (!empty($sorting)) : $i=1; foreach ($sorting as $value) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $value->plan_name ?></td>
                                    <td><?= $value->staff_name ?></td>
                                    <td><?= $value->finished ?> Unit</td>
                                </tr>
                                <?php endforeach; endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

<!-- =============== CHART.JS SCRIPT ================= -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
let labels = <?= $labels_json ?>;
let target = <?= $target_json ?>;
let finished = <?= $finished_json ?>;

new Chart(document.getElementById('chartTarget'), {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [
            {
                label: "Target",
                data: target,
                backgroundColor: "rgba(54,162,235,0.6)",
                borderColor: "rgba(54,162,235,1)",
                borderWidth: 1
            },
            {
                label: "Finished",
                data: finished,
                backgroundColor: "rgba(75,192,192,0.6)",
                borderColor: "rgba(75,192,192,1)",
                borderWidth: 1
            }
        ]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: { y: { beginAtZero: true }},
        plugins: { legend: { position: "top" }}
    }
});
</script>
