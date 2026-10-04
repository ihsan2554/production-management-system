<!-- HILANGKAN TOMBOL SAAT PRINT -->
<style>
@media print {
    .no-print {
        display: none !important;
    }
    body {
        -webkit-print-color-adjust: exact !important;
        print-color-adjust: exact !important;
    }
}
</style>

<div class="container-fluid">

    <!-- TITLE SECTION -->
    <div class="py-4 d-flex justify-content-between align-items-center no-print">
        <h4 class="mb-0 fw-bold text-dark">Production Report</h4>
        <button onclick="window.print()" class="btn btn-danger shadow-sm px-4">
            PRINT OUT
        </button>
    </div>

    <!-- TOP CARD -->
    <div class="card shadow-sm border-0 p-4 mb-4 rounded-4">
        <div class="row g-4">

            <!-- LEFT SIDE -->
            <div class="col-lg-6">
                <h6 class="fw-bold text-secondary mb-1">Shiftment Head :</h6>
                <h5 class="fw-semibold text-dark mb-2"><?= $detail['staff_name'] ?></h5>
                <p class="text-sm text-muted">Detail on this production</p>

                <div class="row mt-3 g-3">
                    <div class="col-6">
                        <div class="p-3 rounded bg-light shadow-sm border">
                            <p class="text-sm mb-1 text-secondary">Finished Goods</p>
                            <h4 class="fw-bold text-dark mb-1"><?= $detail['finished'] ?></h4>
                            <p class="text-xs text-muted">Unit</p>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="p-3 rounded bg-light shadow-sm border">
                            <p class="text-sm mb-1 text-secondary">Production Waste</p>
                            <h4 class="fw-bold text-dark mb-1"><?= $detail['waste'] ?></h4>
                            <p class="text-xs text-muted">Unit</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- RIGHT SIDE -->
            <div class="col-lg-6">
                <div class="p-3 bg-light shadow-sm rounded border">
                    <div class="row">

                        <div class="col-4">
                            <p class="text-xs text-secondary mb-0">Planning</p>
                            <h6 class="fw-bold text-dark mb-3"><?= $detail['plan_name'] ?></h6>

                            <p class="text-xs text-secondary mb-0">Product</p>
                            <h6 class="fw-bold"><?= $detail['product_name'] ?></h6>
                        </div>

                        <div class="col-4">
                            <p class="text-xs text-secondary mb-0">Diameter</p>
                            <h6 class="fw-bold text-dark mb-3"><?= $detail['diameter'] ?> mm</h6>

                            <p class="text-xs text-secondary mb-0">Shiftment</p>
                            <h6 class="fw-bold"><?= $detail['shift_name'] ?></h6>
                        </div>

                        <div class="col-4">
                            <p class="text-xs text-secondary mb-0">Start Date</p>
                            <h6 class="fw-bold text-dark mb-3"><?= $detail['start_date'] ?></h6>

                            <p class="text-xs text-secondary mb-0">Target</p>
                            <h6 class="fw-bold"><?= $detail['qty_target'] ?> Unit/Shift</h6>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- MATERIAL & MACHINE -->
    <div class="row g-4">

        <!-- MATERIAL CARD -->
        <div class="col-lg-6">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-header bg-white p-4">
                    <h5 class="fw-bold text-dark mb-1">Materials Used</h5>
                    <p class="text-sm text-muted">Material for this Production</p>
                </div>

                <div class="card-body p-0">
                    <table class="table table-hover mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="text-center text-xs text-secondary fw-bold px-3" style="width: 60px;">NO</th>
                                <th class="text-start text-xs text-secondary fw-bold px-3">MATERIAL</th>
                                <th class="text-end text-xs text-secondary fw-bold px-3" style="width: 150px;">USED</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($p_material)) : $i = 1; foreach ($p_material as $value) : ?>
                            <tr>
                                <td class="fw-bold text-center px-3"><?= $i++; ?></td>
                                <td class="fw-semibold text-dark px-3"><?= $value->material_name ?></td>
                                <td class="fw-bold text-end px-3"><?= $value->used_stock ?> Unit</td>
                            </tr>
                            <?php endforeach; endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- MACHINE CARD -->
        <div class="col-lg-6">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-header bg-white p-4">
                    <h5 class="fw-bold text-dark mb-1">Machines Used</h5>
                    <p class="text-sm text-muted">History of machine used</p>
                </div>

                <div class="card-body p-0">
                    <table class="table table-hover mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="text-center text-xs text-secondary fw-bold px-3" style="width: 60px;">NO</th>
                                <th class="text-start text-xs text-secondary fw-bold px-3">MACHINE</th>
                                <th class="text-end text-xs text-secondary fw-bold px-3" style="width: 150px;">CAPACITY</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($p_machine)) : $i = 1; foreach ($p_machine as $value) : ?>
                            <tr>
                                <td class="fw-bold text-center px-3"><?= $i++; ?></td>
                                <td class="fw-semibold text-dark px-3"><?= $value->machine_name ?></td>
                                <td class="fw-bold text-end px-3"><?= $value->capacity ?> Unit</td>
                            </tr>
                            <?php endforeach; endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

</div>
