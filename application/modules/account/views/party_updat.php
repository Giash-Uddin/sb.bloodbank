<table class="table table-hover" border="1" width="99%">
    <input type="hidden" name="id" id="id" value="<?php echo $query->id; ?>"/>
    <tr><td>Name</td>
        <td><input type="text" class="text-center round_box" name="name" id="name" onkeyup="names(id)" value="<?php echo $query->name; ?>"></td></tr>
    <tr><td></td><td style="color:red;" id="name_error"></td></tr>
</table>

