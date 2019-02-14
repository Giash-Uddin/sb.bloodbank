<?php
$donation_date;
$hospital;
$component;
$donation_id;
foreach ($donation as $donate) {
    $donation_id = $donate->donation_id;
    $donation_date = $donate->donation_date;
    $hospital = $donate->hospital;
    $component = $donate->component;
}
?>
<section id="add_donation">
    <div class="container">
        <button class="btn btn-lg btn-success" onclick="menu_change('donation')">Back</button>
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
                <div id="message"></div>
                <div class="card">
                    <div class="card-header">Donation</div>

                    <div class="card-body">
                        <table width="100%" class="table table-light table-hover table-bordered">
                            <tr>
                                <th >Donation Date</th>
                                <td><?php echo $donation_date ?></td>
                            </tr>
                            <tr>
                                <th>Hospital Name</th>
                                <td><?php echo $hospital ?></td>
                            </tr>
                            <tr>
                                <th>Required Type of Blood</th>
                                <td><?php echo $component ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

