<!-- Product Purchase js -->
<script src="<?php echo base_url() ?>my-assets/js/admin_js/json/product_purchase.js.php"></script>
<!-- Supplier Js -->
<script src="<?php echo base_url(); ?>my-assets/js/admin_js/json/supplier.js.php"></script>

<script src="<?php echo base_url() ?>my-assets/js/admin_js/purchase.js.php" type="text/javascript"></script>
<style type="text/css">
    .form-control {
        padding: 6px 5px;
    }
</style>

<!-- Add New Purchase Start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('add_purchase') ?></h1>
            <small><?php echo display('add_new_purchase') ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('purchase') ?></a></li>
                <li class="active"><?php echo display('add_purchase') ?></li>
            </ol>
        </div>
    </section>

    <section class="content">
        <!-- Alert Message -->
        <?php
        $message = $this->session->userdata('message');
        if (isset($message)) {
        ?>
            <div class="alert alert-info alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                <?php echo $message ?>
            </div>
        <?php
            $this->session->unset_userdata('message');
        }
        $error_message = $this->session->userdata('error_message');
        if (isset($error_message)) {
        ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $error_message ?>
            </div>
        <?php
            $this->session->unset_userdata('error_message');
        }
        ?>

        <!-- Purchase report -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4><?php echo display('add_purchase') ?></h4>
                        </div>
                    </div>

                    <div class="panel-body">
                        <?php echo form_open_multipart('Cpurchase/insert_purchase', array('class' => 'form-vertical insert_purchase', 'id' => 'insert_purchase', 'name' => 'insert_purchase')) ?>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="supplier_sss" class="col-sm-4 col-form-label"><?php echo display('supplier') ?>
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-6">
                                        <select name="supplier_id" id="supplier_id" class="form-control " required="" tabindex="1">
                                            <option value=" "><?php echo display('select_one') ?></option>
                                            {all_supplier}
                                            <option value="{supplier_id}">{supplier_name}</option>
                                            {/all_supplier}
                                        </select>
                                    </div>
                                    <?php if ($this->permission1->method('add_supplier', 'create')->access()) { ?>
                                        <div class="col-sm-2">
                                            <a class="btn btn-success" title="Add New Supplier" href="<?php echo base_url('Csupplier'); ?>"><i class="fa fa-user"></i></a>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="date" class="col-sm-4 col-form-label"><?php echo display('purchase_date') ?>
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                        <?php $date = date('Y-m-d'); ?>
                                        <input type="text" required tabindex="2" class="form-control datepicker" name="purchase_date" value="<?php echo $date; ?>" id="date" />
                                    </div>
                                </div>
                            </div>

                        </div>



                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="product_status" class="col-sm-4 col-form-label"> Product Type <i class="text-danger">*</i></label>
                                    <div class="col-sm-6">
                                        <select name="product_status" id="product_status" class="form-control" required">

                                            <option value="1" selected>Finished Goods</option>
                                            <option value="2">Raw Materials</option>
                                            <option value="3">Tools</option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="date" class="col-sm-4 col-form-label">Invoice No:
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">

                                        <input type="text" tabindex="2" class="form-control " name="invoice_no" placeholder="Invoice No" value="" id="date" />
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="cat_id" class="col-sm-4 col-form-label"> Category </label>
                                    <div class="col-sm-6">
                                        <select name="cat_id[]" id="cat_id" class="form-control" multiple>
                                            <option value="">Select One</option>

                                            {cates}

                                            <option value="{id}">{name}</option>
                                            {/cates}
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="cat_id" class="col-sm-4 col-form-label"> Outlet </label>
                                    <!-- <div class="col-sm-8">
                                        <?php if ($outlet_list) { ?>
                                            <input type="text" name="" class="form-control col-sm-2 box" placeholder='' id="add_item_m" autocomplete='off' tabindex="1" value="<?= $outlet_list[0]['outlet_name'] ?>" readonly>
                                            <input type="hidden" id="outlet_name" name="outlet_name" value="<?= $outlet_list[0]['outlet_id'] ?>">
                                        <?php } else { ?>
                                            <input type="text" name="" class="form-control col-sm-2 box" placeholder='' id="add_item_m" autocomplete='off' tabindex="1" value="<?= $cw[0]['central_warehouse'] ?>" readonly>
                                            <input type="hidden" id="outlet_name" name="outlet_name" value="<?= $cw[0]['warehouse_id'] ?>">
                                        <?php } ?>
                                    </div> -->

                                    <div class="col-sm-8">
                                        <?php if ($outlet_id == 'HK7TGDT69VFMXB7') { ?>
                                            <input type="text" name="" class="form-control col-sm-2 box" placeholder='' id="add_item_m" autocomplete='off' tabindex="1" value="Central Warehouse" readonly>
                                            <input type="hidden" id="outlet_name" name="outlet_name" value="<?= $outlet_id ?>">
                                        <?php } else { ?>
                                            <input type="text" name="" class="form-control col-sm-2 box" placeholder='' id="add_item_m" autocomplete='off' tabindex="1" value="<?= $outlet_list[0]['outlet_name'] ?>" readonly>
                                            <input type="hidden" id="outlet_name" name="outlet_name" value="<?= $outlet_id ?>">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <br>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="purchaseTable">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="9%"><?php echo display('item_information') ?><i class="text-danger">*</i></th>
                                        <!-- <th class="text-center" width="8%">SN</th> -->
                                        <th class="text-center">Stock</th>
                                        <th class="text-center" width="8%">Unit</th>
                                        <!-- <th class="text-center" width="8%">Origin</th> -->
                                        <!-- <th class="text-center" width="8%">Warehouse</th> -->

                                        <!--                                        <th class="text-center">Batch No</th>-->

                                        <th class="text-center">Expiry Date</th>
                                        <th class="text-center"><?php echo display('quantity') ?> <i class="text-danger">*</i></th>
                                        <th class="text-center">Damaged Quantity</th>
                                        <th class="text-center"><?php echo display('rate') ?><i class="text-danger">*</i></th>

                                        <th class="text-center"><?php echo display('total') ?></th>
                                        <th class="text-center"><?php echo display('action') ?></th>
                                    </tr>
                                </thead>
                                <tbody id="addPurchaseItem">
                                    <tr>
                                        <td class="span3 supplier" width="35%">
                                            <input  type="text" name="product_name" required class="form-control product_name productSelection" onkeypress="product_pur_or_list(1);" placeholder="Pr. Name" id="product_name_1" tabindex="3">

                                            <input type="hidden" class="autocomplete_hidden_value product_id_1" name="product_id[]" id="SchoolHiddenId" />

                                            <input type="hidden" class="sl" value="1">

                                        </td>

                                        <!-- <td class="wt"> <input type="text" placeholder="SN" name="sn[]" id="sn" class="form-control text-right stock_ctn_1" /></td> -->

                                        <td class="wt">
                                            <input type="text" id="available_quantity_1" class="form-control text-right stock_ctn_1" placeholder="0.00" readonly />
                                        </td>

                                        <td class="wt"> <input type="text" id="unit_1" placeholder="Unit" name="unit[]" class="form-control text-right unit_1" readonly /></td>
                                        <!-- <td class="wt"> <input type="text" placeholder="Origin" name="origin[]" id="origin" class="form-control text-right stock_ctn_1" /></td> -->
                                        <!-- <td class="wt"> <input type="text" placeholder="Warehouse" name="warehouse[]" id="shelf_number" class="form-control text-right stock_ctn_1"  /></td> -->


                                        <td>
                                            <?php $date = date('Y-m-d'); ?>
                                            <input type="date" class="form-control expired_date_1" id="expired_date_1" name="expired_date[]" />
                                        </td>


                                        <td class="text-right">
                                            <input type="text" name="product_quantity[]" id="cartoon_1" required="" min="0" class="form-control text-right store_cal_1" onkeyup="calculate_store(1);" onchange="calculate_store(1);" placeholder="0.00" value="" tabindex="6" />
                                        </td>

                                        <td class="text-right">
                                            <input type="text" name="damaged_qty[]" id="damaged_1" min="0" class="form-control text-right store_cal_1" placeholder="0.00" value="0" readonly tabindex="6" />
                                        </td>

                                        <td class="test">
                                            <input type="text" name="product_rate[]" required="" onkeyup="calculate_store(1);" onchange="calculate_store(1);" id="product_rate_1" class="form-control product_rate_1 text-right" placeholder="0.00" value="" min="0" tabindex="7" />
                                        </td>


                                        <td class="text-right">
                                            <input class="form-control total_price text-right" type="text" name="total_price[]" id="total_price_1" value="0.00" readonly="readonly" />
                                        </td>
                                        <td>



                                            <button class="btn btn-danger text-right red" type="button" value="<?php echo display('delete') ?>" onclick="deleteRow(this)" tabindex="8"><i class="fa fa-close"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>

                                        <td class="text-right" colspan="7"><b><?php echo display('total') ?>:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="Total" class="text-right form-control" name="total" value="0.00" readonly="readonly" />
                                        </td>
                                        <td>
                                            <button type="button" id="add_invoice_item" class="btn btn-info" name="add-invoice-item" onClick="addPurchaseOrderField1('addPurchaseItem')" tabindex="9" /><i class="fa fa-plus"></i></button>

                                            <input type="hidden" name="baseUrl" class="baseUrl" value="<?php echo base_url(); ?>" />
                                        </td>
                                    </tr>
                                    <tr>

                                        <td class="text-right" colspan="7"><b><?php echo display('discounts') ?>:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="discount" class="text-right form-control discount" onkeyup="calculate_store(1)" name="discount" placeholder="0.00" value="" />
                                        </td>
                                        <td>

                                        </td>
                                    </tr>
                                    <tr>

                                        <td class="text-right" colspan="7"><b>Labour Wages</b></td>
                                        <td class="text-right">
                                            <input type="text" id="labour_wages" class="text-right form-control labour_wages" onkeyup="calculate_store(1)" name="labour_wages" placeholder="0.00" value="" />
                                        </td>
                                        <td>

                                        </td>
                                    </tr>
                                    <tr>

                                        <td class="text-right" colspan="7"><b>Transportation</b></td>
                                        <td class="text-right">
                                            <input type="text" id="transport_cost " class="text-right form-control transport_cost" onkeyup="calculate_store(1)" name="transport_cost" placeholder="0.00" value="" />
                                        </td>
                                        <td>

                                        </td>
                                    </tr>


                                    <tr>

                                        <td class="text-right" colspan="7"><b><?php echo display('grand_total') ?>:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="grandTotal" class="text-right form-control" name="grand_total_price" value="0.00" readonly="readonly" />
                                        </td>
                                        <td> </td>
                                    </tr>
                                    <tr>

                                        <td class="text-right" colspan="7"><b><?php echo display('paid_amount') ?>:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="paidAmount" class="text-right form-control" onKeyup="invoice_paidamount()" name="paid_amount" value="" readonly />
                                        </td>
                                        <td> </td>
                                    </tr>
                                    <tr>

                                        <td class="text-right" colspan="7"><b><?php echo display('due_amount') ?>:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="dueAmmount" class="text-right form-control" name="due_amount" value="0.00" readonly="readonly" />
                                        </td>
                                        <td></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>




                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-bd lobidrag">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <h3>Payment</h3>
                                            <input type="hidden" id="count" value="2">
                                        </div>
                                    </div>

                                    <div class="panel-body">
                                        <div id="pay_div" style="margin: 10px 3px; padding:10px 0">
                                            <div class="row margin-top10">
                                                <div class="col-sm-4">
                                                    <label for="payment_type" class="col-sm-5 col-form-label"><?php
                                                                                                                echo display('payment_type');
                                                                                                                ?> <i class="text-danger">*</i></label>
                                                    <div class="col-sm-7">
                                                        <select name="paytype[]" class="form-control" required="" onchange="bank_paymet(this.value, 1)" tabindex="3">
                                                            <option value="1"><?php echo display('cash_payment') ?></option>
                                                            <!-- <option value="2">Cheque Payment</option> -->
                                                            <option value="4"><?php echo display('bank_payment') ?></option>
                                                            <option value="3">Bkash Payment</option>
                                                            <option value="5">Nagad Payment</option>
                                                            <option value="7">Rocket Payment</option>
                                                            <!--                                                            <option value="6">TT</option>-->
                                                            <!--                                                            <option value="7">LC</option>-->

                                                        </select>

                                                    </div>

                                                </div>

                                                <div class="col-sm-4" id="bank_div_1" style="display:none;">
                                                    <div class="form-group row">
                                                        <label for="bank" class="col-sm-3 col-form-label"><?php
                                                                                                            echo display('bank');
                                                                                                            ?> <i class="text-danger">*</i></label>
                                                        <div class="col-sm-7">

                                                            <input type="text" name="bank_id[]" class="form-control" id="bank_id_1" placeholder="Bank">

                                                        </div>

                                                        <div class="col-sm-1">
                                                            <a href="#" class="client-add-btn btn btn-success" aria-hidden="true" data-toggle="modal" data-target="#cheque_info"><i class="ti-plus m-r-2"></i></a>
                                                        </div>
                                                    </div>

                                                </div>



                                                <div class="col-sm-4" id="bank_div_m_1" style="display:none;">
                                                    <div class="form-group row">
                                                        <label for="bank" class="col-sm-5 col-form-label"><?php
                                                                                                            echo display('bank');
                                                                                                            ?> <i class="text-danger">*</i></label>
                                                        <div class="col-sm-7">
                                                            <select name="bank_id_m[]" class="form-control bankpayment" id="bank_id_m_1">
                                                                <option value="">Select One</option>
                                                                <?php foreach ($bank_list as $bank) { ?>
                                                                    <option value="<?php echo html_escape($bank['bank_id']) ?>"><?php echo html_escape($bank['bank_name']) . '(' . html_escape($bank['ac_number']) . ')'; ?></option>
                                                                <?php } ?>
                                                            </select>

                                                            <input type="hidden" id="bank_list" value='<option value="">Select One</option>
                                            <?php foreach ($bank_list as $bank) { ?>
                                                <option value="<?php echo html_escape($bank['bank_id']) ?>"><?php echo html_escape($bank['bank_name']) . '(' . html_escape($bank['ac_number']) . ')'; ?></option>
                                            <?php } ?>'>

                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="col-sm-4" style="display: none" id="bkash_div_1">

                                                    <div class="form-group row">
                                                        <label for="bkash" class="col-sm-5 col-form-label">Bkash Number <i class="text-danger">*</i></label>
                                                        <div class="col-sm-7">
                                                            <select name="bkash_id[]" class="form-control bankpayment" id="bkash_id_1">
                                                                <option value="">Select One</option>
                                                                <?php foreach ($bkash_list as $bkash) { ?>
                                                                    <option value="<?php echo html_escape($bkash['bkash_id']) ?>"><?php echo html_escape($bkash['bkash_no']); ?> (<?php echo html_escape($bkash['ac_name']); ?>)</option>
                                                                <?php } ?>
                                                            </select>
                                                            <input type="hidden" id="bkash_list" value='<option value="">Select One</option>
                                            <?php foreach ($bkash_list as $bkash) { ?>
                                                <option value="<?php echo html_escape($bkash['bkash_id']) ?>"><?php echo html_escape($bkash['bkash_no']); ?> (<?php echo html_escape($bkash['ac_name']); ?>)</option>
                                            <?php } ?>'>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-sm-4" style="display: none" id="rocket_div_1">
                                                    <div class="form-group row">
                                                        <label for="rocket" class="col-sm-5 col-form-label">Rocket Number <i class="text-danger">*</i></label>
                                                        <div class="col-sm-7">
                                                            <select name="rocket_id[]" class="form-control bankpayment" id="rocket_id_1">
                                                                <option value="">Select One</option>
                                                                <?php foreach ($rocket_list as $rocket) { ?>
                                                                    <option value="<?php echo html_escape($rocket['rocket_id']) ?>"><?php echo html_escape($rocket['rocket_no']); ?> (<?php echo html_escape($rocket['ac_name']); ?>)</option>
                                                                <?php } ?>
                                                            </select>

                                                            <input type="hidden" id="rocket_list" value='<option value="">Select One</option>
                                            <?php foreach ($rocket_list as $rocket) { ?>
                                                <option value="<?php echo html_escape($rocket['rocket_id']) ?>"><?php echo html_escape($rocket['rocket_no']); ?> (<?php echo html_escape($rocket['ac_name']); ?>)</option>
                                            <?php } ?>'>

                                                        </div>


                                                    </div>
                                                </div>

                                                <div class="col-sm-4" style="display: none" id="nagad_div_1">
                                                    <div class="form-group row">
                                                        <label for="nagad" class="col-sm-5 col-form-label">Nagad Number <i class="text-danger">*</i></label>
                                                        <div class="col-sm-7">
                                                            <select name="nagad_id[]" class="form-control bankpayment" id="nagad_id_1">
                                                                <option value="">Select One</option>
                                                                <?php foreach ($nagad_list as $nagad) { ?>
                                                                    <option value="<?php echo html_escape($nagad['nagad_id']) ?>"><?php echo html_escape($nagad['nagad_no']); ?> (<?php echo html_escape($nagad['ac_name']); ?>)</option>
                                                                <?php } ?>
                                                            </select>

                                                            <input type="hidden" id="nagad_list" value='<option value="">Select One</option>
                                            <?php foreach ($nagad_list as $nagad) { ?>
                                                <option value="<?php echo html_escape($nagad['nagad_id']) ?>"><?php echo html_escape($nagad['nagad_no']); ?> (<?php echo html_escape($nagad['ac_name']); ?>)</option>
                                            <?php } ?>'>

                                                        </div>


                                                    </div>
                                                </div>

                                                <!-- <div class="col-sm-4" style="display: none" id="card_div_1">
                                                    <div class="form-group row">
                                                        <label for="card" class="col-sm-5 col-form-label">Card Type <i class="text-danger">*</i></label>
                                                        <div class="col-sm-7">
                                                            <select name="card_id" class="form-control bankpayment" id="card_id_1">
                                                                <option value="">Select One</option>
                                                                <?php foreach ($card_list as $card) { ?>
                                                                    <option value="<?php echo html_escape($card['card_id']) ?>"><?php echo html_escape($card['card_name']); ?></option>
                                                                <?php } ?>
                                                            </select>

                                                            <input type="hidden" id="card_list" value='<option value="">Select One</option>
                                                            <?php foreach ($card_list as $card) { ?>
                                                                <option value="<?php echo html_escape($card['card_id']) ?>"><?php echo html_escape($card['card_name']); ?></option>
                                                            <?php } ?>'>

                                                        </div>


                                                    </div>
                                                </div> -->

                                                <div class="col-sm-4" style="display: none" id="tt_div_1">
                                                    <div class="form-group row">
                                                        <label for="tt" class="col-sm-5 col-form-label">Bank/Cash <i class="text-danger">*</i></label>
                                                        <div class="col-sm-7">
                                                            <select name="tt_id[]" class="form-control bankpayment" id="tt_id_1" onchange="change_tt(this.value, 1)">
                                                                <option value="">Select One</option>
                                                                <option value="1">Bank</option>
                                                                <option value="2">Cash</option>
                                                            </select>

                                                        </div>
                                                    </div>

                                                    <div class="form-group row" id="tt_bank_div_1" style="display: none">
                                                        <label for="tt_bank" class="col-sm-5 col-form-label"><?php
                                                                                                                echo display('bank');
                                                                                                                ?> <i class="text-danger">*</i></label>
                                                        <div class="col-sm-7">
                                                            <select name="tt_bank[]" class="form-control bankpayment" id="tt_bank_1">
                                                                <option value="">Select One</option>
                                                                <?php foreach ($bank_list as $bank) { ?>
                                                                    <option value="<?php echo html_escape($bank['bank_id']) ?>"><?php echo html_escape($bank['bank_name']) . '(' . html_escape($bank['ac_number']) . ')'; ?></option>
                                                                <?php } ?>
                                                            </select>

                                                            <input type="hidden" id="bank_list" value='<option value="">Select One</option>
                                                                            <?php foreach ($bank_list as $bank) { ?>
                                                                                <option value="<?php echo html_escape($bank['bank_id']) ?>"><?php echo html_escape($bank['bank_name']) . '(' . html_escape($bank['ac_number']) . ')'; ?></option>
                                                                            <?php } ?>' />

                                                        </div>


                                                    </div>


                                                </div>

                                                <div class="col-sm-4" style="display:none" id="lc_div_1">
                                                    <div class="form-group row">
                                                        <label for="lc_1" class="col-sm-5 col-form-label">LC Number <i class="text-danger">*</i></label>
                                                        <div class="col-sm-7">
                                                            <input type="text" pattern="[a-zA-Z'-'\s]*" name="lc[]" class="form-control" id="lc_1">
                                                        </div>


                                                    </div>
                                                </div>

                                                <div class="col-sm-3">
                                                    <label for="p_amount" class="col-sm-5 col-form-label"> Amount <i class="text-danger">*</i></label>
                                                    <div class="col-sm-7">
                                                        <input class="form-control p_amount" type="text" name="p_amount[]" onchange="calc_paid()" onkeyup="calc_paid()">
                                                    </div>


                                                </div>
                                                <div class="col-sm-1">
                                                    <a id="add_pt_btn" onclick="add_pay_row(1)" class="btn btn-success"><i class="fa fa-plus"></i></a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="modal fade modal-success" id="cheque_info" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">

                                            <a href="#" class="close" data-dismiss="modal">&times;</a>
                                            <h3 class="modal-title">Add Cheque</h3>
                                        </div>

                                        <div class="modal-body">
                                            <div id="customeMessage" class="alert hide"></div>

                                            <div class="panel-body">
                                                <div class="addCheque">
                                                    <div id="cheque" class="cheque">
                                                        <input type="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash(); ?>">

                                                        <label for="bank" class="col-sm-4 col-form-label">Cheque type:
                                                            <i class="text-danger">*</i></label>
                                                        <div class="col-sm-6">
                                                            <input type="text" name="cheque_type[]" class=" form-control" placeholder="" autocomplete="off" />
                                                            <!--  <input type="number"   name="cheque_id[]" class=" form-control" placeholder="" value="--><?php //echo rand()
                                                                                                                                                            ?>
                                                            <!--" autocomplete="off"/>-->
                                                        </div>
                                                        <label for="bank" class="col-sm-4 col-form-label">Cheque NO:
                                                            <i class="text-danger">*</i></label>
                                                        <div class="col-sm-6">
                                                            <input type="number" name="cheque_no[]" class=" form-control" placeholder="" autocomplete="off" />
                                                            <!--                                                <input type="number"   name="cheque_id[]" class=" form-control" placeholder="" value="--><?php //echo rand()
                                                                                                                                                                                                            ?>
                                                            <!--" autocomplete="off"/>-->
                                                        </div>

                                                        <label for="date" class="col-sm-4 col-form-label">Due Date <i class="text-danger">*</i></label>
                                                        <div class="col-sm-6">

                                                            <input class="form-control" type="date" size="50" name="cheque_date[]" id="" value="" tabindex="4" autocomplete="off" placeholder="mm/dd/yyyy" />
                                                        </div>

                                                        <label for="bank" class="col-sm-4 col-form-label">Amount:
                                                            <i class="text-danger">*</i></label>

                                                        <div class="col-sm-6">
                                                            <input type="number" name="amount[]" class=" form-control" placeholder="" autocomplete="off" />
                                                            <!--                                                <input type="number"   name="cheque_id[]" class=" form-control" placeholder="" value="--><?php //echo rand()
                                                                                                                                                                                                            ?>
                                                            <!--" autocomplete="off"/>-->
                                                        </div>

                                                        <label for="bank" class="col-sm-4 col-form-label">Image:
                                                            <i class="text-danger">*</i></label>

                                                        <div class="col-sm-6" style="padding-bottom:10px ">
                                                            <input type="file" name="image" class="form-control" id="image" tabindex="4">
                                                            <!--                                                <input type="number"   name="cheque_id[]" class=" form-control" placeholder="" value="--><?php //echo rand()
                                                                                                                                                                                                            ?>
                                                            <!--" autocomplete="off"/>-->
                                                        </div>


                                                        <div class=" col-sm-1">
                                                            <a href="#" id="Add_cheque" class="client-add-btn btn btn-primary add_cheque"><i class="fa fa-plus-circle m-r-2"></i></a>
                                                        </div>

                                                    </div>
                                                </div>

                                                <!---->

                                            </div>

                                        </div>

                                        <div class="modal-footer">

                                            <a href="#" class="btn btn-danger" data-dismiss="modal">Close</a>

                                        </div>

                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->

                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <input type="submit" id="add_purchase" class="btn btn-primary btn-large add_purchase" name="add-purchase" value="<?php echo display('submit') ?>" />
                                <input type="submit" value="<?php echo display('submit_and_add_another') ?>" name="add-purchase-another" class="btn btn-large btn-success" id="add_purchase_another">
                            </div>
                        </div>
                    </div>


                    <?php echo form_close() ?>

                </div>

            </div>
        </div>
    </section>
</div>
<script type="text/javascript">
   
    
    $(document).ready(function() {
        $('.insert_purchase').one('submit', function() {
            $(".add_purchase").prop('disabled', true);
            $("#add_purchase_another").prop('disabled', true);
        });
    });
</script>
<!-- Purchase Report End -->