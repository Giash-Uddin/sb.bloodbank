<?php
$user_type = $this->session->userdata('user_type');
?>
<section id="donor_manage">
    <div class="container">
        <div class="btn btn-group">
        <button class="btn btn-lg btn-success" onclick="menu_change('donor/donor/addDonor')">Add Donor</button>
        <button class="btn btn-lg btn-success" onclick="menu_change('donor/donor/addDonor')">Donation Entry</button>
        </div>
        <br/>
        <br/>
        <div class="row justify-content-center">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Donor</div>
                    <div class="card-body">
                        <table id="donor_table" class="table example table-hover dataTable" border="1" cellspacing="0" width="99%">
                            <thead>
                                <tr style="background-color: #cccccc; color: white">
                                    <th class="text-center">SL No</th>
                                    <th class="text-center">Donor Name</th>
                                    <th class="text-center">Blood Group</th>
                                    <th class="text-center">Index</th>
                                    <th class="text-center">Contact No</th>
                                    <th class="text-center">Designation</th>
                                    <th class="text-center">Branch Name</th>
                                    <th class="text-center">Joining Data</th>
                                    <th class="text-center">Area</th>
                                    <th class="text-center">Thana</th>
                                    <th class="text-center">GMO</th>
                                    <th class="text-center">Email ID</th>
                                    <th class="text-center">Date of Birth</th>
                                    <th class="text-center">User Name</th>
                                    <th class="text-center">Password</th>
                                    <th class="text-center">User Type</th>
                                    <th class="text-center">Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $x = 1;
                                foreach ($donor as $row) {
                                    ?>  
                                    <tr id="<?php echo $row->sl ?>">
                                        <td class="text-center"><?php echo $x++; ?></td>
                                        <td class="text-center"><?php echo $row->name; ?></td>
                                        <td class="text-center"><?php echo $row->bloodlist; ?></td>
                                        <td class="text-center"><?php echo $row->indx; ?></td>
                                        <td class="text-center"><?php echo $row->cont; ?></td>
                                        <td class="text-center"><?php echo $row->desig; ?></td>
                                        <td class="text-center"><?php echo $row->branch; ?></td>
                                        <td class="text-center"><?php echo $row->joindate; ?></td>
                                        <td class="text-center"><?php echo $row->area; ?></td>
                                        <td class="text-center"><?php echo $row->polist; ?></td>
                                        <td class="text-center"><?php echo $row->gmo; ?></td>
                                        <td class="text-center"><?php echo $row->email; ?></td>
                                        <td class="text-center"><?php echo $row->dob; ?></td>
                                        <td class="text-center"><?php echo $row->username; ?></td>
                                        <td class="text-center"><?php echo $row->passwd; ?></td>
                                        <td class="text-center"><?php echo $row->usertype; ?></td>
                                        <td class="text-center"><?php echo ($row->status == 1) ? "Active" : "Inactive"; ?></td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <button class="btn btn-md btn-success" id="<?php echo $row->sl ?>" style="border-radius: 50%;" onclick="update_form_set('donor/donor/display', id)"><span class="fa fa-user"></span></button>
                                                <button class="<?php echo ($row->status == 1) ? "btn btn-md btn-warning" : "btn btn-md btn-danger" ?>" id="<?php echo $row->sl ?>" style="border-radius: 50%;" onclick="activate_donor(id)"><?php echo ($row->status == 1) ? "<i class='fa fa-check'></i>" : "<i class='fa fa-remove'></i>" ?></button>
                                                <button class="btn btn-md btn-primary" id="<?php echo $row->sl ?>" style="border-radius: 50%;" onclick="update_form_set('donor/donor/editView', id)"><i class="fa fa-pencil"></i></button>
                                                <button class="btn btn-md btn-danger" id="<?php echo $row->sl ?>" style="border-radius: 50%;" onclick="delete_donor(id)"><i class="fa fa-trash"></i></button>
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
    function delete_donor(id) {
        $.ajax({
            url: '<?php echo base_url() ?>donor/donor/delete',
            type: 'post',
            data: {sl: id},
            success: function(data) {
                toastr.success('Donor removed successfully', 'Success', {timeOut: 3000});
                $.ajax({
                    url: '<?php echo base_url() ?>' + "donor",
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
                toastr.error('Donor is not removed', 'Failed', {timeOut: 3000});
                $('#container').text('An error occurred');
            }
        });
    }
    function activate_donor(sl) {
        $.ajax({
            url: '<?php echo base_url() ?>donor/donor/activate',
            type: 'post',
            data: {sl: sl},
            success: function(data) {
                toastr.info('Donor activated successfully', 'Success', {timeOut: 3000});
                $.ajax({
                    url: '<?php echo base_url() ?>' + "donor",
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
                toastr.waring('Donor Deactivated', 'Warning', {timeOut: 3000});
                $('#container').text('An error occurred');
            }
        });
    }
</script>

