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
        <button class="btn btn-lg btn-success" onclick="menu_change('donor')">View</button>
        <br/>
        <br/>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div id="message"></div>
                <div class="card">
                    <div class="card-header">Edit Donor Info</div>

                    <div class="card-body">
                        <form name="edit_dnor_form" >
                            <input id="sl" type="hidden" class="form-control" name="sl" value="<?php echo $sl ?>" required autofocus>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="<?php echo $name; ?>" required autofocus>
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Name must be filled up</strong>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="contact_no" class="col-md-4 col-form-label text-md-right">Contact No</label>
                                <div class="col-md-6">
                                    <input id="contact_no" type="text" class="form-control" name="contact_no" value="<?php echo $contact_no; ?>"required autofocus>
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Contact no must be filled up</strong>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="<?php echo $email; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="blood_group" class="col-md-4 col-form-label text-md-right">Blood Group</label>
                                <div class="col-md-6">
                                    <select id="blood_group" class="custom-select browser-default" name="blood_group" required>
                                        <option value="<?php echo $blood_group; ?>"><?php echo $blood_group; ?></option>
                                        <option value="A+">A(+)ve</option>
                                        <option value="B+">B(+)ve</option>
                                        <option value="O+">O(+)ve</option>
                                        <option value="AB+">AB(+)ve</option>
                                        <option value="A-">A(-)ve</option>
                                        <option value="B-">B(-)ve</option>
                                        <option value="O-">O(-)ve</option>
                                        <option value="AB-">AB(-)ve</option>
                                    </select>
                                    <div class="invalid-feedback">Blood Group must be selected</div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="designation" class="col-md-4 col-form-label text-md-right">Designation</label>

                                <div class="col-md-6">
                                    <select name="designation" id="designation" class="form-control" required>
                                        <option value="<?php echo $designation; ?>"><?php echo $designation; ?></option>
                                        <?php
                                        foreach ($desig as $menu) {
                                            echo "<option value='" . $menu->short_form . "'>$menu->short_form</option>";
                                        }
                                        ?>
                                    </select>
                                    <div class="invalid-feedback">Designation must be selected</div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="joining_date" class="col-md-4 col-form-label text-md-right">Joining Date</label>
                                <div class="col-md-6">
                                    <input id="joining_date" type="text" class="form-control datepick" name="joining_date" value="<?php echo $joining_date; ?>" required autofocus readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="branch_name" class="col-md-4 col-form-label text-md-right">Branch Name</label>

                                <div class="col-md-6">
                                    <select name="branch_name" id="branch_name" class="form-control" required>
                                        <option value="<?php echo $branch_name; ?>"><?php echo $branch_name; ?></option>
                                        <?php
                                        foreach ($branch as $menu) {
                                            echo "<option value='" . $menu->name . "'>$menu->name</option>";
                                        }
                                        ?>
                                    </select>
                                    <div class="invalid-feedback">Branch name must be selected</div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="controlling_office" class="col-md-4 col-form-label text-md-right">Controlling Office</label>
                                <div class="col-md-6">
                                    <input id="controlling_office" type="text" class="form-control" name="controlling_office" value="<?php echo $controlling_office; ?>" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="district" class="col-md-4 col-form-label text-md-right">District</label>
                                <div class="col-md-6">
                                    <select name="district" id="district" class="form-control" onchange="upozilaLoad(id);" required>
                                        <option value="<?php echo $district; ?>"><?php echo $district; ?></option>
                                        <?php
                                        foreach ($distrct as $menu) {
                                            echo "<option value='" . $menu->name . "'>$menu->name</option>";
                                        }
                                        ?>
                                    </select>
                                    <div class="invalid-feedback">Branch name must be selected</div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="upozila" class="col-md-4 col-form-label text-md-right">Upozila</label>
                                <div class="col-md-6">
                                    <select name="upozila" id="upozila" class="form-control">
                                        <option value="<?php echo $area; ?>"><?php echo $area; ?></option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="dob" class="col-md-4 col-form-label text-md-right">Date of Birth</label>
                                <div class="col-md-6">
                                    <input id="dob" type="text" class="form-control datepick" name="dob" value="<?php echo $dob; ?>" required readonly>
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Date of birth must be filled up</strong>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="username" class="col-md-4 col-form-label text-md-right">User Name</label>

                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control" name="username" value="<?php echo $username; ?>" required autofocus>
                                    <span class="invalid-feedback" role="alert">
                                        <strong>User must be filled up</strong>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="index" class="col-md-4 col-form-label text-md-right">Index</label>
                                <div class="col-md-6">
                                    <input id="index" type="text" class="form-control" name="index" value="<?php echo $index; ?>" required autofocus onkeypress="return indexValidation(value, event)">
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Index must be filled up</strong>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required value="<?php echo $password; ?>">
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Password must be filled up</strong>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="usertype" class="col-md-4 col-form-label text-md-right">User Type</label>
                                <div class="col-md-6">
                                    <select id="usertype" type="usertype" class="form-control" name="usertype" required>
                                        <option value="<?php echo $usertype; ?>"><?php echo $usertype; ?></option>
                                        <option value="DONOR">Donor</option>
                                        <option value="USER">User</option>
                                        <option value="ADMIN">Admin</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="status" class="col-md-4 col-form-label text-md-right">Status</label>
                                <div class="col-md-6">
                                    <select id="status" type="status" class="form-control" name="status" required>
                                        <option value="<?php echo $status; ?>"><?php echo ($status==1)?"Active":"Inactive"; ?></option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <a class="btn btn-primary" onclick="edit_donor()">Edit</a>
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
    function edit_donor() {
        if (isValid()) {
            var sl = $('#sl').val();
            var name = $('#name').val();
            var contact_no = $('#contact_no').val();
            var email = $('#email').val();
            var blood_group = $('#blood_group').val();
            var designation = $('#designation').val();
            var joining_date = $('#joining_date').val();
            var branch_name = $('#branch_name').val();
            var controlling_office = $('#controlling_office').val();
            var area = $('#upozila').val();
            var district = $('#district').val();
            var dob = $('#dob').val();
            var username = $('#username').val();
            var index = $('#index').val();
            var password = $('#password').val();
            var usertype = $('#usertype').val();
            var status = $('#status').val();
            $.ajax({
                url: '<?php echo base_url() ?>' + "donor/donor/edit",
                type: 'post',
                data: {
                    sl: sl,
                    name: name,
                    contact_no: contact_no,
                    email: email,
                    blood_group: blood_group,
                    designation: designation,
                    joining_date: joining_date,
                    branch_name: branch_name,
                    controlling_office: controlling_office,
                    area: area,
                    district: district,
                    dob: dob,
                    username: username,
                    index: index,
                    password: password,
                    usertype: usertype,
                    status: status},
                success: function(data) {
                    toastr.success('Donor added successfully', 'Success', {timeOut: 3000});
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
                error: function(data) {
                    toastr.error('Donor is not added', 'Failed', {timeOut: 3000});
                    $('#container').text(data.error);
                }
            });
        }
    }
    function upozilaLoad(id) {
        var district = $("#" + id).val();
        alert(district);
        $.ajax({
            url: '<?php echo base_url() ?>' + "donor/donor/getUpozilaByDistrict",
            type: 'post',
            dataType: 'json',
            data: {district: district},
            success: function(data) {
                var key = 0, option = "";
                $('#upozila').children('option:not(:first)').remove();
                for (key in data.district) {
                    if (data.district.hasOwnProperty(key)) {
                        option = "<option value='" + data.district[key].name + "'>" + data.district[key].name + "</option>"
                        $("#upozila").append(option);
                    }
                }
            },
            error: function(data) {
                alert('An error occurred' + data.error);
            }
        });
    }
    function isValid() {
        $('#message > div').remove();
        var bool = true, msg = "", ele = '<div class="alert alert-warning alert-dismissible fade show col-md-12" role="alert"><u id="msgbar" style="list-style-type: circle; text-decoration: none"></u><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        if ($('#name').val() === "") {
            msg += "<li>Name must be filled up.</li>";
            bool = false;
        }
        if ($('#contact_no').val() === "") {
            msg += "<li>Contact No must be filled up.</li>";
            bool = false;
        }
        if ($('#contact_no').val().length == 11 || $('#contact_no').val().length == 9 || $('#contact_no').val().length == 8) {
        } else {
            msg += "<li>Length of Contact No may not be appropriete.</li>"
            bool = false;
        }
//        if ($('#email').val() !== "" && true) {
//            msg +="<li>Email Id is not correct.</li>"
//            bool=false;
//        } 

        if ($('#blood_group').val() === "") {
            msg += "<li>Blood Group must be selected.</li>"
            bool = false;
        }
        if ($('#designation').val() === "") {
            msg += "<li>Designation must be selected.</li>"
            bool = false;
        }
        if ($('#branch_name').val() === "") {
            msg += "<li>Branch Name must be selected.</li>"
            bool = false;
        }
//        if ($('#joining_date').val() === "") {
//            msg +="<li>Branch Name must be filled up.</li>"
//            bool=false;
//        }
        if ($('#district').val() === "") {
            msg += "<li>District must be filled up.</li>"
            bool = false;
        }
//        if ($('#upozila').val() === "") {
//            msg +="<li>Branch Name must be filled up.</li>"
//            bool = false;
//        }
        if ($('#dob').val() === "") {
            msg += "<li>Date of Birth must be filled up.</li>"
            bool = false;
        }
        if ($('#username').val() === "") {
            msg += "<li>User Name must be filled up.</li>"
            bool = false;
        }
        if ($('#index').val() === "") {
            msg += "<li>Index must be filled up.</li>"
            bool = false;
        }
        if ($('#password').val() === "") {
            msg += "<li>Password must be filled up.</li>"
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
    $(document).ready(function() {
        $('.datepick').datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "yy-mm-dd"
        });
    });
</script>

