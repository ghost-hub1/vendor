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
        'category' => 'computing',
        'icon' => 'fa-laptop'
    ],
    'dual_monitors' => [
        'name' => 'Dell UltraSharp 24" Dual Monitors',
        'price' => 599.99,
        'image' => 'monitors.jpg',
        'category' => 'displays',
        'icon' => 'fa-desktop'
    ],
    'professional_headset' => [
        'name' => 'Jabra Evolve2 65 Headset',
        'price' => 279.99,
        'image' => 'headset.jpg',
        'category' => 'audio',
        'icon' => 'fa-headset'
    ],
    'ergonomic_chair' => [
        'name' => 'Herman Miller Aeron Chair',
        'price' => 1499.99,
        'image' => 'chair.jpg',
        'category' => 'furniture',
        'icon' => 'fa-chair'
    ],
    'docking_station' => [
        'name' => 'Dell Thunderbolt Dock WD22TB4',
        'price' => 349.99,
        'image' => 'dock.jpg',
        'category' => 'accessories',
        'icon' => 'fa-plug'
    ],
    'webcam' => [
        'name' => 'Logitech Brio 4K Webcam',
        'price' => 199.99,
        'image' => 'webcam.jpg',
        'category' => 'video',
        'icon' => 'fa-video'
    ]
];

if (empty($_SESSION['cart'])) {
    $_SESSION['cart'] = $equipment_package;
}

$cart_count = count($_SESSION['cart']);
$total_price = array_sum(array_column($_SESSION['cart'], 'price'));

// Get current page for active navigation
$current_page = basename($_SERVER['PHP_SELF']);

// Calculate cart summary for dropdown
$cart_items_preview = array_slice($_SESSION['cart'], 0, 3); // Show first 3 items in dropdown
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
        .navbar {
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
            box-shadow: 0 2px 20px rgba(0,0,0,0.1);
            padding: 1rem 0;
            transition: all 0.3s ease;
        }
        
        .navbar-brand {
            font-weight: 800;
            font-size: 1.5rem;
            color: #fff !important;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .navbar-brand i {
            color: #4e73ff;
            font-size: 1.8rem;
        }
        
        .nav-link {
            font-weight: 500;
            color: #e0e0e0 !important;
            transition: all 0.3s ease;
            padding: 0.5rem 1rem !important;
            border-radius: 0.5rem;
            margin: 0 0.2rem;
        }
        
        .nav-link:hover,
        .nav-link.active {
            color: #fff !important;
            background: rgba(78, 115, 255, 0.1);
            transform: translateY(-1px);
        }
        
        .nav-link.active {
            background: linear-gradient(135deg, #4e73ff 0%, #6f42c1 100%);
            box-shadow: 0 4px 12px rgba(78, 115, 255, 0.3);
        }
        
        .cart-dropdown-toggle {
            position: relative;
            background: transparent;
            border: none;
            color: #e0e0e0;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .cart-dropdown-toggle:hover {
            color: #fff;
            background: rgba(78, 115, 255, 0.1);
            transform: translateY(-1px);
        }
        
        .cart-badge {
            position: absolute;
            top: -8px;
            right: -8px;
            background: linear-gradient(135deg, #ff4757 0%, #ff3742 100%);
            color: white;
            border-radius: 50%;
            width: 22px;
            height: 22px;
            font-size: 0.75rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 8px rgba(255, 71, 87, 0.4);
            animation: pulse 2s infinite;
            border: 2px solid #1a1a1a;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }
        
        .cart-dropdown-menu {
            width: 350px;
            border: none;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            border-radius: 1rem;
            overflow: hidden;
            background: #fff;
        }
        
        .cart-dropdown-header {
            background: linear-gradient(135deg, #4e73ff 0%, #6f42c1 100%);
            color: white;
            padding: 1rem;
            border-bottom: none;
        }
        
        .cart-item {
            padding: 1rem;
            border-bottom: 1px solid #f0f0f0;
            transition: background 0.3s ease;
        }
        
        .cart-item:hover {
            background: #f8f9fa;
        }
        
        .cart-item-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #4e73ff 0%, #6f42c1 100%);
            border-radius: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1rem;
        }
        
        .cart-item-details {
            flex: 1;
        }
        
        .cart-item-name {
            font-weight: 600;
            color: #333;
            margin-bottom: 0.2rem;
            font-size: 0.9rem;
        }
        
        .cart-item-price {
            color: #4e73ff;
            font-weight: 700;
            font-size: 0.85rem;
        }
        
        .cart-summary {
            padding: 1rem;
            background: #f8f9fa;
            border-top: 1px solid #e9ecef;
        }
        
        .cart-total {
            font-weight: 700;
            color: #333;
            font-size: 1.1rem;
        }
        
        .btn-checkout {
            background: linear-gradient(135deg, #4e73ff 0%, #6f42c1 100%);
            border: none;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            width: 100%;
        }
        
        .btn-checkout:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(78, 115, 255, 0.4);
        }
        
        .navbar-toggler {
            border: none;
            color: #fff;
        }
        
        .navbar-toggler:focus {
            box-shadow: none;
        }
        
        .empty-cart-message {
            padding: 2rem 1rem;
            text-align: center;
            color: #6c757d;
        }
        
        .empty-cart-icon {
            font-size: 3rem;
            color: #dee2e6;
            margin-bottom: 1rem;
        }
        
        @media (max-width: 768px) {
            .cart-dropdown-menu {
                width: 300px;
                right: -50px !important;
            }
            
            .navbar-brand span {
                font-size: 1.3rem;
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
                    <!-- Enhanced Cart Dropdown -->
                    <div class="dropdown">
                        <button class="cart-dropdown-toggle dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-shopping-cart fa-lg"></i>
                            <span class="d-none d-md-inline">Cart</span>
                            <?php if ($cart_count > 0): ?>
                                <span class="cart-badge"><?php echo $cart_count; ?></span>
                            <?php endif; ?>
                        </button>
                        
                        <ul class="dropdown-menu cart-dropdown-menu dropdown-menu-end">
                            <li class="cart-dropdown-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="mb-0">Your Shopping Cart</h6>
                                    <span class="badge bg-light text-dark"><?php echo $cart_count; ?> items</span>
                                </div>
                            </li>
                            
                            <?php if ($cart_count > 0): ?>
                                <?php foreach ($cart_items_preview as $key => $item): ?>
                                    <li>
                                        <div class="cart-item d-flex align-items-center gap-3">
                                            <div class="cart-item-icon">
                                                <i class="fas <?php echo $item['icon'] ?? 'fa-box'; ?>"></i>
                                            </div>
                                            <div class="cart-item-details">
                                                <div class="cart-item-name"><?php echo htmlspecialchars($item['name']); ?></div>
                                                <div class="cart-item-price">$<?php echo number_format($item['price'], 2); ?></div>
                                            </div>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                                
                                <?php if ($cart_count > 3): ?>
                                    <li class="text-center py-2">
                                        <small class="text-muted">+<?php echo ($cart_count - 3); ?> more items</small>
                                    </li>
                                <?php endif; ?>
                                
                                <li class="cart-summary">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="cart-total">Total:</span>
                                        <span class="cart-total">$<?php echo number_format($total_price, 2); ?></span>
                                    </div>
                                    <a href="checkout.php" class="btn btn-checkout">
                                        <i class="fas fa-credit-card me-2"></i>Proceed to Checkout
                                    </a>
                                </li>
                            <?php else: ?>
                                <li>
                                    <div class="empty-cart-message">
                                        <div class="empty-cart-icon">
                                            <i class="fas fa-shopping-cart"></i>
                                        </div>
                                        <h6>Your cart is empty</h6>
                                        <small>Add some products to get started</small>
                                    </div>
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
    
    <script>
        // Enhanced cart interactions
        document.addEventListener('DOMContentLoaded', function() {
            const cartDropdown = document.querySelector('.cart-dropdown-toggle');
            const cartBadge = document.querySelector('.cart-badge');
            
            // Add hover effects
            if (cartBadge) {
                cartBadge.addEventListener('mouseenter', function() {
                    this.style.transform = 'scale(1.2)';
                });
                
                cartBadge.addEventListener('mouseleave', function() {
                    this.style.transform = 'scale(1)';
                });
            }
            
            // Update cart count dynamically (for future AJAX updates)
            window.updateCartCount = function(count) {
                if (cartBadge) {
                    cartBadge.textContent = count;
                    if (count === 0) {
                        cartBadge.style.display = 'none';
                    } else {
                        cartBadge.style.display = 'flex';
                        // Trigger animation
                        cartBadge.style.animation = 'none';
                        setTimeout(() => {
                            cartBadge.style.animation = 'pulse 2s infinite';
                        }, 10);
                    }
                }
            };
            
            // Auto-close dropdown on mobile after click
            if (window.innerWidth < 768) {
                const dropdownItems = document.querySelectorAll('.cart-dropdown-menu a');
                dropdownItems.forEach(item => {
                    item.addEventListener('click', function() {
                        const dropdown = bootstrap.Dropdown.getInstance(cartDropdown);
                        if (dropdown) {
                            dropdown.hide();
                        }
                    });
                });
            }
        });
    </script>