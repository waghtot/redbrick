<?php
class ProjectModel extends Controller
{

    public function getProjectsDetails()
    {
        $projects = self::sortProjects(Controller::getProjectList());
        return $projects;
    }

    public function sortProjects($input, $type = null, $status = null)
    {
        $internal = array();
        $external = array();
        $projectByStatus = array();
        $project = new stdClass();

        foreach($input as $key => $value)
        {

            $projectByStatus[] = $value->project_Status;

            switch($value->parent_Id)
            {
                case '0':
                    $internal[] = $value;
                break;
                default: 
                    $external[] = $value;
                break;
            }
        }

        $project->internal = $internal;
        $project->external = $external;
        $project->countInternal = count($internal);
        $project->countExternal = count($external);


        if((isset($type) && !empty($type)) && (isset($status) && $status!==null) ){

            if($type == 'projects')
            {
                switch($status)
                {
                    case 0:
                        unset($project->internal);
                    break;
                    case 1:
                        unset($project->external);
                    break;
                }
            }else{
                $new  = array();
                unset($project->internal);
                foreach($internal as $key => $value){
                    if($value->project_Status != $status)
                    {
                        unset($value);
                    }else{
                        $new[] = $value;
                    }
                }
                if(!empty($new)){
                    $project->internal = $new;
                }
                unset($project->external);
                $new = array();
                foreach($external as $key => $value){
                    if($value->project_Status != $status)
                    {
                        unset($value);
                    }else{
                        $new[] = $value;
                    }
                }
                if(!empty($new)){
                    $project->external = $new;
                }
            }
        }

        $project->statistic = $projectByStatus;
        $project->statusName = Controller::getStatusName();
        return $project;
    }

    public function getPartialDetails($input)
    {
        switch(strtolower($input->controller)){
            case 'project':
                return Controller::getProjectDetails($input->data['project']);
            break;
            case 'profile':

            break;
        }
    }

}