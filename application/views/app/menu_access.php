<div class="content">
    <div class="row ">
        <div class="col-md-10">
            <br>
            <table class="table table-strupted">
                <thead>
                    <th>Name</th>
                    <th>Email</th>
                </thead>
                <tbody>
                    <tr>
                        <td v-model="id"><?php echo  $select_report->user_name;
                                            ?></td>
                        <td><?php echo  $select_report->email; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="" id="userAccess">
        <label style="font-size: 20px"> User Access</label>
        <div class="group">

            <ul>
                <li><input type="checkbox" class="access" value="ranter_register" v-model="access">Register From </li>
                <li><input type="checkbox" class="access" value="all_renter_list" v-model="access"> All Resident</li>
                <li><input type="checkbox" class="access" value="unit_bill_entry" v-model="access"> Unite bill Entry</li>
                <li><input type="checkbox" class="access" value="bill_entry" v-model="access"> All Bill Entry</li>
                <!-- <li><input type="checkbox" class="access" value="Report_collection" v-model="access"> Collection Report</li> -->
                <li><input type="checkbox" class="access" value="User_access" v-model="access"> User Access</li>
            </ul>
        <label style="font-size: 20px"> Account Access</label>
            <ul>
                <li><input type="checkbox" class="access" value="Service_collection" v-model="access"> Bill Collection</li>
                <li><input type="checkbox" class="access" value="Cash_transaction" v-model="access">Cash Transaction</li>
            </ul>
            <label style="font-size: 20px"> Setting Access</label>
            <ul>
                <li><input type="checkbox" class="access" value="floor_entry" v-model="access">Entry Floor </li>
                <li><input type="checkbox" class="access" value="unit_entry" v-model="access"> Unit Entry</li>
                <li><input type="checkbox" class="access" value="house_info" v-model="access"> Building Information</li>
                <li><input type="checkbox" class="access" value="month_entry" v-model="access"> Month Entry</li>
                <li><input type="checkbox" class="access" value="branch_access" v-model="access">Branch Access</li>

            </ul>
            <label style="font-size: 20px"> Report Access</label>
            <ul>
                <li><input type="checkbox" class="access" value="Report_collection" v-model="access">Bill Collection Report</li>
                <li><input type="checkbox" class="access" value="expense_report" v-model="access">Expense & Income report</li>
                <li><input type="checkbox" class="access" value="advance" v-model="access">Advance report</li>
                <li><input type="checkbox" class="access" value="all_expense_report" v-model="access">Total Expense & Income report</li>

            </ul>
            <label style="font-size: 20px"> Dashboard Access</label>
            <ul>
                <li><input type="checkbox" class="access" value="service" v-model="access">Show Service Bill</li>
               

            </ul>
            <button class="btn-success" type="button" @click="addUserAccess">Save</button>

        </div>
    </div>
</div>

<script src="<?php echo base_url() ?>/assets/js/vue/vue.js"></script>
<script src="<?php echo base_url() ?>/assets/js/vue/axios.min.js"></script>
<script src="<?php echo base_url() ?>/assets/js/vue/vue-select.min.js"></script>

<script>
    var app = new Vue({
        el: '#userAccess',
        data() {
            return {
                access: [],
                id: <?php echo $select_report->id; ?>

            }
        },
        created() {
            this.get_menu();
        },

        methods: {
            addUserAccess() {
                let data = {
                    access: this.access,
                    id: this.id
                }
                axios.post('/add_user_access', data).then(res => {
                    let r = res.data;
                    alert("Menu access operation successful.");
                }).catch(error=>{
                    alert("Operation failed !");
                })
            },
            get_menu(){
                axios.post("/get_menu", {
                    id: this.id
				}).then(res => {
					this.access = res.data[0].menu_name.split(',');
				})
            }
        } 

    })
</script>
<style>
    .btn {
        border-width: 2px;
        font-weight: 600;
        font-size: 11px;
        line-height: 1.35em;
        text-transform: uppercase;
        border: none;
        margin: 10px 1px;
        border-radius: 3px;
        padding: 7px 4px;
    }
</style>