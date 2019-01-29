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
                        <form name="add_upozila_form" id="add_upozila_form">
                            <!--<form name="registration_form">-->
                            <div class="form-group row">
                                <label for="district" class="col-md-4 col-form-label text-md-right">District Name</label>
                                <div class="col-md-6">
                                    <select name="district_id" id="district_id" class="form-control">
                                        <option value="">--select one--</option>
                                        <?php
                                        foreach ($district as $menu) {
                                            echo "<option value='" . $menu->district_id . "'>$menu->name</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Upozila Name</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Status</label>
                                <div class="col-md-6">
                                    <select id="status" type="status" class="form-control" name="status" required>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <a class="btn btn-primary" onclick="add_upozila()">Save</a>
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
    function add_upozila() {
        if (isValid()) {
            var district_id = $('#district_id').val();
            var name = $('#name').val();
            var status = $('#status').val();
            $.ajax({
                url: '<?php echo base_url() ?>' + "upozila/upozila/save",
                type: 'post',
                data: {name: name, district_id: district_id, status: status},
                success: function(data) {
                    toastr.success('Upozila added successfully', 'Success', {timeOut: 3000});
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
                    toastr.error('Upozila is not added', 'Failed', {timeOut: 3000});
                    $('#container').text('An error occurred');
                }
            });
        }
    }
    function isValid() {
        if ($('#district_id').val() === "") {
            var ele = '<div class="alert alert-warning alert-dismissible fade show col-md-12" role="alert">District Name must be selected.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            $('#message').append(ele);
            setTimeout(function() {
                $('#message > div').remove();
            }, 3000);
            return false;
        } else if ($('#name').val() === "") {
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

