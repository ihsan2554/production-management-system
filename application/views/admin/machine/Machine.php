<!-- ===== NAVBAR ===== -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm">
                    <a class="opacity-5 text-dark" href="javascript:;">Pages</a>
                </li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
                    Machine
                </li>
            </ol>
            <h6 class="font-weight-bolder mb-0">Machine</h6>
        </nav>

        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <h6 class="text-sm font-weight-bolder mb-0">Production System</h6>
            </div>
        </div>
    </div>
</nav>


<!-- ===== MACHINE SCHEDULE BAR ===== -->
<div class="container-fluid mt-3">
    <div class="card shadow-sm border-0" style="border-radius: 14px;">
        <div class="card-body d-flex align-items-center justify-content-between py-3 px-4">

            <div class="d-flex align-items-center">
                <i class="material-icons text-dark me-3">build</i>
                <h6 class="mb-0" style="font-size: 16px; font-weight: 600;">Machine Schedule</h6>
            </div>

            <a href="<?= site_url('admin/machine/addnewmachine'); ?>" 
               class="btn bg-gradient-secondary mb-0 px-4"
               style="border-radius: 8px; font-size: 13px;">
               ADD MACHINE
            </a>

        </div>
    </div>
</div>


<!-- ===== MAIN CONTENT ===== -->
<div class="container-fluid mt-4">
    <div class="row gx-4">

        <!-- LEFT CARD: MACHINE HISTORY -->
        <div class="col-md-7 mb-4">
            <div class="card shadow-sm border-0" style="border-radius: 14px;">
                
                <div class="card-header pb-1 px-4 pt-3">
                    <h6 class="font-weight-bold mb-1">Machine History</h6>
                    <span class="text-sm text-secondary">History of machine used on production</span>
                </div>

                <div class="card-body p-0 px-3 pb-3">
                    <div class="table-responsive">
                        
                        <!-- ====== TABLE HISTORY ====== -->
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th class="text-secondary text-xs font-weight-bolder opacity-7 px-3 py-2">NO</th>
                                    <th class="text-secondary text-xs font-weight-bolder opacity-7 px-3 py-2">MACHINE</th>
                                    <th class="text-secondary text-xs font-weight-bolder opacity-7 px-3 py-2">PRODUCTION</th>
                                    <th class="text-secondary text-xs font-weight-bolder opacity-7 px-3 py-2">DATE</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php if (!empty($p_machine)) : $i = 1; foreach ($p_machine as $value) : ?>
                                <tr class="align-middle">
                                    <td class="text-sm px-3 py-2 text-nowrap"><?= $i++; ?></td>
                                    <td class="text-sm px-3 py-2 font-weight-bold text-nowrap"><?= $value->machine_name ?></td>
                                    <td class="text-sm px-3 py-2 text-nowrap"><?= $value->staff_name ?></td>
                                    <td class="text-sm px-3 py-2 text-nowrap"><?= $value->start_date ?></td>
                                </tr>
                                <?php endforeach; endif; ?>
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        </div>

        <!-- RIGHT CARD: MACHINE STATUS -->
        <div class="col-md-5 mb-4">
            <div class="card shadow-sm border-0" style="border-radius: 14px;">

                <div class="card-header pb-1 px-4 pt-3">
                    <h6 class="font-weight-bold mb-1">Machine Status</h6>
                    <span class="text-sm text-secondary">Machine for this Production</span>
                </div>

                <div class="card-body p-0 px-3 pb-3">
                    <div class="table-responsive">
                        
                        <!-- ====== TABLE STATUS ====== -->
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th class="text-secondary text-xs font-weight-bolder opacity-7 px-3 py-2">NO</th>
                                    <th class="text-secondary text-xs font-weight-bolder opacity-7 px-3 py-2">MACHINE</th>
                                    <th class="text-secondary text-xs font-weight-bolder opacity-7 px-3 py-2">STATUS</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php if (!empty($machines)) : $i = 1; foreach ($machines as $value) : ?>
                                <tr class="align-middle">
                                    <td class="text-sm px-3 py-2 text-nowrap"><?= $i++; ?></td>
                                    <td class="text-sm px-3 py-2 font-weight-bold text-nowrap">
                                        <?= $value->machine_name ?> / <?= $value->capacity ?> Unit
                                    </td>
                                    <td class="text-sm px-3 py-2 text-nowrap">
                                        <?php if ($value->mc_status == 1) : ?>
                                            <span class="text-success fw-bold">READY</span>
                                        <?php elseif ($value->mc_status == 2) : ?>
                                            <span class="text-warning fw-bold">USED</span>
                                        <?php else : ?>
                                            <span class="text-danger fw-bold">TROUBLE</span>
                                        <?php endif; ?>
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
