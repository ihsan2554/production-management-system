<!-- ======== NAVBAR ======== -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl mt-3" 
     id="navbarBlur" navbar-scroll="true">
  <div class="container-fluid py-3 px-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm">
          <a class="opacity-6 text-secondary" href="javascript:;">Pages</a>
        </li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
          Production
        </li>
      </ol>
      <h5 class="font-weight-bolder mb-0 text-dark">Production</h5>
    </nav>

    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
      <div class="ms-md-auto pe-md-3 d-flex align-items-center">
        <h6 class="text-sm fw-bold text-dark mb-0">Production System</h6>
      </div>
    </div>
  </div>
</nav>

<!-- ======== MAIN CONTENT ======== -->
<div class="container-fluid py-4 pt-2">

  <div class="card border-0 shadow-sm rounded-4 p-4">

    <!-- HEADER BAR -->
    <div class="d-flex justify-content-between align-items-center mb-3">
      <div class="d-flex align-items-center">
        <i class="material-icons me-2 text-secondary">settings_input_component</i>
        <h6 class="fw-bold text-dark mb-0">Production Process</h6>
      </div>
    </div>

    <!-- ===== TABLE ===== -->
    <div class="table-responsive">
      <table id="table-data" class="table align-items-center mb-0">
        <thead>
          <tr>
            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-4 text-center" style="width:5%;">No</th>
            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7" style="width:28%;">Production</th>
            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7" style="width:25%;">Plan</th>
            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 text-center" style="width:10%;">Shiftment</th>
            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 text-center" style="width:10%;">Target</th>
            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 text-center" style="width:12%;">Start Date</th>
            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 text-center" style="width:10%;">Action</th>
          </tr>
        </thead>

        <tbody id="tbody-original">
          <?php if (!empty($production)) : $i = 1; foreach (array_reverse($production) as $value) : ?>
          <tr class="border-bottom align-middle">

            <td class="text-center">
              <h6 class="mb-0 text-sm fw-semibold"><?= $i++; ?></h6>
            </td>

            <td class="text-dark fw-semibold text-sm ps-3">
              <?= $value->staff_name; ?>
            </td>

            <td class="text-secondary fw-semibold text-sm">
              <?= $value->plan_name; ?>
            </td>

            <td class="text-center text-secondary fw-semibold text-sm">
              <?= $value->shift_name; ?>
            </td>

            <td class="text-center fw-semibold text-success text-sm">
              <?= $value->qty_target; ?> Unit
            </td>

            <td class="text-center text-secondary fw-semibold text-sm">
              <?= $value->start_date; ?>
            </td>

            <td class="text-center">
              <?php if ($value->ps_status == 1): ?>
                <a href="<?= site_url('leader/detail_production/'.$value->id_planshift.'/view'); ?>" 
                   class="btn btn-sm text-white px-3 py-1 rounded-pill shadow-sm"
                   style="background: linear-gradient(90deg,#007bff,#00aaff); font-size: 0.75rem; font-weight: 600;">
                   PROCESS
                </a>
              <?php else: ?>
                <span class="badge bg-secondary rounded-pill px-3 py-2">Done</span>
              <?php endif; ?>
            </td>

          </tr>
          <?php endforeach; endif; ?>
        </tbody>
      </table>
    </div>

    <!-- ✅ PAGINATION AREA -->
    <div id="custom-pagination" class="mt-4">
      <span id="page-info"></span>

      <button id="first-page" title="Halaman Pertama">&laquo;</button>
      <button id="prev-page" title="Sebelumnya">&lt;</button>
      <button id="next-page" title="Berikutnya">&gt;</button>
      <button id="last-page" title="Halaman Terakhir">&raquo;</button>
    </div>

  </div>
</div>

<!-- ==== PAGINATION STYLE ==== -->
<style>
#custom-pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 6px;
    margin-top: 20px;
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
</style>

<!-- ==== PAGINATION SCRIPT ==== -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    const tbody = document.getElementById("tbody-original");
    const rowsData = Array.from(tbody.querySelectorAll("tr")).map(row => row.innerHTML);

    let currentPage = 1;
    const rowsPerPage = 10;
    const pageInfo = document.getElementById("page-info");
    const totalPages = Math.ceil(rowsData.length / rowsPerPage);

    function renderTable() {
        tbody.innerHTML = "";
        let start = (currentPage - 1) * rowsPerPage;
        let end = Math.min(start + rowsPerPage, rowsData.length);

        for (let i = start; i < end; i++) {
            let tr = document.createElement("tr");
            tr.classList.add("border-bottom", "align-middle");
            tr.innerHTML = rowsData[i];
            tbody.appendChild(tr);
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
