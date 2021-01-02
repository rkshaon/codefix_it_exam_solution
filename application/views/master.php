<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Paper</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <style>
        .jumbotron {
    background-color: #cae5f4 !important;
}
    </style>


</head>

<body>
    <br>
    <div class="container">
        <div class="jumbotron">
            <div class="container">
                <h1>Welcome To Codefix IT</h1>
                <p>Try your level best, if you fail to solve all problems, submit your solution as far as possible you.</p>
            </div>
        </div>
        <ul class="nav nav-tabs">
            <li role="presentation" class="active"><a href="<?= base_url('/') ?>">Home</a></li>
            <li role="presentation"><a href="<?= base_url('shop') ?>">Shop</a></li>
            <li role="presentation"><a href="<?= base_url('dashboard')?>">Dashboard</a></li>

            <li role="presentation"><a href="<?= base_url('customer_info')?>">Customer Info</a></li>
            <li role="presentation"><a href="<?= base_url('sale_report')?>">Sale Report</a></li>
        </ul>
        <div class="row">
            <?php echo $main_content; ?>
        </div>
    </div>



</body>

</html>
