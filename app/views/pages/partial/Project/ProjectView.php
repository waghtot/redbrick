<div class="row">
    <div class="col-4">

        <?php
            if(isset($data->countInternal)){
                $info = new stdClass();
                $info->title = 'Internal';
                $info->counter = $data->countInternal;
                $info->linkId = 'projects';
                $info->linkValue = 1;
                View::partial('Project/Counter', $info);
            }

            if(isset($data->countInternal)){
                $info = new stdClass();
                $info->title = 'External';
                $info->counter = $data->countExternal;
                $info->linkId = 'projects';
                $info->linkValue = 0;
                View::partial('Project/Counter', $info);
            }

        ?>

    </div>
    <div class="col-8">
        <div class="row">
            <?php
                foreach($data->statusName as $key => $value)
                {
                    $info = new stdClass();
                    $info->title = $value;
                    $info->statusId = $key; 
                    $info->counter = 0;
                    $info->linkId = 'status';
                    $info->linkValue = $key;             
                    foreach($data->statistic as $skey => $svalue){
                        if($key == $svalue)
                        {
                            $info->counter ++;
                        }
                    }
                    echo "<div class=\"col-3\">";
                        View::partial('Project/Counter', $info);
                    echo "</div>";
                }
            ?>
        </div>
    </div>
</div>