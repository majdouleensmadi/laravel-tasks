<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>laravel & my db connection</title>
</head>
<body>
   <div>
<?php 
    if (DB::connection()->getPdo()) {
        echo "successfully connected to DB and Name is".DB::connection()->getDatabaseName();
        # code...
    }
    ?>
</div> 
</body>
</html>