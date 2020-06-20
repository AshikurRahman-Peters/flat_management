<style>
    .v-select {
        margin-top: -2.5px;
        float: right;
        min-width: 180px;
        margin-left: 5px;
    }

    .v-select .dropdown-toggle {
        padding: 0px;
        height: 25px;
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

    #searchForm select {
        padding: 0;
        border-radius: 4px;
    }

    #searchForm .form-group {
        margin-right: 5px;
    }

    #searchForm * {
        font-size: 13px;
    }
</style>
<div id="cashTransactionReport" class="content">
    <div class="row" style="border-bottom: 1px solid #ccc;padding: 3px 0;">
        <div class="col-md-12">
            <form class="form-inline" id="searchForm" @submit.prevent="getTransactions">
                <div class="form-group">
                    <label>Transaction Type</label>
                    <select class="form-control" v-model="filter.transactionType">
                        <option value="received">Received</option>
                        <option value="paid">Payment</option>
                    </select>
                </div>


                <div class="form-group" style="display:none;" v-bind:style="{display: filter.transactionType == 'paid' ? '' : 'none'}">

                    <label>Accounts</label>
                    <select class="form-control" v-model="filter.id">
                        <option :value="expense.id" v-for="expense in accounts">{{expense.expense_name}}</option>
                    </select>
                </div>

                <div class="form-group" style="display:none;" v-bind:style="{display: filter.transactionType == 'received' ? '' : 'none'}">
                    <label>Type</label>
                    <select class="form-control" v-model="filter.type">
                        <option value="service">Service</option>
                        <option value="rent">Rent</option>
                    </select>
                </div>

                <div class="form-group" style="display:none;" v-bind:style="{display: filter.transactionType == 'received' ? '' : 'none'}">

                    <label>Floor</label>
                    <select class="form-control" v-model="filter.floor_id">
                        <option :value="floor.id" v-for="floor in floors">{{floor.floor_name}}</option>
                    </select>
                </div>

                <div class="form-group">
                    <input type="date" class="form-control" v-model="filter.dateFrom">
                </div>

                <div class="form-group">
                    <input type="date" class="form-control" v-model="filter.dateTo">
                </div>

                <div class="form-group" style="margin-top: -5px;">
                    <input type="submit" value="Search">
                </div>
            </form>
        </div>
    </div>
    <div>
        <div class="row" style="display:none;" v-bind:style="{display: transactions.length > 0 ? '' : 'none'}">
            <div class="col-md-12" style="margin-top:15px;margin-bottom:15px;">
                <a href="" @click.prevent="print"><i class="fa fa-print"></i> Print</a>
            </div>
            <div class="col-md-12">
                <div class="table-responsive" id="printContent">
                    <table class="table table-bordered table-condensed" style="display:none;" v-bind:style="{display: filter.transactionType == 'paid' ? '' : 'none'}">
                        <thead>
                            <tr>
                                <th>Tr. Id</th>
                                <th>Date</th>
                                <th>Account Name</th>
                                <th>Description</th>
                                <th>Paid Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(transaction,index) in transactions">
                                <td>{{ index }}</td>
                                <td>{{ transaction.date }}</td>

                                <td>{{ transaction.expense_name }}</td>
                                <td>{{ transaction.description }}</td>
                                <td style="text-align:right;">{{ transaction.taka }}</td>
                                <!-- <td style="text-align:right;">{{ transaction.Out_Amount }}</td> -->
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4" style="text-align:right;font-weight:bold;">Total</td>
                                <td style="text-align:right;font-weight:bold;">{{ transactions.reduce((p, c) => { return p + parseFloat(c.taka) }, 0) }}</td>
                                <!-- <td style="text-align:right;font-weight:bold;">{{ transactions.reduce((p, c) => { return p + parseFloat(c.Out_Amount) }, 0) }}</td> -->
                            </tr>
                        </tfoot>
                    </table>


                    <table class="table table-bordered table-condensed" style="display:none;" v-bind:style="{display: filter.transactionType == 'received' ? '' : 'none'}">
                        <thead>
                            <tr>
                                <th>Tr. Id</th>
                                <th>Date</th>
                                <th>Resident Name</th>
                                <th>Bill Type</th>
                                <th>Unit Name</th>
                                <th>Due Amount</th>
                                <th>Received Amount</th>
                                <th>Total Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(transaction, index) in transactions">
                                <td>{{ index }}</td>
                                <td>{{ transaction.collection_date }}</td>
                                <td>{{ transaction.ownar_name }}</td>
                                <td v-bind:style="{display: filter.type == 'service' ? '' : 'none'}">Service</td>
                                <td v-bind:style="{display: filter.type == 'rent' ? '' : 'none'}">Rent</td>
                                <td>{{ transaction.unit_name }}</td>
                                <td style="text-align:right;"> {{ transaction.due_amount }}{{ transaction.due_amount > 0 ? ' Advance' : ' Due'}}</td>
                                <td style="text-align:right;" >{{ transaction.paid_amount }}</td>
                                <td style="text-align:right;" >{{ transaction.fld_total }}</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="6" style="text-align:right;font-weight:bold;">Total</td>
                                <td style="text-align:right;font-weight:bold;">{{ transactions.reduce((r, e) => { return r + parseFloat(e.paid_amount) }, 0) }}</td>
                                <td style="text-align:right;font-weight:bold;">{{ transactions.reduce((p, c) => { return p + parseFloat(c.fld_total) }, 0) }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="display:none;padding-top: 15px;" v-bind:style="{display: transactions.length > 0 ? 'none' : ''}">
        <div class="col-md-12 text-center">
            No records found
        </div>
    </div>
</div>

<script src="<?php echo base_url(); ?>assets/js/vue/vue.js"></script>
<script src="<?php echo base_url(); ?>assets/js/vue/axios.js"></script>
<script src="<?php echo base_url(); ?>assets/js/vue/vuejs-datatable.js"></script>
<script src="<?php echo base_url(); ?>assets/js/vue/vue-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

<script>
    Vue.component('v-select', VueSelect.VueSelect);
    new Vue({
        el: '#cashTransactionReport',
        data() {
            return {
                filter: {
                    transactionType: '',
                    accountId: null,
                    type: null,
                    floor_id: null,
                    id: null,
                    dateFrom: moment().format('YYYY-MM-DD'),
                    dateTo: moment().format('YYYY-MM-DD')
                },
                accounts: [],
                account: {
                    expense_detail: null
                },
                biiType: {
                    type: null
                },
                floors: [],
                selectedAccount: null,
                transactions: [],
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
            this.getAccounts();
            this.getFloor();
            // this.getTransactions();

        },
        methods: {
         
            onChangeBillType() {
                if (this.bill_type == 1) {
                    this.isRenter = true;
                    this.rent_bill_collection_by_unit();
                    location.reload();
                } else {
                    this.isRenter = false;
                    this.service_bill_collection_by_unit();
                    location.reload();
                }
            },
            getAccounts() {
                axios.get('/get_expense_name').then(res => {
                    this.accounts = res.data;
                })
                this.ClearData();
            },
            getFloor() {
                axios.get('/get_Floor').then(res => {

                    this.floors = res.data;
                })
            },
            onChangeAccount() {
                if (this.selectedAccount == null || this.selectedAccount.id == undefined) {
                    this.filter.accountId = null;
                    return;
                }
                this.filter.accountId = this.selectedAccount.Acc_SlNo;
            },

            getTransactions() {
                this.transactions = [];

                axios.post('/get_all_receive_data', this.filter).then(res => {
                    this.transactions = res.data;
                })
            },
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
            ClearData(){
                filter= {
                    transactionType: '',
                    accountId: null,
                    type: null,
                    floor_id: null,
                    id: null,
                    dateFrom: moment().format('YYYY-MM-DD'),
                    dateTo: moment().format('YYYY-MM-DD')
                }
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

            async print() {
                let printWindow = window.open('', '', `width=${screen.width}, height=${screen.height}`);
                printWindow.document.write(`
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" />
                    <link href="<?php echo base_url(); ?>assets/css/paper-dashboard.min790f.css?v=2.0.1" rel="stylesheet" />
                    <title>Document</title>
                </head>
                <body>
                <?php $query = $this->db->query("SELECT * FROM tbl_building_inf")->row(); ?>
                <div class="container">
                        <div class="text-center">
                        <div class="header_title">
                            <h4><?php echo $query->house_name; ?></h4>
                            <span class="address">
                                <?php echo $query->house_description; ?>
                            </span>
                        </div>
                    </div>
                          <h4 style="text-align:center">Cash Transaction Report</h4 style="text-align:center">
                      
                              ${document.querySelector('#printContent').innerHTML}
                        
                      </div> 
                </body>
                </html>
              
                  `);

                printWindow.document.innerHTML;
                printWindow.focus();
                await new Promise(r => setTimeout(r, 1000));
                printWindow.print();
                printWindow.close();
            }
        }
    })
</script>