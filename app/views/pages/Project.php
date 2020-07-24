<?php

if(!isset($data->data->partial)){
    projectStatistics($data);
    createProject($data);
    projectList($data);
}
editProject($data);


function projectStatistics($data)
{
    if(isset($data->projects))
    {
        View::partial('Project/ProjectView', $data->projects);
    }
}

function createProject($data)
{
    echo '<div class="row">';
        echo '<input type="button" class="btn btn-info btn-md" id="newProject" value="Create Project" data-type="create">';
    echo '</div>';
}

function projectList($data)
{
    if(isset($data->projects))
    {
        echo "<div id=\"pl\">";
            View::partial('Project/ProjectLabel', $data->projects);
        echo "</div>";
    }
}

function editProject($data){
    if(isset($data->data->partial))
    {
        foreach($data->data->partial as $value)
        {
            View::partial($data->view.'/'.$data->view.ucfirst($value), 0);
        }
    }
}
?>