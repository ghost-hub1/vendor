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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechSolutions Pro - Professional IT Equipment</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome@6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    
    <style>
        /* Cart Badge Styles */
        .cart-badge {
            position: absolute;
            top: -8px;
            right: -8px;
            background: #dc3545;
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            font-size: 0.75rem;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }
        
        .cart-icon {
            color: #6c757d;
            text-decoration: none;
            padding: 0.5rem 1rem;
            display: flex;
            align-items: center;
            position: relative;
        }
        
        .cart-icon:hover {
            color: #495057;
        }
        
        .cart-dropdown-menu {
            min-width: 300px;
            padding: 0;
            border: 1px solid #dee2e6;
            border-radius: 0.5rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }
        
        .cart-dropdown-header {
            background: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
            padding: 1rem;
            font-weight: 600;
        }
        
        .cart-item {
            padding: 0.75rem 1rem;
            border-bottom: 1px solid #f8f9fa;
        }
        
        .cart-item:last-child {
            border-bottom: none;
        }
        
        .cart-summary {
            background: #f8f9fa;
            padding: 1rem;
            border-top: 1px solid #dee2e6;
        }
        
        @media (max-width: 768px) {
            .cart-dropdown-menu {
                min-width: 280px;
                position: fixed !important;
                top: 60px !important;
                right: 10px !important;
                left: auto !important;
            }
        }
    </style>
</head>
<body>
    <!-- Enhanced Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">
                <i class="fas fa-laptop-code text-primary me-2"></i>
                <span>TechSolutions Pro</span>
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link <?php echo $current_page == 'index.php' ? 'active' : ''; ?>" href="index.php">
                            <i class="fas fa-home me-1"></i>Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $current_page == 'about.php' ? 'active' : ''; ?>" href="about.php">
                            <i class="fas fa-info-circle me-1"></i>About
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $current_page == 'products.php' ? 'active' : ''; ?>" href="products.php">
                            <i class="fas fa-box-open me-1"></i>Products
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $current_page == 'contact.php' ? 'active' : ''; ?>" href="contact.php">
                            <i class="fas fa-envelope me-1"></i>Contact
                        </a>
                    </li>
                </ul>
                
                <div class="navbar-nav">
                    <!-- Cart Dropdown -->
                    <div class="nav-item dropdown">
                        <a class="nav-link cart-icon dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-shopping-cart fa-lg"></i>
                            <?php if ($cart_count > 0): ?>
                                <span class="cart-badge"><?php echo $cart_count; ?></span>
                            <?php endif; ?>
                        </a>
                        
                        <ul class="dropdown-menu cart-dropdown-menu dropdown-menu-end">
                            <li class="cart-dropdown-header">
                                <i class="fas fa-shopping-cart me-2"></i>
                                Shopping Cart (<?php echo $cart_count; ?>)
                            </li>
                            
                            <?php if ($cart_count > 0): ?>
                                <?php 
                                // Show first 3 items in dropdown
                                $display_items = array_slice($_SESSION['cart'], 0, 3);
                                foreach ($display_items as $key => $item): ?>
                                    <li class="cart-item">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="fw-medium"><?php echo htmlspecialchars($item['name']); ?></div>
                                            <div class="text-primary fw-bold">$<?php echo number_format($item['price'], 2); ?></div>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                                
                                <?php if ($cart_count > 3): ?>
                                    <li class="cart-item text-center">
                                        <small class="text-muted">+<?php echo ($cart_count - 3); ?> more items</small>
                                    </li>
                                <?php endif; ?>
                                
                                <li class="cart-summary">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <strong>Total:</strong>
                                        <strong class="text-primary">$<?php echo number_format($total_price, 2); ?></strong>
                                    </div>
                                    <a href="checkout.php" class="btn btn-primary btn-sm w-100">
                                        <i class="fas fa-credit-card me-1"></i>Proceed to Checkout
                                    </a>
                                </li>
                            <?php else: ?>
                                <li class="cart-item text-center py-3">
                                    <i class="fas fa-shopping-cart fa-2x text-muted mb-2"></i>
                                    <p class="text-muted mb-0">Your cart is empty</p>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Spacer for fixed navbar -->
    <div style="height: 80px;"></div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
