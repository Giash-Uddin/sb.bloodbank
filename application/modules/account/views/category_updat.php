<table class="table table-hover" border="1" width="99%">
    <input type="hidden" name="id" id="id" value="<?php echo $query->id; ?>"/>
    <tr><td>Name</td>
        <td><input type="text" class="text-center round_box" name="name" id="name" onkeyup="names(id)" value="<?php echo $query->name; ?>"></td></tr>
    <tr><td></td><td style="color:red;" id="name_error"></td></tr>
    <tr><td><span>Category Type</span></td><td>
            <select name="category_type" id="category_type" class="form-control" onchange="names(id)" style="border-radius: 25px">
                <option value="<?php echo $query->name; ?>"><?php echo $query->type; ?></option>
                <option value="INCOME">INCOME</option>
                <option value="EXPENSE">EXPENSE</option>
                <option value="OTHERS">OTHERS</option>
            </select>
        </td></tr>
    <tr><td></td><td style="color:red;" id="category_type_error"></td></tr>
</table>

