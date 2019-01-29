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
</style>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center" style="">
    <div class="" onclick="redirect()"><img class="back_btn" src="<?php echo base_url() ?>image/back.png" style=""></div>
    <div align="center" class="panel panel-default" style="width: 50%; height: 50%; margin: 10px; border: 1px solid black; box-shadow: 2px 2px 10px 10px #000000; opacity: 0.8">
        <div class="panel-body" >

            <div style="width: 100%; float: left;" >
                <center><h1 style="">Category</h1></center>
                <div style="">
                    <form id="save" method="post" enctype="multipart/form-data">
                        <table class="table">
                            <tr><td><span>Name</span></td><td><input type="text" name="name"  class="round_box" id="name" onkeyup="names('name')"/></td></tr>
                            <tr><td></td><td style="color:red;" id="name_error"></td></tr>
                            <tr><td><span>Category Type</span></td><td>
                                    <select name="category_type" id="category_type" class="form-control" onchange="names(id)" style="border-radius: 25px">
                                        <option value="">--select one--</option>
                                        <option value="INCOME">INCOME</option>
                                        <option value="EXPENSE">EXPENSE</option>
                                        <option value="OTHERS">OTHERS</option>
                                    </select>
                                </td></tr>
                            <tr><td></td><td style="color:red;" id="category_type_error"></td></tr>
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
            var category_type = $.trim($('#category_type').val());
            if (name === '' || category_type === '') {
                if (name === '') {
                    $('#name_error').html('Please Enter Name');
                    $('#name').css("border-color", "red");
                }
                if (category_type === '') {
                    $('#category_type_error').html('Please Choose Category Type');
                    $('#category_type').css("border-color", "red");
                }
            } else {
                $.ajax({
                    url: base_url + 'account/account/save',
                    method: 'post',
                    data: {name: name, category_type: category_type, header: 'category'},
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

