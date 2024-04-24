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
    <div>
        <form action="list_products.php" method="post">
            <div>Product Name</div>
            <div><input type="text" name="productName" placeholder="Enter Product Name"></div>
            <div>Product Price</div>
            <div><input type="number" name="price" id="price"></div>
            <div>Product Image</div>
            <div><input type="file" name="image" id="image"></div>
            <div>Product Category</div>
            <div>
                <select name="cate" id="cate" placeholder="Select Category">
                    <?php
                    $sqlSelectCate = "SELECT * FROM productCate";
                    $result = $conn->query($sqlSelectCate);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<option value="' . $row['cateName'] . '">' . $row['cateName'] . '</option>';
                        }
                    } else {
                        echo "Error: " . mysqli_error($conn);
                    }
                    ?>
                </select>
            </div>
            <div>Product Brand</div>
            <div>
                <select name="brand" id="brand" placeholder="Select Brand">
                <?php
                    $sqlSelectCate = "SELECT * FROM products";
                    $result = $conn->query($sqlSelectCate);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<option value="' . $row['brandName'] . '">' . $row['brandName'] . '</option>';
                        }
                    } else {
                        echo "Error: " . mysqli_error($conn);
                    }
                    ?>
                </select>
            </div>
            <div>Product Description</div>
            <div><textarea name="desc" id="desc" cols="150" rows="10"></textarea></div>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>

</html>