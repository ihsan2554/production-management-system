<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
  <div class="container-fluid py-1 px-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm">
          <a class="opacity-5 text-dark" href="javascript:;">Pages</a>
        </li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Products</li>
      </ol>
      <h6 class="font-weight-bolder mb-0">Products</h6>
    </nav>

    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
      <div class="ms-md-auto pe-md-3 d-flex align-items-center">
        <h6 class="text-sm font-weight-bolder mb-0">Production System</h6>
      </div>
    </div>
  </div>
</nav>

<br>

<!-- Content -->
<div class="container-fluid py-4 pt-0">
  <div class="card shadow-sm border-0">

    <!-- Header Data Products -->
    <div class="card-header bg-white shadow-sm d-flex justify-content-between align-items-center sticky-top" style="z-index: 10;">
      <div class="d-flex align-items-center">
        <i class="material-icons me-2">task</i>
        <h6 class="mb-0">Data Products</h6>
      </div>
      <a href="<?= site_url('admin/product/addproduct'); ?>" class="btn bg-gradient-dark mb-0" title="Add Product">
        <i class="material-icons me-1">add</i> Add Product
      </a>
    </div>

    <!-- Body -->
    <div class="card-body pt-4 p-3">
      <div class="table-responsive p-0">

        <table id="table-data" class="table table-striped table-hover align-middle mb-0">
          <thead class="bg-light">
            <tr>
              <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">No</th>
              <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Product Name</th>
              <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Product Details</th>
              <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Product Info</th>
            </tr>
          </thead>

          <tbody id="tbody-original">
            <?php if (!empty($product)) : $i = 1; foreach ($product as $value) : ?>
              <tr>
                <td class="text-sm"><?= $i++; ?></td>
                <td class="text-sm font-weight-bold"><?= $value->product_name; ?></td>
                <td class="text-sm"><?= $value->summary; ?></td>
                <td class="text-sm"><?= $value->application; ?></td>
              </tr>
            <?php endforeach; else : ?>
              <tr>
                <td colspan="4" class="text-center text-muted">No products available</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>

        <!-- ✅ Pagination Elegan -->
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

<!-- ✅ CSS Pagination -->
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

#table-data th, #table-data td {
    padding: 12px 15px;
    border-bottom: 1px solid #eee;
}
</style>

<!-- ✅ SCRIPT Pagination -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    const tbody = document.getElementById("tbody-original");

    // Simpan data tabel
    const rowsData = Array.from(tbody.querySelectorAll("tr")).map(row => {
        const c = row.querySelectorAll("td");
        return {
            product_name: c[1]?.innerText || "",
            summary: c[2]?.innerText || "",
            application: c[3]?.innerText || ""
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
                <td class="text-sm">${i + 1}</td>
                <td class="text-sm font-weight-bold">${rowsData[i].product_name}</td>
                <td class="text-sm">${rowsData[i].summary}</td>
                <td class="text-sm">${rowsData[i].application}</td>
            `;
            tbody.appendChild(tr);
        }

        pageInfo.innerText = `Menampilkan ${start + 1} - ${end} dari ${rowsData.length} data`;

        document.getElementById("first-page").disabled = currentPage === 1;
        document.getElementById("prev-page").disabled = currentPage === 1;
        document.getElementById("next-page").disabled = currentPage === totalPages;
        document.getElementById("last-page").disabled = currentPage === totalPages;
    }

    // Tombol navigasi
    document.getElementById("first-page").onclick = () => { currentPage = 1; renderTable(); }
    document.getElementById("prev-page").onclick = () => { if (currentPage > 1) currentPage--; renderTable(); }
    document.getElementById("next-page").onclick = () => { if (currentPage < totalPages) currentPage++; renderTable(); }
    document.getElementById("last-page").onclick = () => { currentPage = totalPages; renderTable(); }

    renderTable();
});
</script>
