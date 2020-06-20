<style>
    #accountForm select {
        padding: 0 !important;
    }

    #accountsTable .button {
        width: 25px;
        height: 25px;
        border: none;
        color: white;
    }

    #accountsTable .edit {
        background-color: #7bb1e0;
    }

    #accountsTable .delete {
        background-color: #ff6666;
    }


    .table td {
        padding: 0px;
    }
</style>

<div id="accounts" class="content">
    <div class="widget-box">
        <div class="widget-header">
            <h4 class="widget-title">Account Information</h4>
            <div class="widget-toolbar">
                <a href="#" data-toggle="collapse" data-target="#demo" style="    margin-top: -4%;
    margin-left: 25%;position: absolute;">
                </a>
            </div>
        </div>

        <div id="demo" class="widget-body">
            <div class="widget-main">
                <form @submit.prevent="insertExpense">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="form-group">
                                <label class="control-label col-md-4">Account Id</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" v-model="accountCode" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-4">Account Name</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" v-model="expensess.expense_name" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-4">Description</label>
                                <div class="col-md-8">
                                    <textarea class="form-control" v-model="expensess.description"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <input type="submit" value="Save" class="btn btn-success">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="widget-box">
        <div class="widget-body" id="list">
            <div class="widget-main">
                <div class="row">
                    <div class="col-md-12">
                        <div id="accountsTable" class="table-responsive">

                            <div class="content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="widget-header">
                                                    <h4 class="widget-title">Account List</h4>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="toolbar">
                                                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                                                </div>
                                                <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>SI ID</th>
                                                            <th>Expense Name</th>
                                                            <th>Description</th>
                                                            <th class="disabled-sorting text-right">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <tr v-for="expense in expenses">

                                                            <td>{{expense.code}}</td>
                                                            <td hidden>{{expense.id}}</td>
                                                            <td>{{expense.expense_name}}</td>
                                                            <td>{{expense.description}}</td>
                                                            <td class="text-right">
                                                                <a style="cursor:pointer" @click="edit_expense_name(expense)">
                                                                    <i class="fa fa-edit" style="color:green"></i></a>
                                                                <a @click="deleteExpense(expense.id)" class="btn btn-danger btn-link btn-icon btn-sm"><i class="fa fa-times"></i></a>
                                                            </td>
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
                                <!-- end row -->
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .form-group .form-control {
        padding: 5px;
    }

    .form-group {
        margin: 0px;
    }

    label {
        margin: 0px;
    }

    .table>tbody>tr>td {
        padding: 0px;
    }

    .table-responsive {
        overflow: hidden;
    }

    h4 {
        margin: 0px;
    }

    .table>thead>tr>th {
        padding: 5px;
    }
</style>

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


<noscript>

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
<script src="<?php echo base_url(); ?>assets/js/vue/vue.js"></script>
<script src="<?php echo base_url(); ?>assets/js/vue/axios.js"></script>
<script src="<?php echo base_url(); ?>assets/js/vue/vuejs-datatable.js"></script>
<script src="<?php echo base_url(); ?>assets/js/vue/vue-select.min.js"></script>

<script>
    Vue.component('v-select', VueSelect.VueSelect);
    new Vue({
        el: '#accounts',
        data() {
            return {
                accountCode: null,
                expenses: [],
                expensess: {
                    expense_name: null,
                    description: null,
                    accountCode: null,
                    id: null

                },

            }
        },
        created() {
            this.get_expense();
            this.getAccountCode();
        },
        methods: {
            getAccountCode() {
                axios.get("/get_account_code").then(res => {
                    this.accountCode = res.data;
                })
            },

            get_expense() {
                axios.get('/get_expense').then(res => {
                    this.expenses = res.data;
                })
            },
            insertExpense() {
                let url = "/expense_insert";
                if (this.expensess.id != null) {
                    url = "/update_expense";
                }
                if (this.expensess == null) {
                    alert('filed not be empty');
                    return;
                }
                axios.post(url, this.expensess).then(res => {
                    this.expenses = res.data;
                    console.log(this.expenses);
                })
                this.clearData();
                location.reload();
            },
            clearData() {
                this.expensess = {
                    expense_name: null,
                    description: null,
                    id: null
                }
            },
            edit_expense_name(expensess) {

                let keys = Object.keys(this.expensess);
                keys.forEach(key => {
                    this.expensess[key] = expensess[key];
                });
                this.accountCode = expensess.code;
            },
            deleteExpense(id) {
                let deleteConfirm = confirm('Are you sure?');
                if (deleteConfirm == false) {
                    return;
                }
                axios.post('/deleteExpense', {
                    expensess: id
                }).then(res => {
                    let r = res.data;
                    alert(r.message);
                    if (r.success) {

                    }
                })
                location.reload();
            }

        }
    })
</script>