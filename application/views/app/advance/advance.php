<div class="widget-box content" id="advanceTransaction">
    <div class="widget-body" id="list">
        <div class="widget-main">
            <div class="row">
                <div class="col-md-12">

                    <div id="accountsTable" class="table-responsive">
                        <div class="content">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="widget-header">
                                            <h4 class="widget-title">Advance List</h4>
                                        </div>
                                    </div>
                                    <div class="col-md-12" style="margin-top:15px;margin-bottom:15px;">
                                        <a href="" @click.prevent="print"><i class="fa fa-print"></i> Print</a>
                                    </div>
                                    <div class="card-body" id="printContent">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="<?php echo base_url(); ?>assets/js/vue/vue.js"></script>
<script src="<?php echo base_url(); ?>assets/js/vue/axios.js"></script>
<script src="<?php echo base_url(); ?>assets/js/vue/vuejs-datatable.js"></script>
<script src="<?php echo base_url(); ?>assets/js/vue/vue-select.min.js"></script>
<script>
    Vue.component('v-select', VueSelect.VueSelect);
    new Vue({
        el: '#advanceTransaction',
        data() {
            return {
                Advances: []
            }
        },
        created() {
            this.get_advance();
        },
        methods: {
            get_advance() {
                axios.get("/get_advance").then(res => {
                    this.Advances = res.data;
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
                          <h4 style="text-align:center">Building Advance Report</h4 style="text-align:center">
                      
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