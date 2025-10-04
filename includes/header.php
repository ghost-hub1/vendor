<?php
// includes/header.php
session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$equipment_package = [
    'professional_laptop' => [
        'name' => 'Dell Latitude 7440 Laptop',
        'price' => 1299.99,
        'image' => 'laptop.jpg',
        'category' => 'computing'
    ],
    'dual_monitors' => [
        'name' => 'Dell UltraSharp 24\" Dual Monitors',
        'price' => 599.99,
        'image' => 'monitors.jpg',
        'category' => 'displays'
    ],
    'professional_headset' => [
        'name' => 'Jabra Evolve2 65 Headset',
        'price' => 279.99,
        'image' => 'headset.jpg',
        'category' => 'audio'
    ],
    'ergonomic_chair' => [
        'name' => 'Herman Miller Aeron Chair',
        'price' => 1499.99,
        'image' => 'chair.jpg',
        'category' => 'furniture'
    ],
    'docking_station' => [
        'name' => 'Dell Thunderbolt Dock WD22TB4',
        'price' => 349.99,
        'image' => 'dock.jpg',
        'category' => 'accessories'
    ],
    'webcam' => [
        'name' => 'Logitech Brio 4K Webcam',
        'price' => 199.99,
        'image' => 'webcam.jpg',
        'category' => 'video'
    ]
];

if (empty($_SESSION['cart'])) {
    $_SESSION['cart'] = $equipment_package;
}

$cart_count = count($_SESSION['cart']);
$total_price = array_sum(array_column($_SESSION['cart'], 'price'));
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>TechSolutions Pro - Professional IT Equipment</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

<!-- Custom CSS -->
<link rel="stylesheet" href="assets/css/style.css">

<style>
:root {
    --navbar-height: 72px;
    --primary: #0d6efd;
    --accent: #ff3b30;
}

body {
    font-family: 'Inter', sans-serif;
    margin: 0;
    background: #f8f9fb;
}

.navbar {
    background: linear-gradient(90deg, rgba(13,110,253,0.98), rgba(0,123,255,0.95));
    box-shadow: 0 6px 18px rgba(13,110,253,0.12);
    height: var(--navbar-height);
}
.navbar-brand {
    display: flex;
    align-items: center;
    gap: .6rem;
    color: #fff !important;
    font-weight: 700;
    font-size: 1.15rem;
    letter-spacing: .2px;
}
.navbar-brand i {
    font-size: 1.2rem;
    color: #fff;
}

.navbar-nav .nav-link {
    color: rgba(255,255,255,0.95);
    margin-right: .5rem;
    font-weight: 500;
}
.navbar-nav .nav-link.active {
    background: rgba(255,255,255,0.1);
    border-radius: 8px;
    color: #fff;
    padding: .45rem .6rem;
}

.navbar-toggler {
    border: none;
    background: rgba(255,255,255,0.1);
    border-radius: 8px;
}
.navbar-toggler-icon {
    background-image: none;
    color: #fff;
    font-size: 1.1rem;
}

.cart-icon {
    position: relative;
    color: #fff;
    padding: 8px;
    text-decoration: none;
}
.cart-badge {
    position: absolute;
    top: 2px;
    right: 0;
    background: var(--accent);
    color: #fff;
    font-size: 0.7rem;
    font-weight: 700;
    border-radius: 999px;
    padding: 3px 7px;
    min-width: 20px;
    height: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 10px rgba(0,0,0,0.25);
    animation: badgePulse 2s infinite;
}

@keyframes badgePulse {
    0%,100% { transform: scale(1); }
    50% { transform: scale(1.08); }
}

@media (max-width: 767px) {
    .navbar-brand { font-size: 1rem; }
}
</style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
<div class="container">
    <a class="navbar-brand" href="index.php">
        💻 <span>TechSolutions Pro</span>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto">
            <li class="nav-item">
                <a class="nav-link <?php echo $current_page == 'index.php' ? 'active' : ''; ?>" href="index.php">
                    🏠 Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $current_page == 'products.php' ? 'active' : ''; ?>" href="products.php">
                    📦 Products
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $current_page == 'about.php' ? 'active' : ''; ?>" href="about.php">
                    💼 About
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $current_page == 'contact.php' ? 'active' : ''; ?>" href="contact.php">
                    ✉️ Contact
                </a>
            </li>
        </ul>

        <div class="navbar-nav">
            <a class="nav-link cart-icon" href="checkout.php">
                <i class="fas fa-shopping-cart"></i>
                <?php if ($cart_count > 0): ?>
                    <span class="cart-badge"><?php echo $cart_count; ?></span>
                <?php endif; ?>
            </a>
        </div>
    </div>
</div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Ensure correct body offset for fixed-top navbar
document.addEventListener("DOMContentLoaded", () => {
    const nav = document.querySelector(".navbar");
    if (nav) document.body.style.paddingTop = nav.offsetHeight + "px";
});
</script>

</body>
</html>
