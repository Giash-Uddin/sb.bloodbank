<?php
//$this->load->view('head');
$user_type = $this->session->userdata('user_type');
?>
<style>

</style>

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

