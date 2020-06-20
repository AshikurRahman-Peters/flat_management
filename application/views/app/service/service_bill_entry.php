<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<div class="content" id="month_bill_entry">
	<h3>All Bill Entry</h3>
	<div class="row">
		<div class="form-group col-sm-2 col-xs-4">
			<label>Select Month</label>
			<select name="service_month_id" class="filter-make filter form-control" required v-model="selectedMonth">
				<option :value="month.id" v-for="month in months"> {{month.month_name}} </option>
			</select>
		</div>
		<div class="form-group col-sm-2 col-xs-6">
			<label>Bill type</label>
			<select class="form-control" v-on:change="onChangeBillType" v-model="bill_type" required>

				<option value="1">Rent</option>
				<option value="2">Service</option>
			</select>
		</div>
		<div v-if="isRenter" class="form-group col-sm-2 col-xs-4" style="font-size: 30px">
			<a style="cursor:pointer" onclick="window.open('<?php echo base_url(); ?>service_rent_print', 'newWindow', `width=${screen.width}, height=${screen.height}`); return false;">
				<i class="fa fa-print" style="font-size:24px;color:green"></i></a>
		</div>
		<div v-else class="form-group col-sm-2 col-xs-4" style="font-size: 30px">
			<a style="cursor:pointer" onclick="window.open('<?php echo base_url(); ?>service_bill_print', 'newWindow', `width=${screen.width}, height=${screen.height}`); return false;">
				<i class="fa fa-print" style="font-size:24px;color:green"></i></a>
		</div>

	</div>


	<table v-if="isRenter" id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>Bill Id</th>
				<!-- <th>Name</th> -->
				<th>Date</th>
				<th>unit</th>
				<th>Rent</th>
				<th>Garage</th>
				<th>Others</th>
				<th>Total</th>
			</tr>
		</thead>

		<tbody>
			<tr v-for="all_rents in all_rent">
				<td>{{all_rents.id }}</td>
				<!-- <td>{{all_rents.resident_name }}</td> -->
				<td>{{all_rents.generate_date }}</td>
				<td>{{all_rents.unit_name }}</td>
				<td><input type="text" v-model="all_rents.rent_amount" class="form-control"></input></td>
				<td><input type="text" v-model="all_rents.fld_garage " class="form-control"></input></td>
				<td><input type="text" v-model="all_rents.fld_others "  class="form-control"></input></td>
				<td><input type="button" v-model="all_rents.fld_total"  class="form-control"></input></td>
			</tr>
		</tbody>
	</table>
	<table v-else id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>Bill Id</th>
				<!-- <th>Name</th> -->
				<th>Date</th>
				<th>Unit</th>
				<th>owner C.Fund</th>
				<th>Gard & generator</th>
				<th>Electricity</th>
				<th>Gash</th>
				<th>Water</th>
				<th>polish & cleaner</th>
				<th>Common Service</th>
				<th>Eid/Dew</th>
				<th>Total</th>
			</tr>
		</thead>

		<tbody>
			<tr v-for="all_bills in all_bill">
				<td>{{all_bills.id }}</td>
				<!-- <td>{{ all_bills.resident_name }}</td> -->
				<td>{{ all_bills.generate_date }} </td>
				<td>{{ all_bills.unit_name }} </td>
				<td><input type="text" v-model="all_bills.owner_fund"  class="form-control"></input></td>
				<td><input type="text" v-model="all_bills.security_generator"  class="form-control"></input></td>
				<td><input type="text" v-model="all_bills.electricity_amount"  class="form-control"></input></td>
				<td><input type="text" v-model="all_bills.gas_amount"  class="form-control"></input></td>
				<td><input type="text" v-model="all_bills.water_amount"  class="form-control"></input></td>
				<td><input type="text" v-model="all_bills.police_cleaners"  class="form-control"></input></td>
				<td><input type="text" v-model="all_bills.common_service"  class="form-control"></input></td>
				<td><input type="text" v-model="all_bills.fld_others"  class="form-control"></input></td>
				<td><input type="button" v-model="all_bills.fld_total" class="form-control"></input></td>
			</tr>
		</tbody>
	</table>
	<button style="margin:0px" type="submit" v-on:click="insert_new_bill()" class="btn btn-success">Submit</button>
</div>


<script src="<?php echo base_url() ?>/assets/js/vue/vue.js"></script>
<script src="<?php echo base_url() ?>/assets/js/vue/axios.min.js"></script>
<script src="<?php echo base_url() ?>/assets/js/vue/vue-select.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/unit.js"></script>
<script>
	Vue.component('v-select', VueSelect.VueSelect);
	new Vue({
		el: '#month_bill_entry',
		data() {
			return {
				months: [],
				selectedMonth: null,
				all_bill: {},
				service_bill: [],
				all_rent: {

				},
				get_rent: [],
				isRenter: false,
				bill_type: '',
			}
		},
		created() {
			this.get_months();
			this.get_all_bill();

		},
		methods: {
			onChangeBillType() {
				if (this.bill_type == 1) {
					this.isRenter = true;
					this.get_all_rent();
				} else {
					this.isRenter = false;
					this.get_all_bill();
				}
			},
			get_months() {
				axios.get('/get_all_month').then(res => {
					this.months = res.data;
				})
			},
			get_all_bill() {
				axios.get('/get_all_bill').then(res => {
					if (res.data.length > 0)
						this.all_bill = res.data;
				})

			},
			get_all_rent() {
				axios.get('/get_all_rent').then(res => {
					if (res.data.length > 0)
						this.all_rent = res.data;
				})

			},
			insert_new_bill() {

				if (this.bill_type == 1) {
					this.isRenter = true;
					axios.post('/insert_rent_bill',{ all_rent: this.all_rent, month: this.selectedMonth }).then(res => {
						alert(res.data)
						if (res.data.length > 0)
							this.all_rent = res.data;
							this.get_all_rent();
					})
				} else {
					this.isRenter = false;
					axios.post('/insert_service_bill', {
						all_bill: this.all_bill,
						month: this.selectedMonth
					}).then(res => {
						alert(res.data)
						if (res.data.length > 0)
							this.all_bill = res.data;
						this.get_all_bill();
					})
				}

			}
		},
	})
</script>
<style>
	.table>tbody>tr>td{
		padding: 0px 7px !important;
	}

</style>