<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">SB Blood Bank</a>
            <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
            <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                    <a class="nav-link" href="logout">Sign out</a>
                </li>
            </ul>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                    <div class="sidebar-sticky">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active">
                                    <span data-feather="home"></span>
                                    Dashboard <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <ul class="nav flex-column">

                                    <li class="nav-item">
                                        <a class="nav-link" onclick="menu_change('profile');">
                                            <span data-feather="user"></span>
                                            Profile
                                        </a>
                                    </li>
                                    <?php if ($user_type == 'ADMIN') { ?>
                                        <li class="nav-item">
                                            <a class="nav-link" onclick="menu_change('donor');">
                                                <span data-feather="user"></span>
                                                Donor
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <li class="nav-item">
                                        <a class="nav-link" onclick="menu_change('donation');">
                                            <span data-feather="user"></span>
                                            Donation Record
                                        </a>
                                    </li>
                                    <?php if ($user_type == 'ADMIN') { ?>
                                        <li class="nav-item">
                                            <a class="nav-link" onclick="menu_change('branch');">
                                                <span data-feather="user"></span>
                                                Branches
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" onclick="menu_change('designation');">
                                                <span data-feather="user"></span>
                                                Designation
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" onclick="menu_change('upozila');">
                                                <span data-feather="user"></span>
                                                Upozila
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>

                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Dashboard</h1>
                        <div class="btn-toolbar mb-2 mb-md-0">
                            <div class="btn-group mr-2">
                                <button class="btn btn-sm btn-outline-secondary"><?php echo $user_type; ?></button>
                            </div>
                        </div>
                    </div>
                    <div id="container" style="margin: 0 auto"></div>
                </main>
            </div>
        </div>
<script>
    $(document).ready(function() {
                $('.datepick').datepicker({
                    changeMonth: true,
                    changeYear: true,
                    dateFormat: "yy-mm-dd"
                });
            });
</script>
        <script>
            function menu_change(_url) {
//                if (_url === 'donation') {
                    var user_id= '<?php echo $user_id ?>';
                    $.ajax({
                        url: '<?php echo base_url() ?>' + _url,
                        type: 'post',
                        data: {user_id: user_id},
                        success: function(data) {
                            $('#container').html(data);
                        },
                        error: function() {
                            $('#container').text('An error occurred');
                        }
                    });
//                } else {
//                    $.ajax({
//                        url: '<?php echo base_url() ?>' + _url,
//                        type: 'get',
//                        success: function(data) {
//                            $('#container').html(data);
//                        },
//                        error: function() {
//                            $('#container').text('An error occurred');
//                        }
//                    });
//                }
            }

            function update_form_set(_url, id) {
            var user_id= '<?php echo $user_id ?>';
                $.ajax({
                    url: '<?php echo base_url() ?>' + _url,
                    type: 'post',
                    data: {id: id, user_id: user_id},
                    success: function(data) {
                        $('#container').html(data);
                    },
                    error: function() {
                        $('#container').text('An error occurred');
                    }
                });
            }
        </script>

