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
        <div class="row"  v-bind:style="{display: reports != ''? '' : 'none'}">
            <div class="col-md-12" style="margin-top:15px;margin-bottom:15px;">
                <a href="" @click.prevent="print"><i class="fa fa-print"></i> Print</a>
            </div>
            <div class="col-md-12">
                <div class="table-responsive" id="printContent">
                    <table class="table table-bordered table-condensed"  >
                        <thead>
                            <tr>
                                <th>Tr. Id</th>
                                <th>service Due amount</th>
                                <th>service Paid amount </th>
                                <th>Total Expense Amount</th>
                                <th>Total Service Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr >
                                <td>{{ 1 }}</td>
                                <!-- <td>{{ transaction.date }}</td> -->

                                <td>{{ reports.due }}</td>
                                <td>{{ reports.paid }}</td>
                                <td style="text-align:right;">{{ reports.expense }}</td>
                                <td style="text-align:right;">{{ reports.service }}</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4" style="text-align:right;font-weight:bold;">Total</td>
                                <td style="text-align:right;font-weight:bold;">{{reports.expense - reports.service}}</td>
                                <!-- <td style="text-align:right;font-weight:bold;">{{ transactions.reduce((p, c) => { return p + parseFloat(c.Out_Amount) }, 0) }}</td> -->
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="display:none;padding-top: 15px;">
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
                    dateFrom: moment().format('YYYY-MM-DD'),
                    dateTo: moment().format('YYYY-MM-DD')
                },
                reports: []
            }
        },
        created() {
    

        },
        methods: {
            
            getTransactions() {
                
                axios.post('/get_all_transaction', this.filter).then(res => {
                    this.reports = res.data;
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