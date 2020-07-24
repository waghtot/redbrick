<?php
    if($data->counter == 0){
        $addon = 'disabled';
    }else{
        $addon = '';
    }

    if(isset($data->statusId)){
        switch($data->statusId)
        {
            case 1:
            case 2:
                $className = 'btn-secondary';
            break;
            case 3:
                $className = 'btn-warning';
            break;
            case 4:
            case 5:
                $className = 'btn-success';
            break;
            case 6:
                $className = 'btn-danger';
            break;
            case 7:
                $className = 'btn-danger';
            break;
            case 8:
                $className = 'btn-dark';
            break;
        }
    }else{
        $className = 'btn-primary';
    }

?>

<div class="bagde <?php echo $addon; ?>">
    <div class="statusname">
        <?php
            echo $data->title;
        ?>
    </div>
    <div class="counter">
        <?php
            if(isset($data->counter)){
                echo $data->counter;
            }
 ?>
    </div>
    <input type="button" class="btn btn-md <?php echo $className; ?>" id="projectDetails" data-type="<?php echo $data->linkId; ?>" data-value="<?php echo $data->linkValue; ?>" value="more" <?php echo $addon; ?>>
</div>