
<div class="row">
<?php
    if(isset($data)){
        echo "<h1>".$data->view."</h1>";
    }
?>
</div>

<div class="row">
    <form name="login">

        <div class="form-group">
        <input type="email" placeholder="Enter Email" class="form-control" id="email" value="" required>
        </div>

        <div class="form-group">
        <input type="password" placeholder="Enter Password" class="form-control" id="password" value="" required>
        </div>

        <div class="form-group row">
            <input type="button" class="btn btn-info btn-md" id="btn-login" value="Log In">
            <div id="reminder">
                Forgot password?
            </div>
        </div>

    </form>
</div>