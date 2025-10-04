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
    // If cart is empty, preload default equipment package (6 items)
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Custom CSS (keep or override) -->
    <link rel="stylesheet" href="assets/css/style.css">
    
    <style>
        :root {
            --navbar-height: 72px;
            --primary: #0d6efd;
            --accent: #FF8F1C;
            --muted: #6c757d;
        }

        /* Reset small white gaps / default margins */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            font-family: 'Inter', system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            background: #f8f9fb;
        }

        /* Enhanced navbar */
        .navbar {
            background: linear-gradient(90deg, rgba(13,110,253,0.95), rgba(0,123,255,0.9));
            box-shadow: 0 6px 18px rgba(13,110,253,0.12);
            height: var(--navbar-height);
        }
        .navbar .container {
            max-width: 1180px;
        }
        .navbar-brand {
            display: flex;
            align-items: center;
            gap: .6rem;
            color: #fff;
            font-weight: 700;
            letter-spacing: .2px;
            text-decoration: none;
            font-size: 1.125rem;
        }
        .navbar-brand i {
            font-size: 1.2rem;
            color: rgba(255,255,255,0.95);
        }

        /* Nav links */
        .navbar-nav .nav-link {
            color: rgba(255,255,255,0.95);
            margin-right: .4rem;
            font-weight: 500;
        }
        .navbar-nav .nav-link.active {
            color: #fff;
            background: rgba(255,255,255,0.08);
            border-radius: 8px;
            padding: .45rem .6rem;
        }

        /* Right-side utilities */
        .nav-utils {
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }
        .nav-utils .icon-btn {
            color: #fff;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: .5rem;
        }
        .nav-utils .icon-btn .fa-lg {
            font-size: 1.05rem;
        }

        /* Cart icon & badge */
        .cart-icon {
            position: relative;
            display: inline-block;
            color: #fff;
            text-decoration: none;
            padding: 8px;
            border-radius: 8px;
        }
        .cart-icon:hover { background: rgba(255,255,255,0.04); }
        .cart-icon i { font-size: 1.35rem; }

        .cart-badge {
            position: absolute;
            top: 6px;
            right: 3px;
            transform: translate(50%, -40%);
            background: #ff3b30;
            color: #fff;
            font-weight: 700;
            font-size: 0.72rem;
            padding: 3px 7px;
            border-radius: 999px;
            line-height: 1;
            box-shadow: 0 4px 10px rgba(0,0,0,0.25);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 22px;
            height: 22px;
            transition: transform 200ms ease, box-shadow 200ms ease;
            transform-origin: center;
            animation: badge-pulse 2s infinite;
        }

        @keyframes badge-pulse {
            0% { transform: translate(50%, -40%) scale(1); box-shadow: 0 4px 10px rgba(0,0,0,0.25); }
            50% { transform: translate(50%, -40%) scale(1.06); box-shadow: 0 6px 14px rgba(0,0,0,0.30); }
            100% { transform: translate(50%, -40%) scale(1); box-shadow: 0 4px 10px rgba(0,0,0,0.25); }
        }

        /* Make sure toggler visible on dark background */
        .navbar-toggler {
            border: none;
            background: rgba(255,255,255,0.08);
            width: 46px;
            height: 46px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
        }
        .navbar-toggler:focus { outline: none; box-shadow: none; }
        .navbar-toggler-icon {
            background-image: none;
            color: #fff;
            font-size: 1.1rem;
        }

        /* Small search icon styling */
        .nav-search {
            color: rgba(255,255,255,0.95);
            display: inline-flex;
            align-items: center;
            gap: .4rem;
            padding: 6px 8px;
            border-radius: 8px;
        }
        .nav-search:hover { background: rgba(255,255,255,0.04); }

        /* Ensure the page content isn't hidden under the fixed navbar */
        /* JS will set body padding-top dynamically based on actual navbar height */
        main, .page-content { padding-top: calc(var(--navbar-height) + 8px); }

        /* Responsive tweaks */
        @media (max-width: 767px) {
            .nav-utils { gap: 0.4rem; }
            .navbar-brand { font-size: 1rem; }
            .cart-badge { top: 4px; right: 2px; min-width: 20px; height: 20px; font-size: 0.68rem; }
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
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <!-- Use a clear icon instead of default background (more reliable cross-browser) -->
                <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
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
                
                <div class="navbar-nav nav-utils">
                    <!-- Search icon (kept) -->
                    <a class="nav-link nav-search" href="search.php" title="Search">
                        <i class="fas fa-search fa-lg"></i>
                    </a>
                    
                    <!-- Cart icon - clickable to checkout -->
                    <a class="nav-link cart-icon" href="checkout.php" aria-label="Checkout - view cart">
                        <i class="fas fa-shopping-cart" aria-hidden="true"></i>
                        <?php if ($cart_count > 0): ?>
                            <span id="cartBadge" class="cart-badge"><?php echo $cart_count; ?></span>
                        <?php endif; ?>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <script>
        // Ensure the body has top padding equal to navbar height so there's no white gap
        (function() {
            function adjustBodyPadding() {
                var nav = document.querySelector('.navbar');
                if (!nav) return;
                var height = nav.offsetHeight || 72;
                // Set CSS variable and body padding
                document.documentElement.style.setProperty('--navbar-height', height + 'px');
                document.body.style.paddingTop = (height + 8) + 'px'; // small buffer
            }

            // Call on load and resize
            document.addEventListener('DOMContentLoaded', adjustBodyPadding);
            window.addEventListener('resize', adjustBodyPadding);

            // Improve toggler behavior fallback (if bootstrap loaded correctly this isn't required,
            // but it ensures the collapse toggles on the toggler click reliably)
            document.addEventListener('DOMContentLoaded', function() {
                var toggler = document.querySelector('.navbar-toggler');
                var collapse = document.querySelector('#navbarNav');

                if (toggler && collapse) {
                    toggler.addEventListener('click', function() {
                        // Use Bootstrap's collapse API if available
                        try {
                            // Bootstrap 5 provides collapse via bootstrap.Collapse
                            if (typeof bootstrap !== 'undefined' && bootstrap.Collapse) {
                                // Toggle using data attributes (Bootstrap will handle)
                                // nothing needed here; this try-catch prevents errors if bootstrap absent
                            } else {
                                // Fallback: simple class toggle
                                collapse.classList.toggle('show');
                            }
                        } catch (e) {
                            // Fallback: toggle class
                            collapse.classList.toggle('show');
                        }
                    });
                }

                // Small accessibility: close collapse when clicking a nav-link on mobile
                var navLinks = document.querySelectorAll('#navbarNav .nav-link');
                Array.prototype.forEach.call(navLinks, function(link) {
                    link.addEventListener('click', function() {
                        if (window.innerWidth < 992 && collapse.classList.contains('show')) {
                            // hide it
                            collapse.classList.remove('show');
                        }
                    });
                });
            });

            // Dynamic cart-badge update helper (expose a function)
            window.updateCartBadge = function(count) {
                var badge = document.getElementById('cartBadge');
                if (!badge) {
                    // create it if doesn't exist and count > 0
                    if (count > 0) {
                        var cartIcon = document.querySelector('.cart-icon');
                        if (cartIcon) {
                            var span = document.createElement('span');
                            span.id = 'cartBadge';
                            span.className = 'cart-badge';
                            span.textContent = count;
                            cartIcon.appendChild(span);
                        }
                    }
                } else {
                    if (count > 0) {
                        badge.textContent = count;
                        // slight animation flash
                        badge.style.transform = 'translate(50%, -40%) scale(1.12)';
                        setTimeout(function(){ badge.style.transform = ''; }, 220);
                    } else {
                        badge.remove();
                    }
                }
            };

            // Expose initial cart count from PHP to JS (for pages that may change cart client-side)
            window.initialCartCount = <?php echo (int)$cart_count; ?>;
        })();
    </script>

    <!-- Include Bootstrap JS bundle (Popper included) - required for collapse/toggler -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
