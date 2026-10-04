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
                    Production Report
                </li>
            </ol>
            <h6 class="font-weight-bolder mb-0">Production Report</h6>
        </nav>

        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <h6 class="text-sm font-weight-bolder mb-0">Production System</h6>
            </div>
        </div>

    </div>
</nav>

<!-- ===== REPORT HEADER BAR ===== -->
<div class="container-fluid mt-3">
    <div class="card shadow-sm border-0" style="border-radius: 14px;">
        <div class="card-body d-flex align-items-center justify-content-between py-3 px-4">

            <div class="d-flex align-items-center">
                <i class="material-icons text-dark me-3">schedule</i>
                <h6 class="mb-0" style="font-size: 16px; font-weight: 600;">Production Report</h6>
            </div>

            <span></span><!-- Tidak ada tombol add, jadi dikosongkan -->
        </div>
    </div>
</div>

<!-- ===== MAIN CONTENT ===== -->
<div class="container-fluid mt-4">
    <div class="row gx-4">

        <!-- REPORT TABLE -->
        <div class="col-12 mb-4">
            <div class="card shadow-sm border-0" style="border-radius: 14px;">

                <div class="card-header pb-1 px-4 pt-3">
                    <h6 class="font-weight-bold mb-1">Production Report Table</h6>
                    <span class="text-sm text-secondary">Detail of all production performance</span>
                </div>

                <div class="card-body p-0 px-3 pb-3">
                    <div class="table-responsive">

                        <!-- ===== TABLE ===== -->
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th class="text-secondary text-xs font-weight-bolder opacity-7 px-3 py-2">NO</th>
                                    <th class="text-secondary text-xs font-weight-bolder opacity-7 px-3 py-2">PRODUCTION</th>
                                    <th class="text-secondary text-xs font-weight-bolder opacity-7 px-3 py-2">PLAN</th>
                                    <th class="text-secondary text-xs font-weight-bolder opacity-7 px-3 py-2">SHIFTMENT</th>
                                    <th class="text-secondary text-xs font-weight-bolder opacity-7 px-3 py-2">TARGET SHIFT</th>
                                    <th class="text-secondary text-xs font-weight-bolder opacity-7 px-3 py-2">FINISHED</th>
                                    <th class="text-secondary text-xs font-weight-bolder opacity-7 px-3 py-2">WASTE</th>
                                    <th class="text-secondary text-xs font-weight-bolder opacity-7 px-3 py-2">ACTION</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php if (!empty($sorting)) : $i = 1; foreach ($sorting as $value) : ?>
                                <tr class="align-middle">

                                    <td class="text-sm px-3 py-2 text-nowrap"><?= $i++; ?></td>

                                    <td class="text-sm px-3 py-2 font-weight-bold text-nowrap">
                                        <?= $value->staff_name; ?>
                                    </td>

                                    <td class="text-sm px-3 py-2 text-nowrap">
                                        <?= $value->plan_name; ?>
                                    </td>

                                    <td class="text-sm px-3 py-2 text-nowrap">
                                        <?= $value->start_date; ?>
                                    </td>

                                    <td class="text-sm px-3 py-2 text-nowrap">
                                        <?= $value->qty_target; ?> Unit
                                    </td>

                                    <td class="text-sm px-3 py-2 text-nowrap">
                                        <?= $value->finished; ?> Unit
                                    </td>

                                    <td class="text-sm px-3 py-2 text-nowrap">
                                        <?= $value->waste; ?> Unit
                                    </td>

                                    <td class="text-sm px-3 py-2 text-nowrap">
                                        <a href="<?= site_url('admin/detail_sorting/'.$value->id_planshift.'/print'); ?>" 
                                           class="btn bg-gradient-secondary btn-sm px-3"
                                           style="border-radius: 8px; font-size: 12px;">
                                            PRINT OUT
                                        </a>
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
