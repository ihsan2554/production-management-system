<!-- NAVBAR -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur">
    <div class="container-fluid py-1 px-3">
        <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between w-100">

            <!-- Breadcrumb -->
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-1 px-0 pt-1">
                        <li class="breadcrumb-item text-sm">
                            <a class="opacity-5 text-dark" href="#">Pages</a>
                        </li>
                        <li class="breadcrumb-item text-sm text-dark active">Planning</li>
                    </ol>
                </nav>
                <h6 class="font-weight-bolder mb-0">Planning</h6>
            </div>

            <!-- Title kanan -->
            <div class="mt-2 mt-md-0">
                <h6 class="text-sm font-weight-bolder mb-0 text-dark">Production System</h6>
            </div>
        </div>
    </div>
</nav>

<!-- CSS -->
<style>
    .planning-page { margin-top: 8px !important; }

    .card {
        border-radius: 15px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    }

    .card-header {
        background: #fff;
        color: #344767;
        border-bottom: 1px solid #eee;
        border-radius: 15px 15px 0 0 !important;
    }

    #table-data th {
        background-color: #f8f9fa;
        color: #344767;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        text-align: center;
    }

    #table-data tbody td { 
        vertical-align: middle; 
        text-align: center; 
    }

    #table-data tbody tr:hover { 
        background-color: #f9fbff; 
        transition: 0.2s ease-in-out; 
    }

    #table-data th:nth-child(2),
    #table-data td:nth-child(2),
    #table-data th:nth-child(3),
    #table-data td:nth-child(3) {
        text-align: left !important;
    }

    .badge-custom {
        padding: 6px 12px;
        border-radius: 12px;
        font-size: 0.75rem;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 120px;
    }

    .badge-request { background: #e3f2fd; color: #1565c0; }
    .badge-target  { background: #e8f5e9; color: #2e7d32; }

    .btn-add {
        background: #424242;
        color: #fff !important;
        font-weight: 600;
        border-radius: 8px;
        transition: .3s ease;
    }
    .btn-add:hover { background: #212121; transform: scale(1.05); }

    /* Pagination */
    #custom-pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 6px;
        margin-top: 20px;
    }

    #custom-pagination button {
        border-radius: 8px;
        border: 1px solid #ddd;
        background: white;
        color: #344767;
        font-size: .8rem;
        padding: 6px 12px;
        transition: .3s ease;
    }

    #custom-pagination button:hover {
        background: #f1f5fb;
        color: #007bff;
    }

    #custom-pagination button:disabled {
        opacity: .5;
        cursor: not-allowed;
    }

    #page-info {
        color: #555;
        font-size: 0.85rem;
        font-weight: 500;
        margin-right: 10px;
    }
</style>

<!-- CONTENT -->
<div class="container planning-page py-4">
    <div class="row">
        <div class="card">

            <!-- HEADER -->
            <div class="card-header d-flex justify-content-between align-items-center px-4 py-3">
                <div class="d-flex align-items-center">
                    <i class="material-icons me-2">schedule</i>
                    <h6 class="mb-0">Planning Production</h6>
                </div>
                <a href="<?= site_url('admin/planning/addplanning'); ?>" class="btn btn-add">
                    <i class="material-icons me-1">add</i> Add Planning
                </a>
            </div>

            <!-- BODY -->
            <div class="card-body pt-3 p-3">
                <div class="table-responsive">
                    <table id="table-data" class="table table-bordered table-striped mb-0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Plan</th>
                                <th>Project</th>
                                <th>Component Details</th>
                                <th>Production Target / Shift</th>
                                <th>Start Date</th>
                                <th>Finish Target</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody id="tbody-original">
                            <?php if (!empty($planning)) : $i = 1; foreach ($planning as $value) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $value->plan_name; ?></td>
                                <td><?= $value->project_name; ?></td>
                                <td>
                                    <span class="badge-custom badge-request">
                                        <?= $value->qty_request; ?> Kg / <?= $value->diameter; ?> mm
                                    </span>
                                </td>
                                <td>
                                    <span class="badge-custom badge-target">
                                        <?= $value->qty_target; ?> Unit / Shift
                                    </span>
                                </td>
                                <td><?= $value->entry_date; ?></td>
                                <td><?= $value->end_date; ?></td>
                                <td>
                                    <a href="<?= site_url('admin/plan_shift/'.$value->id_plan.'/view'); ?>" 
                                       class="btn btn-sm btn-outline-primary"
                                       title="Details">
                                        <i class="material-icons" style="font-size:16px;">visibility</i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; endif; ?>
                        </tbody>
                    </table>
                </div>

                <!-- PAGINATION -->
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
</div>

<!-- SCRIPT -->
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
    document.getElementById("prev-page").onclick  = () => { if (currentPage > 1) currentPage--; renderTable(); }
    document.getElementById("next-page").onclick  = () => { if (currentPage < totalPages) currentPage++; renderTable(); }
    document.getElementById("last-page").onclick  = () => { currentPage = totalPages; renderTable(); }

    renderTable();
});
</script>
