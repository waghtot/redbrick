<div class="row">
    <div class="col">
        <input id="swal-input1" type="text" class="form-control" name="name" placeholder="Project Name">
    </div>
    <div class="col">
        <input id="swal-input2" type="date" class="form-control" name="start" placeholder="Start Date">
    </div>
    <div class="col">
        <input id="swal-input3" type="date" class="form-control" name="end" placeholder="End Date">
    </div>
    <div class="row">
        <input type="checkbox" checked data-toggle="toggle" data-on="Private" data-off="Public" data-onstyle="outline-primary" data-offstyle="outline-secondary">
    </div>
    <!-- <div class="row">
        <select name="status">
            <?php //echo ProjectModel::selectStatus($status = null); ?>
        </select>
    </div> -->
</div>

<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>