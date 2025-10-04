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
        /* Fix for mobile navbar toggle */
        .navbar-toggler {
            border: none;
            padding: 0.25rem 0.5rem;
        }
        
        .navbar-toggler:focus {
            box-shadow: none;
            outline: none;
        }
        
        /* Cart badge styles - SIMPLE RED BADGE like second image */
        .cart-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: #dc3545;
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            font-size: 0.7rem;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid white;
        }
        
        .cart-link {
            color: #6c757d;
            text-decoration: none;
            padding: 0.5rem 1rem;
            display: flex;
            align-items: center;
            position: relative;
        }
        
        .cart-link:hover {
            color: #495057;
        }
        
        /* Ensure mobile menu closes properly */
        @media (max-width: 991.98px) {
            .navbar-collapse {
                background: white;
                padding: 1rem;
                border-radius: 0.5rem;
                box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
                margin-top: 0.5rem;
            }
            
            .nav-item {
                margin: 0.25rem 0;
            }
            
            .nav-link {
                padding: 0.75rem 1rem !important;
                border-radius: 0.375rem;
            }
            
            .nav-link:hover,
            .nav-link.active {
                background-color: #f8f9fa;
            }
            
            .cart-link {
                justify-content: center;
                margin-top: 0.5rem;
                padding: 0.75rem 1rem;
                border-radius: 0.375rem;
                border: 1px solid #dee2e6;
            }
        }
    </style>
</head>
<body>
    <!-- Fixed Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">
                <i class="fas fa-laptop-code text-primary me-2"></i>
                <span>TechSolutions Pro</span>
            </a>
            
            <!-- Mobile toggle button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
                
                <!-- SIMPLE CART LINK - NO DROPDOWN -->
                <div class="navbar-nav">
                    <a class="nav-link cart-link" href="checkout.php">
                        <i class="fas fa-shopping-cart fa-lg"></i>
                        <?php if ($cart_count > 0): ?>
                            <span class="cart-badge"><?php echo $cart_count; ?></span>
                        <?php endif; ?>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Spacer for fixed navbar -->
    <div style="height: 80px;"></div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Fix for mobile navbar closing issues
        document.addEventListener('DOMContentLoaded', function() {
            const navbarToggler = document.querySelector('.navbar-toggler');
            const navbarCollapse = document.querySelector('.navbar-collapse');
            
            // Close navbar when clicking outside on mobile
            document.addEventListener('click', function(event) {
                const isClickInsideNav = navbarCollapse.contains(event.target) || navbarToggler.contains(event.target);
                
                if (!isClickInsideNav && navbarCollapse.classList.contains('show')) {
                    navbarToggler.click(); // This will close the navbar
                }
            });
            
            // Close navbar when window is resized to desktop size
            window.addEventListener('resize', function() {
                if (window.innerWidth >= 992 && navbarCollapse.classList.contains('show')) {
                    navbarToggler.click();
                }
            });
            
            // Close navbar when a nav link is clicked on mobile
            const navLinks = document.querySelectorAll('.nav-link');
            navLinks.forEach(link => {
                link.addEventListener('click', function() {
                    if (window.innerWidth < 992) {
                        navbarToggler.click();
                    }
                });
            });
        });
    </script>
</body>
</html>
