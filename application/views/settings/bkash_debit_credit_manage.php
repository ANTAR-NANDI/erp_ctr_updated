<!-- Bank debit credit manage -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>Bkash Transaction</h1>
            <small>Bkash Transaction</small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#">Bkash</a></li>
                <li class="active">Bkash Transaction</li>
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
               
                <?php if($this->permission1->method('add_bank','create')->access()){ ?>
                  <a href="<?php echo base_url('Csettings/bkash')?>" class="btn btn-info m-b-5 m-r-2"><i class="ti-align-justify"> </i>Add New Bkash</a>
              <?php }?>
             <?php if($this->permission1->method('bank_list','read')->access()){ ?>
                  <a href="<?php echo base_url('Csettings/bkash_list')?>" class="btn btn-success m-b-5 m-r-2"><i class="ti-align-justify"> </i>  Manage Bkash</a>
                   <?php }?>
               
            </div>
        </div>

        <!-- New bank -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>Bkash Transaction </h4>
                        </div>
                    </div>
                   <?php echo form_open_multipart('Csettings/bkash_debit_credit_manage_add',array('class' => 'form-vertical','id' => 'validate' ))?>
                    <div class="panel-body">

                    	<div class="form-group row">
                            <label for="date" class="col-sm-3 col-form-label"><?php echo display('date') ?> <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                            <?php date_default_timezone_set("Asia/Dhaka"); $date = date('Y-m-d'); ?>
                                <input type="text" class="form-control datepicker" name="date" id="date" required="" placeholder="<?php echo display('date') ?>" value="<?php echo $date; ?>" tabindex="1"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="account_type" class="col-sm-3 col-form-label"><?php echo display('account_type') ?> <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <select class="form-control" id="account_type" name="account_type" tabindex="2">
                                    <option value="Debit(+)"><?php echo display('debit_plus')?></option>
                                    <option value="Credit(-)"><?php echo display('credit_minus')?></option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="bank_name" class="col-sm-3 col-form-label">Bkash Number <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <select class="form-control" name="bkash_id" tabindex="3">
                                    {bkash_list}
                                    <option value="{bkash_id}">{bkash_no}({ac_name})</option>
                                    {/bkash_list}
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="withdraw_deposite_id" class="col-sm-3 col-form-label"><?php echo display('withdraw_deposite_id') ?> <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="withdraw_deposite_id" id="withdraw_deposite_id" required="" placeholder="<?php echo display('withdraw_deposite_id') ?>" tabindex="5"/>
                            </div>
                        </div>        

                        <div class="form-group row">
                            <label for="ammount" class="col-sm-3 col-form-label"><?php echo display('ammount') ?> <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" name="ammount" id="ammount" required="" placeholder="<?php echo display('ammount') ?>" tabindex="5"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label"><?php echo display('description') ?> </label>
                            <div class="col-sm-6">
                                <textarea class="form-control" placeholder="<?php echo display('description') ?>" name="description" tabindex="4"></textarea>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-6">
                                <input type="reset" class="btn btn-danger" value="<?php echo display('reset') ?>" tabindex="6"/>
                                <input type="submit" id="add-deposit" class="btn btn-success" name="add-deposit" value="<?php echo display('save') ?>" tabindex="7"/>
                            </div>
                        </div>
                    </div>
                    <?php echo form_close()?>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Bank debit credit manage -->

