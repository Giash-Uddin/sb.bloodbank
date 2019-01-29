<?php
$this->load->view('head');
?>
<style>
    .round_box{
        border: 1px solid black;
        border-radius: 25px;
        padding: 15px; 
        width: 100%;
        height: 15px;    
    }
    .round_btn{
        border: 2px solid black;
        border-radius: 5px;  
        width: 100%;
    }
    .back_btn:hover{
        background: #009999;
        -ms-transform: scale(1, 1.1); /* IE 9 */
        -webkit-transform: scale(1, 1.1); /* Safari */
        transform: scale(1, 1.1);
    }
</style>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center" style="">
    <div class="" onclick="redirect()"><img class="back_btn" src="<?php echo base_url() ?>image/back.png" style="width: 50px; height: 50px; border-radius: 50%; background: #b1d4f2; position: relative; float: left; margin-top: 10px;box-shadow: 5px 5px 10px 0px #00bf72; cursor: pointer"></div>
    <div align="center" class="panel panel-default" style="width: 50%; height: 50%; margin: 10px; border: 1px solid black; box-shadow: 2px 2px 10px 10px #000000; opacity: 0.8">
        <div class="panel-body" >

            <div style="width: 100%; float: left;" >
                <center><h1 style="">Create User</h1></center>
                <div style="">
                    <form id="save" method="post" enctype="multipart/form-data">
                        <table class="table">
                            <tr><td><span>Name</span></td><td><input type="text" name="name"  class="round_box" id="name" onkeyup="names(id)"/></td></tr>
                            <tr><td></td><td style="color:red;" id="name_error"></td></tr>
                            <tr><td><span>Password</span></td><td><input type="text" name="password"  class="round_box" id="password" onkeyup="names(id)"/></td></tr>
                            <tr><td></td><td style="color:red;" id="password_error"></td></tr>
                            <tr><td><span>Status</span></td><td><select name="user_type" id="user_type" class="form-control" onchange="names(id)" style="border-radius: 25px">
                                        <option value="">--Select One--</option>
                                        <option value="SUPER ADMIN">SUPER ADMIN</option>
                                        <option value="ADMIN">ADMIN</option>
                                        <option value="GENERAL">GENERAL</option>
                                        <option value="OTHER">OTHER</option>
                                    </select></td></tr>
                            <tr><td></td><td style="color:red;" id="user_type_error"></td></tr>
                            <tr><td><span>Status</span></td><td><select name="status" id="status" class="form-control" style="border-radius: 25px">
                                        <option value="ACTIVE">ACTIVE</option>
                                        <option value="INACTIVE">INACTIVE</option>
                                    </select></td></tr>
                            <tr><td></td><td><button type="submit" class="btn-md btn btn-primary round_btn">Save</button></td></tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

<script>
    $(document).ready(function() {
        var base_url = "<?php echo base_url() ?>";
        $('#save').submit(function(e) {
            e.preventDefault();
            var name = $.trim($('#name').val());
            var password = $.trim($('#password').val());
            var user_type = $.trim($('#user_type').val());
            var status = $.trim($('#status').val());
            if (name === ''|| password === '' || user_type === '') {
                if (name === '') {
                    $('#name_error').html('Please Enter User Name');
                    $('#name').css("border-color", "red");
                }
                if (password === '') {
                    $('#password_error').html('Please Enter Password');
                    $('#password').css("border-color", "red");
                }
                if (user_type === '') {
                    $('#user_type_error').html('Please Choose User Type');
                    $('#user_type').css("border-color", "red");
                }
            } else {
                $.ajax({
                    url: base_url + 'account/account/userSave',
                    method: 'post',
                    data: {name: name, password: password, user_type: user_type, status: status},
                    success: function() {
                        alert("Saved successfully");
                    },
                    error: function(){
                        alert("Data not Saved");
                    }
                })
            }
        });
    });
    function redirect() {
        window.location = '<?php echo base_url() ?>account/account/vieww';
    }
    function names(id) {
        var val = $.trim($('#' + id).val());
        if (val === '') {
            $('#' + id + '_error').html('');
            $('#' + id).css('border-color', 'red');
        } else {
            $('#' + id + '_error').html('');
            $('#' + id).css('border-color', '');
        }
    }
</script>

