<!-- ===== NAVBAR ===== -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" 
     id="navbarBlur" navbar-scroll="true">

    <div class="container-fluid py-1 px-3">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm">
                    <a class="opacity-5 text-dark" href="javascript:;">Pages</a>
                </li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
                    Warehousing
                </li>
            </ol>
            <h6 class="font-weight-bolder mb-0">Finished Production</h6>
        </nav>

        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <h6 class="text-sm font-weight-bolder mb-0">Production System</h6>
            </div>
        </div>

    </div>
</nav>

<!-- ===== HEADER BAR ===== -->
<div class="container-fluid mt-3">
    <div class="card shadow-sm border-0" style="border-radius: 14px;">

        <div class="card-body d-flex align-items-center py-3 px-4">

            <div class="d-flex align-items-center">
                <i class="material-icons text-dark me-3">warehouse</i>
                <h6 class="mb-0" style="font-size: 16px; font-weight: 600;">Warehousing</h6>
            </div>

        </div>

    </div>
</div>


<!-- ===== MAIN TABLE ===== -->
<div class="container-fluid mt-4">
    <div class="row gx-4">

        <div class="col-12 mb-4">
            <div class="card shadow-sm border-0" style="border-radius: 14px;">

                <div class="card-header pb-1 px-4 pt-3">
                    <h6 class="font-weight-bold mb-1">Finished Production Data</h6>
                    <span class="text-sm text-secondary">List of all finished products stored in warehouse</span>
                </div>

                <div class="card-body p-0 px-3 pb-3">

                    <div class="table-responsive">

                        <table class="table table-hover mb-0">

                            <thead>
                                <tr>
                                    <th class="text-secondary text-xs font-weight-bolder opacity-7 px-3 py-2">NO</th>
                                    <th class="text-secondary text-xs font-weight-bolder opacity-7 px-3 py-2">PROJECT</th>
                                    <th class="text-secondary text-xs font-weight-bolder opacity-7 px-3 py-2">Client</th>
                                    <th class="text-secondary text-xs font-weight-bolder opacity-7 px-3 py-2">LAST DATE</th>
                                    <th class="text-secondary text-xs font-weight-bolder opacity-7 px-3 py-2">QTY</th>
                                    <th class="text-secondary text-xs font-weight-bolder opacity-7 px-3 py-2">TOTAL FINISHED</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php if (!empty($finished)) : $i = 1; foreach ($finished as $value) : ?>
                                <tr class="align-middle">

                                    <td class="text-sm px-3 py-2"><?= $i++; ?></td>

                                    <td class="text-sm px-3 py-2 font-weight-bold text-nowrap">
                                        <?= $value->project_name; ?>
                                    </td>

                                    <td class="text-sm px-3 py-2 text-nowrap">
                                        <?= $value->cust_name; ?>
                                    </td>

                                    <td class="text-sm px-3 py-2 text-nowrap">
                                        <?= date('d-m-Y', strtotime($value->fdate)); ?>
                                    </td>

                                    <td class="text-sm px-3 py-2 text-nowrap">
                                        <?= $value->qty_request; ?> Kg
                                    </td>

                                    <td class="text-sm px-3 py-2 text-nowrap">
                                        <?= $value->total_finished; ?> Unit
                                    </td>

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
