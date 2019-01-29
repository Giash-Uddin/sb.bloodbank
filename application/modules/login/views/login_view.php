<!DOCTYPE html>
<html>
    <head>
        <title>Sb.bloodbank</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="<?php echo base_url()?>acss/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url()?>acss/style.css">
        <script src="<?php echo base_url()?>js/jquery.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>js/bootstrap.min.js" type="text/javascript"></script>
        <style>
            .table th {
                border-top: none !important;
                border-bottom: none;
            }
            .table td {
                border-top: none !important;
                border-bottom: none;
            }
            table th{
                border-top: none !important;
                border-bottom: none;
            }
            body{
                background: #56647F;
            }
            #head{
                background: #254A81;
                color: #ffffff;
                padding-left: 5%;
                font-weight: bold;
            }
            .btn{
                width: 100px;
            }
            .btn-primary{
                background: #0364bf;
            }
        </style>
    </head>
    <body >
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="head"><h2>OHEE ENGINEERING</h2></div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-top: 10%">
            <div class="col-lg-4 col-md-4"></div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" style="background:#007fbf; padding-top: 15px">
                <table class="table">
                    <tr><td></td><td style="color:red; font-weight: bold;"><?php echo @$message;?></td></tr>
                    <?php echo form_open_multipart('login/checkLogin');?>
                    <tr>
                        <th style="color: white"><span class="glyphicon glyphicon-user"></span> User Name<br>
                            </th>
                        <td>
                            <input type="text" name="user_name" class="form-control" id="user_name" placeholder="User Name">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="color:red; font-weight: bold;"><?php echo form_error('user_name');?></td>
                    </tr>
                    <tr>
                        <th style="color: white"><span class="glyphicon glyphicon-lock"></span> Password<br>
                            </th>
                        <td>
                            <input name="user_pass" type="password" class="form-control" id="password" placeholder="Password">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="color:red; font-weight: bold;"><?php echo form_error('user_pass');?></td>
                    </tr>
                </table>
                <table class="table">
                    <tr>
                        <th style="color:white">Forgot Password?</th>
                        <td>
                            <button type="submit" name="submit" class="btn btn-primary btn-sm" id="ok" style="float: right">Login</button>
                        </td>
                    </tr>
                </table>
            </div>



        </div>
        <div class="col-lg-4 col-md-4"></div>

        <script>
            $(document).ready(function () {
                $('#ok').click(function () {
                    var user_name = $('#user_name').val();
                    var password = $('#password').val();
                    if (user_name == '') {
                        $('#user_name_warning').html('You must fill this field');
                    }
                    if (password == '') {
                        $('#password_warning').html('You must fill this field');
                    }
                })
            })
        </script>
    </body>

</html>
