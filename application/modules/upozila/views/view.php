<?php
$user_type = $this->session->userdata('user_type');
?>
<section id="upozila_manage">
    <div class="container">
        <button class="btn btn-lg btn-success" onclick="menu_change('upozila/upozila/addUpozila')">Add Upozila</button>
        <br/>
        <br/>
        <div class="row justify-content-center">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Upozila</div>
                    <div class="card-body">
                        <table id="myDatatable" class="table example table-hover dataTable" border="1" cellspacing="0" width="99%">
                            <thead>
                                <tr style="background-color: #cccccc; color: white">
                                    <th class="text-center">SL No</th>
                                    <th class="text-center">District Name</th>
                                    <th class="text-center">Upozila Name</th>
                                    <th class="text-center">Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $x = 1;
                                foreach ($upozila as $row) {
                                    ?>  
                                    <tr id="<?php echo $row->upozila_id ?>">
                                        <td class="text-center"><?php echo $x++; ?></td>
                                        <td class="text-center"><?php echo $row->district_name; ?></td>
                                        <td class="text-center"><?php echo $row->name; ?></td>
                                        <td class="text-center"><?php echo ($row->status == 1) ? "Active" : "Inactive"; ?></td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <button class="btn btn-md btn-success" id="<?php echo $row->upozila_id ?>" style="border-radius: 50%;" onclick="update_form_set('upozila/upozila/display', id)""><span class="fa fa-user"></span></button>
                                                <button class="<?php echo ($row->status == 1) ? "btn btn-md btn-warning" : "btn btn-md btn-danger" ?>" id="<?php echo $row->upozila_id ?>" style="border-radius: 50%;" onclick="activate_upozila(id)"><?php echo ($row->status == 1) ? "<i class='fa fa-check'></i>" : "<i class='fa fa-remove'></i>" ?></button>
                                                <button class="btn btn-md btn-primary" id="<?php echo $row->upozila_id ?>" style="border-radius: 50%;" onclick="update_form_set('upozila/upozila/editView', id)"><i class="fa fa-pencil"></i></button>
                                                <button class="btn btn-md btn-danger" id="<?php echo $row->upozila_id ?>" style="border-radius: 50%;" onclick="delete_upozila(id)"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    var base_url = "<?php echo base_url() ?>";
    function delete_upozila(id) {
        $.ajax({
            url: '<?php echo base_url() ?>upozila/upozila/delete',
            type: 'post',
            data: {upozila_id: id},
            success: function(data) {
                toastr.success('Upozila removed successfully', 'Success', {timeOut: 3000});
                $.ajax({
                    url: '<?php echo base_url() ?>' + "upozila",
                    type: 'get',
                    success: function(data) {
                        $('#container').html(data);
                    },
                    error: function() {
                        $('#container').text('An error occurred');
                    }
                });
            },
            error: function() {
                toastr.error('Upozila is not removed', 'Failed', {timeOut: 3000});
                $('#container').text('An error occurred');
            }
        });
    }
    function activate_upozila(id) {
        $.ajax({
            url: '<?php echo base_url() ?>upozila/upozila/activate',
            type: 'post',
            data: {upozila_id: id},
            success: function(data) {
                toastr.info('Upozila activated successfully', 'Success', {timeOut: 3000});
                $.ajax({
                    url: '<?php echo base_url() ?>' + "upozila",
                    type: 'get',
                    success: function(data) {
                        $('#container').html(data);
                    },
                    error: function() {
                        $('#container').text('An error occurred');
                    }
                });
            },
            error: function() {
                toastr.waring('Upozila Deactivated', 'Warning', {timeOut: 3000});
                $('#container').text('An error occurred');
            }
        });
    }
//==================================================================
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
        $('#upozila_table').DataTable();
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

