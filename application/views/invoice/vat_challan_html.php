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
                            .panel-body:last-child {
                                page-break-after: auto;
                            }

                            html,
                            body {
                                height: auto;
                            }

                            * {
                                font-family: Kalpurush;
                            }

                            .border_box {
                                border: 1px solid black;

                            }

                            .right_border {
                                border-right: 2px solid black;
                            }

                            @media print {

                                @page {
                                    size: landscape;
                                }

                                .row-1 .inv-footer-l {
                                    float: left;
                                    width: 37%;
                                    font-size: 12px;
                                    text-align: left;
                                }

                                .row-1 .inv-footer-r {
                                    width: 20%;
                                    font-size: 12px;
                                    float: left;
                                    text-align: left;
                                }
                                .row-1 .inv-footer-r-des {
                                    width: 20%;
                                    margin-left: 85px;
                                    font-size: 12px;
                                    float: left;
                                    text-align: left;
                                }

                                .row-2 .inv-footer-l {
                                    float: left;
                                    width: 50%;
                                    font-size: 12px;

                                }

                                .row-2 .inv-footer-l .inv-footer-inner-l {
                                    float: left;
                                    width: 60%;
                                    font-size: 12px;

                                }

                                .row-2 .inv-footer-l .inv-footer-inner-r {
                                    float: right;
                                    width: 38%;
                                    font-size: 12px;

                                }

                                .row-2 .inv-footer-r {
                                    width: 50%;
                                    font-size: 12px;
                                    float: right;
                                }

                                .row-2 .inv-footer-r .inv-footer-inner-l {
                                    float: left;
                                    width: 30%;
                                    font-size: 12px;
                                }

                                .row-2 .inv-footer-r .inv-footer-inner-r {
                                    float: right;
                                    width: 60%;
                                    font-size: 12px;

                                }

                                body {
                                    -webkit-print-color-adjust: exact !important;
                                }

                                html,
                                body {
                                    font-family: 'Times New Roman', Times, serif;
                                    font-size: 12px;
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
                                    font-size: 12px !important;
                                }

                                .table th {
                                    font-size: 12px !important;
                                    border: 1px solid black !important;
                                    /*background: rgb(255,0,0);*/
                                    /*background: linear-gradient(to top, #c9ffee 0%, #ffffff 100%) !important;*/
                                    /*background: -moz-linear-gradient(to top, #c9ffee 0%, #ffffff 100%) !important;*/
                                    /*background: -webkit-linear-gradient(to top, #c9ffee 0%, #ffffff 100%) !important;*/
                                    /*height: 100% !important;*/
                                    /*background-color: #c9ffee !important;*/
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



                        <div class="panel-body">

                            <div class="col-xs-12 row" style="text-align: center">
                                <div class="col-xs-4" style="text-align: end">
                                    <img style="height: 60px; width: 28%" src="<?php echo base_url() ?>assets/images/icons/govt_logo.png" />

                                </div>
                                <div class="col-xs-6">
                                    <address>
                                        <abbr>গণপ্রজাতন্ত্রী বাংলাদেশ সরকার</abbr><br>
                                        <abbr>জাতীয় রাজস্ব বোর্ড</abbr><br><br>
                                        <abbr>কর চালানপত্র</abbr><br>
                                        <abbr>[বিধি ৪০ এর উপ-বিধি (১) এর দফা(গ) ও দফা (চ) দ্রষ্টব্য]</abbr>


                                    </address>
                                </div>

                                <div class="col-xs-2 border_box " style="text-align: end">

                                    মুষক - ৬.৩
                                </div>

                            </div>


                            <div class="col-xs-12 row">

                                <div class="col-xs-5">
                                </div>
                                <div class="col-xs-2  ">


                                </div>


                                <div class="col-xs-5" style="text-align: right">
                                    চালানপত্র নম্বরঃ CH-{invoice_no}
                                </div>
                            </div> <br> <br>
                            <div class="col-xs-12 row">

                                <div class="col-xs-4 right_border">
                                    <address>
                                        <abbr> ক্রেতার নামঃ {customer_name}</abbr> <br>
                                        <abbr> ক্রেতার ঠিকানাঃ {customer_address}</abbr> <br>
                                        <abbr> ক্রেতার বিআইএনঃ {bin}</abbr> <br>
                                        <abbr> সরবরাহের গন্তব্যস্থলঃ</abbr> <br>

                                    </address>
                                </div>
                                <div class="col-xs-5 right_border">
                                    <address>
                                        <nobr> <abbr> নিবন্ধিত ব্যাক্তির নামঃ <span class="company_name"><?= $company_info[0]['company_name'] ?></span></abbr> </nobr><br>
                                        <abbr> নিবন্ধিত ব্যাক্তির বিআইএনঃ 005159409-0502</abbr> <br>
                                        <abbr> চালানপত্র ইস্যুর ঠিকানাঃ <?= $company_info[0]['address'] ?></abbr> <br>

                                    </address>
                                </div>
                                <div class="col-xs-3">
                                    <address>
                                        <abbr> </abbr> <br>
                                        <abbr> ইস্যুর তারিখঃ {final_date}</abbr> <br>
                                        <abbr> ইস্যুর সময়ঃ {time}</abbr> <br>
                                        <abbr> ডিপার্টমেন্ট:</abbr> <br>


                                    </address>
                                </div>

                            </div>

                            <br>
                            <div class="margin-top10">

                                <table class="table " style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th class="text-center">ক্রঃ নং</th>
                                            <th class="text-center">পণ্য বা সেবার বর্ণনা (প্রযোজ্য ক্ষেত্রে ব্রান্ড নাম সহ)</th>
                                            <th class="text-center">সরবরাহের একক</th>
                                            <th class="text-center">পরিমাণ</th>
                                            <th class="text-center">একক মূল্য <sup>১</sup>(টাকায়)</th>
                                            <th class="text-center">মোট মূল্য <sup>১</sup>(টাকায়)</th>
                                            <th class="text-center">সম্পূরক শুল্কের পরিমাণ (টাকায়)</th>
                                            <th class="text-center">মূল্য সংযোজন করের হার/ সুনির্দিষ্ট কর (টাকায়)</th>
                                            <th class="text-center">মূল্য সংযোজন কর/ সুনির্দিষ্ট কর এর পরিমাণ (টাকায়)</th>
                                            <th class="text-center">
                                                <nobr>সকল প্রকার শুল্ক ও করসহ মূল্য</nobr>
                                            </th>


                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $sl = 1;
                                        $total_vat = 0;
                                        $s_total = 0;
                                        foreach ($invoice_all_data as $invoice_data) { 
                                            $vat = $this->db->select('percent,vat_tax_type')->from('vat_tax_setting')->where(array('vat_tax' => 'vat', 'product_id' => $invoice_data['product_id']))->get()->row();
                                            ?>
                                            <tr>
                                                <td align="center">
                                                    <nobr><?php echo $sl; ?></nobr>
                                                </td>

                                                <td align="center">

                                                    <?php


                                                    if (isset($invoice_data['brand_name'])) {
                                                        $brand_name = $invoice_data['brand_name'];
                                                    } else {
                                                        $brand_name = 'No Brand';
                                                    }
                                                    ?>

                                                    <?php if ($invoice_data['is_return'] == 0) { ?>
                                                        <?php echo html_escape($invoice_data['product_name']) . ' (' . html_escape($brand_name) . ')'; ?>

                                                    <?php } else { ?>
                                                        <?php echo html_escape($invoice_data['product_name']) . ' (' . html_escape($brand_name) . ')(RET)'; ?>

                                                    <?php } ?>

                                                </td>


                                                <td align="center" class="td-style">
                                                    <?php echo html_escape($invoice_data['unit']); ?>
                                                </td>

                                                <td align="right" class="td-style">
                                                    <?php echo $CI->converter->en2bn(abs($invoice_data['quantity'])); ?>


                                                </td>
                                                <td align="right" class="td-style">
                                                    <nobr>
                                                        <?php
                                                        if ($position == 0) {
                                                            echo  $CI->converter->en2bn($invoice_data['rate']);
                                                            $total_unit_price += $invoice_data['rate'];
                                                        } else {
                                                            echo $CI->converter->en2bn($invoice_data['rate']);
                                                        }
                                                        ?>
                                                    </nobr>
                                                </td>
                                                <td align="right" class="td-style" style="width: 15mm !important;">

                                                    <?php

                                                    $tt_price = $invoice_data['total_price_wd'];
                                                    $sub_tt_price += $invoice_data['total_price_wd'];
                                                    if ($position == 0) {

                                                        echo $CI->converter->en2bn($tt_price);
                                                    } else {
                                                        echo  0.00;
                                                    }
                                                    //                                                $s_total += $invoice_data['total_price_wd'];
                                                    ?>

                                                </td>
                                                <td align="right" class="td-style">

                                                </td>
                                                <td align="right" class="td-style">
                                                    <?php

                                                    $vat_challan_html = (($invoice_data['vat'] * 100) / $invoice_data['rate']);
                                                    echo $CI->converter->en2bn(round($vat->percent,2)) . '%'; ?>
                                                </td>


                                                <td align="right" class="td-style">
                                                    <?php
                                                    if ($position == 0) {
                                                        echo $CI->converter->en2bn($invoice_data['vat']);
                                                        $total_vat += ($invoice_data['vat']);
                                                    } else {
                                                        echo  0.00;
                                                    }
                                                    //                                                $s_total += $invoice_data['total_price_wd'];
                                                    ?>

                                                </td>
                                                <td align="right" class="td-style" style="width: 15mm !important;">


                                                    <?php
                                                    if ($position == 0) {
                                                        echo  $CI->converter->en2bn(abs($invoice_data['total_price_wd'] + $invoice_data['vat']));
                                                    } else {
                                                        echo $CI->converter->en2bn($invoice_data['total_price_wd'] + $invoice_data['vat']);
                                                        $total_price_wv += $invoice_data['total_amount'];
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
                                            <td align="right" colspan="4">
                                                <nobr>সর্বমোট মূল্য</nobr>
                                            </td>
                                            <td align="right" class="td-style">

                                                <?php if ($total_unit_price < 0) { ?>
                                                    <nobr>

                                                        <?php echo $CI->converter->en2bn(0.00)  ?>


                                                    </nobr>
                                                <?php } else { ?>
                                                    <nobr>

                                                        <?php echo $CI->converter->en2bn($total_unit_price) ?>

                                                    </nobr>
                                                <?php } ?>
                                            </td>
                                            <td align="right" class="td-style">
                                                <?php if ($sub_tt_price < 0) { ?>
                                                    <nobr>

                                                        <?php echo $CI->converter->en2bn(0.00)  ?>


                                                    </nobr>
                                                <?php } else { ?>
                                                    <nobr>

                                                        <?php echo $CI->converter->en2bn($sub_tt_price) ?>

                                                    </nobr>
                                                <?php } ?>
                                            </td>


                                            <td align="right" class="td-style">

                                            </td>
                                            <td align="right" class="td-style">
                                                <!--                                                --><?php //echo '<pre>';print_r($invoice_data);exit()
                                                                                                        ?>
                                            </td>
                                            <td align="right" class="td-style">
                                                <?php if ($total_vat < 0) { ?>
                                                    <nobr>
                                                        <?php echo $CI->converter->en2bn(0.00)  ?>
                                                    </nobr>
                                                <?php } else { ?>
                                                    <nobr>
                                                        <?php echo $CI->converter->en2bn($total_vat)  ?>
                                                    </nobr>
                                                <?php } ?>
                                            </td>
                                            <td align="right" class="td-style">
                                                <?php if ($sub_total < 0) { ?>
                                                    <nobr>
                                                        <?php echo $CI->converter->en2bn(0.00) ?>
                                                    </nobr>
                                                <?php } else { ?>
                                                    <nobr>
                                                        <?php echo $CI->converter->en2bn($invoice_data['total_amount']) ?>
                                                    </nobr>
                                                <?php } ?>
                                            </td>

                                        </tr>

                                    </tbody>


                                </table>

                            </div>




                            <!-- <div class="footer" style="padding: 0.5in; width: 100%">
                                <div class="row">
                                    <div class="col-sm-3">

                                        <div class="">

                                            <span class="text-center" style="display: block;; margin-top:0.5in">প্রতিষ্টান কর্তৃপক্ষ দায়িত্বপ্রাপ্ত ব্যাক্তির নামঃ</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">

                                        <div class="">

                                            <span class="text-center" style="display: block;; margin-top:0.5in"> পদবীঃ</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">


                                    <div class="col-sm-2">

                                        <div class="">

                                            <span class="text-center" style="display: block; border-top: 1px solid black; margin-top:0.5in"><sup>১</sup>সকল কর ব্যতিত মূল্য";</span></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="text-center" style="display: block; margin-top:0.45in;">

                                            <span>স্বাক্ষর :</span>
                                            <img style="margin-top:-0.175in;" src="<?php echo base_url() ?>assets/dist/img/signature/aziz_signature.png" alt="aziz_signature">

                                        </div>
                                    </div>
                                    <div class="col-sm-2">

                                        <div class="">

                                            <span class="text-center" style="display: block;; margin-top:0.5in">সীলঃ</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">

                                        <div class="">
                                            <span class="text-center" style="display: block;; margin-top:0.5in">*উৎস কর্তনযোগ্য সরবরাহের ক্ষেত্রে ফরমটি সমন্বিত কর চালানপত্র ও উৎসে কর কর্তন সনদপত্র হিসেবে বিবেচিত হইবে এবং উহা উৎসে কর কর্তনযোগ্য সরবরাহের ক্ষেত্রে প্রযোজ্য হইবে ।</span>
                                        </div>
                                    </div>


                                </div>


                            </div> -->

                            <div class="footer" style="padding: 0.5in; width: 100%">
                                <div class="row-1">
                                    <div class="inv-footer-l">
                                        <span class="text-center" style="display: block;; margin-top:0.5in">প্রতিষ্টান কর্তৃপক্ষ দায়িত্বপ্রাপ্ত ব্যাক্তির নামঃ <b>Anwar Parvez</b></span>
                                    </div>
                                    <div class="inv-footer-r-des">
                                        <span style="display: block;; margin-top:0.5in;margin-left:25px"> পদবীঃ <b>Executive</b></span>
                                    </div>
                                </div>

                                <div class="row-2">

                                    <div class="inv-footer-l">
                                        <div class="inv-footer-inner-l" style="display: block; border-top: 1px solid black; margin-top:0.5in; text-align:center; margin-right:2px;">
                                            <span class="text-center"><sup>১</sup>সকল কর ব্যতিত মূল্য</span></span>
                                        </div>

                                        <div class="inv-footer-inner-r" style="display: block; margin-top:0.5in">
                                            <span>স্বাক্ষর : <img style="margin-left:30px; margin-top: -0.5in;" src="<?php echo base_url() ?>assets/dist/img/signature/proprietor_signature.png" alt="proprietor_signature"></span>
                                            <!-- <img style="margin-top:-0.175in;" src="<?php echo base_url() ?>assets/dist/img/signature/aziz_signature.png" alt="aziz_signature"> -->
                                            <!-- <img style=" margin-top: -0.5in;" src="<?php echo base_url() ?>assets/dist/img/signature/proprietor_signature.png" alt="proprietor_signature"> -->
                                        </div>
                                    </div>

                                    <div class="inv-footer-r">
                                        <div class="inv-footer-inner-l" style="display: block; margin-top:0.5in">
                                            <span>সীলঃ</span>
                                            <span><b>Anwar Parvez</b><br><b style="margin-left: 35px">Executive</b><br><b style="margin-left: 25  px"><?= $company_info[0]['company_name'] ?></b></span>

                                        </div>

                                        <div class="inv-footer-inner-r" style="display: block; margin-top:0.5in; text-align:center;">
                                            <span>*উৎস কর্তনযোগ্য সরবরাহের ক্ষেত্রে ফরমটি সমন্বিত কর চালানপত্র ও উৎসে কর কর্তন সনদপত্র হিসেবে বিবেচিত হইবে এবং উহা উৎসে কর কর্তনযোগ্য সরবরাহের ক্ষেত্রে প্রযোজ্য হইবে ।</span>
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