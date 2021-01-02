<br>
<div id="color_change" class="box box-primary">
    <!-- /.box-header -->
</div>
<table class="table table-hover">
    <tbody>
        <tr>
            <th>Serial</th>
            <th>Customer Name</th>
            <th>Product Name</th>
            <th>Transection Type</th>
            <th>Product Price</th>
            <th>Date</th>
        </tr>
        <?php
          if (isset($sale_report)) {
            $serial = 0;
            foreach ($sale_report as $s) {
              $serial += 1;
              // print_r($s);
        ?>
        <tr>
            <td><?php echo $serial; ?></td>
            <td><?php echo $s->customer; ?></td>
            <td><?php echo $s->product; ?></td>
            <td>Sale</td>
            <td><?php echo $s->price; ?></td>
            <td><?php echo date("d-m-Y",strtotime($s->created_at)); ?></td>
        </tr>
        <?php
            }
          }
        ?>
    </tbody>
</table>
