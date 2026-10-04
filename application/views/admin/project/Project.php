<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
  <div class="container-fluid py-1 px-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm">
          <a class="opacity-5 text-dark" href="javascript:;">Pages</a>
        </li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Projects</li>
      </ol>
      <h6 class="font-weight-bolder mb-0">Projects</h6>
    </nav>
    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
      <div class="ms-md-auto pe-md-3 d-flex align-items-center">
        <h6 class="text-sm font-weight-bolder mb-0">Production System</h6>
      </div>
    </div>
  </div>
</nav>

<!-- Content -->
<div class="container-fluid py-4">
  <div class="card shadow-sm border-0">

    <!-- Header -->
    <div class="card-header d-flex justify-content-between align-items-center bg-white border-0 pb-3">
      <h6 class="mb-0 font-weight-bold d-flex align-items-center">
        <i class="material-icons me-2 text-dark">assignment</i> Data Projects
      </h6>
      <a href="<?= site_url('admin/project/addproject'); ?>" class="btn btn-dark btn-sm shadow-sm">
        <i class="material-icons me-1">add</i> Add Projects
      </a>
    </div>

    <!-- Body -->
    <div class="card-body pt-0">
      <div class="table-responsive">

        <table id="table-data" class="table table-bordered align-items-center mb-0">
          <thead class="bg-light">
            <tr>
              <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">No</th>
              <th class="text-start text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Project</th>
              <th class="text-start text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Client</th>
              <th class="text-start text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Product</th>
              <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Diameter</th>
              <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Quantity</th>
              <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Entry Date</th>
              <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Action</th>
            </tr>
          </thead>

          <tbody id="tbody-project">
            <?php if (!empty($project)) : $i = 1; foreach (array_reverse($project) as $value) : ?>
              <tr class="<?= $i % 2 == 0 ? 'bg-light' : ''; ?>">
                <td class="text-center text-sm"><?= $i++; ?></td>
                <td class="text-start text-sm font-weight-bold"><?= $value->project_name; ?></td>
                <td class="text-start text-sm"><?= $value->cust_name; ?></td>
                <td class="text-start text-sm"><?= $value->product_name; ?></td>
                <td class="text-center text-sm"><?= $value->diameter; ?> mm</td>
                <td class="text-center text-sm"><?= $value->qty_request; ?> Kg</td>
                <td class="text-center text-sm"><?= $value->entry_date; ?></td>
                <td class="text-center text-sm">
                  <a href="<?= site_url('admin/project/'.$value->id_project.'/view'); ?>" 
                     class="btn btn-outline-info btn-sm">
                    <i class="material-icons text-sm me-1">edit</i> Update
                  </a>
                </td>
              </tr>
            <?php endforeach; endif; ?>
          </tbody>
        </table>

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
  </div>
</div>

<!-- ✅ PAGINATION STYLE -->
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

<!-- ✅ PAGINATION SCRIPT -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    const tbody = document.getElementById("tbody-project");
    const rowsData = Array.from(tbody.querySelectorAll("tr")).map(row => {
        const c = row.querySelectorAll("td");
        return {
            project: c[1]?.innerText,
            customer: c[2]?.innerText,
            product: c[3]?.innerText,
            diameter: c[4]?.innerText,
            quantity: c[5]?.innerText,
            date: c[6]?.innerText,
            action: c[7]?.innerHTML
        };
    });

    let currentPage = 1;
    const rowsPerPage = 10;
    const totalPages = Math.ceil(rowsData.length / rowsPerPage);
    const pageInfo = document.getElementById("page-info");

    function renderTable() {
        tbody.innerHTML = "";
        let start = (currentPage - 1) * rowsPerPage;
        let end = Math.min(start + rowsPerPage, rowsData.length);

        for (let i = start; i < end; i++) {
            let tr = document.createElement("tr");
            tr.innerHTML = `
                <td class="text-center text-sm">${i + 1}</td>
                <td class="text-start text-sm font-weight-bold">${rowsData[i].project}</td>
                <td class="text-start text-sm">${rowsData[i].customer}</td>
                <td class="text-start text-sm">${rowsData[i].product}</td>
                <td class="text-center text-sm">${rowsData[i].diameter}</td>
                <td class="text-center text-sm">${rowsData[i].quantity}</td>
                <td class="text-center text-sm">${rowsData[i].date}</td>
                <td class="text-center text-sm">${rowsData[i].action}</td>
            `;
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
