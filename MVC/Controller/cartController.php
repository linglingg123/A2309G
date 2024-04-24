<?php
include_once("../DataAccess/connect.php");
    function cartController(){
        $conn = getConn();
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }
        // Thêm sản phẩm vào giỏ hàng
        $_GET['productid'];
        $product = array();
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
        $total=0;
        $price = array_column($product, 'price');
        foreach ($price as $p) {
            $total += (int)$p;
        }

        echo 'Total price: ' . $total . '';
    }
?>