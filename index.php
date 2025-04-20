<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blossom Boutique</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #fff8f0;
            margin: 0;
            padding: 0;
            background-image:url(https://media.istockphoto.com/id/1455172237/photo/lavender-at-sunrise.webp?b=1&s=612x612&w=0&k=20&c=h1WPbypDwFJaN5dSShDLm9Ah2uileWbhwMyiB6NuVn8=);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;

        }
        header {
            background-color: #ff6f91;
            color: white;
            padding: 15px 20px;
            text-align: center;
        }
        nav {
            background-color: #ffa07a;
            padding: 10px;
            text-align: center;
        }
        nav a {
            margin: 0 15px;
            color: white;
            text-decoration: none;
            font-weight: bold;
        }
        .hero {
            text-align: center;
            padding: 60px;
            background: url('https://images.unsplash.com/photo-1504198453319-5ce911bafcde?auto=format&fit=crop&w=1400&q=80') no-repeat center;
            background-size: cover;
            color: black;
        }
    </style>
</head>
<body>

<header>
    <h1>🌸 Blossom Boutique 🌸</h1>
</header>

<nav>
    <a href="index.php">Home</a>
    <a href="shop.php">Shop</a>
    <a href="cart.php">Cart</a>
    <a href="login.php">Login</a>
</nav>

<div class="hero">
    <h2>Fresh Flowers Delivered with Love</h2>
    <p>Order beautiful bouquets for every occasion.</p>
</div>
<div style="text-align:center; margin-top: 20px;">
    <a href="shop.php" style="background:#4caf50;color:white;padding:10px 20px;border-radius:5px;text-decoration:none;">shop now</a>
</div>
<!-- About Us Section -->
<!-- <section id="about-us" style="background-color: #fff8f0; padding: 50px 20px;background-image:url(https://media.istockphoto.com/id/1455172237/photo/lavender-at-sunrise.webp?b=1&s=612x612&w=0&k=20&c=h1WPbypDwFJaN5dSShDLm9Ah2uileWbhwMyiB6NuVn8=);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;">
    <div class="container" style="text-align: center; max-width: 800px; margin: 0 auto;">
        <h2 style="color: #ff6f91;">About Blossom Boutique</h2>
        <p style="color: #555; font-size: 1.1em;">
            Welcome to Blossom Boutique, your go-to destination for fresh and beautiful flowers! 
            We believe in making your moments special with a handpicked collection of the finest blooms. 
            Our mission is to bring beauty and joy into your life, whether it's a birthday, anniversary, or a wedding.
        </p>
        <p style="color: #555; font-size: 1.1em;">
            At Blossom Boutique, we take pride in our sustainable flower sourcing and offer delivery across the city. 
            Our goal is to make your shopping experience easy, enjoyable, and full of beautiful flowers!
        </p>
    </div>
</section> -->
<!-- Contact Us Section -->
<!-- <section id="contact-us" style="background-color: #ff6f91; padding: 50px 20px;" >
    <div class="container" style="text-align: center; max-width: 800px; margin: 0 auto;">
        <h2 style="color: white;">Contact Us</h2>
        <p style="color: white; font-size: 1.1em;">We'd love to hear from you! If you have any questions or need help with your order, feel free to contact us.</p>
        
        Contact Form (optional) -->
        <!-- <form action="contact.php" method="post" style="margin-top: 30px;">
            <input type="text" name="name" placeholder="Your Name" required style="padding: 10px; width: 80%; margin: 10px 0; border-radius: 5px; border: none;">
            <input type="email" name="email" placeholder="Your Email" required style="padding: 10px; width: 80%; margin: 10px 0; border-radius: 5px; border: none;">
            <textarea name="message" placeholder="Your Message" required style="padding: 10px; width: 80%; height: 100px; border-radius: 5px; border: none;"></textarea>
            <button type="submit" style="background: white; color: #ff6f91; padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer; margin-top: 15px;">Send Message</button>
        </form> -->

        <!-- Contact Info (alternative to form) -->
        <!-- <div style="margin-top: 30px; font-size: 1.1em; color: white;">
            <p><strong>Email:</strong> support@blossomboutique.com</p>
            <p><strong>Phone:</strong> +123 456 7890</p>
            <p><strong>Address:</strong> 123 Blossom Street, Flower City</p>
        </div>
    </div>
</section> -->

<!-- Footer Section -->
<!-- <footer style="background-color: #ff6f91; color: white; padding: 30px 0; text-align: center;background-image:url(https://media.istockphoto.com/id/1455172237/photo/lavender-at-sunrise.webp?b=1&s=612x612&w=0&k=20&c=h1WPbypDwFJaN5dSShDLm9Ah2uileWbhwMyiB6NuVn8=);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;">
    <div class="container">
        <p style="margin-bottom: 10px;">&copy; 2025 Blossom Boutique. All Rights Reserved.</p>
        <div>
            <a href="privacy-policy.php" style="color: white; margin: 0 15px; text-decoration: none;">Privacy Policy</a>
            <a href="terms.php" style="color: white; margin: 0 15px; text-decoration: none;">Terms & Conditions</a>
            <a href="contact-us.php" style="color: white; margin: 0 15px; text-decoration: none;">Contact Us</a>
        </div>
        <div style="margin-top: 20px;">
            <a href="https://facebook.com" target="_blank" style="color: white; margin: 0 15px;">Facebook</a>
            <a href="https://twitter.com" target="_blank" style="color: white; margin: 0 15px;">Twitter</a>
            <a href="https://instagram.com" target="_blank" style="color: white; margin: 0 15px;">Instagram</a>
        </div>
    </div>
</footer> -->
</body>
</html>
