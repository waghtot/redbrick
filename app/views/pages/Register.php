<?php
    if(isset($data)){
        echo "<h1>".$data->view."</h1>";
        echo "<p>".$data->data."</p>";
    }
?>
<?php 
    if(isset($data->template)){
        echo $data->template;
    }
?>