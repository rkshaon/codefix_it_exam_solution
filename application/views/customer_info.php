<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<br>
<div id="color_change" class="box box-primary">
    <!-- /.box-header -->
    <!-- form start -->
    <form method="POST" action="<?= base_url('customer_info'); ?>">
        <div class="box-body">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Customer Name</label>
                    <select class="js-example-basic-single form-control" name="customer_id">
                        <?php
                        if ($customer) {
                            $Serial = 1;
                            foreach ($customer->result() as $row) {
                        ?>
                                <option value="<?= $row->id; ?>"><?= $row->name; ?></option>
                        <?php }
                        } else {
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <br>
                <button id="submit_button" type="submit" class="btn btn-primary">Submit</button>
            </div>
            <div class="col-md-4"></div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        </div>
    </form>
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
          if (isset($customer_info)) {
            $serial = 0;
            foreach ($customer_info as $c) {
              $serial += 1;
              // print_r($c);
        ?>
        <tr>
            <td><?php echo $serial; ?></td>
            <td><?php echo $c['customer_name']; ?></td>
            <td><?php echo $c['product_name']; ?></td>
            <td><?php echo $c['transection_type']; ?></td>
            <td><?php echo $c['product_price']; ?></td>
            <td><?php echo $c['date']; ?></td>
        </tr>
        <?php
            }
          }
        ?>
    </tbody>
</table>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>
