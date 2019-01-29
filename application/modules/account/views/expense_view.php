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
        color: black;
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
    <div align="center" class="panel panel-default" style="width: 50%; height: 90%; margin: 10px; border: 1px solid black; box-shadow: 2px 2px 10px 10px #000000; opacity: 0.8;">
        <div class="panel-body" >
            <div style="width: 100%; float: left;" >
                <center><h1 style="">Expense</h1></center>
                <div style="">
                    <form id="save" method="post" enctype="multipart/form-data">
                        <table  class="table">
                            <tr><td><span>Category Name</span></td><td><select name="category_name" id="category_name" class="form-control" onchange="names('category_name')" style="border-radius: 25px">
                                    <option value="">--select one--</option>
                                <?php
                                foreach ($categorydropdown as $menu) {
                                    echo "<option value='" . $menu->name . "'>$menu->name</option>";
                                }
                                ?>
                                </select></td></tr>
                            <tr><td></td><td style="color:red;" id="category_name_error"></td></tr>
                            <tr><td><span>Sector of Expense</span></td><td><input class="round_box" type="text" name="name" id="name" onkeyup="names(id)"/></td></tr>
                            <tr><td></td><td style="color:red;" id="name_error"></td></tr>
                            <tr><td><span>Date</span></td><td><input type="text" name="date" id="date" class="date round_box" onkeyup="names(id)" value="<?php echo date('Y-m-d') ?>"/></td></tr>
                            <tr><td></td><td style="color:red;" id="date_error"></td></tr>
                            <tr><td><span>Unit</span></td><td><input class="round_box" type="text" name="unit" id="unit"/></td></tr>
                            <tr><td></td><td style="color:red;" id="unit_error"></td></tr>
                            <tr><td><span>Rate</span></td><td><input class="round_box" type="text" name="rate" id="rate"/></td></tr>
                            <tr><td></td><td style="color:red;" id="rate_error"></td></tr>
                            <tr><td><span>Amount</span></td><td><input class="round_box" type="text" name="amount" id="amount" onkeyup="names(id)"/></td></tr>
                            <tr><td></td><td style="color:red;" id="amount_error"></td></tr>
                            <tr><td></td><td><button type="submit" class="btn-sm btn btn-primary round_btn">Save</button></td></tr>
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
            var category_name = $.trim($('#category_name').val());
            var name = $.trim($('#name').val());
            var date = $.trim($('#date').val());
            var unit = $.trim($('#unit').val());
            var rate = $.trim($('#rate').val());
            var amount = $.trim($('#amount').val());
            if (name === '' || date==='' ||amount === '' || category_name === '') {
                if (category_name === '') {
                    $('#category_name_error').html('Please Choose Category Name');
                    $('#category_name').css("border-color", "red");
                }
                if (name === '') {
                    $('#name_error').html('Please Enter Name');
                    $('#name').css("border-color", "red");
                }
                if (date === '') {
                    $('#date_error').html('Please Choose Date');
                    $('#date').css("border-color", "red");
                }
                if (amount === '') {
                    $('#amount_error').html('Please Enter Amount');
                    $('#amount').css("border-color", "red");
                }
            } else {
                $.ajax({
                    url: base_url + 'account/account/expenseSave',
                    method: 'post',
                    data: {category_name: category_name, name: name, date:date, unit: unit, rate: rate, amount: amount},
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

