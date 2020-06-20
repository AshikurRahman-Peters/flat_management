<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.5.13/dist/vue.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<div class="content" id="app">
    <!-- <label>Bill type</label>

    <select class="form-control" v-on:change="onChangeBillType" v-model="bill_type" required>

        <option value="1">Rent</option>
        <option value="2">Service</option>
    </select> -->

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
                <span class="charge"> বাসাভাড়ার রশিদ </span>
            </div>
            <div class="header_title">
                <div class="name_owner">
                    <span style="width: 100%;">ফ্ল্যাট মালিক/বাড়াটিয়ার নাম: <span style="border-bottom: 1px dotted;"><?php echo $get_all_rent_info->ownar_name; ?></span>
                </div>
                <div class="month_flat">
                    <span style="width: 100%;">মাস : <span style="border-bottom: 1px dotted;"><?php echo $get_all_rent_info->month_name; ?></span>
                        <span style="width: 40%;">ফ্লাট নং: <span style="border-bottom: 1px dotted;"><?php echo $get_all_rent_info->unit_name; ?></span>
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
                    <th>বাসাভাড়া</th>
                    <th><?php echo $get_all_rent_info->rent_amount; ?> টাকা</th>
                </tr>
                <tr>
                    <th>২</th>
                    <th>গেরেজ ভাড়া</th>
                    <th><?php echo $get_all_rent_info->fld_garage; ?> টাকা</th>
                </tr>
                <tr>
                    <th>৩</th>
                    <th>অন্যান্য</th>
                    <th><?php echo $get_all_rent_info->fld_others; ?> টাকা</th>
                </tr>
                <tr>
                <tr>
                    <th>৪</th>
                    <th>সর্বমোট :</th>
                    <th><?php echo $get_all_rent_info->fld_total; ?> টাকা</th>
                </tr>
                <tr>
                    <th>৫</th>
                    <th>অর্থ প্রদান :</th>
                    <th><?php echo $get_all_rent_info->paid_amount; ?> টাকা</th>
                </tr>
                <tr>
                    <th>৬</th>
                    <th>বাকি বা অগ্রিম :</th>
                    <th><?php echo $get_all_rent_info->due_amount; ?> টাকা</th>
                </tr>

            </tbody>
        </table>

    </div>

</div>
<script src="<?php echo base_url() ?>/assets/js/vue/vue.js"></script>
<script src="<?php echo base_url() ?>/assets/js/vue/axios.min.js"></script>
<script src="<?php echo base_url() ?>/assets/js/vue/vue-select.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/unit.js"></script>

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
    p{
        padding: 7px 0 5px;
    }
    th {
        font-weight: normal;
        border: 1px solid black;
        FONT-SIZE: 10PX;
        text-align: left;

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