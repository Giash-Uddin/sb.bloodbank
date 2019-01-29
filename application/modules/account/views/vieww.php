<?php
$this->load->view('head');
$user_type = $this->session->userdata('user_type');
?>
<style>
    .gradient-background{
        height: 30px;
        padding : 5px;
        border-radius: 20px;
        margin-top: 5px;
        opacity: 0.8;
        background-image: radial-gradient(circle, #fafbfb, #c8dcdf, #98bcc9, #6d9cb6, #467ba3);
        font-size: 1.5em;
    }
    .gradient-background:hover{
        opacity: 1;
        cursor: pointer;
        box-shadow: 5px 5px 20px 0px #051937;
        -ms-transform: scale(1, 1.1); /* IE 9 */
        -webkit-transform: scale(1, 1.1); /* Safari */
        transform: scale(1, 1.1);
    }
    .round_box{
        border: 1px solid black;
        border-radius: 25px;
        padding: 15px; 
        width: 100%;
        height: 15px; 
        color: black;
        margin: 2px;
    }
    .round_btn{
        border: 2px solid black;
        border-radius: 5px;  
        width: 100%;
        margin: 2px;
    }
    .div-design{
        padding: 5px;
        color: #FFFFFF;
    }
</style>
<div class="" align="center" style="padding-top: 20px;">

    <div class="container" >
        <div align="center" class="" style="width: 70%; margin-top: 10px;">
            <div class="panel-body" >
                <div class="row" align="center" >
                    <div class="col-lg-3 col-md-3 col-sm-3 text-center" onclick="redirect('category_view')">
                        <div class="gradient-background">
                            Category
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 text-center" onclick="redirect('party_view')">
                        <div class="gradient-background">
                            Party
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 text-center" onclick="redirect('income_view')">
                        <div class="gradient-background">
                            Income
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 text-center" onclick="redirect('expense_view')">
                        <div class="gradient-background">
                            Expense
                        </div>
                    </div>
                </div>
                <div class="row" align="center" >
                    <div class="col-lg-3 col-md-3 col-sm-3 text-center" onclick="redirect('category_show')">
                        <div class="gradient-background">
                            Show Category
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 text-center" onclick="redirect('party_show')">
                        <div class="gradient-background">
                            Show Party
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 text-center" onclick="redirect('income_show')">
                        <div class="gradient-background">
                            Show Income
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 text-center" onclick="redirect('expense_show')">
                        <div class="gradient-background">
                            Show Expense
                        </div>
                    </div>
                </div>
                <div class="row" align="center">
                    <div class="col-lg-3 col-md-3 col-sm-3 text-center" data-toggle="modal" data-target="#exampleModal" onclick="">
                        <div class="gradient-background">
                            Balance
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 text-center" data-toggle="modal" data-target="#incomeModal">
                        <div class="gradient-background">
                            Income Report
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 text-center" data-toggle="modal" data-target="#expenseModal">
                        <div class="gradient-background">
                            Expense Report
                        </div>
                    </div>
                </div>
                <?php if ($user_type == "SUPER ADMIN") { ?>
                    <div class="row" align="center" >
                        <div class="col-lg-3 col-md-3 col-sm-3 text-center" onclick="redirect('user_view')">
                            <div class="gradient-background">
                                Create User
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 text-center" onclick="redirect('user_show')">
                            <div class="gradient-background">
                                Show User
                            </div>
                        </div>
                    </div> 
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="container">
        <div align="center" class="" style="width: 70%; margin-top:">
            <div class="" id="table-container">

            </div>
        </div>
    </div>
</div>
</body>
<div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="opacity:0.8">
    <div class="modal-dialog modal-sm">
        <div class="modal-content" style="padding : 20px; background: #f7e1b5;">
            <div class="modal-header" style="background: #f7e1b5; border-radius: 5px;">Date
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" style="background: #467ba3; border-radius: 20px;">
                <div class="" id="date-box">
                    <div class="div-design">
                        From Date
                    </div>
                    <div ><input type="text" name="balanceFromdate" id="balanceFromdate" class="date round_box" value=""/>
                    </div>
                    <div class="div-design">
                        To Date
                    </div>
                    <div>
                        <input type="text" name="balanceTodate" id="balanceTodate" class="date round_box" value=""/>
                    </div>

                </div>
            </div>
            <div class="modal-footer" id="second-footer">
                <button class="btn btn-xs btn-sm btn-success round_btn close" data-dismiss="modal" onclick="report_generate()">Generate</button>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="expenseModal" tabindex="-1" role="dialog" aria-labelledby="expenseModalLabel" aria-hidden="true" style="opacity:0.8">
    <div class="modal-dialog modal-sm">
        <div class="modal-content" style="padding : 20px; background: #f7e1b5;">
            <div class="modal-header" style="background: #f7e1b5; border-radius: 5px;">Date
                <button type="button" class="close" id="expenseModalbtn" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" style="background: #467ba3; border-radius: 20px;">
                <div class="" id="date-box">
                    <div class="div-design">
                        From Date
                    </div>
                    <div ><input type="text" name="expenseFromdate" id="expenseFromdate" class="date round_box" value=""/>
                    </div>
                    <div class="div-design">
                        To Date
                    </div>
                    <div>
                        <input type="text" name="expenseTodate" id="expenseTodate" class="date round_box" value=""/>
                    </div>

                </div>
            </div>
            <div class="modal-footer" id="second-footer">
                <button class="btn btn-xs btn-sm btn-success round_btn close" data-dismiss="modal" onclick="expense_report_generate()">Generate</button>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="incomeModal" tabindex="-1" role="dialog" aria-labelledby="incomeModalLabel" aria-hidden="true" style="opacity:0.8">
    <div class="modal-dialog modal-sm">
        <div class="modal-content" style="padding : 20px; background: #f7e1b5;">
            <div class="modal-header" style="background: #f7e1b5; border-radius: 5px;">Date
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" style="background: #467ba3; border-radius: 20px;">
                <div>
                    <div class="div-design">
                        Category
                    </div>
                    <div>
                        <select name="category_name" id="category_name" class="form-control">
                            <option value="">--select one--</option>
                            <?php
                            foreach ($categorydropdown as $menu) {
                                echo "<option value='" . $menu->name . "'>$menu->name</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="div-design">
                        Party
                    </div>
                    <div class="div-design">
                        <select name="party_name" id="party_name" class="form-control">
                            <option value="">--select one--</option>
                            <?php
                            foreach ($partydropdown as $menu) {
                                echo "<option value='" . $menu->name . "'>$menu->name</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="div-design">
                        From Date
                    </div>
                    <div>
                        <input type="text" name="incomeFromDate" id="incomeFromDate" class="date round_box" value=""/>
                    </div>
                    <div class="div-design">
                        To Date
                    </div>
                    <div>
                        <input type="text" name="incomeToDate" id="incomeToDate" class="date round_box" value=""/>
                    </div>
                </div>
                <div class="modal-footer" id="second-footer">
                    <button class="btn btn-xs btn-sm btn-success round_btn close" data-dismiss="modal" onclick="income_report_generate()">Generate</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        var base_url = "<?php echo base_url() ?>";
        function redirect(pagemethod) {
            window.location = base_url + 'account/account/' + pagemethod;
        }
        function report_view() {
            window.location = '<?php echo base_url(); ?>account/account/report_view';
        }
        function dateUsed() {
            $("#msg").hide();
            $("#date-box").show();
            $("#second-footer").show();
            $("#first-footer").hide();

        }
        function dateNotUsed() {
            $("#msg").hide();
            $("#date-box").hide();
            $("#second-footer").show();
            $("#first-footer").hide();
        }
        function dateFunction() {
            $("#balanceFromdate").val("");
            $("#balanceTodate").val("");
        }
        function report_generate() {
            var fromdate = $("#balanceFromdate").val();
            var todate = $("#balanceTodate").val();
            $.ajax({
                url: base_url + 'account/account/report_view',
                method: 'post',
                data: {fromdate: fromdate, todate: todate},
                success: function(data) {
                    dateFunction();
                    $('#table-container').html(data);
                }
            })
        }
        function income_report_generate() {
            var category = $("#category_name").val();
            var party = $("#party_name").val();
            var fromdate = $("#incomeFromDate").val();
            var todate = $("#incomeToDate").val();
            $.ajax({
                url: base_url + 'account/account/income_report_view',
                method: 'post',
                data: {category: category, party: party, fromdate: fromdate, todate: todate},
                success: function(data) {
                    dateFunction();
                    $('#table-container').html(data);
                }
            })
        }
        function expense_report_generate() {
            var fromdate = $("#expenseFromdate").val();
            var todate = $("#expenseTodate").val();
            $.ajax({
                url: base_url + 'account/account/expense_report_view',
                method: 'post',
                data: {fromdate: fromdate, todate: todate},
                success: function(data) {
                    dateFunction();
                    $('#table-container').html(data);
                }
            })
        }

        $(document).ready(function() {
            $('#expense').click(function(e) {
                e.preventDefault();
                var fromdate = $("#expenseFromdate").val();
                var todate = $("#expenseTodate").val();
                $.ajax({
                    url: base_url + 'account/account/expense_report_view',
                    method: 'post',
                    data: {fromdate: fromdate, todate: todate},
                    success: function(data) {
                        $("#expenseModal").modal("hide");
                        dateFunction();
                        $('#table-container').html(data);
                    }
                })

            });
        });
    </script>

