  <!-- CSS Files -->
  <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>assets/css/paper-dashboard.min790f.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?php echo base_url(); ?>assets/demo/demo.css" rel="stylesheet" />
  <link href="  https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css
" rel="stylesheet" />


  <style>
  	.top_right_box {
  		border: 1px solid black;
  		width: 100%;
  	}

  	.card-img-top {
  		width: 19%;
  		position: absolute;
  		float: left;
  	}

  	.form-group {
  		margin: 0px;
  	}

  	p {
  		margin: 0px;
  	}


  	.heading_top {
  		font-weight: 800;
  		margin-top: 0px;
  		text-align: center;
  		margin-bottom: 0px;
  	}

  	.heading_top_two {
  		font-weight: 600;
  		text-align: center;
  	}

  	.top_right_box label {
  		line-height: 15px;
  		float: left;
  	}

  	.top_right_box input {
  		border: 0px;
  		border-bottom: 2px dotted;
  		height: 20px;
  		float: right;
  		padding: 0px;
  	}

  	.top_right_form .col-form-label {
  		padding: 6px 0px 8px 2px;
  	}

  	.box_right {
  		padding: 0px;
  	}

  	.form-control:focus {
  		color: #495057;
  		background-color: #fff;
  		border-color: #80bdff00;
  		outline: 0;
  		border-bottom: 1px dotted;
  		box-shadow: none;
  	}

  	hr {
  		margin-top: 0rem;
  		margin-bottom: 5px;
  		border: 0;
  		border-top: 2px solid rgba(0, 0, 0, .6);
  		width: 1;
  		align-items: center;
  		width: 22%;
  	}

  	.col-form-label {
  		line-height: 20px;
  		padding: 7px;
  	}

  	.main_form input {
  		border: 0px;
  		border-bottom: 2px dotted;
  		height: 25px;
  	}

  	form {
  		background-color: 0#f4f3ef !important;
  	}

  	@media (max-width: 575.98px) {
  		.heading_top {
  			font-weight: 800;
  			margin-top: 9px;
  			text-align: right;
  			font-size: 22px;
  		}

  		.heading_top_two {
  			font-weight: 800;
  			text-align: right;
  			font-size: 15px !important;
  		}

  		P {
  			font-size: 15px;
  		}
  	}

  	.mr_t {
  		margin-top: 10px;
  		border-bottom: 1px dotted;
  	}
  </style>
  <div id="printPageButton" class="col-md-12" style="margin-top:15px;margin-bottom:15px;">
  	<a href="" onclick="p()"><i class="fa fa-print"></i> Print</a>
  </div>
  <div class="container mt-5 pt-5" id="floor_unit">
  	<?php echo validation_errors();
		?>
  	<div class="form-group col-sm-12 col-xs-12">
  		<?php echo $this->session->flashdata('msg');
			?>
  	</div>

  	<div class="row" style="margin:0px">
  		<p id="get_floor"></p>
  		<div class="col-sm-2  row main_form mt-5">
  			<!-- <label class="col-form-label">ভাড়াটিয়া/বাড়িওয়ালা/মেস-সদস্যের ছবি</label> -->

  			<div class="">
  				<img width="200px" src="<?php echo base_url() . 'assets/Profile_image/' . $get_all_renter_info->fld_image; ?>" alt="<?php echo $get_all_renter_info->resident_name; ?>">
  			</div>
  		</div>
  		<div class="col-md-8">
  			<div class="row" style="margin:0px">
  				<div class="col-12">
  					<img class="card-img-top" width="200px" src="https://scontent.fdac7-1.fna.fbcdn.net/v/t1.0-9/19642650_1050219898442918_2216242493945183421_n.png?_nc_cat=104&_nc_oc=AQkWPLB54fsbARMtTs_Q_EX0ZyCcb7ydGzKN4iElx_TtZfLJx9_heJGd2_SIWUmH9vg&_nc_ht=scontent.fdac7-1.fna&oh=423512904eed0a104b328042c5fa225c&oe=5ECEB3A1" alt="Card image cap">
  					<h3 class="heading_top">ঢাকা মেট্রোপলিটন পুলিশ</h3>
  					<h5 class="heading_top_two">উত্তরা বিভাগ , দক্ষিণখান থানা</h5>
  				</div>

  				<div class="col-12">
  					<p style="font-weight: 800; text-align: center;">ফোন : ০২-৮৯৩১৭৭৭, মোবা: ০১৭১৩ ৩৭৩১৬৫</p>
  					<p style="font-weight: 800; text-align: center;">বাড়িওয়ালা/ভাড়াটিয়া/মেস-সদস্য</p>
  					<h5 style="font-weight: 800; text-align: center;">নিবন্ধন ফরম</h5>
  					<hr>
  					<hr>
  				</div>

  			</div>
  		</div>
  		<div class="col-md-2 mt-5 P-0">

  			ফ্লাট/তলা :<span class="mr_t col-3"><?php echo $get_all_renter_info->unit_name; ?></span></br>
  			বাড়ি/হোল্ডিং :<span class="mr_t col-3"><?php echo $get_building_info->house_name; ?></span></br>
  			রাস্তা :<span class="mr_t col-3"><?php echo $get_building_info->road_number; ?></span></br>
  			এলাকা :<span class="mr_t col-3"><?php echo $get_building_info->village_name; ?></span></br>
  			ওয়ার্ড নং :<span class="mr_t col-3"><?php echo $get_building_info->word_no; ?></span></br>
  			পোস্ট কোড :<span class="mr_t col-3"><?php echo $get_building_info->poster_code; ?></span></br>

  		</div>
  	</div>

  	<div class="container ">
  		<div class="form-group row main_form">
  			<label for="resident_name" class="col-sm-2 col-form-label">১.<?php if($get_all_renter_info->resident_type = 1){ ?>ভাড়াটিয়া <?php }elseif($get_all_renter_info->resident_type = 2){?>বাড়িওয়ালা<?php }else{?>মেস-সদস্যের নাম<?php } ?>:</label>
  			<div class="col-sm-10 col-md-10 p-0 mr_t">
  				<span><?php echo $get_all_renter_info->resident_name; ?></span>
  			</div>
  		</div>
  		<div class="form-group row main_form">
  			<label for="father_name" class="col-sm-2 col-form-label">২. পিতার নাম:</label>
  			<div class="col-sm-10 col-md-10 p-0 mr_t">
  				<span><?php echo $get_all_renter_info->father_name; ?></span>
  			</div>
  		</div>
  		<div class="form-group row main_form">
  			<label for="date_of_birth" class="col-sm-2 col-form-label">৩. জন্ম তারিখ:</label>
  			<div class="col-sm-4 col-md-4 p-0 mr_t">
  				<?php echo $get_all_renter_info->date_of_birth; ?>
  			</div>
  			<label for="marital_status" class="col-sm-2 col-form-label">বৈবাহিক অবস্থা:</label>
  			<div class="col-sm-4 col-md-4 p-0 mr_t">
  				<span><?php echo $get_all_renter_info->marital_status; ?></span>
  			</div>
  		</div>
  		<div class="form-group row main_form">
  			<label for="village" class="col-sm-2 col-form-label">৪. স্থায়ী ঠিকানা: গ্রাম:</label>
  			<div class="col-sm-3 col-md-3 p-0 mr_t">
  				<span><?php echo $get_all_renter_info->village; ?></span>
  			</div>
  			<label for="police_station" class="col-sm-1 col-form-label">থানা:</label>
  			<div class="col-sm-3 col-md-3 p-0 mr_t">
  				<span><?php echo $get_all_renter_info->police_station; ?></span>
  			</div>
  			<label for="district" class="col-sm-1 col-form-label">জেলা:</label>
  			<div class="col-sm-2 col-md-2 p-0 mr_t">
  				<span><?php echo $get_all_renter_info->district; ?></span>
  			</div>
  		</div>
  		<div class="form-group row main_form">
  			<label for="work_address" class="col-sm-3 col-form-label">৫. পেশা ও প্রতিষ্ঠান/কর্মস্থলের ঠিকানা:</label>
  			<div class="col-sm-9 col-md-9 p-0 mr_t">
  				<span><?php echo $get_all_renter_info->work_address; ?></span>
  			</div>
  		</div>
  		<div class="form-group row main_form">
  			<label for="religion" class="col-sm-1 col-form-label">৬. ধর্ম:</label>
  			<div class="col-sm-2 col-md-2 p-0 mr_t">
  				<span><?php echo $get_all_renter_info->religion; ?></span>
  			</div>
  			<label for="educational_qualifications" class="col-sm-2 col-form-label">শিক্ষাগত যোগ্যতা:</label>
  			<div class="col-sm-3 col-md-3 p-0 mr_t">
  				<span><?php echo $get_all_renter_info->educational_qualifications; ?></span>
  			</div>
  			<label for="mobile_number" class="col-sm-2 col-form-label">মোবাইল নম্বর:</label>
  			<div class="col-sm-2 col-md-2 p-0 mr_t">
  				<span><?php echo $get_all_renter_info->mobile_number; ?></span>
  			</div>
  		</div>
  		<div class="form-group row main_form">
  			<label for="national_id_number" class="col-sm-3 col-form-label">৭. জাতীয় পরিচয়পত্র নম্বর:</label>
  			<div class="col-sm-4 col-md-4 p-0 mr_t">
  				<span><?php echo $get_all_renter_info->national_id_number; ?></span>
  			</div>
  			<label for="email" class="col-sm-2 col-form-label">ই-মেইল আইডি:</label>
  			<div class="col-sm-3 col-md-3 p-0 mr_t">
  				<span><?php echo $get_all_renter_info->email; ?></span>
  			</div>
  		</div>
  		<div class="form-group row main_form">
  			<label for="passport_number" class="col-sm-3 col-form-label">৮. পাসপোর্ট নম্বর (যদি থাকে):</label>
  			<div class="col-sm-9 col-md-9 p-0 mr_t">
  				<span><?php echo $get_all_renter_info->passport_number; ?></span>
  			</div>
  		</div>
  		<div class="form-group row main_form">
  			<label for="emergency_name" class="col-sm-2 col-form-label">৯. জরুরি যোগাযোগ:</label>
  		</div>
  		<div class="form-group row main_form">
  			<label for="emergency_name" class="col-sm-2 offset-md-1 col-form-label">(ক) নাম:</label>
  			<div class="col-sm-4 col-md-4 p-0 mr_t">
  				<span><?php echo $get_all_renter_info->emergency_name; ?></span>
  			</div>
  			<label for="emergency_relationships" class="col-sm-2 col-form-label">(খ) সম্পর্ক:</label>
  			<div class="col-sm-3 col-md-3 p-0 mr_t">
  				<span><?php echo $get_all_renter_info->emergency_relationships; ?></span>
  			</div>
  		</div>
  		<div class="form-group row main_form">
  			<label for="emergency_address" class="col-sm-2 offset-md-1 col-form-label">(গ) ঠিকানা:</label>
  			<div class="col-sm-4 col-md-4 p-0 mr_t">
  				<span><?php echo $get_all_renter_info->emergency_address; ?></span>
  			</div>
  			<label for="emergency_number" class="col-sm-2 col-form-label">(ঘ) মোবাইল নম্বর:</label>
  			<div class="col-sm-3 col-md-3 p-0 mr_t">
  				<span><?php echo $get_all_renter_info->emergency_number; ?></span>
  			</div>
  		</div>
  		<div class="form-group row main_form">
  			<label for="housekeeper_name" class="col-sm-2 col-form-label">১০. গৃহকর্মীর নাম:</label>
  			<div class="col-sm-5 col-md-5 p-0 mr_t">
  				<span><?php echo $get_all_renter_info->housekeeper_name; ?></span>
  			</div>
  			<label for="housekeeper_national_id" class="col-sm-2 col-form-label">জাতীয় পরিচয়পত্র নম্বর:</label>
  			<div class="col-sm-3 col-md-3 p-0 mr_t">
  				<span><?php echo $get_all_renter_info->housekeeper_national_id; ?></span>
  			</div>
  		</div>
  		<div class="form-group row main_form">
  			<label for="housekeeper_number" class="col-sm-2 offset-md-1 col-form-label">মোবাইল নম্বর:</label>
  			<div class="col-sm-4 col-md-4 p-0 mr_t">
  				<span><?php echo $get_all_renter_info->housekeeper_number; ?></span>
  			</div>
  			<label for="housekeeper_address" class="col-sm-2 col-form-label">স্থায়ী ঠিকানা: </label>
  			<div class="col-sm-3 col-md-3 p-0 mr_t">
  				<span><?php echo $get_all_renter_info->housekeeper_address; ?></span>
  			</div>
  		</div>

  		<div class="memberList">
  			<table class="table table-bordered">
			 
  				<head>
  					<tr>
  						<td>ক্রমিক নং</td>
  						<td>নাম </td>
  						<td>বয়স</td>
  						<td>পেশা</td>
  						<td>ফোন নম্বর </td>
  						<td>সম্পর্ক</td>
  						<td>এনআইডি নম্বর</td>
  					</tr>
  				</head>
				  <?php $j=1; foreach ($get_all_member_info as $value) { ?>
  				<tbody>
  					<tr>
  							<td><?php echo $j++; ?></td>
  							<td><?php echo $value->fld_name; ?></td>
  							<td><?php echo $value->fld_age; ?></td>
  							<td><?php echo $value->fld_profession; ?></td>
  							<td><?php echo $value->phone_number; ?></td>
  							<td><?php echo $value->fld_relation; ?></td>
  							<td><?php echo $value->fld_nid; ?></td>
  					</tr>
				  </tbody>
				  <?php } ?>
  			</table>
  		</div>
  	</div>
  	<div class="form-group row main_form">
  		<label for="driver_name" class="col-sm-2 col-form-label">১১. ড্রাইভারের নাম:</label>
  		<div class="col-sm-4 col-md-4 p-0 mr_t">
  			<span><?php echo $get_all_renter_info->driver_name; ?></span>
  		</div>
  		<label for="driver_nid_number" class="col-sm-3 col-form-label">জাতীয় পরিচয়পত্র নম্বর:</label>
  		<div class="col-sm-3 col-md-3 p-0 mr_t">
  			<span><?php echo $get_all_renter_info->driver_nid_number; ?></span>
  		</div>
  	</div>
  	<div class="form-group row main_form">
  		<label for="driver_number" class="col-sm-2 offset-md-1 col-form-label">মোবাইল নম্বর:</label>
  		<div class="col-sm-4 col-md-4 p-0 mr_t">
  			<span><?php echo $get_all_renter_info->driver_number; ?></span>
  		</div>
  		<label for="driver_address" class="col-sm-2 col-form-label">স্থায়ী ঠিকানা: </label>
  		<div class="col-sm-3 col-md-3 p-0 mr_t">
  			<span><?php echo $get_all_renter_info->driver_address; ?></span>
  		</div>
  	</div>
  	<div class="form-group row main_form">
  		<label for="previous_landlord_name" class="col-sm-3 col-form-label">১২. পূর্ববর্তী বাড়িওয়ালার নাম:</label>
  		<div class="col-sm-4 col-md-4 p-0 mr_t">
  			<span><?php echo $get_all_renter_info->previous_landlord_name; ?></span>
  		</div>
  		<label for="previous_landlord_number" class="col-sm-2 col-form-label">মোবাইল নম্বর:</label>
  		<div class="col-sm-3 col-md-3 p-0 mr_t">
  			<span><?php echo $get_all_renter_info->previous_landlord_number; ?></span>
  		</div>
  	</div>
  	<div class="form-group row main_form">
  		<label for="previous_landlord_address" class="col-sm-2 offset-md-1 col-form-label">ঠিকানা:</label>
  		<div class="col-sm-9 col-md-9 p-0 mr_t">
  			<span><?php echo $get_all_renter_info->previous_landlord_address; ?></span>
  		</div>
  	</div>
  	<div class="form-group row main_form">
  		<label for="reasons_to_leave_previous_home" class="col-sm-3 col-form-label">১৩. পূর্ববর্তী বাসা ছাড়ার কারণ:</label>
  		<div class="col-sm-9 col-md-9 p-0 mr_t">
  			<span><?php echo $get_all_renter_info->reasons_to_leave_previous_home; ?></span>
  		</div>
  	</div>
  	<div class="form-group row main_form">
  		<label for="current_landlord_name" class="col-sm-3 col-form-label">১৪. বর্তমান বাড়িওয়ালার নাম:</label>
  		<div class="col-sm-4 col-md-4 p-0 mr_t">
  			<span><?php echo $get_all_renter_info->current_landlord_name; ?></span>
  		</div>
  		<label for="current_landlord_number" class="col-sm-2 col-form-label">মোবাইল নম্বর:</label>
  		<div class="col-sm-3 col-md-3 p-0 mr_t">
  			<span><?php echo $get_all_renter_info->current_landlord_number; ?></span>
  		</div>
  	</div>
  	<div class="form-group row main_form">
  		<label for="living_date_current_home" class="col-sm-4 col-form-label">১৫. বর্তমান বাড়িতে কোন তারিখ থেকে বসবাস:</label>
  		<div class="col-sm-8 col-md-8 p-0 mr_t">
  			<span><?php echo $get_all_renter_info->living_date_current_home; ?></span>
  		</div>
  	</div>
  	<div class="form-group row main_form">
  		<label for="security_guard_name" class="col-sm-2 col-form-label">১৬. নিরাপত্তারক্ষীর নাম:</label>
  		<div class="col-sm-5 col-md-5 p-0 mr_t">
  			<span><?php echo $get_all_renter_info->security_guard_name; ?></span>
  		</div>
  		<label for="security_guard_nid_number" class="col-sm-2 col-form-label">জাতীয় পরিচয়পত্র নম্বর:</label>
  		<div class="col-sm-3 col-md-3 p-0 mr_t">
  			<span><?php echo $get_all_renter_info->security_guard_nid_number; ?></span>
  		</div>
  	</div>
  	<div class="form-group row main_form">
  		<label for="security_guard_number" class="col-sm-2 offset-md-1 col-form-label">মোবাইল নম্বর:</label>
  		<div class="col-sm-4 col-md-4 p-0 mr_t">
  			<span><?php echo $get_all_renter_info->security_guard_number; ?></span>
  		</div>
  		<label for="security_guard_address" class="col-sm-2 col-form-label">স্থায়ী ঠিকানা: </label>
  		<div class="col-sm-3 col-md-3 p-0 mr_t">
  			<span><?php echo $get_all_renter_info->security_guard_address; ?></span>
  		</div>
  	</div>
  	<div class="form-group row main_form p-2 mb-5">
  		<label for="security_guard_number" class="col-sm-1 col-form-label">তারিখ:</label>
  		<div class="col-sm-4 col-md-4 p-0 mr_t">
  		</div>
  		<label for="security_guard_address" class="col-sm-2 col-form-label">স্বাক্ষর: </label>
  		<div class="col-sm-5 col-md-5 p-0 ">
  			<img width="200px" height="68px" src="<?php echo base_url() . 'assets/Profile_image/' . $get_all_renter_info->signature_one; ?>" alt="<?php echo $get_all_renter_info->resident_name; ?>">
  		</div>
  	</div>

  </div>

  <script>
  	function p() {
		  window.print();
	  }
  </script>
  <style>
	  @media print {
  #printPageButton {
    display: none;
  }
}
  </style>