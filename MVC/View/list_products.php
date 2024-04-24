<?php
include_once("../Controller/productsController.php");
error_reporting(0);
if(isset($_GET['submitUpdate'])) {
    updateProduct($_GET['submitUpdate']);
}
if(isset($_GET['submitDelete'])) {
    deleteProduct($_GET['submitDelete']);
}
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
    <div class="container">
        <div class="row">
            <div class="col">Image</div>
            <div class="col">Name</div>
            <div class="col">Price</div>
            <div class="col">Brand Name</div>
            <div class="col">Category Name</div>
            <div class="col">Action</div>
        </div>
        <?php
            getAllProducts();
        ?>
    </div>
</body>

</html>