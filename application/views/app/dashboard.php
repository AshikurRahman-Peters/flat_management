<div class="content">
  <div class="header_title">
    <h4 class="text-center"><?php echo $get_building_info->house_name; ?></h4>
    <span class="address text-center">
      <?php echo $get_building_info->house_description; ?>
    </span>
  </div>
  <div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-warning">
                <i class="nc-icon nc-single-02"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers">
                <p class="card-category">Total Resident</p>
                <?php
                $total_resident = $this->db->query("SELECT COUNT(r.id) as total FROM tbl_resident as r WHERE r.status = 'a' and r.branch_id = ?", $_SESSION['branch_id'])->row(); ?>
                <?php if (empty($total_resident)) {
                  echo 0;
                } else {
                ?>

                  <p class="card-title"><?php echo $total_resident->total; ?><p>
                    <?php } ?>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer ">
          <hr>
          <div class="stats">
            <i class="fa fa-calendar-o"></i> This Month
          </div>
        </div>

      </div>
    </div>
    <?php
    $userID =  $this->session->userdata('id');
    $CheckSuperAdmin = $this->db->select('id')->where('type', 'a')->where('id', $userID)->get('tbl_user')->row();

    // print_r($CheckSuperAdmin);
    // exit;
    $userAccessQuery = $this->db->select('menu_name')->where('type', 'u')->where('id', $userID)->where('status', 'a')->get('tbl_user')->row();
    $access = [];
    if (!empty($userAccessQuery)) {
      $access = explode(',', $userAccessQuery->menu_name);
    } else {
    }
    ?>

    <?php if (array_search("service", $access) > -1 || isset($CheckSuperAdmin)) : ?>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">

          <div class="card-body ">
            <div class="row">
              <div class="col-5 col-md-4">
                <div class="icon-big text-center icon-warning">
                  <i class="nc-icon nc-money-coins text-success"></i>
                </div>
              </div>
              <div class="col-7 col-md-8">

                <div class="numbers">
                  <?php
                  $total_service = $this->db->query("SELECT SUM(r.fld_total) as total FROM tbl_service_transaction as r where MONTH(r.collection_date) and fld_status = 'a' and branch_id = ?", $_SESSION['branch_id'])->row();
                  $total_service_dew = $this->db->query("SELECT sum(ser.due_amount) as total FROM tbl_service_transaction as ser WHERE ser.fld_status = 'a' and MONTH(ser.generate_date) and branch_id = ?", $_SESSION['branch_id'])->row(); ?>
                  <?php if (empty($total_service) || empty($total_service_dew)) {
                    echo 0;
                  } else {
                  ?>

                    <p class="card-category">Total Service Bill </p>
                    <p class="card-title">Paid: <?php echo $total_service->total; ?><p>
                        <p class="card-title">Dew: <?php echo $total_service_dew->total; ?><p>
                          <?php } ?>
                </div>

              </div>
            </div>
          </div>

          <div class="card-footer ">
            <hr>
            <div class="stats">
              <i class="fa fa-calendar-o"></i> This Month
            </div>
          </div>
        </div>
      </div>
    <?php endif; ?>
    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-warning">
                <i class="nc-icon nc-money-coins text-success"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers">
                <?php
                $total_rent = $this->db->query("SELECT SUM(r.fld_total) as total FROM tbl_rent_transaction as r where MONTH(r.collection_date) and r.fld_status = 'a' and r.branch_id = ?", $_SESSION['branch_id'])->row();
                $total_rent_dew = $this->db->query("SELECT SUM(r.due_amount) as total FROM tbl_rent_transaction as r where MONTH(r.generate_date) and r.fld_status = 'a' and r.branch_id = ?", $_SESSION['branch_id'])->row(); ?>
                <?php if (empty($total_rent) || empty($total_rent_dew)) {
                  echo 0;
                } else {
                ?>

                  <p class="card-category">Total Rents Bill </p>
                  <p class="card-title">Paid: <?php echo $total_rent->total; ?><p>
                      <p class="card-title">Dew: <?php echo $total_rent_dew->total; ?><p>
                  <?php } ?>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer ">
          <hr>
          <div class="stats">
            <i class="fa fa-calendar-o"></i> This Month
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-warning">
                <i class="nc-icon nc-vector text-danger"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers">
                <p class="card-category">Errors</p>
                <p class="card-title">23
                  <p>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer ">
          <hr>
          <div class="stats">
            <i class="fa fa-clock-o"></i> In the last hour
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- <div class="row">
    <div class="col-md-6">
      <div class="col-12">
        <h3>Service bill unpaid</h3>
      </div>
      <div class="col-md-12">
        <?php
        // $service_dew = $this->db->query("
        //       select 
        //       rs.*,
        //       ser.total_bill_amount
        //       FROM tbl_service_transaction as ser 
        //       INNER JOIN tbl_unit as u on ser.unit_id = u.id 
        //       INNER JOIN tbl_resident as rs on u.id = rs.unit_id
        //       WHERE ser.fld_status = 'p'
        //       ")->result(); 
        ?>
        <?php //foreach ($service_dew as $value) { 
        ?>
          <div class=" col-md-3" style="width:100%">

            <img height="AUTO" width="100%" src="<?php //echo base_url('assets/Profile_image/') . $value->fld_image; 
                                                  ?>">
            <div class="">
              <p>Name: <?php //echo $value->resident_name; 
                        ?></p>
            </div>
          </div>
        <?php //} 
        ?>
      </div>
    </div>
    <div class="col-md-6">
      <div class="col-12">
        <h3>Rent bill unpaid</h3>
        <div class="col-md-12">
          <?php
          // $service_dew = $this->db->query("
          //   select 
          //   rs.*,
          //   ser.fld_total
          //   FROM tbl_rent_transaction as ser 
          //   INNER JOIN tbl_unit as u on ser.unit_id = u.id 
          //   INNER JOIN tbl_resident as rs on u.id = rs.unit_id
          //   WHERE ser.fld_status = 'p'
          // ")->result(); 
          ?>
          <?php //foreach ($service_dew as $value) { 
          ?>
            <div class=" col-md-3" style="width:100%">

              <img height="AUTO" width="100%" src="<?php //echo base_url('assets/Profile_image/') . $value->fld_image; 
                                                    ?>">
              <div class="">
                <p>Name: <?php //echo $value->resident_name; 
                          ?></p>
              </div>
            </div>
          <?php //} 
          ?>
        </div>
      </div>
    </div>

  </div> -->
  <style>
    .card-stats .card-body .numbers {
      text-align: left;
      font-size: 15px;
    }
  </style>
  <!-- <footer class="footer footer-black  footer-white ">
    <div class="container-fluid">
      <div class="row">
        <nav class="footer-nav">

        </nav>
        <div class="credits ml-auto">
          <span class="copyright">
            ©
            <script>
              document.write(new Date().getFullYear())
            </script>, made with <i class="fa fa-heart heart"></i> by Link-Up Technology
          </span>
        </div>
      </div>
    </div>
  </footer> -->
</div>