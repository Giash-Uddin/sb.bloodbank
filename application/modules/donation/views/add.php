<section id="add_donation">
    <div class="container">
        <button class="btn btn-lg btn-success" onclick="menu_change('donation')">View</button>
        <div class="btn-group mr-2" style="float: right; margin: 2px;">
            <button class="btn btn-sm btn-outline-secondary">Total No of Donation<span class="btn btn-sm badge-info" style="border-radius: 50%"><?php echo $donation_count->TOTAL ?></span></button>
            <button class="btn btn-sm btn-outline-secondary">Whole Blood<span class="btn btn-sm badge-success" style="border-radius: 50%"><?php echo $donation_count->WHOLE_BLOOD ?></span></button>
            <button class="btn btn-sm btn-outline-secondary">Red cell<span class="btn btn-sm  badge-danger" style="border-radius: 50%"><?php echo $donation_count->RED_CELL ?></span></button>
            <button class="btn btn-sm btn-outline-secondary">White cell<span class="btn btn-sm badge-light" style="border-radius: 50%"><?php echo $donation_count->WHITE_CELL ?></span></button>
            <button class="btn btn-sm btn-outline-secondary">Platelet<span class="btn btn-sm badge-warning" style="border-radius: 50%"><?php echo $donation_count->PLATELETE ?></span></button>
            <button class="btn btn-sm btn-outline-secondary">Plasma<span class="btn btn-sm badge-primary" style="border-radius: 50%"><?php echo $donation_count->PLASMA ?></span></button>
        </div>
        <br/>
        <br/>
        <div class="row justify-content-center">

            <div class="col-md-8">
                <div id="message"></div>
                <div class="card">
                    <div class="card-header">Donation</div>

                    <div class="card-body">
                        <form name="add_donation_form" id="add_donation_form">
                            <!--<form name="registration_form">-->
                            <div class="form-group row">
                                <label for="donation_date" class="col-md-4 col-form-label text-md-right">Donation Date</label>
                                <div class="col-md-6">
                                    <input id="donation_date" type="text" class="form-control datepick" name="donation_date" value="" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="hospital" class="col-md-4 col-form-label text-md-right">Hospital Name</label>
                                <div class="col-md-6">
                                    <input id="hospital" type="text" class="form-control" name="hospital" value="" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="component" class="col-md-4 col-form-label text-md-right">Required Blood Type</label>
                                <div class="col-md-6">
                                    <select id="component"  class="form-control" name="component" required>
                                        <option value="">-- choose one --</option>
                                        <option value="Whole Blood">Whole Blood / WB / WBC</option>
                                        <option value="Red Cell">Red Cell / RBC /Red Cell Concentrate</option>
                                        <option value="White Cell">White Cell</option>
                                        <option value="Platelet">Platelet</option>
                                        <option value="Plasma">Plasma / FFP / Fresh Frozen Plasma</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <a class="btn btn-primary" onclick="add_donation()">Save</a>
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
    $(document).ready(function() {
        $('.datepick').datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "yy-mm-dd"
        });
    });
</script>
<script>
    var base_url = "<?php echo base_url() ?>";
    function add_donation() {
        if (isValid()) {
            var donor_sl_no = '<?php echo $user_id ?>';
            var donation_date = $('#donation_date').val();
            var hospital = $('#hospital').val();
            var component = $('#component').val();
            $.ajax({
                url: '<?php echo base_url() ?>' + "donation/donation/save",
                type: 'post',
                data: {donor_sl_no : donor_sl_no, donation_date: donation_date, hospital: hospital, component: component},
                success: function(data) {
                    toastr.success('Donation added successfully', 'Success', {timeOut: 3000});
                    $.ajax({
                        url: '<?php echo base_url() ?>' + "donation",
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
                    toastr.error('Donation is not added', 'Failed', {timeOut: 3000});
                    $('#container').text('An error occurred');
                }
            });
        }
    }
    function isValid() {
        $('#message > div').remove();
        var bool = true, msg = "", ele = '<div class="alert alert-warning alert-dismissible fade show col-md-12" role="alert"><u id="msgbar" style="list-style-type: circle; text-decoration: none"></u><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        if ($('#donation_date').val() === "") {
            msg += "<li>Blood Donation Date must be filled up.</li>";
            bool = false;
        }
        if ($('#component').val() === "") {
            msg += "<li>Required Type of Blood must be filled up.</li>";
            bool = false;
        }
        if (bool == false) {
            $('#message').append(ele);
            $("#msgbar").html(msg);
            setTimeout(function() {
                $('#message > div').remove();
            }, 10000);
        }
        return bool;
    }
    
</script>

