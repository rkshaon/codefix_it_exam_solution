<br>
<?php
  $month =  array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
?>
<div class="col-md-6">
  <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title">Total Product Purchased</h3>
    </div>
    <div class="panel-body"><?= $purchase_total->price; ?></div>
    <div class="panel-footer">
      <table class="table table-hover">
        <tbody>
          <tr>
            <th>Serial</th>
            <th>Time</th>
            <th>Amount</th>
          </tr>
          <?php
            $serial = 0;
            foreach ($purchase as $p) {
              $serial += 1;
              // print_r($p);
          ?>
          <tr>
            <td><?php echo $serial; ?></td>
            <td><?php echo $month[$p->month - 1] . ':' . $p->year;?></td>
            <td><?php echo $p->total_amount;?></td>
          </tr>
          <?php
            }
          ?>
        </tbody>
      </table>
    </div>
    <!-- panel footer -->
  </div>
    <!-- panel end -->
</div>
<div class="col-md-6">
  <div class="panel panel-success">
    <div class="panel-heading">
      <h3 class="panel-title">Total Product Sales</h3>
    </div>
    <div class="panel-body"><?= $sale_total->price; ?></div>
    <div class="panel-footer">
      <table class="table table-hover">
        <tbody>
          <tr>
            <th>Serial</th>
            <th>Time</th>
            <th>Amount</th>
          </tr>
          <?php
            $serial = 0;
            foreach ($sale as $s) {
              $serial += 1;
              // print_r($s);
          ?>
          <tr>
            <td><?php echo $serial; ?></td>
            <td><?php echo $month[$s->month - 1] . ':' . $s->year;?></td>
            <td><?php echo $s->total_amount;?></td>
          </tr>
          <?php
            }
          ?>
        </tbody>
      </table>
    </div>
    <!-- panel footer -->
  </div>
  <!-- panel end -->
</div>
