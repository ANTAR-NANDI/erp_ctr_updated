<!-- Bank List Start -->
<div class="content-wrapper">
	<section class="content-header">
	    <div class="header-icon">
	        <i class="pe-7s-note2"></i>
	    </div>
	    <div class="header-title">
	        <h1>Nagad List</h1>
	        <small>Nagad List</small>
	        <ol class="breadcrumb">
	            <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
	            <li><a href="#"><?php echo display('settings') ?></a></li>
	            <li class="active">Nagad List</li>
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
                  <a href="<?php echo base_url('Csettings/nagad')?>" class="btn btn-info m-b-5 m-r-2"><i class="ti-align-justify"> </i> Add Nagad Number </a>
                  <?php }?>
       <?php if($this->permission1->method('bank_transaction','create')->access()){ ?>
                  <a href="<?php echo base_url('Csettings/nagad_transaction')?>" class="btn btn-success m-b-5 m-r-2"><i class="ti-align-justify"> </i>Nagad Transaction </a>
                   <?php }?>
                    <?php if($this->permission1->method('bank_ledger','read')->access()){ ?>
                  <a href="<?php echo base_url('Csettings/nagad_ledger')?>" class="btn btn-primary m-b-5 m-r-2"><i class="ti-align-justify"> </i>Nagad Ledger </a>
                   <?php }?>

              
            </div>
        </div>

		<!-- Bank List -->
		<div class="row">
		    <div class="col-sm-12">
		        <div class="panel panel-bd lobidrag">
		            <div class="panel-heading">
		                <div class="panel-title">
		                    <h4>Nagad List</h4>
		                </div>
		            </div>
		            <div class="panel-body">
		                <div class="table-responsive">
		                    <table id="dataTableExample3" class="table table-bordered table-striped table-hover">
			           			<thead>
									<tr>
										<th><?php echo display('sl') ?></th>
										<th><?php echo display('ac_name') ?></th>
										<th>Nagad Number</th>
										<th>Account type</th>
										<th><?php echo display('balance') ?></th>

										<th><?php echo display('action') ?></th>
									</tr>
								</thead>
								<tbody>
								<?php
									if ($nagad_list) {
								?>
								{nagad_list}
									<tr>
										<td>{sl}</td>
										<td>{ac_name}</td>
										<td>{nagad_no}</td>
										<td>{nagad_type}</td>
										<td><?php echo (($position==0)?"$currency {balance}":"{balance} $currency") ?></td>
										<td>
										<?php echo form_open()?>
										 <?php if($this->permission1->method('bank_list','update')->access()){ ?>
											<a href="<?php echo base_url().'Csettings/edit_nagad/{nagad_id}'; ?>" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="" data-original-title="<?php echo display('update') ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
										<?php }?>
										<?php echo form_close()?>
										</td>
									</tr>
								{/nagad_list}
								<?php
									}
								?>
								</tbody>
		                    </table>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
	</section>
</div>
<!-- Bank List End -->

