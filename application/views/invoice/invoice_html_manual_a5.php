<?php
$CI = &get_instance();
$CI->load->model('Web_settings');
$CI->load->library('converter');
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

    .no_border {
        border: none !important;
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
            <h1><?php echo invoice_display('invoice_details') ?></h1>
            <small><?php echo invoice_display('invoice_details') ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo invoice_display('home') ?></a></li>
                <li><a href="#"><?php echo invoice_display('invoice') ?></a></li>
                <li class="active"><?php echo invoice_display('invoice_details') ?></li>
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
                        <!-- <div id="printableArea" class="watermark"> -->
                        <style type="text/css" scoped>
                            .panel-body:last-child {
                                page-break-after: auto;
                            }

                            @page {
                                margin-top: 1.5in;
                                margin-bottom: 0.5in;
                            }

                            html,
                            body {
                                height: auto;
                            }

                            header {
                                padding: 10px 0;
                                margin-bottom: 20px;
                                border-bottom: 1px solid #AAAAAA;
                            }

                            #company {
                                float: right;
                                text-align: right;
                            }

                            #logo {
                                float: left;
                                margin-top: 8px;
                            }


                            .clearfix:after {
                                content: "";
                                display: table;
                                clear: both;
                            }

                            .condition_tag {
                                margin-top: 80%;
                                margin-left: 5%;
                                top: 0;
                                left: 0;
                                position: fixed;
                                border: 1px dashed red;
                                color: red !important;
                                width: 300px;
                                /* Browsers not below */
                                transform: rotate(-40deg);
                                /* Safari */
                                -webkit-transform: rotate(-40deg);
                                /* Firefox */
                                -moz-transform: rotate(-40deg);
                                /* Opera */
                                -o-transform: rotate(-40deg);
                                /* IE */
                                -ms-transform: rotate(-40deg);


                            }

                            .condition_tag_green {
                                margin-top: 80%;
                                margin-left: 5%;
                                top: 0;
                                left: 0;
                                position: fixed;
                                border: 1px dashed green;
                                color: green !important;
                                width: 300px;
                                /* Browsers not below */
                                transform: rotate(-40deg);
                                /* Safari */
                                -webkit-transform: rotate(-40deg);
                                /* Firefox */
                                -moz-transform: rotate(-40deg);
                                /* Opera */
                                -o-transform: rotate(-40deg);
                                /* IE */
                                -ms-transform: rotate(-40deg);

                            }

                            @media print {



                                .inv-footer-l {
                                    float: left;
                                    width: 35%;
                                    font-size: 14px;
                                }

                                .inv-footer-due {
                                    float: left;
                                    width: 35%;
                                    font-size: 12px;
                                    padding-left: 8px
                                }


                                .inv-footer-r {
                                    width: 35%;
                                    font-size: 14px;
                                    float: right;
                                }

                                .inv-footer-paid {
                                    width: 35%;
                                    font-size: 12px;
                                    float: right;
                                }

                                .inv-footer-pros {
                                    float: left;
                                    width: 35%;
                                    font-size: 12px;
                                    font-weight: bold;
                                }

                                .inv-footer-onum {
                                    width: 35%;
                                    font-size: 12px;
                                    float: right;
                                    font-weight: bold;
                                }

                                body {
                                    -webkit-print-color-adjust: exact !important;
                                }

                                html,
                                body {
                                    font-family: 'Times New Roman', Times, serif;
                                    font-size: 18px;

                                    height: 99%;
                                    page-break-after: avoid;
                                    page-break-before: avoid;
                                    /*margin-top:1px;*/
                                    /*background-color: rgba(217, 236, 241, 0.9) !important;*/
                                }

                                h4 {
                                    font-family: 'Times New Roman', Times, serif;
                                    font-size: 18px;
                                }

                                table,
                                td,
                                th {
                                    /*border: 1px solid black;*/
                                    border: none !important;
                                }


                                .table td {
                                    border: 1px solid black !important;
                                    /*background-color: #fff0 !important;*/
                                    font-size: 12px !important;
                                }

                                .table th {
                                    font-size: 12px !important;
                                    border: 1px solid black !important;
                                    page-break-inside: auto
                                        /*background-color: #eceff4!important;*/
                                        /*color: white !important;*/
                                }

                                table,
                                tr,
                                td {
                                    border: none !important;
                                    page-break-inside: avoid;
                                    page-break-after: auto
                                }


                            }
                        </style>
                        <?php

                        $total_quantity = 0;
                        $total_price_wv = 0;
                        $total_unit_price = 0;
                        ?>


                        <div class="panel-body" style="font-family: Kalpurush;">

                            <div class="row m-0 ">
                                <?php if ($setting_company_logo == "1") { ?>
                                    <div class="col-xs-3 p-0" style="margin-top: -6%;float: left">

                                        <img src="<?= $inv_logo ?>" style="margin-top:20px; width: 100px;height: 60px; text-align: center">

                                    </div>
                                <?php } ?>
                                <div class="col-xs-9 text-center">

                                    <div align="" style="font-family:Kalpurush;line-height: 1; border: 0; padding:0px; padding-right:40px; ">
                                        {company_info}
                                        <?php if ($setting_company_name == "1") { ?>
                                            <span style="font-size: 14px !important;">
                                                <strong>{company_name}</strong>
                                            </span><br>
                                        <?php } ?>
                                        <?php if ($setting_company_address == "1") { ?>
                                            <span style="font-size: 11px !important;">{address}</span><br>
                                        <?php } ?>
                                        {/company_info}

                                    </div>

                                </div>

                            </div>


                            <div class="row" style="font-size: 11px; margin-top: 0.2cm !important">
                                <?php if ($setting_invoice_number == "1") { ?>
                                    <div class="col-xs-6">
                                        <strong>
                                            <nobr><?php echo invoice_display('invoice_no'); ?> # <?= "(".$invoice_all_data[0]['outlet_id'].")"."(".$invoice_all_data[0]['customer_id'].")". $CI->converter->en2bn($invoice_no) ?></nobr>
                                        </strong>
                                    </div>
                                <?php } ?>
                                <?php if ($setting_govt_licence == "1" && $setting_invoice_number == "1") { ?>
                                    <div class="col-xs-6 text-right m-0">
                                        <strong>
                                            <nobr><?= invoice_display('govt_republic_bang') ?></nobr>
                                        </strong>
                                        <br>
                                        <strong>
                                            <nobr><?= invoice_display('national_board_of_revenue') ?>, <?= invoice_display('dhaka') ?></nobr>
                                        </strong>

                                    </div>
                                <?php } ?>
                                <?php if ($setting_govt_licence == "1" && $setting_invoice_number == "0") { ?>
                                    <div class="col-xs-12 text-right m-0">
                                        <strong>
                                            <nobr><?= invoice_display('govt_republic_bang') ?></nobr>
                                        </strong>
                                        <br>
                                        <strong>
                                            <nobr><?= invoice_display('national_board_of_revenue') ?>, <?= invoice_display('dhaka') ?></nobr>
                                        </strong>

                                    </div>
                                <?php } ?>

                            </div>

                            <div class="row" style="font-size: 11px; margin-top: 0.2cm !important">
                                <?php if ($setting_invoice_date == "1") { ?>
                                    <div class="col-xs-6">
                                        <nobr><?= invoice_display('invoice_date') ?>: <?= $CI->converter->en2bn($date) ?></nobr>
                                    </div>
                                <?php } ?>
                                <?php if ($setting_govt_licence == "1") { ?>
                                    <div class="col-xs-6 text-right m-0">
                                        <strong>
                                            <nobr><?= invoice_display('invoice_paper') ?></nobr>
                                        </strong>
                                    </div>
                                <?php } ?>

                            </div>


                            <div class="row" style="font-size: 11px; margin-top: 0.2cm !important">

                                <div class="col-xs-6">
                                    <p></p>
                                    <nobr><?= invoice_display('invoice_expiration_date') ?>:</nobr>
                                </div>
                                <?php if ($setting_govt_licence == "1") { ?>
                                    <div class="col-xs-6 text-right m-0">
                                        <strong>
                                            <nobr><span style="font-size: 8px">[বিধি ৪০ এর উপ-বিধি (১) এর দফা (গ) ও দফা (চ) দ্রষ্টব্য]</span></nobr>
                                        </strong><br>
                                        <strong>
                                            <nobr><?= invoice_display('mushak') ?>: ৬.৩</nobr>
                                        </strong>
                                    </div>
                                <?php } ?>

                            </div>
                            <?php if ($setting_customer_information == "1") { ?>
                                <div class="row" style="font-size: 11px; margin-top: 0.2cm !important">

                                    <div class="col-xs-6">
                                        <strong>
                                            <nobr><?php echo invoice_display('customer_information'); ?>:</nobr>
                                        </strong>
                                    </div>


                                </div>

                                <div class="row" style="font-size: 11px; margin-top: 0.2cm !important">

                                    <div class="col-xs-6 ">
                                        <nobr><?= invoice_display('customer_name'); ?>: {customer_name_bn}</nobr>
                                    </div>

                                    <div class="col-xs-6 text-right m-0">
                                        <nobr><?= invoice_display('mobile'); ?>: <?= $CI->converter->en2bn($customer_mobile) ?></nobr>
                                    </div>

                                </div>
                                <div class="row" style="font-size: 11px; margin-top: 0.2cm !important">

                                    <div class="col-xs-6">
                                        <nobr><?= invoice_display('chamak_id_no'); ?>: {customer_id_two}</nobr>
                                    </div>

                                    <div class="col-xs-6 text-right m-0">
                                        <nobr><?= invoice_display('chamak_card_no'); ?>: {friend_card}</nobr>
                                    </div>

                                </div>

                                <div class="row" style="font-size: 11px; margin-top: 0.2cm !important">

                                    <div class="col-xs-6">
                                        <nobr><?= invoice_display('address'); ?>: {customer_address}</nobr>
                                    </div>


                                </div>
                            <?php } ?>

                            <div class="">



                                <table class="table table-xs table-bordered" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th class="text-center"><?= invoice_display('item_information') ?></th>
                                            <th class="text-center"><?= invoice_display('quantity') ?></th>
                                            <th class="text-center"><?= invoice_display('unit_price') ?></th>
                                            <th class="text-center"><?= invoice_display('total_price') ?></th>
                                            <th class="text-center"><?= invoice_display('vat') ?></th>
                                            <th class="text-center"><?= invoice_display('tax') ?></th>
                                            <th class="text-center"><?= invoice_display('total_price_with_vat') ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $sl = 1;
                                        $s_total = 0;
                                        foreach ($invoice_all_data as $invoice_data) { ?>
                                            <tr>

                                                <td align="center">
                                                    <?php if ($invoice_data['is_return'] == 0) { ?>
                                                        <?php echo html_escape($invoice_data['product_name_bn']) . '-' .
                                                        html_escape($invoice_data['product_name']) . '(' . html_escape($invoice_data['sku']) . ')'; ?>
                                                    <?php } else { ?>
                                                        <?php echo html_escape($invoice_data['product_name_bn']) . '-' . html_escape($invoice_data['product_name']) . '(' . html_escape($invoice_data['sku']) . ')(RET)'; ?>
                                                    <?php } ?>

                                                </td>

                                                <td align="center" class="td-style" width="10%">
                                                    <?php echo $CI->converter->en2bn(abs($invoice_data['quantity']));
                                                    $total_quantity += $invoice_data['quantity'];
                                                    ?>
                                                </td>


                                                <!-- <td align="right" class="td-style">
                                                <nobr>
                                                    <?php
                                                    if (!empty($invoice_data['discount_per'])) {
                                                        $curicon = $currency;
                                                    } else {
                                                        $curicon = '';
                                                    }
                                                    if ($position == 0) {
                                                        echo  $curicon . ' ' .  $CI->converter->en2bn($invoice_data['discount_per']);
                                                    } else {
                                                        echo $CI->converter->en2bn($invoice_data['discount_per']) . ' ' . $curicon;
                                                    }
                                                    ?>
                                                </nobr>
                                            </td> -->
                                                <td align="right" class="td-style">
                                                    <nobr>
                                                        <?php
                                                        if ($position == 0) {
                                                            echo  $currency . ' ' . $CI->converter->en2bn($invoice_data['rate']);
                                                            $total_unit_price += $invoice_data['rate'];
                                                        } else {
                                                            echo $CI->converter->en2bn($invoice_data['rate']) . ' ' . $currency;
                                                        }
                                                        ?>
                                                    </nobr>
                                                </td>
                                                <td align="right" class="td-style" style="width: 15mm !important;">

                                                    <?php
                                                    if ($position == 0) {
                                                        echo  $currency . ' ' . $CI->converter->en2bn($invoice_data['total_price_wd']);
                                                    } else {
                                                        echo  $CI->converter->en2bn($invoice_data['total_price_wd']) . ' ' . $currency;
                                                    }
                                                    //                                                $s_total += $invoice_data['total_price_wd'];
                                                    ?>

                                                </td>
                                                <td align="right" class="td-style" style="width: 15mm !important;">

                                                    <?php
                                                    if ($position == 0) {
                                                        echo  $currency . ' ' .  $CI->converter->en2bn($invoice_data['vat']);
                                                    } else {
                                                        echo  $CI->converter->en2bn($invoice_data['vat']) . ' ' . $currency;
                                                    }
                                                    //                                                $s_total += $invoice_data['total_price_wd'];
                                                    ?>

                                                </td>
                                                <td align="right" class="td-style" style="width: 15mm !important;">

                                                    <?php
                                                    if ($position == 0) {
                                                        echo  $currency . ' ' .  $CI->converter->en2bn($invoice_data['tax']);
                                                    } else {
                                                        echo  $CI->converter->en2bn($invoice_data['tax']) . ' ' . $currency;
                                                    }
                                                    //                                                $s_total += $invoice_data['total_price_wd'];
                                                    ?>

                                                </td>
                                                <td align="right" class="td-style" style="width: 15mm !important;">

                                                    <?php
                                                    if ($position == 0) {
                                                        echo  $currency . ' ' .  $CI->converter->en2bn(abs($invoice_data['total_price']));
                                                    } else {
                                                        echo $CI->converter->en2bn($invoice_data['total_price']) . ' ' . $currency;
                                                        $total_price_wv += $invoice_data['total_price'];
                                                    }
                                                    //                                                $s_total += $invoice_data['total_price_wd'];
                                                    ?>

                                                </td>
                                            </tr>
                                        <?php $sl++;
                                        } ?>


                                        <tr>
                                            <!--                                            <td align="left">-->
                                            <!--                                                <nobr></nobr>-->
                                            <!--                                            </td>-->
                                            <td align="right" colspan="1">
                                                <nobr><?= invoice_display('total') ?></nobr>
                                            </td>
                                            <td align="center"><?= $CI->converter->en2bn($total_quantity)  ?></td>
                                            <td align="right" class="td-style">

                                                <?php if ($total_unit_price < 0) { ?>
                                                    <nobr>

                                                        <?php echo html_escape((($position == 0) ? $currency . ' ' . $CI->converter->en2bn(0.00) : $CI->converter->en2bn(0.00) . ' ' . $currency)) ?>


                                                    </nobr>
                                                <?php } else { ?>
                                                    <nobr>

                                                        <?php echo html_escape((($position == 0) ? $currency . ' ' . $CI->converter->en2bn(number_format($total_unit_price)) : $CI->converter->en2bn(number_format($total_unit_price)) . ' ' . $currency)) ?>

                                                    </nobr>
                                                <?php } ?>
                                            </td>
                                            <!-- <td align="right" class="td-style">
                                                <?php if ($sub_total < 0) { ?>
                                                    <nobr>

                                                        <?php echo html_escape((($position == 0) ? $currency . ' ' . $CI->converter->en2bn(0.00) : $CI->converter->en2bn(0.00) . ' ' . $currency)) ?>

                                                    </nobr>
                                                <?php } else { ?>
                                                    <nobr>

                                                        <?php echo html_escape((($position == 0) ? $currency . ' ' . $CI->converter->en2bn($sub_total) : $CI->converter->en2bn($sub_total) . ' ' . $currency)) ?>

                                                    </nobr>
                                                <?php } ?>
                                            </td> -->

                                            <td align="right" class="td-style">
                                                <nobr>

                                                    <?php echo html_escape((($position == 0) ? $currency . ' ' . $CI->converter->en2bn($sub_total) : $CI->converter->en2bn($sub_total) . ' ' . $currency)) ?>

                                                </nobr>

                                            </td>

                                            <td align="right" class="td-style">
                                                <?php if ($total_vat < 0) { ?>
                                                    <nobr>

                                                        <?php echo html_escape((($position == 0) ? $currency . ' ' . $CI->converter->en2bn(0.00) : $CI->converter->en2bn(0.00) . ' ' . $currency)) ?>

                                                    </nobr>
                                                <?php } else { ?>
                                                    <nobr>

                                                        <?php echo html_escape((($position == 0) ? $currency . ' ' . $CI->converter->en2bn($total_vat) : $CI->converter->en2bn($total_vat) . ' ' . $currency)) ?>

                                                    </nobr>
                                                <?php } ?>
                                            </td>
                                            <td align="right" class="td-style">
                                                <?php if ($total_tax < 0) { ?>
                                                    <nobr>

                                                        <?php echo html_escape((($position == 0) ? $currency . ' ' . $CI->converter->en2bn(0.00) : $CI->converter->en2bn(0.00) . ' ' . $currency)) ?>

                                                    </nobr>
                                                <?php } else { ?>
                                                    <nobr>

                                                        <?php echo html_escape((($position == 0) ? $currency . ' ' . $CI->converter->en2bn($total_tax) : $CI->converter->en2bn($total_tax) . ' ' . $currency)) ?>

                                                    </nobr>
                                                <?php } ?>
                                            </td>
                                            <!-- <td align="right" class="td-style">
                                                <?php if ($subTotal_ammount < 0) { ?>
                                                    <nobr>

                                                        <?php echo html_escape((($position == 0) ? $currency . ' ' . $CI->converter->en2bn(0.00) : $CI->converter->en2bn(0.00) . ' ' . $currency)) ?>

                                                    </nobr>
                                                <?php } else { ?>
                                                    <nobr>

                                                        <?php echo html_escape((($position == 0) ? $currency . ' ' . $CI->converter->en2bn($subTotal_ammount) : $CI->converter->en2bn($subTotal_ammount) . ' ' . $currency)) ?>

                                                    </nobr>
                                                <?php } ?>
                                            </td> -->

                                            <td align="right" class="td-style">
                                                <nobr>

                                                    <?php echo html_escape((($position == 0) ? $currency . ' ' . $CI->converter->en2bn($subTotal_ammount) : $CI->converter->en2bn($subTotal_ammount) . ' ' . $currency)) ?>

                                                </nobr>
                                            </td>

                                        </tr>

                                        <?php if ($invoice_discount > 0) { ?>
                                            <tr hidden>
                                                <td align="left">
                                                    <nobr></nobr>
                                                </td>
                                                <td align="right" colspan="5">
                                                    <nobr><?php echo invoice_display('invoice_discount'); ?></nobr>
                                                </td>
                                                <td align="right" class="td-style">
                                                    <nobr>

                                                        <?php echo html_escape((($position == 0) ? $currency . ' ' . $CI->converter->en2bn($invoice_discount) : $CI->converter->en2bn($invoice_discount) . ' ' . $currency)) ?>

                                                    </nobr>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        <!--                                    --><?php //if ($total_discount > 0) { 
                                                                                    ?>
                                        <tr>
                                            <td align="left" colspan="3" style="   border: none !important;">
                                                <nobr><?= invoice_display('payment_method') ?>:</nobr>
                                            </td>
                                            <td class="no_border" align="right" colspan="3">
                                                <nobr>[-] <?= invoice_display('total_discount') ?></nobr>
                                            </td>
                                            <td align="right" class="td-style">
                                                <nobr>

                                                    <?php echo html_escape((($position == 0) ? $currency . ' ' . $CI->converter->en2bn($total_discount) : $CI->converter->en2bn($total_discount) . ' ' . $currency)) ?>

                                                </nobr>
                                            </td>
                                        </tr>
                                        <!--                                    --><?php //} 
                                                                                    ?>
                                        <?php if ($sales_return > 0) { ?>
                                            <tr>
                                                <td align="left" colspan="3" style="border: none !important;">
                                                    <nobr></nobr>
                                                </td>
                                                <td align="right" colspan="3">
                                                    <nobr><?= invoice_display('return_amount') ?></nobr>
                                                </td>
                                                <td align="right" class="td-style">
                                                    <nobr>

                                                        <?php echo html_escape((($position == 0) ? $currency . ' ' . $CI->converter->en2bn($sales_return) : $CI->converter->en2bn($sales_return) . ' ' . $currency)) ?>


                                                    </nobr>
                                                </td>
                                            </tr>

                                            <tr hidden>
                                                <td align="left" colspan="3" style="   border: none !important;">
                                                    <nobr></nobr>
                                                </td>
                                                <td align="right" colspan="5">
                                                    <nobr><?= invoice_display('rounding') ?></nobr>
                                                </td>
                                                <td align="right" class="td-style">
                                                    <nobr>

                                                        <?php echo html_escape((($position == 0) ? $currency . ' ' . $CI->converter->en2bn($rounding) : $CI->converter->en2bn($rounding) . ' ' . $currency)) ?>


                                                    </nobr>
                                                </td>
                                            </tr>
                                            <tr hidden>
                                                <td align="right" colspan="5">
                                                    <nobr> <strong>Payable</strong></nobr>
                                                </td>
                                                <td align="right">


                                                    <nobr><strong>(Including Vat)</strong></nobr>

                                                </td>
                                                <td align="right" class="td-style">
                                                    <nobr>
                                                        <strong>

                                                            <?php echo html_escape((($position == 0) ? $currency . ' ' . $CI->converter->en2bn($total_amount) : $CI->converter->en2bn($total_amount) . ' ' . $currency)) ?>

                                                            ?>
                                                        </strong>
                                                    </nobr>
                                                </td>
                                                </td>
                                            </tr>
                                            <?php if ($previous_paid > 0) { ?>
                                                <tr>
                                                    <td align="left" colspan="3" style="   border: none !important;">
                                                        <nobr></nobr>
                                                    </td>
                                                    <td align="right" colspan="3">
                                                        <nobr>
                                                            পূর্ববর্তী পেমেন্ট
                                                        </nobr>

                                                    </td>
                                                    <td align="right" class="td-style">
                                                        <nobr>

                                                            <?php echo html_escape((($position == 0) ? $currency . ' ' . $CI->converter->en2bn($previous_paid) : $CI->converter->en2bn($previous_paid) . ' ' . $currency)) ?>

                                                        </nobr>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            <?php if ($courier_status != 5) { ?>
                                                <tr hidden>
                                                    <td align="left" colspan="3" style="   border: none !important;">
                                                        <nobr></nobr>
                                                    </td>
                                                    <td align="right" colspan="5">
                                                        <strong>
                                                            <nobr>
                                                                Total Paid
                                                            </nobr>
                                                        </strong>
                                                    </td>
                                                    <td align="right" class="td-style">
                                                        <strong>
                                                            <nobr>

                                                                <?php echo html_escape((($position == 0) ? $currency . ' ' . $CI->converter->en2bn($paid_amount) : $CI->converter->en2bn($paid_amount) . ' ' . $currency)) ?>

                                                            </nobr>
                                                        </strong>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <tr>
                                                <td align="left" colspan="3" style="border: none !important;">
                                                    <nobr></nobr>
                                                </td>
                                                <td align="right" colspan="3">
                                                    <nobr>
                                                        <?= ($due_amount < 0) ? 'রিফান্ড'  : 'বকেয়া'; ?>
                                                    </nobr>

                                                </td>
                                                <td align="right" class="td-style">
                                                    <nobr>

                                                        <?php echo html_escape((($position == 0) ? $currency . ' ' . $CI->converter->en2bn($due_amount) : $CI->converter->en2bn($due_amount) . ' ' . $currency)) ?>

                                                    </nobr>
                                                </td>
                                            </tr>
                                            <?php if ($cash_refund > 0) { ?>
                                                <tr>
                                                    <td align="left" colspan="3" style="border: none !important;">
                                                        <nobr></nobr>
                                                    </td>
                                                    <td align="right" colspan="3">
                                                        <nobr>ক্যাশ রিফান্ড</nobr>
                                                    </td>
                                                    <td align="right" class="td-style">
                                                        <nobr>

                                                            <?php echo html_escape((($position == 0) ? $currency . ' ' . $CI->converter->en2bn($cash_refund) : $CI->converter->en2bn($cash_refund) . ' ' . $currency)) ?>


                                                        </nobr>
                                                    </td>
                                                </tr>

                                                <?php if ($customer_ac > 0) { ?>
                                                    <tr>
                                                        <td align="left" style="   border: none !important;">



                                                            <?php foreach ($payment_info as $pay) { ?>

                                                                <?php

                                                                if ($pay->pay_type == 1) {
                                                                    $pay_type = invoice_display('cash_payment');
                                                                }
                                                                if ($pay->pay_type == 2) {
                                                                    $pay_type = invoice_display('check_payment');
                                                                }
                                                                if ($pay->pay_type == 3) {
                                                                    $pay_type = invoice_display('bkash_payment');
                                                                }

                                                                if ($pay->pay_type == 4) {
                                                                    $pay_type = invoice_display('bank_payment');
                                                                }

                                                                if ($pay->pay_type == 5) {
                                                                    $pay_type = invoice_display('nagad_payment');
                                                                }

                                                                if ($pay->pay_type == 6) {
                                                                    $pay_type = invoice_display('card_payment');
                                                                }
                                                                if ($pay->pay_type == 7) {
                                                                    $pay_type = invoice_display('rocket_payment');
                                                                }

                                                                ?>


                                                                <nobr>&nbsp;<?= $pay_type ?>:
                                                                    <?php echo html_escape((($position == 0) ? $currency . ' ' . $CI->converter->en2bn(number_format($pay->amount)) : $CI->converter->en2bn(number_format($pay->amount)) . ' ' . $currency)) ?>

                                                                </nobr>



                                                            <?php } ?>

                                                        </td>
                                                        <td colspan="2" style="   border: none !important;"></td>
                                                        <td align="right" colspan="3">
                                                            <nobr>কাস্টমার রিসিভেবল</nobr>
                                                        </td>
                                                        <td align="right" class="td-style">
                                                            <nobr>

                                                                <?php echo html_escape((($position == 0) ? $currency . ' ' . $CI->converter->en2bn($customer_ac) : $CI->converter->en2bn($customer_ac) . ' ' . $currency)) ?>


                                                            </nobr>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            <?php } ?>




                                        <?php } ?>


                                        <!--                                        --><?php //if ($shipping_cost > 0) { 
                                                                                        ?>
                                        <tr>
                                            <td align="left" style="   border: none !important;">



                                                <?php foreach ($payment_info as $pay) { ?>

                                                    <?php

                                                    if ($pay->pay_type == 1) {
                                                        $pay_type = invoice_display('cash_payment');
                                                    }
                                                    if ($pay->pay_type == 2) {
                                                        $pay_type = invoice_display('check_payment');
                                                    }
                                                    if ($pay->pay_type == 3) {
                                                        $pay_type = invoice_display('bkash_payment');
                                                    }

                                                    if ($pay->pay_type == 4) {
                                                        $pay_type = invoice_display('bank_payment');
                                                    }

                                                    if ($pay->pay_type == 5) {
                                                        $pay_type = invoice_display('nagad_payment');
                                                    }

                                                    if ($pay->pay_type == 6) {
                                                        $pay_type = invoice_display('card_payment');
                                                    }
                                                    if ($pay->pay_type == 7) {
                                                        $pay_type = invoice_display('rocket_payment');
                                                    }


                                                    ?>


                                                    <nobr>&nbsp;<?= $pay_type ?>:
                                                        <?php echo html_escape((($position == 0) ? $currency . ' ' . $CI->converter->en2bn(number_format($pay->amount)) : $CI->converter->en2bn(number_format($pay->amount)) . ' ' . $currency)) ?>

                                                    </nobr>



                                                <?php } ?>

                                            </td>
                                            <td colspan="2" style="   border: none !important;"></td>
                                            <td align="right" colspan="3">
                                                <nobr>[+] <?= invoice_display('shipping_and_handling') ?></nobr>
                                            </td>
                                            <td align="right" class="td-style">
                                                <nobr>
                                                    <?php echo html_escape((($position == 0) ? $currency . ' ' . $CI->converter->en2bn($shipping_cost) : $CI->converter->en2bn($shipping_cost) . ' ' . $currency)) ?>


                                                </nobr>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td align="left" style="   border: none !important;">
                                                <nobr><?= invoice_display('chamak_point') ?>:</nobr>
                                            </td>
                                            <td colspan="2" style="   border: none !important;"></td>
                                            <td align="right" colspan="3">
                                                <nobr>[+] <?= invoice_display('service_charge') ?></nobr>
                                            </td>
                                            <td align="right" class="td-style">
                                                <nobr>
                                                    <?php echo html_escape((($position == 0) ? $currency . ' ' . $CI->converter->en2bn($service_charge) : $CI->converter->en2bn($service_charge) . ' ' . $currency)) ?>

                                                </nobr>
                                            </td>
                                        </tr>

                                        <?php if ($previous_paid > 0) { ?>
                                            <tr hidden>

                                                <td colspan="3" style="   border: none !important;">
                                                </td>
                                                <td align="right" colspan="3">

                                                    <nobr>পূর্ববর্তী পেমেন্ট</nobr>
                                                </td>
                                                <td align="right" class="td-style">
                                                    <nobr>

                                                        <?php echo html_escape((($position == 0) ? $currency . ' ' . $CI->converter->en2bn($previous_paid) : $CI->converter->en2bn($previous_paid) . ' ' . $currency)) ?>

                                                    </nobr>
                                                </td>
                                            </tr>
                                        <?php } ?>


                                        <!-- <?php if ($previous > 0) { ?>
                                            <tr>
                                                <td colspan="3" style="   border: none !important;">
                                                </td>
                                                <td align="right" colspan="3">
                                                    <nobr>পূর্ববর্তী বকেয়া</nobr>
                                                </td>
                                                <td align="right" class="td-style">
                                                    <nobr>

                                                        <?php echo html_escape((($position == 0) ? $currency . ' ' . $CI->converter->en2bn($previous) : $CI->converter->en2bn($previous) . ' ' . $currency)) ?>

                                                    </nobr>
                                                </td>
                                            </tr>
                                        <?php } ?> -->
                                        <tr>

                                            <?php if ($sales_return > 0) { ?>

                                                <td colspan="3" style="   border: none !important;"></td>
                                                <td align="right" colspan="3">
                                                    <nobr><?= invoice_display('total_amount') ?></nobr>
                                                </td>
                                                <td align="right" class="td-style">
                                                    <nobr>

                                                        <?php echo html_escape((($position == 0) ? $currency . ' ' . $CI->converter->en2bn($total_amount) : $CI->converter->en2bn($total_amount) . ' ' . $currency)) ?>

                                                    </nobr>
                                                </td>

                                            <?php } else { ?>

                                                <td align="left" style="   border: none !important;">
                                                    <nobr><?= invoice_display('advance_payment') ?>:</nobr>
                                                </td>

                                                <td colspan="2" style="   border: none !important;"></td>
                                                <td align="right" colspan="3">
                                                    <nobr><?= invoice_display('total_amount') ?></nobr>
                                                </td>
                                                <td align="right" class="td-style">
                                                    <nobr>

                                                        <?php echo html_escape((($position == 0) ? $currency . ' ' . $CI->converter->en2bn($total_amount) : $CI->converter->en2bn($total_amount) . ' ' . $currency)) ?>

                                                    </nobr>
                                                </td>

                                            <?php } ?>


                                        </tr>

                                        <!--                                        --><?php //} 
                                                                                        ?>

                                        <?php if ($sales_return == 0) { ?>

                                            <tr hidden>
                                                <td align="left">
                                                    <nobr></nobr>
                                                </td>
                                                <td align="right" colspan="5">
                                                    <nobr>Rounding</nobr>
                                                </td>
                                                <td align="right" class="td-style">
                                                    <nobr>

                                                        <?php echo html_escape((($position == 0) ? $currency . ' ' . $CI->converter->en2bn($rounding) : $CI->converter->en2bn($rounding) . ' ' . $currency)) ?>


                                                    </nobr>
                                                </td>
                                            </tr>



                                            <?php if ($total_commission > 0) { ?>
                                                <tr hidden>
                                                    <td align="left">
                                                        <nobr></nobr>
                                                    </td>
                                                    <td align="right" colspan="5">
                                                        <nobr>Total Commission</nobr>
                                                    </td>
                                                    <td align="right" class="td-style">
                                                        <nobr>

                                                            <?php echo html_escape((($position == 0) ? $currency . ' ' . $CI->converter->en2bn($total_commission) : $CI->converter->en2bn($total_commission) . ' ' . $currency)) ?>


                                                        </nobr>
                                                    </td>
                                                </tr>
                                            <?php  } ?>


                                            <tr hidden>
                                                <td align="right" colspan="5">
                                                    <nobr> <strong>Net Payable</strong></nobr>
                                                </td>
                                                <td align="right">
                                                    <nobr><strong>(Including Vat)</strong></nobr>
                                                </td>
                                                <td align="right" class="td-style">
                                                    <nobr>
                                                        <strong>

                                                            <?php echo html_escape((($position == 0) ? $currency . ' ' . $CI->converter->en2bn($total_amount) : $CI->converter->en2bn($total_amount) . ' ' . $currency)) ?>


                                                        </strong>
                                                    </nobr>
                                                </td>
                                            </tr>








                                            <?php if ($changeamount > 0) { ?>
                                                <tr hidden>
                                                    <td align="left">
                                                        <nobr></nobr>
                                                    </td>
                                                    <td align="right" colspan="5">
                                                        <nobr>
                                                            চেঞ্জ
                                                        </nobr>

                                                    </td>
                                                    <td align="right" class="td-style">
                                                        <nobr>

                                                            <?php echo html_escape((($position == 0) ? $currency . ' ' . $CI->converter->en2bn($changeamount) : $CI->converter->en2bn($changeamount) . ' ' . $currency)) ?>

                                                        </nobr>
                                                    </td>
                                                </tr>

                                            <?php } ?>
                                        <?php } ?>
                                        <?php if (!empty($invoice_details)) { ?>
                                            <tr hidden>

                                                <td align="left" colspan="5">
                                                    <strong>Notes:</strong> {invoice_details}
                                                </td>

                                            </tr>

                                        <?php } ?>

                                        </td>
                                        </tr>
                                    </tbody>


                                </table>


                                <div class="row">
                                    <div class="col-sm-4">

                                        <div class="inv-footer-due">

                                            <?php if ($sales_return > 0) { ?>
                                                <span style="display: block;">মোট রিফান্ডঃ <?php echo html_escape((($position == 0) ? $currency . ' ' . $CI->converter->en2bn($cash_refund) : $CI->converter->en2bn($cash_refund) . ' ' . $currency)) ?>

                                                </span>
                                            <?php } else { ?>
                                                <span style="display: block;"><?= invoice_display('total_paid') ?>: <?php
                                                                                                                    echo html_escape((($position == 0) ? $currency . ' ' . $CI->converter->en2bn($paid_amount) : $CI->converter->en2bn($paid_amount) . ' ' . $currency)) ?>

                                                </span>
                                                <br>
                                                <?php if ($previous > 0) { ?>

                                                    <span style="display: block;">পূর্ববর্তী বকেয়াঃ <?php echo html_escape((($position == 0) ? $currency . ' ' . $CI->converter->en2bn($previous) : $CI->converter->en2bn($previous) . ' ' . $currency)) ?>

                                                    </span>
                                                <?php } ?>
                                            <?php } ?>



                                            <!--                                                    <span class="text-center" style="display: block;border-top: 1px solid black; margin-top:0.5in">(Sign with Date)</span>-->

                                        </div>
                                    </div>

                                    <div class="col-sm-4">

                                        <div class="inv-footer-paid">

                                            <?php if ($sales_return > 0) { ?>
                                                <span style="display: block;"><?= invoice_display('refund_due_amount') ?>: <?php echo html_escape((($position == 0) ? $currency . ' ' . $CI->converter->en2bn($customer_ac) : $CI->converter->en2bn($customer_ac) . ' ' . $currency)) ?>
                                                </span>

                                                <!-- <span style="display: block;">রিফান্ড বকেয়ার পরিমাণঃ <?php echo ($customer_ac) ?>
                                                </span> -->
                                            <?php } else { ?>

                                                <span style="display: block;"><?= invoice_display('due_amount') ?>:<?php echo html_escape((($position == 0) ? $currency . ' ' . $CI->converter->en2bn($due_amount) : $CI->converter->en2bn($due_amount) . ' ' . $currency)) ?>

                                                </span>

                                            <?php } ?>



                                        </div>
                                    </div>


                                </div>


                            </div>





                            <div class="footer" style="position:relative;padding: 0.5in;">

                                <div class="row">
                                    <?php if ($setting_customer_signature == "1") { ?>
                                        <div class="col-sm-4">

                                            <div class="inv-footer-l">
                                                <span style="display: block;"><?= invoice_display('customer_signature') ?>:<span>
                                                        <!--                                                    <span class="text-center" style="display: block;border-top: 1px solid black; margin-top:0.5in">(Sign with Date)</span>-->
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php if ($setting_seller_signature == "1") { ?>
                                        <div class="col-sm-4">

                                            <div class="inv-footer-r">
                                                <span style="display: block;"><?= invoice_display('seller_signature') ?>:</span>
                                                <!--                                            <span class="text-center" style="display: block; border-top: 1px solid black; margin-top:0.5in">(Sign with Date)</span>-->
                                            </div>
                                        </div>
                                    <?php } ?>


                                </div>


                                <div class="row m-t-20">
                                    <?php if ($setting_invoice_creator == "1") { ?>
                                        <div class="col-sm-4">

                                            <div class="inv-footer-pros">
                                                <span style="display: block;"><?= invoice_display('manufacturer') ?>:<span>
                                                        <!--                                                    <span class="text-center" style="display: block;border-top: 1px solid black; margin-top:0.5in">(Sign with Date)</span>-->
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php if ($setting_invoice_approver == "1") { ?>
                                        <div class="col-sm-4">

                                            <div class="inv-footer-onum">
                                                <span style="display: block;"><?= invoice_display('approver') ?>:</span>
                                                <!--                                            <span class="text-center" style="display: block; border-top: 1px solid black; margin-top:0.5in">(Sign with Date)</span>-->
                                            </div>
                                        </div>
                                    <?php } ?>


                                </div>

                                <div class="col-xs-9 text-center">

                                    <div align="" style="font-family:Kalpurush;line-height: 6; border: 0">

                                        Powered by <strong>Devenport</strong>

                                    </div>

                                </div>


                            </div>

                        </div>
                    </div>
                </div>

                <div class="panel-footer text-left">
                    <input type="hidden" name="" id="url" value="<?php echo base_url('Cinvoice/gui_pos'); ?>">
                    <a class="btn btn-danger" href="<?php echo base_url('Cinvoice/gui_pos'); ?>"><?php echo invoice_display('cancel') ?></a>
                    <button class="btn btn-info" onclick="printDiv('printableArea')"><span class="fa fa-print"></span></button>

                    <!-- <button class="btn btn-info"><span class="fa fa-print"></span></button> -->

                </div>
            </div>
        </div>
</div>
</section> <!-- /.content -->
</div> <!-- /.content-wrapper -->