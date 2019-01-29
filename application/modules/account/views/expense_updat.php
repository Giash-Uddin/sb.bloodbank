<table class="table table-hover" border="1" width="99%">
    <input type="hidden" name="id" id="id" value="<?php echo $query->id; ?>"/>
    <tr><td>Category Name</td><td><select name="category_name" id="category_name" class="form-control" onchange="names(id)" style="border-radius: 25px">
                <option value="<?php echo $query->category_name; ?>"><?php echo $query->category_name; ?></option>
                <?php
                foreach ($categorydropdown as $menu) {
                    echo "<option value='" . $menu->name . "'>$menu->name</option>";
                }
                ?>
            </select></td></tr>
    <tr><td></td><td style="color:red;" id="category_name_error"></td></tr>
    <tr><td>Sector of Expense</td><td><input type="text" class="text-center round_box" name="name" id="name" onkeyup="names(id)" value="<?php echo $query->name; ?>"></td></tr>
    <tr><td></td><td style="color:red;" id="name_error"></td></tr>
    <tr><td>Date</td><td><input type="text" class="text-center round_box" name="datepick" id="datepick" onkeyup="names(id)" value="<?php echo $query->date; ?>"></td></tr>
    <tr><td></td><td style="color:red;" id="datepick_error"></td></tr>
    <tr><td>Unit</td><td><input type="text" class="text-center round_box" name="unit" id="unit" value="<?php echo $query->unit; ?>"></td></tr>
    <tr><td>Rate</td><td><input type="text" class="text-center round_box" name="rate" id="rate" value="<?php echo $query->rate; ?>"></td></tr>
    <tr><td>Amount</td><td><input type="text" class="text-center round_box" name="amount" id="amount" onkeyup="names(id)" value="<?php echo $query->amount; ?>"></td></tr>
    <tr><td></td><td style="color:red;" id="amount_error"></td></tr>
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

