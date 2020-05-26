
<?php
    if(isset($data)){
        // echo "<h1>".$data->view."</h1>";
        // echo "<p>".$data->data."</p>";

        // echo "<pre>".print_r($data, 1)."</pre>";
        // error_log('call partial view: '.$data->data->partial[0]);

        if(!isset($data->data->partial)){
        ?>
            <div class="row">
                <a href="../project/create">Create project</a>
            </div>
        <?php
        }

        if(isset($data->data->partial)){
            foreach($data->data->partial as $value){

                View::partial($data->view.'/'.$data->view.ucfirst($value));
            }
        }
    }
?>

