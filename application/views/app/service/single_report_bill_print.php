<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.5.13/dist/vue.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<div class="content" id="app">
    <!-- <label>Bill type</label>

    <select class="form-control" v-on:change="onChangeBillType" v-model="bill_type" required>

        <option get_all_billing_info="1">Rent</option>
        <option get_all_billing_info="2">Service</option>
    </select> -->
    <!-- <?php
            // foreach ($get_all_billing_info as $get_all_billing_info) {
            ?> -->
    <div id="printPageButton" class="col-md-12" style="margin-top:15px;margin-bottom:15px;">
        <a href="" onclick="p()"><i class="fa fa-print"></i> Print</a>
    </div>
    <div class="table_head">
        <div class="text-center">
            <div class="header_title">
                <h4><?php echo $get_building_info->house_name; ?></h4>
                <span class="address">
                    <?php echo $get_building_info->house_description; ?>
                </span>
                <span class="charge"> মার্সিক সার্ভিস চার্জ বিল </span>
            </div>
            <div class="header_title">
                <div class="name_owner">
                    <span style="width: 100%;">ফ্ল্যাট মালিক/বাড়াটিয়ার নাম: <span style="border-bottom: 1px dotted;"><?php echo $get_all_billing_info->resident_name; ?></span></span>
                </div>
                <div class="month_flat">
                    <span style="width: 100%;">মাস : <span style="border-bottom: 1px dotted;"><?php echo $get_all_billing_info->month_name; ?></span></span>
                    <span style="width: 40%;">ফ্লাট নং: <span style="border-bottom: 1px dotted;"><?php echo $get_all_billing_info->unit_name; ?></span></span>
                </div>

            </div>

        </div>

        <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th style="font-weight: bold;">ক্র: নং</th>
                    <th style="font-weight: bold;">বিবরণ</th>
                    <th style="font-weight: bold;">টাকার পরিমান</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>১</th>
                    <th>মালিকদের কমন ফান্ড ও স্পেশাল ফান্ড</th>
                    <th><?php echo $get_all_billing_info->owner_fund ?> টাকা</th>
                </tr>
                <tr>
                    <th>২</th>
                    <th>সিকিউরিটি গার্ড ও জেনারেটর বিল</th>
                    <th><?php echo $get_all_billing_info->security_generator
                        ?> টাকা</th>
                </tr>
                <tr>
                    <th>৩</th>
                    <th>বিদ্যুৎ বিল</th>
                    <th><?php echo $get_all_billing_info->electricity_amount
                        ?> টাকা</th>
                </tr>
                <tr>
                    <th>৪</th>
                    <th>গ্যাস বিল</th>
                    <th><?php echo $get_all_billing_info->gas_amount
                        ?> টাকা</th>
                </tr>
                <tr>
                    <th>৫</th>
                    <th>পানি বিল</th>
                    <th><?php echo $get_all_billing_info->water_amount
                        ?> টাকা</th>
                </tr>
                <tr>
                    <th>৬</th>
                    <th>কমিউনিটি পুলিশ ও ক্লিনার্স বিল</th>
                    <th><?php echo $get_all_billing_info->police_cleaners
                        ?> টাকা</th>
                </tr>
                <tr>
                    <th>৭</th>
                    <th>কমন বিল ও সার্ভিস চার্জ</th>
                    <th><?php echo $get_all_billing_info->common_service
                        ?> টাকা</th>
                </tr>
                <tr>
                    <th>৮</th>
                    <th>অন্যান্য বিল/বকেয়া বিল/ঈদ বোনাস</th>
                    <th><?php echo $get_all_billing_info->fld_others ?> টাকা</th>
                </tr>
                <tr style="border-top:1px solid black">
                    <th>৯</th>
                    <th>সর্বমোট :</th>
                    <th><?php echo $get_all_billing_info->fld_total ?> টাকা</th>
                </tr>
                <tr>
                    <th>১০</th>
                    <th>অর্থ প্রদান :</th>
                    <th><?php echo $get_all_billing_info->paid_amount; ?> টাকা</th>
                </tr>
                <tr>
                    <th>১১</th>
                    <th>বাকি বা অগ্রিম :</th>
                    <th><?php echo $get_all_billing_info->due_amount; ?> টাকা</th>
                </tr>

            </tbody>
        </table>

    </div>
    <?php //}
    ?>
</div>

<script src="<?php echo base_url() ?>/assets/js/vue/vue.js"></script>
<script src="<?php echo base_url() ?>/assets/js/vue/axios.min.js"></script>
<script src="<?php echo base_url() ?>/assets/js/vue/vue-select.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/unit.js"></script>
<script>
    Vue.component('v-select', VueSelect.VueSelect);
    new Vue({
        el: '#app',
        data() {
            return {
                all_bill: {},
                service_bill: [],
                all_rent: {},
                bill_type: '',
                get_rent: [],
                isRenter: false
            }
        },
        created() {
            this.service_bill_collection_by_unit();
            this.rent_bill_collection_by_unit();

        },
        methods: {
            onChangeBillType() {
                if (this.bill_type == 1) {
                    this.isRenter = true;
                    this.service_bill_collection_by_unit();
                } else {
                    this.isRenter = false;
                    this.rent_bill_collection_by_unit();
                }

            },
            service_bill_collection_by_unit() {
                axios.get("/print_service_bills").then(res => {
                    if (res.data.length > 0)
                        this.serviceData = res.data;
                })

            },
            rent_bill_collection_by_unit() {
                axios.get("/print_rent_bills").then(res => {
                    if (res.data.length > 0)
                        this.rentData = res.data;

                })
            },
        }
    })
</script>
<script>
    function p() {
        window.print();
    }
</script>

<style>
    @media print {
        #printPageButton {
            display: none;
        }
    }

    th {
        font-weight: normal;
        border: 1px solid black;
        FONT-SIZE: 10PX;
        text-align: left;

    }
    p{
        padding: 7px 0 5px;
    }

    .header_title {
        text-align: center;
        margin-bottom: 2px;
    }

    .header_title h4 {
        text-align: center;
        margin-bottom: 0px;
    }

    .table_head {
        width: 99%;
        float: left;
        margin: 0px 6px;
    }

    .name_owner span {
        font-size: 12px;
    }

    .month_flat span {
        font-size: 12px;
    }

    .address {
        line-height: 0px;
        font-size: 10px;

    }

    .charge {
        background-color: black;
        color: white;
        border: 2px solid black;
        font-size: 10px;
        border-radius: 30px;
    }
</style>