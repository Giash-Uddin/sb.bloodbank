<?php
$this->load->view('head');
?>
<style>
    thead tr th, tfoot tr th{
        background: lightgray;
    }
</style>
<div style="background: white; width: 100%; float: left; padding: 20px; box-shadow: 2px 2px 10px 0px #000000;" >
   
    <div><h1></h1>
        <center><h1>Balance Sheet</h1></center>
    </div>
    <div style="">
        <table class="table table-responsive" border="1" cellspacing="0" width="99%" style="width: 100%; background: white">
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
                $totalunit = 0;
                $totalcredit = 0;
                $totaldebit = 0;
                foreach ($query as $row) {
                    $totalunit += $row->UNIT;
                    $totalcredit += $row->CREDIT;
                    $totaldebit += $row->DEBIT;
                    ?>  
                    <tr id="">
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
            <tfoot>
                <tr>
                    <th class="text-center">Total</th>
                    <th class="text-center"></th>
                    <th class="text-center"></th>
                    <th class="text-center"></th>
                    <th class="text-center"><?php echo $totalunit; ?></th>
                    <th class="text-center"></th>
                    <th class="text-center"><?php echo $totalcredit; ?></th>
                    <th class="text-center"><?php echo $totaldebit; ?></th>
                    <th class="text-center"><?php echo $totalcredit-$totaldebit; ?></th>
                </tr>
            </tfoot>
        </table>

    </div>
</div>
