<div>
    <h1>Project Edit</h1>
</div>

<?php
    function get_percentage($total, $number)
    {
      if ( $total > 0 ) {
        return round($number / ($total / 100),2);
      } else {
        return 0;
      }
    }
?>


<div class="progress">
  <div class="progress-bar bg-warning" role="progressbar" style="width:<?php echo get_percentage(72, 30).'%';?>" aria-valuenow="30" aria-valuemin="0" aria-valuemax="72">
    <?php echo round(get_percentage(72, 30), 0).'%';?>
</div>
</div>


<div class="row">
    <div class="col-3">
        <input type="button" value="Documents" class="btn btn-md btn-info">
    </div>
    <div class="col-3">
        <input type="button" value="Timeline" class="btn btn-md btn-info">
    </div>
    <div class="col-3">
        <input type="button" value="People" class="btn btn-md btn-info">
    </div>
    <div class="col-3">
        <input type="button" value="Finances" class="btn btn-md btn-info">
    </div>
</div>