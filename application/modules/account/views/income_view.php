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
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
    <div class="" onclick="redirect()"><img class="back_btn" src="<?php echo base_url() ?>image/back.png" style="width: 50px; height: 50px; border-radius: 50%; background: #b1d4f2; position: relative; float: left; margin-top: 10px;box-shadow: 5px 5px 10px 0px #00bf72; cursor: pointer"></div>
    <div align="center" class="panel panel-default" style="width: 50%; height: 98%; margin: 10px; border: 1px solid black; box-shadow: 2px 2px 10px 10px #000000; opacity: 0.8;">
        <div class="panel-body" >
            <div style="width: 100%; float: left;" >
                <center><h1 style="">Income</h1></center>
                <div style="">
                    <form id="save" method="post" enctype="multipart/form-data">
                        <table  class="table">
                        <tr><td><span>Party Name</span></td><td><select name="party_name" id="party_name" class="form-control" onchange="names('party_name')" style="border-radius: 25px">
                                    <option value="">--select one--</option>
                                <?php
                                foreach ($partydropdown as $menu) {
                                    echo "<option value='" . $menu->name . "'>$menu->name</option>";
                                }
                                ?>
                                </select></td></tr>
                        <tr><td></td><td style="color:red;" id="party_name_error"></td></tr>
                        <tr><td><span>Category Name</span></td><td><select name="category_name" id="category_name" class="form-control" onchange="names('category_name')" style="border-radius: 25px">
                                    <option value="">--select one--</option>
                                <?php
                                foreach ($categorydropdown as $menu) {
                                    echo "<option value='" . $menu->name . "'>$menu->name</option>";
                                }
                                ?>
                                </select></td></tr>
                        <tr><td></td><td style="color:red;" id="category_name_error"></td></tr>
                        <tr><td><span>Particular's Name</span></td><td><input class="round_box" type="text" name="name" id="name" onkeyup="names('name')"/></td></tr>
                        <tr><td></td><td style="color:red;" id="name_error"></td></tr>
                        <tr><td><span>Date</span></td><td><input type="text" name="date" id="date" class="date round_box" onkeyup="names('date')" value="<?php echo date('Y-m-d')?>"/></td></tr>
                        <tr><td></td><td style="color:red;" id="date_error"></td></tr>
                        <tr><td><span>Unit</span></td><td><input class="round_box" type="text" name="unit" id="unit"/></td></tr>
                        <tr><td></td><td style="color:red;" id="_unit_error"></td></tr>
                        <tr><td><span>Rate</span></td><td><input class="round_box" type="text" name="rate" id="rate"/></td></tr>
                        <tr><td></td><td style="color:red;" id="rate_error"></td></tr>
                        <tr><td><span>Amount</span></td><td><input class="round_box" type="text" name="amount" id="amount" onkeyup="names('amount')"/></td></tr>
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
            var name = $.trim($('#name').val());
            var category_name = $.trim($('#category_name').val());
            var party_name = $.trim($('#party_name').val());
            var date = $.trim($('#date').val());
            var unit = $.trim($('#unit').val());
            var rate = $.trim($('#rate').val());
            var amount = $.trim($('#amount').val());
            if (name === '' || amount === '') {
                if (category_name === '') {
                    $('#category_name_error').html('Please Enter Category Name');
                    $('#category_name').css("border-color", "red");
                }
                if (party_name === '') {
                    $('#party_name_error').html('Please Enter Party Name');
                    $('#party_name').css("border-color", "red");
                }
                if (name === '') {
                    $('#name_error').html('Please Enter Particular\'s Name');
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
                    url: base_url + 'account/account/incomeSave',
                    method: 'post',
                    data: {category_name: category_name, party_name: party_name, name: name, date:date, unit: unit, rate: rate, amount: amount},
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
    function setTitle(headerName, val) {
        if (val == 1) {
            $("#headerName").html(headerName);
            $('#party_name').val("");
            $('#party_name_error').html('');
        } else if (val == 2) {
            $("#incomeExpenseHeaderName").html(headerName);
            $('#income_expense_name').val("");
            $('#income_expense_name_error').html('');
            $('#income_expense_unit').val("");
            $('#income_expense_unit_error').html('');
            $('#income_expense_rate').val("");
            $('#income_expense_rate_error').html('');
            $('#income_expense_amount').val("");
            $('#income_expense_amount_error').html('');
        }
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

