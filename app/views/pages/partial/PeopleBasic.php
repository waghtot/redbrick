<?php
    // echo "<pre>".print_r($data, 1)."</pre>";
?>

<div class="row person-card">
    <div class="col-4">
        <div class="img-thumbnail rounded-circle blank-face img-black">
        </div>
    </div>
    <div class="col">
        <h6><?php echo $data->title.' '.ucfirst($data->firstName).' '.ucfirst($data->lastName); ?></h6>
        <div><?php echo $data->mainSkill; ?></div>
        <div><?php echo $data->userType; ?></div>
    </div>
</div>