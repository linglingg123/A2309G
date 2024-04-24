<?php
include_once("../DataAccess/connect.php");

function indexProducts(){
    $conn = getConn();
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
}
?>