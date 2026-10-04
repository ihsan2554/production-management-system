<!-- ======== NAVBAR ======== -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" 
     id="navbarBlur" navbar-scroll="true">
  <div class="container-fluid py-1 px-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm">
          <a class="opacity-5 text-dark" href="javascript:;">Pages</a>
        </li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Staff</li>
      </ol>
      <h6 class="font-weight-bolder mb-0">Shift</h6>
    </nav>
    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
      <div class="ms-md-auto pe-md-3 d-flex align-items-center">
        <h6 class="text-sm font-weight-bolder mb-0">Production System</h6>
      </div>
    </div>
  </div>
</nav>

<!-- ======== CARD + TABLE ======== -->
<div class="container-fluid py-4 pt-2 planning-page">
  <div class="card shadow-sm border-0 rounded-4 mx-auto" style="max-width: 1200px;">
    <!-- Header -->
    <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center px-4 py-3">
      <div class="d-flex align-items-center">
        <i class="material-icons me-2 text-secondary">task</i>
        <h6 class="mb-0 fw-bold text-dark">Data Shift</h6>
      </div>
      <a href="<?= site_url('admin/staff/addstaff'); ?>" class="btn btn-dark shadow-sm px-3 rounded-3">
        + Add Shift
      </a>
    </div>

    <!-- Table -->
    <div class="card-body px-4 pb-4 pt-0">
      <div class="table-responsive">
        <table id="table-data" class="table align-middle mb-0">
          <thead class="table-light">
            <tr>
              <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-4">No</th>
              <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Shift Name</th>
              <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Phone</th>
              <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Email</th>
              <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Status</th>
              <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 text-center pe-4">Action</th>
            </tr>
          </thead>

          <tbody id="tbody-original">
            <?php if (!empty($staff)) : $i = 1; foreach ($staff as $value) : ?>
            <tr class="border-bottom">
              <td class="ps-4"><span class="text-sm"><?= $i++; ?></span></td>
              <td><span class="text-sm"><?= $value->staff_name; ?></span></td>
              <td><span class="text-sm"><?= $value->phone; ?></span></td>
              <td><span class="text-sm"><?= $value->email; ?></span></td>
              <td>
                <?php if ($value->st_status == 1): ?>
                  <span class="badge bg-light text-dark border shadow-sm px-3 py-2">Ready</span>
                <?php elseif ($value->st_status == 2): ?>
                  <span class="badge bg-light text-dark border shadow-sm px-3 py-2">Scheduled</span>
                <?php endif; ?>
              </td>
              <td class="text-center pe-4">
                <a href="<?= site_url('admin/staff/'.$value->id_staff.'/update'); ?>" 
                   class="text-secondary me-3" title="Edit">
                  <i class="material-icons">edit</i>
                </a>
                <a href="<?= site_url('admin/deleteStaff/'.$value->id_staff); ?>" 
                   class="text-danger" title="Remove">
                  <i class="material-icons">close</i>
                </a>
              </td>
            </tr>
            <?php endforeach; else: ?>
            <tr>
              <td colspan="6" class="text-center text-muted py-3">No data available</td>
            </tr>
            <?php endif; ?>
          </tbody>
        </table>

        <!-- ===== Pagination Elegan ===== -->
        <div id="custom-pagination" class="mt-4">
          <span id="page-info"></span>

          <button id="first-page" title="Halaman Pertama">&laquo;</button>
          <button id="prev-page" title="Sebelumnya">&lt;</button>
          <button id="next-page" title="Berikutnya">&gt;</button>
          <button id="last-page" title="Halaman Terakhir">&raquo;</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ======== STYLE ======== -->
<style>
  /* ====== JARAK ANTARA NAVBAR DAN CARD ====== */
  .planning-page {
    margin-top: 8px !important;
  }

  /* ====== CARD ====== */
  .card {
    border-radius: 1rem !important;
  }

  .card-header {
    border-bottom: 1px solid #e9ecef;
  }

  /* ====== TABLE ====== */
  .table {
    border-collapse: separate;
    border-spacing: 0;
    width: 100%;
  }

  .table th {
    font-size: 0.75rem;
    color: #6c757d !important;
    background-color: #f8f9fa !important;
    text-align: left;
    vertical-align: middle;
  }

  .table td {
    vertical-align: middle;
    font-size: 0.875rem;
  }

  .table tbody tr:hover {
    background-color: #f9fafb;
    transition: 0.3s ease;
  }

  /* ====== BADGE ====== */
  .badge {
    border-radius: 6px;
    font-size: 0.7rem;
  }

  /* ====== BUTTON ====== */
  .btn-dark {
    font-size: 0.8rem;
    font-weight: 600;
    border-radius: 10px;
  }

  /* ====== ICON ====== */
  .material-icons {
    vertical-align: middle;
    font-size: 20px;
  }

  /* ====== PAGINATION ====== */
  #custom-pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 6px;
    margin-top: 25px;
    padding: 10px 0;
  }

  #custom-pagination button {
    border-radius: 8px;
    border: 1px solid #ddd;
    background-color: white;
    color: #344767;
    font-size: 0.8rem;
    padding: 6px 12px;
    transition: all 0.3s ease;
    box-shadow: 0 1px 3px rgba(0,0,0,0.1);
  }

  #custom-pagination button:hover {
    background-color: #f1f5fb;
    color: #007bff;
  }

  #custom-pagination button:disabled {
    opacity: 0.5;
    cursor: not-allowed;
  }

  #page-info {
    color: #555;
    font-size: 0.85rem;
    font-weight: 500;
    margin-right: 10px;
  }

  /* ====== RESPONSIVE ====== */
  @media (max-width: 992px) {
    .card {
      margin: 0 10px;
    }
  }
</style>

<!-- ======== SCRIPT PAGINATION ======== -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    const tbody = document.getElementById("tbody-original");
    const rowsData = Array.from(tbody.querySelectorAll("tr")).map(row => row.outerHTML);

    let currentPage = 1;
    const rowsPerPage = 10;
    const totalPages = Math.ceil(rowsData.length / rowsPerPage);
    const pageInfo = document.getElementById("page-info");

    function renderTable() {
        tbody.innerHTML = "";
        let start = (currentPage - 1) * rowsPerPage;
        let end = Math.min(start + rowsPerPage, rowsData.length);
        for (let i = start; i < end; i++) {
            tbody.insertAdjacentHTML("beforeend", rowsData[i]);
        }

        pageInfo.innerText = `Menampilkan ${start + 1} - ${end} dari ${rowsData.length} data`;

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
