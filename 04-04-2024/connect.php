<?php
function getConn()
{
    $conn = new mysqli("localhost", "root", "", "ProductManagement");
    if (!$conn)
        die("Error: " . mysqli_error($conn));
    return $conn;
}
function create()
{
    $conn = new mysqli("localhost", "root", "", "ProductManagement");
    if (!$conn) {
        die("Error: " . mysqli_error($conn));
    } else {
        $sqlCreateTable = "CREATE TABLE products(
        Id INT AUTO_INCREMENT PRIMARY KEY,
        productName VARCHAR(120),
        catId INT REFERENCES productCate(Id),
        productDesc VARCHAR(500),
        brandName VARCHAR(40),
        price FLOAT,
        image VARCHAR(700)
    );";

        $sqlCreateTableCate = "CREATE TABLE IF NOT EXISTS productCate(
        Id INT AUTO_INCREMENT PRIMARY KEY,
        cateName VARCHAR(40)
    );";

        if (!$conn->query($sqlCreateTableCate)) {
            die("Error: " . mysqli_error($conn));
        } else {
            if (!$conn->query($sqlCreateTable)) {
                die("Error: " . mysqli_error($conn));
            } else {
                echo "Create 2 tables successfully";
            }
        }
    }
}
