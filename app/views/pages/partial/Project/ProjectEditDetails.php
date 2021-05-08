

<h3>Project Details</h3>
<div class="row">
    <div class="col">
        <h6>Info</h6>
        <?php  //ProjectModel::getTaskInfo(); ?>
    </div>
    <div class="col">
        <h6>People</h6>
        <?php
            ProjectModel::showPeople();
        ?>
    </div>
    <div class="col">
        <h6>Task Documentation</h6>
        <?php  //ProjectModel::getDocumentation(); ?>
    </div>
</div>