<?php
// Pastikan Bootstrap & FontAwesome sudah ada di layout utama
// <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
// <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
?>

<style>
  body {
    background: #f5f7fa !important;
  }
  .card {
    border-radius: 18px;
    border: none;
    background: #ffffff;
    box-shadow: 0 8px 20px rgba(0,0,0,0.06);
  }
  .card-header {
    background: transparent;
    border-bottom: 1px solid #f0f0f0;
    font-size: 1rem;
    font-weight: 600;
  }
  .info-label {
    font-size: 0.85rem;
    color: #6c757d;
  }
  .info-value {
    font-weight: 700;
    font-size: 1.2rem;
    color: #212529;
  }
  table thead {
    background: #eef2f6;
    font-weight: 600;
  }
  table tbody tr:hover {
    background-color: #f3f7fb;
  }
  .btn-custom {
    border-radius: 10px;
    padding: 6px 16px;
    font-size: 0.9rem;
  }
  .icon-box {
    width: 38px;
    height: 38px;
    background: #eef3ff;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 12px;
    color: #4c6ef5;
    margin-right: 10px;
  }
  .table th, .table td {
    vertical-align: middle;
    text-align: center;
  }
</style>

<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
  <div class="container-fluid py-1 px-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-transparent mb-1 px-0">
        <li class="breadcrumb-item"><a class="text-dark opacity-6" href="javascript:;">Pages</a></li>
        <li class="breadcrumb-item text-dark active" aria-current="page">Planning</li>
      </ol>
      <h5 class="fw-bold mb-0">Planning</h5>
    </nav>
    <div class="collapse navbar-collapse">
      <div class="ms-auto">
        <h6 class="text-sm fw-bold mb-0">Details Planning</h6>
      </div>
    </div>
  </div>
</nav>

<!-- Content -->
<div class="container-fluid py-4">

  <!-- Header -->
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold text-dark">Planning Details</h4>
  </div>

  <div class="row">
    <!-- Left Section -->
    <div class="col-lg-6">

      <!-- Planning Card -->
      <div class="card mb-4">
        <div class="card-body">
          <h6 class="info-label mb-1">Planning</h6>
          <h4 class="fw-bold text-primary"><?= $plan['plan_name']?></h4>
          <p class="mb-0">
            <span class="info-label">On Project:</span>
            <span class="fw-semibold text-dark"><?= $plan['project_name']?></span>
          </p>
        </div>
      </div>

      <!-- Quantity & Dates -->
      <div class="row">
        <div class="col-md-6 mb-3">
          <div class="card text-center py-3">
            <div class="info-label">Quantity</div>
            <div class="info-value"><?= $plan['qty_request']?> Kg</div>
          </div>
        </div>
        <div class="col-md-6 mb-3">
          <div class="card text-center py-3">
            <div class="info-label">Entry Date</div>
            <div class="info-value"><?= $plan['entry_date']?></div>
            <hr>
            <div class="info-label">Finish Date</div>
            <div class="info-value"><?= $plan['end_date']?></div>
          </div>
        </div>
      </div>

      <!-- Customer Information -->
      <div class="card">
        <div class="card-header">Customer Information</div>
        <div class="card-body">

          <div class="d-flex mb-2">
            <div class="icon-box"><i class="fas fa-user"></i></div>
            <p class="mb-0 fw-semibold"><?= $plan['cust_name']?></p>
          </div>

          <div class="d-flex mb-2">
            <div class="icon-box" style="background:#ffecec;color:#d63031"><i class="fas fa-map-marker-alt"></i></div>
            <p class="mb-0"><?= $plan['address']?></p>
          </div>

          <div class="d-flex mb-2">
            <div class="icon-box" style="background:#ecfff1;color:#00b894"><i class="fas fa-phone"></i></div>
            <p class="mb-0"><?= $plan['telp']?></p>
          </div>

          <div class="d-flex">
            <div class="icon-box" style="background:#fff8e6;color:#fdcb6e"><i class="fas fa-envelope"></i></div>
            <p class="mb-0"><?= $plan['email']?></p>
          </div>

        </div>
      </div>

    </div>

    <!-- Right Section -->
    <div class="col-lg-6">

      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <span class="fw-bold">Shiftment on this Planning</span>
        </div>

        <div class="card-body">

          <div class="row text-center mb-4">
            <div class="col">
              <div class="info-label">Production</div>
              <div class="info-value"><?= $plan['product_name']?></div>
            </div>
            <div class="col">
              <div class="info-label">Diameter</div>
              <div class="info-value"><?= $plan['diameter']?> mm</div>
            </div>
            <div class="col">
              <div class="info-label">Target</div>
              <div class="info-value"><?= $plan['qty_target']?> Unit/Shift</div>
            </div>
          </div>

          <!-- Shiftment Table -->
          <div class="table-responsive">
            <table class="table table-hover align-middle">
              <thead class="text-center">
                <tr>
                  <th>No</th>
                  <th>Plan</th>
                  <th>Head</th>
                  <th>Start Date</th>
                </tr>
              </thead>
              <tbody>
                <?php if(!empty($planshift)): $i=1; foreach($planshift as $value): ?>
                  <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $value->shift_name ?></td>
                    <td><?= $value->staff_name ?></td>
                    <td><?= $value->start_date ?></td>
                  </tr>
                <?php endforeach; else: ?>
                  <tr>
                    <td colspan="4" class="text-center text-muted py-3">No shiftment data available</td>
                  </tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>

        </div>
      </div>

    </div>
  </div>

</div>
