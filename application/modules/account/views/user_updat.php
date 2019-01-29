<table class="table table-hover" border="1" width="99%">
    <input type="hidden" name="id" id="id" value="<?php echo $query->id; ?>"/>
    <tr><td>User Name</td><td><input type="text" class="text-center round_box" name="user_name" id="user_name" onkeyup="names(id)" value="<?php echo $query->user_name; ?>"></td></tr>
    <tr><td></td><td style="color:red;" id="user_name_error"></td></tr>
    <tr><td>Password</td><td><input type="text" class="text-center round_box" name="password" id="password" onkeyup="names(id)" value="<?php echo $query->password; ?>"></td></tr>
    <tr><td></td><td style="color:red;" id="password_error"></td></tr>
    <tr><td>User Type</td><td><select name="user_type" id="user_type" class="form-control" onchange="names(id)" style="border-radius: 25px">
                <option value="<?php echo $query->user_type; ?>"><?php echo $query->user_type; ?></option>
                <option value="SUPER ADMIN">SUPER ADMIN</option>
                <option value="ADMIN">ADMIN</option>
                <option value="GENERAL">GENERAL</option>
                <option value="OTHER">OTHER</option>
            </select></td></tr>
    <tr><td></td><td style="color:red;" id="user_type_error"></td></tr>
    <tr><td>Status</td><td><select name="status" id="status" class="form-control" onchange="names(id)" style="border-radius: 25px">
                <option value="<?php echo $query->status; ?>"><?php echo $query->status; ?></option>
                <option value="ACTIVE">ACTIVE</option>
                <option value="INACTIVE">INACTIVE</option>
            </select></td></tr>
    <tr><td></td><td style="color:red;" id="status_error"></td></tr>
    </table>



<script>
    $(document).ready(function() {

        $('#datepick').datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "yy-mm-dd"
        });
    });
</script>

