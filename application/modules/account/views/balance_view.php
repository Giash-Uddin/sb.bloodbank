<?php
$this->load->view('head');
?>

<style>
    .round_box{
        border: 1px solid black;
        border-radius: 25px;
        padding: 15px; 
        width: 100%;
        height: 15px;    
    }
    .round_btn{
        border: 2px solid black;
        border-radius: 5px;  
        width: 25%;
    }
</style>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center" style="padding-top: 20px; height: 100%; background-image: linear-gradient(to right bottom, #051937, #004d7a, #008793, #00bf72, #a8eb12);">
    <div align="center" class="panel panel-default" style="width: 70%; margin-top: 10px; border: 1px solid black;">
        <div class="panel-body" >
            <div style="width: 100%; float: left; padding: 10px" >
                <div style="background: #ffffff">
                <center><h1>Balance Sheet</h1></center>
                </div>
                <div style="">
                    <table class="table" border="1" cellspacing="0" width="99%" style="background: white">
                        <thead>
                            <tr>
                                <th class="text-center">Category Name</th>
                                <th class="text-center">Party Name</th>
                                <th class="text-center">Particular's Name</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Unit</th>
                                <th class="text-center">Rate</th>
                                <th class="text-center">Credit</th>
                                <th class="text-center">Debit</th>
                                <th>Balance</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $x = 1;
                            foreach ($query as $row) {
                                ?>  
                                <tr id="<?php echo $row->id ?>">
                                    <td class="text-center"><?php echo $row->CATEGORY_NAME; ?></td>
                                    <td class="text-center"><?php echo $row->PARTY_NAME; ?></td>
                                    <td class="text-center"><?php echo $row->NAME; ?></td>
                                    <td class="text-center"><?php echo $row->DATE; ?></td>
                                    <td class="text-center"><?php echo $row->UNIT; ?></td>
                                    <td class="text-center"><?php echo $row->RATE; ?></td>
                                    <td class="text-center"><?php echo $row->CREDIT; ?></td>
                                    <td class="text-center"><?php echo $row->DEBIT; ?></td>
                                    <td class="text-center"><?php echo $row->BALANCE; ?></td>
                                     </tr>
<?php } ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
<div id="delete_nc" class="modal fade" role="dialog" style="opacity: 0.8">
    <div class="modal-dialog modal-md">

        <!-- Modal content-->
        <div class="modal-content" style="padding : 10px; background: #245269">
            <div class="modal-header" style="background: #245269">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <img src="<?php echo base_url(); ?>image/warning.png"> <strong style="color: red"> WARNING !</strong>
            </div>
            <div class="modal-body" style="background: #ffffff">
                <input type="hidden" id="pre_id" value="">
                Delete ?<br>
            </div>
            <div class="modal-footer">
                <button class="btn btn-xs btn-sm btn-danger round_btn" id="delete">Yes</button>
                <button type="button" class="btn btn-xs btn-sm btn-success round_btn" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal for update Starts Here -->
<div id="update" class="modal" role="dialog" style="opacity: 0.8">
    <div class="modal-dialog modal-md">

        <!-- Modal content-->
        <form id="update_c"  method="post" enctype="multipart/form-data">
            <?php //echo form_open_multipart('home/updateMember'); ?>
            <div class="modal-content" style="padding : 10px; background: #245269">
                <div class="modal-header" style="background: #245269">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <strong style="color: #ffffff;">Update</strong>
            </div>
            <div class="modal-header" style="background: #ffffff;">
                <center><h1 style="">Category </h1></center>
            </div>
                <div class="modal-body" style="background: #ffffff">
                    <div id="up"></div>
                </div>
                <div class="modal-footer" style="background: #ffffff;">
                    <input type="submit" class="btn btn-xs btn-sm btn-success round_btn" id="insert_data" value="Update">
                    <button type="button" class="btn btn-xs btn-sm btn-primary round_btn" data-dismiss="modal">Cancel</button>
                </div>

            </div>
        </form>
    </div>
</div>
<!-- Modal for update Ends Here -->
<script>
    $(document).ready(function() {
        var base_url="<?php echo base_url();?>";
        $('.example').DataTable({
            responsive: true
        });
         $('#delete').click(function () {
            var id = $('#pre_id').val();
            $.ajax({
                url: base_url + 'account/account/delete',
                method: 'post',
                data: {id: id, tblname: 'tbl_category'},
                success: function () {
                    $('#delete_nc').modal('hide');
                    window.location= base_url+"account/account/category_show"; 
                }
            })
        });
        
        $('#update_c').submit(function (e) {
            e.preventDefault();
            var id= $.trim($('#id').val());
            var name= $.trim($('#name').val());
            if(name === ''){
                    $('#name_error').html('Please Enter name');
                    $('#name').css("border-color", "red"); 
            }else{
                $.ajax({
                    url: base_url+'account/account/category_update',
                    method: 'post',
                    data: {id: id, name: name},
                    success: function () {
                        $('#update').modal('hide');
                        window.location= base_url+"account/account/category_show";                        
                    }
                })
            }
        });
    });
    
    function deleteIDReserver(id){
        $('#pre_id').val(id);        
    }
    function updateIDReserver(ida){ 
        $.ajax({
                url: '<?php echo base_url(); ?>account/account/updat_view',
                method: 'post',
                data: {id: ida, tblname: 'tbl_category', page : 'category_updat'},
                success: function (data) {
                    $('#up').html(data);
                }
            })
        
    }
    function names(id) {
        var val = $.trim($('#' + id).val());
        if (val === '') {
            $('#' + id + '_error').html('');
            $('#' + id).css('border-color', 'red');
        } else {
            $('#' + id + '_error').html('');
            $('#' + id).css('border-color', '');
        }
    }
</script>