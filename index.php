<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartMarketHub - Products</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <nav class="navbar">
        <div class="navbar-container">
            <!--Logo-->
            <div class="navbar-logo">
                <a href="service.php" active class="logo-text">SmartMarketHub</a>
            </div>

            <!--Links Section-->
            <div class="navbar-nav">
                <a href="index.php" class="nav-link active">Home</a>
                <a href="cart.php" class="nav-link">Your Cart</a>
            </div>
        </div>
    </nav>


    <div class="container">
        <h2>Our Products</h2>
        <div class="grid-container">
            <?php
            // arry
            $products = [
                [
                    "id" => 1,
                    "image" => "images/item1.jpg",
                    "title" => "Smart Speaker",
                    "description" => "A high-quality speaker with voice recognition for a seamless smart home experience.",
                    "price" => 49.99
                ],
                [
                    "id" => 2,
                    "image" => "images/item2.jpg",
                    "title" => "Smart Watch",
                    "description" => "Monitor your health and stay connected with the latest smartwatch technology.",
                    "price" => 199.99
                ],
                [
                    "id" => 3,
                    "image" => "images/item3.jpg",
                    "title" => "Smart Light",
                    "description" => "Control your lighting from anywhere with this energy-efficient smart light.",
                    "price" => 29.99
                ],
                [
                    "id" => 4,
                    "image" => "images/item4.jpg",
                    "title" => "Smart Thermostat",
                    "description" => "Automatically adjust your home temperature for maximum energy efficiency.",
                    "price" => 99.99
                ],
                [
                    "id" => 5,
                    "image" => "images/item5.jpg",
                    "title" => "Smart Doorbell",
                    "description" => "See and talk to visitors at your door remotely with real-time video.",
                    "price" => 79.99
                ],
                [
                    "id" => 6,
                    "image" => "images/item6.jpg",
                    "title" => "Smart Lock",
                    "description" => "Secure your home with a keyless entry lock that you can control remotely.",
                    "price" => 149.99
                ],
                [
                    "id" => 7,
                    "image" => "images/item7.jpg",
                    "title" => "Robot Vacuum",
                    "description" => "Keep your floors clean effortlessly with this automated robot vacuum.",
                    "price" => 249.99
                ],
                [
                    "id" => 8,
                    "image" => "images/item8.jpg",
                    "title" => "Smart Camera",
                    "description" => "Monitor your home with a high-resolution smart security camera.",
                    "price" => 59.99
                ],
                [
                    "id" => 9,
                    "image" => "images/item9.jpg",
                    "title" => "Smart Coffee Maker",
                    "description" => "Brew your favorite coffee remotely with this Wi-Fi-enabled coffee maker.",
                    "price" => 89.99
                ],
                [
                    "id" => 10,
                    "image" => "images/item10.jpg",
                    "title" => "Smart Air Purifier",
                    "description" => "Improve your indoor air quality with a connected air purifier.",
                    "price" => 129.99
                ],
                [
                    "id" => 11,
                    "image" => "images/item11.jpg",
                    "title" => "Smart Fridge",
                    "description" => "A refrigerator that keeps track of your groceries and can suggest recipes.",
                    "price" => 899.99
                ],
                [
                    "id" => 12,
                    "image" => "images/item12.jpg",
                    "title" => "Smart Oven",
                    "description" => "An oven that can be controlled via an app to make cooking easier and faster.",
                    "price" => 399.99
                ],
                [
                    "id" => 13,
                    "image" => "images/item13.jpg",
                    "title" => "Smart Air Conditioner",
                    "description" => "A smart AC that adjusts to the temperature of your home for comfort and efficiency.",
                    "price" => 349.99
                ],
                [
                    "id" => 14,
                    "image" => "images/item14.jpg",
                    "title" => "Smart Mirror",
                    "description" => "A mirror with built-in smart features like weather updates and time display.",
                    "price" => 249.99
                ],
                [
                    "id" => 15,
                    "image" => "images/item15.jpg",
                    "title" => "Smart Rice Cooker",
                    "description" => "Cook perfect rice every time with this smart rice cooker.",
                    "price" => 79.99
                ],
                [
                    "id" => 16,
                    "image" => "images/item16.jpg",
                    "title" => "Smart Pressure Cooker",
                    "description" => "A programmable pressure cooker with smart cooking modes for convenience.",
                    "price" => 119.99
                ],
                [
                    "id" => 17,
                    "image" => "images/item17.jpg",
                    "title" => "Smart Blender",
                    "description" => "Blend your favorite smoothies remotely with this Wi-Fi enabled blender.",
                    "price" => 89.99
                ],
                [
                    "id" => 18,
                    "image" => "images/item18.jpg",
                    "title" => "Smart Treadmill",
                    "description" => "Track your workouts and progress with this connected treadmill.",
                    "price" => 499.99
                ],
                [
                    "id" => 19,
                    "image" => "images/item19.jpg",
                    "title" => "Smart Washing Machine",
                    "description" => "A washing machine with smart features, allowing you to control it from anywhere.",
                    "price" => 599.99
                ],
                [
                    "id" => 20,
                    "image" => "images/item20.jpg",
                    "title" => "Smart Shower Head",
                    "description" => "A shower head that adjusts water pressure and temperature for an optimal shower experience.",
                    "price" => 79.99
                ],
            ];

            // go through each product in the list and display it.
            foreach ($products as $product) {
                echo '<div class="card" data-product-id="' . $product["id"] . '">';
                echo '<img src="' . $product["image"] . '" alt="' . $product["title"] . '" class="card-image">';
                echo '<div class="card-body">';
                echo '<h3 class="card-title">' . $product["title"] . '</h3>';
                echo '<p class="card-text">' . $product["description"] . '</p>';
                echo '<p class="card-price">$' . number_format($product["price"], 2) . '</p>';
                echo '<form action="add_to_cart.php" method="post">';
                echo '<input type="hidden" name="product_id" value="' . $product["id"] . '">';
                echo '<button type="submit" class="btn-primary add-to-cart">Add to Cart</button>';
                echo '</form>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>

    <div id="notification" class="notification"></div>



    <script>
        // javascript
        const params = new URLSearchParams(window.location.search);
        if (params.has('item_added')) {
            const notification = document.getElementById('notification');
            const itemName = params.get('item_added');

            // Display the notification with the product name
            notification.textContent = `Added "${itemName}" to cart!`;
            notification.style.display = 'block';

            setTimeout(() => {
                notification.style.display = 'none';
            }, 3000);

            // Remove the query parameter for a cleaner URL
            const newUrl = window.location.href.split('?')[0];
            window.history.replaceState({}, document.title, newUrl);
        }
    </script>



    <footer class="footer">
        <div class="footer-container">
            <a class="footer-brand" href="index.php">SmartMarketHub</a>
            <div class="footer-links">
                <a href="contact.php">Contact Us</a>
                <a href="about.php">About Us</a>
            </div>
        </div>
        <p>&copy; 2024 SmartMarketHub. All rights reserved.</p>
    </footer>
</body>

</html>