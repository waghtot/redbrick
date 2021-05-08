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
                return Controller::getProjectDetails(self::getProjectId($input->data));
            break;
            case 'profile':

            break;
        }
    }

    public function getMarginLeft($spot, $start, $total)
    {
        $earlier = new DateTime($spot);
        $later = new DateTime($start);
        
        $diff = $later->diff($earlier)->format("%a");
        $res = self::getPercentage($total, $diff);
        return $res; 
    }


    public function getPercentage($total, $number)
    {
      if ( $total > 0 ) {
        return round($number / ($total / 100),0);
      } else {
        return 0;
      }
    }

    public function getLength($spot, $start, $end, $total)
    {
        $start = self::getMarginLeft($spot, $start, $total);
        $end = self::getMarginLeft($spot, $end, $total);
        
        if($start > $end){
            $diff = $start - $end;
        }else{
            $diff = $end - $start;
        }
        return $diff;
    }

    public function createTask()
    {
        $post = Controller::getPostData();

        $data = new stdClass();
        $data->api = 'database';
        $data->connection = 'PROJECTS';
        $data->procedure = __FUNCTION__;
        $data->params->project = PROJECT;
        $data->params->parent = $post->project;
        $data->params->name = $post->taskName;
        $data->params->start = $post->startDate;
        $data->params->end = $post->endDate;
        $data->params->offer = $post->jobOffer;

        $res = json_decode(ApiModel::doAPI($data));
        error_log('db response: '.print_r($res[0], 1));
        return $res[0];
    }

    public function formatTaskDate($input)
    {
        $date = explode('-', $input);
        return $date[2].'/'.$date[1];
    }

    public function selectStatus($input)
    {
        return '<option value="0">Select Task Status</option>';
    }

    public function getProjectId(array $input){
        foreach($input as $key=>$value)
        {
            if(is_numeric($key) && is_numeric($value))
            {
                return end($input);
            }
        }
    }

    public function getProjectIdFromURI()
    {
        $params = array();
        $data = explode('/', $_SERVER['REQUEST_URI']);
        foreach($data as $key=>$value){
            if(is_numeric($value)){
                $params[] = $value;
            }
        }

        if(!empty($params))
        {
            return $params;
        }

        return false;
    }

    public function getPeople()
    {
        $taskId = self::getProjectIdFromURI();
        $data = new stdClass();
        $data->api = 'database';
        $data->connection = 'PROJECTS';
        $data->procedure = __FUNCTION__;

        if(count($taskId)<2){
            $data->params->mainTask = $taskId[0];
            $data->params->subTask = 0;
        }else{
            $data->params->mainTask = 0;
            $data->params->subTask = $taskId[1];
        }
        $res = json_decode(ApiModel::doAPI($data));
        return $res;
    }

    public function showPeople()
    {
        $data = array();
        $data = self::getPeople();
        if(!empty($data) && is_array($data))
        {
            foreach($data as $value)
            {
                echo View::partial('PeopleBasic', $value);
            }
        }
    }



}