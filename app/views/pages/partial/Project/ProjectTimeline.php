<div class="row" style="border-bottom:1px solid #e1e1e1; padding-top:5px; padding-bottom:5px;">
    <div style="margin-left:<?php echo ProjectModel::getMarginLeft($data->spot, $data->startDate, $data->total); ?>%; width:100%;">
        <div class="row justify-content-around">
            <div class="col-6 mr-auto">
                <h5><?php echo strtoupper($data->name); ?></h5>
            </div>
            <div class="col-auto">
                <?php echo $data->created_Date; ?>
            </div>
        </div>

        <div class="progress">
            <div class="progress-bar bg-info" role="progressbar" style="width:<?php echo ProjectModel::getPercentage($data->totalDays, $data->passedDays).'%';?>" aria-valuenow="<?php echo ProjectModel::getPercentage($data->totalDays, $data->passedDays);?>" aria-valuemin="0" aria-valuemax="<?php echo $data->totalDays; ?>">
                <?php echo 'Day '.$data->passedDays;?>
            </div>
        </div>

        <div class="row justify-content-around">
            <?php
                View::partial('Project/ProjectNavigation', $data->id);
            ?>
        </div>
    </div>

</div>