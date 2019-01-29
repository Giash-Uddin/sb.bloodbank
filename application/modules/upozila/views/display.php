<?php
foreach ($upozila as $brnch) {
    $upozila_id = $brnch->upozila_id;
    $district_name = $brnch->district_name;
    $name = $brnch->name;
    $status = $brnch->status;
}
?>
<section id="add_upozila">
    <div class="container">
        <button class="btn btn-lg btn-success" onclick="menu_change('upozila')">Back</button>
        <br/>
        <br/>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div id="message"></div>
                <div class="card">
                    <div class="card-header">Upozila</div>

                    <div class="card-body">
                        <table width="100%" class="table table-light table-hover table-bordered">
                            <tr>
                                <th >District Name</th>
                                <td><?php echo $district_name ?></td>
                            </tr>
                            <tr>
                                <th >Upozila Name</th>
                                <td><?php echo $name ?></td>
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

