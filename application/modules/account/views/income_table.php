<?php
$this->load->view('head');
?>

<style>
    thead tr th, tfoot tr th{
        background: lightgray;
    }
</style>
<div style="background: white; width: 100%; float: left; padding: 20px; box-shadow: 2px 2px 10px 0px #000000;" >
    <div style="">
        <center><h1>Income Statement</h1></center>
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
                    <th class="text-center">Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $totalamount = 0;
                $totalunit = 0;
                foreach ($query as $row) {
                    $totalamount+=$row->amount;
                    $totalunit+=$row->unit;
                    ?>  
                    <tr id="<?php echo $row->id ?>">
                        <td class="text-center"><?php echo $row->category_name; ?></td>
                        <td class="text-center"><?php echo $row->party_name; ?></td>
                        <td class="text-center"><?php echo $row->name; ?></td>
                        <td class="text-center"><?php echo $row->date; ?></td>
                        <td class="text-center"><?php echo $row->unit; ?></td>
                        <td class="text-center"><?php echo $row->rate; ?></td>
                        <td class="text-center"><?php echo $row->amount; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <th class="text-center">Total</th>
                    <th class="text-center"></th>
                    <th class="text-center"></th>
                    <th class="text-center"></th>
                    <th class="text-center"><?php echo $totalunit; ?></th>
                    <th class="text-center"></th>
                    <th class="text-center"><?php echo $totalamount; ?></th>
                </tr>
            </tfoot>
        </table>

    </div>
</div>
