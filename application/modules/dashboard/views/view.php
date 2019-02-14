<?php
//if (!$this->session->userdata('user_id')) {
//    redirect("login");
//}
//$this->load->view('head');
$user_id = $this->session->userdata('user_id');
$user_name = $this->session->userdata('user_name');
$user_type = $this->session->userdata('user_type');

$sesion_array=array();
$sesion_array['user_id']=$this->session->userdata('user_id');
$sesion_array['user_name']=$this->session->userdata('user_name');
$sesion_array['user_type']=$this->session->userdata('user_type');
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../../../favicon.ico">

        <title>SB Blood Bank</title>

        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url() ?>acss/bootstrap.4.2.1.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="<?php echo base_url() ?>acss/dashboard.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>acss/font-awesome.min.css" rel="stylesheet" >    
        <link href="<?php echo base_url() ?>acss/toastr.min.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>acss/jquery-ui.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>acss/style.css" rel="stylesheet">

    </head>

    <body>
        <div id="sidebar_container"></div>
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="<?php echo base_url() ?>ajs/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="<?php echo base_url() ?>ajs/jquery-slim.min.js"><\/script>')</script>
        <script src="<?php echo base_url() ?>ajs/popper.js"></script>
        <script src="<?php echo base_url() ?>ajs/bootstrap.min.js"></script>

        <!-- Icons -->
        <script src="<?php echo base_url() ?>ajs/feather.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>ajs/jquery.3.3.1.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>ajs/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>ajs/dataTables.bootstrap4.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>ajs/jquery.min.js" type="text/javascript" ></script>
        <script src="<?php echo base_url() ?>ajs/toastr.min.js" type="text/javascript" ></script>
        <script src="<?php echo base_url() ?>ajs/popper.min.js" type="text/javascript" ></script>
        <script src="<?php echo base_url() ?>ajs/bootstrap.min.js" type="text/javascript" ></script>
        <script src="<?php echo base_url() ?>ajs/jquery-1.12.4.js" type="text/javascript" ></script>
        <script src="<?php echo base_url() ?>ajs/jquery-ui.js" type="text/javascript" ></script>
        <script type="text/javascript" >
                                            feather.replace()
        </script>
        <script>
            $(function(){
                $.ajax({
                        url: '<?php echo base_url() ?>'+'dashboard/dashboard/sidebar_view',
                        type: 'post',
                        data: {user_id: '<?php echo $user_id ?>', user_name : '<?php echo $user_name ?>', user_type : '<?php echo $user_type ?>'},
                        success: function(data) {
                            $('#sidebar_container').html(data);
                        },
                        error: function() {
                            $('#sidebar_container').text('An error occurred');
                        }
                    });
            })
//            function menu_change(_url) {
//                if (_url === 'donation') {
//                    var user_id= '<?php echo $user_id ?>';
//                    $.ajax({
//                        url: '<?php echo base_url() ?>' + _url,
//                        type: 'post',
//                        data: {user_id: user_id},
//                        success: function(data) {
//                            $('#container').html(data);
//                        },
//                        error: function() {
//                            $('#container').text('An error occurred');
//                        }
//                    });
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
//            }
//
//            function update_form_set(_url, id) {
//                $.ajax({
//                    url: '<?php echo base_url() ?>' + _url,
//                    type: 'post',
//                    data: {id: id},
//                    success: function(data) {
//                        $('#container').html(data);
//                    },
//                    error: function() {
//                        $('#container').text('An error occurred');
//                    }
//                });
//            }

            $(document).ready(function() {
                $('.datepick').datepicker({
                    changeMonth: true,
                    changeYear: true,
                    dateFormat: "yy-mm-dd"
                });
            });
        </script>
    </body>
</html>

