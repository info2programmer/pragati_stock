<!-- Page header -->

	<div class="page-header">

		<div class="page-header-content">

			<div class="page-title">

				<h4><i class="fa fa-th-large position-left"></i> Manage IQAC</h4>

			</div>										

			<ul class="breadcrumb">

				<li><a href="<?php echo base_url(); ?>index.php/admin/user"><i class="fa fa-home"></i>Dashboard</a></li>

				<li><a href="<?php echo base_url(); ?>index.php/admin/manage_iqac">Manage IQAC</a></li>

				<li class="active"><?php echo $action; ?> IQAC</li>

			</ul>					

		</div>

	</div>

<!-- /page header -->



<!-- Content area -->

<div class="content">        

<div class="row">

			<div class="col-md-12">

            <?php if($this->session->flashdata('error_message')) { ?>

                  <h5 style="color:red;"><?php echo $this->session->flashdata('error_message'); ?></h5>

            <?php } ?>

            <?php if($this->session->flashdata('success_message')) { ?>

                  <h5 style="color:green;"><?php echo $this->session->flashdata('success_message'); ?></h5>

            <?php } ?>

				<div class="panel panel-flat">

					<div class="panel-heading">

						<h4 class="panel-title">

						

						</h4>				

					</div>

					<div class="panel-body no-padding-bottom">

						<!--<form class="form-horizontal" action="form_basic.htm#">	-->						

						 <?php 	$attributes = array('class' => 'form-horizontal', 'id' => 'myform');

								echo form_open_multipart('',$attributes); ?>

                                

                              <?php

									if(isset($row))

									{  

										$member_name = $row->member_name;

										$designation = $row->designation;

									 }

									 else

									 {

										$member_name = '';

										$designation = '';

									 }

							?>  

                                    

                                        	

							<input type="hidden" name="mode" value="IQAC" />

							

                            

                            <div class="form-group">

								<label class="control-label col-lg-2">Member Name</label>

								<div class="col-lg-10">

									

                                    <input type="text" class="form-control" placeholder="Enter Member Name" name="member_name" value="<?php if($action == 'Edit'){echo $member_name;} else {echo set_value('member_name');} ?>">

                                     <?php echo form_error('member_name'); ?>

								</div>

							</div>

                            <div class="form-group">

								<label class="control-label col-lg-2">Post</label>

								<div class="col-lg-10">

									

                                    <input type="text" class="form-control" placeholder="Enter Post" name="designation" value="<?php if($action == 'Edit'){echo $designation;} else {echo set_value('designation');} ?>">

                                     <?php echo form_error('designation'); ?>

								</div>

							</div>

                           

							<div class="form-group">

								<label class="control-label col-lg-2"></label>

								<div class="col-lg-10">

									<button type="submit" class="btn btn-danger btn-rounded"><?php echo $action; ?> IQAC</button>

								</div>

							</div>							

						<?php echo form_close(); ?>					

					</div>

				</div>

			</div>

			

		</div>

</div>

        

<script type='text/javascript'>

	$(document).ready(function() {		

		$(function() {

			// Basic example

			$('.file-input').fileinput({

				browseLabel: 'Browse',

				browseIcon: '<i class="fa fa-file-o position-left"></i>',

				uploadIcon: '<i class="fa fa-upload position-left"></i>',

				removeIcon: '<i class="fa fa-close position-left"></i>',

				layoutTemplates: {

					icon: '<i class="fa fa-file position-left"></i>'

				},

				initialCaption: "No file selected"

			});



			// Custom layout

			$('.file-input-custom').fileinput({

				previewFileType: 'image',

				browseLabel: 'Select',

				browseClass: 'btn bg-danger-700',

				browseIcon: '<i class="fa fa-image position-left position-left"></i> ',

				removeLabel: 'Remove',

				removeClass: 'btn btn-danger',

				removeIcon: '<i class="fa fa-close position-left position-left"></i> ',

				uploadClass: 'btn bg-teal-400',

				uploadIcon: '<i class="fa fa-upload position-left position-left"></i> ',

				layoutTemplates: {

					icon: '<i class="fa fa-file position-left"></i>'

				},

				initialCaption: "Please select image",

				mainClass: 'input-group'

			});



			// Template modifications

			$('.file-input-advanced').fileinput({

				browseLabel: 'Browse',

				browseClass: 'btn btn-success',

				removeClass: 'btn btn-default',

				uploadClass: 'btn bg-success-400',

				browseIcon: '<i class="fa fa-file-o position-left"></i>',

				uploadIcon: '<i class="fa fa-upload position-left"></i>',

				removeIcon: '<i class="fa fa-close position-left"></i>',

				layoutTemplates: {

					icon: '<i class="fa fa-file position-left"></i>',

					main1: "{preview}\n" +

					"<div class='input-group {class}'>\n" +

					"   <div class='input-group-btn'>\n" +

					"       {browse}\n" +

					"   </div>\n" +

					"   {caption}\n" +

					"   <div class='input-group-btn'>\n" +

					"       {upload}\n" +

					"       {remove}\n" +

					"   </div>\n" +

					"</div>"

				},

				initialCaption: "No file selected"

			});



			// Custom file extensions

			$(".file-input-extensions").fileinput({

				browseLabel: 'Browse',

				browseClass: 'btn btn-primary',

				uploadClass: 'btn btn-default',

				browseIcon: '<i class="fa fa-file-o position-left"></i>',

				uploadIcon: '<i class="fa fa-upload position-left"></i>',

				removeIcon: '<i class="fa fa-close position-left"></i>',

				layoutTemplates: {

					icon: '<i class="fa fa-file position-left"></i>'

				},

				maxFilesNum: 10,

				allowedFileExtensions: ["jpg", "gif", "png", "txt"]

			});		



			// Disable/enable button

			$("#btn-modify").on("click", function() {

				$btn = $(this);

				if ($btn.text() == "Disable file input") {

					$("#file-input-methods").fileinput("disable");

					$btn.html("Enable file input");

					alert("Hurray! I have disabled the input and hidden the upload button.");

				}

				else {

					$("#file-input-methods").fileinput("enable");

					$btn.html("Disable file input");

					alert("Hurray! I have reverted back the input to enabled with the upload button.");

				}

			});





			// AJAX upload

			$(".file-input-ajax").fileinput({

				uploadUrl: "http://localhost", // server upload action

				uploadAsync: true,

				maxFileCount: 5,

				initialPreview: [],

				fileActionSettings: {

					removeIcon: '<i class="icon-bin position-left"></i>',

					removeClass: 'btn btn-link btn-xs btn-icon',

					uploadIcon: '<i class="icon-upload position-left"></i>',

					uploadClass: 'btn btn-link btn-xs btn-icon',

					indicatorNew: '<i class="icon-file-plus text-slate position-left"></i>',

					indicatorSuccess: '<i class="icon-checkmark3 file-icon-large text-success position-left"></i>',

					indicatorError: '<i class="icon-cross2 text-danger position-left"></i>',

					indicatorLoading: '<i class="icon-spinner2 spinner text-muted position-left"></i>',

				}

			});



		});

	});

</script>