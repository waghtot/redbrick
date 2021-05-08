<?php
if(isset($data->spot) && isset($data->total))
{
    $marginLeft = ProjectModel::getMarginLeft($data->spot, $data->startDate, $data->total);
    $width = ProjectModel::getLength($data->spot, $data->startDate, $data->endDate, $data->total); 
    $setAction = 'id="taskView" data-task-id="'.$data->id.'"';
}else{
    $marginLeft = '0';
    $width = '100';
    $setAction = ''; 
}
?>
<div class="row taskView">
    <div class="task" style="margin-left:<?php echo $marginLeft; ?>%; width:<?php echo $width; ?>%;" <?php echo $setAction; ?>>
        <div class="row justify-content-around">
            <div class="col-12 mr-auto task-name">
                <?php echo strtoupper($data->name); ?>
            </div>
        </div>

        <div class="progress" >
            <div class="progress-bar bg-warning" role="progressbar" style="width:<?php echo ProjectModel::getPercentage($data->totalDays, $data->passedDays).'%';?>" aria-valuenow="<?php echo ProjectModel::getPercentage($data->totalDays, $data->passedDays);?>" aria-valuemin="0" aria-valuemax="<?php echo $data->totalDays; ?>">
                <?php echo 'Day '.$data->passedDays;?>
            </div>
        </div>

        <div class="row justify-content-around">
            <div class="col-4 mr-auto" id="startDate" data-task-start="<?php echo $data->startDate; ?>">
                <?php echo ProjectModel::formatTaskDate($data->startDate); ?>
            </div>
            <div class="col-auto" id="endDate" data-task-end="<?php echo $data->endDate; ?>">
                <?php echo ProjectModel::formatTaskDate($data->endDate); ?>
            </div>
        </div>
    </div>
</div>