<style>
    .btn.btn-icon.btn-sm .fa {
        font-size: 20px;
    }

    input {
        margin-bottom: 10px;
    }
</style>
<div class="content" id="floor_unit">
    <!-- <div class="row" id="filter">
        <?php //echo validation_errors();
        ?>
        <div class="form-group col-sm-12 col-xs-12">
            <?php //echo $this->session->flashdata('msg');
            ?>
        </div>
        <?php //echo form_open('unit_insert');
        ?> -->
    <form method="POST" @submit.prevent="insertUnits">
        <div class="form-group row">
        <label class="">Select Floor</label>
            <select  placeholder="Enter Floor" data-filter="model" v-model="unit_detail.floor_id" class="filter-model col-sm-4 col-md-4 filter form-control">
                <?php foreach ($all_Floor_name as $value) { ?>
                    <option  placeholder="Enter Floor" value="<?php echo $value->id; ?>" required> <?php echo $value->floor_name; ?></option>
                <?php } ?>
            </select>
            <label>Select Month</label>
			<select  class="filter-make col-sm-3 col-md-4 filter form-control" required v-model="rent_bill.id">
				<option :value="month.id" v-for="month in months"> {{month.month_name}} </option>
			</select>
            <label class="p-1">Entry Unit Information : </label>
        </div>

        <div class="form-group row p-2">
            <div class="col-sm-6 col-md-6">
                <input type="input" v-model="unit_detail.unit_name" placeholder="ইউনিট নাম" required></input>
                <input type="input" v-model="unit_detail.ownar_name" placeholder="মালিকের নাম" required></input>
                <input type="input" v-model="unit_detail.fathers_name" placeholder="বাবার নাম" ></input>
                <input type="input" v-model="unit_detail.fld_address" placeholder="ঠিকানা" required></input>
                <input type="email" v-model="unit_detail.fld_email" placeholder="ই-মেইল" required></input>
                <input type="phone" v-model="unit_detail.phone_number" placeholder="ফোন নম্বর" required></input>
            </div>
            <div class=" col-sm-6 col-md-6">
                <input type="Number" v-model="rent_bill.rent_amount" placeholder="বাসা ভাড়া" ></input>
                <input type="Number" v-model="rent_bill.fld_garage" placeholder="গেরেজ ভাড়া" ></input>
                <input type="Number" v-model="rent_bill.fld_others" placeholder="অন্যান্য" ></input>

            </div>
            <button style="margin:0px; padding:7px" type="submit" class="btn btn-success mt-3 ml-3"> Submit</button>
        </div>
    </form>
    <!-- <?php //echo form_close()
            ?> -->


    <div class="row">
        <div class="col-md-12">
            <div class="form-group row main_from">
                <label for="inputPassword" class="col-sm-4 col-md-6 col-form-label">Select Floor</label>
                <div class="col-sm-12 col-md-12 p-0">

                    <select name="" id="" class="col-sm-4 filter form-control" required v-model="selectedFloor" @change="getUnits">
                        <option value="">Select Floor</option>
                        <option :value="floor.id" v-for="floor in floors" placeholder="Select Floor">{{floor.floor_name}}</option>
                    </select>
                    <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Unit Name</th>
                                <th>Owner Name</th>
                                <th>Fathers Name</th>
                                <th>Address</th>
                                <th>E-mail</th>
                                <th>Phone Number</th>
                                <th class="disabled-sorting text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody :value="unit.floor_id" v-for="unit in units">
                            <tr>
                                <td>{{unit.unit_name}}</td>
                                <td> {{unit.ownar_name}}</td>
                                <td>{{unit.fathers_name}}</td>
                                <td>{{unit.fld_address}}</td>
                                <td>{{unit.fld_email}}</td>
                                <td>{{unit.phone_number}}</td>
                                <td class="text-right">
                                    <!-- <a href="#" class="btn btn-info btn-link btn-icon btn-sm like"><i class="fa fa-heart"></i></a> -->
                                    <a @click="edit_unit_detail(unit)" class="btn btn-warning btn-link btn-icon btn-sm edit"><i class="fa fa-edit"></i></a>
                                    <a  @click="deleteUnit(unit.id)" class="btn btn-danger btn-link btn-icon btn-sm remove"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<script src="<?php echo base_url() ?>/assets/js/vue/vue.js"></script>
<script src="<?php echo base_url() ?>/assets/js/vue/axios.min.js"></script>
<script src="<?php echo base_url() ?>/assets/js/vue/vue-select.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/unit.js"></script>

<script>
    Vue.component('v-select', VueSelect.VueSelect);
    new Vue({
        el: '#floor_unit',
        data() {
            return {
                months: [],
				selectedMonth: null,
                floors: [],
                selectedFloor: null,
                units: [],
                selectedUnit: null,
                unit_detail: {
                    id: 0,
                    floor_id: null,
                    unit_name: null,
                    ownar_name: null,
                    fathers_name: null,
                    fld_address: null,
                    fld_email: null,
                    phone_number: null

                },
                unit_details: [],
                rent_bill: {
                    rent_amount: null,
                    fld_garage: null,
                    fld_others: null,
                    id:null
                },
                rent_bills: []

            }
        },
        created() {
            this.get_floor();
            this.getUnits();
            this.get_months();
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
                 event.target.reset();

            },
            get_months() {
				axios.get('/get_all_month').then(res => {
					this.months = res.data;
				})
			},
            insertUnits() {
                if (this.rent_bill == null) {
                    alert('filed not be empty');
                    return;
                }

                let data = {
                    unit_details: this.unit_detail,
                    rent_bills: this.rent_bill
                }
                // let allData = new FormData();
                // allData.append('data', JSON.stringify(data));
                    url = '/unit_insert';
                if( this.unit_detail == ''){
					url = '/edit_unit_detail';
				}
                axios.post(url, data ).then(res => {
                    this.member = res.data;
                })
             
                this.clearUnitForm();
            },
            clearUnitForm(){
               this.unit_detail= {
                    floor_id: null,
                    unit_name: null,
                    ownar_name: null,
                    fathers_name: null,
                    fld_address: null,
                    fld_email: null,
                    phone_number: null
                },
               this.rent_bill={
                    rent_amount: null,
                    fld_garage: null,
                    fld_others: null
                }

            },
            get_unit() {
            	if (this.selectedFloor.id == '') {
            		return;
            	}
            	axios.post('/get_unit', {
            		id: this.selectedFloor.id
            	}).then(res => {
            		this.unit = res.data;
            	})
            },
            edit_unit_detail(unit_detail, rent_bill){
				let keys = Object.keys(this.unit_detail, this.rent_bill);
				keys.forEach(key => {
					this.unit_detail[key] = unit_detail[key];
					this.rent_bill[key] = this.rent_bill[key];
                })
            },
            deleteUnit(id){
                let deleteConfirm = confirm('Are you sure?');
				if(deleteConfirm == false){
					return;
                }
                axios.post('/delete_unit', {unit_id: id}).then(res => {
					let r = res.data;
					alert(r.message);
					if(r.success){
						
					}
				})
            }

        }
    })
</script>