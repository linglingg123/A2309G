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
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }
        // Thêm sản phẩm vào giỏ hàng
        $_GET['productid'];
        $product;
        $sqlSelectProductAdd = "SELECT * FROM products WHERE Id = " . $_GET['productid'];
        $resultAddProductAdd = mysqli_query($conn, $sqlSelectProductAdd);
        if ($resultAddProductAdd->num_rows > 0) {
            while ($row = mysqli_fetch_array($resultAddProductAdd)) {
                $product .= array(
                    'id' => $row['Id'],
                    'name' => $row['productName'],
                    'price' => $row['price']
                );
            }
        } else {
            echo 'Unable to add cart: ' . mysqli_error($conn);
        }
        // $product = array(
        //     'id' => 1,
        //     'name' => 'Product Name',
        //     'price' => 19.99
        // );

        $_SESSION['cart'][] = $product;
        // array_count_values($product);


        // Hiển thị thông tin giỏ hàng
        echo '<pre>';
        // print_r($_SESSION['cart']);
        sort($_SESSION['cart']);
        foreach (array_column($_SESSION['cart'], 'id') as $id) {
            echo '';
        }
        $count = 0;
        $productNameCount = array_key_first($product);
        foreach (array_keys(array_column($_SESSION['cart'], 'id')) as $id) {
            $sqlSelectName = "SELECT * FROM products WHERE Id = " . $id . " LIMIT 1";
            $resultSelectName = mysqli_query($conn, $sqlSelectName);
            if ($resultSelectName->num_rows > 0) {
                $row = mysqli_fetch_array($resultSelectName);
                if ((int)$productNameCount == $id) {
                    $count++;
                } else {
                    echo '<h2>' . $row['productName'] . '</h2>';
                    echo '' . $row['price'] * $count . '';
                    echo 'Quantity: ' . $count;
                    $count = 0;
                }
            }
        }
        echo '</pre>';  

        //tong gio hang
        echo 'Total items:' . count($product);

        $price = array_column($product, 'price');
        foreach ($p as $price) {
            $total += (int)$p;
        }

        echo 'Total price: ' . $total . '';
        ?>
    </div>

    <div class="container">
        <?php
        $sqlSelectProducts = "SELECT * FROM products";
        $result = mysqli_query($conn, $sqlSelectProducts);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '
                <form method="GET">
                    <div class="container">
                        <img src="' . $row["image"] . '" style="width:30px; height: 30px">
                        </div>
                        <div class="container">
                        ' . $row["productName"] . '
                        </div>
                        <div class="container">
                        Price: ' . $row["price"] . '
                        </div>
                        <div class="container">
                        <button type="submit" value=' . $row["Id"] . ' name="' . 'productid' . '">Add Cart</button>
                        </div>
                    </div>
                </form>
                ';
            }
        }
        ?>
    </div>

</body>

</html>