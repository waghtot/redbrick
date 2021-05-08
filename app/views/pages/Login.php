
<div class="row">
<?php
    if(isset($data)){
        echo "<h1>".$data->view."</h1>";
    }
?>
</div>
<?php 
    if(isset($data->template)){
        echo $data->template;
    }
?>
</div>