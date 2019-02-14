<?php
$user_type = $this->session->userdata('user_type');
?>
<style>

</style>
<section id="donation_manage">
    <div class="container">
        <button class="btn btn-lg btn-success" onclick="menu_change('donation/donation/addDonation')">Add Donation</button>
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

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Donation</div>
                    <div class="card-body">
                        <table id="donation_table" class="table example table-hover dataTable" border="1" cellspacing="0" width="99%">
                            <thead>
                                <tr style="background-color: #cccccc; color: white">
                                    <th class="text-center">SL No</th>
                                    <th class="text-center">Donation Date</th>
                                    <th class="text-center">Hospital Name</th>
                                    <th class="text-center">Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $x = 1;
                                foreach ($donation as $row) {
                                    ?>  
                                    <tr id="<?php echo $row->donation_id ?>">
                                        <td class="text-center"><?php echo $x++; ?></td>
                                        <td class="text-center"><?php echo $row->donation_date; ?></td>
                                        <td class="text-center"><?php echo $row->hospital; ?></td>
                                        <td class="text-center"><?php echo $row->component; ?></td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <button class="btn btn-md btn-success" id="<?php echo $row->donation_id ?>" style="border-radius: 50%;" onclick="update_form_set('donation/donation/display', id)""><span class="fa fa-user"></span></button>
                                                <button class="btn btn-md btn-primary" id="<?php echo $row->donation_id ?>" style="border-radius: 50%;" onclick="update_form_set('donation/donation/editView', id)"><i class="fa fa-pencil"></i></button>
                                                <button class="btn btn-md btn-danger" id="<?php echo $row->donation_id ?>" style="border-radius: 50%;" onclick="delete_donation(id)"><i class="fa fa-trash"></i></button>
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
    function delete_donation(id) {
        $.ajax({
            url: '<?php echo base_url() ?>donation/donation/delete',
            type: 'post',
            data: {donation_id: id},
            success: function(data) {
                toastr.success('Donation removed successfully', 'Success', {timeOut: 3000});
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
                toastr.error('Donation is not removed', 'Failed', {timeOut: 3000});
                $('#container').text('An error occurred');
            }
        });
    }
</script>

