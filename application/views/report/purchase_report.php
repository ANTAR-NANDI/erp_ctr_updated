<!-- Purchase Report Start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('purchase_report') ?></h1>
            <small><?php echo display('total_purchase_report') ?></small>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url() ?>"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('report') ?></a></li>
                <li class="active"><?php echo display('purchase_report') ?></li>
            </ol>
        </div>
    </section>

    <section class="content">

        <div class="row">
            <div class="col-sm-12">


                <?php if ($this->permission1->method('todays_sales_report', 'read')->access()) { ?>
                    <a href="<?php echo base_url('Admin_dashboard/todays_sales_report') ?>" class="btn btn-info m-b-5 m-r-2"><i class="ti-align-justify"> </i> <?php echo display('sales_report') ?> </a>
                <?php } ?>
                <?php if ($this->permission1->method('product_sales_reports_date_wise', 'read')->access()) { ?>
                    <a href="<?php echo base_url('Admin_dashboard/product_sales_reports_date_wise') ?>" class="btn btn-primary m-b-5 m-r-2"><i class="ti-align-justify"> </i> <?php echo display('sales_report_product_wise') ?> </a>
                <?php } ?>
                <?php if ($this->permission1->method('todays_sales_report', 'read')->access() && $this->permission1->method('todays_purchase_report', 'read')->access()) { ?>
                    <a href="<?php echo base_url('Admin_dashboard/total_profit_report') ?>" class="btn btn-warning m-b-5 m-r-2"><i class="ti-align-justify"> </i> <?php echo display('profit_report') ?> </a>
                <?php } ?>


            </div>
        </div>

        <!-- Purchase report -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <?php echo form_open('Admin_dashboard/retrieve_dateWise_PurchaseReports', array('class' => 'form-inline', 'method' => 'get')) ?>
                        <?php date_default_timezone_set("Asia/Dhaka");
                        $today = date('Y-m-d');
                        ?>


                        <div class="form-group row">


                            <div class="col-md-12" style="margin-bottom: 10px;">
                                <?php if ($logged_outlet_id == '' || $logged_outlet_id == 'HK7TGDT69VFMXB7') { ?>
                                    <label for="product_sku" class="col-form-label">Outlet: </label>
                                    <select name="outlet_id" class="form-control" id="outlet_id" tabindex="3">
                                        <option value="" selected disabled>Select Outlet</option>
                                        <?php foreach ($cw_list as $cw) { ?>
                                            <option value="<?php echo html_escape($cw['warehouse_id']) ?>" <?php echo html_escape($cw['warehouse_id']) == $outlet_id ? 'selected' : ''; ?>><?php echo html_escape($cw['central_warehouse']); ?></option>
                                        <?php } ?>
                                        <?php foreach ($outlet_list as $outlet) { ?>
                                            <option value="<?php echo html_escape($outlet['outlet_id']) ?>" <?php echo html_escape($outlet['outlet_id']) == $outlet_id ? 'selected' : ''; ?>><?php echo html_escape($outlet['outlet_name']); ?></option>
                                        <?php } ?>

                                        <option value="All">Consolidated</option>
                                    </select>

                                <?php } else { ?>
                                    <input type="hidden" name="outlet_id" class="form-control" id="outlet_id" value="<?php echo $logged_outlet_id ?>" readonly>
                                <?php } ?>
                            </div>

                            <div class="col-sm-6">
                                <label for="supplier_id" class="col-form-label">Supplier</label>
                                <select name="supplier_id" id="supplier_id" class="form-control" tabindex="1">
                                    <option value="" selected disabled><?php echo display('select_one') ?></option>
                                    <?php foreach ($supplier_list as $supplier) { ?>
                                        <option value="<?php echo ($supplier['supplier_id']) ?>" <?php echo ($supplier['supplier_id']) == $supplier_id ? 'selected' : ''; ?>><?php echo ($supplier['supplier_name']); ?></option>
                                    <?php } ?>

                                </select>
                            </div>

                            <div class="col-sm-3">
                                <label for="from_date" class="col-form-label"><?php echo display('start_date') ?> </label>
                                <input type="text" name="from_date" class="form-control datepicker" id="from_date" value="<?php echo $from_date ? $from_date : $today;  ?>" placeholder="<?php echo display('start_date') ?>">
                            </div>

                            <div class="col-sm-3">
                                <label class="" for="to_date"><?php echo display('end_date') ?></label>
                                <input type="text" name="to_date" class="form-control datepicker" id="to_date" placeholder="<?php echo display('end_date') ?>" value="<?php echo $to_date ? $to_date : $today;  ?>">
                            </div>


                        </div>
                        <br>
                        <button type="submit" class="btn btn-success"><?php echo display('search') ?></button>
                        <a class="btn btn-warning" href="#" onclick="printDiv('purchase_div')"><?php echo display('print') ?></a>

                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4><?php echo display('purchase_report') ?></h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div id="purchase_div" class="table-responsive">
                            <table class="print-table" width="100%">

                                <tr>
                                    <td align="left" class="print-table-tr">
                                        <img src="<?php echo $software_info[0]['logo']; ?>" alt="logo">
                                    </td>
                                    <td align="center" class="print-cominfo">
                                        <span class="company-txt">
                                            <?php echo $company[0]['company_name']; ?>

                                        </span><br>
                                        <?php echo $company[0]['address']; ?>
                                        <br>
                                        <?php echo $company[0]['email']; ?>
                                        <br>
                                        <?php echo $company[0]['mobile']; ?>

                                    </td>

                                    <td align="right" class="print-table-tr">
                                        <date>
                                            <?php echo display('date') ?>: <?php
                                                                            echo date('d-M-Y');
                                                                            ?>
                                        </date>
                                    </td>
                                </tr>

                            </table>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover" id="purchaseReportTable">
                                    <thead>
                                        <tr>
                                            <th>Purchase Date</th>
                                            <th>Purchase ID</th>
                                            <th>Outlet Name</th>
                                            <th><?php echo display('supplier_name') ?></th>
                                            <th><?php echo display('total_ammount') ?> <?php echo form_open('Admin_dashboard/retrieve_dateWise_PurchaseReports', array('class' => 'form-inline', 'method' => 'get')) ?>
                                                <input type="hidden" value="<?php echo (!empty($from_date) ? $from_date : date('Y-m-d')) ?>" name="from_date">
                                                <input type="hidden" value="<?php echo (!empty($to_date) ? $to_date : date('Y-m-d')) ?>" name="to_date">
                                                <input type="hidden" name="all" value="all">
                                                <!--                                                <button type="submit" class="btn btn-success">--><?php //echo display('all') 
                                                                                                                                                        ?><!--</button>-->
                                                <?php echo form_close() ?>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($purchase_report) {

                                            foreach ($purchase_report as $row) {

                                        ?>

                                                <tr>
                                                    <td><?php echo html_escape($row['purchase_date']) ?></td>
                                                    <td>

                                                        <a href="<?= base_url('Cpurchase/purchase_details_data/' . $row['purchase_id']) ?>">
                                                            <?php echo html_escape($row['purchase_id']) ?>
                                                        </a>

                                                    </td>
                                                    <td><?php echo html_escape($row['outlet_name']) ?></td>
                                                    <td><?php echo html_escape($row['supplier_name']) ?></td>

                                                    <td class="text-right"><?php echo (($position == 0) ? "$currency " . number_format($row['grand_total_amount'], 2) : number_format($row['grand_total_amount'], 2) . " $currency") ?></td>
                                                </tr>

                                            <?php } ?>
                                        <?php } else {
                                        ?>
                                            <tr>
                                                <th class="text-center" colspan="7"><?php echo display('not_found'); ?></th>
                                            </tr>
                                        <?php }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="4" align="right">&nbsp; <b><?php echo display('total_purchase') ?> </b></td>
                                            <td class="text-right"><b><?php echo (($position == 0) ? "$currency " . $purchase_amount : $purchase_amount . " $currency") ?></b></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <!-- <div class="text-right"><?php echo $links ?></div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Purchase Report End -->

<script type="text/javascript">
    $(document).ready(function() {
        $('#purchaseReportTable').DataTable({
            dom: "Bfrltip",
            select: true,
            responsive: true,
            // processing: true,
            lengthMenu: [
                [5, 10, 25, 50, 100, -1],
                [5, 10, 25, 50, 100, "All"]
            ],
            pageLength: 10,
            "order": [],
            buttons: [
                // 'pageLength',
                {
                    extend: 'copyHtml5',
                    footer: true,
                    className: "btn-sm prints",
                },
                {
                    extend: 'excelHtml5',
                    footer: true,
                    className: "btn-sm prints",
                },
                {
                    extend: 'csvHtml5',
                    footer: true,
                    className: "btn-sm prints",
                },
                {
                    extend: 'pdfHtml5',
                    footer: true,
                    className: "btn-sm prints",
                },
                {
                    extend: 'print',
                    footer: true,
                    className: "btn-sm prints",
                }
            ]
        });
    });
</script>