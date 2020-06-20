<div class="content" id="collection">
    <?php //echo validation_errors();
    ?>
    <?php //echo form_open('update_service');
    ?>
    <div class="row" id="floor_unit">
    <h4>Bill collection</h4>
        <div class="form-group col-sm-12 col-xs-12">
            <?php echo $this->session->flashdata('msg');
            ?>
        </div>
        <div class="form-group col-sm-3 col-xs-6">
        <option value="">Select Floor</option>
            <select name="" id="" class="filter-make filter form-control" required v-model="selectedFloor" @change="getUnits">
                <option :value="floor.id" v-for="floor in floors">{{floor.floor_name}}</option>
            </select>
        </div>
        <div class="form-group col-sm-3 col-xs-6">
        <option value="unit_id">Select Unit</option>
            <select name="unit_id" id="" @change="service_bill_collection_by_unit" class="filter-make filter form-control" required v-model="selectedUnit">
               
                <option :value="unit.id" v-for="unit in units">{{unit.unit_name}}</option>
            </select>
        </div>
        <div class="form-group col-sm-2 col-xs-6">
        <option>Bill Type </option>
            <select class="form-control" v-on:change="onChangeBillType" v-model="bill_type" required>
              
                <option value="1">Rent</option>
                <option value="2">Service</option>
            </select>
        </div>
        <!-- <div v-if="isRenter" class="form-group col-sm-2 col-xs-6">
            <button type="button" class="btn-secondary m-0">{{ rentData.ownar_name }}</button>
        </div>
        <div v-else class="form-group col-sm-2 col-xs-6">
            <button type="button" class="btn-secondary m-0">{{ serviceData.resident_name }}</button>
        </div> -->
        <div class="form-group col-sm-2 col-xs-6">
            <!-- <button type="button" class="btn btn-success m-0">View </button> -->
        </div>
        <table v-if="isRenter" id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
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
                    <th>
                        <span v-on:click="update_rent(rent.id)" class="btn btn-danger ">Collated</span>
                    </th>
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
                    <th>{{ service.total_bill_amount }}</th>
                    <th>
                        <span v-on:click="update_service(service.id)" class="btn btn-danger ">Collated</span>
                    </th>
                </tr>

            </tbody>




            <!-- <a style="cursor:pointer" onclick="window.open('<?php //echo base_url(); 
                                                                    ?>service_bill_print', 'newwindow', `width=${screen.width}, height=${screen.height}`); return false;">
                <i class="fa fa-print" style="font-size:24px;color:green"></i></a> -->

        </table>

    </div>
    <?php //echo form_close()
    ?>

</div>


<script src="<?php echo base_url() ?>/assets/js/vue/vue.js"></script>
<script src="<?php echo base_url() ?>/assets/js/vue/axios.min.js"></script>
<script src="<?php echo base_url() ?>/assets/js/vue/vue-select.min.js"></script>


<script>
    Vue.component('v-select', VueSelect.VueSelect);
    new Vue({
        el: '#collection',
        data() {
            return {
                isRenter: false,
                bill_type: '',
                floors: [],
                selectedFloor: null,
                units: [],
                selectedUnit: null,
                renters: [],
                rentData:[],
                selectRent: null,
                services: [],
                serviceData: [],
                selectedService: null
            }
        },
        created() {
            this.get_floor();
            this.getUnits();

        },
        methods: {
            onChangeBillType() {
                if (this.bill_type == 1) {
                    this.isRenter = true;
                    this.rent_bill_collection_by_unit();
                    this.clearData();
                } else {
                    this.isRenter = false;
                    this.service_bill_collection_by_unit();
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
                if (this.selectedUnit == null) {
                    return "Empty"
                }
                axios.post("/select_lest_bill_entry", {
                    unit_id: this.selectedUnit
                }).then(res => {
                    if (res.data.length > 0)
                        this.serviceData = res.data;
                })

            },
            rent_bill_collection_by_unit() {
                if (this.selectedUnit == null) {
                    return "Empty";
                }
                axios.post("/select_lest_rent_entry", {
                    unit_id: this.selectedUnit
                }).then(res => {
                    if (res.data.length > 0)
                        this.rentData = res.data;
                })
            },
            update_service(id) {


                axios.post("/update_service", {id: id}).then(res => {
                    this.id = res.data;
                })   
                this.clearData();               
            },
            update_rent(id) {
                axios.post("/update_rent", {id: id}).then(res => {
                    this.id = res.data;
                })   
                this.clearData();            
            },
            clearData() {
                    this.rentData = {
                    },
                    this.serviceData = {
                    }
            }
        }
    })
</script>