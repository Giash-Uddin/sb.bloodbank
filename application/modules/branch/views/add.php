<section id="add_branch">
    <div class="container">
        <button class="btn btn-lg btn-success" onclick="menu_change('branch')">View</button>
        <br/>
        <br/>
        <div class="row justify-content-center">
            
            <div class="col-md-8">
                <div id="message"></div>
                <div class="card">
                    <div class="card-header">Branch</div>

                    <div class="card-body">
                        <form name="add_branch_form" id="add_branch_form">
                            <!--<form name="registration_form">-->
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Branch Name</label>
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
                                    <a class="btn btn-primary" onclick="add_branch()">Save</a>
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
    function add_branch() {
        if (isValid()) {
            var name = $('#name').val();
            var status = $('#status').val();
            $.ajax({
                url: '<?php echo base_url() ?>' + "branch/branch/save",
                type: 'post',
                data: {name: name, status: status},
                success: function(data) {
                    toastr.success('Branch added successfully', 'Success', {timeOut: 3000});
                    $.ajax({
                        url: '<?php echo base_url() ?>' + "branch",
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
                    toastr.error('Branch is not added', 'Failed', {timeOut: 3000});
                    $('#container').text('An error occurred');
                }
            });
        }
    }
    function isValid() {
        if ($('#name').val() === "") {
            var ele='<div class="alert alert-warning alert-dismissible fade show col-md-12" role="alert">Branch Name must be filled up.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            $('#message').append(ele);
            setTimeout(function(){ $('#message > div').remove(); }, 3000);
            return false;
        } else {
            return true;
        }
    }
</script>

