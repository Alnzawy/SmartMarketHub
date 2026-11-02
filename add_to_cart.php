<?php
session_start();

$products = [
    1 => ["name" => "Smart Speaker", "price" => 49.99],
    2 => ["name" => "Smart Watch", "price" => 199.99],
    3 => ["name" => "Smart Light", "price" => 29.99],
    4 => ["name" => "Smart Thermostat", "price" => 99.99],
    5 => ["name" => "Smart Doorbell", "price" => 79.99],
    6 => ["name" => "Smart Lock", "price" => 149.99],
    7 => ["name" => "Robot Vacuum", "price" => 249.99],
    8 => ["name" => "Smart Camera", "price" => 59.99],
    9 => ["name" => "Smart Coffee Maker", "price" => 89.99],
    10 => ["name" => "Smart Air Purifier", "price" => 129.99],
    11 => ["name" => "Smart Fridge", "price" => 499.99],
    12 => ["name" => "Smart Oven", "price" => 599.99],
    13 => ["name" => "Smart Air Conditioner", "price" => 349.99],
    14 => ["name" => "Smart Mirror", "price" => 199.99],
    15 => ["name" => "Smart Rice Cooker", "price" => 79.99],
    16 => ["name" => "Smart Pressure Cooker", "price" => 129.99],
    17 => ["name" => "Smart Blender", "price" => 59.99],
    18 => ["name" => "Smart Treadmill", "price" => 799.99],
    19 => ["name" => "Smart Washing Machine", "price" => 399.99],
    20 => ["name" => "Smart Shower Head", "price" => 129.99],
];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $product_id = $_POST['product_id'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (isset($products[$product_id])) {
        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id]['quantity']++;
        } else {
            $_SESSION['cart'][$product_id] = [
                "name" => $products[$product_id]['name'],
                "price" => $products[$product_id]['price'],
                "quantity" => 1
            ];
        }

        $added_item = $products[$product_id]['name'];
    }

    header("Location: index.php?item_added=". urlencode($added_item));
    exit();
}