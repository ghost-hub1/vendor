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
        'name' => 'Dell UltraSharp 24" Dual Monitors',
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

// Get current page for active navigation
$current_page = basename($_SERVER['PHP_SELF']);

// Dynamic page titles
$page_titles = [
    'index.php' => 'Home',
    'about.php' => 'About Us',
    'products.php' => 'Products',
    'contact.php' => 'Contact Us',
    'checkout.php' => 'Checkout'
];

$current_title = isset($page_titles[$current_page]) ? $page_titles[$current_page] : 'Page';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $current_title; ?> - TechSolutions Pro</title>
    
    <!-- Favicon - SVG version for modern browsers -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><rect x='10' y='20' width='80' height='60' rx='5' fill='%233b82f6' stroke='%231e3a8a' stroke-width='2'/><rect x='20' y='30' width='60' height='35' fill='%230f172a'/><path d='M30 75 L70 75 L65 85 L35 85 Z' fill='%233b82f6'/><rect x='35' y='40' width='5' height='5' fill='%2334d399'/><rect x='45' y='40' width='5' height='5' fill='%23f59e0b'/><rect x='55' y='40' width='5' height='5' fill='%23ef4444'/><rect x='40' y='50' width='20' height='8' fill='%236b7280'/></svg>">
    
    <!-- Fallback favicon for older browsers -->
    <link rel="icon" type="image/x-icon" href="data:image/x-icon;base64,AAABAAEAEBAQAAEABAAoAQAAFgAAACgAAAAQAAAAIAAAAAEABAAAAAAAgAAAAAAAAAAAAAAAEAAAAAAAAAAAAAAAP///AP///wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERH//wAA//8AAP//AAD//wAA//8AAP//AAD//wAA//8AAP//AAD//wAA//8AAP//AAD//wAA">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    
    <style>
        .navbar {
            background: rgba(15, 23, 42, 0.95) !important;
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .navbar-brand {
            color: #3b82f6 !important;
            font-weight: 700;
        }
        
        .navbar-brand i {
            color: #3b82f6;
        }
        
        .nav-link {
            color: #e2e8f0 !important;
        }
        
        .nav-link:hover,
        .nav-link.active {
            color: #3b82f6 !important;
        }
        
        .navbar-toggler {
            border-color: rgba(255, 255, 255, 0.2);
        }
        
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 0.8%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }
        
        /* Mobile menu background */
        @media (max-width: 991.98px) {
            .navbar-collapse {
                background: rgba(15, 23, 42, 0.98);
                border-radius: 0.5rem;
                padding: 1rem;
                margin-top: 0.5rem;
            }
        }
        
        /* Cart Icon Styling - FIXED */
        .cart-icon-container {
            display: flex;
            align-items: center;
            padding: 0.5rem;
        }
        
        .cart-icon-link {
            position: relative;
            color: #e2e8f0;
            font-size: 1.3rem;
            text-decoration: none;
            padding: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .cart-icon-link:hover {
            color: #3b82f6;
        }
        
        .cart-badge {
            position: absolute;
            top: 0;
            right: 0;
            background: #ef4444;
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            font-size: 0.7rem;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid rgba(15, 23, 42, 0.95);
            transform: translate(25%, -25%);
        }
        
        /* Remove Bootstrap nav-link padding on mobile for cart */
        @media (max-width: 991.98px) {
            .navbar-nav .cart-icon-container {
                padding: 0;
            }
            
            .navbar-nav .cart-icon-link {
                padding: 0.75rem 1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Enhanced Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <i class="fas fa-laptop-code"></i>
                <span>TechSolutions Pro</span>
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link <?php echo $current_page == 'index.php' ? 'active' : ''; ?>" href="index.php">
                            🏠 <span class="ms-1">Home</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $current_page == 'about.php' ? 'active' : ''; ?>" href="about.php">
                            ℹ️ <span class="ms-1">About</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $current_page == 'products.php' ? 'active' : ''; ?>" href="products.php">
                            📦 <span class="ms-1">Products</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $current_page == 'contact.php' ? 'active' : ''; ?>" href="contact.php">
                            📧 <span class="ms-1">Contact</span>
                        </a>
                    </li>
                </ul>
                
                <div class="navbar-nav">
                    <!-- Cart Icon Only - FIXED -->
                    <div class="cart-icon-container">
                        <a class="cart-icon-link" href="checkout.php">
                            <i class="fas fa-shopping-cart"></i>
                            <?php if ($cart_count > 0): ?>
                                <span class="cart-badge"><?php echo $cart_count; ?></span>
                            <?php endif; ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    