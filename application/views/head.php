<?php
@session_start();
if (!$this->session->userdata('user_id')) {
        redirect("login");
}
?>
<?php
$user_name = $this->load->session->userdata('user_name');
$user_id = $this->session->userdata('user_id');
?> 
<!DOCTYPE html>
<!--<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ohee </title>
    <link rel="stylesheet" href="<?php echo base_url() ?>acss/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>acss/style.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>jquery-ui-1.11.4.custom/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>acss/datatables.css"/>
    <script src="<?php echo base_url() ?>ajs/jquery-2.1.4.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>ajs/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>jquery-ui-1.11.4.custom/jquery-ui.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>ajs/jquery-ui.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>ajs/datatables.js"></script>
    <script src="<?php echo base_url() ?>ajs/jquery.battatech.excelexport.min.js"></script>

    <link rel="stylesheet" href="<?php echo base_url() ?>acss/menu_left.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>acss/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>acss/font-awesome.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>acss/leftmenu.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>acss/pie_chart_css/ext-all.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>acss/pie_chart_css/example.css" />

   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>ajs/left_menu.js"></script>
    <?php echo link_tag('acss/jquery-ui.css'); ?>
    <script src="<?php echo base_url(); ?>ajs/jquery-1.10.2.js"></script>
    <script src="<?php echo base_url() ?>ajs/jquery.canvasjs.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>ajs/pie_chart_js/ext-all.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>ajs/pie_chart_js/example-data.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>ajs/pie_chart_js/Pie.js"></script>

    <script>
        $(function() {
            $("#accordion > li > div").click(function() {

                if (false == $(this).next().is(':visible')) {
                    $('#accordion ul').slideUp(300);
                }
                $(this).next().slideToggle(300);
            });

//            $('#accordion ul:eq(0)').show();
        });

    </script>
    <script src="<?php echo base_url(); ?>ajs/ckeditor/ckeditor.js"></script>
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
    </script>
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor2');
    </script>

    <script type="text/javascript">

        jQuery(document).ready(function() {
            $('#pages_name').autocomplete({
                source: '<?php echo base_url(); ?>apages/Pages/selectmyLink',
                minLength: 0,
                delay: 500

            });
        });

    </script>
    <script type="text/javascript">

        jQuery(document).ready(function() {
            $('#pages_title').autocomplete({source: '<?php echo base_url(); ?>apages/Pages/selectmyPages', minLength: 0, delay: 2});
        });

    </script> 
    <script>
        $(function() {
            $("#datepicker").datepicker({
                changeMonth: true,
                changeYear: true
            });
        });
    </script>
    <script>
         $(function() {
         $( "#datepicker1" ).datepicker({
            changeMonth: true,
            changeYear: true
          });
         });
    </script>
     <script>
         $(function() {
         $( "#datepicker2" ).datepicker({
            changeMonth: true,
            changeYear: true
          });
         });
    </script>
    <script>
        $(document).ready(function() {
            $('#example1').DataTable({
                responsive: true
            });
            $('#date').datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: "yy-mm-dd"
            });
            $('.date').datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: "yy-mm-dd"
            });
            $('.date1').datepicker({
                minDate: 0,
                changeMonth: true,
                changeYear: true,
                dateFormat: "yy-mm-dd"
            });
        });
        function logOut(){
            window.location = '<?php echo base_url(); ?>login/login/logOut';
        }
    </script>

    <script type="text/javascript">

        var enforceModalFocusFn = $.fn.modal.Constructor.prototype.enforceFocus;

        $.fn.modal.Constructor.prototype.enforceFocus = function() {
        };

        $confModal.on('hidden', function() {
            $.fn.modal.Constructor.prototype.enforceFocus = enforceModalFocusFn;
        });

        $confModal.modal({backdrop: false});
    </script>
    <style>
        .ui-datepicker {
            border: 1px solid #555;
            color: #EEE;
        }
        .ui-datepicker select.ui-datepicker-month, .ui-datepicker select.ui-datepicker-year {
            color: black;
            font-size: 16px;
            font-weight: bold;
        }
        @media (max-width: 992px) {
            .navbar-header {
                float: none;
            }
            .navbar-left,.navbar-right {
                float: none !important;
            }
            .navbar-toggle {
                display: block;
            }
            .navbar-collapse {
                border-top: 1px solid transparent;
                box-shadow: inset 0 1px 0 rgba(255,255,255,0.1);
            }
            .navbar-fixed-top {
                top: 0;
                border-width: 0 0 1px;
            }
            .navbar-collapse.collapse {
                display: none!important;
            }
            .navbar-nav {
                float: none!important;
                margin-top: 7.5px;
            }
            .navbar-nav>li {
                float: none;
            }
            .navbar-nav>li>a {
                padding-top: 10px;
                padding-bottom: 10px;
            }
            .collapse.in{
                display:block !important;
            }

        }

        th{
            font-family: verdana;
            font-weight: bold;
            text-align: right;
        }
        
        .back_btn{
        width: 50px; 
        height: 50px; 
        border-radius: 100%; 
        background: #b1d4f2; 
        position: relative; 
        float: left; 
        margin-top: 10px;
        box-shadow: 5px 5px 10px 0px #00bf72; 
        cursor: pointer
    }
    .back_btn:hover{
        background: #009999;
        -ms-transform: scale(1, 1.1); /* IE 9 */
        -webkit-transform: scale(1, 1.1); /* Safari */
        transform: scale(1, 1.1);
    }
    .logout_btn{
        width: 100px; 
        height: 50px; 
        padding-top: 10px;
        padding-left: 20px;
        border-radius: 40%; 
        background: #b1d4f2; 
        position: relative; 
        float: left; 
        margin-top: 5px;
        box-shadow: 5px 5px 10px 0px #00bf72; 
        cursor: pointer;
        float: right;
        font-size: 1.5em;
    }
    .logout_btn:hover{
        background: #009999;
        -ms-transform: scale(1, 1.1); /* IE 9 */
        -webkit-transform: scale(1, 1.1); /* Safari */
        transform: scale(1, 1.1);
    }
    </style>

</head>
<body id="body" style="height: 100%; background: linear-gradient(to left, #73c8a9 , #373b44);"> 
 
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <nav class="navbar navbar-inverse navbar-fixed-top " style="z-index:2">               
            <div class="navbar-header">
                <a class="navbar-brand" href="#">OHEE ENGINEERING</a>
            </div> 
            <div class="logout_btn" onclick="logOut()">Log Out</div>
        </nav>         
    </div>
    <div class="col-lg-12 col-md-12 row" style="padding-top: 80px"></div>-->
