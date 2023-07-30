<?php
$CI = &get_instance();
$CI->load->model('Web_settings');
$Web_settings = $CI->Web_settings->retrieve_setting_editdata();
?>

<style>
    table {
        /*border-collapse: collapse;*/
        width: 50%;
        border: none !important;
    }

    th {
        height: 70px;
    }
</style>

<script src="<?php echo base_url() ?>my-assets/js/admin_js/invoice_onloadprint.js" type="text/javascript"></script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('invoice_details') ?></h1>
            <small><?php echo display('invoice_details') ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('invoice') ?></a></li>
                <li class="active"><?php echo display('invoice_details') ?></li>
            </ol>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Alert Message -->
        <?php
        $message = $this->session->userdata('message');
        if (isset($message)) {
        ?>
            <div class="alert alert-info alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
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
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd">
                    <div id="printableArea" class="watermark" onload="printDiv('printableArea')">
                        <style type="text/css" scoped>
                            /* .panel-body:last-child {
                                page-break-after: auto;
                            } */

                            html,
                            body {
                                height: auto;
                            }

                            @media print {
                                .inv-footer-l {
                                    float: left;
                                    width: 35%;
                                    font-size: 14px;
                                }

                                .inv-footer-r {
                                    width: 35%;
                                    font-size: 14px;
                                    float: right;
                                }

                                body {
                                    -webkit-print-color-adjust: exact !important;
                                }

                                html,
                                body {
                                    font-family: 'Times New Roman', Times, serif;
                                    font-size: 18px;
                                    font-weight: bold;

                                    height: 99%;
                                    page-break-after: avoid;
                                    page-break-before: avoid;
                                    /*background-color: rgba(217, 236, 241, 0.9) !important;*/
                                }

                                h4 {
                                    font-family: 'Times New Roman', Times, serif;
                                    font-size: 18px;
                                }

                                table,
                                td,
                                th {
                                    border: 1px solid black;
                                    /*border: none !important;*/
                                }


                                .table td {
                                    border: 1px solid black !important;
                                    background-color: #fff0 !important;
                                    font-size: 14px !important;
                                }

                                .table th {
                                    font-size: 16px !important;
                                    border: 1px solid black !important;
                                    /*background: rgb(255,0,0);*/
                                    /*background: linear-gradient(to top, #c9ffee 0%, #ffffff 100%) !important;*/
                                    /*background: -moz-linear-gradient(to top, #c9ffee 0%, #ffffff 100%) !important;*/
                                    /*background: -webkit-linear-gradient(to top, #c9ffee 0%, #ffffff 100%) !important;*/
                                    /*height: 100% !important;*/
                                    background-color: #c9ffee !important;
                                    text-transform: uppercase !important;

                                    /*color: white !important;*/
                                }

                                table,
                                tr,
                                td {
                                    border: none;
                                }

                                .no_border {
                                    border: none !important;
                                }


                            }
                        </style>
                        <div class="watermark" style="position:absolute; opacity: 0.5; width:100vw; height:100vh; z-index: -1; background-image: url('<?php echo base_url() ?>assets/images/icons/watermark.png') !important; background-repeat: no-repeat !important; background-size: 5.45in auto !important;-webkit-print-color-adjust: exact ; background-position: 1.5in 3in !important;">
                        </div>

                        <div class="panel-body">

                            <div class="col-xs-12 row">

                                
                                <div class="col-xs-6">
                                    <img style="height: 100px; width: 100%" src=" <?php
                                                                                    if (isset($inv_logo)) {
                                                                                        echo html_escape($inv_logo);
                                                                                    }
                                                                                    ?>" class="img-bottom-m" alt="">
                                </div>
                                <div class="col-xs-4 company-content">
                                    {company_info}

                                    <address>
                                        <abbr><i class="ti-location-pin"></i> {address}</abbr><br>
                                        <nobr><abbr>
                                                <nobr><i class="fa fa-whatsapp"></i> Cell:
                                            </abbr> {mobile}</nobr><br>
                                        <abbr><b>


                                    </address>
                                    {/company_info}
                                </div>


                            </div>

                            <div class="col-xs-12 row">

                                <div class="col-xs-5">

                                </div>
                                <div class="col-xs-2 bill ">
                                    Bill

                                </div>


                                <div class="col-xs-5">

                                </div>
                            </div>
                            <div class="col-xs-12 row">

                                <div class="col-xs-5">
                                    <span class="">Bill No : {invoice_no}</span>
                                </div>
                                <div class="col-xs-2  ">


                                </div>


                                <div class="col-xs-5" style="text-align: right">
                                    Date: {final_date}
                                </div>
                            </div> <br> <br>
                            <div class="col-xs-12 row">

                                <div class="col-xs-12">
                                    Name : {customer_name}
                                </div>

                            </div>
                            <div class="col-xs-12 row">

                                <div class="col-xs-6 p-5">
                                    <nobr>Address : {customer_address}</nobr>
                                </div>

                                <!-- <div class="col-xs-3  ">

                                    Department :
                                </div> -->


                                <div class="col-xs-3">
                                    <nobr>Challan No : CH-{invoice_no}</nobr>
                                </div>
                            </div>
                            <br>
                            <div class="margin-top10">

                                <table class="table " style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No.</th>
                                            <th class="text-center">Description</th>
                                            <th class="text-center">Unit</th>
                                            <th class="text-center">Qty</th>
                                            <th class="text-center">Rate</th>
                                            <th class="text-center">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $sl = 1;
                                        $s_total = 0;
                                        foreach ($invoice_all_data as $invoice_data) { ?>
                                            <tr>
                                                <td align="center">
                                                    <nobr><?php echo $sl; ?></nobr>
                                                </td>

                                                <td align="center">
                                                    <?php if ($invoice_data['is_return'] == 0) { ?>
                                                        <?php echo html_escape($invoice_data['product_name']) . '(' . html_escape($invoice_data['sku']) . ')'; ?>

                                                    <?php } else { ?>
                                                        <?php echo html_escape($invoice_data['product_name']) . '(' . html_escape($invoice_data['sku']) . ')(RET)'; ?>

                                                    <?php } ?>

                                                </td>


                                                <td align="center" class="td-style">
                                                    <?php echo html_escape($invoice_data['unit']); ?>
                                                </td>

                                                <td align="center" class="td-style">
                                                    <?php echo html_escape(abs($invoice_data['quantity'])); ?>
                                                </td>


                                                <td align="center" class="td-style">
                                                    <nobr>
                                                        <?php
                                                        if ($position == 0) {
                                                            echo  $currency . ' ' . html_escape($invoice_data['total_price']/$invoice_data['quantity']);
                                                        } else {
                                                            echo html_escape($invoice_data['total_price']/$invoice_data['quantity']) . ' ' . $currency;
                                                        }
                                                        ?>
                                                    </nobr>

                                                </td>
                                                <td align="right" class="td-style" style="width: 15mm !important;">

                                                    <?php
                                                    if ($position == 0) {
                                                        echo  $currency . ' ' . html_escape(abs($invoice_data['total_price']  ));
                                                    } else {
                                                        echo html_escape($invoice_data['total_price']) . ' ' . $currency;
                                                    }
                                                    //                                                $s_total += $invoice_data['total_price_wd'];
                                                    ?>

                                                </td>
                                            </tr>
                                        <?php $sl++;
                                        } ?>



                                        <tr>

                                            <td colspan="4">
                                                <nobr><strong>Taka (In Words) : {am_inword}</strong></nobr>

                                            </td>
                                            <td align="right">
                                                <nobr>Sales Total</nobr>
                                            </td>
                                            <td align="right" class="td-style">
                                                <?php if ($sub_total < 0) { ?>
                                                    <nobr>
                                                        <?php echo html_escape((($position == 0) ? "$currency 0.00" : "0.00 $currency")) ?>
                                                    </nobr>
                                                <?php } else { ?>
                                                    <nobr>
                                                        <?php echo html_escape((($position == 0) ? "$currency {total_amount}" : "{total_amount} $currency")) ?>
                                                    </nobr>
                                                <?php } ?>
                                            </td>
                                        </tr>

                                        <?php if ($invoice_discount > 0) { ?>
                                            <tr hidden>
                                                <td align="left" colspan="4">
                                                    <nobr></nobr>
                                                </td>
                                                <td align="right">
                                                    <nobr><?php echo display('invoice_discount'); ?></nobr>
                                                </td>
                                                <td align="right" class="td-style">
                                                    <nobr>
                                                        <?php echo html_escape((($position == 0) ? "$currency {invoice_discount}" : "{invoice_discount} $currency")) ?>
                                                    </nobr>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        <!--                                    --><?php //if ($total_discount > 0) { 
                                                                                    ?>
                                        <tr>
                                            <td align="left" colspan="4">
                                                <nobr></nobr>
                                            </td>
                                            <td align="right">
                                                <nobr><?php echo display('total_discount') ?></nobr>
                                            </td>
                                            <td align="right" class="td-style">
                                                <nobr>
                                                    <?php echo html_escape((($position == 0) ? "$currency {total_discount}" : "{total_discount} $currency")) ?>
                                                </nobr>
                                            </td>
                                        </tr>
                                        <!--                                    --><?php //} 
                                                                                    ?>
                                        <?php if ($sales_return > 0) { ?>
                                            <tr>
                                                <td align="left" colspan="4">
                                                    <nobr></nobr>
                                                </td>
                                                <td align="right">
                                                    <nobr>Sales Return</nobr>
                                                </td>
                                                <td align="right" class="td-style">
                                                    <nobr>
                                                        <?php echo html_escape((($position == 0) ? "$currency {sales_return}" : "{sales_return} $currency")) ?>

                                                    </nobr>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td align="left" colspan="4">
                                                    <nobr></nobr>
                                                </td>
                                                <td align="right">
                                                    <nobr>Rounding</nobr>
                                                </td>
                                                <td align="right" class="td-style">
                                                    <nobr>
                                                        <?php echo html_escape((($position == 0) ? "$currency {rounding}" : "{rounding} $currency")) ?>

                                                    </nobr>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="right" colspan="4">
                                                </td>
                                                <td align="right">


                                                    <nobr><strong>Payable (Including Vat)</strong></nobr>

                                                </td>
                                                <td align="right" class="td-style">
                                                    <nobr>
                                                        <strong>
                                                            <?php echo html_escape((($position == 0) ? "$currency {total_amount}" : "{total_amount} $currency"))
                                                            ?>
                                                        </strong>
                                                    </nobr>
                                                </td>
                                                </td>
                                            </tr>
                                            <?php if ($previous_paid > 0) { ?>
                                                <tr>
                                                    <td align="left" colspan="4">
                                                        <nobr></nobr>
                                                    </td>
                                                    <td align="right">
                                                        <strong>
                                                            <nobr>
                                                                Previous Paid
                                                            </nobr>
                                                        </strong>
                                                    </td>
                                                    <td align="right" class="td-style">
                                                        <strong>
                                                            <nobr>
                                                                <?php echo html_escape((($position == 0) ? "$currency {previous_paid}" : "{previous_paid} $currency")) ?>
                                                            </nobr>
                                                        </strong>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            <?php if ($courier_status != 5) { ?>
                                                <tr>
                                                    <td align="left" colspan="4">
                                                        <nobr></nobr>
                                                    </td>
                                                    <td align="right">
                                                        <strong>
                                                            <nobr>
                                                                Total Paid
                                                            </nobr>
                                                        </strong>
                                                    </td>
                                                    <td align="right" class="td-style">
                                                        <strong>
                                                            <nobr>
                                                                <?php echo html_escape((($position == 0) ? "$currency {paid_amount}" : "{paid_amount} $currency")) ?>
                                                            </nobr>
                                                        </strong>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <tr>
                                                <td align="left" colspan="4">
                                                    <nobr></nobr>
                                                </td>
                                                <td align="right">
                                                    <nobr>
                                                        <?= ($due_amount < 0) ? 'Refund'  : 'Due'; ?>
                                                    </nobr>

                                                </td>
                                                <td align="right" class="td-style">
                                                    <nobr>
                                                        <?php echo html_escape((($position == 0) ? "$currency {due_amount}" : "{due_amount} $currency")) ?>
                                                    </nobr>
                                                </td>
                                            </tr>
                                            <?php if ($cash_refund > 0) { ?>
                                                <tr>
                                                    <td align="left" colspan="4">
                                                        <nobr></nobr>
                                                    </td>
                                                    <td align="right">
                                                        <nobr>Cash Refund</nobr>
                                                    </td>
                                                    <td align="right" class="td-style">
                                                        <nobr>
                                                            <?php echo html_escape((($position == 0) ? "$currency {cash_refund}" : "{cash_refund} $currency")) ?>

                                                        </nobr>
                                                    </td>
                                                </tr>

                                                <?php if ($customer_ac > 0) { ?>
                                                    <tr>
                                                        <td align="left" colspan="4">
                                                            <nobr></nobr>
                                                        </td>
                                                        <td align="right">
                                                            <nobr>Customer Receivable</nobr>
                                                        </td>
                                                        <td align="right" class="td-style">
                                                            <nobr>
                                                                <?php echo html_escape((($position == 0) ? "$currency {customer_ac}" : "{customer_ac} $currency")) ?>

                                                            </nobr>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            <?php } ?>



                                            <?php if ($due_amount == 0) {
                                            ?>
                                                <?php
                                                foreach ($payment_info as $pay) { ?>

                                                    <?php

                                                    if ($pay->pay_type == 1) {
                                                        $pay_type = 'In Cash';
                                                    }
                                                    if ($pay->pay_type == 2) {
                                                        $pay_type = 'In Cheque';
                                                    }
                                                    if ($pay->pay_type == 3) {
                                                        $pay_type = 'In Bkash';
                                                    }

                                                    if ($pay->pay_type == 4) {
                                                        $pay_type = 'In Bank';
                                                    }

                                                    if ($pay->pay_type == 5) {
                                                        $pay_type = 'In Nagad';
                                                    }

                                                    if ($pay->pay_type == 6) {
                                                        $pay_type = 'In Card';
                                                    }
                                                    if ($pay->pay_type == 7) {
                                                        $pay_type = 'In Rocket';
                                                    }

                                                    ?>
                                                    <tr>
                                                        <td align="left" colspan="4">
                                                            <nobr></nobr>
                                                        </td>
                                                        <td align="right">
                                                            <nobr><?= $pay_type ?></nobr>
                                                        </td>
                                                        <td align="right" class="td-style">
                                                            <nobr>
                                                                <?php echo html_escape((($position == 0) ? $currency . " " . number_format($pay->amount) : number_format($pay->amount) . " " . $currency)) ?>
                                                            </nobr>
                                                        </td>
                                                    </tr>

                                                <?php } ?>

                                            <?php } ?>
                                        <?php } ?>


                                        <?php if ($shipping_cost > 0) { ?>
                                            <tr hidden>
                                                <td align="left">
                                                    <nobr></nobr>
                                                </td>
                                                <td align="right" colspan="4">
                                                    <nobr><?php echo display('shipping_cost') ?></nobr>
                                                </td>
                                                <td align="right" class="td-style">
                                                    <nobr>

                                                        <?php echo html_escape((($position == 0) ? "$currency {shipping_cost}" : "{shipping_cost} $currency")) ?>
                                                    </nobr>
                                                </td>
                                            </tr>
                                        <?php } ?>

                                        <?php if ($sales_return == 0) { ?>

                                            <?php if ($previous > 0) { ?>
                                                <tr>
                                                    <td align="left" colspan="4">
                                                        <nobr></nobr>
                                                    </td>
                                                    <td align="right">
                                                        <nobr><?php echo display('previous') ?></nobr>
                                                    </td>
                                                    <td align="right" class="td-style">
                                                        <nobr>

                                                            <?php echo html_escape((($position == 0) ? "$currency {previous}" : "{previous} $currency")) ?>
                                                        </nobr>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            <tr>
                                                <td align="left" colspan="4">
                                                    <nobr></nobr>
                                                </td>
                                                <td align="right">
                                                    <nobr>Rounding</nobr>
                                                </td>
                                                <td align="right" class="td-style">
                                                    <nobr>
                                                        <?php echo html_escape((($position == 0) ? "$currency {rounding}" : "{rounding} $currency")) ?>

                                                    </nobr>
                                                </td>
                                            </tr>
                                            <?php if ($sale_type == 1) { ?>

                                                <?php if ($shipping_cost > 0) { ?>
                                                    <tr>
                                                        <td align="left" colspan="4">
                                                            <nobr></nobr>
                                                        </td>
                                                        <td align="right">
                                                            <nobr>Delivery Charge</nobr>
                                                        </td>
                                                        <td align="right" class="td-style">
                                                            <nobr>
                                                                <?php echo html_escape((($position == 0) ? "$currency {shipping_cost}" : "{shipping_cost} $currency")) ?>

                                                            </nobr>
                                                        </td>
                                                    </tr>
                                                <?php  } ?>

                                                <?php if ($total_commission > 0) { ?>
                                                    <tr>
                                                        <td align="left" colspan="4">
                                                            <nobr></nobr>
                                                        </td>
                                                        <td align="right">
                                                            <nobr>Total Commission</nobr>
                                                        </td>
                                                        <td align="right" class="td-style">
                                                            <nobr>
                                                                <?php echo html_escape((($position == 0) ? "$currency {total_commission}" : "{total_commission} $currency")) ?>

                                                            </nobr>
                                                        </td>
                                                    </tr>
                                                <?php  } ?>

                                            <?php  } ?>
                                            <!-- <tr>
                                                <td align="right" colspan="4">

                                                </td>
                                                <td align="right">
                                                    <nobr><strong>Net Payable (Including Vat)</strong></nobr>
                                                </td>
                                                <td align="right" class="td-style">
                                                    <nobr>
                                                        <strong>
                                                            <?php echo html_escape((($position == 0) ? "$currency {total_amount}" : "{total_amount} $currency"))
                                                            ?>
                                                        </strong>
                                                    </nobr>
                                                </td>
                                            </tr> -->
                                            <?php if ($previous_paid > 0) { ?>
                                                <tr>
                                                    <td align="left" colspan="4">
                                                        <nobr></nobr>
                                                    </td>
                                                    <td align="right">
                                                        <strong>
                                                            <nobr>
                                                                Previous Paid
                                                            </nobr>
                                                        </strong>
                                                    </td>
                                                    <td align="right" class="td-style">
                                                        <strong>
                                                            <nobr>
                                                                <?php echo html_escape((($position == 0) ? "$currency {previous_paid}" : "{previous_paid} $currency")) ?>
                                                            </nobr>
                                                        </strong>
                                                    </td>
                                                </tr>
                                            <?php } ?>


                                            <?php if ($due_amount == 0 && empty($payment_info)) {
                                            ?>

                                                <?php foreach ($payment_info as $pay) { ?>

                                                    <?php

                                                    if ($pay->pay_type == 1) {
                                                        $pay_type = 'In Cash';
                                                    }
                                                    if ($pay->pay_type == 2) {
                                                        $pay_type = 'In Cheque';
                                                    }
                                                    if ($pay->pay_type == 3) {
                                                        $pay_type = 'In Bkash';
                                                    }

                                                    if ($pay->pay_type == 4) {
                                                        $pay_type = 'In Bank';
                                                    }

                                                    if ($pay->pay_type == 5) {
                                                        $pay_type = 'In Nagad';
                                                    }

                                                    if ($pay->pay_type == 6) {
                                                        $pay_type = 'In Card';
                                                    }
                                                    if ($pay->pay_type == 7) {
                                                        $pay_type = 'In Rocket';
                                                    }

                                                    ?>
                                                    <tr>
                                                        <td align="left" colspan="4">
                                                            <nobr></nobr>
                                                        </td>
                                                        <td align="right">
                                                            <nobr><?= $pay_type ?></nobr>
                                                        </td>
                                                        <td align="right" class="td-style">
                                                            <nobr>
                                                                <?php echo html_escape((($position == 0) ? $currency . " " . number_format($pay->amount) : number_format($pay->amount) . " " . $currency)) ?>
                                                            </nobr>
                                                        </td>
                                                    </tr>

                                                <?php } ?>
                                            <?php } ?>


                                            <?php if ($paid_amount > 0) { ?>
                                                <tr>
                                                    <td align="left" colspan="4">
                                                        <nobr></nobr>
                                                    </td>
                                                    <td align="right">
                                                        <strong>
                                                            <nobr>
                                                                Total Paid
                                                            </nobr>
                                                        </strong>
                                                    </td>
                                                    <td align="right" class="td-style">
                                                        <strong>
                                                            <nobr>
                                                                <?php echo html_escape((($position == 0) ? "$currency {paid_amount}" : "{paid_amount} $currency")) ?>
                                                            </nobr>
                                                        </strong>
                                                    </td>
                                                </tr>
                                            <?php } ?>


                                            <tr>
                                                <td align="left" colspan="4">
                                                    <nobr></nobr>
                                                </td>
                                                <td align="right">
                                                    <nobr>
                                                        Total Due
                                                    </nobr>

                                                </td>
                                                <td align="right" class="td-style">
                                                    <nobr>
                                                        <?php echo html_escape((($position == 0) ? "$currency {due_amount}" : "{due_amount} $currency")) ?>
                                                    </nobr>
                                                </td>
                                            </tr>
                                            <?php if ($changeamount > 0) { ?>
                                                <tr>
                                                    <td align="left" colspan="4">
                                                        <nobr></nobr>
                                                    </td>
                                                    <td align="right">
                                                        <nobr>
                                                            Change
                                                        </nobr>

                                                    </td>
                                                    <td align="right" class="td-style">
                                                        <nobr>
                                                            <?php echo html_escape((($position == 0) ? "$currency {changeamount}" : "{changeamount} $currency")) ?>
                                                        </nobr>
                                                    </td>
                                                </tr>

                                            <?php } ?>
                                        <?php } ?>
                                        <?php if (!empty($invoice_details)) { ?>
                                            <tr>

                                                <td align="left" colspan="4">
                                                    <strong>Notes:</strong> {invoice_details}
                                                </td>

                                            </tr>

                                        <?php } ?>

                                        </td>
                                        </tr>











                                    </tbody>


                                </table>

                            </div>




                            <div class="footer" style="padding: 0.5in;">

                                <div class="row">


                                    <div class="col-sm-4">
                                        <!-- <img style="width:50px;" src="<?php echo base_url() ?>assets/dist/img/signature/proprietor_signature.png" alt="proprietor_signature"> -->



                                        <div class=" inv-footer-r">
                                            <span class="text-right" style="display: block; margin-top:0.5in"><img style="width:150px; margin-right: 5px;" src="<?php echo base_url() ?>assets/dist/img/signature/proprietor_signature.png" alt="proprietor_signature"></span>

                                            <span class="text-center" style="display: block; border-top: 1px solid black;">For <span class="company_name"><?= $company_info[0]['company_name'] ?></span></span>
                                        </div>
                                    </div>


                                </div>


                            </div>

                        </div>

                    </div>
                </div>

                <div class="panel-footer text-left">
                    <input type="hidden" name="" id="url" value="<?php echo base_url('Cinvoice/manage_invoice'); ?>">
                    <a class="btn btn-danger" href="<?php echo base_url('Cinvoice/manage_invoice'); ?>"><?php echo display('cancel') ?></a>
                    <button class="btn btn-info" onclick="printDiv('printableArea')"><span class="fa fa-print"></span></button>

                </div>
            </div>
        </div>
</div>
</section> <!-- /.content -->
</div> <!-- /.content-wrapper -->