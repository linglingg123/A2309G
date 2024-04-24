<?php
include_once("../Controller/indexController.php");
include_once("../Controller/cartController.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a href="" style="text-decoration: none">Web8888.vn</a>
            <a href="" style="text-decoration: none">Home Page</a>
            <a href="" style="text-decoration: none">About</a>
            <a href="" style="text-decoration: none">Contact</a>
            <a href="" style="text-decoration: none">Hello, ...</a>
        </div>
    </nav>

    <div class="container">
        <?php
        error_reporting(0);
        session_start();
        cartController();
        ?>
    </div>

    <div class="container">
        <?php
        indexProducts();
        ?>
    </div>

</body>

</html>