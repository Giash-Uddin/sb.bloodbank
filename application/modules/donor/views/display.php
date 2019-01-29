<?php
$sl;
$name;
$contact_no;
$email;
$blood_group;
$designation;
$joining_date;
$branch_name;
$controlling_office;
$area;
$district;
$dob;
$username;
$index;
$password;
$usertype;
$status;
foreach ($donor as $dnr) {
    $sl = $dnr->sl;
    $name = $dnr->name;
    $contact_no = $dnr->cont;
    $email = $dnr->email;
    $blood_group = $dnr->bloodlist;
    $designation = $dnr->desig;
    $joining_date = $dnr->joindate;
    $branch_name = $dnr->branch;
    $controlling_office = $dnr->gmo;
    $area = $dnr->area;
    $district = $dnr->polist;
    $dob = $dnr->dob;
    $username = $dnr->username;
    $index = $dnr->indx;
    $password = $dnr->passwd;
    $usertype = $dnr->usertype;
    $status = $dnr->status;
}
?>
<section id="add_branch">
    <div class="container">
        <button class="btn btn-lg btn-success" onclick="menu_change('donor')">Back</button>
        <br/>
        <br/>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div id="message"></div>
                <div class="card">
                    <div class="card-header">Donor Profile</div>

                    <div class="card-body">
                        <table width="100%" class="table table-light table-hover table-bordered">
                            <tr>
                                <th >Name</th>
                                <td><?php echo $name ?></td>
                            </tr>
                            <tr>
                                <th >Contact No</th>
                                <td><?php echo $contact_no ?></td>
                            </tr>
                            <tr>
                                <th >Email ID</th>
                                <td><?php echo $email ?></td>
                            </tr>
                            <tr>
                                <th >Blood Group</th>
                                <td><?php echo $blood_group ?></td>
                            </tr>
                            <tr>
                                <th >Designation</th>
                                <td><?php echo $designation ?></td>
                            </tr>
                            <tr>
                                <th >Joining_date</th>
                                <td><?php echo $joining_date ?></td>
                            </tr>
                            <tr>
                                <th >Branch Name</th>
                                <td><?php echo $branch_name ?></td>
                            </tr>
                            <tr>
                                <th >Controlling Office</th>
                                <td><?php echo $controlling_office ?></td>
                            </tr>
                            <tr>
                                <th >Upozila</th>
                                <td><?php echo $area ?></td>
                            </tr>
                            <tr>
                                <th >District</th>
                                <td><?php echo $district; ?></td>
                            </tr>
                            <tr>
                                <th >Date of Birth</th>
                                <td><?php echo $dob ?></td>
                            </tr>
                            <tr>
                                <th >User Name</th>
                                <td><?php echo $username ?></td>
                            </tr>
                            <tr>
                                <th >Index</th>
                                <td><?php echo $index ?></td>
                            </tr>
                            <tr>
                                <th >User Type</th>
                                <td><?php echo $usertype ?></td>
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
    function edit_branch() {
        if (isValid()) {
            var branch_id = $('#branch_id').val();
            var name = $('#name').val();
            var status = $('#status').val();
            $.ajax({
                url: '<?php echo base_url() ?>' + "branch/branch/edit",
                type: 'post',
                data: {branch_id: branch_id, name: name, status: status},
                success: function(data) {
                    toastr.success('Updated successfully', 'Success', {timeOut: 3000});
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
                    toastr.error('Data not updated', 'Failed', {timeOut: 3000});
                    $('#container').text('An error occurred');
                }
            });
        }
    }
    function isValid() {
        if ($('#name').val() === "") {
            var ele = '<div class="alert alert-warning alert-dismissible fade show col-md-12" role="alert">Branch Name must be filled up.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
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

