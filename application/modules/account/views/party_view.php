<?php
$this->load->view('head');
$x = 1;
$c;
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
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
    <div class="" onclick="redirect()"><img class="back_btn" src="<?php echo base_url() ?>image/back.png" style="width: 50px; height: 50px; border-radius: 50%; background: #b1d4f2; position: relative; float: left; margin-top: 10px;box-shadow: 5px 5px 10px 0px #00bf72; cursor: pointer"></div>
    <div align="center" class="panel panel-default" style="width: 50%; height: 50%; margin: 10px; border: 1px solid black; box-shadow: 2px 2px 10px 10px #000000; opacity: 0.8">
        <div class="panel-body" >
            <div style="width: 100%; float: left;" >
                <center><h1 style="">Party</h1></center>
                <div style="">
                    <form id="save" method="post" enctype="multipart/form-data">
                        <table class="table">
                            <tr><td><span>Name</span></td><td><input type="text" name="name"  class="round_box" id="name" onkeyup="names('name')"/></td></tr>
                            <tr><td></td><td style="color:red;" id="name_error"></td></tr>
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
            if (name === '') {
                $('#name_error').html('Please Enter Name');
                $('#name').css("border-color", "red");
            } else {
                $.ajax({
                    url: base_url + 'account/account/save',
                    method: 'post',
                    data: {name: name, header: 'party'},
                    success: function() {
                        alert("Saved successfully");
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

