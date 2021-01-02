<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<br>
<div class="col-md-6">
    <div id="color_change" class="box box-primary">
        <!-- /.box-header -->
        <!-- form start -->
        <form id="cat_main" method="POST" action="<?php echo base_url('Welcome/store_shop') ?>">
            <div class="box-body">
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
                <div class="form-group">
                    <label>Product Name</label>
                    <select class="js-example-basic-single form-control" name="product_id">
                        <?php
                        if ($products) {
                            $Serial = 1;
                            foreach ($products->result() as $row) {
                        ?>
                                <option value="<?= $row->id; ?>"><?= $row->name; ?></option>
                        <?php }
                        } else {
                        }
                        ?>

                    </select>
                </div>
                <div class="form-group">
                    <label>Type</label>
                    <select class="form-control" name="type">
                        <option value="1">Sell</option>
                        <option value="2">Purchase</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Quantity</label>
                    <input type="number" name="quantity" class="form-control">
                </div>





                    </div>
                    <!-- /.box-body -->

                    <div class=" box-footer">
                    <button id="submit_button" type="submit" class="btn btn-primary">Submit</button>
                </div>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>
