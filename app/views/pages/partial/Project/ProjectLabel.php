<?php
$template = '';
foreach($data AS $key => $value){
    switch($key){
        case 'internal':
            $template.= displayProjectDetails($data->$key, $key);
        break;
        case 'external':
            $template.= displayProjectDetails($data->$key, $key);
        break;
    }

    if(Session::check('ajax')!==false){
        Session::set('ajax', $template);
    }else{
        echo $template;
        $template = '';
    }

}

function displayProjectDetails($input, $header)
{

    $template = displayHeader($header);

    foreach($input AS $key => $value)
    {
        if(strlen($value->endDate)==0){
            $value->endDate = '0000-00-00';
        }
        $template.='<div class="row project-view border_'.$value->project_Status.' justify-content-between" id="project" data-project-id="'.$value->id.'" data-status="'.$value->project_Status.'" onclick="editProject('.$value->id.')">';
        $template.='<div class="col remove-distans">';
        $template.='<div class="status-'.$value->project_Status.'">';
        $template.='</div>';
        $template.='<span>'.$value->name.'</span>';
        $template.='</div>';
        $template.='<div class="col remove-distans text-right">';
        $template.='<span class="project-date">';
        $template.='<span class="project-start">From: </span>'.$value->startDate.' <span class="project-start">To: </span> '.$value->endDate.'</span>';
        $template.='</div>';
        $template.='</div>';
    }

    return $template;
}


function displayHeader($input)
{
    return '<div class="row"><h3>'.$input.'</h3></div>';
}

?>



