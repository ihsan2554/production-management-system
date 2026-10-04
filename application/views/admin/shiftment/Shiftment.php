<!-- ===== NAVBAR ===== -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl"
     id="navbarBlur" navbar-scroll="true">
  <div class="container-fluid py-1 px-3">

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-transparent mb-1 pb-0 pt-1 px-0">
        <li class="breadcrumb-item text-sm">
          <a class="opacity-5 text-dark" href="javascript:;">Pages</a>
        </li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Shiftment</li>
      </ol>
      <h6 class="font-weight-bolder mb-0">Shiftment</h6>
    </nav>

    <div class="ms-auto d-flex align-items-center">
      <h6 class="text-sm font-weight-bolder mb-0 text-dark">Production System</h6>
    </div>
  </div>
</nav>

<!-- ===== CONTENT ===== -->
<div class="container-fluid py-4 shiftment-page">
  <div class="card shadow-sm border-0 rounded-4">

    <!-- Header -->
    <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center pb-3">
      <div class="d-flex align-items-center">
        <i class="material-icons me-2">schedule</i>
        <h6 class="mb-0 fw-bold text-dark">Shiftment Production</h6>
      </div>

      <a href="<?= site_url('admin/plan_shift/addshiftment'); ?>" 
         class="btn btn-dark rounded-3 px-3 py-2 shadow-sm">
        <i class="material-icons text-sm me-1">add</i> ADD SHIFTMENT
      </a>
    </div>

    <!-- Table -->
    <div class="card-body px-4 pb-4 pt-0">
      <div class="table-responsive">
        <table id="table-data" class="table align-items-center mb-0 table-striped">
          <thead class="bg-light">
            <tr>
              <th class="text-xs font-weight-bolder col-center">NO</th>
              <th class="text-xs font-weight-bolder col-left">PLAN</th>
              <th class="text-xs font-weight-bolder col-left">SHIFTMENT</th>
              <th class="text-xs font-weight-bolder col-left">SHIFT HEAD</th>
              <th class="text-xs font-weight-bolder col-left">TIME PROCESS</th>
              <th class="text-xs font-weight-bolder col-left">DATE PROCESS</th>
              <th class="text-xs font-weight-bolder text-center">ACTION</th>
            </tr>
          </thead>

          <tbody id="tbody-original">
            <?php if (!empty($plan_shift)) : $i = 1; foreach ($plan_shift as $value) : ?>
              <tr>
                <td class="col-center"><?= $i++; ?></td>
                <td class="col-left"><?= $value->plan_name; ?></td>
                <td class="col-left"><?= $value->shift_name; ?></td>
                <td class="col-left"><?= $value->staff_name; ?></td>

                <!-- TIME PROCESS -->
                <td class="col-left text-dark text-xs">
                  <?= $value->start_time; ?> - <?= $value->end_time; ?>
                </td>

                <!-- DATE PROCESS -->
                <td class="col-left text-dark text-xs">
                  <?= $value->start_date; ?>
                </td>

                <td class="text-center">
                  <a href="<?= site_url('admin/plan_shift/'.$value->id_planshift.'/delete'); ?>" 
                     class="btn btn-outline-danger btn-sm rounded-3 px-3 py-1">
                    <i class="material-icons text-sm">backspace</i>
                  </a>
                </td>
              </tr>
            <?php endforeach; endif; ?>
          </tbody>
        </table>
      </div>

      <!-- Pagination -->
      <div id="custom-pagination" class="mt-4">
        <span id="page-info"></span>
        <button id="first-page">&laquo;</button>
        <button id="prev-page">&lt;</button>
        <button id="next-page">&gt;</button>
        <button id="last-page">&raquo;</button>
      </div>
    </div>
  </div>
</div>

<!-- ===== STYLE ===== -->
<style>
  .shiftment-page { margin-top: 6px !important; }

  /* HEADER TABLE */
  .table th {
    font-size: .75rem;
    background-color: #f8f9fa !important;
    padding: 12px 14px !important;
  }

  /* DATA TABLE */
  .table td {
    vertical-align: middle !important;
    padding: 12px 14px !important;
    font-size: .78rem;
  }

  /* ALIGNMENT RAPI */
  .col-left { text-align: left !important; }
  .col-center { text-align: center !important; }

  /* Pagination */
  #custom-pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 6px;
  }

  #custom-pagination button {
    border: 1px solid #ddd;
    background: #fff;
    border-radius: 8px;
    padding: 6px 12px;
    font-size: .8rem;
  }

  #custom-pagination button:hover {
    background-color: #eef3ff;
    color: #007bff;
  }

  #custom-pagination button:disabled {
    opacity: .5;
  }
</style>

<!-- ===== SCRIPT Pagination ===== -->
<script>
document.addEventListener("DOMContentLoaded", function () {

    const tbody = document.getElementById("tbody-original");
    const rows = Array.from(tbody.querySelectorAll("tr")).map(row => row.innerHTML);

    let currentPage = 1;
    const rowsPerPage = 8;
    const totalPages = Math.ceil(rows.length / rowsPerPage);
    const pageInfo = document.getElementById("page-info");

    function renderTable() {
        tbody.innerHTML = "";
        const start = (currentPage - 1) * rowsPerPage;
        const end = Math.min(start + rowsPerPage, rows.length);

        for (let i = start; i < end; i++) {
            let tr = document.createElement("tr");
            tr.innerHTML = rows[i];
            tbody.appendChild(tr);
        }

        pageInfo.innerText = `Menampilkan ${start + 1} - ${end} dari ${rows.length} data`;

        document.getElementById("first-page").disabled = currentPage === 1;
        document.getElementById("prev-page").disabled = currentPage === 1;
        document.getElementById("next-page").disabled = currentPage === totalPages;
        document.getElementById("last-page").disabled = currentPage === totalPages;
    }

    document.getElementById("first-page").onclick = () => { currentPage = 1; renderTable(); }
    document.getElementById("prev-page").onclick = () => { if (currentPage > 1) currentPage--; renderTable(); }
    document.getElementById("next-page").onclick = () => { if (currentPage < totalPages) currentPage++; renderTable(); }
    document.getElementById("last-page").onclick = () => { currentPage = totalPages; renderTable(); }

    renderTable();
});
</script>
