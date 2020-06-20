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
</style>
<style>
	.v-select {
		margin-bottom: 5px;
	}

	.v-select .dropdown-toggle {
		padding: 0px;
	}

	.v-select input[type=search],
	.v-select input[type=search]:focus {
		margin: 0px;
	}

	.v-select .vs__selected-options {
		overflow: hidden;
		flex-wrap: nowrap;
	}

	.v-select .selected-tag {
		margin: 2px 0px;
		white-space: nowrap;
		position: absolute;
		left: 0px;
	}

	.v-select .vs__actions {
		margin-top: -5px;
	}

	.v-select .dropdown-menu {
		width: auto;
		overflow-y: auto;
	}

	#branchDropdown .vs__actions button {
		display: none;
	}

	#branchDropdown .vs__actions .open-indicator {
		height: 15px;
		margin-top: 7px;
	}
</style>
<div class="container mt-5 pt-5" id="floor_unit">
	<?php echo validation_errors();
	?>
	<div class="form-group col-sm-12 col-xs-12">
		<?php echo $this->session->flashdata('msg');
		?>
	</div>
	<form method="POST" @submit.prevent="insertMember">
		<div class="row">
			<p id="get_floor"></p>
			<div class="col-md-7">
				<div class="row">
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
		</div>

		<div class="form-group row main_form">
			<label class="col-sm-3 col-form-label">ভাড়াটিয়া/বাড়িওয়ালা/মেস-সদস্যের ছবি</label>
			<input type="file" @change="profilePreview" style="opacity: 1; border:none;left: 20px;top: 36px; width: 221px;height: 50px;" />
			<div class="col-sm-2 col-form-label">
				<img v-bind:src="profileUrl" width="100%">
			</div>
			<div class="col-md-6">
				<div class="form-group row main_form">
					<div class="col-sm-12 col-md-12 p-0">
						<label class="col-form-label">Select Floor</label>
						<select name="" id="" class="filter-make filter form-control" required v-model="selectedFloor" @change="getUnits">
							<option value="">Select Floor</option>
							<option :value="floor.id" v-for="floor in floors">{{floor.floor_name}}</option>
						</select>
						<label class="col-form-label">Select Unit</label>
						<select v-model="renters.unit_id" id="" class="filter-make filter form-control" required v-model="selectedUnit">
							<option value="unit.id">Select Unit</option>
							<option :value="unit.id" v-for="unit in units">{{unit.unit_name}}</option>
						</select>
					</div>
				</div>
			</div>
		</div>
		<div class="container mt-5">
			<div class="form-group row main_form">
				<!-- <label for="resident_name" class="col-sm-4 col-form-label">১. ভাড়াটিয়া/বাড়িওয়ালা/মেস-সদস্যের নাম:</label> -->
				১. <select class="col-sm-3 col-md-3 p-0" v-model="renters.resident_type" id="" class="filter-make filter form-control" placeholder="Select" required>
					<option value="0">ভাড়াটিয়া নাম:</option>
					<option value="1">বাড়িওয়ালা নাম:</option>
					<option value="2">মেস-সদস্যের নাম:</option>
				</select>
				<div class="col-sm-6 col-md-6 p-0">
					<input type="text" class="form-control" v-model="renters.resident_name" required>
				</div>
			</div>
			<div class="form-group row main_form">
				<label for="father_name" class="col-sm-2 col-form-label">২. পিতার নাম:</label>
				<div class="col-sm-10 col-md-10 p-0">
					<input type="text" class="form-control" v-model="renters.father_name">
				</div>
			</div>
			<div class="form-group row main_form">
				<label for="date_of_birth" class="col-sm-2 col-form-label">৩. জন্ম তারিখ:</label>
				<div class="col-sm-4 col-md-4 p-0">
					<input type="text" class="form-control" v-model="renters.date_of_birth" placeholder="10-01-2020" required>
				</div>
				<label for="marital_status" class="col-sm-2 col-form-label">বৈবাহিক অবস্থা:</label>
				<div class="col-sm-4 col-md-4 p-0">
					<input type="text" class="form-control" v-model="renters.marital_status">
				</div>
			</div>
			<div class="form-group row main_form">
				<label for="village" class="col-sm-2 col-form-label">৪. স্থায়ী ঠিকানা: গ্রাম:</label>
				<div class="col-sm-3 col-md-3 p-0">
					<input type="text" class="form-control" v-model="renters.village" required>
				</div>
				<label for="police_station" class="col-sm-1 col-form-label">থানা:</label>
				<div class="col-sm-3 col-md-3 p-0">
					<input type="text" class="form-control" v-model="renters.police_station" required>
				</div>
				<label for="district" class="col-sm-1 col-form-label">জেলা:</label>
				<div class="col-sm-2 col-md-2 p-0">
					<input type="text" class="form-control" v-model="renters.district" required>
				</div>
			</div>
			<div class="form-group row main_form">
				<label for="work_address" class="col-sm-3 col-form-label">৫. পেশা ও প্রতিষ্ঠান/কর্মস্থলের ঠিকানা:</label>
				<div class="col-sm-9 col-md-9 p-0">
					<input type="text" class="form-control" v-model="renters.work_address">
				</div>
			</div>
			<div class="form-group row main_form">
				<label for="religion" class="col-sm-1 col-form-label">৬. ধর্ম:</label>
				<div class="col-sm-2 col-md-2 p-0">
					<input type="text" class="form-control" v-model="renters.religion">
				</div>
				<label for="educational_qualifications" class="col-sm-2 col-form-label">শিক্ষাগত যোগ্যতা:</label>
				<div class="col-sm-3 col-md-3 p-0">
					<input type="text" class="form-control" v-model="renters.educational_qualifications">
				</div>
				<label for="mobile_number" class="col-sm-2 col-form-label">মোবাইল নম্বর:</label>
				<div class="col-sm-2 col-md-2 p-0">
					<input type="number" class="form-control" v-model="renters.mobile_number" required>
				</div>
			</div>
			<div class="form-group row main_form">
				<label for="national_id_number" class="col-sm-3 col-form-label">৭. জাতীয় পরিচয়পত্র নম্বর:</label>
				<div class="col-sm-4 col-md-4 p-0">
					<input type="number" class="form-control" v-model="renters.national_id_number" required>
				</div>
				<label for="email" class="col-sm-2 col-form-label">ই-মেইল আইডি:</label>
				<div class="col-sm-3 col-md-3 p-0">
					<input type="email" class="form-control" v-model="renters.email">
				</div>
			</div>
			<div class="form-group row main_form">
				<label for="passport_number" class="col-sm-3 col-form-label">৮. পাসপোর্ট নম্বর (যদি থাকে):</label>
				<div class="col-sm-9 col-md-9 p-0">
					<input type="number" class="form-control" v-model="renters.passport_number">
				</div>
			</div>
			<div class="form-group row main_form">
				<label for="emergency_name" class="col-sm-2 col-form-label">৯. জরুরি যোগাযোগ:</label>
			</div>
			<div class="form-group row main_form">
				<label for="emergency_name" class="col-sm-2 offset-md-1 col-form-label">(ক) নাম:</label>
				<div class="col-sm-4 col-md-4 p-0">
					<input type="text" class="form-control" v-model="renters.emergency_name">
				</div>
				<label for="emergency_relationships" class="col-sm-2 col-form-label">(খ) সম্পর্ক:</label>
				<div class="col-sm-3 col-md-3 p-0">
					<input type="text" class="form-control" v-model="renters.emergency_relationships">
				</div>
			</div>
			<div class="form-group row main_form">
				<label for="emergency_address" class="col-sm-2 offset-md-1 col-form-label">(গ) ঠিকানা:</label>
				<div class="col-sm-4 col-md-4 p-0">
					<input type="text" class="form-control" v-model="renters.emergency_address">
				</div>
				<label for="emergency_number" class="col-sm-2 col-form-label">(ঘ) মোবাইল নম্বর:</label>
				<div class="col-sm-3 col-md-3 p-0">
					<input type="number" class="form-control" v-model="renters.emergency_number">
				</div>
			</div>
			<div class="form-group row main_form">
				<label for="housekeeper_name" class="col-sm-2 col-form-label">১০. গৃহকর্মীর নাম:</label>
				<div class="col-sm-5 col-md-5 p-0">
					<input type="text" class="form-control" v-model="renters.housekeeper_name">
				</div>
				<label for="housekeeper_national_id" class="col-sm-2 col-form-label">জাতীয় পরিচয়পত্র নম্বর:</label>
				<div class="col-sm-3 col-md-3 p-0">
					<input type="number" class="form-control" v-model="renters.housekeeper_national_id">
				</div>
			</div>
			<div class="form-group row main_form">
				<label for="housekeeper_number" class="col-sm-2 offset-md-1 col-form-label">মোবাইল নম্বর:</label>
				<div class="col-sm-4 col-md-4 p-0">
					<input type="number" class="form-control" v-model="renters.housekeeper_number">
				</div>
				<label for="housekeeper_address" class="col-sm-2 col-form-label">স্থায়ী ঠিকানা: </label>
				<div class="col-sm-3 col-md-3 p-0">
					<input type="text" class="form-control" v-model="renters.housekeeper_address">
				</div>
			</div>
			<div class="form-group row main_form">
				<div class="form-group col-md-3">
					<label> সদস্যের নাম</label>
					<input class="form-control" v-model="member.name" />
				</div>
				<div class="form-group col-md-2">
					<label>পেশা </label>
					<input class="form-control" v-model="member.profession" />
				</div>
				<div class="form-group col-md-1">
					<label> বয়স </label>
					<input class="form-control" v-model="member.age" />
				</div>
				<div class="form-group col-md-2">
					<label> ফোন নম্বর </label>
					<input class="form-control" v-model="member.phone_number" />
				</div>
				<div class="form-group col-md-2">
					<label> সম্পর্ক </label>
					<input class="form-control" v-model="member.relation" />
				</div>
				<div class="form-group col-md-2">
					<label> এনআইডি নম্বর </label>
					<input class="form-control" v-model="member.fld_nid" />
				</div>
				<button type="button" v-on:click="addMember" value="save" class="btn btn-success">Add Member</button>
			</div>
			<div class="memberList">
				<table class="table table-bordered">

					<head>
						<tr>
							<td>ক্রমিক নং</td>
							<td>নাম: </td>
							<td>বয়স</td>
							<td>ফোন নম্বর </td>
							<td>সম্পর্ক</td>
							<td>এনআইডি নম্বর</td>
							<td>মুছে ফেলুন</td>
						</tr>
					</head>

					<tbody>
						<tr v-for="(member,ind) in members">
							<td>{{ind+1}}</td>
							<td hidden>{{member.id}}</td>
							<td>{{ member.name }}</td>
							<td>{{ member.age }}</td>
							<td>{{ member.phone_number }}</td>
							<td>{{ member.relation }}</td>
							<td>{{ member.fld_nid }}</td>
							<td><button type="button" v-on:click="removeMemberFromCart(member,ind)">X</button> </td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="form-group row main_form">
			<label for="driver_name" class="col-sm-2 col-form-label">১১. ড্রাইভারের নাম:</label>
			<div class="col-sm-5 col-md-5 p-0">
				<input type="text" class="form-control" v-model="renters.driver_name">
			</div>
			<label for="driver_nid_number" class="col-sm-2 col-form-label">জাতীয় পরিচয়পত্র নম্বর:</label>
			<div class="col-sm-3 col-md-3 p-0">
				<input type="number" class="form-control" v-model="renters.driver_nid_number">
			</div>
		</div>
		<div class="form-group row main_form">
			<label for="driver_number" class="col-sm-2 offset-md-1 col-form-label">মোবাইল নম্বর:</label>
			<div class="col-sm-4 col-md-4 p-0">
				<input type="number" class="form-control" v-model="renters.driver_number">
			</div>
			<label for="driver_address" class="col-sm-2 col-form-label">স্থায়ী ঠিকানা: </label>
			<div class="col-sm-3 col-md-3 p-0">
				<input type="text" class="form-control" v-model="renters.driver_address">
			</div>
		</div>
		<div class="form-group row main_form">
			<label for="previous_landlord_name" class="col-sm-3 col-form-label">১২. পূর্ববর্তী বাড়িওয়ালার নাম:</label>
			<div class="col-sm-4 col-md-4 p-0">
				<input type="text" class="form-control" v-model="renters.previous_landlord_name">
			</div>
			<label for="previous_landlord_number" class="col-sm-2 col-form-label">মোবাইল নম্বর:</label>
			<div class="col-sm-3 col-md-3 p-0">
				<input type="number" class="form-control" v-model="renters.previous_landlord_number">
			</div>
		</div>
		<div class="form-group row main_form">
			<label for="previous_landlord_address" class="col-sm-2 offset-md-1 col-form-label">ঠিকানা:</label>
			<div class="col-sm-9 col-md-9 p-0">
				<input type="text" class="form-control" v-model="renters.previous_landlord_address">
			</div>
		</div>
		<div class="form-group row main_form">
			<label for="reasons_to_leave_previous_home" class="col-sm-3 col-form-label">১৩. পূর্ববর্তী বাসা ছাড়ার কারণ:</label>
			<div class="col-sm-9 col-md-9 p-0">
				<input type="text" class="form-control" v-model="renters.reasons_to_leave_previous_home">
			</div>
		</div>
		<div class="form-group row main_form">
			<label for="current_landlord_name" class="col-sm-3 col-form-label">১৪. বর্তমান বাড়িওয়ালার নাম:</label>
			<div class="col-sm-4 col-md-4 p-0">
				<input type="text" class="form-control" v-model="renters.current_landlord_name">
			</div>
			<label for="current_landlord_number" class="col-sm-2 col-form-label">মোবাইল নম্বর:</label>
			<div class="col-sm-3 col-md-3 p-0">
				<input type="number" class="form-control" v-model="renters.current_landlord_number">
			</div>
		</div>
		<div class="form-group row main_form">
			<label for="living_date_current_home" class="col-sm-4 col-form-label">১৫. বর্তমান বাড়িতে কোন তারিখ থেকে বসবাস:</label>
			<div class="col-sm-8 col-md-8 p-0">
				<input type="text" class="form-control" v-model="renters.living_date_current_home">
			</div>
		</div>
		<div class="form-group row main_form">
			<label for="security_guard_name" class="col-sm-2 col-form-label">১৬. নিরাপত্তারক্ষীর নাম:</label>
			<div class="col-sm-5 col-md-5 p-0">
				<input type="text" class="form-control" v-model="renters.security_guard_name">
			</div>
			<label for="security_guard_nid_number" class="col-sm-2 col-form-label">জাতীয় পরিচয়পত্র নম্বর:</label>
			<div class="col-sm-3 col-md-3 p-0">
				<input type="number" class="form-control" v-model="renters.security_guard_nid_number">
			</div>
		</div>
		<div class="form-group row main_form">
			<label for="security_guard_number" class="col-sm-2 offset-md-1 col-form-label">মোবাইল নম্বর:</label>
			<div class="col-sm-4 col-md-4 p-0">
				<input type="number" class="form-control" v-model="renters.security_guard_number">
			</div>
			<label for="security_guard_address" class="col-sm-2 col-form-label">স্থায়ী ঠিকানা: </label>
			<div class="col-sm-3 col-md-3 p-0">
				<input type="text" class="form-control" v-model="renters.security_guard_address">
			</div>
		</div>
		<div class="form-group row main_form">
			<label class="col-sm-2 offset-md-1 col-form-label">স্বাক্ষর:</label>
			<div class="col-sm-2 col-md-2 p-0">
			<label class=" col-form-label" style="color:red">height:40px/width:200px</label>
				<input type="file" @change="signaturePreview" style="opacity: 1; border:none;left: 205%;top: 12px;height: 50px;" />
			</div>
			<div class="col-sm-2 col-form-label">
				<img v-bind:src="signatureUrl" alt="" width="100%">
			</div>
			<!-- <label for="security_guard_address" class="col-sm-2 col-form-label"> </label>
			<div class="col-sm-2 col-md-2 p-0">
				 <input type="file" v-model="renters.pictureTwo" @change="previewImage2" style="opacity: 1; border:none;left: 20px;top: 36px; width: 221px;height: 50px;" /> -->
			<!-- </div> -->
			<!-- <div class="col-sm-2 col-form-label"> -->
				<!-- <img v-bind:src="renters.imageTwo" alt="" width="100%"> -->
			<!-- </div>  -->
		</div>
		<button type="submit" value="Save" class="btn btn-success">Submit</button>
	</form>
</div>

<script src="<?php echo base_url() ?>/assets/js/vue/vue.js"></script>
<script src="<?php echo base_url() ?>/assets/js/vue/axios.min.js"></script>
<script src="<?php echo base_url() ?>/assets/js/vue/vue-select.min.js"></script>

<script>
	Vue.component('v-select', VueSelect.VueSelect);
	new Vue({
		el: '#floor_unit',
		data() {
			return {
				floors: [],
				selectedFloor: null,
				units: [],
				selectedUnit: null,
				renter: {},
				member: {
					id: null,
					name: null,
					profession: null,
					age: null,
					relation: null,
					phone_number: null,
					fld_nid: null
				},
				members: [],
				renters: {
					pictureOne: '',
					pictureTwo: '',
					unit_id: null,
					resident_name: null,
					father_name: null,
					resident_type: null,
					date_of_birth: null,
					village: null,
					marital_status: null,
					police_station: null,
					district: null,
					work_address: null,
					religion: null,
					educational_qualifications: null,
					mobile_number: null,
					national_id_number: null,
					email: null,
					passport_number: null,
					emergency_name: null,
					emergency_relationships: null,
					emergency_address: null,
					emergency_number: null,
					housekeeper_name: null,
					housekeeper_national_id: null,
					housekeeper_number: null,
					housekeeper_address: null,
					driver_name: null,
					driver_nid_number: null,
					driver_address: null,
					driver_number: null,
					previous_landlord_name: null,
					previous_landlord_number: null,
					previous_landlord_address: null,
					reasons_to_leave_previous_home: null,
					current_landlord_name: null,
					current_landlord_number: null,
					living_date_current_home: null,
					security_guard_name: null,
					security_guard_nid_number: null,
					security_guard_number: null,
					security_guard_address: null,
				},
				renter_info: [],
				profileUrl: null,
				selectedProfileFile: null,
				signatureUrl: null,
				selectedSignatureFile: null,
			}

		},
		created() {
			this.get_floor();
			this.getUnits();
			// this.insertMember();
		},
		methods: {
			get_floor() {
				axios.get('/get_floor').then(res => {
					this.floors = res.data;
				})
			},

			getUnits() {
				if (this.selectedFloor == null) {
					return;
				}
				axios.post("/get_units", {
					floorId: this.selectedFloor
				}).then(res => {
					this.units = res.data;
				})
			},
			addMember() {
				// check member validation
				if (this.member == null) {
					alert('filed not be empty');
					return;
				}
				let member = {
					name: this.member.name,
					profession: this.member.profession,
					age: this.member.age,
					relation: this.member.relation,
					phone_number: this.member.phone_number,
					fld_nid: this.member.fld_nid
				}
				if (this.member.length == 0) {
					alert('Cart is empty');
					return;
				}
				// add member in members array
				this.members.push(member);

				// clear member
				 this.clearMember();
			},
			removeMemberFromCart(item, index) {
				this.members.splice(index, 1)
			},
			clearMember() {
				this.member = {
					id: null,
					name: null,
					profession: null,
					age: null,
					relation: null,
					phone_number: null,
					fld_nid: null
				}
			},
			clearFrom() {
				this.renters = {
					unit_id: null,
					resident_name: null,
					father_name: null,
					resident_type: null,
					date_of_birth: null,
					village: null,
					marital_status: null,
					police_station: null,
					district: null,
					work_address: null,
					religion: null,
					educational_qualifications: null,
					mobile_number: null,
					national_id_number: null,
					email: null,
					passport_number: null,
					emergency_name: null,
					emergency_relationships: null,
					emergency_address: null,
					emergency_number: null,
					housekeeper_name: null,
					housekeeper_national_id: null,
					housekeeper_number: null,
					housekeeper_address: null,
					driver_name: null,
					driver_nid_number: null,
					driver_address: null,
					driver_number: null,
					previous_landlord_name: null,
					previous_landlord_number: null,
					previous_landlord_address: null,
					reasons_to_leave_previous_home: null,
					current_landlord_name: null,
					current_landlord_number: null,
					living_date_current_home: null,
					security_guard_name: null,
					security_guard_nid_number: null,
					security_guard_number: null,
					security_guard_address: null,
					image: '',
					pictureOne: '',
					pictureTwo: '',
					
			
				}
				this.signatureUrl = null,
				this.profileUrl = null
			
			},
			insertMember() {
				if (this.member == null) {
					alert('filed not be empty');
					return;
				}

				let data = {
					member: this.members,
					renter: this.renters
				}
				let fd = new FormData();
				fd.append('profile', this.selectedProfileFile);
				fd.append('signature', this.selectedSignatureFile);
				fd.append('data', JSON.stringify(data));
				axios.post("/ranter_insert", fd).then(res => {
					this.member = res.data;
				})

				this.clearFrom();
				this.clearMember();
				location.reload();
				alert("Resident Entry Successfully")
			},
			profilePreview() {
				if (event.target.files.length == 0) {
					return;
				}
				this.selectedProfileFile = event.target.files[0];
				this.profileUrl = URL.createObjectURL(event.target.files[0]);
			},
			signaturePreview() {
				if (event.target.files.length == 0) {
					return;
				}
				this.selectedSignatureFile = event.target.files[0];
				this.signatureUrl = URL.createObjectURL(event.target.files[0]);
			},
		}
	})
</script>