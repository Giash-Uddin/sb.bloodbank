<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>SB Blood Bank</title>

        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url() ?>acss/bootstrap.4.2.1.min.css" rel="stylesheet">

        <!-- Custom fonts for this template -->
        <link href="<?php echo base_url() ?>acss/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <!-- Plugin CSS -->
        <link href="<?php echo base_url() ?>acss/magnific-popup.css" rel="stylesheet" type="text/css">

        <!-- Custom styles for this template -->
        <link href="<?php echo base_url() ?>acss/freelancer.min.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>acss/style.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>acss/toastr.min.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>acss/jquery-ui.css" rel="stylesheet">
    </head>

    <body id="page-top">

        <!-- Navigation -->
        <nav class="navbar navbar-expand-sm bg-secondary fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">SB Blood Bank</a>
                <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item mx-0 mx-lg-1">
                            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#login">Login</a>
                        </li>
                        </li>
                        <li class="nav-item mx-0 mx-lg-1">
                            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#register">Register</a>
                        </li>
                        <li class="nav-item mx-0 mx-lg-1">
                            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#page-top">Search Blood</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Header -->
        <header class="masthead bg-secondary text-white text-center">
            <div class="container">
                <div class="btn btn-group btn-sm">
                    <select id="blood_group_search" class="form-control custom-select browser-default" name="blood_group_search" required>
                        <option value="">-- Select Blood Group --</option>
                        <option value="A+">A(+)ve</option>
                        <option value="B+">B(+)ve</option>
                        <option value="O+">O(+)ve</option>
                        <option value="AB+">AB(+)ve</option>
                        <option value="A-">A(-)ve</option>
                        <option value="B-">B(-)ve</option>
                        <option value="O-">O(-)ve</option>
                        <option value="AB-">AB(-)ve</option>
                    </select>
                    <select name="district_search" id="district_search" class="form-control custom-select browser-default" onchange="upozilaLoad(id);" required>
                        <option value="">--select one--</option>
                        <?php
                        foreach ($district as $menu) {
                            echo "<option value='" . $menu->name . "'>$menu->name</option>";
                        }
                        ?>
                    </select>
                    <select name="upozila_search" id="upozila_search" class="form-control custom-select browser-default">
                        <option value="">--select one--</option>
                    </select>
                    <select name="branch_name_search" id="branch_name_search" class="form-control custom-select browser-default" required>
                        <option value="">--select one--</option>
                        <?php
                        foreach ($branch as $menu) {
                            echo "<option value='" . $menu->name . "'>$menu->name</option>";
                        }
                        ?>
                    </select>
                    <a class="btn btn-md btn-info portfolio-item d-block mx-auto" href="#portfolio-modal-1" onclick="blood_search()">Search</a>
                </div>
            </div>
        </header>
        <!-- Portfolio Grid Section -->
        <section class="portfolio" id="portfolio">
            <div class="container">
                <h2 class="text-center text-uppercase text-secondary mb-0">States of Blood Group in Sonali Bank</h2>
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <!--                        <a class="portfolio-item d-block mx-auto">
                                                    <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
                                                        <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                                                            <i class="fas fa-search-plus fa-3x"></i>
                                                        </div>
                                                    </div>
                                                    <img class="img-fluid" src="<?php echo base_url() ?>img/portfolio/cabin.png" alt="">
                                                </a>-->
                                                <!--<canvas class="my-4" id="myChart" width="500" height="250"></canvas>-->
                        <div id = "column-chart-container" style = "width: 550px; height: 400px; margin: 0 auto"></div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <!--                        <a class="portfolio-item d-block mx-auto">
                                                    <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
                                                        <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                                                            <i class="fas fa-search-plus fa-3x"></i>
                                                        </div>
                                                    </div>
                                                    <img class="img-fluid" src="<?php echo base_url() ?>img/portfolio/cake.png" alt="">
                                                </a>-->
                        <div id = "pie-chart-container" style = "width: 550px; height: 400px; margin: 0 auto"></div>

                    </div>                    
                </div>
            </div>
        </section>

        <!-- Login Section -->
        <section id="login">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Login</div>

                            <div class="card-body">
                                <form method="POST" action="login">
                                    <div class="form-group row">
                                        <label for="username" class="col-md-4 col-form-label text-md-right">User Name</label>

                                        <div class="col-md-6">
                                            <input id="username" type="text" class="form-control" name="username" value="" required autofocus>

                                            <span class="invalid-feedback" role="alert">
                                                <strong>username</strong>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="index" class="col-md-4 col-form-label text-md-right">Index</label>

                                        <div class="col-md-6">
                                            <input id="index" type="text" class="form-control" name="index" value="" required autofocus onkeypress="return indexValidation(value, event)">

                                            <span class="invalid-feedback" role="alert">
                                                <strong>index</strong>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control" name="password" required>

                                            <span class="invalid-feedback" role="alert">
                                                <strong>password</strong>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button class="btn btn-primary">Login</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Register Section -->
        <section id="register">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Register</div>

                            <div class="card-body">
                                <!--<form name="registration_form" method="POST" action="registration/registration/save" novalidate>-->
                                <form name="add_donor_form" id="add_donor_form" novalidate>
                                    <!--<form name="registration_form">-->
                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control" name="name" value="" required autofocus>
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Name must be filled up</strong>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="contact_no" class="col-md-4 col-form-label text-md-right">Contact No</label>
                                        <div class="col-md-6">
                                            <input id="contact_no" type="text" class="form-control" name="contact_no" value="" required autofocus>
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Contact no must be filled up</strong>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control" name="email" value="">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="blood_group" class="col-md-4 col-form-label text-md-right">Blood Group</label>
                                        <div class="col-md-6">
                                            <select id="blood_group" class="custom-select browser-default" name="blood_group" required>
                                                <option value="">-- Select Blood Group --</option>
                                                <option value="A+">A(+)ve</option>
                                                <option value="B+">B(+)ve</option>
                                                <option value="O+">O(+)ve</option>
                                                <option value="AB+">AB(+)ve</option>
                                                <option value="A-">A(-)ve</option>
                                                <option value="B-">B(-)ve</option>
                                                <option value="O-">O(-)ve</option>
                                                <option value="AB-">AB(-)ve</option>
                                            </select>
                                            <div class="invalid-feedback">Blood Group must be selected</div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="designation" class="col-md-4 col-form-label text-md-right">Designation</label>

                                        <div class="col-md-6">
                                            <select name="designation" id="designation" class="form-control custom-select browser-default" required>
                                                <option value="">--select one--</option>
                                                <?php
                                                foreach ($designation as $menu) {
                                                    echo "<option value='" . $menu->short_form . "'>$menu->short_form</option>";
                                                }
                                                ?>
                                            </select>
                                            <div class="invalid-feedback">Designation must be selected</div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="joining_date" class="col-md-4 col-form-label text-md-right">Joining Date</label>
                                        <div class="col-md-6">
                                            <input id="joining_date" type="text" class="form-control datepick" name="joining_date" value="" required autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="branch_name" class="col-md-4 col-form-label text-md-right">Branch Name</label>

                                        <div class="col-md-6">
                                            <select name="branch_name" id="branch_name" class="form-control custom-select browser-default" required>
                                                <option value="">--select one--</option>
                                                <?php
                                                foreach ($branch as $menu) {
                                                    echo "<option value='" . $menu->name . "'>$menu->name</option>";
                                                }
                                                ?>
                                            </select>
                                            <div class="invalid-feedback">Branch name must be selected</div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="controlling_office" class="col-md-4 col-form-label text-md-right">Controlling Office</label>
                                        <div class="col-md-6">
                                            <input id="controlling_office" type="text" class="form-control" name="controlling_office" value="" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="district" class="col-md-4 col-form-label text-md-right">District</label>
                                        <div class="col-md-6">
                                            <select name="district" id="district" class="form-control custom-select browser-default" onchange="upozilaLoad(id);" required>
                                                <option value="">--select one--</option>
                                                <?php
                                                foreach ($district as $menu) {
                                                    echo "<option value='" . $menu->name . "'>$menu->name</option>";
                                                }
                                                ?>
                                            </select>
                                            <div class="invalid-feedback">Branch name must be selected</div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="upozila" class="col-md-4 col-form-label text-md-right">Upozila</label>
                                        <div class="col-md-6">
                                            <select name="upozila" id="upozila" class="form-control custom-select browser-default">
                                                <option value="">--select one--</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="dob" class="col-md-4 col-form-label text-md-right">Date of Birth</label>
                                        <div class="col-md-6">
                                            <input id="dob" type="text" class="form-control datepick" name="dob" value="" required autofocus>
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Date of birth must be filled up</strong>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="username_reg" class="col-md-4 col-form-label text-md-right">User Name</label>

                                        <div class="col-md-6">
                                            <input id="username_reg" type="text" class="form-control" name="username_reg" value="" required autofocus>
                                            <span class="invalid-feedback" role="alert">
                                                <strong>User must be filled up</strong>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="index_reg" class="col-md-4 col-form-label text-md-right">Index</label>
                                        <div class="col-md-6">
                                            <input id="index_reg" type="text" class="form-control" name="index_reg" value="" required autofocus onkeypress="return indexValidation(value, event)">
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Index must be filled up</strong>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password_reg" class="col-md-4 col-form-label text-md-right">Password</label>
                                        <div class="col-md-6">
                                            <input id="password_reg" type="password" class="form-control" name="password_reg" required>
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Password must be filled up</strong>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password_confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                                        <div class="col-md-6">
                                            <input id="password_confirm" type="password" class="form-control" name="password_confirmation" required>
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Must confirm password</strong>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <a class="btn btn-primary" onclick="registration()">Save</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="footer text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Contact</h4>
                        <p class="lead mb-0">0100000000</p>
                    </div>
                    <div class="col-md-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Around the Web</h4>
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <a class="btn btn-outline-light btn-social text-center rounded-circle" href="#">
                                    <i class="fab fa-fw fa-facebook-f"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn btn-outline-light btn-social text-center rounded-circle" href="#">
                                    <i class="fab fa-fw fa-google-plus-g"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn btn-outline-light btn-social text-center rounded-circle" href="#">
                                    <i class="fab fa-fw fa-twitter"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn btn-outline-light btn-social text-center rounded-circle" href="#">
                                    <i class="fab fa-fw fa-linkedin-in"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn btn-outline-light btn-social text-center rounded-circle" href="#">
                                    <i class="fab fa-fw fa-dribbble"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h4 class="text-uppercase mb-4">SB Blood Bank</h4>
                        <p class="lead mb-0">A Blood Searching Solution for Sonali Bank Employees.</p>
                    </div>
                </div>
            </div>
        </footer>



        <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
        <div class="scroll-to-top d-lg-none position-fixed ">
            <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
                <i class="fa fa-chevron-up"></i>
            </a>
        </div>

        <!-- Portfolio Modal 1 -->
        <div class="portfolio-modal mfp-hide" id="portfolio-modal-1">
            <div class="portfolio-modal-dialog bg-white">
                <a class="close-button d-none d-sm-block portfolio-modal-dismiss" href="#">
                    <i class="fa fa-1x fa-times"></i>
                </a>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 mx-auto">
                            <div id="blood_search_container"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Validation  JavaScript -->
        <script src="<?php echo base_url() ?>ajs/validation.js" type="text/javascript" ></script>
        <!-- Toastr Message  JavaScript -->

        <script src="<?php echo base_url() ?>ajs/toastr.min.js" type="text/javascript" ></script>
        <script src="<?php echo base_url() ?>ajs/popper.min.js" type="text/javascript" ></script>
        <script src="<?php echo base_url() ?>ajs/bootstrap.min.js" type="text/javascript" ></script>


        <!-- Bootstrap core JavaScript -->
        <script src="<?php echo base_url() ?>ajs/jquery.min.js"></script>
        <script src="<?php echo base_url() ?>ajs/bootstrap.bundle.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="<?php echo base_url() ?>ajs/jquery.easing.min.js"></script>
        <script src="<?php echo base_url() ?>ajs/jquery.magnific-popup.min.js"></script>

        <!-- Contact Form JavaScript -->
        <script src="<?php echo base_url() ?>ajs/jqBootstrapValidation.js"></script>
        <script src="<?php echo base_url() ?>ajs/contact_me.js"></script>

        <!-- Custom scripts for this template -->
        <script src="<?php echo base_url() ?>ajs/freelancer.min.js"></script>
        <script src="<?php echo base_url() ?>ajs/jquery.3.3.1.min.js"></script>
        <script src="<?php echo base_url() ?>ajs/jquery-1.12.4.js" type="text/javascript" ></script>
        <script src="<?php echo base_url() ?>ajs/jquery-ui.js" type="text/javascript" ></script>

        <!-- Highchart scripts for this template -->
        <script src="<?php echo base_url() ?>ajs/Chart.min.js"></script>
        <!--<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>-->
        <script src = "<?php echo base_url() ?>ajs/highcharts.js"></script>  

        <script>
                                                var base_url = "<?php echo base_url() ?>";
                                                $(document).ready(function() {
                                                    $('.datepick').datepicker({
                                                        changeMonth: true,
                                                        changeYear: true,
                                                        dateFormat: "yy-mm-dd"
                                                    });
                                                });
                                                function registration() {
//                            if (isValid()) {
                                                    var name = $('#name').val();
                                                    var contact_no = $('#contact_no').val();
                                                    var email = $('#email').val();
                                                    var blood_group = $('#blood_group').val();
                                                    var designation = $('#designation').val();
                                                    var joining_date = $('#joining_date').val();
                                                    var branch_name = $('#branch_name').val();
                                                    var controlling_office = $('#controlling_office').val();
                                                    var area = $('#upozila').val();
                                                    var district = $('#district').val();
                                                    var dob = $('#dob').val();
                                                    var username = $('#username_reg').val();
                                                    var index = $('#index_reg').val();
                                                    var password = $('#password_reg').val();
                                                    $.ajax({
                                                        url: '<?php echo base_url() ?>' + "donor/donor/registration",
                                                        type: 'post',
                                                        data: {
                                                            name: name,
                                                            contact_no: contact_no,
                                                            email: email,
                                                            blood_group: blood_group,
                                                            designation: designation,
                                                            joining_date: joining_date,
                                                            branch_name: branch_name,
                                                            controlling_office: controlling_office,
                                                            area: area,
                                                            district: district,
                                                            dob: dob,
                                                            username: username,
                                                            index: index,
                                                            password: password},
                                                        success: function(data) {
                                                            toastr.success('Registration successfully', 'Success', {timeOut: 3000});
                                                            $.ajax({
                                                                url: '<?php echo base_url() ?>' + "login",
                                                                type: 'get',
                                                                success: function(data) {
                                                                    $('#container').html(data);
                                                                },
                                                                error: function() {
                                                                    $('#container').text('An error occurred');
                                                                }
                                                            });
                                                        },
                                                        error: function(data) {
                                                            toastr.error('Registration failed', 'Failed', {timeOut: 3000});
                                                            $('#container').text(data.error);
                                                        }
                                                    });
//                            }
                                                }

                                                function upozilaLoad(id) {
                                                    var district = $("#" + id).val();
                                                    $.ajax({
                                                        url: '<?php echo base_url() ?>' + "donor/donor/getUpozilaByDistrict",
                                                        type: 'post',
                                                        dataType: 'json',
                                                        data: {district: district},
                                                        success: function(data) {
                                                            var key = 0, option = "";
                                                            if (id == "district") {
                                                                $('#upozila').children('option:not(:first)').remove();
                                                            } else {
                                                                $('#upozila_search').children('option:not(:first)').remove();
                                                            }
                                                            for (key in data.district) {
                                                                if (data.district.hasOwnProperty(key)) {
                                                                    option = "<option value='" + data.district[key].name + "'>" + data.district[key].name + "</option>"
                                                                    if (id == "district") {
                                                                        $("#upozila").append(option);
                                                                    } else {
                                                                        $("#upozila_search").append(option);
                                                                    }
                                                                }
                                                            }
                                                        },
                                                        error: function(data) {
                                                            alert('An error occurred' + data.error);
                                                        }
                                                    });
                                                }
                                                function blood_search() {
                                                    var blood_group_search = $("#blood_group_search").val();
                                                    var district_search = $("#district_search").val();
                                                    var upozila_search = $("#upozila_search").val();
                                                    var branch_name_search = $("#branch_name_search").val();
                                                    $.ajax({
                                                        url: '<?php echo base_url() ?>' + "login/login/bloodSearch",
                                                        type: 'post',
                                                        dataType: 'json',
                                                        data: {blood_group_search: blood_group_search, district_search: district_search, upozila_search: upozila_search, branch_name_search: branch_name_search},
                                                        success: function(data) {

                                                            var key = 0, table = "";
                                                            table = "<table id='blood_search_content_table' width=100% class='table-hover'>"
                                                            for (key in data) {
                                                                if (data.hasOwnProperty(key)) {
                                                                    table += "<tr> <td class='text-left'><table width=100%><tr><th>Name: </th><td>" + data[key].name + "</td></tr><tr><th>Contact No: </th><td>" + data[key].contact_no + "</td></tr><tr><th>Blood Group: </th><td>" + data[key].blood_group + "</td></tr><tr><th>Last Donation Date: </th><td>" + data[key].donation_date + "</td></tr><tr><th>Last Donating type: </th><td>" + data[key].component + "</td></tr><tr><th>District: </th><td>" + data[key].district + "</td></tr><tr><th>Upozila: </th><td>" + data[key].area + "</td></tr></table><hr/></td></tr>"
                                                                }
                                                            }
                                                            table += "</table>";
                                                            $("#blood_search_container").html(table);
                                                        },
                                                        error: function(data) {
                                                            alert('An error occurred' + data.error);
                                                        }
                                                    });
                                                }
        </script>
        <script>
            // -------------- bar Chart Start ------------------------
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["A(+)ve", "B(+)ve", "O(+)ve", "AB(+)ve", "A(-)ve", "B(-)ve", "O(-)ve", "AB(-)ve"],
                    datasets: [{
                            data: [15339, 21345, 18483, 24003, 23489, 24092, 12034, 15339],
                            lineTension: 0,
                            backgroundColor: 'transparent',
                            borderColor: '#007bff',
                            borderWidth: 4,
                            pointBackgroundColor: '#007bff'
                        }]
                },
                options: {
                    scales: {
                        yAxes: [{
                                ticks: {
                                    beginAtZero: false
                                }
                            }]
                    },
                    legend: {
                        display: false,
                    }
                }
            });
            // -------------- Bar Chart Start ------------------------

        </script>
        <script>
            // -------------- Column Chart Start ------------------------
            var a_positive =<?php echo $total_donor->A_POSITIVE ?>,
                    b_positive =<?php echo $total_donor->B_POSITIVE ?>,
                    o_positive =<?php echo $total_donor->O_POSITIVE ?>,
                    ab_positive =<?php echo $total_donor->AB_POSITIVE ?>,
                    a_negative =<?php echo $total_donor->A_NEGATIVE ?>,
                    b_negative =<?php echo $total_donor->B_NEGATIVE ?>,
                    o_negative =<?php echo $total_donor->O_NEGATIVE ?>,
                    ab_negative =<?php echo $total_donor->AB_NEGATIVE ?>;

            var columnchart = {
                type: 'column'
            };
            var title = {
                text: 'Blood Group In Sonali Bank'
            };
            var subtitle = {
                text: '(All Employees)'
            };
            var xAxis = {
                categories: ["A(+)ve", "B(+)ve", "O(+)ve", "AB(+)ve", "A(-)ve", "B(-)ve", "O(-)ve", "AB(-)ve"],
                crosshair: true
            };
            var yAxis = {
                min: 0,
                title: {
                    text: 'Blood Group wise number'
                }
            };
            var tooltip = {
                headerFormat: '<span style = "color:{series.color};padding:0">{series.name} : </span><span style = "font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style = "color:{series.color};padding:0">No of Donor : </td><td style = "padding:0"><b>{point.y}</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            };
            var plotOptions = {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            };
            var credits = {
                enabled: false
            };
            var series = [
                {
                    name: 'Blood Group',
                    data: [a_positive, b_positive, o_positive, ab_positive, a_negative, b_negative, o_negative, ab_negative]
                }
            ];

            var columnjson = {};
            columnjson.chart = columnchart;
            columnjson.title = title;
            columnjson.subtitle = subtitle;
            columnjson.tooltip = tooltip;
            columnjson.xAxis = xAxis;
            columnjson.yAxis = yAxis;
            columnjson.series = series;
            columnjson.plotOptions = plotOptions;
            columnjson.credits = credits;
            $('#column-chart-container').highcharts(columnjson);
            // -------------Column Chart End -------------------
            // -------------- Pie Chart Start ------------------------
            var ready_a_positive =<?php echo $ready_donor->A_POSITIVE ?>,
                    ready_b_positive =<?php echo $ready_donor->B_POSITIVE ?>,
                    ready_o_positive =<?php echo $ready_donor->O_POSITIVE ?>,
                    ready_ab_positive =<?php echo $ready_donor->AB_POSITIVE ?>,
                    ready_a_negative =<?php echo $ready_donor->A_NEGATIVE ?>,
                    ready_b_negative =<?php echo $ready_donor->B_NEGATIVE ?>,
                    ready_o_negative =<?php echo $ready_donor->O_NEGATIVE ?>,
                    ready_ab_negative =<?php echo $ready_donor->AB_NEGATIVE ?>;

            var chart = {
                plotBackgroundColor: null,
                plotBorderWidth: 1,
                plotShadow: false
            };
            var title = {
                text: 'Ready to donate blood'
            };
            var tooltip = {
                pointFormat: '{series.name}: <b>{point.percentage}</b>'
            };
            var plotOptions = {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) ||
                                    'black'
                        }
                    }
                }
            };
            var series = [{
                    type: 'pie',
                    name: 'Available',
                    data: [
                        ['A(+)ve', ready_a_positive],
                        ['B(+)ve', ready_b_positive],
                        ['O(+)ve', ready_o_positive],
                        ['AB(+)ve', ready_ab_positive],
                        ['A(-)ve', ready_a_negative],
                        ['B(-)ve', ready_b_negative],
                        ['O(-)ve', ready_o_negative],
                        ['AB(-)ve', ready_ab_negative]
                    ]
                }];
            var json = {};
            json.chart = chart;
            json.title = title;
            json.tooltip = tooltip;
            json.series = series;
            json.plotOptions = plotOptions;
            $('#pie-chart-container').highcharts(json);
            // -------------- Pie Chart End ------------------------


        </script>
    </body>

</html>
