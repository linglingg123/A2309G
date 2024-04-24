<?php
include_once("../DataAccess/connect.php");
function getCategory()
{
    $conn = getConn();
    $sqlSelectCate = "SELECT * FROM productCate";
    $result = $conn->query($sqlSelectCate);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row['cateName'] . '">' . $row['cateName'] . '</option>';
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

function getBrand()
{
    $conn = getConn();
    $sqlSelectCate = "SELECT * FROM products";
    $result = $conn->query($sqlSelectCate);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row['brandName'] . '">' . $row['brandName'] . '</option>';
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

function getAllProducts()
{
    $conn = getConn();
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
            echo '<div class="col">';

            echo '<form method="GET" action="edit_product.php">
            <button type="submit" name="edit" value=' . $row['Id'] . '>Edit</button>
            </form>
            <form method="GET" action="list_products.php">
                <button type="submit" name="delete" value=' . $row['Id'] . ' name="submitDelete">Delete</button>
            </div>';
            echo '</form>
                    </div>';
        }
    }
}

function deleteProduct($id){
    error_reporting(0);
    $conn = getConn();
    $sqlDeleteProduct = "DELETE * FROM PRODUCTS WHERE Id=".$id;
    $resultDeleteProduct = mysqli_query($conn, $sqlDeleteProduct);
    if (!$resultDeleteProduct) {
        echo "Error: " . mysqli_error($conn) . "";
    }
}

function updateProduct($id)
{
    error_reporting(0);
    $conn = getConn();
    $sqlSelectProduct = 'SELECT * FROM products WHERE Id ='. $id .'';
    $resultSelectUpdate = mysqli_query($conn, $sqlSelectProduct);
    if (mysqli_num_rows($resultSelectUpdate) > 0) {
        while ($row = mysqli_fetch_assoc($resultSelectUpdate)) {
            $sqlUpdateProducts = "UPDATE products
                SET productName = " . $_POST['productName'] . "
                catId = " . $_POST['cate'] . "
                productDesc = " . $_POST['desc'] . "
                brandName = " . $_POST['brand'] . "
                price = " . $_POST['price'] . "
                image = " . $_POST['image'] . "
                WHERE Id = " . $id;
            $result = mysqli_query($conn, $sqlUpdateProducts);
            if ($result) {
                echo "Updated Success";
            } else {
                echo "Error: " . mysqli_error($conn) . "";
            }
        }
    }else{
        echo "Error: " . mysqli_error($conn) . "";
    }
    
}
