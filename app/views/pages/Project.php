<div class="row">
    <a href="../project/create">Create project</a>
</div>


<?php
    if(isset($data)){
        // echo "<h1>".$data->view."</h1>";
        // echo "<p>".$data->data."</p>";
        echo "<pre>".print_r($data, 1)."</pre>";
        // echo "<pre>".print_r($data->profile, 1)."</pre>";
    }
?>

