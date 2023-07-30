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

                                .company_name {
                                    font-family: "Edwardian Script ITC";
                                    font-size: 20px !important;
                                    color: #1f3297 !important;
                                    letter-spacing: 3px;
                                }
                            }
                        </style>

                        <div class="watermark" style="position:absolute; opacity: 0.5; width:100vw; height:100vh; z-index: -1; background-image: url('<?php echo base_url() ?>assets/images/icons/watermark.png') !important; background-repeat: no-repeat !important; background-size: 5.45in auto !important;-webkit-print-color-adjust: exact ; background-position: 1.5in 3in !important;">
                        </div>
                        <div class="panel-body">

                            <div class="col-xs-12 row">

                                <div class="col-xs-6">
                                    <img style="height: 100px; width: 100%" src="<?php
                                                                                    if (isset($inv_logo)) {
                                                                                        echo html_escape($inv_logo);
                                                                                    }
                                                                                    ?>" class="img-bottom-m" alt="">
                                </div>
                                <div class="col-xs-6 company-content">
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

                                <div class="col-xs-3">

                                </div>
                                <div class="col-xs-6 bill ">
                                    Delivery Challan

                                </div>


                                <div class="col-xs-3">

                                </div>
                            </div>
                            <div class="col-xs-12 row">

                                <div class="col-xs-5">
                                    <nobr>Challan No : CH-{invoice_no}</nobr>
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

                                <div class="col-xs-3  ">

                                </div>


                                <div class="col-xs-3">
                                    Department :
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


                                            </tr>
                                        <?php $sl++;
                                        } ?>




                                    </tbody>


                                </table>

                            </div>




                            <div class="footer1" style="padding: 0.5in;">

                                <div class="row">

                                    <div class="col-sm-4">

                                        <div class="inv-footer-l">

                                            <span class="text-center" style="display: block; border-top: 1px solid black; margin-top:0.7in">In Good Condition<br>Received by</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">

                                        <div class="inv-footer-r">

                                            <span class="text-right" style="display: block;"><img style="width:150px; margin-right: 5px;" src="<?php echo base_url() ?>assets/dist/img/signature/proprietor_signature.png" alt="proprietor_signature"></span>

                                            <span class="text-center" style="display: block; border-top: 1px solid black;">For : <span class="company_name"><?= $company_info[0]['company_name'] ?></span></span>
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