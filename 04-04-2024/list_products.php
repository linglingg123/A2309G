<?php
include("connect.php");
$conn = getConn();
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
        $sqlSelectProducts = "SELECT * FROM products";
        $result = mysqli_query($conn, $sqlSelectProducts);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $sqlSelectCate = "SELECT cateName FROM productCate WHERE Id =" . $row['catId'] . "";
                $resultCat = mysqli_query($conn, $sqlSelectCate);

                echo '<div class="row">
                        <div class="col"><img style="width: 100px; height: 120px;" src="' . $row['image'] . '" alt="Image of product no ' . $row['Id'] . '"></div>
                        <div class="col">' . $row['productName'] . '</div>
                        <div class="col">' . $row['price'] . '</div>
                        <div class="col">' . $row['brandName'] . '</div>';
                if (mysqli_num_rows($resultCat) > 0) {
                    while ($cat = mysqli_fetch_assoc($resultCat)) {
                        echo '<div class="col">' . $row['catId'] . '</div>';
                    }
                }
                echo '<div class="col">Action</div>
                    </div>';
            }
        }
        ?>
    </div>
</body>

</html>