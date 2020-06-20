<style>
	.v-select {
		margin-bottom: 5px;
	}

	.v-select.open .dropdown-toggle {
		border-bottom: 1px solid #ccc;
	}

	.v-select .dropdown-toggle {
		padding: 0px;
		height: 25px;
	}

	.v-select input[type=search],
	.v-select input[type=search]:focus {
		margin: 0px;
	}

	select.form-control:not([size]):not([multiple]) {
		height: calc(2.25rem + -9px);
	}

	#cashTransaction label {
		font-size: 12px;
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

	#cashTransaction label {
		font-size: 13px;
	}

	#cashTransaction select {
		border-radius: 3px;
		padding: 0;
	}

	#cashTransaction .add-button {
		padding: 2.5px;
		width: 28px;
		background-color: #298db4;
		display: block;
		text-align: center;
		color: white;
	}

	#cashTransaction .add-button:hover {
		background-color: #41add6;
		color: white;
	}
</style>

<div id="cashTransaction" class="content">
	<div class="row" style="border-bottom: 1px solid #ccc;padding-bottom: 15px;margin-bottom: 15px;">
		<div class="col-md-12">
			<div class="form-group">


				<div class="col-md-4 ml-auto mr-auto pb-5">
					<label class="col-md-12 pl-0 ">Transaction Type</label>
					<select class="form-control" v-model="bill_type">
						<option active value="1">Bill Collection</option>
						<option value="2">Expenses</option>
						<option value="3">Bill Advance</option>
					</select>
				</div>
			</div>
			<form @submit.prevent="update_service(unit_paid_amount)">
				<!-- house service and rent bill -->
				<div class="row" v-bind:style="{display: bill_type == '1' ? '' : 'none'}">
					<div class="col-md-5 col-md-offset-1">
						<div class="">
							<div class="form-group">
								<label class="col-md-4 control-label pr-0">Select Floor</label>
								<label class="col-md-1">:</label>
								<div class="col-md-7">
									<select class="form-control" v-model="selectedFloor" @change="getUnits">
										<option :value="floor.id" v-for="floor in floors" value="1">{{floor.floor_name}}</option>
									</select>
								</div>
							</div>
							<div class="form-group col-sm-7 col-xs-6">
								<option>Select Unit</option>
								<select id="" @change="service_bill_collection_by_unit" class="filter-make filter form-control" v-model="unit_paid_amount.selectedUnit">
									<option :value="unit.id" v-for="unit in units">{{unit.unit_name}}</option>
								</select>
								<option>Bill Type </option>
								<select class="form-control" v-on:change="onChangeBillType" v-model="unit_paid_amount.bill_types">
									<option value="1">Rent</option>
									<option value="2">Service</option>
								</select>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label pr-0">Transaction Type</label>
								<label class="col-md-1">:</label>
								<div class="col-md-7">
									<select class="form-control" v-model="unit_paid_amount.payment_type">
										<option value="1">Cash Payment</option>
										<option value="2">Bank Payment</option>
										<input placeholder="Account Number" v-model="unit_paid_amount.account_number" v-bind:style="{display: unit_paid_amount.payment_type == '2' ? '' : 'none'}" type="text">
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-5 col-md-offset-1">
						<div class="form-group">
							<label class="col-md-4 control-label">Date</label>
							<label class="col-md-1">:</label>
							<div class="col-md-7">
								<input type="date" v-model="unit_paid_amount.date" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Description</label>
							<label class="col-md-1">:</label>
							<div class="col-md-7">
								<input type="text" v-model="unit_paid_amount.description" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Amount</label>
							<label class="col-md-1">:</label>
							<div class="col-md-7">
								<input type="number" v-model="unit_paid_amount.paid_amount" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-7 col-md-offset-5">
								<input type="submit" class="btn btn-success btn-sm" value="Save">
							</div>
						</div>
					</div>
					<div class="col-md-2">
						<label >Total due</label></br>
						<label  v-for="rent in rentData"> {{rent.fld_total}} </label>
						<label v-for="service in serviceData">{{service.fld_total}} </label></br>
						<label >Prevues Amount</label></br>
						<label v-bind:style="{display: unit_paid_amount.bill_types == '1' ? '' : 'none'}">{{ selectDueAmounts.total }} </label>
						<label v-bind:style="{display: unit_paid_amount.bill_types == '2' ? '' : 'none'}">{{ selectDueAmountServices.total }} </label>
					</div>

				</div>
			</form>
			<!-- End house service and rent bill  -->
			<form @submit.prevent="AdvanceInsert(unit_paid_amount)">
				<!-- house service and rent bill -->
				<div class="row" v-bind:style="{display: bill_type == '3' ? '' : 'none'}">
					<div class="col-md-5 col-md-offset-1">
						<div class="">
							<div class="form-group">
								<label class="col-md-4 control-label pr-0">Select Floor</label>
								<label class="col-md-1">:</label>
								<div class="col-md-7">
									<select class="form-control" v-model="selectedFloor" @change="getUnits">
										<option :value="floor.id" v-for="floor in floors" value="1">{{floor.floor_name}}</option>
									</select>
								</div>
							</div>
							<div class="form-group col-sm-7 col-xs-6">
								<option>Select Unit</option>
								<select id="" @change="service_bill_collection_by_unit" class="filter-make filter form-control" v-model="advance_detail.selectedUnit">
									<option :value="unit.id" v-for="unit in units">{{unit.unit_name}}</option>
								</select>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label pr-0">Transaction Type</label>
								<label class="col-md-1">:</label>
								<div class="col-md-7">
									<select class="form-control" v-model="advance_detail.payment_type">
										<option value="1">Cash Payment</option>
										<option value="2">Bank Payment</option>
										<input placeholder="Account Number" v-model="advance_detail.account_number" v-bind:style="{display: advance_detail.payment_type == '2' ? '' : 'none'}" type="text">
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-5 col-md-offset-1">
						<div class="form-group">
							<label class="col-md-4 control-label">Date</label>
							<label class="col-md-1">:</label>
							<div class="col-md-7">
								<input type="date" v-model="advance_detail.date" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Description</label>
							<label class="col-md-1">:</label>
							<div class="col-md-7">
								<input type="text" v-model="advance_detail.description" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Amount</label>
							<label class="col-md-1">:</label>
							<div class="col-md-7">
								<input type="number" v-model="advance_detail.total_advance" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-7 col-md-offset-5">
								<input type="submit" class="btn btn-success btn-sm" value="Save">
							</div>
						</div>
					</div>
				</div>
			</form>
			<!-- End house service and rent bill  -->


			<form @submit.prevent="AccountInsertExpense">
				<div class="row" v-bind:style="{display: bill_type == '2' ? '' : 'none'}">
					<div class="col-md-5 col-md-offset-1">
						<div class="form-group">
							<label hidden class="col-md-4 control-label">Transaction Id</label>
							<label hidden class="col-md-1">:</label>
							<div class="col-md-7">
								<input hidden type="text" v-model="accountCode" class="form-control" readonly>
							</div>
						</div>
						<!--all Expense -->
						<div>
							<div class="form-group">
								<label class="col-md-4 control-label pr-0">Transaction Type</label>
								<label class="col-md-1">:</label>
								<div class="col-md-7">
									<select class="form-control" v-model="expense_detail.payment_type">
										<option value="0">Cash Receive </option>
										<option value="1">Cash Payment</option>
										<option value="2">Bank Payment</option>
										<input placeholder="Account Number" v-model="expense_detail.account_number" v-bind:style="{display: expense_detail.payment_type == '2' ? '' : 'none'}" type="text">
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label">Expense</label>
								<label class="col-md-1">:</label>
								<div class="col-md-7">
									<select class="form-control" v-model="expense_detail.type">
										<option :value="expense.id" v-for="expense in expenses">{{expense.expense_name}}</option>
									</select>

								</div>
								<div class="col-md-1" style="padding-left:0;margin-left: 16px;">
									<a href="/account" target="_blank" class="add-button"><i class="fa fa-plus"></i></a>
								</div>
							</div>

						</div>
					</div>

					<div class="col-md-5">
						<div class="form-group">
							<label class="col-md-4 control-label">Date</label>
							<label class="col-md-1">:</label>
							<div class="col-md-7">
								<input type="date" v-model="expense_detail.date" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Description</label>
							<label class="col-md-1">:</label>
							<div class="col-md-7">
								<input type="text" v-model="expense_detail.description" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Amount</label>
							<label class="col-md-1">:</label>
							<div class="col-md-7">
								<input type="number" v-model="expense_detail.taka" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-7 col-md-offset-5">
								<input type="submit" class="btn btn-success btn-sm" value="Save">

							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="widget-box">
		<div class="widget-body" id="list">
			<div class="widget-main">
				<div class="row">
					<div class="col-md-12">
						<div id="accountsTable" class="table-responsive">

							<div class="content">
								<div class="row" v-bind:style="{display: bill_type == '3' ? '' : 'none'}">
									<div class="col-md-12">
										<div class="card">
											<div class="card-header">
												<div class="widget-header">
													<h4 class="widget-title">Advance List</h4>
												</div>
											</div>
											<div class="card-body">
												<div class="toolbar">
													<!--        Here you can write extra buttons/actions for the toolbar              -->
												</div>
												<table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
													<thead>
														<tr>
															<th>SI ID</th>
															<th>Unit Name</th>
															<th>Description</th>
															<th>Date</th>
															<th>Amount</th>
															<th class="disabled-sorting text-right">Actions</th>
														</tr>
													</thead>
													<tbody>

														<tr v-for="(Advance,index) in Advances">

															<td>{{index}}</td>
															<td>{{Advance.unit_name}}</td>
															<td hidden>{{Advance.Advance_id}}</td>
															<td>{{Advance.description}}</td>
															<td>{{Advance.entry_date}}</td>
															<td>{{Advance.total_advance}}</td>
															<td class="text-right">
																<a @click="AdvanceDelete(Advance)" class="btn btn-danger btn-link btn-icon btn-sm"><i class="fa fa-times"></i></a>
															</td>
														</tr>

													</tbody>
												</table>
											</div>
											<!-- end content-->
										</div>
										<!--  end card  -->
									</div>
									<!-- end col-md-12 -->
								</div>
								<div class="row" v-bind:style="{display: bill_type == '2' ? '' : 'none'}">
									<div class="col-md-12">
										<div class="card">
											<div class="card-header">
												<div class="widget-header">
													<h4 class="widget-title">Expense List</h4>
												</div>
											</div>
											<div class="card-body">
												<div class="toolbar">
													<!--        Here you can write extra buttons/actions for the toolbar              -->
												</div>
												<table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
													<thead>
														<tr>
															<th>SI ID</th>
															<th>Expense Name</th>
															<th>Description</th>
															<th>Date</th>
															<th>Amount</th>
															<th class="disabled-sorting text-right">Actions</th>
														</tr>
													</thead>
													<tbody>

														<tr v-for="expense in expense_details">

															<td>{{expense.code}}</td>
															<td hidden>{{expense.expense_id}}</td>
															<td>{{expense.expense_name}}</td>
															<td>{{expense.description}}</td>
															<td>{{expense.date}}</td>
															<td>{{expense.taka}}</td>
															<td class="text-right">
																<a style="cursor:pointer" @click="edit_Amount_expense_name(expense)">
																	<i class="fa fa-edit" style="color:green"></i></a>
																<a @click="DeleteAmountExpense(expense.expense_id)" class="btn btn-danger btn-link btn-icon btn-sm"><i class="fa fa-times"></i></a>
															</td>
														</tr>

													</tbody>
												</table>
											</div>
											<!-- end content-->
										</div>
										<!--  end card  -->
									</div>
									<!-- end col-md-12 -->
								</div>
								<!-- end row -->
								<div v-bind:style="{display: bill_type == '1' ? '' : 'none'}">
									<table v-if="isRenter" id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th>Bill Id</th>
												<th>Name</th>
												<th>Month</th>
												<th>Date</th>
												<th>Unit</th>
												<th>Total</th>
												
											</tr>
										</thead>
										<?php
										$j = 0; ?>
										<tbody>
											<tr v-for="rent in rentData">
												<th>{{ rent.id }}</th>
												<th>{{ rent.ownar_name }}</th>
												<th>{{ rent.month_name }}</th>
												<th>{{ rent.generate_date }}</th>
												<th>{{ rent.unit_name }}</th>
												<th>{{ rent.fld_total }}</th>
												
											</tr>
										</tbody>
									</table>
									<table v-else id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th>Bill Id</th>
												<th>Name</th>
												<th>Month</th>
												<th>Date</th>
												<th>Unit</th>
												<th>Total</th>
												<th>Action</th>
											</tr>
										</thead>

										<tbody>
											<tr v-for="service in serviceData">
												<td> {{ service.id }}</td>
												<td>{{ service.resident_name }}</td>
												<td>{{ service.month_name }}</td>
												<th>{{ service.generate_date }}</th>
												<th>{{ service.unit_name }}</th>
												<th>{{ service.fld_total }}</th>
												<th>

												</th>
											</tr>

										</tbody>
										<!-- <a style="cursor:pointer" onclick="window.open('<?php //echo base_url(); 
																								?>service_bill_print', 'newwindow', `width=${screen.width}, height=${screen.height}`); return false;">
                							<i class="fa fa-print" style="font-size:24px;color:green"></i></a> -->

									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<style>
	.form-group .form-control {
		padding: 5px;
	}

	.form-group {
		margin: 0px;
	}

	label {
		margin: 0px;
	}

	.table>tbody>tr>td {
		padding: 0px;
	}

	.table-responsive {
		overflow: hidden;
	}

	h4 {
		margin: 0px;
	}

	.table>thead>tr>th {
		padding: 5px;
	}

	.form-group .form-control {
		padding: 5px;
	}

	.form-group {
		margin-bottom: 0px;
	}

	label {
		margin: 0px;
	}
</style>


<script src="<?php echo base_url(); ?>assets/js/vue/vue.js"></script>
<script src="<?php echo base_url(); ?>assets/js/vue/axios.js"></script>
<script src="<?php echo base_url(); ?>assets/js/vue/vuejs-datatable.js"></script>
<script src="<?php echo base_url(); ?>assets/js/vue/vue-select.min.js"></script>


<script>
	Vue.component('v-select', VueSelect.VueSelect);
	new Vue({
		el: '#cashTransaction',
		data() {
			return {
				expenses: [],
				expense: {
					payment_type: null,
					bill_type: null,
					expense_id: null,
					id: null,
				},
				accountCode: null,
				expense_details: [],
				expense_detail: {
					expense_name: null,
					description: null,
					expense_id: null,
					payment_type: null,
					accountCode: null,
					account_number: null,
					taka: null,
					type: null,
					id: null
				},
				advance_detail: {
					total_advance: null,
					entry_date: null,
					description: null,
					bill_types: '',
					id: null,
					selectedUnit: null,
					account_number: null
				},
				selectExpense: null,
				isRenter: false,
				bill_type: '',
				floors: [],
				selectedFloor: null,
				units: [],
				unit_paid_amount: {
					paid_amount: null,
					description: null,
					bill_types: '',
					date: null,
					id: null,
					selectedUnit: null
				},
				selectDueAmounts:[],
				
				selectDueAmountServices:[],
				selectedUnit: null,
				renters: [],
				rentData: [],
				selectRent: null,
				services: [],
				serviceData: [],
				selectedService: null,
				Advances:[]
			}
		},
		created() {
			this.get_expense();
			this.getExpenseCode();
			this.get_account_expense();
			this.get_floor();
			this.getUnits();
			this.rent_bill_collection_by_unit();
			this.get_advance();
		
		},
		methods: {
			onChangeBillType() {
				if (this.unit_paid_amount.bill_types == 1) {
					this.isRenter = true;
					this.rent_bill_collection_by_unit();
					this.selectDueAmount();
					this.clearData(); 
				
				} else {
					this.isRenter = false;
					this.service_bill_collection_by_unit();
					this.selectDueAmountService();
					this.clearData();
				
				}
			},
		
		
			get_floor() {
				axios.get('/get_floor').then(res => {
					this.floors = res.data;
				})
				this.clearData();
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
				this.clearData();
			},
			service_bill_collection_by_unit() {
			
				if (this.unit_paid_amount.selectedUnit == null) {
					return "Empty"
				}
				axios.post("/select_lest_bill_entry", {
					unit_id: this.unit_paid_amount.selectedUnit
				}).then(res => {
					if (res.data.length > 0)
					this.serviceData = res.data;
				})
			},
			rent_bill_collection_by_unit() {
				if (this.unit_paid_amount.selectedUnit == null) {
					return "Empty";
				}
				axios.post("/select_lest_rent_entry", {
					unit_id: this.unit_paid_amount.selectedUnit
				}).then(res => {
					if (res.data.length > 0)
						this.rentData = res.data;
				})
			},
			update_service() {

				let url = "/update_rent";
				if (this.unit_paid_amount.bill_types != 1) {
					url = "/update_service";
				}
				if (this.unit_paid_amount == '') {
					alert('filed not be empty');
					return;
				}
			
				let all = {
					unit_payment: this.unit_paid_amount,
					serviceData: this.serviceData,
					rentData: this.rentData
				}
				axios.post(url, all).then(res => {
					this.r = res.data;
					window.open('/Report_collection/', '_blank');
				})
				
			},

			clearData() {
				this.rentData = {},
					this.serviceData = {}
			},
			clearExpense() {
				expense_detail = {
					expense_name: null,
					description: null,
					expense_id: null,
					payment_type: null,
					accountCode: null,
					account_number: null,
					taka: null,
					type: null,
					id: null
				}
			},

			//// Expenses ////
			get_expense() {
				axios.get('/get_expense').then(res => {
					this.expenses = res.data;
				})
			},

			getExpenseCode() {
				axios.get("/get_expense_code").then(res => {
					this.accountCode = res.data;
				})
			},
			get_account_expense() {
				axios.get("/get_account_expense").then(res => {
					this.expense_details = res.data;
				})
			},
			AccountInsertExpense() {

				let url = "/account_expense_insert";
				if (this.expense_detail.expense_id != null) {
					url = "/account_update_expense";
				}
				if (this.expense_detail == '') {
					alert('filed not be empty');
					return;
				}
				axios.post(url, this.expense_detail).then(res => {
					this.expense_details = res.data;
					window.open('/Report_collection/','_blank');
				})
				 alert("Expense Successfully insert");
				// location.reload();
			},
			edit_Amount_expense_name(expense_detail) {

				let keys = Object.keys(this.expense_detail);
				keys.forEach(key => {
					this.expense_detail[key] = expense_detail[key];
				});
				this.accountCode = expense_detail.code;
			},
			DeleteAmountExpense(expense_id) {
				let deleteConfirm = confirm('Are you sure?');
				if (deleteConfirm == false) {
					return;
				}
				axios.post('/deleteAccountExpense', {
					expense_id: expense_id
				}).then(res => {
					let r = res.data;
					alert(r.message);
					if (r.success) {

					}
				})
				location.reload();
			},

			//// Advance ////
			get_advance(){
				axios.get("/get_advance").then(res => {
					this.Advances = res.data;
				})
			},
			AdvanceInsert() {
				axios.post('/InsertAdvance',this.advance_detail).then(res => {
					this.advance_details = res.data;
				})
				alert("Expense Successfully insert");
				location.reload();
			},
			AdvanceDelete(Advance_id) {
				axios.post('/AdvanceDelete',{
					Advance_id: Advance_id
				}).then(res => {
					this.Advances = res.data;
				})
				alert("Expense Successfully Delete");
				// location.reload();
			},


			selectDueAmount(){
				axios.post("/selectDueAmount",{unit_id: this.unit_paid_amount.selectedUnit}).then(res => {
					this.selectDueAmounts = res.data;
				})
			}, 
			selectDueAmountService(){
				axios.post("/selectDueAmountService",{unit_id: this.unit_paid_amount.selectedUnit}).then(res => {
					this.selectDueAmountServices = res.data;
				})
			}

		}
	})
</script>