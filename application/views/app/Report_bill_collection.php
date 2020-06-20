<div class="content" id="collection">
    <h3 style="margin: 0px">Bill Collection Report</h3>
    <div class="row" id="floor_unit">
        <div class="form-group col-sm-12 col-xs-12">
            <?php //echo $this->session->flashdata('msg');
            ?>
        </div>

        <div class="form-group col-sm-3 col-xs-6">
            <option value="">Select Month</option>
            <select name="" id="" class="filter-make filter form-control" required v-model="selectedMonth">
                <option :value="month.id" v-for="month in months">{{month.month_name}}</option>
            </select>
        </div>
        <div class="form-group col-sm-3 col-xs-6">
            <option value="">Select Floor</option>
            <select name="" id="" class="filter-make filter form-control" required v-model="selectedFloor">

                <option :value="floor.id" v-for="floor in floors">{{floor.floor_name}}</option>
            </select>
        </div>
        <!-- <div class="form-group col-sm-3 col-xs-6">
        <option value="unit_id">Select Unit</option>
            <select name="unit_id" id="" @change="service_bill_collection_by_unit" class="filter-make filter form-control" required v-model="selectedUnit">
                <option :value="unit.id" v-for="unit in units">{{unit.unit_name}}</option>
            </select>
        </div> -->
        <div class="form-group col-sm-2 col-xs-6">
            <option>Bill type</option>
            <select class="form-control" v-on:change="onChangeBillType" v-model="bill_type" required>
                <option value="1">Rent</option>
                <option value="2">Service</option>

            </select>
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
                    <th>Total</th>

                </tr>
            </thead>
            <tbody>
                <tr v-for="rentDatas in rentData">
                    <th>{{ rentDatas.u_id }}</th>
                    <th>{{ rentDatas.ownar_name }}</th>
                    <th>{{ rentDatas.month_name }}</th>
                    <th>{{ rentDatas.collection_date }}</th>
                    <th>{{ rentDatas.unit_name }}</th>
                    <th>{{ rentDatas.fld_total }}</th>
                    <th>
                        <a style="cursor:pointer" @click="prints(rentDatas.id)">
                            <i class="fa fa-print" style="font-size:24px;color:green"></i></a>
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
                    <th>print</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="serviceDatas in serviceData">
                    <th v-if="serviceDatas.r_id == ''">{{ serviceDatas.r_id }}</th>
                    <th v-else>Owner</th>
                    <th>{{ serviceDatas.resident_name }}</th>
                    <th>{{ serviceDatas.month_name }}</th>
                    <th>{{ serviceDatas.entry_date }}</th>
                    <th>{{ serviceDatas.unit_name }}</th>
                    <th>{{ serviceDatas.fld_total }}</th>
                    <th>
                        <a style="cursor:pointer; display:none;" v-bind:style="{display: serviceDatas.r_id == '' ? '' : 'none'}" @click="print(serviceDatas.id)">
                            <i class="fa fa-print" style="font-size:24px;color:green"></i></a>
                        <a style="cursor:pointer; display:none;" v-bind:style="{display: serviceDatas.r_id == '' ? 'none' : ''}" @click="print(serviceDatas.id)">
                            <i class="fa fa-print" style="font-size:24px;color:green"></i></a>
                    </th>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<script src="<?php echo base_url() ?>assets/js/vue/vue.js"></script>
<script src="<?php echo base_url() ?>assets/js/vue/axios.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/vue/vue-select.min.js"></script>
<script>
    Vue.component('v-select', VueSelect.VueSelect);
    new Vue({
        el: '#collection',
        data() {
            return {
                isRenter: false,
                bill_type: '',
                months: [],
                selectedMonth: null,
                floors: [],
                selectedFloor: null,
                units: [],
                selectedUnit: null,
                renters: [],
                rentData: {
                    ownar_name: null,
                },
                services: [],
                serviceData: {
                    resident_name: null,
                }

            }
        },
        created() {
            this.get_month();
            this.get_floor();
            // this.getUnits();
            this.clearData();


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
            get_month() {
                axios.get('/get_all_month').then(res => {
                    this.months = res.data;
                })

            },
            get_floor() {
                axios.get('/get_floor', {
                    monthId: this.selectedMonth
                }).then(res => {
                    this.floors = res.data;
                })
                this.service_bill_collection_by_unit();
                this.clearData();
            },
            // getUnits() {
            //     if (this.selectedFloor == null) {
            //         return;
            //     }
            //     axios.post("/get_units", {
            //         floorId: this.selectedFloor,
            //         monthId: this.selectedMonth
            //     }).then(res => {
            //         this.units = res.data;
            //     })
            //     this.clearData();

            // },
            service_bill_collection_by_unit() {
                if (this.selectedFloor == null) {
                    return;
                }
                axios.post("/select_all_bill_entry", {
                    floorId: this.selectedFloor,
                    monthId: this.selectedMonth
                }).then(res => {
                    if (res.data.length > 0)
                        this.serviceData = res.data;
                })
            },
            rent_bill_collection_by_unit() {
                if (this.selectedFloor == null) {
                    return "Empty";
                }
                axios.post("/select_all_rent_entry", {
                    floorId: this.selectedFloor,
                    monthId: this.selectedMonth
                }).then(res => {
                    if (res.data.length > 0)
                        this.rentData = res.data;
                })
            },
            print_service() {
                axios.post("/print_service", {
                    id: this.selectedUnit
                }).then(res => {
                    this.id = res.data[0];
                })
            },
            print_rent() {
                axios.post("/print_rent", {
                    id: this.selectedUnit
                }).then(res => {
                    this.id = res.data[0];
                })
            },
            clearData() {
                this.rentData = {},
                    this.serviceData = {}
            },

            print(id) {
                let printWindow = window.open(`<?php echo base_url(); ?>single_report_bill_print/${id}`, 'newWindow', `width=${screen.width}, height=${screen.height}`);
                printWindow.focus();
            },
            prints(id) {
                let printWindow = window.open(`<?php echo base_url(); ?>single_report_rent_print/${id}`, 'newWindow', `width=${screen.width}, height=${screen.height}`);
                printWindow.focus();
            }

        }
    })
</script>