<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Dashboard
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!-- Canonical SEO -->
  <link rel="canonical" href="" />
  <meta name="keywords" content=", html dashboard, html css dashboard, web dashboard, bootstrap 4 dashboard, bootstrap 4, css3 dashboard, bootstrap 4 admin, paper dashboard bootstrap 4 dashboard, frontend, responsive bootstrap 4 dashboard, paper design, paper dashboard bootstrap 4 dashboard">
  <meta name="description" content="Paper Dashboard PRO is a beautiful Bootstrap 4 admin dashboard with a large number of components, designed to look beautiful, clean and organized. If you are looking for a tool to manage dates about your business, this dashboard is the thing for you.">

  <meta name="twitter:card" content="product">
  <meta name="twitter:site" content="@creativetim">
  <meta name="twitter:title" content="Paper Dashboard PRO by link-up ">
  <meta name="twitter:description" content="Paper Dashboard PRO is a beautiful Bootstrap 4 admin dashboard with a large number of components, designed to look beautiful, clean and organized. If you are looking for a tool to manage dates about your business, this dashboard is the thing for you.">
  <meta name="twitter:creator" content="@creativetim">
  <meta name="twitter:image" content="<?php echo base_url(); ?>s3.amazonaws.com/creativetim_bucket/products/84/opt_pd2p_thumbnail.jpg">
  <!-- Open Graph data -->
  <meta property="fb:app_id" content="655968634437471">
  <meta property="og:title" content="Paper Dashboard PRO by link-up " />
  <meta property="og:type" content="article" />
  <meta property="og:url" content="" />
  <meta property="og:image" content="<?php echo base_url(); ?>s3.amazonaws.com/creativetim_bucket/products/84/opt_pd2p_thumbnail.jpg" />
  <meta property="og:description" content="Paper Dashboard PRO is a beautiful Bootstrap 4 admin dashboard with a large number of components, designed to look beautiful, clean and organized. If you are looking for a tool to manage dates about your business, this dashboard is the thing for you." />
  <meta property="og:site_name" content="link-up " />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <!-- <link href="<?php //echo base_url(); 
                    ?>maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet"> -->
  <!-- CSS Files -->
  <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>assets/css/paper-dashboard.min790f.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?php echo base_url(); ?>assets/demo/demo.css" rel="stylesheet" />
  <link href="  https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css
" rel="stylesheet" />
  <!-- Google Tag Manager -->
  <script>
    (function(w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
      });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
      j.async = true;
      j.src =
        '#/#/#/www.googletagmanager.com/gtm5445.html?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-NKDMSK6');
  </script>
  <!-- End Google Tag Manager -->
</head>

<body class="">
  <!-- Extra details for Live View on GitHub Pages -->
  <!-- Google Tag Manager (noscript) -->
  <noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0" style="display:none;visibility:hidden"></iframe>
  </noscript>
  <!-- End Google Tag Manager (noscript) -->
  <div class="wrapper ">
    <div class="sidebar" data-color="brown" data-active-color="danger">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="#" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="<?php echo base_url(); ?>assets/img/logo-small.png">
          </div>
        </a>
        <a href="#" class="simple-text logo-normal">
          link-up
          <!-- <div class="logo-image-big">
            <img src="#/assets/img/logo-big.png">
          </div> -->
        </a>
      </div>

      <?php
      // print_r($this->session->userdata()); die();
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

      <div class="sidebar-wrapper">
        <div class="user">
          <div class="photo">
            <img src="<?php echo base_url(); ?>assets/img/faces/ayo-ogunseinde-2.jpg" />
          </div>
          <div class="info">
            <a data-toggle="collapse" href="#collapseExample" class="collapsed">
              <span>
                <?php $name = $_SESSION['id']; ?>
                <?php $result = $this->db->query("Select * From tbl_user where status ='a' and id = ?", $name)->row(); ?>
                <b class="caret"></b>
                <?php echo $result->user_name; ?>
              </span>
            </a>
            <div class="clearfix"></div>
            <div class="collapse" id="collapseExample">
              <ul class="nav">
                <!-- <li>
                  <a href="#">
                    <span class="sidebar-mini-icon">MP</span>
                    <span class="sidebar-normal">My Profile</span>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <span class="sidebar-mini-icon">EP</span>
                    <span class="sidebar-normal">Edit Profile</span>
                  </a>
                </li> -->
                <li>
                  <a href="<?php echo base_url('logout'); ?>">
                    <span class="sidebar-mini-icon">LO</span>
                    <span class="sidebar-normal">Log Out</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <ul class="nav">
          <li class="active">
            <a href="<?php echo base_url('dashboard'); ?>">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="">

            <?php if (array_search("ranter_register", $access) > -1 || isset($CheckSuperAdmin)) : ?>
              <a href="<?php echo base_url(); ?>ranter_register">
                <i class="nc-icon nc-badge"></i>
                <p>
                  Register From
                </p>
              </a>
            <?php endif; ?>
          </li>
          <li>
            <?php if (array_search("all_renter_list", $access) > -1 || isset($CheckSuperAdmin)) : ?>
              <a href="<?php echo base_url('all_renter_list'); ?>">
                <i class="nc-icon nc-ruler-pencil"></i>
                <p>
                  All Resident
                </p>
              </a>
            <?php endif; ?>
          </li>
          <li>
            <?php if (array_search("unit_bill_entry", $access) > -1 || isset($CheckSuperAdmin)) : ?>
              <a href="<?php echo base_url('unit_bill_entry'); ?>">
                <i class="nc-icon nc-single-copy-04"></i>
                <p>
                  Unit Bill Entry
                </p>
              </a>
            <?php endif; ?>
          </li>
          <li>
            <?php if (array_search("bill_entry", $access) > -1 || isset($CheckSuperAdmin)) : ?>
              <a href="<?php echo base_url('bill_entry'); ?>">
                <i class="nc-icon nc-ruler-pencil"></i>
                <!-- <i class="nc-icon nc-layout-11"></i> -->
                <p>
                  All Bill Entry
                </p>
              </a>
            <?php endif; ?>
          </li>
          <!-- <li>
            <?php //if (array_search("Service_collection", $access) > -1 || isset($CheckSuperAdmin)) : ?>
              <a href="<?php //echo base_url('Service_collection'); ?>">
                <i class="nc-icon nc-box"></i>
                <p>Bill Collection </p>
              </a>
            <?php //  endif; ?>
          </li> -->
          <li>
          <!-- <li>
            <?php //if (array_search("Report_collection", $access) > -1 || isset($CheckSuperAdmin)) : ?>
              <a href="<?php //echo base_url('Report_collection'); ?>">
                <i class="nc-icon nc-box"></i>
                <p>Collection Report</p>
              </a>
            <?php //endif; ?>
          </li> -->
          <li>
            <?php if (array_search("User_access", $access) > -1 || isset($CheckSuperAdmin)) : ?>
              <a href="<?php echo base_url('User_access'); ?>">
                <i class="nc-icon nc-single-02"></i>
                <p>User Access</p>
              </a>
            <?php endif; ?>
          </li>
          <li>
            <a data-toggle="collapse" href="#mapsExamples">
              <i class="nc-icon nc-money-coins"></i>
              <p>
                Accounts
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse " id="mapsExamples">
              <ul class="nav">
                <!-- <li>
                  <?php //if (array_search("Service_collection", $access) > -1 || isset($CheckSuperAdmin)) : ?>
                    <a href="<?php //echo base_url('Service_collection'); ?>">
                      <span class="sidebar-mini-icon">BC</span>
                      <span class="sidebar-normal"> Bill Collection </span>
                    </a>
                  <?php //endif; ?>
                </li> -->
                <li>
                  <?php if (array_search("Cash_transaction", $access) > -1 || isset($CheckSuperAdmin)) : ?>
                    <a href="<?php echo base_url('Cash_transaction'); ?>">
                      <span class="sidebar-mini-icon">BE</span>
                      <span class="sidebar-normal">Building Expense </span>
                    </a>
                  <?php endif; ?>
                </li>
              </ul>
            </div>
          </li>
          <li>
            <a data-toggle="collapse" href="#setting">
              <i class="nc-icon nc-settings-gear-65"></i>
              <p>
                Setting
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse " id="setting">
              <ul class="nav">
                <li>
                  <?php if (array_search("floor_entry", $access) > -1 || isset($CheckSuperAdmin)) : ?>
                    <a href="<?php echo base_url('floor_entry'); ?>">
                      <span class="sidebar-mini-icon">FE</span>
                      <span class="sidebar-normal"> Floor Entry </span>
                    </a>
                  <?php endif; ?>
                </li>
                <li>
                  <?php if (array_search("unit_entry", $access) > -1 || isset($CheckSuperAdmin)) : ?>
                    <a href="<?php echo base_url('unit_entry'); ?>">
                      <span class="sidebar-mini-icon">UE</span>
                      <span class="sidebar-normal">Unit Entry </span>
                    </a>
                  <?php endif; ?>
                </li>
                <li>
                  <?php if (array_search("house_info", $access) > -1 || isset($CheckSuperAdmin)) : ?>
                    <a href="<?php echo base_url('house_info'); ?>">
                      <span class="sidebar-mini-icon">HI</span>
                      <span class="sidebar-normal">Building Information </span>
                    </a>
                  <?php endif; ?>
                </li>
                <li>
                  <?php if (array_search("month_entry", $access) > -1 || isset($CheckSuperAdmin)) : ?>
                    <a href="<?php echo base_url('month_entry'); ?>">
                      <span class="sidebar-mini-icon">ME</span>
                      <span class="sidebar-normal">Month Entry</span>
                    </a>
                  <?php endif; ?>
                </li>
                <li>
                  <?php if (array_search("branch_access", $access) > -1 || isset($CheckSuperAdmin)) : ?>
                    <a href="<?php echo base_url('branch_access'); ?>">
                      <span class="sidebar-mini-icon">BN</span>
                      <span class="sidebar-normal">Branch Access</span>
                    </a>
                  <?php endif; ?>
                </li>
              </ul>
            </div>
          </li>
          <li>
            <a data-toggle="collapse" href="#report">
              <i class="nc-icon nc-paper"></i>
              <p>
                All Reports 
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse " id="report">
              <ul class="nav">
                <li>
                  <?php if (array_search("Report_collection", $access) > -1 || isset($CheckSuperAdmin)) : ?>
                    <a href="<?php echo base_url('Report_collection'); ?>">
                      <span class="sidebar-mini-icon">BCR</span>
                      <span class="sidebar-normal"> Bill collection Report</span>
                    </a>
                  <?php endif; ?>
                </li>
                <li>
                  <?php if (array_search("expense_report", $access) > -1 || isset($CheckSuperAdmin)) : ?>
                    <a href="<?php echo base_url('expense_report'); ?>">
                      <span class="sidebar-mini-icon">UE</span>
                      <span class="sidebar-normal">Expense & Income report </span>
                    </a>
                  <?php endif; ?>
                </li>
                <li>
                  <?php if (array_search("advance", $access) > -1 || isset($CheckSuperAdmin)) : ?>
                    <a href="<?php echo base_url('advance'); ?>">
                      <span class="sidebar-mini-icon">AD</span>
                      <span class="sidebar-normal">Advance report </span>
                    </a>
                  <?php endif; ?>
                </li>
                <li>
                  <?php if (array_search("all_expense_report", $access) > -1 || isset($CheckSuperAdmin)) : ?>
                    <a href="<?php echo base_url('all_expense_report'); ?>">
                      <span class="sidebar-mini-icon">UE</span>
                      <span class="sidebar-normal">All Expense report </span>
                    </a>
                  <?php endif; ?>
                </li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
    </div>

    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-minimize">
              <button id="minimizeSidebar" class="btn btn-icon btn-round">
                <i class="nc-icon nc-minimal-right text-center visible-on-sidebar-mini"></i>
                <i class="nc-icon nc-minimal-left text-center visible-on-sidebar-regular"></i>
              </button>
            </div>
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo"></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">

            <?php $result = $this->db->query("select * from tbl_branch where status = 'a'")->result(); ?>
            <ul class="navbar-nav">
              <?php if (array_search("branch_access", $access) > -1 || isset($CheckSuperAdmin)) : ?>
                <form action="<?php echo base_url('set_branch'); ?>" method="post">
                  <select class="mdb-select md-form" name="Branch_id">
                    <?php foreach ($result as $value) { ?>
                      <option value="<?php echo $value->branch_id; ?>"><?php echo $value->branch_name; ?></option>
                    <?php } ?>
                  </select>
                  <input type="submit" value="confirm">
                </form>
              <?php endif; ?>
              <?php $branch = $_SESSION['branch_id']; ?>
              <?php $result = $this->db->query("select branch_name from tbl_branch where status = 'a' and branch_id = ?", $branch)->row(); ?>
              </li>
            </ul>
            <ul>

              <span style="float: right">
                <button class="btn-primary"><?php echo $result->branch_name; ?></button>
              </span>

            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <style>
        .sidebar[data-color=brown]:after {
          background: #111c54;
        }

        .sidebar .nav li>a {
          margin: 0px;
          padding: 5px 10px;
        }
      </style>