<div class="content" id="floor_unit">

    <?php echo validation_errors();
    ?>
    <?php echo form_open('unit_bill_insert');
    ?>
    <div class="row">
        <div style="color:red;font-size:17px" class="form-group col-sm-12 col-xs-12">
            <?php echo $this->session->flashdata('msg');
            ?>
        </div>

        <div class="form-group col-sm-2 col-xs-6">
            <label>Select Type</label>
            <select data-filter="make" name="resident_id" class="filter-make filter form-control" required>
                <option value="1">As owner</option>
                <option value="2">As Renter</option>
            </select>
        </div>

        <div class="form-group col-sm-2 col-xs-6">
            <label>Select Month</label>
            <select name="service_month_id" class="filter-make filter form-control" required v-model="selectedMonth">
                <option :value="month.id" v-for="month in months">{{month.month_name}}</option>
            </select>
        </div>
        <div class="form-group col-sm-3 col-xs-6">
            <label>Select Floor</label>
            <select name="" id="" class="filter-make filter form-control" required v-model="selectedFloor" @change="getUnits">
                <option :value="floor.id" v-for="floor in floors">{{floor.floor_name}}</option>
            </select>
        </div>
        <div class="form-group col-sm-2 col-xs-6">
            <label>Select Unit</label>
            <select name="unit_id" id="" class="filter-make filter form-control" required v-model="selectedUnit">
                <option :value="unit.id" v-for="unit in units">{{unit.unit_name}}</option>
            </select>
        </div>
        <div class="col-sm-6 col-xs-6">
            <div class="form-group col-sm-12 col-xs-12">
                <label>১. মালিকদের কমন ফান্ড ও স্পেশাল ফান্ড</label>
            </div>
            <div class="form-group col-sm-12 col-xs-12">
                <label>২. সিকিউরিটি গার্ড ও জেনারেটর বিল</label>
            </div>
            <div class="form-group col-sm-12 col-xs-12">
                <label>৩. বিদ্যুৎ বিল</label>
            </div>
            <div class="form-group col-sm-12 col-xs-12">
                <label>৪. গ্যাস বিল</label>
            </div>
            <div class="form-group col-sm-12 col-xs-12">
                <label>৫. পানি বিল</label>
            </div>
            <div class="form-group col-sm-12 col-xs-12">
                <label>৬. কমিউনিটি পুলিশ ও ক্লিনার্স বিল</label>
            </div>
            <div class="form-group col-sm-12 col-xs-12">
                <label>৭. কমন বিল ও সার্ভিস চার্জ</label>
            </div>
            <div class="form-group col-sm-12 col-xs-12">
                <label>৮. অন্যান্য বিল/বকেয়া বিল/ঈদ বোনাস</label>
            </div>
        </div>
        <div class="col-sm-6 col-xs-6">
            <div class="form-group col-sm-4 col-xs-6">
                <input type="text" name="owner_fund" required></input>
            </div>
            <div class="form-group col-sm-4 col-xs-6">
                <input type="text" name="security_generator" required></input>
            </div>
            <div class="form-group col-sm-4 col-xs-6">
                <input type="text" name="electricity_amount" required></input>
            </div>
            <div class="form-group col-sm-4 col-xs-6">
                <input type="text" name="gas_amount" required></input>
            </div>
            <div class="form-group col-sm-4 col-xs-6">
                <input type="text" name="water_amount" required></input>
            </div>
            <div class="form-group col-sm-4 col-xs-6">
                <input type="text" name="police_cleaners" required></input>
            </div>
            <div class="form-group col-sm-4 col-xs-6">
                <input type="text" name="common_service" required></input>
            </div>
            <div class="form-group col-sm-4 col-xs-6">
                <input type="text" name="fld_others" required></input>
            </div>
        </div>
        <button type="submit" name="submit" class="btn btn-success"> Submit</button>

    </div>
    <?php echo form_close()
    ?>
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
                months: [],
                selectedMonth: null,
                floors: [],
                selectedFloor: null,
                units: [],
                selectedUnit: null
            }
        },
        created() {
            this.get_floor();
            this.getUnits();
            this.get_month();

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
            get_month() {
                axios.get('/get_all_month').then(res => {
                    this.months = res.data;
                })
            }
        }
    })
</script>