
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous"><link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.5.13/dist/vue.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link href="  https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css
" rel="stylesheet" />

<div class="content" id="app">
    <!-- <label>Bill type</label>

    <select class="form-control" v-on:change="onChangeBillType" v-model="bill_type" required>

        <option value="1">Rent</option>
        <option value="2">Service</option>
    </select> -->
    <div id="printPageButton" class="col-md-12" style="margin-top:15px;margin-bottom:15px;">
  	<a href="" onclick="p()"><i class="fa fa-print"></i> Print</a>
  </div>

        <?php
    foreach ($get_all_service_info as $value) {
    ?>
        
        <div class="table_head pb-5" >
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
                        <span style="width: 100%;">ফ্ল্যাট মালিক/বাড়াটিয়ার নাম: <span style="border-bottom: 1px dotted;"><?php echo $value->resident_name; ?></span></span>
                    </div>
                    <div class="month_flat">
                        <span style="width: 100%;">মাস : <span style="border-bottom: 1px dotted;"><?php echo $value->month_name; ?></span></span>
                        <span style="width: 40%;">ফ্লাট নং: <span style="border-bottom: 1px dotted;"><?php echo $value->unit_name; ?></span></span>
                    </div>

                </div>

            </div>

            <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th style="font-weight: bold;">ক্র: নং</th>
                        <th style="font-weight: bold;">বিবরণ</th>
                        <th style="font-weight: bold;">টাকা</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>১</th>
                        <th>মালিকদের কমন ফান্ড ও স্পেশাল ফান্ড</th>
                        <th><?php echo $value->owner_fund?></th>
                    </tr>
                    <tr>
                        <th>২</th>
                        <th>সিকিউরিটি গার্ড ও জেনারেটর বিল</th>
                        <th><?php echo $value->security_generator
                            ?></th>
                    </tr>
                    <tr>
                        <th>৩</th>
                        <th>বিদ্যুৎ বিল</th>
                        <th><?php echo $value->electricity_amount
                            ?></th>
                    </tr>
                    <tr>
                        <th>৪</th>
                        <th>গ্যাস বিল</th>
                        <th><?php echo $value->gas_amount
                            ?></th>
                    </tr>
                    <tr>
                        <th>৫</th>
                        <th>পানি বিল</th>
                        <th><?php echo $value->water_amount
                            ?></th>
                    </tr>
                    <tr>
                        <th>৬</th>
                        <th>কমিউনিটি পুলিশ ও ক্লিনার্স বিল</th>
                        <th><?php echo $value->police_cleaners
                            ?></th>
                    </tr>
                    <tr>
                        <th>৭</th>
                        <th>কমন বিল ও সার্ভিস চার্জ</th>
                        <th><?php echo $value->common_service
                            ?></th>
                    </tr>
                    <tr>
                        <th>৮</th>
                        <th>অন্যান্য বিল/বকেয়া বিল/ঈদ বোনাস</th>
                        <th><?php echo $value->fld_others ?></th>
                    </tr>
                    <tr>
                        <th>৯</th>
                        <th>সর্বমোট :</th>
                        <th><?php echo $value->fld_total ?></th>
                    </tr>

                </tbody>
            </table>
            <span class="float-right" style="border-bottom:1px solid black; padding:5px 30px;margin-bottom:50px"> সাক্ষর </span> 
        </div>
    <?php }
    ?>
</div>

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
    padding: 7px 0 0 5px !important;
}
    th {
        font-weight: normal;
        border: 1px solid black;
        FONT-SIZE: 10PX;
        text-align: left;

    }
    .table>tbody>tr>th{
        padding: 5px !important;
    }
    .table {
        margin-bottom:10%;
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
        margin: 12px 6px;
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