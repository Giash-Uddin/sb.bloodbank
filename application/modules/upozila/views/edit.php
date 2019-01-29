<?php
$name;
$status;
$upozila_id;
foreach ($upozila as $brnch) {
    $upozila_id = $brnch->upozila_id;
    $name = $brnch->name;
    $status = $brnch->status;
}
?>
<section id="add_upozila">
    <div class="container">
        <button class="btn btn-lg btn-success" onclick="menu_change('upozila')">View</button>
        <br/>
        <br/>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div id="message"></div>
                <div class="card">
                    <div class="card-header">Upozila</div>

                    <div class="card-body">
                        <form name="add_upozila_form" >
                            <input id="upozila_id" type="hidden" class="form-control" name="upozila_id" value="<?php echo $upozila_id ?>" required autofocus>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Upozila Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="<?php echo $name ?>" required autofocus>

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
                                    <a class="btn btn-primary" onclick="edit_upozila()">Update</a>
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
    function edit_upozila() {
        if (isValid()) {
            var upozila_id = $('#upozila_id').val();
            var name = $('#name').val();
            var status = $('#status').val();
            $.ajax({
                url: '<?php echo base_url() ?>' + "upozila/upozila/edit",
                type: 'post',
                data: {upozila_id: upozila_id, name: name, status: status},
                success: function(data) {
                    toastr.success('Updated successfully', 'Success', {timeOut: 3000});
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
                    toastr.error('Data not updated', 'Failed', {timeOut: 3000});
                    $('#container').text('An error occurred');
                }
            });
        }
    }
    function isValid() {
        if ($('#name').val() === "") {
            var ele = '<div class="alert alert-warning alert-dismissible fade show col-md-12" role="alert">Upozila Name must be filled up.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
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

