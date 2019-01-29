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
        <button class="btn btn-lg btn-success" onclick="menu_change('designation')">View</button>
        <br/>
        <br/>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div id="message"></div>
                <div class="card">
                    <div class="card-header">Designation</div>

                    <div class="card-body">
                        <form name="add_designation_form" >
                            <input id="designation_id" type="hidden" class="form-control" name="designation_id" value="<?php echo $designation_id ?>" required autofocus>
                            <div class="form-group row">
                                <label for="designation" class="col-md-4 col-form-label text-md-right">Designation Name</label>

                                <div class="col-md-6">
                                    <input id="designation" type="text" class="form-control" name="designation" value="<?php echo $designation ?>" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row">                                                       
                                <label for="short_form" class="col-md-4 col-form-label text-md-right">Short Form</label>

                                <div class="col-md-6">
                                    <input id="short_form" type="text" class="form-control" name="short_form" value="<?php echo $short_form ?>" required autofocus>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Status</label>

                                <div class="col-md-6">
                                    <select id="status" type="status" class="form-control" name="status" required>
                                        <option value="<?php echo $status ?>"><?php echo ($status == 1) ? "Active" : "Inactive"; ?></option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <a class="btn btn-primary" onclick="edit_designation()">Update</a>
                                </div>
                            </div>
                        </form>
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
            var designation = $('#designation').val();
            var short_form = $('#short_form').val();
            var status = $('#status').val();
            $.ajax({
                url: '<?php echo base_url() ?>' + "designation/designation/edit",
                type: 'post',
                data: {designation_id: designation_id, designation: designation, short_form: short_form , status: status},
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
        if ($('#designation').val() === "") {
            var ele = '<div class="alert alert-warning alert-dismissible fade show col-md-12" role="alert">Designation must be filled up.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
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

