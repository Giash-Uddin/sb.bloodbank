<?php
foreach ($designation as $brnch) {
    $designation_id = $brnch->designation_id;
    $designation = $brnch->designation;
    $short_form = $brnch->short_form;
    $status = $brnch->status;
}
?>
<section id="add_designation">
    <div class="container">
        <button class="btn btn-lg btn-success" onclick="menu_change('designation')">Back</button>
        <br/>
        <br/>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div id="message"></div>
                <div class="card">
                    <div class="card-header">Designation</div>

                    <div class="card-body">
                        <table width="100%" class="table table-light table-hover table-bordered">
                            <tr>
                                <th >Designation</th>
                                <td><?php echo $designation ?></td>
                            </tr>
                            <tr>
                                <th >Short Form</th>
                                <td><?php echo $short_form ?></td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td><?php echo ($status == 1) ? "Active" : "Inactive"; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
    var base_url = "<?php echo base_url() ?>";
    function edit_designation() {
        if (isValid()) {
            var designation_id = $('#designation_id').val();
            var name = $('#name').val();
            var status = $('#status').val();
            $.ajax({
                url: '<?php echo base_url() ?>' + "designation/designation/edit",
                type: 'post',
                data: {designation_id: designation_id, name: name, status: status},
                success: function(data) {
                    toastr.success('Updated successfully', 'Success', {timeOut: 3000});
                    $.ajax({
                        url: '<?php echo base_url() ?>' + "designation",
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
                    toastr.error('Data not updated', 'Failed', {timeOut: 3000});
                    $('#container').text('An error occurred');
                }
            });
        }
    }
    function isValid() {
        if ($('#name').val() === "") {
            var ele = '<div class="alert alert-warning alert-dismissible fade show col-md-12" role="alert">Designation Name must be filled up.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            $('#message').append(ele);
            setTimeout(function() {
                $('#message > div').remove();
            }, 3000);
            return false;
        } else {
            return true;
        }
    }
</script>

