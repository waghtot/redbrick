<?php

foreach($data AS $key=>$value){
        if($value->parent_Id == 0){
            $spot = $value->startDate;
            $total = $value->totalDays;
            $projectStart = $value->startDate;
            $projectEnd = $value->endDate;
        }
        $value->spot = $spot;
        $value->total = $total;
        if($value->parent_Id == 0)
        {

            View::partial('Project/ProjectTimeline', $value);
        }else{
            View::partial('Project/ProjectTaskTimeline', $value);
        }
}
if(isset($projectStart))
{
?>
<div class="row">
    <div style="margin-left:0%; width:100%;">
        <div class="row justify-content-around">
            <div class="col-6 mr-auto" id="mainStart">
                <?php echo $projectStart; ?>
            </div>
            <div class="col-auto" id="mainEnd">
                <?php echo $projectEnd; ?>
            </div>
        </div>
    </div>
</div>
<?php
}
View::partial('Project/ProjectEditDetails', ProjectModel::getProjectIdFromURI());
?>