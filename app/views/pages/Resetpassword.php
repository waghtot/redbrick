<?php
    if(isset($data)){
        echo "<h1>".$data->view."</h1>";
        echo "<p>".$data->data."</p>";
        echo "<pre>".print_r($data, 1)."</pre>";
    }
?>