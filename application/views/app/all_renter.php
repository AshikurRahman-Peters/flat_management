<style>
    .table td {
        padding: 0px;
    }
</style>
<div class="content">
    <?php echo $this->session->flashdata('msg'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">All Resident</h4>
                </div>
                <div class="card-body">
                    <div class="toolbar">
                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                    </div>
                    <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Resident photos</th>
                                <th>Resident Name</th>
                                <th>Father Name</th>
                                <th>Unit</th>
                                <th>Entry Date</th>
                                <th class="disabled-sorting text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($select_all_resident as $value) {
                                
                                ?>
                              
                                <tr>
                                    <td><img width="40px" src="<?php echo base_url().'assets/Profile_image/' . $value->fld_image; ?>" alt=""></td>
                                    <td><?php echo $value->resident_name; ?></td>
                                    <td><?php echo $value->father_name; ?></td>
                                    <td><?php echo $value->unit_name; ?></td>
                                    <td><?php echo $value->generate_date; ?></td>
                                    <td class="text-right">
                                        <!-- <a href="#" class="btn btn-info btn-link btn-icon btn-sm like"><i class="fa fa-heart"></i></a> -->

                                        <a style="cursor:pointer" target="blanck" onclick="window.open('<?php echo base_url().'renter_details/' . $value->id; ?>', '_blank', `width=${screen.width}, height=${screen.height}`); return false;">
                                            <i class="fa fa-print" style="color:green"></i></a>

                                        <a href="<?php echo base_url().'ranter_delete/'.$value->id; ?>" class="btn btn-danger btn-link btn-icon btn-sm"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- end content-->
            </div>
            <!--  end card  -->
        </div>
        <!-- end col-md-12 -->
    </div>
    <!-- end row -->
</div>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<script src="<?php echo base_url(); ?>/assets/js/core/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/core/popper.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/core/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/plugins/moment.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/plugins/bootstrap-switch.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/plugins/sweetalert2.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/plugins/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/plugins/jquery.bootstrap-wizard.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/plugins/bootstrap-selectpicker.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/plugins/bootstrap-datetimepicker.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/plugins/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/plugins/bootstrap-tagsinput.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/plugins/jasny-bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/plugins/fullcalendar.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/plugins/jquery-jvectormap.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/plugins/nouislider.min.js"></script>

<!-- <script>
    $(document).ready(function() {


        // $('#facebook').sharrre({
        //     share: {
        //         facebook: true
        //     },
        //     enableHover: false,
        //     enableTracking: false,
        //     enableCounter: false,
        //     click: function(api, options) {
        //         api.simulateClick();
        //         api.openPopup('facebook');
        //     },
        //     template: '<i class="fab fa-facebook-f"></i> Facebook',
          

        // $('#google').sharrre({
        //     share: {
        //         googlePlus: true
        //     },
        //     enableCounter: false,
        //     enableHover: false,
        //     enableTracking: true,
        //     click: function(api, options) {
        //         api.simulateClick();
        //         api.openPopup('googlePlus');
        //     },
        //     template: '<i class="fab fa-google-plus"></i> Google',
           
        // });

        // $('#twitter').sharrre({
        //     share: {
        //         twitter: true
        //     },
        //     enableHover: false,
        //     enableTracking: false,
        //     enableCounter: false,
        //     buttons: {
        //         twitter: {
        //             via: 'CreativeTim'
        //         }
        //     },
        //     click: function(api, options) {
        //         api.simulateClick();
        //         api.openPopup('twitter');
        //     },
        //     template: '<i class="fab fa-twitter"></i> Twitter',
           
        // });

        // Facebook Pixel Code Don't Delete
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window,
            document, 'script', '../../../../connect.facebook.net/en_US/fbevents.js');

        try {
            fbq('init', '111649226022273');
            fbq('track', "PageView");

        } catch (err) {
            console.log('Facebook Track Error:', err);
        }

    });
</script> -->
<noscript>
    <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=111649226022273&amp;ev=PageView&amp;noscript=1" />
</noscript>
<script>
    $(document).ready(function() {

        $sidebar = $('.sidebar');
        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');
        sidebar_mini_active = true;

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

        // if( window_width > 767 && fixed_plugin_open == 'Dashboard' ){
        //     if($('.fixed-plugin .dropdown').hasClass('show-dropdown')){
        //         $('.fixed-plugin .dropdown').addClass('show');
        //     }
        //
        // }

        $('.fixed-plugin a').click(function(event) {
            // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
            if ($(this).hasClass('switch-trigger')) {
                if (event.stopPropagation) {
                    event.stopPropagation();
                } else if (window.event) {
                    window.event.cancelBubble = true;
                }
            }
        });

        $('.fixed-plugin .active-color span').click(function() {
            $full_page_background = $('.full-page-background');

            $(this).siblings().removeClass('active');
            $(this).addClass('active');

            var new_color = $(this).data('color');

            if ($sidebar.length != 0) {
                $sidebar.attr('data-active-color', new_color);
            }

            if ($full_page.length != 0) {
                $full_page.attr('data-active-color', new_color);
            }

            if ($sidebar_responsive.length != 0) {
                $sidebar_responsive.attr('data-active-color', new_color);
            }
        });

        $('.fixed-plugin .background-color span').click(function() {
            $(this).siblings().removeClass('active');
            $(this).addClass('active');

            var new_color = $(this).data('color');

            if ($sidebar.length != 0) {
                $sidebar.attr('data-color', new_color);
            }

            if ($full_page.length != 0) {
                $full_page.attr('filter-color', new_color);
            }

            if ($sidebar_responsive.length != 0) {
                $sidebar_responsive.attr('data-color', new_color);
            }
        });

        $('.fixed-plugin .img-holder').click(function() {
            $full_page_background = $('.full-page-background');

            $(this).parent('li').siblings().removeClass('active');
            $(this).parent('li').addClass('active');


            var new_image = $(this).find("img").attr('src');

            if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                $sidebar_img_container.fadeOut('fast', function() {
                    $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                    $sidebar_img_container.fadeIn('fast');
                });
            }

            if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                $full_page_background.fadeOut('fast', function() {
                    $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                    $full_page_background.fadeIn('fast');
                });
            }

            if ($('.switch-sidebar-image input:checked').length == 0) {
                var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
                var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
            }

            if ($sidebar_responsive.length != 0) {
                $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
            }
        });

        $('.switch-sidebar-image input').on("switchChange.bootstrapSwitch", function() {
            $full_page_background = $('.full-page-background');

            $input = $(this);

            if ($input.is(':checked')) {
                if ($sidebar_img_container.length != 0) {
                    $sidebar_img_container.fadeIn('fast');
                    $sidebar.attr('data-image', '#');
                }

                if ($full_page_background.length != 0) {
                    $full_page_background.fadeIn('fast');
                    $full_page.attr('data-image', '#');
                }

                background_image = true;
            } else {
                if ($sidebar_img_container.length != 0) {
                    $sidebar.removeAttr('data-image');
                    $sidebar_img_container.fadeOut('fast');
                }

                if ($full_page_background.length != 0) {
                    $full_page.removeAttr('data-image', '#');
                    $full_page_background.fadeOut('fast');
                }

                background_image = false;
            }
        });


        $('.switch-mini input').on("switchChange.bootstrapSwitch", function() {
            $body = $('body');

            $input = $(this);

            if (paperDashboard.misc.sidebar_mini_active == true) {
                $('body').removeClass('sidebar-mini');
                paperDashboard.misc.sidebar_mini_active = false;

                $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

            } else {

                $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

                setTimeout(function() {
                    $('body').addClass('sidebar-mini');

                    paperDashboard.misc.sidebar_mini_active = true;
                }, 300);
            }

            // we simulate the window Resize so the charts will get updated in realtime.
            var simulateWindowResize = setInterval(function() {
                window.dispatchEvent(new Event('resize'));
            }, 180);

            // we stop the simulation of Window Resize after the animations are completed
            setTimeout(function() {
                clearInterval(simulateWindowResize);
            }, 1000);

        });

    });
</script>
<script>
    $(document).ready(function() {
        $('#datatable').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            }

        });

        var table = $('#datatable').DataTable();

        // Edit record
        table.on('click', '.edit', function() {
            $tr = $(this).closest('tr');

            var data = table.row($tr).data();
            alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
        });

        // Delete a record
        table.on('click', '.remove', function(e) {
            $tr = $(this).closest('tr');
            table.row($tr).remove().draw();
            e.preventDefault();
        });

        //Like record
        table.on('click', '.like', function() {
            alert('You clicked on Like button');
        });
    });
    
</script>